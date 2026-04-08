<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Str;

class AuthController extends BaseController
{
	public function login(Request $request)
	{
		if(!$request->isMethod('post')) {

			if(auth()->check()) return redirect()->route('dashboard');

			return view('admin.auth.login');

		}

		$this->validate($request,
			[
				'email' => 'required',
				'password' => 'required|min:6',
			],
			[
				'required' => ':attribute là bắt buộc',
				'min'      => ':attribute phải hơn :min ký tự',
			],
			[
				'email' => 'Email',
				'password' => 'Mật khẩu',
			]
		);

		$login = $request->only('email', 'password');

		if(!auth()->attempt($login)) return back()->withErrors('Đăng nhập thất bại');

		return redirect()->route('dashboard');

	}

	public function logout()
	{
		auth()->logout();
		return redirect()->route('get.login');
	}

	public function page403()
	{
		return view('admin.errors.403');
	}
}
