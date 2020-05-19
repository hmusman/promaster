@extends('user.includes.layout')

@section('content')
<style>
  .disabled{
      pointer-events: none;
      opacity: 0.4;
  }
</style>
      <!-- content push wrapper -->
    <div class="st-pusher" id="conte">

      <!-- sidebar effects INSIDE of st-pusher: -->
      <!-- st-effect-3, st-effect-6, st-effect-7, st-effect-8, st-effect-14 -->

      <!-- this is the wrapper for the content -->
      <div class="st-content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner padding-top-none">

          <div class="container-fluid">

             <div class="media v-middle">
                <div class="media-body">
                   <div class="seo_sec_title wow fadeInUp" data-wow-delay="0.3s">
                   <a class="btn btn-save btn-blue w3-animate-bottom btn-flat paper-shadow relative" data-z="0" data-hover-z="1" data-animated href="{{url('user/courses')}}"><i class="fa fa-chevron-left" aria-hidden="true"></i> Save & Continue</a>
                </div>
                </div>
               
              </div>
        <div class="row">
          <div class="col-md-8">
            <div class="media v-middle">
                <div class="media-body">
                   <div class="seo_sec_title wow fadeInUp" data-wow-delay="0.3s">

                    <div class="panel-heading">
                            <div class="media  v-middle">
                              <div class="media-body text-caption text-blue"><h2>
                            <img src="{{url('public/course-thumbnails')}}/{{$course->course_thumbnail}}" alt="">
                          {{$course->course_title}}</h2>
                              </div>
                              <div class="media-right">
                                 <h5 class="autoplay">
                                  AutoPlay
                                 </h5>
                               </div>
                              <div class="media-right">
                                 <label class="switch">
                                  <input type="checkbox">
                                  <span class="slider round"></span>
                                </label>
                              </div>

                              <div class="media-right">
                                <div class="canvas-holder" >
                                  <canvas id="canvas" width="300" height="300" style="height: 80px;width: 80px;margin-top: -27px;"></canvas>
                                  <div id="canvas-data" class="matter" style="margin-left: 25px;margin-top: -54px;font-size: 16px;"></div>
                                  <!-- <span class="completed">Completed</span> -->
                               </div>
                                <!-- <div class="c100 p60 blue">
                                    <span>60%</span>
                                    <div class="slice">
                                      <div class="bar"></div>
                                      <div class="fill"></div>
                                    </div>
                                </div> -->
                              </div>
                            
                        </div>
                       </div>

                       <div class="main">
                        @foreach($course->getTableOfContent as $key => $content)
                          <div class="mySlides">
                            <img src="{{url('public/table-of-content')}}/{{@$content->lesson_content}}">
                            <div class="video-title" style="margin-top: -10px;background: white;height: 75px;">
                               <h3 style="padding: 4px 0px 0px 12px;">{{@$content->lesson_title}}</h3>
                            </div>
                          </div>
                           @endforeach
                          <!--  <div class="row" style="margin-top: -7%;position: absolute;padding-left: 70%;">
                             <div class="col-sm-12 action-btns">
                                @if(@$course->getPercentage($course->id) == 1)
                                  <a href="{{url('user/download-certificate')}}" onclick="event.preventDefault();document.getElementById('download-certificate-{{$key}}').submit();" target="_blank" class="btn-d gradiant"><i class="fa fa-download mr-2" aria-hidden="true"></i>Certificate</a>
                                  <a href="{{url('user/download')}}" onclick="event.preventDefault();document.getElementById('download-ebook').submit();" class="btn-d gradiant" style="margin:0px !important;"><i class="fa fa-download mr-2" aria-hidden="true"></i>Ebook</a>
                                  <form id="download-certificate-{{$key}}" target="_blank" action="{{url('user/download-certificate')}}" method="post">
                                  @csrf
                                    <input type="hidden" name="id" value="{{Crypt::encrypt($course->id)}}">
                                  </form>
                                  <form id="download-ebook" action="{{url('user/download')}}" method="post">
                                      @csrf
                                    <input type="hidden" name="id" value="{{Crypt::encrypt($course->id)}}">
                                  </form>
                                @endif
                             </div>
                          </div> -->
                      </div>
                </div>

                </div>
               
              </div>
            

          </div>
          <div class="col-md-4">
            <div class="panel panel-default curriculum open paper-shadow" data-z="0.5">
              <div class="panel-heading panel-heading-gray"  data-target="#curriculum-1">
                <div class="media">
                  <div class="media-left">
                    <span class="icon-block img-circle bg-indigo-300 half text-white"><i class="fa fa-list-alt" aria-hidden="true"></i></span>
                  </div>
                  
                  <div class="media-body">
                    <h4 class="text-headline">Table of Contents</h4>
                    
                  </div>
                </div>
                
              </div>
              <div class="list-group collapse in" id="curriculum-1">
                 @foreach($course->getTableOfContent as $key => $content)
                 <div class="list-group-item media active" data-target="#">
                  <!-- <div class="media-left">
                    <div class="text-crt"><i class="fa fa-play-circle active"></i> </div>
                  </div> -->
                  <div class="media-body">
                    <li @if($content->status($content->id,$key)) style="background: url({{url('public/assets/images/completed.png')}}) -1px -2px no-repeat;" @endif class="vasko @if(!$content->status($content->id,$key)) disabled @endif" id="slide-{{$key+1}}" count="{{$key+1}}" content-id="{{$content->id}}" onclick="currentSlide('{{$key+1}}')">
                           <h6 style="margin-left: 28px;margin-top: -17px;" class="content-title"><span style="margin-right: 12px;">{{$key+1}}-</span>  {{@$content->lesson_title}}</h6>
                        </li>
                  </div>
                  
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>

            

           

          </div>

        </div>
        <!-- /st-content-inner -->

      </div>
      <!-- /st-content -->

    </div>
    <!-- /st-pusher -->

