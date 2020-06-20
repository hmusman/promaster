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
                                    <form action="{{url('user/checkout')}}" method="get" accept-charset="utf-8">
                                        @csrf
                                    <input type="hidden" id="deal_id" name="dealId" value="{{$featureDeal->id}}">
                                    <button type="submit" style="background-color: white; border: none;"><a class="price_btn btn_hover mt_30 dealId">Buy Now</a></button>
                                    </form>

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
                                      <form action="{{url('user/checkout')}}" method="get" accept-charset="utf-8">
                                          @csrf
                                      <input type="hidden" id="deal_id" name="dealId" value="{{$deal->id}}">
                                      <button type="submit" style="background-color: white; border: none;"><a class="price_btn btn_hover mt_30 dealId">Buy Now</a></button>
                                      </form>
                                      @endauth
                                      @guest
                                      <a href="{{url('login')}}" class="price_btn btn_hover mt_30">Buy Now</a>
                                      @endguest
                                </div>
                            </div>
                            @endforeach
                            <!-- <div class="col-lg-3 col-sm-6">
                                <div class="price_item">
                                    <img src="{{url('public/userDashboard/images/price/new2.png')}}" alt="">
                                    <h5 class="f_p f_size_20 f_600 t_color2 mt_30">2 Courses Bundle</h5>
                                    <p>Great way to save<br><br></p>
                                     <div class="price f_700 f_size_30 t_color2"><span class="before">$56.99</span><span class="usd">USD</span> 14.99 </div>
                                    <ul class="list-unstyled p_list">
                                        <li><i class="ti-check"></i>2 Professional Courses</li>
                                        <li><i class="ti-check"></i>2 Accredited Certificates</li>
                                        <li><i class="ti-check"></i>Lifetime Access</li>
                                    </ul>
                                    <a href="#" class="price_btn btn_hover">Buy Now</a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="price_item">
                                    <img src="{{url('public/userDashboard/images/price/new4.png')}}" alt="">
                                    <h5 class="f_p f_size_20 f_600 t_color2 mt_30">4 Courses Bundle</h5>
                                    <p>Excellent offer for savings</p>
                                     <div class="price f_700 f_size_30 t_color2"><span class="before">$109.99</span><span class="usd">USD</span> 24.99 </div>
                                    <ul class="list-unstyled p_list">
                                        <li><i class="ti-check"></i>4 Professional Courses</li>
                                        <li><i class="ti-check"></i>4 Accredited Certificates</li>
                                        <li><i class="ti-check"></i>Lifetime Access</li>
                                    </ul>
                                    <a href="#" class="price_btn btn_hover">Buy Now</a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="price_item">
                                    <img src="{{url('public/userDashboard/images/price/new6.png')}}" alt="">
                                    <h5 class="f_p f_size_20 f_600 t_color2 mt_30">6 Courses Bundle</h5>
                                    <p>Remarkable savings for students</p>
                                    <div class="price f_700 f_size_30 t_color2"><span class="before">$159.99</span><span class="usd">USD</span> 29.99 </div>
                                    <ul class="list-unstyled p_list">
                                        <li><i class="ti-check"></i>6 Professional Courses</li>
                                        <li><i class="ti-check"></i>6 Accredited Certificates</li>
                                        <li><i class="ti-check"></i>Lifetime Access</li>
                                    </ul>
                                    <a href="#" class="price_btn btn_hover">Buy Now</a>
                                </div>
                            </div> -->
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
                                    <form action="{{url('user/checkout')}}" method="get" accept-charset="utf-8">
                                        @csrf
                                    <input type="hidden" id="deal_id" name="dealId" value="{{$featureDeal->id}}">
                                    <button type="submit" style="background-color: white; border: none;"><a class="price_btn btn_hover mt_30 dealId">Buy Now</a></button>
                                    </form>

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
                                    <form action="{{url('user/checkout')}}" method="get" accept-charset="utf-8">
                                        @csrf
                                    <input type="hidden" id="deal_id" name="dealId" value="{{$deal->id}}">
                                    <button type="submit" style="background-color: white; border: none;"><a class="price_btn btn_hover mt_30 dealId">Buy Now</a></button>
                                    </form>
                                    @endauth
                                    @guest
                                    <a href="{{url('login')}}" class="price_btn btn_hover mt_30">Buy Now </a>
                                    @endguest
                                </div>
                            </div>
                            @endforeach
                            <!-- <div class="col-lg-3 col-sm-6">
                                <div class="price_item">
                                    <img src="{{url('public/userDashboard/images/price/ebook2.png')}}" alt="">
                                    <h5 class="f_p f_size_20 f_600 t_color2 mt_30">2 eBooks Bundle</h5>
                                    <p>Great way to save<br><br></p>
                                    <div class="price f_700 f_size_40 t_color2"><span class="usd">USD</span> 6.99 </div>
                                    
                                    <a href="#" class="price_btn btn_hover mt_30">Buy Now</a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="price_item">
                                    <img src="{{url('public/userDashboard/images/price/ebook4.png')}}" alt="">
                                    <h5 class="f_p f_size_20 f_600 t_color2 mt_30">4 eBooks Bundle</h5>
                                    <p>Excellent offer for savings</p>
                                    <div class="price f_700 f_size_40 t_color2"><span class="usd">USD</span> 11.99 </div>
                                    
                                    <a href="#" class="price_btn btn_hover mt_30">Buy Now</a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="price_item">
                                    <img src="{{url('public/userDashboard/images/price/ebook6.png')}}" alt="">
                                    <h5 class="f_p f_size_20 f_600 t_color2 mt_30">6 eBooks Bundle</h5>
                              <p>Remarkable savings for students</p>
                                    <div class="price f_700 f_size_40 t_color2"><span class="usd">USD</span> 14.99 </div>
                                   
                                    <a href="#" class="price_btn btn_hover mt_30">Buy Now</a>
                                </div>
                            </div> -->
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
@endsection