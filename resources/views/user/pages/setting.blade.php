@extends('user.includes.layout')
@section('content-heading')
   <h4 class="mb-0">Settings</h4>
@stop
@section('breadcrumb')
   <li class="breadcrumb-item"><a href="{{url('user/courses')}}" class="default-color">Home</a></li>
  <li class="breadcrumb-item">Setting</li>
@endsection
@section('content')
@if ($errors->any())
   <div class="row">
      <div class="col-xl-9">
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
       </div>
   </div>
@endif
@if(session('message'))
   <div class="row">
      <div class="col-xl-9">
         {!! session('message') !!}
      </div>
   </div>
@endif
   <div class="row">
      <div class="col-xl-9 mb-30">
         <div class="card h-100">
            <div class="d-block d-md-flexx justify-content-between">
               <div class="d-block">
                  <h5 class="card-title-s">Update Profile information</h5>
               </div>
            </div>
            <div class="card-body">
               <div class="fom">
                  <form action="{{route('profile.update')}}" method="post" id="profile-update" enctype="multipart/form-data">
                     @csrf
                     <h3 class="mb-2">Profile Picture</h3>
                     <input type="file" accept="image/*" class="d-none" id="file" name="profile_image">
                     <button type="button" id="choose-file" class="gradiant choose mb-4">Choose File</button>
                     <div class="clearfix"></div>
                     <div class="fom-control">
                        <label>Email</label>
                        <input type="email" value="{{Auth::user()->email}}" class="required" placeholder="Enter Email" name="email" required="">
                     </div>
                     <button type="submit" class="gradiant choose mt-20">Submit</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-3">
         <div class="card h-62">
            <div class="card-body">
               <div class="profile">
                  <img id="profile-image" src="@if(Auth::user()->profile_image == "default.png") {{url('public/default.png')}} @else  {{url('public/profile-images')}}/{{Auth::user()->profile_image}} @endif">
                  <div class="efew">
                     <h4>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h4>
                     <p>{{ Auth::user()->email }}</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-xl-9 mb-30">
         <div class="card h-100">
            <div class="d-block d-md-flexx justify-content-between">
               <div class="d-block">
                  <h5 class="card-title-s">Update Password</h5>
               </div>
            </div>
            <div class="card-body">
               <form action="{{route('password.reset')}}" method="post" id="password-update" enctype="multipart/form-data">
                     @csrf
                  <div class="fom-control">
                     <label>Old Password</label>
                     <input type="password" placeholder="Old Password" name="old_password" class="required" required="">
                  </div>
                  <div class="fom-control">
                     <label>New Password</label>
                     <input type="password" id="password" class="required" placeholder="Password" name="password" required="">
                  </div>
                  <div class="fom-control">
                     <label>Confirm Password</label>
                     <input type="password" class="required" required="" placeholder="Repeat Password" name="password_confirmation">
                  </div>
                  <button type="submit" class="gradiant choose mt-20">Submit</button>
               </form>
            </div>
         </div>
      </div>
   </div>
@endsection

@section('script')
<script type="text/javascript">
   $(".side-menu-fixed .side-menu li a").removeClass("active");
   $(".setting").addClass('active');
   // 
   $("#profile-update").validate();
   $("#password-update").validate({
       rules : {
         old_password : {
             minlength : 6,
         },
         password : {
             minlength : 6,
         },
         password_confirmation : {
              minlength : 6,
              equalTo : "#password"
          }
       }
   });
   
   function readURL(input) {
     if (input.files && input.files[0]) {
       var reader = new FileReader();
       reader.onload = function(e) {
         $('#profile-image').attr('src', e.target.result);
       }
       reader.readAsDataURL(input.files[0]);
     }
   }
   $("#file").change(function() {
     readURL(this);
   });
   // 
   $("#choose-file").click(function(){
      $("#file").trigger("click");
   })
</script>
@endsection
