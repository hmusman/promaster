@extends('user.includes.layout')
@section('content-heading')
   <h4 class="mb-0">My Ebooks</h4>
@stop
@section('breadcrumb')
   <li class="breadcrumb-item"><a href="{{url('user/courses')}}" class="default-color">Home</a></li>
  <li class="breadcrumb-item">My Ebooks</li>
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
                           <div class="downl">
                              <img src="{{url('public/assets/user-images/download.png')}}">
                            </div>
                           <div class="clearfix"></div>
                           <a href="{{url('user/download')}}" onclick="event.preventDefault();document.getElementById('download-ebook-{{$key}}').submit();" class="btn-d gradiant">Download Ebook</a>
                            <form id="download-ebook-{{$key}}" action="{{url('user/download')}}" method="post">
                                @csrf
                              <input type="hidden" name="id" value="{{Crypt::encrypt($course->id)}}">
                            </form>
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
         <div class="alert alert-warning"><i class="fa fa-exclamation-triangle  mr-2"></i>No Ebook Found!</div>
      </div>
   </div>
   @endif
   @endsection

@section('script')
<script type="text/javascript">
   $(".side-menu-fixed .side-menu li a").removeClass("active");
   $(".ebooks").addClass('active');

</script>
@endsection
