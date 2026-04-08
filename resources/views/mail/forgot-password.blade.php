@extends('mail.layout')
@section('title', 'Mật khẩu mới')
@section('content')

    <h2 style="text-align:center; font-size:24px; font-weight:600; margin-bottom:20px; color:#009689; margin-top:0;">
        Mật khẩu mới!
    </h2>

    <p style="margin-top:0; margin-bottom:10px;">Xin chào,</p>

    <p style="margin-top:0; margin-bottom:10px;">Chúng tôi đã tạo mật khẩu mới cho tài khoản của bạn theo yêu cầu.</p>

    <div style="font-size:20px; font-weight:bold; color:#292929; margin: 20px 0; text-align: center;">
        <code style="border:1px dashed #009689;padding:10px 15px;color:#009689">{{ $password }}</code>
    </div>

    <p style="margin-top:0; margin-bottom:20px;">Vui lòng sử dụng mật khẩu này để đăng nhập và thay đổi lại nếu cần.</p>

    <p style="text-align: center; margin-top:0;">
        <a href="{{ $ctaUrl ?? '#' }}" 
           style="display:inline-block; margin-top:20px; padding:12px 24px; background-color:#009689; color:#ffffff; font-weight:600; text-decoration:none; border-radius:6px;">
           Đăng nhập ngay
        </a>
    </p>

@endsection