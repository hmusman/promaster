@extends('user.includes.layout')

@section('content')
<style type="text/css">
  .seo_service_item {
    padding: 12px!important;

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
   margin:20px;
   }
   .w3-animate-opacity {
    animation: opac 1.5s!important;
}
.w3-animate-bottom {
    animation: animatebottom 1.4s!important;
}
img.download-hover{
  display: none;
}
a.download-link:hover img.download-hover{
  display: block;
}
a.download-link:hover img.download{
  display: none;
}
.media-right{
  padding-left: 2px!important;
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
                    <h2>My eBooks</h2>
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
                            <img style="height: 110px;" src="{{url('public/courses-icons')}}/{{$course->course_icon}}" alt="Ebook-Image...">
                          </div>
                           <div class="panel-heading">
                            <div class="media  v-middle">
                              <div class="media-body text-caption text-blue">
                                <a href="organizational-leadership.html"><?php echo strip_tags($course->course_title, '<br>') ?></a>
                                  
                              </div>

                              <div class="media-right">
                                <a class="w3-animate-bottom download-link" href="{{url('user/download')}}" onclick="event.preventDefault();document.getElementById('download-ebook-{{$key}}').submit();" title="Download">
                                <img class="download" src="{{url('public/userDashboard/images/download.png')}}" width="50px">
                                 <img class="download-hover "src="{{url('public/userDashboard/images/download-hover.png')}}" width="50px">
                                </a>
                                <form id="download-ebook-{{$key}}" action="{{url('user/download')}}" method="post">
                                  @csrf
                                <input type="hidden" name="id" value="{{Crypt::encrypt($course->id)}}">
                              </form>
                              </div>
                              <div class="con">
                               
                            </div>
                        </div>
                       </div>
                       </div>
                    </div>
                    @endforeach
                    @else
                     <div class="row">
                        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10" style="margin-left: 2%;">
                           <div class="alert alert-info"><i class="fa fa-exclamation-triangle  mr-2"></i>No Ebook Found!</div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10" style="margin-left: 2%;">
                           <a class="price_btn btn_hover mt_30" href="{{url('ebooks')}}" title="Purchase Courses Or Deals" style="width: 100%;text-align: center;border-radius: 50px;">Purchase Ebooks Or Ebooks Deals</a>
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