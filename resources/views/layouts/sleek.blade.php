<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Sleek Dashboard - Free Bootstrap 4 Admin Dashboard Template and UI Kit. It is very powerful bootstrap admin dashboard, which allows you to build products like admin panels, content management systems and CRMs etc.">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />

    @yield('head')

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- SLEEK CSS -->
    <link href="https://unpkg.com/sleek-dashboard/dist/assets/css/sleek.min.css" rel="stylesheet" />
    <!-- FAVICON -->
    <link href="images/favicon.png" rel="shortcut icon" />

</head>

<body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">
    <div class="wrapper">
        <!--
            ====================================
            ——— LEFT SIDEBAR
            =====================================
        -->
        <aside class="left-sidebar bg-sidebar">
            <div id="sidebar" class="sidebar sidebar-with-footer">
                <!-- Aplication Brand -->
                <div class="app-brand">
                    <a href="/" title="Sleek Dashboard">
                        <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid"
                            width="30" height="33" viewBox="0 0 30 33">
                            <g fill="none" fill-rule="evenodd">
                                <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                                <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                            </g>
                        </svg>
                        <span class="brand-name text-truncate">Sleek Dashboard</span>
                    </a>
                </div>
                <!-- begin sidebar scrollbar -->
                <div class="sidebar-scrollbar">
                    <!-- sidebar menu -->
                    <ul class="nav sidebar-inner" id="sidebar-menu">
                        <li class="has-sub active expand">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                                data-target="#app" aria-expanded="false" aria-controls="app">
                                <i class="mdi mdi-pencil-box-multiple"></i>
                                <span class="nav-text">App</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse show" id="app" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li class="active">
                                        <a class="sidenav-item-link" href="{{ route('home') }}">
                                            <span class="nav-text">Calendar</span>
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                </div>
            </div>
        </aside>

        <div class="page-wrapper">
            <!-- Header -->
            <header class="main-header " id="header">
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button -->
                    <button id="sidebar-toggler" class="sidebar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                    </button>

                    <div class="navbar-right">
                        <ul class="nav navbar-nav">
                            <!-- User Account -->
                            <li class="dropdown user-menu">
                                <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="user-image"
                                        alt="User Image" />
                                    <span class="d-none d-lg-inline-block">{{Auth::user()->name}}</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <!-- User image -->
                                    <li class="dropdown-header">
                                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="img-circle"
                                            alt="User Image" />
                                        <div class="d-inline-block">
                                            {{Auth::user()->username}} <small class="pt-1">{{Auth::user()->email}}</small>
                                        </div>
                                    </li>

                                    <li>
                                        <a href="{{ route('users.edit', Auth::user()) }}">
                                            <i class="mdi mdi-account"></i> Perfil
                                        </a>
                                    </li>
                                    <li class="right-sidebar-in">
                                        <a href="javascript:0"> <i class="mdi mdi-settings"></i> Setting </a>
                                    </li>

                                    <li class="dropdown-footer">
                                        <a href="{{ url('/logout') }}"> <i class="mdi mdi-logout"></i>
                                            {{ __('Logout') }} </a>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <div class="content-wrapper">
                <div class="content">
                    @yield('content')
                </div>
            </div>
            <!--
                ====================================
                ——— RIGHT SIDEBAR
                =====================================
            -->
            <div class="right-sidebar-2">
                <div class="right-sidebar-container-2">
                    <div class="slim-scroll-right-sidebar-2">

                        <div class="right-sidebar-2-header">
                            <h2>Layout Settings</h2>
                            <p>User Interface Settings</p>
                            <div class="btn-close-right-sidebar-2">
                                <i class="mdi mdi-window-close"></i>
                            </div>
                        </div>

                        <div class="right-sidebar-2-body">
                            <span class="right-sidebar-2-subtitle">Header Layout</span>
                            <div class="no-col-space">
                                <a href="javascript:void(0);"
                                    class="btn-right-sidebar-2 header-fixed-to btn-right-sidebar-2-active">Fixed</a>
                                <a href="javascript:void(0);" class="btn-right-sidebar-2 header-static-to">Static</a>
                            </div>

                            <span class="right-sidebar-2-subtitle">Sidebar Layout</span>
                            <div class="no-col-space">
                                <select class="right-sidebar-2-select" id="sidebar-option-select">
                                    <option value="sidebar-fixed">Fixed Default</option>
                                    <option value="sidebar-fixed-minified">Fixed Minified</option>
                                    <option value="sidebar-fixed-offcanvas">Fixed Offcanvas</option>
                                    <option value="sidebar-static">Static Default</option>
                                    <option value="sidebar-static-minified">Static Minified</option>
                                    <option value="sidebar-static-offcanvas">Static Offcanvas</option>
                                </select>
                            </div>

                            <span class="right-sidebar-2-subtitle">Header Background</span>
                            <div class="no-col-space">
                                <a href="javascript:void(0);"
                                    class="btn-right-sidebar-2 btn-right-sidebar-2-active header-light-to">Light</a>
                                <a href="javascript:void(0);" class="btn-right-sidebar-2 header-dark-to">Dark</a>
                            </div>

                            <span class="right-sidebar-2-subtitle">Navigation Background</span>
                            <div class="no-col-space">
                                <a href="javascript:void(0);"
                                    class="btn-right-sidebar-2 btn-right-sidebar-2-active sidebar-dark-to">Dark</a>
                                <a href="javascript:void(0);" class="btn-right-sidebar-2 sidebar-light-to">Light</a>
                            </div>

                            <div class="d-flex justify-content-center" style="padding-top: 30px">
                                <div id="reset-options" style="width: auto; cursor: pointer"
                                    class="btn-right-sidebar-2 btn-reset">
                                    Reset Settings
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/slimscrollbar/jquery.slimscroll.min.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    @yield('scripts')

    <script src="{{ asset('js/sleek.bundle.js') }}"></script>
    <!-- <script src="https://unpkg.com/sleek-dashboard/dist/assets/js/sleek.bundle.js"></script> -->
</body>

</html>