<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- theme meta -->
    <meta name="theme-name" content="focus" />
    <title>@yield('title')</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->

    <link href="{{ asset('admin-asset/css/lib/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-asset/css/lib/themify-icons.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('admin-asset/') }}css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="{{ asset('admin-asset/') }}css/lib/owl.theme.default.min.css" rel="stylesheet" /> 
    <link href="{{ asset('admin-asset/') }}css/lib/weather-icons.css" rel="stylesheet" /> --}}
    <link href="{{ asset('admin-asset/css/lib/menubar/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-asset/css/lib/bootstrap.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('admin-asset/') }}css/lib/helper.css" rel="stylesheet"> --}}
    <link href="{{ asset('admin-asset/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo"><a href="{{ route('dashboard') }}">
                            <span>{{ env('APP_NAME') }}</span>
                        </a></div>
                    <li><a href="#"><i class="ti-calendar"></i> Site Info </a></li>



                    <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i> Products Management <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="{{ route('products.create') }}">Add Product</a></li>

                            <li><a href="{{ route('products.index') }}">All Products</a>
                            </li>


                        </ul>
                    </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i> Category Management <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="#">Add Category</a></li>

                            <li><a href="#">All Category</a>
                            </li>


                        </ul>
                    </li>

                    <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i> Order Management <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="#">All Orders</a></li>
                            <li><a href="#">New Orders</a></li>
                            <li><a href="#">Completed Orders</a></li>


                        </ul>
                    </li>



                    <li><a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i
                                class="ti-close"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /# sidebar -->

    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-left">
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="float-right">
                        <div class="dropdown dib">

                            <div class="header-icon dropdown">

                                <span class="user-avatar" data-toggle="dropdown"
                                    aria-expanded="false">{{ auth()->user()->full_name }}
                                    <i class="ti-angle-down f-s-10"></i>
                                </span>
                                <div class="dropdown-menu dropdown-content-body">
                                    <div class="">
                                        <ul>

                                            <li>
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                              document.getElementById('logout-form').submit();">
                                                    <i class="ti-power-off"></i>
                                                    <span>Logout</span>
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="content-wrap">
        <div class="main">
            @yield('content')
        </div>
    </div>

    <!-- jquery vendor -->
    <script src="{{ asset('admin-asset/js/lib/jquery.min.js') }}"></script>
    <script src="{{ asset('admin-asset/js/lib/jquery.nanoscroller.min.js') }}"></script>
    <!-- nano scroller -->
    <script src="{{ asset('admin-asset/js/lib/menubar/sidebar.js') }}"></script>
    <script src="{{ asset('admin-asset/js/lib/preloader/pace.min.js') }}"></script>
    <!-- sidebar -->

    <script src="{{ asset('admin-asset/js/lib/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin-asset/js/scripts.js') }}"></script>
    <!-- bootstrap -->

    {{-- <script src="{{ asset('admin-asset/') }}js/lib/calendar-2/moment.latest.min.js"></script>
    <script src="{{ asset('admin-asset/') }}js/lib/calendar-2/pignose.calendar.min.js"></script>
    <script src="{{ asset('admin-asset/') }}js/lib/calendar-2/pignose.init.js"></script> --}}


    {{-- <script src="{{ asset('admin-asset/') }}js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="{{ asset('admin-asset/') }}js/lib/weather/weather-init.js"></script>
    <script src="{{ asset('admin-asset/') }}js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="{{ asset('admin-asset/') }}js/lib/circle-progress/circle-progress-init.js"></script> --}}
    {{-- <script src="{{ asset('admin-asset/') }}js/lib/chartist/chartist.min.js"></script>
    <script src="{{ asset('admin-asset/') }}js/lib/sparklinechart/jquery.sparkline.min.js"></script>
    <script src="{{ asset('admin-asset/') }}js/lib/sparklinechart/sparkline.init.js"></script>
    <script src="{{ asset('admin-asset/') }}js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="{{ asset('admin-asset/') }}js/lib/owl-carousel/owl.carousel-init.js"></script> --}}
    <!-- scripit init-->
    <script src="{{ asset('admin-asset/js/dashboard2.js') }}"></script>
</body>

</html>
