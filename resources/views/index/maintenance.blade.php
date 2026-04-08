<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website đang bảo trì</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <meta name="robots" content="noindex, nofollow">
</head>
<body class="bg-gray-50">

    <div class="min-h-screen flex flex-col items-center justify-center px-4 text-center">

        <!-- Icon -->
        <div class="mb-6">
            <img src="{{ asset('assets/images/logo.png') }}" class="w-80" alt="Expoplus">
        </div>

        <!-- Title -->
        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-800">
            Website đang bảo trì
        </h1>

        <div class="h-1 w-20 rounded-full bg-indigo-700 my-6"></div>

        <!-- Description -->
        <p class="text-base md:text-lg text-gray-600 max-w-xl">
            Chúng tôi đang nâng cấp hệ thống để mang lại trải nghiệm tốt hơn. <br>
            Vui lòng quay lại sau ít phút. Xin cảm ơn!
        </p>

        <!-- Footer -->
        <p class="mt-10 text-xs text-gray-400">
            © {{ date('Y') }} daotaoykhoa.com | All rights reserved.
        </p>
    </div>

</body>
</html>
