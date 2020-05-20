<!DOCTYPE html>
<html class="st-layout ls-top-navbar-large ls-bottom-footer show-sidebar sidebar-l1 sidebar-r3" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="{{url('public/userDashboard/images/icon-pro.png')}}" type="image/x-icon">
  <title>ProMaster | My Courses</title>

  <!-- Vendor CSS BUNDLE
    Includes styling for all of the 3rd party libraries used with this module, such as Bootstrap, Font Awesome and others.
    TIP: Using bundles will improve performance by reducing the number of network requests the client needs to make when loading the page. -->
  <link href="{{url('public/userDashboard/css/vendor/all.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{url('public/userDashboard/css/vendor/themify-icon/themify-icons.css')}}">


<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    
    <!--icon font css-->
    
    <link rel="stylesheet" href="{{url('public/userDashboard/css/style.css')}}">
    <link rel="stylesheet" href="{{url('public/userDashboard/css/responsive.css')}}">

  <!-- Vendor CSS Standalone Libraries

        NOTE: Some of these may have been customized (for example, Bootstrap).
        See: src/less/themes/{theme_name}/vendor/ directory -->
  <!-- <link href="css/vendor/bootstrap.css" rel="stylesheet"> -->
  <link href="{{url('public/userDashboard/css/vendor/font-awesome.css')}}" rel="stylesheet">
  <!-- <link href="css/vendor/picto.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/material-design-iconic-font.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/datepicker3.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/jquery.minicolors.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/railscasts.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/owl.carousel.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/slick.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/daterangepicker-bs3.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/jquery.bootstrap-touchspin.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/select2.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/jquery.countdown.css" rel="stylesheet"> -->

  <!-- APP CSS BUNDLE [css/app/app.css]
INCLUDES:
    - The APP CSS CORE styling required by the "html" module, also available with main.css - see below;
    - The APP CSS STANDALONE modules required by the "html" module;
NOTE:
    - This bundle may NOT include ALL of the available APP CSS STANDALONE modules;
      It was optimised to load only what is actually used by the "html" module;
      Other APP CSS STANDALONE modules may be available in addition to what's included with this bundle.
      See src/less/themes/html/app.less
TIP:
    - Using bundles will improve performance by greatly reducing the number of network requests the client needs to make when loading the page. -->
  <link href="{{url('public/userDashboard/css/app/app.css')}}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{url('public/userDashboard/css/app/pg.css')}}">
  <!-- <link href="{{url('public/userDashboard/css/app/review.css')}}" rel="stylesheet"> -->
  <!-- App CSS CORE
This variant is to be used when loading the separate styling modules -->
  <!-- <link href="css/app/main.css" rel="stylesheet"> -->

  <!-- App CSS Standalone Modules
    As a convenience, we provide the entire UI framework broke down in separate modules
    Some of the standalone modules may have not been used with the current theme/module
    but ALL modules are 100% compatible -->

  <!-- <link href="css/app/essentials.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/material.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/layout.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/sidebar.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/sidebar-skins.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/navbar.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/messages.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/media.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/charts.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/maps.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/colors-alerts.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/colors-background.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/colors-buttons.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/colors-text.css" rel="stylesheet" /> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries
WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!-- If you don't need support for Internet Explorer <= 8 you can safely remove these -->
  <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<style type="text/css">
  @if(Request::is('user/courses'))
  .seo_service_item {
    padding: 12px!important;

   }
   @endif
   .seo_service_area{
    margin-bottom: 60px!important;
   }
   .seo_service_item div.img:hover{
    -ms-transform: scale(1.1); /* IE 9 */
  -webkit-transform: scale(1.1); /* Safari 3-8 */
  transform: scale(1.1); 
}
   .seo_service_item div.img{
    transition: transform .2s;
    margin:20px;
    text-align: center;
   }
   .seo_service_item div.con{
   text-align: center;
   margin:20px;
   }
   .w3-animate-opacity {
    animation: opac 1.5s!important;
}
.w3-animate-bottom {
    animation: animatebottom 1.4s!important;
}
.media-right i.fa{
  font-size: 25px;
    color: #36bc3f;
    line-height: 57px;
    margin-right: 4px;
}
 .panel-heading {
    margin-top: 20px;
    background: white;
  }
  .panel{
    margin:20px 0 60px!important;
  }
   span.pending{
    background-color: orange!important;
    color: white;
    border-radius: 6px;
    padding: 4px;
  }
  span.solved{
    background-color: #6754e2!important;
    color: white;
    border-radius: 6px;
    padding: 4px;
  }
   span.awaiting{
    background-color: #65a6bc!important;
    color: white;
    border-radius: 6px;
    padding: 4px;
  }
  .margin-25{
    margin-left: 21px;
    margin-top: 21px;
  }
  .form-control-material .form-control {
    padding: 11px 0 13px;
  }
  .btn-flat {
    margin-top: 12px;}
    .seo_sec_title h2 {
      margin-left: 20px;
    }
    span.awaiting-mobile{
      display: none;
    }
    @media only screen and (max-width: 500px) {
      span.awaiting-mobile{
      display: block;
      background-color: #65a6bc!important;
    color: white;
    border-radius: 6px;
    padding: 4px;
    }
     span.awaiting{
    display: none;
     }
     .margin-25{
      margin-left: 0!important;
     }
     .table > tbody > tr > td{
      padding: 6px!important;
     }
    }
</style>

</head>

