<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('public/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{url('public/assets/vendor/fonts/circular-std/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('public/assets/libs/css/style.css')}}">
    <link rel="stylesheet" href="{{url('public/assets/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{url('public/assets/vendor/charts/chartist-bundle/chartist.css')}}">
    <link rel="stylesheet" href="{{url('public/assets/vendor/charts/morris-bundle/morris.css')}}">
    <link rel="stylesheet" href="{{url('public/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{url('public/assets/vendor/charts/c3charts/c3.css')}}">
    <link rel="stylesheet" href="{{url('public/assets/vendor/fonts/flag-icon-css/flag-icon.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('public/assets/vendor/datatables/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{url('public/assets/vendor/bootstrap-select/css/bootstrap-select.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap-notifications@1.0.3/dist/stylesheets/bootstrap-notifications.min.css">
    <title>ProMaster Admin</title>
    <style type="text/css">
        .gradiant {
            background: #00eda4;
            background: -moz-linear-gradient(left, #00eda4 0%, #1d93ff 100%);
            background: -webkit-linear-gradient(left, #00eda4 0%,#1d93ff 100%);
            background: linear-gradient(to right, #00eda4 0%,#1d93ff 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00eda4', endColorstr='#1d93ff',GradientType=1 );
        }
       .choose {
            padding: 10px 15px;
            color: #fff;
            text-align: center;
            border-radius: 40px;
            display: block;
            width: 150px;
            border: none;
            cursor: pointer;
        }
        .font-size{
            font-size: 12px !important;
        }
        .bell{
            font-size: 17px;
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

        .nav-link.active{
     background: linear-gradient(-150deg, #172a8a, #28549d);
    border-radius: 5px;

        }
        .bg-dark{
             background: linear-gradient(-150deg, #12b4c8, #6669e6) !important;
        }
      
         li.nav-item:hover{
             background: linear-gradient(-150deg, #172a8a, #28549d);
        border-radius: 5px;
        }

        a.dropdown-item{
            color: black !important;
        }

        li {
        margin-right: 5px !important;
        }
        .dropdown-menu.show > a:hover {
            color: black !important;
 
        }

       .dropdown-menu.show > a {
           color: #3d405c !important;
        }
        .nav-link{
            padding:12px;
        }
        .navbar-nav .nav-link{
            color: white !important;
        }
        @media (min-width: 320px) and (max-width: 980px) {
               
                 .bg-dark{
                     margin-top:10px;
                }
                .navbar-nav.mr-auto{
                    padding: 15px !important;
                }
                .bg-dark{
                    margin-top:25px;

                }
         }
    </style>
</head>

    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="{{url('admin')}}">Admin Panel</a>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item1 dropdown" id="notification">
                        
                         <a id="navbarDropdown" class="nav-link bell" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i style="color: gray;" class="fa fa-bell"></i>
                            @if(auth()->user()->unreadnotifications->count())
                                <span class="badge badge-light">{{ auth()->user()->unreadnotifications->count() }}</span>
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right scroll" style="background: white;position: absolute;" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route ('markRead') }}">Mark All as Read</a>
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
                    <li class="nav-item1 dropdown mr-3">
                             <a  style="color: gray !important; " id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->first_name }}<span class="caret"></span>
                        </a>
                        
                        <div class="dropdown-menu dropdown-menu-right" style="background: white;position: absolute;" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('admin.logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                       

                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>

            <!-- left sidebar -->
 <nav class="navbar navbar-expand-lg  bg-dark">
  <a class="navbar-brand" href="#" style="color: #fff!important">Menu</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <img src="{{url('public/assets/images/icons8-menu-24.png')}}">
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link dashboard" href="{{url('admin')}}">
            <i class="fa fa-fw fa-user-circle"></i>Dashboard 
        </a>
       </li>
       <li class="nav-item ">
        <a class="nav-link users" href="{{url('admin/users')}}">
            <i class="fa fa-fw fa-users"></i>Users 
        </a>
       </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Courses
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">   
           <a class="nav-link all-courses" href="{{ route('courses.index') }}">All Courses</a>
             <div class="dropdown-divider"></div>
           <a class="nav-link add-courses" href="{{ route('courses.create') }}">Add Course</a>
        </div>
       </li>
       <li class="nav-item ">
        <a class="nav-link reviews" href="{{url('admin/reviews')}}">
            <i class="fa fa-fw fa-star"></i>Reviews 
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link all-courses" href="{{ url('admin/report-problem') }}"><i class="fa fa-question"></i> Problems Report</a>
      </li>
    </ul>
 
  </div>
</nav>
        <!-- ============================================================== -->
        <!-- <div class="nav-left-sidebar ">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item">
                                <a class="nav-link dashboard" href="{{url('admin')}}">
                                    <i class="fa fa-fw fa-user-circle"></i>Dashboard 
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link users" href="{{url('admin/users')}}">
                                    <i class="fa fa-fw fa-users"></i>Users 
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link courses" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fab fa-fw fa-wpforms"></i>Courses</a>
                                <div id="submenu-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link all-courses" href="{{ route('courses.index') }}">All Courses</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link add-courses" href="{{ route('courses.create') }}">Add Course</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link reviews" href="{{url('admin/reviews')}}">
                                    <i class="fa fa-fw fa-star"></i>Reviews 
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link all-courses" href="{{ url('admin/report-problem') }}"><i class="fa fa-question"></i> Problems Report</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div> -->
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper" style="margin-left:0px; ">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="page-header">
                                <h2 class="pageheader-title">@yield('pageheader-title')</h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            @yield('breadcrumb')
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 text-right">
                             @yield('button')
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->