<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title> ProMaster</title>
   
    <!-- Favicon -->
    <!-- <link rel="shortcut icon" href="{{url('public/assets/user-images/favicon.ico')}}" /> -->
    <!-- Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="{{url('public/assets/css/style.css')}}" />
     <link rel="stylesheet" href="{{url('public/assets/vendor/bootstrap/css/bootstrap.min.css')}}">

    @yield('extra-css')
    <style>
    body{
        font-family: 'Poppins', sans-serif;
    }
        .bell{
            font-size: 17px;
            margin-top: 6px;
        }
         .badge {
           position:relative;
           top:-9px;
           right:10px;
           font-size:.7em;
           background:blue;
           color:white;
           width:18px;height:18px;
           text-align: center;
           border-radius:50%;
           box-shadow:0 0 1px #333;
        }
        .scroll{
            float:left;
            width:400px;
            overflow-y: auto;
            height: 300px;
        }
           a.nav-link1.active{
             background: #000 !important;
             border-radius: 5px !important;
        }
        a:hover{
            color:#6a7df1 !important;
        }
        li.nav-item1 > a > img{
        width: 15px !important;
    }
    li.nav-item1{
        padding: 5px !important;
    }

    a {
    color: #cecece !important;
}

@media (min-width: 320px) and (max-width: 780px) {
       .nav-link1 {
            padding-left: 10px !important; 
        }
        
         
 }
    </style>
        }
</head>

