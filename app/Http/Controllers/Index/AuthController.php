<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Quiz;
use App\Models\Exhibition;
use App\Models\Position;
use App\Models\Country;
use App\Helpers\HTMLHelper;
use App\Notifications\NewBuyerSendExhibitor;
use App\Mail\ForgotPass;
use Socialite, Log, Str, Notification, Mail, DB;

class AuthController extends BaseController
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (auth('user')->attempt($credentials, $request->boolean('remember'))) {

            $request->session()->regenerate();

            return sendResponse(null, 'Đăng nhập thành công');
        }

        return sendError('Email hoặc mật khẩu không chính xác');
    }

    public function register(UserRequest $request, User $user)
    {
        \DB::beginTransaction();
        try {
            $user->email = $request->email;
            $user->company = $request->company;
            $user->code = strRandom();
            $user->verified_at = now();

            $password = strRandom(10, false);
            $user->password = $password;
            
            $user->save();

            \Mail::to($user->email)->cc(mail_cc())->queue(new \App\Mail\NewPassword($user, $password));

            \DB::commit();

            return sendResponse($user->email, 'Đăng ký thành công! Vui lòng vào Email để lấy mật khẩu đăng nhập');
        } catch (\Exception $e) {
            \DB::rollBack();
            return sendError($e->getMessage());
        }
    }

    public function logout()
    {
        auth('user')->logout();
        return redirect()->route('index.home');
    }

    public function forgotPassword(Request $request)
    {
        if(!$request->isMethod('post')) return view('index.auth.forgot_password');

        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where(['email' => $request->email])->first();

        if(!$user) return back()->withErrors('Email không tồn tại');

        $password = strRandom(10, false);
        $user->password = $password;
        $user->save();

        \Mail::to($user->email)->cc(mail_cc())->queue(new \App\Mail\NewPassword($user, $password));
        
        return redirect()->route('index.home')->with('success', 'Vui lòng vào Email để xem mật khẩu');
    }

    public function verifyOTP(Request $request)
    {
        if(!$request->isMethod('post')) return view('index.auth.verify');

        $request->validate([
            'email' => 'required|email',
            'otp'   => 'required|numeric'
        ]);

        if(auth('user')->check()) {
            $user = auth('user')->user();
        } else {
            $user = User::where('email', $request->email)->first();
        }

        if(!$user){
            return sendError('Email không tồn tại');
        }

        // ❌ Không có OTP
        if(!$user->otp){
            return sendError('Vui lòng lấy mã OTP mới');
        }

        // ❌ OTP hết hạn (5 phút)
        if(now()->diffInMinutes($user->updated_otp) > 5){
            return sendError('OTP đã hết hạn');
        }

        // ❌ Sai OTP

        if($user->otp_attempt >= 5)
            return sendError('Bạn nhập sai OTP quá nhiều lần. Vui lòng gửi lại OTP mới');

        if($user->otp != $request->otp){

            $user->otp_attempt = ($user->otp_attempt ?? 0) + 1;
            $user->save();

            return sendError('OTP không chính xác');
        }

        // ✅ OTP đúng → reset attempt
        $user->otp_attempt = 0;

        // ✅ Clear OTP (one time use)
        $user->otp = null;
        $user->updated_otp = null;

        switch ($request->type) {
            case 'verify-account': // Verify account
                $user->verified_at = now();

                $route = route('index.user.profile', ['tab' => 'verification']);

                break;
            
            default: // Forgot password
                // ✅ Generate reset token
                $user->password_reset_token = Str::random(50);
                $user->password_reset_token_at = now();

                $route = route('index.reset-password', ['token' => $user->password_reset_token]);

                break;
        }
        
        $user->save();

        session()->flash('success', 'Xác minh tài khoản thành công');

        return sendResponse($route, 'Xác thực OTP thành công');
    }

    public function resetPassword(Request $request)
    {
        // ⭐ GET request → show form
        if(!$request->isMethod('post')) {

            // ⭐ Lấy user theo token
            $user = User::where('password_reset_token', $request->token)
                            ->where('password_reset_token_at', '>', \Carbon\Carbon::now()->subMinutes(5))
                            ->where('status', 1)
                            ->exists();

            if($user){
                return view('index.auth.reset_password', [
                    'token' => $request->token
                ]);
            }

            return view('index.auth.expired');
        }

        // ⭐ POST → validate input
        $request->validate([
            'token' => 'required',
            'password' => 'required|confirmed|min:6|max:30',
        ],[
            'required'  => ':attribute là bắt buộc',
            'min'       => ':attribute phải hơn :min ký tự',
            'max'       => ':attribute không quá :max ký tự',
            'confirmed' => ':attribute không khớp nhau', 
        ],[
            'token'    => 'Token',
            'password' => 'Mật khẩu'
        ]);

        // ⭐ Re-check token (tránh user sửa token lúc submit)
        $user = User::where('password_reset_token', $request->token)
                    ->where('password_reset_token_at', '>', \Carbon\Carbon::now()->subMinutes(5))
                    ->where('status', 1)
                    ->first();

        if(!$user) return back()->withErrors('Token không hợp lệ hoặc đã hết hạn');

        // ⭐ Update password
        $user->password = bcrypt($request->password);

        // ⭐ Clear token (one time use)
        $user->password_reset_token = null;
        $user->password_reset_token_at = null;

        // ⭐ Clear OTP luôn cho sạch
        $user->otp = null;
        $user->updated_otp = null;

        $user->save();

        return redirect()->route('index.home')->with("success", "Đặt lại mật khẩu thành công");
    }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $getInfo = Socialite::driver($provider)->user();
        $user = $this->createUser($getInfo, $provider); 
        auth('user')->login($user); 
        return redirect()->route('index.home');
    }

    public function createUser($getInfo, $provider)
    {
        $data = [
            'fullname'    => $getInfo->name,
            'email'       => $getInfo->email,
            'avatar'      => $getInfo->avatar,
            'provider'    => $provider,
            'provider_id' => $getInfo->id,
            'code'        => strRandom(),
            'status'      => 1,
            'verified_at' => now()
        ];

        $user = User::updateOrCreate(['email' => $getInfo->email], $data);
        return $user;
    }
}
