<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Models\Exhibition;
use App\Models\User;
use App\Models\Quiz;
use App\Models\Wishlist;
use App\Models\CategoryProduct;
use App\Models\UserCategoryProduct;
use App\Models\Product;
use App\Models\Position;
use App\Models\Country;
use App\Models\Notification;
use App\Helpers\HTMLHelper;
use Hash;

class UserController extends BaseController
{
    public function index(Request $request)
    {
        $this->html['exhibitions'] = Exhibition::status()->get();
        $this->html['categories'] = CategoryProduct::status()->get();
        $this->html['countries'] = Country::get();
        $this->html['exhibitors'] = User::status()
                                            ->where('type', 1)
                                            ->filter($request->keyword)
                                            ->country($request->country)
                                            ->category($request->category)
                                            ->exhibition($request->exhibition)
                                            ->paginate(20);

        return view('index.user.index', $this->html);
    }
    
    public function profile(Request $request)
    {
        $this->html['category_product'] = CategoryProduct::status()->get();
        $this->html['position'] = Position::get();
        $this->html['country'] = Country::get();
        return view('index.profile', $this->html);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'min:8', 'confirmed'],
        ], [
            'current_password.required' => 'Vui lòng nhập mật khẩu hiện tại',
            'password.required' => 'Vui lòng nhập mật khẩu mới',
            'password.min' => 'Mật khẩu mới phải có ít nhất 8 ký tự',
            'password.confirmed' => 'Xác nhận mật khẩu mới không khớp',
        ]);

        $user = auth('user')->user();

        // Check mật khẩu hiện tại
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors([
                'current_password' => 'Mật khẩu hiện tại không chính xác'
            ]);
        }

        // Update mật khẩu mới
        $user->password = Hash::make($request->password);
        $user->save();

        // Optional: regenerate session (tăng bảo mật)
        $request->session()->regenerate();

        return back()->with('success', 'Thay đổi mật khẩu thành công');
    }

    public function update(Request $request)
    {   
        try {
            $user = auth('user')->user();

            $user->country_id  = $request->country;
            $user->address     = $request->address;
            $user->phone       = $request->phone;
            $user->position_id = $request->position;
            $user->website     = $request->website;
            $user->contact     = $request->contact;
            $user->fullname    = $request->fullname;
            $user->company     = $request->company;
            $user->description = $request->description;
            $user->purpose     = $request->purpose;
            $user->avatar      = HTMLHelper::uploadImage($user->avatar);
            $user->banner      = HTMLHelper::uploadImage($user->banner, 'banner', 'banner', 1920, 500);

            if($user->save()) {

                $category_product = $request->category_product ?? [];

                $user->categoryProducts()->sync($category_product);

                return back()->with('success', __('ui.saved_success'));

            }

        } catch (\Exception $e) {
            dd($e->getMessage());
            \Log::debug($e->getMessage());
            return back()->withErrors(__('ui.account_invalid'));
        }
    }

    public function detail(Request $request)
    {
        $this->html['user'] = User::status()->where('code', $request->code)->first();

        // Seo Pack
        $title = $this->html['user']->company ?? 'Doanh nghiệp đối tác';

        $description = $this->html['user']->description ?? null;

        $image = $this->html['user']->avatar;

        $this->html['meta_title'] = $title;
        $this->html['meta_image'] = asset($image);
        $this->html['meta_description'] = $description;

        return view('index.user.detail', $this->html);
    }

    public function saveQr(Request $request)
    {
        $user = User::select('qr_code', 'fullname', 'phone', 'exhibition_id')->findOrFail($request->user_id);
        $qr_code_gen = HTMLHelper::handleQrCode($user);
        
        if(!$qr_code_gen) return sendError('Không khả dụng');

        return sendResponse($qr_code_gen);
    }
}
