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
                  @if(count($pcourses) > 0)
                     @foreach($pcourses as $key=>$course)
                  <div class="column w3-animate-opacity">
                        <div class="seo_service_item">
                          <div class="img">
                            <img src="{{url('public/courses-icons')}}/{{$course->course_icon}}" alt="{{$course->course_title}}" style="height: 122px;">
                          </div>
                           <div class="panel-heading">
                            <div class="media  v-middle">
                              <div class="media-body text-caption text-blue">
                                <a class="course-title" href="#" style="font-size: 15px;font-weight: 500;"><?php echo strip_tags($course->course_title, '<br>') ?></a>
                              </div>
                              
                              <div class="media-right">
                              @php
                              $prgrs_bar_prcnt     = round(@$course->getPercentage($course->id) * 100);  
                            
                              $prgrs_bar_cls_blue = 'p'.$prgrs_bar_prcnt .' blue';
                              $prgrs_bar_cls_green = 'p'.$prgrs_bar_prcnt .' green';
                              $prgrs_bar_cls       = ($prgrs_bar_prcnt)=='100' ? ($prgrs_bar_cls_green) : ($prgrs_bar_cls_blue);
                              
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
                    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10" style="margin-left: 2%;">
                       <div class="alert alert-info"><i class="fa fa-exclamation-triangle  mr-2"></i>No Course(s) Found!</div>
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

@endsection

