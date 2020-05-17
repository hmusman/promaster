<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/icon-pro.png" type="image/x-icon">
    <title>Promaster</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('public/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('public/assets/vendors/bootstrap-selector/css/bootstrap-select.min.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!--icon font css-->
    <link rel="stylesheet" href="{{url('public/assets/vendors/themify-icon/themify-icons.css')}}">
    <link rel="stylesheet" href="{{url('public/assets/vendors/font-awesome/css/all.css')}}">
    <link rel="stylesheet" href="{{url('public/assets/vendors/elagent/style.css')}}">
    <link rel="stylesheet" href="{{url('public/assets/vendors/flaticon/flaticon.css')}}">
    <link rel="stylesheet" href="{{url('public/assets/vendors/animation/animate.css')}}">
    <link rel="stylesheet" href="{{url('public/assets/vendors/owl-carousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('public/assets/vendors/nice-select/nice-select.css')}}">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="stylesheet" href="{{url('public/assets/vendors/magnify-pop/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{url('public/assets/vendors/elagent/style.css')}}">
    <link rel="stylesheet" href="{{url('public/assets/vendors/scroll/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" href="{{url('public/assets/css/front-end-style.css')}}">
    <link rel="stylesheet" href="{{url('public/assets/css/responsive.css')}}">
    <script src="{{url('public/assets/js/jquery-3.2.1.min.js')}}"></script>
    @stack('style')

</head>

<body>
    <div id="preloader">
        <div id="ctn-preloader" class="ctn-preloader">
            <div class="animation-preloader">
                <div class="spinner"></div>
                <div class="txt-loading">
                    <span data-text-preloader="P" class="letters-loading">
                        P
                    </span>
                    <span data-text-preloader="R" class="letters-loading">
                        R
                    </span>
                    <span data-text-preloader="O" class="letters-loading">
                        O
                    </span>
                    <span data-text-preloader="M" class="letters-loading">
                        M
                    </span>
                    <span data-text-preloader="A" class="letters-loading">
                        A
                    </span>
                    <span data-text-preloader="S" class="letters-loading">
                        S
                    </span>
                    <span data-text-preloader="T" class="letters-loading">
                        T
                    </span>
                    <span data-text-preloader="E" class="letters-loading">
                        E
                    </span>
                    <span data-text-preloader="R" class="letters-loading">
                        R
                    </span>
                    <span data-text-preloader="S" class="letters-loading">
                        S
                    </span>
                </div>
                <p class="text-center">Loading</p>
            </div>
            <div class="loader">
                <div class="row">
                    <div class="col-3 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="body_wrapper">
        <header class="header_area">

            <nav class="navbar navbar-expand-lg menu_one">
                <div class="container custom_container p0">
                    <a class="navbar-brand" href="{{url('/')}}"><img src="{{url('public/assets/img/logo-pro.png')}}" alt="logo"></a>
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_toggle">
                            <span class="hamburger">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                            <span class="hamburger-cross">
                                <span></span>
                                <span></span>
                            </span>
                        </span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="navbar-nav ml-auto menu">
                            <li class="nav-item active  mega_menu mega_menu_two ">
                                <a class="nav-link " href="index.html">
                                    Home
                                </a>
                                <div class="mega_menu_inner">

                                </div>
                            </li>

                            <li class="nav-item  mega_menu">
                                <a class="nav-link " href="#how" aria-expanded="false">
                                    How It Works
                                </a>

                            </li>
                            <li class=" nav-item"><a class="nav-link scroll" href="#courses">Courses</a>

                            </li>
                            <li class=" nav-item"><a class="nav-link scroll" href="{{ route('ebooks') }}">eBooks</a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#pricing">
                                    Pricing
                                </a>

                            </li>

                        </ul>

                        <a class="btn_get btn_hover" href="{{url('signup')}}">Get Started</a>
                        <a class="btn_sign btn_hover" href="{{url('login')}}">Sign In</a>
                    </div>
                </div>
            </nav>
        </header>