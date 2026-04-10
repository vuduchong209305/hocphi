<div style="max-width:600px;background-color:#ffffff;border:1px solid #e5e7eb;border-top:5px solid #009689;margin:0 auto">
	<div style="text-align:center;padding:20px 20px 15px;border-bottom:1px solid #e5e7eb;">
        <img src="/assets/images/logo.png" alt="Logo" style="max-width:180px;height:auto;">
    </div>
    <div style="padding:25px;font-size:16px;line-height:1.6;">
    	{!! $mail->detail->body ?? null !!}
    </div>
	<div style="padding:20px 25px;font-size:14px;color:#7f8fa4;border-top:1px solid #e5e7eb;">
        <p style="margin-top:0;margin-bottom:5px;"><small><i>{{ __('layout.notice_mail') }}</i></small></p>
        <p style="margin:5px 0;">-----------------------------------------</p>
        <p style="margin-top:0;margin-bottom:5px;">
            <small>© 2026 
                <a href="{{ route('index.home') }}" style="color:#009689;text-decoration:none;">daotaoykhoa.com</a>. All rights reserved.
            </small>
        </p>
    </div>
</div>