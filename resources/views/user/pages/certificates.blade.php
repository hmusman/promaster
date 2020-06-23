@extends('user.includes.layout')

@section('content')

<style type="text/css">
  .modal-header .close {
      margin-top: -24px;
  }
  .seo_service_item {
    padding: 20px!important;
    height: 344px;
   }
   .media.v-middle .media-body{
    text-align: center;
   }
   .seo_sec_title{
    text-align: left;
   }
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
   margin:20px 0;
   }
     .w3-animate-opacity {
    animation: opac 1.5s!important;
}
.w3-animate-bottom {
    animation: animatebottom 1.4s!important;
}
.btn {
  font-size: 12px!important;
}
.icon i{
  font-size: 20px!important;
  vertical-align: sub;
  padding: 0px 1px 0px;
  font-size: 25px!important;
} 

.fa-envelope:before {
    font-size: 26px!important;
}
.tool {
  position: relative;

}

.tool .tooltiptext {
  visibility: hidden;
  width: 130px;
  background-color: black;
  color: #fff;
  font-size: 12px;
  margin-top: 6px;
  text-align: center;
  border-radius: 6px;
  padding: 3px 0;
  
  /* Position the tooltip */
  position: absolute;
  z-index: 1;
  top: 100%;
  left: 50%;
  margin-left: -60px;
}

.tool:hover .tooltiptext {
  visibility: visible;
}
.text-caption.text-blue a:hover{
  text-decoration: none!important;
}

</style>


    <!-- content push wrapper -->
    <div class="st-pusher" id="conte">

      <!-- sidebar effects INSIDE of st-pusher: -->
      <!-- st-effect-3, st-effect-6, st-effect-7, st-effect-8, st-effect-14 -->

      <!-- this is the wrapper for the content -->
      <div class="st-content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner padding-none">

          <div class="container-fluid">

            
              <div class="media v-middle">
                <div class="media-body">
                   <div class="seo_sec_title wow fadeInUp" data-wow-delay="0.3s">
                      @if (Session::has('message'))
                       <div class="row">
                          <div class="col-xl-9 alert alert-success" style="margin-top: 1%;padding-left: 3%;">
                             {{ Session::get('message') }}
                          </div>
                       </div>
                    @endif
                    <h2>My Certificates</h2>
                </div>
                </div>
               
              </div>
       
            <section class="seo_service_area" style="margin-bottom: 200px;">
           
                
                <div class="row seo_service_info">
                    @if(count($pcourses) > 0)
                    @foreach($pcourses as $key=>$course)
                    <div class="column w3-animate-opacity">
                        <div class="seo_service_item">
                          <div class="img">
                            <img style="height: 119px;" src="{{url('public/courses-icons')}}/{{$course->course_icon}}" alt="Course Tubmnail">
                          </div>
                           <div class="panel-heading">
                            <div class="media media-clearfix-xs-min v-middle">
                              <div class="media-body text-caption text-blue">
                                <a href="#"><?php echo strip_tags($course->course_title, '<br>') ?></a>
                              </div>
                        </div>
                       </div>
                       @if(@$course->getPercentage($course->id) == 1)
                       <div class="con">
                               <a class="icon w3-animate-bottom tool"data-z="0" data-hover-z="1" data-animated href="{{url('user/download-certificate')}}" onclick="event.preventDefault();document.getElementById('download-certificate-{{$key}}').submit();"><i class="fa fa-download" ></i></i>
                                 <span class="tooltiptext">Download</span>
                               </a>
                               
                              
                               <a onclick="return !window.open(this.href, 'Facebook', 'width=640,height=300')" class="icon w3-animate-bottom tool"  data-z="0" data-hover-z="1" data-animated href="https://www.facebook.com/sharer/sharer.php?u=https://promastersgips.com/&quote=I just received my certificate in {{str_replace('<br>', ' ',$course->course_title)}} from Promasters: Global Institute for Professional Studies"><i class="fa fa-facebook-square"  aria-hidden="true"></i>
                                 <span class="tooltiptext">Share on Facebook</span>
                               </a>

                                <a class="icon w3-animate-bottom tool" data-z="0" data-hover-z="1" data-animated href="#"><i class="fa fa-twitter-square"  aria-hidden="true"></i>
                                  <span class="tooltiptext">Share on Twitter</span>
                                </a>

                                 <!-- <a class="icon w3-animate-bottom tool" data-z="0" data-hover-z="1" data-animated href="#"><i class="fa fa-instagram" aria-hidden="true"></i>
                                  <span class="tooltiptext">Share on Instagram</span>
                                 </a> -->
                                @php 
                                  $state = substr(str_shuffle("0123456789abcHGFRlki"), 0, 10);
                                  $url = "https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=77bbhtl3l7n2on&redirect_uri=".env('REDIRECT_URI')."&scope=".env('SCOPES')."&state=".$state;
                                @endphp
                                <input type="hidden" id="cIds" name="course_id" value="{{$course->id}}">
                                <a class="icon w3-animate-bottom tool" data-z="0" data-hover-z="1" data-animated href="<?php echo $url; ?>"><i class="fa fa-linkedin-square" aria-hidden="true" data-course="{{$course->id}}"></i>
                                  <span class="tooltiptext">Share on LinkedIn</span>
                                </a>
                                
                                <a class="icon w3-animate-bottom tool email-share" data-z="0" data-hover-z="1" data-animated href="#" data-toggle="modal" data-target=".buy" data-course="{{$course->id}}" data-course-title="{{str_replace('<br>', ' ', $course->course_title)}}" data-course-description="{{$course->course_description}}"><img src="{{url('public/userDashboard/images/mail.png')}}" width="21.5px" style="margin-top: -4px;">
                                  <span class="tooltiptext">Share via Email</span>
                                </a>

                                <form id="download-certificate-{{$key}}" target="_blank" action="{{url('user/download-certificate')}}" method="post">
                                @csrf
                                  <input type="hidden" name="id" value="{{Crypt::encrypt($course->id)}}">
                              </form>
                            </div>
                            @else
                            <div class="con">
                              <span style="font-size: 10px;background: #7cddf2;">Please Complete this course to download and share certificate.</span><br>
                              <a style="margin-top: -1px;" class="btn btn-white w3-animate-bottom btn-flat paper-shadow relative" data-z="0" data-hover-z="1" data-animated="" href="{{url('user/course-details')}}/{{$course->id}}">Continue</a>
                            </div>  
                            @endif
                       </div>
                    </div>
                    @endforeach
                    @else
                     <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                           <div class="alert alert-info" style="margin-left: 3%;"><i class="fa fa-exclamation-triangle  mr-2"></i>No Certificate(s) Found!</div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10" style="margin-left: 2%;">
                           <a class="price_btn btn_hover mt_30" href="{{url('/') . '#courses'}}" title="Purchase Courses Or Deals" style="width: 100%;text-align: center;border-radius: 50px;">Purchase Courses Or Deals</a>
                        </div>
                     </div>
                     @endif
                    

                </div>
                 
            </div>
        </section>
          

            

           
          </div>
      

            
          </div>

        </div>
        <!-- /st-content-inner -->

      </div>
      <!-- /st-content -->

    </div>
    <!-- /st-pusher -->
