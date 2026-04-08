<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CategoryProduct;
use App\Models\UserType;
use App\Models\Exhibition;
use App\Models\Position;
use App\Models\Agency;
use App\Models\Country;
use App\Helpers\HTMLHelper;
use Excel;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $this->html['exhibitions'] = Exhibition::get();
        $this->html['user_type'] = UserType::get();
        $this->html['agency'] = Agency::status()->get();
        
        $this->html['data'] = User::orderByDesc('id')
                                    ->exhibition($request->exhibition_id)
                                    ->type($request->type)
                                    ->agency($request->agency_id)
                                    ->filter($request->q)
                                    ->paginate($request->per_page);

        if(!empty($request->id))
            $this->html['user'] = User::findOrFail($request->id);

        return view('admin.user.index', $this->html);
    }

    public function create(Request $request)
    {
        $this->html['category_product'] = CategoryProduct::status()->get();
        $this->html['user_type'] = UserType::get();
        $this->html['positions'] = Position::get();
        $this->html['agency'] = Agency::status()->get();
        $this->html['country'] = Country::get();

        if(!empty($request->id))
            $this->html['user'] = User::findOrFail($request->id);
        
        return view('admin.user.create', $this->html);
    }

    public function store(Request $request, User $user)
    {
        if(!empty($request->id))
            $user = User::findOrFail($request->id);

        $user->email         = $request->email;
        $user->phone         = $request->phone;
        $user->contact       = $request->contact;
        $user->fullname      = $request->fullname;
        $user->company       = $request->company;
        $user->exhibition_id = $request->exhibition_id;
        $user->type          = $request->type;
        $user->address       = $request->address;
        $user->booth         = $request->booth;
        $user->website       = $request->website;
        $user->position_id   = $request->position_id;
        $user->agency_id     = $request->agency_id;
        $user->country_id    = $request->country;
        $user->avatar        = HTMLHelper::uploadImage($user->avatar);
        $user->status        = $request->boolean('status');

        if(empty($user->code)) {
            $user->code = strRandom();
        }

        if($user->save()) {

            $category_product = $request->category_product ?? [];

            $user->categoryProducts()->sync($category_product);

            vdh_activity_log("Lưu khách hàng " . $user->email);

            return !empty($request->id) ? back()->with('success', 'Lưu thành công') : redirect()->route('user.index')->with("success", "Lưu thành công");
        }
        
        return back()->withErrors('Đã có lỗi xảy ra, vui lòng thử lại');
    }

    public function delete(Request $request)
    {
        $listID = $request->get('id');

        if(strlen($listID) > 0) {

            $ids = explode(';', $listID);

            if(count($ids) > 0) {

                \DB::beginTransaction();
                try {

                    if(User::destroy($ids)) {
                        
                        \DB::commit();

                        return back()->with('success', "Xóa thành công " . count($ids) . " dữ liệu");

                    }
                    
                } catch (Exception $e) {

                    \DB::rollBack();
                    throw new Exception($e->getMessage());

                }
         
            }

            return back()->withErrors('Không có ID');
            
        }
        
        return back()->withErrors('Không có ID');
    }
}
