@extends('home.includes.layout')
@section('section-1')
<div class="container login-page-container">
    <div class="row">
         <div class="col-lg-6 pd-r pd-0">
            <div class="bg-log">
               <div class="logowrap">
                  <img src="{{url('public/assets/user-images/logo.png')}}">
               </div>
               <div class="btm-part-m">
                  <ul class="icons-lg">
                     <li><a><img src="{{url('public/assets/user-images/lo1.png')}}"></a></li>
                     <li><a><img src="{{url('public/assets/user-images/lo2.png')}}"></a></li>
                     <li><a><img src="{{url('public/assets/user-images/lo3.png')}}"></a></li>
                  </ul>
                  <div class="clearfix"></div>
                  <div class="btm-links">
                     <p class="pushtop-10" >Don't have an account?</p>
                     <p class="antu"><a href="{{url('signup')}}" > Sign Up</a></p>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-6 pd-0 right-side">
            <div class="login-side">
               <form id="login-form">
                  
                  <div class="form-group">
                     <input type="text" placeholder="Email" name="email">
                  </div>
                  <div class="form-group">
                     <input type="password" placeholder="Password" name="password">
                  </div>
                  <div class="radio">
                     <label><input type="checkbox" name="remember_me" checked>Remember Me</label>
                  </div>
                  <div class="form-group">
                     <button type="submit" class="btn-login form-submit-btn">Login</button>
                  </div>
                  <a href="#" class="forget-pass" data-toggle="modal" data-target="#forgot">Forgot Password?</a>
               </form>
            </div>
         </div>
      </div>
  </div>
@endsection
@push('style')
  <style type="text/css">
    .login-page-container{
      padding: 10% 16% 2%;
    }
    .login-page-container .row{
      box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
      /*height: 460px;*/
    }
    .login-page-container .row .col-lg-6{
      height: 100%;
    }
    .right-side{
      background-image: linear-gradient(243deg, #0048ec 0%, #4dd8bc 100%);
    }
    .bg-log{
      padding: 1px 1px 0px 0px;
      border-radius: 0px !important;
    }
    .login-side {
      padding: 55px 30px 73px 30px;
    }
    .btn-login{
      border: 1px solid #001c4c;
      border-radius: 0;
    }
    .form-group input{
      border-radius: 0px;
      font-size: 12px;
    }
    .forget-pass,.checkbox label, .radio label{
      color:white;
      padding-left: 0px;
    }
    .forget-pass:hover{
      color: white !important;
    }
    .btn-login:hover{
      background: #001c4c;
      opacity: 0.9;
    }
    #topbar{
      background-image: linear-gradient(243deg, #0048ec 0%, #4dd8bc 100%);
    }
    .bg-ftr{
      display: none;
    }
    label.error{
      padding:5px 0px 0px 0px;
      text-transform: capitalize;
      color: darkred;
    }
    .back-to-top{
      display: none !important;;
    }
    .modal-open .modal{
      padding-left: 0px !important;
    }
    @media (min-width: 320px) and (max-width: 480px) {
      .login-page-container .row .col-lg-6{
        padding:0px !important;
      }
      .login-page-container{
        padding: 0px;
      }

    }
  </style>
@endpush

