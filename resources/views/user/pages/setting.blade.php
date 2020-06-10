@extends('user.includes.layout')

@section('content')
<style>
input[type="file"] {
  height: 0;
  overflow: hidden;
  width: 0;
  
}

#file{
  display: none !important;
}

[type="file"] + label {
  margin-left: 2%;
      height: 29px !important;
  background: white;
  border: none;
  border-radius: 50px;
  color: blue;
  cursor: pointer;
  display: inline-block;
    font-family: 'Poppins', sans-serif;
    font-size: inherit;
  font-weight: 400;
  margin-bottom: 1rem;
  outline: none;
  padding: 4px 13px;
  position: relative;
  transition: all 0.3s;
  vertical-align: middle;
  -webkit-box-shadow: 0px 1px 15px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 1px 15px 0px rgba(0,0,0,0.75);
box-shadow: 0px 0px 7px 4px rgb(245, 245, 245);
  }

 [type="file"] + label:hover {
    background-color: #6754e2;
    color: white;
  }

</style>

    <!-- content push wrapper -->
    <div class="st-pusher" id="conte">

      <!-- sidebar effects INSIDE of st-pusher: -->
      <!-- st-effect-3, st-effect-6, st-effect-7, st-effect-8, st-effect-14 -->

      <!-- this is the wrapper for the content -->
      <div class="st-content">
    
        <!-- extra div for emulating position:fixed of the menu -->
        <!-- extra div for emulating position:fixed of the menu -->

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">

          <div class="container-fluid">
             <div class="media v-middle">
                <div class="media-body">
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
                   <div class="seo_sec_title wow fadeInUp" data-wow-delay="0.3s">
                    <h2>Manage your account</h2>
                </div>
                </div>
               
              </div>


            <div class="page-section third">

              <!-- Tabbable Widget -->
              <div class="tabbable paper-shadow relative" data-z="0.5">

                <!-- Tabs -->
               
                <!-- // END Tabs -->

                <!-- Panes -->
                <div class="tab-content">

                  <div id="account" class="tab-pane active">
                    <form action="{{route('profile.update')}}" method="post" id="profile-update" enctype="multipart/form-data" class="form-horizontal">
                      @csrf
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Profile Picture</label>
                        <div class="col-md-6">
                          <div class="media v-middle">
                            <div class="media-left">
                              <div class="icon-block width-100 bg-grey-100 img-preview">
                                <img style="height: 103px;width: 100px;" id="profile-image" src="@if(Auth::user()->profile_image == "default.png") {{url('public/default.png')}} @else  {{url('public/profile-images')}}/{{Auth::user()->profile_image}} @endif">
                              </div>
                            </div>
                            <div class="media-body">
                              <input type="file" id="file" accept="image/*" class="btn btn-white btn-sm paper-shadow relative" name="profile_image" />
                              <label for="file" />ADD IMAGE</label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Full Name</label>
                        <div class="col-md-8">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-control-material">
                                <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Your first name" required="" name="first_name" value="{{ Auth::user()->first_name }}">
                                <label for="exampleInputFirstName">Full Name</label>
                              </div>
                            </div>
                            <!-- <div class="col-md-6">
                              <div class="form-control-material">
                                <input type="text" class="form-control" id="exampleInputLastName" placeholder="Your last name" required="" name="last_name" value="{{ Auth::user()->last_name }}">
                                <label for="exampleInputLastName">Last Name</label>
                              </div>
                            </div> -->
                          </div>
                        </div>
                      </div>
                      
                     
                      <div class="form-group margin-none">
                        <div class="col-md-offset-2 col-md-10">
                          <button type="submit" class="btn btn-white btn-flat paper-shadow relative" data-z="0.5" data-hover-z="1" data-animated>Change name</button>
                        </div>
                      </div>
                    </form>
                  </div>

                </div>
              </div>

                <!-- // END Panes -->


                 <div class="page-section">
              <div class="media v-middle">
                <div class="media-body">
                  <h1 class="text-display-1 margin-none">Change Email</h1>
                </div>
                
              </div>
            </div>


            <div class="page-section third">

              <!-- Tabbable Widget -->
              <div class="tabbable paper-shadow relative" data-z="0.5">

                <!-- Tabs -->
               
                <!-- // END Tabs -->

                <!-- Panes -->
                <div class="tab-content">

                  <div id="account" class="tab-pane active">
                    <form action="{{route('profile.updateEmail')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                      @csrf
                      <div class="form-group">
                        <label for="inputemail3" class="col-md-2 control-label">Old Email</label>
                        <div class="col-md-6">
                          <div class="form-control-material">
                            <input type="email" class="form-control" id="inputPassword3" placeholder="Email" name="old_email" value="{{Auth::user()->email}}">
                            <label for="inputemail3">Enter Old Email</label>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputemail4" class="col-md-2 control-label">New Email</label>
                        <div class="col-md-6">
                          <div class="form-control-material">
                            <input type="email" class="form-control" id="inputemail3" placeholder="Email" name="email" value="{{old('email')}}">
                            <label for="inputemail4">Enter New Email</label>
                          </div>
                        </div>
                      </div>
                     

                      <div class="form-group">
                        <label for="inputemail5" class="col-md-2 control-label">Confirm Email</label>
                        <div class="col-md-6">
                          <div class="form-control-material">
                            <input type="email" class="form-control" id="inputPassword3" placeholder="Email" name="confirm_email" value="{{old('confirm_email')}}">
                            <label for="inputPassword3">Enter Confirm Email</label>
                          </div>
                        </div>
                      </div>
                     
                     
                      <div class="form-group margin-none">
                        <div class="col-md-offset-2 col-md-10">
                          <button type="submit" class="btn btn-white btn-flat paper-shadow relative" data-z="0.5" data-hover-z="1" data-animated>Save Changes</button>
                        </div>
                      </div>
                    </form>
                  </div>

                </div>
              </div>
            

              </div>
               <div class="page-section">
              <div class="media v-middle">
                <div class="media-body">
                  <h1 class="text-display-1 margin-none">Change Password</h1>
                </div>
                
              </div>
            </div>


            <div class="page-section third">

              <!-- Tabbable Widget -->
              <div class="tabbable paper-shadow relative" data-z="0.5">

                <!-- Tabs -->
               
                <!-- // END Tabs -->

                <!-- Panes -->
                <div class="tab-content">

                  <div id="account" class="tab-pane active">
                    <form class="form-horizontal" action="{{route('password.reset')}}" method="post" id="password-update" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label for="inputPassword3" class="col-md-2 control-label">Old Password</label>
                        <div class="col-md-6">
                          <div class="form-control-material">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="old_password">
                            <label for="inputPassword3">Enter Old Password</label>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputPassword3" class="col-md-2 control-label">New Password</label>
                        <div class="col-md-6">
                          <div class="form-control-material">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
                            <label for="inputPassword3">Enter New Password</label>
                          </div>
                        </div>
                      </div>
                     

                      <div class="form-group">
                        <label for="inputPassword3" class="col-md-2 control-label">Confirm Password</label>
                        <div class="col-md-6">
                          <div class="form-control-material">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="confirm_password">
                            <label for="inputPassword3">Enter Confirm Password</label>
                          </div>
                        </div>
                      </div>
                     
                     
                      <div class="form-group margin-none">
                        <div class="col-md-offset-2 col-md-10">
                          <button type="submit" class="btn btn-white btn-flat paper-shadow relative" data-z="0.5" data-hover-z="1" data-animated>Save Changes</button>
                        </div>
                      </div>
                    </form>
                  </div>

                </div>
              <!-- // END Tabbable Widget -->

            </div>

          </div>

        </div>
        <!-- /st-content-inner -->

      </div>
      <!-- /st-content -->

    </div>
    <!-- /st-pusher -->

    <!-- Footer -->
    <footer class="footer">
      <strong>PROMASTERS: GLOBAL INSTITUTE FOR
PROFESSIONAL STUDIES</strong> &copy; Copyright 2020
    </footer>
    <!-- // Footer -->

  </div>
  <!-- /st-container -->
@endsection

@section('script')
<script>
  function readURL(input) {
     if (input.files && input.files[0]) {
       var reader = new FileReader();
       reader.onload = function(e) {
          // $('.img-preview').remove();
          $('#profile-image').remove();
          $('.img-preview').append('<img id="profile-image" src="'+e.target.result+'" width="100" height="103"/>');
       }
       reader.readAsDataURL(input.files[0]);
     }
   }

   $("#file").change(function () {
      readURL(this);
  });
</script>
@endsection
