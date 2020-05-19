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
                    <h2>My Courses</h2>
                </div>
                </div>
               
              </div>
              
       
            <section class="seo_service_area" style="margin-bottom: 200px;">
           
                
                <div class="row seo_service_info">
                  @if(count($courses) > 0)
                     @foreach($courses as $key=>$course)
                  <div class="column w3-animate-opacity">
                        <div class="seo_service_item">
                          <div class="img">
                            <img src="{{url('public/course-thumbnails')}}/{{$course->course_thumbnail}}" alt="{{$course->course_title}}" style="height: 122px;">
                          </div>
                           <div class="panel-heading">
                            <div class="media  v-middle">
                              <div class="media-body text-caption text-blue">
                                <a class="course-title" href="#" style="font-size: 15px;font-weight: 500;">{{$course->course_title}}</a>
                              </div>
                              
                              <div class="media-right">
                              <div class="canvas-holder" >
                                 <canvas id="canvas-{{$key}}" width="300" height="300" style="width: 71px; height:71px;    margin-left: -10px;"></canvas>
                                 <div id="canvas-data-{{$key}}" class="matter" style="margin-left: 14px;margin-top: -50px; font-size: 14px;"></div>
                              </div>
                              </div>

                              <div class="con">
                              <a class="btn btn-white w3-animate-bottom btn-flat paper-shadow relative" data-z="0" data-hover-z="1" data-animated href="{{url('user/course-details')}}/{{$course->id}}">Continue</a>
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