@endsection

@section('script')
 @if(@$course->getPercentage($course->id) < 1)
 <script type="text/javascript">
   $(".vasko").last().click(function(){
       $.ajax({
        url : "{{url('user/log-course-complete')}}",
        type : "POST",
        data : {"id":"{{$course->id}}"},
        success:function(data){
          $(".action-btns").html(data);
        }
      })
   })
   // 
   $(document).delegate(".vasko","click",function(){
      $(".vasko").removeClass("active");
      $(this).addClass("active");
      var contentID = $(this).attr("content-id");
      var count = parseInt($(this).attr("count"));
      $.ajax({
        url : "{{url('user/mark-complete')}}",
        type : "POST",
        data : {"_token": "{{ csrf_token() }}","contentID":contentID},
        success:function(data){
            if(data != "false")
            progressBar(canvas,span,data);
            $("#slide-"+count).css("background","url({{url('public/assets/images/completed.png')}}) -1px -2px no-repeat");
            $("#slide-"+(count-1)).css("background","url({{url('public/assets/images/completed.png')}}) -1px -2px no-repeat");
            $("#slide-"+(count+1)).removeClass("disabled");
        }
      })
   })
 </script>
 @endif
<script type="text/javascript">
   $(".disabled").first().prev().addClass('active');
   $(".disabled").first().removeClass('disabled');
   // 
   $(".side-menu-fixed .side-menu li a").removeClass("active");
   $(".courses").addClass('active');
   //
   var canvas = document.getElementById('canvas');
   var span = document.getElementById('canvas-data');
   percentage = "{{@$course->getPercentage($course->id)}}";
   progressBar(canvas,span,percentage);
   // 
   var slideIndex = 1;
   showSlides(slideIndex);
   function plusSlides(n) {
     showSlides(slideIndex += n);
   } 
   function currentSlide(n) {
     showSlides(slideIndex = n);
   }
   function showSlides(n) {
     var i;
     var slides = document.getElementsByClassName("mySlides");
     var dots = document.getElementsByClassName("dot");
     if (n > slides.length) {slideIndex = 1}    
     if (n < 1) {slideIndex = slides.length}
     for (i = 0; i < slides.length; i++) {
         slides[i].style.display = "none";  
     }
     slides[slideIndex-1].style.display = "block";  
   }
   // 
</script>
@endsection
