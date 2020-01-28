@extends('user.includes.layout')
@section('content-heading')
<h4 class="mb-0">My Reviews</h4>
@stop
@section('breadcrumb')
   <li class="breadcrumb-item"><a href="{{url('user/courses')}}" class="default-color">Home</a></li>
  <li class="breadcrumb-item">My Reviews</li>
@endsection

@section('content')
  <div class="nav-pills-row">
    <ul class="nav nav-pills nav-justified">
      <li class="nav-item">
        <a class="nav-link nav-link2 @if(Request::is('user/reviews')) active-tab @endif" href="{{url('user/reviews')}}">To Be Reviewed</a>
      </li>
      <li class="nav-item">
        <a class="nav-link nav-link2 @if(Request::is('user/review-history')) active-tab @endif" href="{{url('user/review-history')}}">History</a>
      </li>
      </li>
    </ul>
  </div>
  {!! session('message') !!}
  @if(Request::is('user/review-history')) 
    @foreach($reviews as $key => $review)
        <div class="row">
              <div class="col-xl-12 mb-10">
                 <div class="card h-100">
                    <div class="card-body">
                       <div class="row">
                          <div class="col-xl-1">
                             <img class="brdo" src="{{url('public/course-thumbnails')}}/{{$review->course->course_thumbnail}}">
                          </div>
                          <div class="col-xl-11">
                             <div class="wrap-u">
                                <h3>{{$review->course->course_title}}</h3>
                                <label>Rating : </label>
                                <div class="rating" id="rating-{{$key}}"></div>
                                <p style="color: black;background-color: #E8E8ED;padding: 10px;">{{$review->title}}</p>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
           @push('script')
                <script type="text/javascript">
                      $("#rating-{{$key}}").rateYo({
                        rating: "{{$review->course->averageRating()}}",
                        readOnly: true,
                        starWidth: "18px"
                      });
                </script>
            @endpush
    @endforeach
  @endif

  @if(Request::is('user/reviews'))
    @foreach($courses as $key => $course)
        <div class="row">
              <div class="col-xl-12 mb-15">
                 <div class="card h-100">
                    <div class="card-body">
                       <div class="row">
                          <div class="col-xl-1">
                             <img class="brdo" src="{{url('public/course-thumbnails')}}/{{$course->course_thumbnail}}">
                          </div>
                          <div class="col-xl-11">
                            <form class="rating-form" action="{{url('user/create-review')}}" method="post">
                              @csrf
                               <div class="wrap-u">
                                  <h3>{{ucwords($course->course_title)}}</h3>
                                  <label>Rating : </label>
                                  <div class="rating" data-rateyo-rating=""></div>
                                  <input type="hidden" name="rating" class="rating">
                                  <input type="hidden" name="id" value="{{$course->id}}">
                                  <textarea class="form-control" name="body" cols="5" rows="5">
                                  
                                   </textarea>
                                   <br>
                                   <input type="submit" class="btn-k gradiant" value="Submit review">
                               </div>
                              </form>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
           @push('script')
                <script type="text/javascript">
                      $("div.rating").rateYo({
                        fullStar: true,
                        starWidth: "20px",
                        rating    : 1.6,
                      });
                </script>
            @endpush
    @endforeach
  @endif
   
@endsection
@section('script')
<script type="text/javascript">
   $(".side-menu-fixed .side-menu li a").removeClass("active");
   $(".reviews").addClass('active');
   $("div.rating").rateYo().on("rateyo.change", function (e, data) {
      var rating = data.rating;
      $(this).next("input.rating").val(rating);
    });
   $(document).delegate('.rating-form','submit',function(e){
      
      var obj = $(this).children('.wrap-u');
      if($.trim(obj.children('textarea').val()) == ""){
        e.preventDefault();
        Command: toastr["error"]("Please write Review");
      }
      if($.trim(obj.children('input.rating').val()) == ""){
        e.preventDefault();
        Command: toastr["error"]("Please choose rating");
      }
   })
</script>
<style type="text/css">
  svg{
    width: auto !important;
  }
  .wrap-u div.rating{
    margin-bottom: 20px;
    display: inline-block;
    position: relative;
    top: 5px;
  }
  .wrap-u p{
    height: auto !important;
    font-size: 12px;
    /*width: fit-content !important;*/
  }
  .card-body .row{
    padding-left: 10px;
  }
  .card-body .row .col-xl-1{
    padding: 0px;
  }
  .card-body .row .col-xl-1 img{
    width: 100%;
  }
  .nav-justified{
    width: 100%;
    margin-bottom: 30px;
  }
  .nav-link2{
     border-radius: 0px !important;
    padding: 1rem 1rem;
    font-size: 14px;
    font-weight: 600;
    
  }
  .nav-link2{
    color: black !important;
  }
  .active-tab,.nav-link2:hover,.nav-link2:active,.nav-link2:focus{
    background: linear-gradient(to right, #00eda4 0%,#6a7df1 100%);
    color: white !important;
    border-radius: 0px !important;
  }
  .nav-pills-row{
    background:white;
    box-shadow: 1px 1px 15px rgba(0, 0, 0, 0.1);
  }
  .wrap-u textarea{
    padding:10px;
    border:1px solid #cccc;
  }
  .wrap-u .btn-k{
    border:none;
    cursor: pointer;
  }
</style>
@endsection