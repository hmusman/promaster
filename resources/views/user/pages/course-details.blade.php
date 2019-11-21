@extends('user.includes.layout')
@section('content-heading')
   <a class="back gradiant" href="{{url('user/courses')}}"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>
   <style type="text/css">
      .disabled{
          pointer-events: none;
          opacity: 0.4;
      }
      .content-title{
        margin-left: 5px;
      }
      .adat li.active{
        text-decoration: underline !important;
      }
      .action-btns{
        text-align: end;
        position: absolute;
        right: 0px;
        bottom: 0px;
        padding-right:0px;
      }
      .action-btns a{
        display: inline-block;
        margin-right:5px;
        font-size:12px;
      }
   </style>
@stop

@section('content')
   <div class="row">
      <div class="col-xl-12 mb-30">
         <div class="card h-100">
            <div class="card-body">
               <div class="row">
                  <div class="col-xl-2">
                     <img class="brdo" src="{{url('public/course-thumbnails')}}/{{$course->course_thumbnail}}">
                  </div>
                  <div class="col-xl-8">
                     <div class="wrap-u">
                        <h3>{{$course->course_title}}</h3>
                        <p>{{$course->course_description}}</p>
                     </div>
                  </div>
                  <div class="col-xl-2">
                     <div class="canvas-holder" >
                        <canvas id="canvas" width="300" height="300"></canvas>
                        <div id="canvas-data" class="matter"></div>
                        <span class="completed">Completed</span>
                     </div>
                     <div class="clearfix"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--  -->
   <div class="row">
      <div class="col-xl-9 mb-30">
         <div class="card">
            <div class="card-body">
               <div class="slideshow-container">
                   @foreach($course->getTableOfContent as $key => $content)
                     <div class="mySlides ">
                        <img src="{{url('public/table-of-content')}}/{{@$content->lesson_content}}" style="width:100%">
                        <div class="video-title">
                           <h3>{{@$content->lesson_title}}</h3>
                        </div>
                     </div>
                  @endforeach
                    <div class="row">
                       <div class="col-sm-4">
                       </div>
                       <div class="col-sm-8 action-btns">
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
                    </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-3 mb-30 ht">
         <div class="card scroll">
            <div class="card-body pd0">
               <div class="list-watch">
                  <h3>Table of Contents</h3>
                  <ul class="adat" id="myDIV">
                     @foreach($course->getTableOfContent as $key => $content)
                        <li @if($content->status($content->id,$key)) style="background: url({{url('public/assets/images/completed.png')}}) 8px 15px no-repeat;" @endif class="vasko @if(!$content->status($content->id,$key)) disabled @endif" id="slide-{{$key+1}}" count="{{$key+1}}" content-id="{{$content->id}}" onclick="currentSlide('{{$key+1}}')">
                           <h2 class="content-title"><span>{{$key+1}}</span>{{@$content->lesson_title}}</h2>
                        </li>
                     @endforeach
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
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
        data : {"contentID":contentID},
        success:function(data){
            if(data != "false")
            progressBar(canvas,span,data);
            $("#slide-"+count).css("background","url({{url('public/assets/images/completed.png')}}) 8px 15px no-repeat");
            $("#slide-"+(count-1)).css("background","url({{url('public/assets/images/completed.png')}}) 8px 15px no-repeat");
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
