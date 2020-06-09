@extends('user.includes.layout')

@section('content')
<style>
  .disabled {
    pointer-events: none;
    opacity: 0.4;
  }
  .text-caption h2 br {
        content: ' '
    }

    .text-caption h2 br:after {
        content: ' '
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
                      <div class="media-body text-caption text-blue">
                        <h2 style="font-size: 33px;">
                          <img src="{{url('public/courses-icons')}}/{{@$course->course_icon}}" alt="Course Icon">
                         <?php echo strip_tags($course->course_title, '<br>') ?></h2>
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

                        @php
                        $prgrs_bar_prcnt = round(@$course->getPercentage($course->id) * 100);
                        $prgrs_bar_cls_blue = 'p'.$prgrs_bar_prcnt .' blue';
                        $prgrs_bar_cls_green = 'p'.$prgrs_bar_prcnt .' green';
                        $prgrs_bar_cls = ($prgrs_bar_prcnt)=='100' ? ($prgrs_bar_cls_green) : ($prgrs_bar_cls_blue);
                        @endphp
                        <div class="c100 {{ $prgrs_bar_cls }}">
                          @if($prgrs_bar_prcnt == 100)
                          <span><i class="fa fa-check"></i></span>
                          @else
                          <span> {{ $prgrs_bar_prcnt."%" }}</span>
                          @endif
                          <div class="slice">
                            <div class="bar"></div>
                            <div class="fill"></div>
                          </div>
                        </div>
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

                  </div>
                </div>

              </div>

            </div>


          </div>
          <div class="col-md-4">
            <div class="panel panel-default curriculum open paper-shadow" data-z="0.5">
              <div class="panel-heading panel-heading-gray" data-target="#curriculum-1">
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


                <div class="slide-{{$key+1}} list-group-item media @if($content->status($content->id,$key)) active @endif" data-target="#">

                  <div class="media-left">
                    <div class="text-crt"><i class="fa fa-play-circle @if($content->status($content->id,$key)) active @endif slide-{{$key+1}}"></i> </div>
                  </div>
                  <div class="media-body vasko" count="{{$key+1}}" content-id="{{$content->id}}" onclick="currentSlide('{{$key+1}}')">
                    <?php $contentID = $content->id ;?>
                    {{@$content->lesson_title}}

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
@if(@$course->getPercentage($course->id) < 1) <script type="text/javascript">

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
  console.log(count + contentID);
  ajxProgressBar(contentID,count);
  })
  
  function ajxProgressBar(contentID,count){
    $.ajax({
  url : "{{url('user/mark-complete')}}",
  type : "POST",
  data : {"_token": "{{ csrf_token() }}","contentID":contentID},
  success:function(data){
  if(data != "false")
  console.log(data);
  circleBarFn(data);

  $(".slide-"+count).addClass("active");
  }
  })
  }
  </script>
  @endif
  <script type="text/javascript">
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      // console.log(n + " current slider fn");
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      if (n > slides.length) {
        slideIndex = 1
      }
      if (n < 1) {
        slideIndex = slides.length
      }
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slides[slideIndex - 1].style.display = "block";
    }

    function circleBarFn(data) {

      if (data != 'false') {
        data = (data * 100).toFixed(0);
        if (data == 100) {
          $('.c100').attr('class', 'c100').addClass("p" + data + " green");
          $('.c100 span').text("");
          $('.c100 span').append("<i class='fa fa-check'></i>");
        } else {
          $('.c100').attr('class', 'c100').addClass("p" + data + " blue");
          $('.c100 span').text(data + "%");
        }


      }

    }
    // 
    var countId = "";
    var contIdArr = [];
    var contentID = [];
  </script>
  @foreach($course->getTableOfContent as $key => $content)
  <script type="text/javascript">
    countId = "{{$key+1}}";
    contIdArr.push("{{$key+1}}");
    contentID.push("{{$content->id}}");
    // setTimeout($('.vasko').attr('count', countId).trigger("click"), 10000);
  </script>
  @endforeach
  <script type="text/javascript">
    var lastArrVal = contIdArr[contIdArr.length - 1];
    var i = 1;
    var t;
    $('input[type="checkbox"]').click(function() {
      if ($(this).prop("checked") == true) {
        console.log("checked");
        for (i = 1; i < contIdArr.length+1; i++){
          
          // var contentID = contentID;
          var count = i;
          doSetTimeout(i,contentID);
          $('input[type="checkbox"]').prop("disabled", true);
          // console.log( contentID[i]+" - " + count + " - ") ;
        }
        

      }
    //   else if($(this).prop("checked") == false){
    //      console.log("unchecked");
    //     //  clearTimeout(myVar);
    //     myStopFunction();
    // }
    });
    

    function doSetTimeout(i,contentID) {
      t =   setTimeout(function() { 
        showSlides(slideIndex = i);
        
        count = i ;
        if (contentID[i]!=[contIdArr.length - 1]) {
        
          ajxProgressBar(contentID[i],count ++);  
          console.log(contentID[i]+ " - "+ i);  
        }
        
        
      }, i * 12000);
      // console.log(t);
    }
    // function myStopFunction() {
    //   // console.log("method stopped" + t);
    //   clearTimeout(t);
    // }
    

    // function refresh(){
    //   window.location.reload();
    // }
    $(document).ready(function(){
        $('.c100').load(document.URL +  ' .c100');
      })
  </script>
  
  @endsection