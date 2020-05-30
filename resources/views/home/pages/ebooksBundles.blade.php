@extends('home.includes.layout')
@section('section-1')

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
                                    <img src="{{url('public/userDashboard/images/price/ebook10.png')}}" alt="" style="height: 200px;">
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
                                  <img src="{{url('public/userDashboard/images/price/ebook1.png')}}" alt="" style="height: 150px;">
                                  @elseif($deal->deal_name == '2 eBooks Bundle')
                                  <img src="{{url('public/userDashboard/images/price/ebook2.png')}}" alt="" style="height: 150px;">
                                  @elseif($deal->deal_name == '4 eBooks Bundle')
                                  <img src="{{url('public/userDashboard/images/price/ebook4.png')}}" alt="" style="height: 150px;">
                                  @elseif($deal->deal_name == '6 eBooks Bundle')
                                  <img src="{{url('public/userDashboard/images/price/ebook6.png')}}" alt="" style="height: 150px;">
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
                                    <div class="price f_700 f_size_40 t_color2" style="font-size: 38px;"><span class="usd">USD</span> {{number_format($deal->deal_price,2)}} </div>
                                   
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

@endsection