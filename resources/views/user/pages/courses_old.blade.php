@extends('user.includes.layout')
@section('content-heading')
<!-- <h4 class="mb-0">My Courses</h4> -->
@stop
@section('dashboard-welcome')
<!--   <p class="new-we">Welcome to your Promasters dashboard, enjoy the experience and complete your training in the limit period of 15 days</p> -->
@endsection
@section('breadcrumb')
   <li class="breadcrumb-item"><a href="{{url('user/courses')}}" class="default-color">Home</a></li>
  <li class="breadcrumb-item">My Courses</li>
@endsection

@section('content')
   @if(count($courses) > 0)
      @foreach($courses as $key=>$course)
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
                        <div class="col-xl-2 ">
                           <div class="canvas-holder" >
                              <canvas id="canvas-{{$key}}" width="300" height="300" style="width: 130px; height:130px;margin-left: 8px;"></canvas>
                              <div id="canvas-data-{{$key}}" class="matter"></div>
                              <span class="completed">Completed</span>
                           </div>
                           <div class="clearfix"></div>
                           <a href="{{url('user/course-details')}}/{{$course->id}}" class="btn-c gradiant">Continue</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      @endforeach
   @else
   <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
         <div class="alert alert-warning"><i class="fa fa-exclamation-triangle  mr-2"></i>No Course Found!</div>
      </div>
   </div>
   @endif
@endsection

@section('script')
<script type="text/javascript">
   $(".side-menu-fixed .side-menu li a").removeClass("active");
   $(".courses").addClass('active');
   //
    @foreach($courses as $key=>$course) 
      var canvas = document.getElementById('canvas-{{$key}}');
      var span = document.getElementById('canvas-data-{{$key}}');
      percentage = "{{@$course->getPercentage($course->id)}}";
      progressBar(canvas,span,percentage);
   @endforeach
</script>
@endsection
