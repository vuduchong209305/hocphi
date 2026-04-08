<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin:0;padding:0;background-color:#f3f4f6;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;color:#333;">

    <div style="max-width:600px;margin:30px auto;background-color:#ffffff;border:1px solid #e5e7eb;border-top:5px solid #009689;">
        
        <!-- Header -->
        <div style="text-align:center;padding:20px 20px 15px;border-bottom:1px solid #e5e7eb;">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" style="max-width:180px;height:auto;">
        </div>

        <!-- Body -->
        <div style="padding:25px;font-size:16px;line-height:1.6;">
            {!! $body !!}
        </div>

        <!-- Footer -->
        <div style="padding:20px 25px;font-size:14px;color:#7f8fa4;border-top:1px solid #e5e7eb;">
            <p style="margin-top:0;margin-bottom:5px;"><small><i>{{ __('layout.notice_mail') }}</i></small></p>
            <p style="margin:5px 0;">-----------------------------------------</p>
            <p style="margin-top:0;margin-bottom:5px;">
                <small>© {{ date('Y') }} 
                    <a href="https://expoplus.vn" style="color:#009689;text-decoration:none;">Expoplus.vn</a>. All rights reserved.
                </small>
            </p>
        </div>

    </div>

</body>
</html>