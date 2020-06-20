@extends('user.includes.layout')

@section('content')
<style type="text/css">
  .tabbable > .nav-tabs > li {
    width: 50%!important;
    font-size: 20px;
    text-align: center;
   } 
   .tabbable > .nav-tabs > li a{
    padding: 18px;
   }
   .nav-tabs > li.active > a, .nav-tabs > li.active a:focus, .nav-tabs > li.active a:hover {
    color: #6754e2;
}

.rating {
  display: inline-block;
  position: relative;
  height: 50px;
  line-height: 50px;
  font-size: 50px;
}

.rating label {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  cursor: pointer;
}

.rating label:last-child {
  position: static;
}

.rating label:nth-child(1) {
  z-index: 5;
}

.rating label:nth-child(2) {
  z-index: 4;
}

.rating label:nth-child(3) {
  z-index: 3;
}

.rating label:nth-child(4) {
  z-index: 2;
}

.rating label:nth-child(5) {
  z-index: 1;
}

.rating label input {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
}

.rating label .icon {
  float: left;
  color: transparent;
}

.rating label:last-child .icon {
  color: #d1d1d1;
}

.rating:not(:hover) label input:checked ~ .icon,
.rating:hover label:hover input ~ .icon {
  color: orange;
}

.rating label input:focus:not(:checked) ~ .icon:last-child {
  color: #000;
  text-shadow: 0 0 5px orange;
}
div.con{
  float: right;
  margin:25px 5px;
}
.seo_service_item{
  @if(Request::is('user/review-history'))
    padding-bottom: 127px!important;
  @else
    padding-bottom: 30px!important;
  @endif
}
.seo_service_item.name{
  text-align: center; padding-bottom: 60px!important;padding-left: 20px;
    padding-right: 20px;
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
                    <h2>Course Reviews</h2>
                </div>
                </div>
               
              </div>

            
            <div class="row">


          <!-- Tabbable Widget -->
          <div class="tabbable paper-shadow relative" data-z="0.5">

            <!-- Tabs -->
            <ul class="nav nav-tabs" style="overflow-x: hidden;">
              <li class="@if(Request::is('user/reviews')) active @endif"><a href="{{url('user/reviews')}}"></i> <span class="tab-item">Leave A Review</span></a></li>
              <li class="@if(Request::is('user/review-history')) active @endif"><a href="{{url('user/review-history')}}"> <span class="tab-item">History</span></a></li>
             
            </ul>
            <!-- // END Tabs -->
            
          </div>
          @if(Request::is('user/reviews'))
          @foreach($courses as $key => $course)
              <div class="row" style="margin: 30px 0 30px;">
                    <div class="col-md-3">
                      <div class="seo_service_item name">
                                <div class="img">
                                  <img style="height: 110px;" src="{{url('public/courses-icons')}}/{{$course->course_icon}}" alt="Course Thumbnail">
                                </div>
                                 <div class="panel-heading">
                                  <div class="media media-clearfix-xs-min v-middle">
                                    <div class="media-body text-caption text-blue">
                                      <a href="#">{{str_replace('<br>', ' ', $course->course_title)}}<br></a>
                                    </div>

                                    </div>
                                  </div>
                                   
                              </div>
                      
                    </div>
                    <div class="col-md-9">
                      <div class="seo_service_item">
                          <form class="rating-form" action="{{url('user/create-review')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$course->id}}">
                              <!-- Rating Stars Box -->
                                <div class='rating-stars text-center'>
                                  <ul id='stars'>
                                    <li class='star' title='Poor' data-value='1'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='Fair' data-value='2'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='Good' data-value='3'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='Excellent' data-value='4'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='WOW!!!' data-value='5'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                  </ul>
                                </div>
                                <div class='success-box'>
                                </div>
                                <br><br>
                                <div class="form-group" style="margin-top: 38px;">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Share your experience with us! Let us know how can we improve" name="body" required=""></textarea>
                                </div>
                            <input type="submit" value="Submit Review" class="btn btn-white w3-animate-bottom btn-flat paper-shadow relative rating-submit" data-z="0" data-hover-z="1" data-animated />
                          </form>
                      </div>
                    
                </div>
              
             </div>
              @endforeach
          <!-- // END Tabbable Widget -->
            @endif
            @if(Request::is('user/review-history'))
            @foreach($reviews as $key => $review)
            <div class="row" style="margin: 30px 0 30px;">
              <div class="col-md-3">
                <div class="seo_service_item" style="text-align: center; padding-bottom: 60px!important;">
                    <div class="img">
                      <img src="{{url('public/courses-icons')}}/{{$review->reviewrateable->course_icon}}" alt="Course thumbnail" style="height: 110px;">
                    </div>
                     <div class="panel-heading">
                      <div class="media media-clearfix-xs-min v-middle">
                        <div class="media-body text-caption text-blue">
                          <a href="#">{{$review->reviewrateable->course_title}}<br></a>
                        </div>

                        </div>
                      </div>
                       
                  </div>
                
              </div>
              <div class="col-md-9">
                <div class="seo_service_item">
                     <div class="row">
                         <div class="col-md-8">
                          <h2>Review</h2>
                           <p>
                            {{$review->title}}
                           </p>
                         </div>
                       <input id="rated" type="hidden" name="total-rating" value="{{$review->rating}}">
                        <div class="col-md-4">
                          <div class='rating-stars text-center'>
                                  <ul id='stars'>
                                    <li class='star @if($review->rating >= 1) selected @endif' title='Poor' data-value='1'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star @if($review->rating >= 2) selected @endif' title='Fair' data-value='2'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star @if($review->rating >= 3) selected @endif' title='Good' data-value='3'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star @if($review->rating >= 4) selected @endif' title='Excellent' data-value='4'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star @if($review->rating >= 5) selected @endif' title='WOW!!!' data-value='5'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                  </ul>
                                </div>
                        </div>
                     
                   </div>

                    
                    
                    
                </div>
                
              </div>
              
            </div>
            @endforeach
          <!-- // END Tabbable Widget -->
            @endif
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
@if(Request::is('user/review-history'))
<script>
    var onStar = parseInt($('#rated').val());
    // console.log(onStar);
    var stars = $(this).parent().children('li.star');
    $("li").removeClass('hover');
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
  </script>
@else
<script type="text/javascript">

  $(document).ready(function(){
  
  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
  
  
  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    
    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    var msg = "";
    if (ratingValue > 1) {
        msg = ratingValue ;
    }
    else {
        msg = ratingValue ;
    }
    responseMessage(msg);
    
  });
  
  
});


function responseMessage(msg) {
  $('.success-box').fadeIn(200);  
  // $('.success-box').html("<input type='hidden' name='rating'>" + msg + "</span>");
  $('.success-box').html('<input type="hidden" name="rating" value="'+ msg +'" />');

}

$(document).ready(function(){  
    $(".rating-submit").click(function(){  
        if($("li").hasClass("selected")){
            return true;
        }else{
          alert('Please chose rating.')
        };  
    });  
});  
</script>
@endif
<style type="text/css">
 /* Rating Star Widgets Style */
.rating-stars ul {
  list-style-type:none;
  padding:0;
  
  -moz-user-select:none;
  -webkit-user-select:none;
}
.rating-stars ul > li.star {
  display:inline-block;
  float: left;
  
}

/* Idle State of the stars */
.rating-stars ul > li.star > i.fa {
  font-size: 45px; /* Change the size of the stars */
  color:#ccc; /* Color on idle state */
}

/* Hover state of the stars */
.rating-stars ul > li.star.hover > i.fa {
  color:#FFCC36;
}

/* Selected state of the stars */
.rating-stars ul > li.star.selected > i.fa {
  color:#FF912C;

}

</style>
@endsection