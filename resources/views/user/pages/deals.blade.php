@extends('user.includes.layout')
@section('title') Promaster | Member Deals @endsection
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
@section('content')
<style type="text/css">
  #notification{
        padding-top: 20px !important;
  }
  .disabled{    
    filter: blur(1px);
    pointer-events: none;
  }
  .course_table{
        width: 100%;
        text-align: center;
        border: 1px solid lightgray;
    }
    #title{
        border: 1px solid lightgray;
        padding: 3% 6% 3% 6%;
    }
    #id{
        border: 1px solid lightgray;
        padding: 4px 13px 0px 13px !important;
    }
    .modal-header .close {
        margin-top: -22px;
        margin-right: 6px;
    }
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

  .tab-content {
    padding: 0px!important;
  background: transparent!important;
  border-bottom-left-radius: 0px!important;
  border-bottom-right-radius: 0px!important;
  }
  .sec_pad{
    padding: 40px 0 80px;
  }
  .home_bubble .bubble.b_one {
    left: -45px;
  }
  .home_bubble .bubble.b_four{
    right: -50px;

  }

       span.usd{
        font-size: 15px;
    vertical-align: text-top;
    margin-left: 4px;
       }
       .premium.price_item img{
        width: 260px!important;
       }
       
       .price_item img{
        width: 200px;
       }
      .studies_item.guide{
        text-align: center;
      }
      .studies_item.guide {
        box-shadow: 4px 4px 8px rgba(0,0,0,0.2);
        background-color: #eee;
      }
      .guide-text{
        padding: 12px;
      }
      .studies_item.guide img{
        padding-top: 10px;
      }
      
       .guide-text .price{
        padding: 10px 0px 20px;
       }
       .guide-text .price_btn{
        background: #6754e2!important;
        color: #eee!important;
       }
       .guide-text .price_btn:hover{
        background: transparent!important;
        color: #6754e2!important;
       }
       span.before{
        font-size: 16px;
        text-decoration: line-through;
       }
       .basic .price_item .price{
        line-height: 30px!important;
       }
       .price_item p {
    		font-size: 17px !important;
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
                    <h2>Member Deals</h2>
                </div>
                </div>
               
              </div> 
                <div class="row">


          <!-- Tabbable Widget -->
          <div class="tabbable paper-shadow relative" data-z="0.5">

            <!-- Tabs -->
            <ul class="nav nav-tabs" style="overflow-x: hidden;">
              <li class="@if(Request::is('user/deals')) active @endif"><a href="{{url('user/deals')}}"></i> <span class="tab-item">Courses</span></a></li>
              <li class="@if(Request::is('user/pro-deals')) active @endif"><a href="{{url('user/pro-deals')}}"> <span class="tab-item">Professional eBooks</span></a></li>
             
            </ul>
            <!-- // END Tabs -->
            

           
          </div>
        @if(Request::is('user/deals'))
          <section id="pricing" class="pricing_area_two sec_pad">
            <div class="container custom_container p0">
               
               
                <div class="tab-content price_content price_content_two">
                    <div class="" id="home1" role="tabpanel" aria-labelledby="home-tab">
                        @if($featureDeal != NULL)
                        <section class="seo_fact_area sec_pad">
                          <div class="home_bubble">
                              <div class="bubble b_one"></div>
                              <div class="bubble b_three"></div>
                              <div class="bubble b_four"></div>
                              <div class="bubble b_six"></div>
                              <div class="triangle b_eight" data-parallax='{"x": 120, "y": -10}'><img src="{{url('public/userDashboard/images/triangle_one.png')}}" alt=""></div>
                          </div>
                           <div class="row premium price_item">
                            <div class="col-lg-5 col-sm-6">
                                <div class="price_item1">
                                     <div class="tag1"><span>Amazing Offer!</span></div>
                                    <img src="{{url('public/userDashboard/images/price/new10.png')}}" alt="">
                                </div>
                            </div>

                             <div class="col-lg-4 col-sm-6">
                                    <div class="price_item2" style="text-align: left!important;">
                                
                                        <h5 class="f_p f_size_25 f_600 t_color2 ">{{$featureDeal->deal_name}}</h5>
                                       
                                        <ul class="list-unstyled p_list" >
                                          @if(!empty($featureDeal->about1))
                                            <li><i class="ti-check"></i>{{@$featureDeal->about1}}</li>
                                          @endif
                                          @if(!empty($featureDeal->about2))
                                            <li><i class="ti-check"></i>{{@$featureDeal->about2}}</li>
                                          @endif
                                          @if(!empty($featureDeal->about3))
                                            <li><i class="ti-check"></i>{{@$featureDeal->about3}}</li>
                                          @endif
                                          @if(!empty($featureDeal->about4))
                                            <li><i class="ti-check"></i>{{@$featureDeal->about4}}</li>
                                          @endif
                                        </ul>
                                    </div>
                                
                            </div>

                                <div class="col-lg-3 col-sm-6">
                                <div class="price_item3">

                                <div class="price f_700 f_size_40 t_color2"><span class="before">${{number_format($featureDeal->bundle_price,2)}}</span><span class="usd">USD</span> {{number_format($featureDeal->deal_price,2)}} </div>
                                   
                                   
                                    @auth
                                    <!-- <form action="{{url('user/checkout')}}" method="get" accept-charset="utf-8">
                                        @csrf
                                    <input type="hidden" id="deal_id" name="dealId" value="{{$featureDeal->id}}">
                                    <button type="submit" style="background-color: white; border: none;"><a class="price_btn btn_hover mt_30 dealId">Buy Now</a></button>
                                    </form> -->
                                    <a href="#" data-toggle="modal" data-target=".buyDeal" class="price_btn btn_hover mt_30" data-dealID="{{$featureDeal->id}}" data-dealName="{{$featureDeal->deal_name}}">Buy Now</a>
                                    @endauth
                                    @guest
                                    <a href="{{url('login')}}" class="price_btn btn_hover mt_30">Buy Now</a>
                                    @endguest
                                </div>
                            </div>
                        </div>
                      </section>
                      @endif


                     <section class="seo_fact_area sec_pad">
                        <div class="home_bubble">
                            <div class="bubble b_one"></div>
                            <div class="bubble b_three"></div>
                            <div class="bubble b_four"></div>
                            <div class="bubble b_six"></div>
                            <div class="triangle b_eight" data-parallax='{"x": 120, "y": -10}'><img src="{{url('public/userDashboard/images/triangle_one.png')}}" alt=""></div>
                        </div>
                        
                        <div class="row basic">
                          @foreach($deals as $deal)
                            <div class="col-lg-3 col-sm-6">
                                <div class="price_item">
                                   @if($deal->deal_name == 'Single Course')
                                    <img src="{{url('public/assets/img/price/new1.png')}}" alt="">
                                    @elseif($deal->deal_name == '2 Courses Bundle')
                                    <img src="{{url('public/assets/img/price/new2.png')}}" alt="">
                                    @elseif($deal->deal_name == '4 Courses Bundle')
                                    <img src="{{url('public/assets/img/price/new4.png')}}" alt="">
                                    @elseif($deal->deal_name == '6 Courses Bundle')
                                    <img src="{{url('public/assets/img/price/new6.png')}}" alt="">
                                    @endif
                                    <h5 class="f_p f_size_20 f_600 t_color2 mt_30">{{$deal->deal_name}}</h5>
                                    @if($deal->deal_name == 'Single Course')
                                    <p>Good to get started<br><br><br></p>
                                    @elseif($deal->deal_name == '2 Courses Bundle')
                                    <p>Great way to save<br><br><br></p>
                                    @elseif($deal->deal_name == '4 Courses Bundle')
                                    <p>Excellent offer for savings<br><br></p>
                                    @elseif($deal->deal_name == '6 Courses Bundle')
                                    <p>Remarkable savings for students<br><br></p>
                                    @endif
                                    <div class="price f_700 f_size_30 t_color2" ><span class="before">${{number_format($deal->bundle_price,2)}}</span><span class="usd">USD</span> {{number_format($deal->deal_price,2)}} </div>
                                    <ul class="list-unstyled p_list">
                                      @if(!empty($deal->about1))
                                        <li><i class="ti-check"></i><?php echo strip_tags($deal->about1, '<br>'); ?></li>
                                      @endif
                                      @if(!empty($deal->about2))
                                        <li><i class="ti-check"></i>{{$deal->about2}}</li>
                                      @endif
                                      @if(!empty($deal->about3))
                                        <li><i class="ti-check"></i>{{$deal->about3}}</li>
                                      @endif
                                      @if(!empty($deal->about4))
                                        <li><i class="ti-check"></i>{{$deal->about4}}</li>
                                      @endif
                                    </ul>
                                     @auth
                                      <!-- <form action="{{url('user/checkout')}}" method="get" accept-charset="utf-8">
                                          @csrf
                                      <input type="hidden" id="deal_id" name="dealId" value="{{$deal->id}}">
                                      <button type="submit" style="background-color: white; border: none;"><a class="price_btn btn_hover mt_30 dealId">Buy Now</a></button>
                                      </form> -->
                                      <a href="#" data-toggle="modal" data-target=".buyDeal" class="price_btn btn_hover mt_30" data-dealID="{{$deal->id}}" data-dealName="{{$deal->deal_name}}">Buy Now</a>
                                      @endauth
                                      @guest
                                      <a href="{{url('login')}}" class="price_btn btn_hover mt_30">Buy Now</a>
                                      @endguest
                                </div>
                            </div>
                            @endforeach
                        </div>
                      </section>
                    </div>
                    
                </div>
            </div>
        </section>

            
         @endif
        @if(Request::is('user/pro-deals'))

          <section id="pricing" class="pricing_area_two sec_pad">
            <div class="container custom_container p0">
               
               
                <div class="tab-content price_content price_content_two">
                    <div class="" id="home1" role="tabpanel" aria-labelledby="home-tab">
                      @if($featureDeal != NULL)
                      <section class="seo_fact_area sec_pad">
                        <div class="home_bubble">
                            <div class="bubble b_one"></div>
                            <div class="bubble b_three"></div>
                            <div class="bubble b_four"></div>
                            <div class="bubble b_six"></div>
                            <div class="triangle b_eight" data-parallax='{"x": 120, "y": -10}'><img src="{{url('public/userDashboard/images/triangle_one.png')}}" alt=""></div>
                        </div>
                         <div class="row premium price_item">
                            <div class="col-lg-7 col-sm-6">
                                <div class="price_item1">
                                     <div class="tag1"><span>Amazing Offer!</span></div>
                                    <img src="{{url('public/userDashboard/images/price/ebook10.png')}}" alt="">
                                </div>
                            </div>

                             <div class="col-lg-5 col-sm-6">
                                    <div class="price_item2" style="text-align: left!important;">
                                
                                        <h5  style="text-align: center;"
                                        class="f_p f_size_25 f_600 t_color2 ">{{$featureDeal->deal_name}}</h5>
                                        <h5 style="text-align: center;" class="f_p f_size_20 t_color2">{{$featureDeal->about1}}</h5>
                                       
                                       
                                    </div>
                                    <div class="price_item3">
                                
                                    <div class="price f_700 f_size_40 t_color2"><span class="usd">USD</span> {{number_format($featureDeal->deal_price,2)}} </div>
                                   
                                    @auth
                                    <!-- <form action="{{url('user/checkout')}}" method="get" accept-charset="utf-8">
                                        @csrf
                                    <input type="hidden" id="deal_id" name="dealId" value="{{$featureDeal->id}}">
                                    <button type="submit" style="background-color: white; border: none;"><a class="price_btn btn_hover mt_30 dealId">Buy Now</a></button>
                                    </form> -->

                                    <a href="#" data-toggle="modal" data-target=".buyDeal" class="price_btn btn_hover mt_30" data-dealID="{{$featureDeal->id}}" data-dealName="{{$featureDeal->deal_name}}">Buy Now</a>

                                    @endauth
                                    @guest
                                    <a href="{{url('login')}}" class="price_btn btn_hover mt_30">Buy Now</a>
                                    @endguest
                                </div>
                                
                            </div>

                             
                        </div>
                      </section>
                      @endif

                      <section class="seo_fact_area sec_pad">
                        <div class="home_bubble">
                            <div class="bubble b_one"></div>
                            <div class="bubble b_three"></div>
                            <div class="bubble b_four"></div>
                            <div class="bubble b_six"></div>
                            <div class="triangle b_eight" data-parallax='{"x": 120, "y": -10}'><img src="{{url('public/userDashboard/images/triangle_one.png')}}" alt=""></div>
                        </div>
                        <div class="row">
                          @foreach($deals as $deal)
                            <div class="col-lg-3 col-sm-6">
                                <div class="price_item">
                                  @if($deal->deal_name == 'Single eBook')
                                  <img src="{{url('public/userDashboard/images/price/ebook1.png')}}" alt="">
                                  @elseif($deal->deal_name == '2 eBooks Bundle')
                                  <img src="{{url('public/userDashboard/images/price/ebook2.png')}}" alt="">
                                  @elseif($deal->deal_name == '4 eBooks Bundle')
                                  <img src="{{url('public/userDashboard/images/price/ebook4.png')}}" alt="">
                                  @elseif($deal->deal_name == '6 eBooks Bundle')
                                  <img src="{{url('public/userDashboard/images/price/ebook6.png')}}" alt="">
                                  @endif
                                    <h5 class="f_p f_size_20 f_600 t_color2 mt_30">{{$deal->deal_name}}</h5>
                                    @if($deal->deal_name == 'Single eBook')
                                    <p>Good to get started<br><br><br></p>
                                    @elseif($deal->deal_name == '2 eBooks Bundle')
                                    <p>Great way to save<br><br><br></p>
                                    @elseif($deal->deal_name == '4 eBooks Bundle')
                                    <p>Excellent offer for savings<br><br></p>
                                    @elseif($deal->deal_name == '6 eBooks Bundle')
                                    <p>Remarkable savings for students<br><br></p>
                                    @endif
                                    <div class="price f_700 f_size_40 t_color2"><span class="usd">USD</span> {{number_format($deal->deal_price,2)}} </div>
                                   
                                    @auth
                                    <!-- <form action="{{url('user/checkout')}}" method="get" accept-charset="utf-8">
                                        @csrf
                                    <input type="hidden" id="deal_id" name="dealId" value="{{$deal->id}}">
                                    <button type="submit" style="background-color: white; border: none;"><a class="price_btn btn_hover mt_30 dealId">Buy Now</a></button>
                                    </form> -->

                                    <a href="#" data-toggle="modal" data-target=".buyDeal" class="price_btn btn_hover mt_30" data-dealID="{{$deal->id}}" data-dealName="{{$deal->deal_name}}">Buy Now</a>
                                    @endauth
                                    @guest
                                    <a href="{{url('login')}}" class="price_btn btn_hover mt_30">Buy Now </a>
                                    @endguest
                                </div>
                            </div>
                            @endforeach
                        </div>
                      </section>
                    </div>
                    
                </div>
            </div>
        </section>


        @endif
          </div>

       
         </div>

        </div>
        <!-- /st-content-inner -->

      </div>
      <!-- /st-content -->

    </div>
    <!-- /st-pusher -->


<div class="modal fade buyDeal" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@if(Request::is('user/deals')) Select Courses @elseif(Request::is('user/pro-deals')) Select Ebooks @endif</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="course_table">
                  <div class="msg">
                        
                    </div>
                    <tbody class="table_body">
                        @foreach($courses as $course)
                        <tr class="course-{{$course->id}}  @if(in_array($course->id, $ids)) disabled @endif" id="{{$course->id}}" >
                            <td id="id"><input type="checkbox" class="filled-in {{$course->id}}" value="{{$course->id}}" name="courseID" /></td>
                            <td id="title">{{str_replace('<br>', ' ', $course->course_title)}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                    <button class="btn_three courses" style="margin-top: 23px;width: 100%;text-align: center;">Submit</button>    
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" type="text/javascript" charset="utf-8" async defer></script>
<script>
   // GET DEAL ID
    var dealId = '';
    var dealName = '';
    $('.price_btn').on('click',function(){
        dealId = $(this).attr('data-dealID');
        dealName = $(this).attr('data-dealName');
        var ids = <?php echo count($ids); ?>;
        @if(Request::is('user/deals'))
        if(dealName == 'DELUXE PACKAGE' && ids >= 1){
            $('.modal-title').empty();
            $('.modal-title').append('Alert!');
            $('.msg').append('<p class="alert alert-danger">You can not buy DELUXE PACKAGE Deal, becasue DELUXE PACKAGE Deal contain 10 courses. you already purchased '+ids+' courses. Please chose other deals.</p>');
            $('.table_body').hide();
            $('.courses').hide();
        }
        if(dealName == 'Single Course' && ids >= 10){
            $('.modal-title').empty();
            $('.modal-title').append('Alert!');
            $('.msg').append('<p class="alert alert-danger">You can not buy Single Course Deal, becasue Single Course Deal contain 1 course. you already purchased '+ids+' courses. Please chose other deals.</p>');
            $('.table_body').hide();
            $('.courses').hide();
        }
        if(dealName == '2 Courses Bundle' && ids >= 9){
            $('.modal-title').empty();
            $('.modal-title').append('Alert!');
            $('.msg').append('<p class="alert alert-danger">You can not buy 2 Courses Bundle Deal, becasue 2 Courses Bundle Deal contain 2 courses. you already purchased '+ids+' courses. Please chose other deals.</p>');
            $('.table_body').hide();
            $('.courses').hide();
        }
        if(dealName == '4 Courses Bundle' && ids >= 7){
            $('.modal-title').empty();
            $('.modal-title').append('Alert!');
            $('.msg').append('<p class="alert alert-danger">You can not buy 4 Courses Bundle Deal, becasue 4 Courses Bundle Deal contain 4 courses. you already purchased '+ids+' courses. Please chose other deals.</p>');
            $('.table_body').hide();
            $('.courses').hide();
        }
        if(dealName == '6 Courses Bundle' && ids >= 5){
            $('.modal-title').empty();
            $('.modal-title').append('Alert!');
            $('.msg').append('<p class="alert alert-danger">You can not buy 6 Courses Bundle Deal, becasue 6 Courses Bundle Deal contain 6 courses. you already purchased '+ids+' courses. Please chose other deals.</p>');
            $('.table_body').hide();
            $('.courses').hide();
        }
        @elseif(Request::is('user/pro-deals'))
        if(dealName == 'DELUXE PACKAGE' && ids >= 1){
            $('.modal-title').empty();
            $('.modal-title').append('Alert!');
            $('.msg').append('<p class="alert alert-danger">You can not buy DELUXE PACKAGE Deal, becasue DELUXE PACKAGE Deal contain 10 Ebboks. you already purchased '+ids+' Ebboks. Please chose other deals.</p>');
            $('.table_body').hide();
            $('.courses').hide();
        }
        if(dealName == 'Single eBook' && ids >= 10){
            $('.modal-title').empty();
            $('.modal-title').append('Alert!');
            $('.msg').append('<p class="alert alert-danger">You can not buy Single Course Deal, becasue Single Course Deal contain 1 Ebook. you already purchased '+ids+' Ebooks. Please chose other deals.</p>');
            $('.table_body').hide();
            $('.courses').hide();
        }
        if(dealName == '2 eBooks Bundle' && ids >= 9){
            $('.modal-title').empty();
            $('.modal-title').append('Alert!');
            $('.msg').append('<p class="alert alert-danger">You can not buy 2 Courses Bundle Deal, becasue 2 Courses Bundle Deal contain 2 Ebooks. you already purchased '+ids+' Ebooks. Please chose other deals.</p>');
            $('.table_body').hide();
            $('.courses').hide();
        }
        if(dealName == '4 eBooks Bundle' && ids >= 7){
            $('.modal-title').empty();
            $('.modal-title').append('Alert!');
            $('.msg').append('<p class="alert alert-danger">You can not buy 4 Courses Bundle Deal, becasue 4 Courses Bundle Deal contain 4 Ebooks. you already purchased '+ids+' Ebooks. Please chose other deals.</p>');
            $('.table_body').hide();
            $('.courses').hide();
        }
        if(dealName == '6 eBooks Bundle' && ids >= 5){
            $('.modal-title').empty();
            $('.modal-title').append('Alert!');
            $('.msg').append('<p class="alert alert-danger">You can not buy 6 Courses Bundle Deal, becasue 6 Courses Bundle Deal contain 6 Ebooks. you already purchased '+ids+' Ebooks. Please chose other deals.</p>');
            $('.table_body').hide();
            $('.courses').hide();
        }
        @endif
    });

    // GET UNIQUE ARRAY
    function onlyUnique(value, index, self) { 
        return self.indexOf(value) === index;
    }
    // GET SELECTED COURSES
    var courseIds = new Array();
    var unique;
    $('.courses').on('click', function(){
        var flag = 0;
        var courseIds = new Array();
        $('input[name="courseID"]:checked').each(function() {
           courseIds.push(this.value);

           unique = courseIds.filter( onlyUnique );

        });
        
        // console.log(dealName);
        // console.log(unique.length);
        @if(Request::is('user/deals'))
        if(dealName == 'DELUXE PACKAGE'){
            if(typeof unique === 'undefined' || unique == null){
                $.toast({
                    heading: 'Error',
                    text: dealName +' deal contains 10 courses. Please select at least 10 courses to continue.',
                    showHideTransition: 'fade',
                    position: 'top-right',
                    icon: 'error',
                    loader: true, 
                    loaderBg: '#a94442',
                    allowToastClose: true,
                    stack: 6,
                    hideAfter: 7000,
                    Size: 28
                })
            }else if(unique.length < 10 || unique.length > 10){
                // console.log(unique.length);
                $.toast({
                    heading: 'Error',
                    text: dealName +' deal contains 10 courses. Please select at least 10 courses to continue.',
                    showHideTransition: 'fade',
                    position: 'top-right',
                    icon: 'error',
                    loader: true, 
                    loaderBg: '#a94442',
                    allowToastClose: true,
                    stack: 6,
                    hideAfter: 7000
                })
            }else{
                flag = 1;
            }
            
        }else if(dealName == 'Single Course'){
            if(typeof unique === 'undefined' || unique == null){
                $.toast({
                    heading: 'Error',
                    text: dealName +' deal contains 1 course. Please select at least 1 courses to continue.',
                    showHideTransition: 'fade',
                    position: 'top-right',
                    icon: 'error',
                    loader: true, 
                    loaderBg: '#a94442',
                    allowToastClose: true,
                    stack: 6,
                    hideAfter: 7000
                })
            }
            else if(unique.length < 1 || unique.length > 1){
                $.toast({
                    heading: 'Error',
                    text: dealName +' deal contains 1 course. Please select at least 1 courses to continue.',
                    showHideTransition: 'fade',
                    position: 'top-right',
                    icon: 'error',
                    loader: true, 
                    loaderBg: '#a94442',
                    allowToastClose: true,
                    stack: 6,
                    hideAfter: 7000
                })
            }else{
                flag = 1;
            }
        }else if(dealName == '2 Courses Bundle'){
            if(typeof unique === 'undefined' || unique == null){
                $.toast({
                    heading: 'Error',
                    text: dealName +' deal contains 2 course. Please select at least 2 courses to continue.',
                    showHideTransition: 'fade',
                    position: 'top-right',
                    icon: 'error',
                    loader: true, 
                    loaderBg: '#a94442',
                    allowToastClose: true,
                    stack: 6,
                    hideAfter: 7000
                })
            }
            else if(unique.length < 2 || unique.length > 2){
                $.toast({
                    heading: 'Error',
                    text: dealName +' deal contains 2 course. Please select at least 2 courses to continue.',
                    showHideTransition: 'fade',
                    position: 'top-right',
                    icon: 'error',
                    loader: true, 
                    loaderBg: '#a94442',
                    allowToastClose: true,
                    stack: 6,
                    hideAfter: 7000
                })
            }else{
                flag = 1;
            }
        }else if(dealName == '4 Courses Bundle'){
            if(typeof unique === 'undefined' || unique == null){
                $.toast({
                    heading: 'Error',
                    text: dealName +' deal contains 2 course. Please select at least 4 courses to continue.',
                    showHideTransition: 'fade',
                    position: 'top-right',
                    icon: 'error',
                    loader: true, 
                    loaderBg: '#a94442',
                    allowToastClose: true,
                    stack: 6,
                    hideAfter: 7000
                })
            }
            else if(unique.length < 4 || unique.length > 4){
                $.toast({
                    heading: 'Error',
                    text: dealName +' deal contains 2 course. Please select at least 4 courses to continue.',
                    showHideTransition: 'fade',
                    position: 'top-right',
                    icon: 'error',
                    loader: true, 
                    loaderBg: '#a94442',
                    allowToastClose: true,
                    stack: 6,
                    hideAfter: 7000
                })
            }else{
                flag = 1;
            }
        }
        else if(dealName == '6 Courses Bundle'){
            if(typeof unique === 'undefined' || unique == null){
                $.toast({
                    heading: 'Error',
                    text: dealName +' deal contains 2 course. Please select at least 6 courses to continue.',
                    showHideTransition: 'fade',
                    position: 'top-right',
                    icon: 'error',
                    loader: true, 
                    loaderBg: '#a94442',
                    allowToastClose: true,
                    stack: 6,
                    hideAfter: 7000
                })
            }else if(unique.length < 6 || unique.length > 6){
                $.toast({
                    heading: 'Error',
                    text: dealName +' deal contains 2 course. Please select at least 6 courses to continue.',
                    showHideTransition: 'fade',
                    position: 'top-right',
                    icon: 'error',
                    loader: true, 
                    loaderBg: '#a94442', 
                    allowToastClose: true,
                    stack: 6,
                    hideAfter: 7000
                })
            }else{
                flag = 1;
            }
        }
        @elseif(Request::is('user/pro-deals'))
        if(dealName == 'DELUXE PACKAGE'){
            if(typeof unique === 'undefined' || unique == null){
                $.toast({
                    heading: 'Error',
                    text: dealName +' deal contains 10 Ebooks. Please select at least 10 Ebooks to continue.',
                    showHideTransition: 'fade',
                    position: 'top-right',
                    icon: 'error',
                    loader: true, 
                    loaderBg: '#a94442',
                    allowToastClose: true,
                    stack: 6,
                    hideAfter: 7000,
                    Size: 28
                })
            }else if(unique.length < 10 || unique.length > 10){
                // console.log(unique.length);
                $.toast({
                    heading: 'Error',
                    text: dealName +' deal contains 10 Ebooks. Please select at least 10 Ebooks to continue.',
                    showHideTransition: 'fade',
                    position: 'top-right',
                    icon: 'error',
                    loader: true, 
                    loaderBg: '#a94442',
                    allowToastClose: true,
                    stack: 6,
                    hideAfter: 7000
                })
            }else{
                flag = 1;
            }
            
        }else if(dealName == 'Single eBook'){
            if(typeof unique === 'undefined' || unique == null){
                $.toast({
                    heading: 'Error',
                    text: dealName +' deal contains 1 Ebook. Please select at least 1 Ebook to continue.',
                    showHideTransition: 'fade',
                    position: 'top-right',
                    icon: 'error',
                    loader: true, 
                    loaderBg: '#a94442',
                    allowToastClose: true,
                    stack: 6,
                    hideAfter: 7000
                })
            }
            else if(unique.length < 1 || unique.length > 1){
                $.toast({
                    heading: 'Error',
                    text: dealName +' deal contains 1 Ebook. Please select at least 1 Ebook to continue.',
                    showHideTransition: 'fade',
                    position: 'top-right',
                    icon: 'error',
                    loader: true, 
                    loaderBg: '#a94442',
                    allowToastClose: true,
                    stack: 6,
                    hideAfter: 7000
                })
            }else{
                flag = 1;
            }
        }else if(dealName == '2 eBooks Bundle'){
            if(typeof unique === 'undefined' || unique == null){
                $.toast({
                    heading: 'Error',
                    text: dealName +' deal contains 2 Ebooks. Please select at least 2 Ebooks to continue.',
                    showHideTransition: 'fade',
                    position: 'top-right',
                    icon: 'error',
                    loader: true, 
                    loaderBg: '#a94442',
                    allowToastClose: true,
                    stack: 6,
                    hideAfter: 7000
                })
            }
            else if(unique.length < 2 || unique.length > 2){
                $.toast({
                    heading: 'Error',
                    text: dealName +' deal contains 2 Ebooks. Please select at least 2 Ebooks to continue.',
                    showHideTransition: 'fade',
                    position: 'top-right',
                    icon: 'error',
                    loader: true, 
                    loaderBg: '#a94442',
                    allowToastClose: true,
                    stack: 6,
                    hideAfter: 7000
                })
            }else{
                flag = 1;
            }
        }else if(dealName == '4 eBooks Bundle'){
            if(typeof unique === 'undefined' || unique == null){
                $.toast({
                    heading: 'Error',
                    text: dealName +' deal contains 2 Ebooks. Please select at least 4 Ebooks to continue.',
                    showHideTransition: 'fade',
                    position: 'top-right',
                    icon: 'error',
                    loader: true, 
                    loaderBg: '#a94442',
                    allowToastClose: true,
                    stack: 6,
                    hideAfter: 7000
                })
            }
            else if(unique.length < 4 || unique.length > 4){
                $.toast({
                    heading: 'Error',
                    text: dealName +' deal contains 2 Ebooks. Please select at least 4 Ebooks to continue.',
                    showHideTransition: 'fade',
                    position: 'top-right',
                    icon: 'error',
                    loader: true, 
                    loaderBg: '#a94442',
                    allowToastClose: true,
                    stack: 6,
                    hideAfter: 7000
                })
            }else{
                flag = 1;
            }
        }
        else if(dealName == '6 eBooks Bundle'){
            if(typeof unique === 'undefined' || unique == null){
                $.toast({
                    heading: 'Error',
                    text: dealName +' deal contains 2 Ebooks. Please select at least 6 Ebooks to continue.',
                    showHideTransition: 'fade',
                    position: 'top-right',
                    icon: 'error',
                    loader: true, 
                    loaderBg: '#a94442',
                    allowToastClose: true,
                    stack: 6,
                    hideAfter: 7000
                })
            }else if(unique.length < 6 || unique.length > 6){
                $.toast({
                    heading: 'Error',
                    text: dealName +' deal contains 2 Ebooks. Please select at least 6 Ebooks to continue.',
                    showHideTransition: 'fade',
                    position: 'top-right',
                    icon: 'error',
                    loader: true, 
                    loaderBg: '#a94442', 
                    allowToastClose: true,
                    stack: 6,
                    hideAfter: 7000
                })
            }else{
                flag = 1;
            }
        }
        @endif
        if(flag == 1){

            $.ajax({
                url: '<?php echo url('checkDeal'); ?>',
                type: "post",
                data: {"_token": "{{ csrf_token() }}",'dealId':dealId, 'courseIds': unique},
                success:function(data){
                  console.log('deals is checked.');
                  // console.log(data);
                  if($.trim(data) != 'true'){
                      data.forEach(function(data) {
                        console.log('#'+data);
                        $('.'+data).attr("checked", false);
                        $('#'+data).addClass('disabled');
                      });

                      $.toast({
                                heading: 'Information',
                                text: 'You have already purchased some of your selected courses, Please select another one. Thanks!',
                                icon: 'info',
                                position: 'top-right',
                                loader: true,        // Change it to false to disable loader
                                loaderBg: '#31708f', // To change the background
                                allowToastClose: true,
                                stack: 6,
                                hideAfter: 7000
                            })
                  }
                  if($.trim(data) == 'true'){
                        // console.log('you are working good...');
                        // console.log(unique);
                        // console.log(dealId);
                        $.ajax({
                            url: '<?php echo url('setSession'); ?>',
                            type: "post",
                            data: {"_token": "{{ csrf_token() }}",'courseIds':unique, 'dealId':dealId},
                            success:function(response){
                                window.location.href = "https://promastersgips.com/user/checkout?_token={{ csrf_token() }}";
                            }
                        })
                    }
                }
            })
        }
        
    });


 $('.close').on('click', function(){
        window.location.reload();
    })
</script>

@endsection