<body>
    <div class="wrapper">
        <!--=================================
            preloader -->
       <!--  <div id="pre-loader">
            <img src="{{url('public/assets/user-images/loader-01.svg')}}" alt="">
        </div> -->
        <!--=================================
            preloader -->
        <!--=================================
            header start-->
        <nav  class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <!-- logo -->
            <div class="text-left navbar-brand-wrapper">
                <a class="navbar-brand brand-logo" href=""><img
                        src="{{url('public/assets/user-images/color-logo.png')}}" alt=""></a>
                <a class="navbar-brand brand-logo-mini" href=""><img
                        src="{{url('public/assets/user-images/logo-res.png')}}" alt=""></a>
            </div>
            <!-- Top bar left -->
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item">
                    <!-- <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left"
                        href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a> -->
                </li>
            </ul>
            <!-- top bar right -->
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item dropdown" id="notification">
                         <a id="navbarDropdown" class="nav-link bell" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa fa-bell"></i>
                            @if(auth()->user()->unreadnotifications->count())
                                <span class="badge badge-light">{{ auth()->user()->unreadnotifications->count() }}</span>
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right scroll" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('usermarkRead') }}">Mark All as Read</a>
                            @foreach(auth()->user()->unreadnotifications as $notification)
                                <a style="background-color: lightgray;" class="dropdown-item" href="{{url('/')}}{{@$notification->data['url']}}">{{$notification->data['data']}}<br>
                                <small style="color: blue;">{{$notification->created_at->diffForHumans()}}</small></a>
                                
                            @endforeach
                            @foreach(auth()->user()->readnotifications as $notification)
                                <a class="dropdown-item" href="{{url('/')}}{{@$notification->data['url']}}">{{$notification->data['data']}}<br>
                                    <small style="color: blue;">{{$notification->created_at->diffForHumans()}}</small></a>
                                
                            @endforeach
                            
                        </div>
                    </li>
                <li class="nav-item dropdown mr-30">
                    <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <img src="@if(Auth::user()->profile_image == str_replace(" ",""," default.png"))
                            {{url('public/default.png')}} @else
                            {{url('public/profile-images')}}/{{Auth::user()->profile_image}} @endif " alt=" avatar">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header">
                            <div class="media">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-0">{{ Auth::user()->first_name}} {{ Auth::user()->last_name }}
                                    </h5>
                                    <span>{{ Auth::user()->email }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                class="text-danger ti-unlock"></i>Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!--=================================
            header End-->



 <nav style="margin-top: 25px;"  class="navbar navbar-expand-lg  bg-dark">
              <a class="navbar-brand" href="#">Menu</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               
                <img src="{{url('public/assets/images/icons8-menu-24.png')}}">
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-top: 5px;">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item nav-item1">
                    <a href="{{url('user/courses')}}" class="nav-link1 nav-link courses">
                        <img src="{{url('public/assets/user-images/menu1.png')}}">
                        <span class="right-nav-text">Courses</span>
                    </a>
                   </li>
                   <li class="nav-item nav-item1 ">
                    <a href="{{url('user/certificates')}}" class="nav-link1 nav-link certificates">
                        <img src="{{url('public/assets/user-images/menu2.png')}}">
                        <span class="right-nav-text">Certificates</span>
                    </a>
                   </li>
                   <li class="nav-item nav-item1">
                    <a href="{{url('user/ebooks')}}" class="nav-link1 nav-link ebooks">
                        <img src="{{url('public/assets/user-images/menu3.png')}}">
                        <span class="right-nav-text">Ebooks</span>
                    </a>
                   </li>
                   <li class="nav-item nav-item1">
                    <a href="{{url('user/reviews')}}" class="nav-link1 nav-link reviews">
                        <i class="fa fa-star-o" style="font-size: 20px;color: white; margin-right: 3px;"></i>
                        <span class="right-nav-text" style="position: relative;">Reviews</span>
                    </a>
                   </li>
                   <li class="nav-item nav-item1">
                    <a href="{{url('user/setting')}}" class="nav-link1 nav-link setting">
                        <img src="{{url('public/assets/user-images/menu4.png')}}">
                        <span class="right-nav-text">Settings </span></a>
                   </li>
                   <li class="nav-item nav-item1">
                      <a href="{{url('user/report-problem')}}" class="nav-link1 nav-link report">
                        <img src="{{url('public/assets/user-images/menu6.png')}}">
                        <span class="right-nav-text">Report an issue </span>
                     </a>
                   </li>
                 <!--   <li class="nav-item ">
                    <a href="{{url('user/report-problem')}}" class="report">
                        <img src="{{url('public/assets/user-images/menu6.png')}}">
                        <span class="right-nav-text">Report an issue </span>
                    </a>
                   </li> -->
                 <!--   <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Courses
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">   
                       <a class="nav-link all-courses" href="{{ route('courses.index') }}">All Courses</a>
                         <div class="dropdown-divider"></div>
                       <a class="nav-link add-courses" href="{{ route('courses.create') }}">Add Course</a>
                    </div>
                   </li> -->
                <!--    <li class="nav-item ">
                    <a class="nav-link reviews" href="{{url('admin/reviews')}}">
                        <i class="fa fa-fw fa-star"></i>Reviews 
                    </a>
                    </li> -->
                 <!--    <li class="nav-item">
                    <a class="nav-link all-courses" href="{{ url('admin/report-problem') }}"><i class="fa fa-question"></i> Problems Report</a>
                  </li> -->
                </ul>
             
              </div>
            </nav>
        <!--=================================-->
        <div class="container-fluid">
       


            <div class="row">
                
                <div class="content-wrapper">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-sm-9">
                                @yield('content-heading')
                                @yield('dashboard-welcome')
                            </div>
                            <div class="col-sm-3">
                                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                                    @yield('breadcrumb')
                                </ol>
                            </div>
                        </div>
                    </div>

                    @if(session('message') == "verify" && !session('resent') && !session('verified'))
                    <div class="card-body p-0 m-0">
                        <div class="alert alert-danger" role="alert">
                            <h6 class="alert-heading">Alert! Verify Your Email Address</h6>
                            <p>A fresh verification link has been sent to your email address.If you did not receive the
                                email. <a href="{{route('resend')}}"
                                    style="color: #1c95fd;text-decoration: underline;">click here</a> to request
                                another.</p>
                        </div>
                    </div>
                    @endif
                    @if(session('resent'))
                    <div class="card-body p-0 m-0">
                        <div class="alert alert-success" role="alert">
                            <h6 class="alert-heading">New verification link has been sent Successfully!</h6>
                            <p>Please Verify Your Email Address.If you did not receive the email. <a
                                    href="{{route('resend')}}" style="color: #1c95fd;text-decoration: underline;">click
                                    here</a> to request another.</p>
                        </div>
                    </div>
                    @endif
                    @if(session('verified'))
                    <div class="alert alert-success">Email has been verified Successfully!</div>
                    @endif
                    @if(session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                    @endif