<div class="modal fade buy" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Share Certificate via Email</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('user/share-certificate-email')}}" method="POST" class="login-form" id="email-form" >
                    @csrf
                    <div class="form-group text_box">
                        <label class="f_p text_c f_400">Email</label>
                        <input type="email" id="email" placeholder="promaster@gmail.com" name="email" value="{{ old('email')}}" required="">
                        <div class="alert-danger" id="emailError"></div>
                    </div>
                    <div class="form-group text_box">
                        <label class="f_p text_c f_400">Subject</label>
                        <input type="text" id="subject" placeholder="Your Email Subject" name="subject" value="{{ old('subject')}}">
                         <div class="alert-danger" id="subjectError"></div>
                    </div>
                    <div class="form-group text_box">
                        <label class="f_p text_c f_400">Body</label>
                        <textarea name="body" id="body" placeholder="Your Email Body">{{ old('body')}}</textarea>
                        <div class="alert-danger" id="bodyError"></div>
                    </div>
                    <button type="submit" class="btn_three send-email" style="text-align: center;">Send Email</a>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script') 
<script>
  
  $('.fa-linkedin-square').on('click', function(){
    var ids = $(this).attr('data-course');
    console.log(ids);
    $.ajax({
      url: '<?php echo url('save/course') ?>',
      type: 'GET',
      data: {'id':ids},
    })
  })
</script>
<!-- <script type="text/javascript">
   $(".side-menu-fixed .side-menu li a").removeClass("active");
   $(".certificates").addClass('active');
   //
   @foreach($courses as $key=>$course) 
      var canvas = document.getElementById('canvas-{{$key}}');
      var span = document.getElementById('canvas-data-{{$key}}');
      percentage = "{{@$course->getPercentage($course->id)}}";
      progressBar(canvas,span,percentage);
   @endforeach
</script> -->
<script>

  $('.email-share').on('click', function(){
       var course_id = $(this).attr('data-course');
       var course_title = $(this).attr('data-course-title');
       var course_description = $(this).attr('data-course-description');

       console.log(course_id);
       console.log(course_title);
       console.log(course_description);

       $('#subject').val($('#subject').val() + "I just completed my certificate in "+course_title+" from Promasters: Global Institute for Professional Studies.");

       $('#body').val($('#body').val() + course_description);

       $('#email-form').append('<input type="hidden" id="course_id" name="course_id" value="'+course_id+'">')



  });

  // $('.send-email').on('click', function(){

  //   var course_id = document.getElementById('course_id').value;
  //   var email = document.getElementById('email').value;
  //   var suject = document.getElementById('subject').value;
  //   var body = document.getElementById('body').value;
  //   console.log(email);
  //   console.log(course_id);
  //   console.log(subject);
  //   console.log(body);

  //   var url = $('#email-form').attr('action');
  //   var method = $('#email-form').attr('method');

  //   $.ajax({
  //      url: url,
  //      type: method,
  //      data: {"_token": "{{ csrf_token() }}", 'email': email, 'subject': subject, 'body': body},
  //      success: function(response){
  //         console.log('im success function.');
  //      },
  //     error: function(response){
  //             $('#emailError').text(response.responseJSON.errors.email);
  //             $('#subjectError').text(response.responseJSON.errors.subject);
  //             $('#bodyError').text(response.responseJSON.errors.body);
  //         }
  //   })

  // });
</script>
@endsection
