<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Đào tạo y khoa CME | Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content=""/>
        <meta name="author" content="Expoplus"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="{{ asset('favicon/favicon.ico') }}">

        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/fontawesome.css') }}" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" rel="stylesheet">
        <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/select2-bootstrap-5-theme.min.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('assets/css/fancybox.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('assets/css/flatpickr.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('assets/css/simple-notify.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/multi-select.dist.css') }}" rel="stylesheet"/>

        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('assets/js/head.js') }}"></script>

        @stack('styles')
    </head>

    <!-- body start -->
    <body data-menu-color="light" data-sidebar="default">

        @include('admin.blocks.notification')
        
        <!-- Begin page -->
        <div id="app-layout">
            
            <!-- Topbar Start -->
            <div class="topbar-custom">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between">
                        <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
                            <li>
                                <button class="button-toggle-menu nav-link">
                                    <i data-feather="menu" class="noti-icon"></i>
                                </button>
                            </li>
                            <li class="d-none d-lg-block">
                                <h6 class="mb-0">Quản trị viên <span class="text-success"><b>{{ Auth::user()->fullname ?? Auth::user()->email }}</b></span></h6>
                            </li>
                        </ul>

                        <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">

                            <li class="d-none d-lg-block">
                                <form class="app-search d-none d-md-block me-auto">
                                    <div class="position-relative topbar-search">
                                        <input type="text" class="form-control ps-4" placeholder="Search..." />
                                        <i class="mdi mdi-magnify fs-16 position-absolute text-muted top-50 translate-middle-y ms-2"></i>
                                    </div>
                                </form>
                            </li>

                            <li class="nav-item dropdown-language dropdown me-2 me-xl-0">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    @foreach(LangHelper::getLang() as $lang)
                                        @if($lang->name == App::currentLocale())
                                            <img src="{{ $lang->image }}" alt="{{ $lang->title ?? null }}" width="20">&nbsp;&nbsp;{{ $lang->title ?? null }}
                                        @endif
                                    @endforeach
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    @foreach(LangHelper::getLang() as $lang)
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="selectLang('{{ $lang->id ?? null }}', '{{ $lang->name ?? null }}')">

                                            <img src="{{ $lang->image ?? null }}" alt="{{ $lang->title ?? null }}" title="{{ $lang->title ?? null }}" class="lang_flag {{ $lang->lang_class ?? null }}">
                                            &nbsp;&nbsp;

                                            <span class="align-middle">{{ $lang->title ?? null }}</span>

                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            
                            <!-- User Dropdown -->
                            <li class="dropdown notification-list topbar-dropdown">
                                <a class="nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="{{ Auth::user()->avatar ?? no_image() }}" alt="user-image" class="rounded-circle" />
                                    <span class="pro-user-name ms-1"><i class="mdi mdi-chevron-down"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end profile-dropdown">
   
                                    <!-- item-->
                                    <a href="{{ route('admin.profile') }}" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-circle-outline fs-16 align-middle"></i>
                                        <span>Thông tin</span>
                                    </a>

                                    <!-- item-->
                                    <a href="#" class="dropdown-item notify-item">
                                        <i class="mdi mdi-lock-outline fs-16 align-middle"></i>
                                        <span>Lock Screen</span>
                                    </a>

                                    <div class="dropdown-divider"></div>

                                    <!-- item-->
                                    <a href="{{ route('logout') }}" class="dropdown-item notify-item">
                                        <i class="mdi mdi-location-exit fs-16 align-middle"></i>
                                        <span>Đăng xuất</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end Topbar -->
            @php $menus = MenuHelper::getAllMenu() @endphp
            <!-- Left Sidebar Start -->
            <div class="app-sidebar-menu">
                <div class="h-100" data-simplebar>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <div class="logo-box">
                            <a href="{{ route('dashboard') }}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('assets/images/logo-white.png') }}" alt="" width="120">
                                </span>
                            </a>
                            <a href="{{ route('dashboard') }}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('assets/images/logo.png') }}" alt="" width="120">
                                </span>
                            </a>
                        </div>

                        <ul id="side-menu">

                            @foreach($menus as $key => $menu)
                            <li>
                                <a href="{{ count($menu['submenu']) > 0 ? '#collapse'.$key : $menu['url'] }}" {{ count($menu['submenu']) > 0 ? "data-bs-toggle=collapse class=collapsed aria-expanded=false" : null }}>
                                    <i class="ti {{ $menu['icon'] }}"></i>
                                    <span> {{ $menu['title'] }} </span>
                                    
                                    @if(count($menu['submenu']) > 0)
                                    <span class="menu-arrow"></span>
                                    @endif
                                </a>

                                @if(count($menu['submenu']) > 0)
                                <div class="collapse" id="{{ 'collapse'.$key }}">
                                    <ul class="nav-second-level">
                                        @foreach($menu['submenu'] as $submenu)
                                        <li>
                                            <a href="{{ $submenu['url'] }}" class="tp-link">
                                                <i class="ti ti-point"></i>  {{ $submenu['title'] }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                            </li>
                            @endforeach
                        </ul>
            
                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                            <div class="flex-grow-1">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0">
                                        @foreach($menus as $menu)
                                            @if(request()->is($menu['active']))
                                                <li class="breadcrumb-item">
                                                    <a href="#">{{ request()->is($menu['active']) ? $menu['title'] : '' }}</a>
                                                </li>

                                                @if(!empty($menu['submenu']) && count($menu['submenu']) > 0)
                                                    @foreach($menu['submenu'] as $submenu)
                                                        @if(request()->is($submenu['active']))
                                                            <li class="breadcrumb-item" aria-current="page">{{ $submenu['title'] }}</li>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endif
                                        @endforeach
                                    </ol>
                                </nav>
                            </div>
                        </div>

                        @yield('content')
                           
                    </div> <!-- container-fluid -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col fs-13 text-muted text-center">
                                &copy; <script>document.write(new Date().getFullYear())</script> - Made with <span class="mdi mdi-heart text-danger"></span> by <a href="javascript:;" class="text-reset fw-semibold">Expoplus</a> 
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <!-- Vendor -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/waves.min.js') }}"></script>
        <script src="{{ asset('assets/js/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/js/feather.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap-editable.min.js') }}"></script>
        <script src="{{ asset('assets/js/Sortable.min.js') }}"></script>
        <script src="{{ asset('assets/js/fancybox.min.js') }}"></script>
        <script src="{{ asset('assets/js/simple-notify.min.js') }}"></script>
        <script src="{{ asset('assets/js/flatpickr.js')}}"></script>
        <script src="{{ asset('assets/js/flatpickr-vn.js')}}"></script>
        <script src="{{ asset('assets/js/simple.money.format.js')}}"></script>
        <script src="{{ asset('assets/js/jquery.multi-select.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.quicksearch.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>
        <script src="{{ asset('assets/js/script.js') }}"></script>

        @stack('scripts')

    </body> 

</html>