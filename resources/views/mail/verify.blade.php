@extends('mail.layout')
@section('title', 'Verify')
@section('content')

    <h2 style="text-align:center; font-size:24px; font-weight:600; margin-bottom:20px; margin-top:0; color:#009689;">
        Mã xác minh tài khoản!
    </h2>

    <p style="margin-top:0; margin-bottom:10px;">
        Dưới đây là mã xác minh tài khoản: {{ $user->email ?? '123456' }}
    </p>
    <p style="margin-top:0; margin-bottom:10px;">
        Mã chỉ hoạt động trong <b>15 phút</b>.
    </p>

    <p style="font-size:20px; font-weight:bold; color:#009689; margin: 20px 0; text-align: center;">
        <code style="border:1px dashed #009689; padding:10px 20px; border-radius:4px; display:inline-block;">
            {{ $user->otp ?? '123456' }}
        </code>
    </p>

@endsection