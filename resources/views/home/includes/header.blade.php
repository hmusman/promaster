<!DOCTYPE html>
<html lang="zxx">
   <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      
      <meta name="viewport" content="width=device-width, initial-scale=1"/>
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <title>ProMaster</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <link rel="stylesheet" href="{{url('public/assets/lib/slick/slick.css')}}">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700%7CWork+Sans:400,500,600,700">
      <link rel="stylesheet" href="{{url('public/assets/lib/font-awesome/css/font-awesome.min.css')}}">
      <link rel="stylesheet" href="{{url('public/assets/css/main.css')}}">
      <link rel="stylesheet" href="{{url('public/assets/css/owl.carousel.min.css')}}">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">


        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="shortcut icon" type="image/x-icon" href="{{url('images/fav.png')}}">
        <!-- bootstrap v4 css -->
        <link rel="stylesheet" type="text/css" href="{{url('public/assets/newtheme/css/bootstrap.min.css')}}">
        <!-- font-awesome css -->
        <link rel="stylesheet" type="text/css" href="{{url('public/assets/newtheme/css/font-awesome.min.css')}}">
        <!-- animate css -->
        <link rel="stylesheet" type="text/css" href="{{url('public/assets/newtheme/css/animate.css')}}">
        <!-- hover css -->
        <link rel="stylesheet" type="text/css" href="{{url('public/assets/newtheme/css/hover-min.css')}}">
        <!-- owl.carousel css -->
        <link rel="stylesheet" type="text/css" href="{{url('public/assets/newtheme/css/owl.carousel.css')}}">
        <!-- slick css -->
        <link rel="stylesheet" type="text/css" href="{{url('public/assets/newtheme/css/slick.css')}}">
        <!-- off canvas css -->
        <link rel="stylesheet" type="text/css" href="{{url('public/assets/newtheme/css/off-canvas.css')}}">
        <!-- flaticon css  -->
        <link rel="stylesheet" type="text/css" href="{{url('public/assets/newtheme/fonts/flaticon.css')}}">
        <!-- rsmenu CSS -->
        <link rel="stylesheet" type="text/css" href="{{url('public/assets/newtheme/css/rsmenu-main.css')}}">
        <!-- magnific popup css -->
        <link rel="stylesheet" type="text/css" href="{{url('public/assets/newtheme/css/magnific-popup.css')}}">
        <!-- rsmenu transitions CSS -->
        <link rel="stylesheet" type="text/css" href="{{url('public/assets/newtheme/css/rsmenu-transitions.css')}}">
        <!-- style css -->
        <link rel="stylesheet" type="text/css" href="{{url('public/assets/newtheme/style.css')}}">
        <!-- switch color presets css -->
        <link id="switch_style" href="#" rel="stylesheet" type="text/css')}}">
        <!-- Spacing css -->
        <link rel="stylesheet" type="text/css" href="{{url('public/assets/newtheme/css/spacing.css')}}">
        <!-- responsive css -->
        <link rel="stylesheet" type="text/css" href="{{url('public/assets/newtheme/css/responsive.css')}}">
      @stack('style')
      <style>
@media print {
  #google_translate_element {display: none;}
}
body > .skiptranslate {
    display: none;
}
body {
    top: 0px !important; 
}
.goog-te-banner-frame.skiptranslate {
    display: none !important;
}
#google_translate_element{
    position: absolute;
    top: 33px;
    right: 247;
}
</style>
   </head>
   <body>



      <header>
         <nav class="side-menu-container" id="mobile-menu">
            <ul class="mx-auto top-level clearfix">
               <li class="with-submenu">
                  <a href="#">Home<span class="arrow"></span></a>
               </li>
               <li class="with-submenu">
                  <a href="#">About Us<span class="arrow"></span></a>
               </li>
               <li class="with-submenu">
                  <a href="#">Our Values<span class="arrow"></span></a>
               </li>
               <li class="with-submenu">
                  <a href="#">Contact</a>
               </li>
               @auth
                  <li>
                     <a href="{{url('cart')}}" class="link-hover cart-count">Cart
                        @inject('cart','App\Http\Controllers\home\cartController')
                        @if($cart->cartCount() > 0) 
                           <span class="badge badge-light">{{$cart->cartCount()}}</span>
                        @endif
                     </a>
                  </li>
                  <li class="with-submenu" style='margin-right: 50px;'>
                     <a href="{{url('user/courses')}}" class="link-hover">Dashbaord</a>
                  </li>
                  <li class="with-submenu" style='margin-right: 50px;'>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form-home').submit();" class="link-hover"><i class="fa fa-sign-out" style="padding-right: 5px;"></i><span>Logout</span></a>
                        <form id="logout-form-home" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                     </li>
               @endauth
               @guest
                  <li class="with-submenu">
                     <a href="{{url('login')}}" >Login</a>
                  </li>
                  <li class="with-submenu">
                     <a href="{{url('signup')}}">Sign Up</a>
                  </li>
               @endguest
            </ul>
         </nav>
         <div class="pos-r" >
            <div id="topbar" class="clearfix bgs">
               <div class="top-util pull-right">
                  <div class="side-menu">
                     <a href="#" class="side-menu-button"><span></span><span></span><span></span></a>
                  </div>
               </div>
               <div class="logo pull-left">
                  <a href="{{url('/')}}">
                     <img style="width: 80%;" src="{{url('public/assets/user-images/logo-white.png')}}" alt="logo">
                  </a>
               </div>
               <nav id="desktop-menu">
                  <ul class="mx-auto top-level clearfix">
                     <li class="with-submenu">
                        <a href="{{url('/')}}" class="link-hover">Home</a>
                     </li>
                     <li class="with-submenu">
                        <a href="#about" class="link-hover">About Us</a>
                     </li>
                     <li class="with-submenu">
                        <a href="#value" class="link-hover">Our Values</a>
                     </li>
                     <li class="with-submenu">
                        <a href="#contact" class="link-hover">Contact</a>
                     </li>
                    <!--  <li class="with-submenu">
                        <a href="#" class="link-hover">
                            
                            <div id="google_translate_element"></div>
                            
                        </a>
                     </li>
                     <li class="with-submenu">
                        <a href="#" class="link-hover">Translator</a>
                     </li> -->
                  @auth
                     <li>
                        
                        <a href="{{url('cart')}}" class="link-hover cart-count">Cart
                           @inject('cart','App\Http\Controllers\home\cartController')
                           @if($cart->cartCount() > 0) 
                              <span class="badge badge-light">{{$cart->cartCount()}}</span>
                           @endif
                        </a>
                     </li>
                     <li class="with-submenu">
                        <a href="{{url('user/courses')}}" class="link-hover">Dashbaord</a>
                     </li>
                     <li class="with-submenu" style='margin-right: 50px;'>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="link-hover"><i class="fa fa-sign-out" style="padding-right: 5px;"></i><span>Logout</span></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                     </li>
                     
                  @endauth
                  @guest
                     <li class="with-submenu sign_in_wrapper">
                        <a href="{{url('login')}}" class="link-hover sign_in_btn">Login</a>
                     </li>
                     <li class="with-submenu">
                        <a href="{{url('signup')}}" class="demo">Sign Up</a>
                     </li>
                  @endguest
                  </ul>
               </nav>
            </div>
         </div>
         @yield('home-banner')
      </header>