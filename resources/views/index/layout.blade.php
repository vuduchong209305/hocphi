<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="content-language" content="vi" />
    <meta name="robots" content="{{ HTMLHelper::getOption('robot_index') ? 'index,follow' : 'noindex,nofollow' }}">
    <meta name="googlebot" content="{{ HTMLHelper::getOption('robot_index') ? 'index,follow' : 'noindex,nofollow' }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Đào tạo y khoa CME</title>
    <!-- Google / Search Engine Tags -->
    <meta itemprop="image" content="{{ asset('index/images/banner-cme.webp') }}" />
    <meta name="keywords" content="đào tạo y khoa cme" />
    <meta name="description" content="Đăng ký khóa học đào tạo y khoa CME" />
    <meta name="copyright" content="daotaoykhoa" />
    <meta name="author" content="daotaoykhoa" />
    <meta name="resource-type" content="Document" />
    <meta name="distribution" content="Global" />
    <meta name="revisit-after" content="1 days" />
    <meta name="GENERATOR" content="daotaoykhoa" />
    <!-- Facebook Meta Tags -->
    <meta property="og:url" itemprop="url" content="{{ url()->current() }}" />
    <meta property="og:title" content="Đào tạo y khoa CME" />
    <meta property="og:description" content="Đăng ký khóa học đào tạo y khoa CME" />
    <meta property="og:image" content="{{ asset('index/images/banner-cme.webp') }}" />
    <meta property="og:image:alt" content="Đào tạo y khoa CME" />
    <meta property="og:site_name" content="daotaoykhoa" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="vi_VN" />
    <!-- Favicon -->
    <link rel="canonical" href="{{ url()->current() }}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon/favicon.ico') }}">
    <link rel="shortcut icon" type="image/x-icon" sizes="16x16" href="{{ asset('favicon/favicon-16x16.ico') }}">
    <link rel="shortcut icon" type="image/x-icon" sizes="24x24" href="{{ asset('favicon/favicon-24x24.ico') }}">
    <link rel="shortcut icon" type="image/x-icon" sizes="32x32" href="{{ asset('favicon/favicon-32x32.ico') }}">
    <link rel="shortcut icon" type="image/x-icon" sizes="48x48" href="{{ asset('favicon/favicon-48x48.ico') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="36x36" href="{{ asset('favicon/android-icon-36x36.png') }}">
    <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('favicon/android-icon-48x48.png') }}">
    <link rel="icon" type="image/png" sizes="72x72" href="{{ asset('favicon/android-icon-72x72.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/android-icon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="144x144" href="{{ asset('favicon/android-icon-144x144.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('favicon/ms-icon-144x144.png') }}">
    <meta name="msapplication-square150x150logo" content="{{ asset('favicon/mstile-150x150.png') }}">
    <meta name="theme-color" content="#1b3d9c">

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('index/css/style.css') }}">
</head>
<body>

    <div class="text-white w-full text-center text-sm font-medium py-2 bg-gradient-to-r from-violet-500 via-[#9938CA] to-[#E0724A]">
        <p>Đào tạo y khoa CME, <a href="javascript:;" class="underline underline-offset-2">Tham gia ngay!</a></p>
    </div>
    <section class="bg-white">
        <div class="max-w-7xl mx-auto px-3">
            <header class="h-[70px] flex items-center justify-between transition-all">
                <a href="/" class="w-30">
                    <img src="{{ asset('assets/images/logo.png') }}" class="w-full" alt="logo">
                </a>

                <div id="menuOverlay" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-40 opacity-0 pointer-events-none transition duration-300 md:hidden">
                </div>

                <nav id="menu" class="fixed md:relative top-0 left-0 h-full md:h-auto w-[320px] md:w-auto bg-white md:bg-transparent z-50 transform -translate-x-full md:translate-x-0 transition duration-300 ease-out flex flex-col md:flex-row gap-2 md:gap-10 shadow-2xl md:shadow-none">

                    <div class="md:hidden flex items-center justify-between px-4 py-3 border-b border-gray-100">
                        <img src="{{ asset('assets/images/logo.png') }}" class="h-8">
                        <button id="closeMenu" class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-gray-100 transition">
                            <i class="ti ti-x text-2xl text-gray-700"></i>
                        </button>
                    </div>

                    <div class="flex flex-col md:flex-row gap-4 md:gap-10 p-4 md:p-0">
                        <a href="{{ route('index.home') }}" class="text-lg md:text-base menu-item {{ navActive('index.home') }}">
                            Đăng ký khóa học
                        </a>

                        <a href="{{ route('index.purchase') }}" class="text-lg md:text-base menu-item {{ navActive('index.purchase') }}">
                            Thanh toán
                        </a>
                    </div>
                </nav>

            </header>

        </div>
    </section>

    <section class="bg-gradient-to-br from-indigo-100 via-white to-purple-100">
        <div class="max-w-7xl mx-auto px-3 md:py-20 py-10 grid md:grid-cols-2 gap-12 items-center">
            <div>
                <span class="inline-block bg-indigo-100 text-indigo-700 px-4 py-1 rounded-full text-sm font-semibold mb-4">
                    Đào tạo liên tục CME ngành y tế
                </span>
                <h1 class="text-4xl md:text-5xl font-bold leading-tight text-gray-900 mb-6"> Đơn vị uy tín hàng đầu <br>
                    <span class="text-indigo-700" id="typed"></span>
                </h1>
                <p class="text-gray-600 text-md mb-8 italic"> "Là Phòng Tuyển sinh trực thuộc Viện Khoa học Quản lý Y tế –  được thành lập theo quyết định số 474/QĐ-LHHVN ngày 14/7/2016 của Chủ tịch Liên hiệp các Hội Khoa học kỹ thuật Việt Nam." </p>

                <div class="flex items-center md:gap-6 gap-2 mt-6 text-sm text-gray-500">
                    <span class="inline-flex items-center md:text-base text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-world me-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M3.6 9h16.8" /><path d="M3.6 15h16.8" /><path d="M11.5 3a17 17 0 0 0 0 18" /><path d="M12.5 3a17 17 0 0 1 0 18" /></svg> 30+ khóa học</span>
                    <span class="inline-flex items-center md:text-base text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-briefcase me-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 9a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2l0 -9" /><path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2" /><path d="M12 12l0 .01" /><path d="M3 13a20 20 0 0 0 18 0" /></svg> 10,000+ giờ học</span>
                    <span class="inline-flex items-center md:text-base text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-office me-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 18h9v-12l-5 2v5l-4 2v-8l9 -4l7 2v13l-7 3l-9 -3" /></svg> 2000+ học viên</span>
                </div>
            </div>
            <!-- HERO IMAGE -->
            <div class="relative">
                <img src="{{ asset('index/images/banner-cme.webp') }}" class="rounded-3xl shadow-2xl" alt="">
            </div>
        </div>
    </section>

    @yield('content')

    <!-- FOOTER -->
    <footer class="max-w-7xl mx-auto px-3 text-sm text-slate-500 bg-white pt-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-14 pb-10">
            <div class="sm:col-span-2 lg:col-span-1">
                <a href="{{ route('index.home') }}" class="w-70 block">
                    <img src="{{ asset('assets/images/logo.png') }}" class="w-50" alt="logo">
                </a>
                <p class="text-sm/7 mt-3">Là Phòng Tuyển sinh trực thuộc Viện Khoa học Quản lý Y tế –  được thành lập theo quyết định số 474/QĐ-LHHVN ngày 14/7/2016 của Chủ tịch Liên hiệp các Hội Khoa học kỹ thuật Việt Nam.</p>
            </div>
            <div class="flex flex-col lg:items-center lg:justify-center">
                <div class="flex flex-col text-sm space-y-2.5">
                    <h2 class="font-semibold mb-5 text-gray-800">Về chúng tôi</h2>
                    <a class="hover:text-indigo-600 transition" href="#">Giới thiệu</a>
                    <a class="hover:text-indigo-600 transition" href="#">Triển lãm</a>
                    <a class="hover:text-indigo-600 transition" href="#">Giao thương</a>
                    <a class="hover:text-indigo-600 transition" href="#">Liên hệ hợp tác</a>
                </div>
            </div>
            
        </div>
        <div class="flex flex-col md:flex-row items-center justify-between gap-4 py-4 border-t border-slate-200">
            <p class="text-center">
                {{ __('layout.copyright') }} {{ date('Y') }} © <a href="/">daotaoykhoa.com</a> {{ __('layout.all_right_reserved') }}
            </p>
            <div class="flex items-center gap-4">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
                <a href="#">Cookie Policy</a>
            </div>
        </div>
    </footer>

    <script src="{{ asset('index/js/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/tabler-icons@1.35.0/icons-react/dist/index.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11"></script>
    <script src="{{ asset('index/js/script.js') }}"></script>
    @include('index.alert')
    @stack('scripts')
</body>
</html>