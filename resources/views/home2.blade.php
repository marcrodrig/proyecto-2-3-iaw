<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Sleek Dashboard - Free Bootstrap 4 Admin Dashboard Template and UI Kit. It is very powerful bootstrap admin dashboard, which allows you to build products like admin panels, content management systems and CRMs etc.">

    <title>Sleek Admin Dashboard Template</title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />
    <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />

    <link href='https://unpkg.com/@fullcalendar/core@4.4.2/main.min.css' rel='stylesheet' />
    <link href='https://unpkg.com/@fullcalendar/daygrid@4.4.2/main.min.css' rel='stylesheet' />
    <link href='https://unpkg.com/@fullcalendar/timegrid@4.4.2/main.min.css' rel='stylesheet' />
    <link href="https://unpkg.com/@fullcalendar/bootstrap@4.4.2/main.min.css" rel="stylesheet">

    <link href='https://use.fontawesome.com/releases/v5.0.6/css/all.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet' />


    <link href="css/daterangepicker.css" rel="stylesheet" />

    <!-- SLEEK CSS -->
    <link href="https://unpkg.com/sleek-dashboard/dist/assets/css/sleek.min.css" rel="stylesheet"/>
    <!-- FAVICON -->
    <link href="images/favicon.png" rel="shortcut icon" />
</head>
<body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">
    <div class="wrapper">
        <!--
          ====================================
          ——— LEFT SIDEBAR WITH FOOTER
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
                                        <a class="sidenav-item-link" href="#">
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
                                    <img src="storage/{{Auth::user()->avatar}}" class="user-image" alt="User Image" />
                                    <span class="d-none d-lg-inline-block">{{Auth::user()->name}}</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <!-- User image -->
                                    <li class="dropdown-header">
                                        <img src="storage/{{Auth::user()->avatar}}" class="img-circle"
                                            alt="User Image" />
                                        <div class="d-inline-block">
                                            {{Auth::user()->name}} <small class="pt-1">{{Auth::user()->email}}</small>
                                        </div>
                                    </li>

                                    <li>
                                        <a href="user-profile.html">
                                            <i class="mdi mdi-account"></i> My Profile
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
                    <div class="breadcrumb-wrapper d-flex justify-content-between align-items-center">
                        <div>
                            <h1>Calendar</h1>

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb p-0">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">
                                            <span class="mdi mdi-home"></span>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        app
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">calendar</li>
                                </ol>
                            </nav>

                        </div>

                        <div>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modal-add-event">
                                <i class="mdi mdi-plus mr-1"></i> Add New Event
                            </button>
                        </div>
                    </div>

                    <div class="card card-default">
                        <div class="card-body p-0">
                            <div class="full-calendar">
                                <div id='calendar'></div>
                            </div>
                        </div>
                    </div>

                    <!-- Add Event Button  -->
                    <div class="modal fade" id="modal-add-event" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <form>
                                    <div class="modal-header px-4">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Add New Event</h5>

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body px-4">

                                        <div class="form-group">
                                            <label for="firstName">Title</label>
                                            <input type="text" class="form-control" value="Meeting">
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="firstName">Date</label>
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="mdi mdi-calendar-range"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control date-range"
                                                            name="dateRange" value="" placeholder="Date" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect3">Time</label>
                                                    <select class="form-control" id="exampleFormControlSelect3">
                                                        <option>10:00am</option>
                                                        <option>10:30am</option>
                                                        <option>11am</option>
                                                        <option>11:30am</option>
                                                        <option>12:00pm</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-0">
                                            <label for="firstName">Description</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1"
                                                rows="5"></textarea>
                                        </div>
                                    </div>

                                    <div class="modal-footer border-top-0 px-4 pt-0">
                                        <button type="button" class="btn btn-primary btn-pill m-0">Creat Event</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
                                    <a href="javascript:void(0);"
                                        class="btn-right-sidebar-2 header-static-to">Static</a>
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
                                        class="btn-right-sidebar-2 btn-reset">Reset
                                        Settings</div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

            </div>


        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/slimscrollbar/jquery.slimscroll.min.js"></script>

    <script src='https://unpkg.com/@fullcalendar/core@4.4.2/main.min.js'></script>
    <script src='https://unpkg.com/@fullcalendar/daygrid@4.4.2/main.min.js'></script>
    <script src='https://unpkg.com/@fullcalendar/timegrid@4.4.2/main.min.js'></script>
    <script src="https://unpkg.com/@fullcalendar/bootstrap@4.4.2/main.min.js"></script>
    <script src='js/app.calendar.js'></script>



    <script src="js/moment.min.js"></script>
    <script src="js/daterangepicker.js"></script>
    <script>
    jQuery(document).ready(function() {
        jQuery('input[name="dateRange"]').daterangepicker({
            autoUpdateInput: false,
            singleDatePicker: true,
            locale: {
                cancelLabel: 'Clear'
            }
        });
        jQuery('input[name="dateRange"]').on('apply.daterangepicker', function(ev, picker) {
            jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
        });
        jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function(ev, picker) {
            jQuery(this).val('');
        });
    });
    </script>

    <script src="js/sleek.bundle.js"></script>
    <!-- <script src="https://unpkg.com/sleek-dashboard/dist/assets/js/sleek.bundle.js"></script> -->
</body>

</html>