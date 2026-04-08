<nav class="fixed bottom-0 left-0 right-0 z-50 md:hidden">

    <div class="absolute inset-0 bg-white/80 backdrop-blur-xl border-t border-gray-200"></div>

    <div class="relative flex items-center justify-between px-4 py-2">

        <a href="{{ route('index.home') }}" class="flex flex-col items-center text-xs flex-1 {{ request()->routeIs('index.home') ? 'text-indigo-600' : 'text-gray-500' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-home"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12.707 2.293l9 9c.63 .63 .184 1.707 -.707 1.707h-1v6a3 3 0 0 1 -3 3h-1v-7a3 3 0 0 0 -2.824 -2.995l-.176 -.005h-2a3 3 0 0 0 -3 3v7h-1a3 3 0 0 1 -3 -3v-6h-1c-.89 0 -1.337 -1.077 -.707 -1.707l9 -9a1 1 0 0 1 1.414 0m.293 11.707a1 1 0 0 1 1 1v7h-4v-7a1 1 0 0 1 .883 -.993l.117 -.007z" /></svg>

            <span class="mt-0.5">
                Trang chủ
            </span>
        </a>

        <button id="openMenu" class="flex flex-col items-center text-xs flex-1 text-gray-500 active:scale-95 transition">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-category"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 3h-6a1 1 0 0 0 -1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1 -1v-6a1 1 0 0 0 -1 -1z" /><path d="M20 3h-6a1 1 0 0 0 -1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1 -1v-6a1 1 0 0 0 -1 -1z" /><path d="M10 13h-6a1 1 0 0 0 -1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1 -1v-6a1 1 0 0 0 -1 -1z" /><path d="M17 13a4 4 0 1 1 -3.995 4.2l-.005 -.2l.005 -.2a4 4 0 0 1 3.995 -3.8z" /></svg>

            <span class="mt-0.5">
                Menu
            </span>
        </button>

        <a href="{{ route('index.user.index') }}" class="relative -mt-8 flex flex-col items-center">
            <div class="w-14 h-14 rounded-full bg-gradient-to-br from-indigo-600 to-indigo-500 text-white flex items-center justify-center shadow-lg shadow-indigo-300">
                <i class="ti ti-network text-2xl"></i>
            </div>

            <span class="text-xs mt-1 text-indigo-600 font-medium">
                Kết nối
            </span>
        </a>

        <a href="{{ route('index.meeting.index') }}" class="flex flex-col items-center text-xs flex-1 {{ request()->routeIs('index.meeting.*') ? 'text-indigo-600' : 'text-gray-500' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-calendar-week"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 2c.183 0 .355 .05 .502 .135l.033 .02c.28 .177 .465 .49 .465 .845v1h1a3 3 0 0 1 2.995 2.824l.005 .176v12a3 3 0 0 1 -2.824 2.995l-.176 .005h-12a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-12a3 3 0 0 1 2.824 -2.995l.176 -.005h1v-1a1 1 0 0 1 .514 -.874l.093 -.046l.066 -.025l.1 -.029l.107 -.019l.12 -.007q .083 0 .161 .013l.122 .029l.04 .012l.06 .023c.328 .135 .568 .44 .61 .806l.007 .117v1h6v-1a1 1 0 0 1 1 -1m3 7h-14v9.625c0 .705 .386 1.286 .883 1.366l.117 .009h12c.513 0 .936 -.53 .993 -1.215l.007 -.16z" /><path d="M9.015 13a1 1 0 0 1 -1 1a1.001 1.001 0 1 1 -.005 -2c.557 0 1.005 .448 1.005 1" /><path d="M13.015 13a1 1 0 0 1 -1 1a1.001 1.001 0 1 1 -.005 -2c.557 0 1.005 .448 1.005 1" /><path d="M17.02 13a1 1 0 0 1 -1 1a1.001 1.001 0 1 1 -.005 -2c.557 0 1.005 .448 1.005 1" /><path d="M12.02 15a1 1 0 0 1 0 2a1.001 1.001 0 1 1 -.005 -2z" /><path d="M9.015 16a1 1 0 0 1 -1 1a1.001 1.001 0 1 1 -.005 -2c.557 0 1.005 .448 1.005 1" /></svg>

            <span class="mt-0.5">
                Lịch
            </span>
        </a>

        <a href="{{ route('index.user.profile') }}" class="flex flex-col items-center text-xs flex-1 {{ request()->routeIs('index.user.profile') ? 'text-indigo-600' : 'text-gray-500' }}">

            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-circle"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M9 10a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /><path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" /></svg>

            <span class="mt-0.5">
                Hồ sơ
            </span>
        </a>
    </div>

</nav>

<div class="h-20 md:hidden"></div>

<script>
    const menu = document.getElementById("menu");
    const overlay = document.getElementById("menuOverlay");

    function openMobileMenu()
    {
        menu.classList.remove("-translate-x-full");
        overlay.classList.remove("opacity-0","pointer-events-none");
        document.body.classList.add("overflow-hidden");
    }

    function closeMobileMenu()
    {
        menu.classList.add("-translate-x-full");
        overlay.classList.add("opacity-0","pointer-events-none");
        document.body.classList.remove("overflow-hidden");
    }

    document.getElementById("openMenu")?.addEventListener("click",openMobileMenu);
    document.getElementById("closeMenu")?.addEventListener("click",closeMobileMenu);
    overlay?.addEventListener("click",closeMobileMenu);
</script>