<body style="overflow-y: hidden;">

  <!-- Wrapper required for sidebar transitions -->
  <div class="st-container">

    <!-- Fixed navbar -->
    <div class="navbar navbar-size-large navbar-default navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="navbar-brand   navbar-brand-logo navbar-nav-padding-left">
            <a href="{{url('/')}}" title=""><img src="{{url('public/userDashboard/images/logo-pro.png')}}"></a>
          </div>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="main-nav">
          <ul class="nav navbar-nav mobile">
            <li class="dropdown @if(Request::is('user/courses')) active @endif">
              <a href="{{url('user/courses')}}" ><i class="fa fa-graduation-cap" aria-hidden="true"></i> My Courses </a>
              
            </li>
             <li class="dropdown @if(Request::is('user/certificates')) active @endif">
              <a href="{{url('user/certificates')}}" ><i class="fa fa-certificate" aria-hidden="true"></i> My Certificates </a>
              
            </li>
            <li class="dropdown @if(Request::is('user/ebooks')) active @endif">
              <a href="{{url('user/ebooks')}}" > <i class="fa fa-book" aria-hidden="true"></i> My eBooks </a>
              
            </li>
            <li class="dropdown @if(Request::is('user/deals') || Request::is('user/pro-deals')) active @endif">
              <a href="{{url('user/deals')}}" ><i class="fa fa-users" aria-hidden="true"></i> Member Deals </a>
              
            </li>
             <li class="dropdown @if(Request::is('user/reviews') || Request::is('user/review-history')) active @endif">
              <a href="{{url('user/reviews')}}" ><i class="fa fa-star" aria-hidden="true"></i> Course Reviews </a>
              
            </li>
             <li class="dropdown @if(Request::is('user/report-problem')) active @endif">
              <a href="{{url('user/report-problem')}}" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Send A Ticket</a>
              
            </li>
            
          </ul>
          <ul class="nav navbar-nav navbar-nav-bordered navbar-right">
            <!-- notifications -->
            <li class="dropdown notifications updates">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="notification">
                <i class="fa fa-bell-o"></i>
                @if(auth()->user()->unreadnotifications->count())
                <span class="badge badge-primary">{{ auth()->user()->unreadnotifications->count() }}</span>@endif
              </a>
              <ul class="dropdown-menu" role="notification">
                <li class="dropdown-header">Notifications <h6><a class="dropdown-item" style="font-size: 8px;float: right;margin-top: -23px;" href="{{ route('usermarkRead') }}">Mark All as Read</a></h6></li>
                @foreach(auth()->user()->unreadnotifications as $notification)
                <a  href="{{url('/')}}{{@$notification->data['url']}}" title=""><li class="media">
                  
                  <div class="pull-right">
                    <span class="label label-success">New</span>
                  </div>
                  <div class="media-body">
                    {{$notification->data['data']}}
                    <br/>
                    <span class="text-caption text-muted" style="font-size: 14px;">{{$notification->created_at->diffForHumans()}}</span>
                  </div>

                </li></a>
                @endforeach
                @foreach(auth()->user()->readnotifications as $notification)
                <a  href="{{url('/')}}{{@$notification->data['url']}}" title=""><li class="media">
                  
                  <div class="media-body">
                    {{$notification->data['data']}}
                    <br/>
                    <span class="text-caption text-muted" style="font-size: 14px;">{{$notification->created_at->diffForHumans()}}</span>
                  </div>

                </li></a>
                @endforeach
                <!-- <li class="media">
                  <div class="pull-right">
                    <span class="label label-success">New</span>
                  </div>
                 
                  <div class="media-body">
                   Dear your report has been solved..
                    <br/>
                    <span class="text-caption text-muted">3 hrs ago</span>
                  </div>
                </li>
                <li class="media">
                  <div class="media-body">
                    Dear your report has been solved.
                    <p>
                      <span class="text-caption text-muted">1 day ago</span>
                    </p>
                    
                  </div>
                </li> -->
              </ul>
            </li>
            <!-- // END notifications -->
            <!-- User -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle user" data-toggle="dropdown">
                <img src="@if(Auth::user()->profile_image == str_replace(" ",""," default.png"))
                            {{url('public/default.png')}} @else
                            {{url('public/profile-images')}}/{{Auth::user()->profile_image}} @endif " alt="Bill" class="img-circle" width="40" /> {{Auth::user()->first_name}} <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu">
                <li><a><span class="name">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span> <br>
                  {{Auth::user()->email}}
                </a></li>
                <li><a href="{{url('user/setting')}}"><i class="fa fa-cog" aria-hidden="true"></i> Settings</a></li>

                <li><a href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-lock" aria-hidden="true"></i> Logout</a></li>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->

      </div>
    </div>
    <div class="sec-menu desktop" >
      <div class="collapse navbar-collapse" id="main-nav">
          <ul class="nav navbar-nav">
            <li class="dropdown @if(Request::is('user/courses')) active @endif">
              <a href="{{url('user/courses')}}" ><i class="fa fa-graduation-cap" aria-hidden="true"></i> My Courses </a>
              
            </li>
             <li class="dropdown @if(Request::is('user/certificates')) active @endif">
              <a href="{{url('user/certificates')}}" ><i class="fa fa-certificate" aria-hidden="true"></i> My Certificates </a>
              
            </li>
            <li class="dropdown @if(Request::is('user/ebooks')) active @endif">
              <a href="{{url('user/ebooks')}}" > <i class="fa fa-book" aria-hidden="true"></i> My eBooks </a>
              
            </li>
            <li class="dropdown @if(Request::is('user/deals') || Request::is('user/pro-deals')) active @endif">
              <a href="{{url('user/deals')}}" ><i class="fa fa-users" aria-hidden="true"></i> Member Deals </a>
              
            </li>
             <li class="dropdown @if(Request::is('user/reviews') || Request::is('user/review-history')) active @endif">
              <a href="{{url('user/reviews')}}" ><i class="fa fa-star" aria-hidden="true"></i> Course Reviews </a>
              
            </li>
             <li class="dropdown @if(Request::is('user/report-problem')) active @endif">
              <a href="{{url('user/report-problem')}}" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Send A Ticket</a>
              
            </li>
            
          </ul>
          
        </div>
      
    </div>

