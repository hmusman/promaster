@extends('home.includes.layout')

@push('style')
<style type="text/css">
    .studies_item .text {
        padding: 35px 15px;

        background-color: #5E2CED;

    }

    .studies_item .text a img {
        width: 60px !important;
        display: inline-block !important;

        margin-top: -28px;
    }

    .studies_item .text h4 {
        padding: 20px 0;
    }

    .studies_item .text h4,
    .studies_item .text p {
        color: white !important;
    }

    /*
       .text1{
        background-color: #7142f8;
       }

       .text2{
        background-color: #5cbd2c;
       }

       .text3{
        background-color: #f38650;
       }
       .text4{
        background-color: #ecbf24;
       }

       .text5{
        background-color: #fa4c9a;
       }
       
       .text6{
        background-color: #35bfe7;
       }

       .text7{
        background-color: #d2a84e;
       }
       
       .text8{
        background-color: #dd3333;
       }

       .text9{
        background-color: #3b6080;
       }
       
       .text10{
        background-color: #820f91;
       }*/
    .seo_home_area .saas_home_img img {
        webkit-box-shadow: -15px 25.981px 60px 0px rgba(1, 1, 64, 0.14) !important;
        box-shadow: -15px 25.981px 60px 0px rgba(1, 1, 64, 0.14) !important;
    }

    span.usd {
        font-size: 15px;
        vertical-align: text-top;
        margin-left: 4px;
    }

    .premium.price_item img {
        width: 260px !important;
    }

    .price_item img {
        width: 200px;
    }

    .studies_item.guide {
        text-align: center;
    }

    .studies_item.guide {
        box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.2);
        background-color: #eee;
    }

    .guide-text {
        padding: 12px;
    }

    .studies_item.guide img {
        padding-top: 10px;
    }

    .guide-text .price {
        padding: 10px 0px 20px;
    }

    .guide-text .price_btn {
        background: #6754e2 !important;
        color: #eee !important;
    }

    .guide-text .price_btn:hover {
        background: transparent !important;
        color: #6754e2 !important;
    }

    span.before {
        font-size: 16px;
        text-decoration: line-through;
    }

    .basic .price_item .price {
        line-height: 30px !important;
    }

    .header_area {
        background: white;
    }

    .seo_banner_content h2,
    .seo_banner_content p {
        color: white !important;
    }

    #guides .price_content .price_item {
        box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.2);
        background-color: #eee;
    }

    #guides .price_content .price_item1,
    #guides .price_item3 {
        background-color: #eee;
    }

    @media only screen and (max-width: 500px) {
        .sec_title h4 {
            font-size: 21px !important
        }
    }
</style>
@endpush

@section('section-1')
<section class="pos_banner_area">
    <div class="pos_slider owl-carousel">
        <div class="pos_banner_item" style="background: url({{url('public/assets/img/seo/image.jpg')}});background-size:cover; background-position: center;"></div>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center seo_banner_content">
                <h2 class="wow fadeInUp" data-wow-delay="0.3s">E-Learning Courses To Get <br> In-Demand Skills</h2>
                <p class="wow fadeInUp" data-wow-delay="0.5s">We provide a wide selection of e-learning courses to gain certifications<br> which are useful in today’s job market.</p>
                <a href="{{url('signup')}}" class="seo_btn seo_btn_one btn_hover">Get Started</a>
                <a href="{{url('login')}}" class="seo_btn seo_btn_two btn_hover">Sign In</a>
            </div>
        </div>
    </div>
</section>
@endsection

@section('section-2')
<section class="seo_service_area sec_pad">
    <div class="container">
        <div class="seo_sec_title text-center mb_70 wow fadeInUp" data-wow-delay="0.3s">
            <h2>Simplicity</h2>
            <p>Our streamlined approach allows you to complete courses at your pace <br>and to receive certifications most important to you </p>
        </div>
        <div class="row seo_service_info">
            <div class="col-lg-4 col-md-6">
                <div class="seo_service_item">
                    <img src="{{url('public/assets/img/seo/icon1.png')}}" alt="">
                    <a href="#">
                        <h4>Add Value To Your Career</h4>
                    </a>
                    <p>By taking our online courses and acquiring certifications, you can position yourself for further advancement in your existing career or to take on a new role which interests you.</p>

                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="seo_service_item">
                    <img src="{{url('public/assets/img/seo/icon2.png')}}" alt="">
                    <a href="#">
                        <h4>Innovative and Flexible</h4>
                    </a>
                    <p>E-learning through our platform grants you more flexibility than being in a traditional classroom setting since you are able to create your own schedule for completing coursework.</p>

                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="seo_service_item">
                    <img src="{{url('public/assets/img/seo/icon5.png')}}" alt="">
                    <a href="#">
                        <h4>Convenient Functionality</h4>
                    </a>
                    <p>We offer the resources needed to make completing your online courses simple. Our platform utilizes an intuitive design which allows you to progress through your studies efficiently.</p>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('section-3')
<section id="how" class="seo_features_one seo_fact_area sec_pad">
    
    <div class="home_bubble">
        <div class="bubble b_one"></div>
        <div class="bubble b_three"></div>
        <div class="bubble b_four"></div>
        <div class="bubble b_six"></div>
        <div class="triangle b_eight" data-parallax='{"x": 120, "y": -10}'><img src="{{url('public/assets/img/seo/triangle_one.png')}}" alt=""></div>
    </div>
    <div class="container">
        <div class="features_info">
            <img class="dot_img" src="{{url('public/assets/img/process/divider.png')}}" alt="">
            <div class="row agency_featured_item mt-0 flex-row-reverse">
                <div class="col-md-6">
                    <div class="chat_features_item wow fadeInUp" data-wow-delay="0.2s">
                        <div class="round">

                            <img class="top_img p_absoulte" src="{{url('public/assets/img/home-chat/triangle.png')}}" alt="">
                            <img src="{{url('public/assets/img/seo/create.png')}}" alt="">
                        </div>

                    </div>

                </div>
                <div class="col-md-6">
                    <div class="agency_featured_content pr_70 pl_70">
                        <div class="dot"><span class="dot1"></span><span class="dot2"></span></div>
                        <img class="number" src="{{url('public/assets/img/home4/icon01.png')}}" alt="">
                        <h3>Choose your courses and <br class="new_line">sign up</h3>
                        <p>We offer a wide variety of courses to choose from in order to gain the certifications you care about the most. All of the courses we offer are for skills which are in-demand in today’s job market to ensure future success in developing your career.</p>
                        <a href="/sign-up.html" class="icon mt_30"><i class="ti-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row agency_featured_item agency_featured_item_two">
                <div class="col-md-6">
                    <div class="chat_features_item wow fadeInUp">
                        <div class="round">

                            <img class="top_img p_absoulte" src="{{url('public/assets/img/home-chat/pluse.png')}}" alt="">
                            <img src="{{url('public/assets/img/seo/quiz.png')}}" width="350px" alt="">
                        </div>

                    </div>

                </div>
                <div class="col-md-6">
                    <div class="agency_featured_content pl_100">
                        <div class="dot"><span class="dot1"></span><span class="dot2"></span></div>
                        <img class="number" src="{{url('public/assets/img/home4/icon02.png')}}" alt="">

                        <h3>Complete the coursework</h3>
                        <p>Courses may be completed at your convenience as they are available through our platform on demand. This makes learning your desired skills extremely efficient as you are able to complete coursework at your own pace and are empowered to create your own preferred study schedule.</p>
                        <a href="/sign-up.html" class="icon mt_30"><i class="ti-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row agency_featured_item flex-row-reverse">
                <div class="col-md-6">
                    <div class="chat_features_item wow fadeInUp" data-wow-delay="0.4s">
                        <div class="round">

                            <img class="top_img p_absoulte" src="{{url('public/assets/img/home-chat/box.png')}}" alt="">
                            <img src="{{url('public/assets/img/seo/certificate3.png')}}" alt="">
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="agency_featured_content pr_70 pl_70">
                        <div class="dot"><span class="dot1"></span><span class="dot2"></span></div>
                        <img class="number" src="{{url('public/assets/img/home4/icon3.png')}}" alt="">
                        <h3>Receive your certifications</h3>
                        <p>Upon completion of your selected course, you will receive certification that you have completed the course and attained mastery of the skill being taught. You may list these certifications on your resume in order to help advance your existing career or to pursue a new career which interests you.</p>
                        <a href="/sign-up.html" class="icon mt_30"><i class="ti-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="dot middle_dot"><span class="dot1"></span><span class="dot2"></span></div>
        </div>
    </div>
</section>
@endsection

@section('section-4')
<section class="seo_features_one sec_pad">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-6">
                <div class="h_security_img text-center">
                    <img src="{{url('public/assets/img/seo/features_img.jpg')}}" alt="">
                </div>

            </div>
            <div class="col-lg-6">
                <div class="seo_features_content">
                    <h2>We Provide Innovative Features For You</h2>
                    <p>Our platform ensures success in your development as we provide the following features
                        to help suit your learning needs:</p>

                    <div class="row p_service_info">
                        <div class="col-lg-6 col-sm-6">
                            <div class="p_service_item pr_70 wow fadeInLeft" data-wow-delay="0.3s">
                                <div class="icon icon_one"><i class="ti-money"></i></div>
                                <h5 class="f_600 f_p t_color3">Affordable Pricing</h5>

                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="p_service_item pl_50 pr_20 wow fadeInLeft" data-wow-delay="0.5s">
                                <div class="icon icon_two"><i class="ti-control-shuffle"></i></div>
                                <h5 class="f_600 f_p t_color3">Flexible Scheduling </h5>

                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="p_service_item pr_70 wow fadeInLeft" data-wow-delay="0.3s">
                                <div class="icon icon_three"><i class="ti-bar-chart"></i></div>
                                <h5 class="f_600 f_p t_color3">Industry-Recognized Credentials</h5>

                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="p_service_item pl_50 pr_20 wow fadeInLeft" data-wow-delay="0.5s">
                                <div class="icon icon_four"><i class="ti-bolt"></i></div>
                                <h5 class="f_600 f_p t_color3">Fast-Paced Learning Programs </h5>

                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="p_service_item pr_70 wow fadeInLeft" data-wow-delay="0.3s">
                                <div class="icon icon_five"><i class="ti-medall"></i></div>
                                <h5 class="f_600 f_p t_color3">Lifetime Access to Coursework</h5>

                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="p_service_item pl_50 pr_20 wow fadeInLeft" data-wow-delay="0.5s">
                                <div class="icon icon_six"><i class="ti-cup"></i></div>
                                <h5 class="f_600 f_p t_color3">Streamlined Learning Process </h5>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('section-5')
<section id="courses" class="case_studies_area sec_pad">
    <div class="container">
        <div class="seo_sec_title text-center mb_70 wow fadeInUp" data-wow-delay="0.3s">
            <h2>Helpful Course Options</h2>
            <p>All of the courses we offer are designed to provide you with skills <br>recruiters want applicants to possess.</p>
        </div>

        <div class="row">
            <div class="case_studies_slider owl-carousel">
                @foreach($courses as $key => $course)
                <div class="studies_item">
                
                    <a href="{{url('course')}}/{{$course->id}}">
                        <img src="{{url('public/course-banners')}}/{{$course->course_banner}}" alt="">
                        <div class="text text1">
                            <a href="{{url('course')}}/{{$course->id}}">

                                <h4>{{$course->course_title}} <img class="float-right" src="{{url('public/assets/img/seo/png2.png')}}" width="50px"></h4>

                            </a>
                            <p><i class="fa fa-certificate"></i> Course + Certificate</p>
                            <p><i class="fa fa-clock-o"></i> 50 minute duration</p>
                            <p><i class="fa fa-user-circle-o"></i> 100% online</p>
                        </div>
                    </a>
                </div>
                @endforeach
             
            </div>
        </div>
    </div>
</section>
@endsection

@section('section-6')
<section id="numbers" class="seo_fact_area sec_pad">
    <div class="home_bubble">
        <div class="bubble b_one"></div>
        <div class="bubble b_three"></div>
        <div class="bubble b_four"></div>
        <div class="bubble b_six"></div>
        <div class="triangle b_eight" data-parallax='{"x": 120, "y": -10}'><img src="{{url('public/assets/img/seo/triangle_one.png')}}" alt=""></div>
    </div>
    <div class="container">
        <div class="seo_sec_title text-center mb_70 wow fadeInUp" data-wow-delay="0.3s">
            <h2>Numbers Don’t Lie, <br>You Could Be Next!</h2>
        </div>
        <div class="seo_fact_info">
            <div class="seo_fact_item">
                <div class="text">
                    <div class="one count"><span class="counter one">800</span>K+</div>
                    <p>Certified Students</p>

                </div>
            </div>
            <div class="seo_fact_item">
                <div class="text">
                    <div class="two count"><span class="counter two">30</span>+</div>
                    <p>Countries Represented</p>
                </div>
            </div>
            <div class="seo_fact_item">
                <div class="text">
                    <div class="three count"><span class="counter three">220</span>+</div>
                    <p>Business Clients</p>
                </div>
            </div>
            <div class="seo_fact_item last">
                <div class="text">
                    <div class="four count"><span class="counter four">60</span>+</div>
                    <p>Satisfied Industries</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('section-7')
<section id="pricing" class="pricing_area_two sec_pad">
    <div class="container custom_container p0">
        <div class="sec_title text-center">
            <h2 class="f_p f_size_30 l_height50 f_600 t_color2">Reasonable Pricing</h2>
            <p class="f_400 f_size_16 l_height30 mb-0">We offer bundle pricing for our courses to encourage you to take as many courses as you need.<br> The more courses you purchase, the more you will save.</p>
        </div>
        
        <div class="tab-content price_content price_content_two">
            <div class="tab-pane fade show active" id="home1" role="tabpanel" aria-labelledby="home-tab">
                @if($featureDeal != NULL)
                <div class="row premium price_item">
                    <div class="col-lg-5 col-sm-6">
                        <div class="price_item1">
                            <div class="tag1"><span>Amazing Offer!</span></div>
                            <img src="{{url('public/assets/img/price/new10.png')}}" alt="">
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="price_item2" style="text-align: left!important;">

                            <h5 class="f_p f_size_25 f_600 t_color2 ">{{$featureDeal->deal_name}}</h5>

                            <ul class="list-unstyled p_list">
                                <li><i class="ti-check"></i>{{@$featureDeal->about1}}</li>
                                <li><i class="ti-check"></i>{{@$featureDeal->about2}}</li>
                                <li><i class="ti-check"></i>{{@$featureDeal->about3}}</li>
                                <li><i class="ti-check"></i>{{@$featureDeal->about4}}</li>
                            </ul>
                        </div>

                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="price_item3">

                            <div class="price f_700 f_size_40 t_color2" style="font-size: 39px;"><span class="before">${{number_format($featureDeal->bundle_price,2)}}</span><span class="usd">USD</span> {{number_format($featureDeal->deal_price,2)}} </div>

                            <a href="#" data-toggle="modal" data-target=".buy" class="price_btn btn_hover mt_30">Start Today</a>
                        </div>
                    </div>
                </div>
                @endif
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
                            <p>Good to get started<br><br></p>
                            <div class="price f_700 f_size_30 t_color2" style="font-size: 21px;"><span class="before">${{number_format($deal->bundle_price,2)}}</span><span class="usd">USD</span> {{number_format($deal->deal_price,2)}} </div>
                            <ul class="list-unstyled p_list">
                                <li><i class="ti-check"></i>{{$deal->about1}}</li>
                                <li><i class="ti-check"></i>{{$deal->about2}}</li>
                                <li><i class="ti-check"></i>{{$deal->about3}}</li>
                                <li><i class="ti-check"></i>{{$deal->about4}}</li>
                            </ul>
                            <a href="#" data-toggle="modal" data-target=".buy" class="price_btn btn_hover">Start Today</a>
                        </div>
                    </div>
                @endforeach
                    <!-- <div class="col-lg-3 col-sm-6">
                        <div class="price_item">
                            <img src="{{url('public/assets/img/price/new2.png')}}" alt="">
                            <h5 class="f_p f_size_20 f_600 t_color2 mt_30">2 Courses Bundle</h5>
                            <p>Great way to save<br><br></p>
                            <div class="price f_700 f_size_30 t_color2"><span class="before">$56.99</span><span class="usd">USD</span> 16.99 </div>
                            <ul class="list-unstyled p_list">
                                <li><i class="ti-check"></i>2 Professional Courses</li>
                                <li><i class="ti-check"></i>2 Accredited Certificates</li>
                                <li><i class="ti-check"></i>Lifetime Access</li>
                            </ul>
                            <a href="#" data-toggle="modal" data-target=".buy" class="price_btn btn_hover">Start Today</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="price_item">
                            <img src="{{url('public/assets/img/price/new4.png')}}" alt="">
                            <h5 class="f_p f_size_20 f_600 t_color2 mt_30">4 Courses Bundle</h5>
                            <p>Excellent offer for savings</p>
                            <div class="price f_700 f_size_30 t_color2"><span class="before">$109.99</span><span class="usd">USD</span> 29.99 </div>
                            <ul class="list-unstyled p_list">
                                <li><i class="ti-check"></i>4 Professional Courses</li>
                                <li><i class="ti-check"></i>4 Accredited Certificates</li>
                                <li><i class="ti-check"></i>Lifetime Access</li>
                            </ul>
                            <a href="#" data-toggle="modal" data-target=".buy" class="price_btn btn_hover">Start Today</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="price_item">
                            <img src="{{url('public/assets/img/price/new6.png')}}" alt="">
                            <h5 class="f_p f_size_20 f_600 t_color2 mt_30">6 Courses Bundle</h5>
                            <p>Remarkable savings for students</p>
                            <div class="price f_700 f_size_30 t_color2"><span class="before">$159.99</span><span class="usd">USD</span> 39.99 </div>
                            <ul class="list-unstyled p_list">
                                <li><i class="ti-check"></i>6 Professional Courses</li>
                                <li><i class="ti-check"></i>6 Accredited Certificates</li>
                                <li><i class="ti-check"></i>Lifetime Access</li>
                            </ul>
                            <a href="#" data-toggle="modal" data-target=".buy" class="price_btn btn_hover">Start Today</a>
                        </div>
                    </div> -->
                </div>
            </div>

        </div>
        
    </div>
</section>
@endsection

@section('section-8')
<section class="testimonial_area sec_pad">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 d-flex align-items-center">
                <div class="testimonial_title">
                    <div class="seo_sec_title wow fadeInUp" data-wow-delay="0.3s">
                        <h2>Testimonials from<br> our satisfied clients</h2>
                        <p>Check out great reviews from some of our satisfied clients below and see how Promasters could help benefit you</p>
                    </div>
                </div>

            </div>
            <div class="col-lg-6 offset-lg-1">
                <div class="stratup_testimonial_info d-flex align-items-center">
                    <div class="testimonial_slider_four owl-carousel">
                        <div class="item">
                            <div class="author_img">
                                <img src="{{url('public/assets/img/seo/member_01.jpg')}}" alt="">
                            </div>
                            <p>After being stuck in my career for a while with little room for advancement I gave Promasters a try. I wish I would have tried them out sooner!</p>
                            <h5>Mark Riley</h5>
                            <h6>Software Engineer</h6>
                        </div>
                        <div class="item">
                            <div class="author_img">
                                <img src="{{url('public/assets/img/seo/member2.png')}}" alt="">
                            </div>
                            <p>What a game changer! I was able to successfully renegotiate a higher salary after completing just a few courses and it was all so simple!</p>
                            <h5>Sarah Jones</h5>
                            <h6>Product Designer</h6>
                        </div>
                        <div class="item">
                            <div class="author_img">
                                <img src="{{url('public/assets/img/seo/member3.jpg')}}" alt="">
                            </div>
                            <p>Between work and taking care of my kids it’s hard to find time to study in a normal school environment. Being able to study online was so convenient!</p>
                            <h5>Lisa Miles</h5>
                            <h6>Project Manager</h6>
                        </div>
                        <div class="item">
                            <div class="author_img">
                                <img src="{{url('public/assets/img/seo/member4.png')}}" alt="">
                            </div>
                            <p>I took a few different courses and all of them were terrific; I’d definitely recommend Promasters to anyone who is trying to advance their career!</p>
                            <h5>Kyle Ortega</h5>
                            <h6>Business Analyst</h6>
                        </div>
                        <div class="item">
                            <div class="author_img">
                                <img src="{{url('public/assets/img/seo/member6.jpg')}}" alt="">
                            </div>
                            <p>Where do I begin? They made everything so easy! Being able to study when I want and where I want is a must since I’m constantly traveling for work. Simply awesome!</p>
                            <h5>Jonathan Waltz</h5>
                            <h6>Marketing Coordinator</h6>
                        </div>
                        <div class="item">
                            <div class="author_img">
                                <img src="{{url('public/assets/img/seo/member5.png')}}" alt="">
                            </div>
                            <p>The layout for the courses was super easy to follow, you just can’t go wrong with them. I got my certifications soon after starting and landed a great new job I love!</p>
                            <h5>Michelle Yang</h5>
                            <h6>Research Specialist</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('section-9')
<section class="seo_call_to_action_area sec_pad">
    <div class="container">
        <div class="seo_call_action_text">
            <h2>Ready to get started?<br> lt's fast, affordable and very easy!</h2>
            <a href="{{url('signup')}}" class="about_btn">Get Started</a>
        </div>
    </div>
</section>
@endsection

<!--Policies-->

@section('section-10')
<div class="modal fade buy" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sign Up</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" class="login-form">
                    <div class="form-group text_box">
                        <label class="f_p text_c f_400">Email</label>
                        <input type="text" placeholder="promaster@gmail.com">
                    </div>
                    <div class="form-group text_box">
                        <label class="f_p text_c f_400">Full Name</label>
                        <input type="text" placeholder="Droitlab">
                    </div>
                    <div class="form-group text_box">
                        <label class="f_p text_c f_400">Password</label>
                        <input type="password" placeholder="******">
                    </div>
                    <div class="extra">
                        <div class="checkbox remember">
                            <label>
                                <input type="checkbox"> I Agree to the <a data-toggle="modal" data-target=".terms" href="#">Terms and Conditions</a> of this website
                            </label>
                        </div>
                        <!--//check-box-->

                    </div>
                    <a href="checkout.html" class="btn_three">Create Account</a>
                    <div class="alter-login text-center mt_30">
                        Already a Member?<a class="login-link" href="{{url('login')}}">Sign In</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('section-11')
<div class="modal fade deliver" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delivery Policy</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    After creating your account, providing your payment details, and making the
                    payment effective to Promasters. You will receive the immediate delivery of
                    access to the platform. Along with access to the platform, you will be able to
                    access the content of the package you chose and paid for. If there is any issue in
                    the delivery of the services you paid for, don’t hesitate to contact us at
                    reports@promastersgips.com or by submitting an assistance ticket in your
                    user dashboard tab ‘’Send A Ticket’’, you will receive a response in around
                    24-72 hours after your message is sent from one of our representatives who will
                    provide you with a solution. It will always be a pleasure for us to assist you in
                    anything we can!</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('section-12')
<div class="modal fade support" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Support Policy</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    It is the Promasters: Global Institute for Professional Studies’ policy and responsibility to provide excellent service to the public. Customer feedback help us measure whether our services are meeting public needs and expectations. It also helps us identify problems that need to be solved. High quality customer service depends on customer feedback. While praise is always welcome, constructive criticism is truly helpful in the long run.</p>

                <p>Promasters: Global Institute for Professional Studies strives for excellence and professionalism in providing customer service, both inside and outside the organization, within the limits of available, well-managed sources.</p>

                <p>To accomplish the mission, we agree upon these values:</p>
                <ul>
                    <li>Anticipating the needs of our customers and planning accordingly</li>
                    <li>Greeting our customers promptly, cheerfully and respectfully</li>
                    <li>Listening carefully and giving full consideration to the requests and concerns of our customers</li>
                    <li>Communicating honestly, courteously and knowledgeably</li>
                    <li>Providing follow-through for our customers promptly, responsibly and efficiently</li>
                    <li>Serving with pride, commitment, and with high ethical standards</li>
                    <li>Respecting the individual and encouraging participation</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@section('section-13')
<div class="modal fade privacy" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Privacy Policy</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Welcome to our Services and thank you for joining us. We at Promasters have
                    high regard for your privacy and want you to understand how we collect, use and
                    disclose information about you. This Privacy Policy covers our data collection
                    practices and details your rights to access, correct, or restrict our use of your
                    personal information. </p>
                <p>Unless we link to a different policy or state otherwise, this Privacy Policy applies
                    when you visit or use the Promasters website, or related services
                    (the “Services”).</p>
                <p>By using the Services, you consent to the terms of this Privacy Policy. You should
                    not use the Services if you don’t comply with this Privacy Policy or any other
                    agreement that governs your use of the Services.</p>
                <h4>INFORMATION WE COLLECT</h4>
                <h6>Information you provide to us</h6>
                <p>We may collect different information from or about you depending on how you
                    use the Services. Below are some examples to help you better understand the
                    information we collect.</p>
                <p>When you create an account and use the Services, including through a thirdparty platform, we collect any information you provide directly, including:</p>
                <ul>
                    <li><strong>Account Information:</strong> To use the Promasters Services and platform, it
                        is necessary for the user to create an account. When you create or
                        update your account, we collect and store the information you provide,
                        like your name, email address, password, gender, and date of birth,
                        and other information as required.</li>
                    <li><strong>Payment Information:</strong> You can link your card details, or other payment
                        channels to the Services to pay bills. For security reasons, Promasters
                        does not collect or store sensitive bank account information. The
                        collection, use, and disclosure of your payment and billing data is
                        subject to the privacy policy and other terms of your payment service
                        provider.</li>
                    <li><strong>Communication and support:</strong>If you reach out to us for support or to
                        report certain problems (notwithstanding if you have created an
                        account), we collect and store your contact information, messages, and
                        other information about you such as your name, email address,
                        location, operating system, IP address, and any other information you
                        provide or that we collect through automated means (which we cover
                        below). We use this information to respond to you and research your
                        question or concern, in compliance with this Privacy Policy.</li>
                </ul>
                <h4>Information we collect through automated means</h4>
                <p>When you access the Services (including browsing courses), we collect certain
                    information through automated means. Such information includes:</p>
                <ul>
                    <li><strong>System Information: </strong>Technical data about your computer or
                        device, like your IP address, device type, operating system type and
                        version, unique device identifiers, browser type, browser language,
                        domain and other systems data, and platform types (“System
                        Information”).</li>
                    <li><strong>Usage Information:</strong> Usage statistics about your interactions with and
                        navigations on the Services, including courses accessed, time spent on
                        pages or the Service, pages visited, features used, your search
                        queries, click data, date and time, and other data regarding your use of
                        the Services (“Usage Information”).</li>
                </ul>
                <h4>Cookies and Data Collection Tools</h4>
                <p>As explained in our Cookie Policy, Promasters and its service providers (such as
                    Google Analytics and though party advertisers) engage the use of server logs
                    and automated information collection tools such as tags, cookies, customized
                    links, scripts, browser or device fingerprints, and web beacons (collectively
                    referred to as “Data Collection Tools”) when you access the website and use the
                    Services. These Tools track and collect certain Usage and System Data
                    automatically when you access the website and use the Services. In certain
                    situations, we connect information gathered with the aid of Data Collection Tools
                    to other information that we collect according to this Privacy Policy.</p>
                <p>We use cookies (which are small files that the website sends to your device to
                    uniquely identify your device or your browser or to store certain information in
                    your browser) for cases such as analyzing your navigation on and use of the
                    Services, saving your preferences, personalizing your experience, simplifying
                    your access to the services and recognizing when you return.</p>
                <p>Web beacons (small objects that allow us to measure the actions of users and
                    visitors using the Services) are used for identifying whether a page was visited,
                    whether an email was opened and to check the efficiency of advertisements by
                    excluding current users from specific promotional messages.</p>
                <h4>How We Use Your Information</h4>
                <p>We use the information we collect through your use of the Services to:</p>
                <ul>
                    <li> Process your requests and orders for certain courses, specific services,
                        products, features or information</li>
                    <li>Communicate with you concerning your account by:
                        <ul>
                            <li>Replying to your inquires, questions and general concerns;</li>
                            <li>Sending you timely administrative messages and information,
                                notification about updates to our agreement and changes to our
                                Services;</li>
                        </ul>
                    </li>
                    <li>Manage your account preferences;</li>
                    <li>Solicit feedback from users;</li>
                    <li>Improve the Services’ technical functionality, which includes
                        troubleshooting and issue resolution, securing the Services against
                        fraud and abuse;</li>
                    <li>Administer and analyze surveys and promotions managed or
                        sponsored by Promasters;</li>
                    <li>Enhance our Services and develop new products, features and
                        services;</li>
                    <li>Advertise our Services on third party websites and applications;</li>
                    <li>As permitted or mandated by the law;</li>
                    <li>As we, in our exclusive discretion, determine to be necessary to
                        ascertain the safety or integrity of our users, employees, third parties,
                        the general public, or our Services.</li>
                </ul>

                <h4>Information Sharing</h4>
                <p>We may disclose your information with third parties under the following
                    circumstances or as described in this Privacy Policy:</p>
                <ul>
                    <li><strong>With Contractors, Service Providers, and Agents:</strong> We will disclose
                        your personal information to third party service providers who perform
                        certain services on our behalf. These services may include payment
                        processing, data analysis, advertising and marketing services
                        (including redirected advertising), email and hosting services, and
                        customer support. These service providers may have access to your
                        personal information and are mandated to use it strictly as we direct, to
                        provide the requested services.</li>
                    <li><strong>With Business Partners: </strong>We have a binding contract with other
                        websites and platforms to distribute our Services and drive traffic to
                        Promasters. Depending on your location, we may share your
                        information with these business partners</li>
                    <li><strong>With Data Enrichment Services and Analytics: </strong>As part of our use of
                        third party data enrichment services and analytics tool (such as Google
                        Analytics), we will disclose certain contact information, Account
                        information, Usage data, System data or de-identified data as required.
                        This is to communicate with you in a more effective and personalized
                        manner.</li>
                    <li><strong>For Legal Compliance and Security:</strong> We may disclose your
                        information to third parties if, in our sole discretion, we have a good
                        faith belief that the disclosure is:
                        <ul>
                            <li>Required or permitted by law;></li>
                            <li>Mandated as part of governmental, judicial or legal inquiry,
                                proceeding, or order;</li>
                            <li>Considerably necessary as part of a valid warrant, subpoena
                                or any other legally-valid request;</li>
                            <li>Considerably essential to enforce our Terms and Conditions,
                                Privacy Policy and other binding contracts;</li>
                            <li>Necessary to prevent, detect, or address fraud, misuse,
                                abuse, a potential breach of law (or guideline, rule or regulation), or
                                technical or security issues;</li>
                            <li>Considerably necessary as determined by our exclusive
                                discretion to protect against pending harm to the rights, safety, or
                                property of Promasters, our employees, users, members of the
                                general public, or our Services; or</li>
                            <li> We may also share your personal information with our legal
                                advisors and auditors to access our disclosure obligations and rights
                                according to this Privacy Policy.</li>
                        </ul>
                    </li>
                    <li><strong>During a change in management:</strong> If Promasters is involved in a
                        business transaction such as acquisition, merger, corporate divestiture,
                        or dissolution (such as bankruptcy), or a sale of all or some aspects of
                        its assets, we may disclose, share or transfer all of your information to
                        the successor organization during the transaction or in contemplation of
                        a transaction (inclusive of due diligence).</li>
                </ul>
                <h4>Information Security</h4>
                <p>Promasters takes considerable security measures to protect our Services and
                    platform against unauthorized access, disclosure, alteration or destruction of your
                    personal information that we collect and store. These security measures are
                    dependent on the type and sensitivity of the information. Despite the security
                    measures, no internet system can be completely secured; in this regard, we
                    cannot ascertain that communications between you and Promasters, the
                    Services and any information you provided to us in connection with the
                    information we collect through the Services will be completely free from
                    unsolicited access by third parties.</p>
                </p>Your password is an important component of our security system, and it is your
                sole responsibility to keep it safe. You should not share your password with any
                third party, and if you believe that your password or account has been
                compromised, you are advised to change it immediately and contact us through
                our email address for any concerns you may have.</p>
                <h4>Your Rights</h4>
                <p>You have certain rights concerning the use of your personal information,
                    including the ability to opt out of cookies, promotional emails, and collection of
                    certain information by analytics providers. You can terminate or update your
                    account from within our services; you can also contact us for individual rights
                    about your personal information. Parents who believe we have unintentionally
                    collected personal information from their underage child should contact us for
                    help in deleting such information.</p>
                <h4>Modifications of This Privacy Policy</h4>
                <p>We may update this Privacy Policy document from time to time, according to our
                    sole discretion. If we make any material changes to it, we will send a notification
                    to you via your email address, or through a notification posted on the Services, or
                    as suggested by the applicable law. We will also include a summary of the key
                    changes in the notification. Unless where stated otherwise, modifications will
                    become effective on the day they are posted.</p>
                <p>As permitted by applicable law, your continued access and use of the Services
                    and the platform after the effective date of any modification will be considered as
                    an acceptance of (and agreement to follow and be bound by) the modified
                    Privacy Policy. The modified Privacy Policy supersedes all previous Privacy
                    Policies</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('section-14')
<div class="modal fade terms" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Terms And Conditions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    <h4>Introduction</h4>
                    <p>Welcome to our website. We need rules and guidelines to protect our platform and
                        services safe for you and our general community. These Terms and Conditions
                        apply to all your activities on the Promasters website and other related services
                        (collectively, “Services”).</p>
                    <p>You consent that by registering, using or accessing our Services, you are
                        consenting to be legally bound by this contract with Promasters. If you do not
                        consent to these Terms and Conditions, you are not allowed to register, use or
                        access any of our Services.
                        If you are using our Services on behalf of an organization, company, government or
                        other legal entity, you warrant and represent that you have the full authority to act in
                        such regard.</p>
                    <h4>Account/Profile</h4>
                    <p>For you to participate in most of the activities on our platform, including to enroll in
                        and purchase a course, you need to create an account. When creating and
                        maintaining your account, you must always provide valid, accurate and complete
                        information, including an active email address. You are entirely responsible for your
                        account and all activities that happen on your account, including for any damage or
                        harm (to us or anyone else) caused by anyone using your account with or without
                        your permission. This implies that you must be careful with your log in details
                        (username and password). You are not allowed to transfer your account to anyone
                        else or use another person’s account without their permission. If you reach out to
                        us seeking the access to an account, we will not grant you such access unless you
                        can prove to us beyond a reasonable doubt that you owned the account by
                        providing other account information. If in the occurrence that the owner of the
                        account is dead, such account will be closed.</p>
                    <p>
                        Promasters charges $30 for users to change their names or account details.
                        Promasters reserved the right to change prices and discounts of any applicable fee
                        at any time with or without prior notice. Our courses are designed in a slide or
                        presentation design, the course content is designed and implemented by the
                        program directors of each program, Promasters do not offer live, pre-recorded or
                        recorded lectures. Promasters provide lifetime access to the service; however, this
                        might be lost if we close down, sell the service or transfer ownership, or due to
                        other circumstances beyond our control. We are autonomous and independent
                        company, we take suggestions but we are not obligated to take such suggestions
                        as part of us.</p>
                    <p>If you disclose your account log in information to someone else, you are solely
                        responsible for all activities that happen on your account. You must promptly notify
                        us when you realized that someone else might be accessing our Services via your
                        account without your permission (or if you suspect any violation of your security) by
                        contacting us. We may request that you provide us with certain information about
                        the account to confirm you as the real owner of the account.</p>
                    <p>Users must not be less than 18 years of age to register on the platform, create an
                        account and use the services. If your age is below the specified age, you are not
                        permitted to create an account, but we encourage you to invite a guardian or parent
                        to create an account for you. If we find out that you have set up an account and you
                        are below the specified age, your access to the Services will be terminated.</p>
                    <h4>Payments</h4>
                    <p>You consent to pay the fees for courses that you duly enroll for. In this regard, you
                        authorize us to charge your credit or debit card or process any other means of
                        payment you determine to choose for those fees. We may use a third-party service
                        provider to offer you the most suitable payment method and to secure your
                        payment information.</p>
                    <h4>Refund Policy</h4>
                    <p><strong>All payments made for our Services are final. There shall be no return or
                            refund of any kind, no matter the circumstances. In this regard, we admonish
                            users to be certain of their options before proceeding to pay.</strong></p>
                    <h4>User License</h4>
                    <p>You are prohibited from accessing or using the Services or from creating an
                        account for any unlawful reasons. Your access and use of the Service and your
                        activities on the learning platform must be according to the local or national laws or
                        regulations of your country. You are exclusively responsible for the knowledge of
                        and adherence to such laws and regulations that apply directly to you.</p>
                    <p>All title, right and interest to and in Promasters’ Services and platform, including our
                        website, our current or future applications, databases and the content our partners
                        or employees provide or submit through our Services are and will remain the sole
                        property of Promasters and our licensors. Our Services and platforms are secured
                        with trademark, copyright and other laws. You are at this moment prohibited from
                        using the Promasters name, or any of the Promasters trademarks, domain names,
                        logos and other brand features. Any comments, feedback or suggestions you may
                        provide about Promasters or our Services is exclusively voluntary, and we will be
                        free to use such comments, feedback or suggestions as we deem fit and without
                        any obligation to you.</p>
                    <p>You are not allowed to do any of the following while accessing or using the
                        Promasters Services and platform:</p>
                    <ul>
                        <li>Tamper with, access or use non-public sections of the platform,
                            Promasters’ computer systems, or the technical delivery systems of
                            Promasters’ service providers.</li>
                        <li>Interfere with, disable or attempt to bypass any of the features of the
                            platforms related to probe, scan, security, or test the weakness of any of
                            Promasters’ systems.</li>
                        <li>Modify, copy, reverse engineer, create derivative works of, reverse
                            assemble or otherwise make every effort to discover the source code of
                            any content on the Promasters Services or platform.</li>
                        <li>Access or attempt to access or search our platform by any means
                            (automated or otherwise) other than through our existing available search
                            functionalities that are made available on our website. You may not use a
                            spider, scrape, use a robot, or use any other automated means to access
                            the Services and platform.</li>
                        <li>In any way use the Services to send deceptive, altered, or false sourceidentifying information (such as appearing as Promasters to send false
                            email communications), or disrupt or interfere with (or any attempt to do
                            so), the access of any user, network or host, including without limitation,
                            sending a virus, flooding, overloading, spamming, or mail-bombing the
                            Services or platforms, or in any manner interfering with or creating an
                            unnecessary burden on the Services.</li>
                    </ul>
                    <h4>The General Agreement</h4>
                    <p>These Terms and Conditions (including any contracts, agreements and policies
                        linked with these Terms and Conditions) made up the general agreement between
                        you and us.</p>
                    <p>If any clause of these Terms and Conditions are found to be unenforceable or
                        invalid by applicable law, then that clause will be considered superseded by an
                        enforceable, valid clause that closely matches the intent of the original clause and
                        the remainder of these Terms and Conditions will continue to be effective.</p>
                    <p>Even if we delay in enforcing our rights or we out rightly fail to enforce it in just a
                        case, this will not be interpreted as a waiver of our rights under these Terms and
                        Conditions, and we may decide to enforce them in the future. If we decide to waive
                        any of our rights in a particular case, it doesn’t mean we waive our rights generally
                        or in the future.</p>
                    <h4>Warranties and Disclaimers</h4>
                    <p>Our platform may be down, either for scheduled maintenance or as a result of an
                        issue with the website. It may also be likely that we encounter security challenges.
                        You consent that you will have no recourse against us in any of these types of
                        occurrences where things seem not to be working out right.</p>
                    <p>In a more appropriate legal language, the Services and its content are offered on
                        an “as is” and “as available” basis. We (and our partners, suppliers, affiliates, and
                        agents) make no warranties or representations whatsoever about the suitability,
                        availability, reliability, timeliness, security, absent of errors, or accuracy of the
                        Services or its content, and we expressly disclaim any and all warranties or
                        conditions (implied or express), including implied warranties of merchantability,
                        fitness for a particular purpose, title, and non-infringement. We (and our partners,
                        suppliers, affiliates, and agents) make no warranty that you will obtain particular
                        results from use of the Services. Your access and use of the Services (including
                        any content) is solely at your own risk. Some jurisdictions don’t allow the exclusion
                        of implied warranties, so some of the above exclusions may not directly apply to
                        you.</p>
                    <p>In our sole discretion, we may decide to stop providing certain features of the
                        Services at any time and for any reason (best known to us). Under no
                        circumstances will Promasters or its partners, suppliers, affiliates, and agents be
                        held responsible for any damages caused by such interruptions or lack of access to
                        such features.</p>
                    <p>Promasters is not liable for failure or delay in our performance of any of the
                        Services caused by circumstances beyond our considerable control, such as an act
                        of war, sabotage or hostility; natural disaster; telecommunication, electrical or
                        internet outage; or government embargo.</p>
                    <h4>Limitation of Liability</h4>
                    <p>There are fundamental risks in using our Services, for instance, if you enroll in a
                        health and wellness course (such as yoga), and you injure yourself. You explicitly
                        accept these risks, and you consent that you will attempt no recourse to seek
                        damages against even if you suffer loss or damage from using our platform and
                        Services.<p>
                            <p>In more appropriate legal term, to the maximum extent permitted by applicable law,
                                we (and our partners, suppliers, affiliates, and agents) will not be accountable for
                                any indirect, incidental, punitive, or consequential damages (including loss of
                                information, revenue, profits, or business opportunities, or personal injury or death),
                                whether arising in contract, warranty, tort, product liability, or otherwise, and even if
                                we’ve been advised of the possibility of such damages in advance. Our liability (and
                                the liability of our partners, suppliers, affiliates, and agents) to you or any third
                                parties under any circumstance is limited to the greater of fifty dollars ($50) or the
                                amount you have paid us in the twelve (12) months before the event giving rise to
                                your claims. Some jurisdictions don’t allow the exclusion or limitation of liability for
                                consequential or incidental damages, so some of the above limitations may not
                                apply directly to you.</p>
                            <h4>Indemnification</h4>
                            <p>You consent to indemnify, defend (at our request), and hold harmless Promasters,
                                our partners, suppliers, affiliates, and agents from and against any third-party
                                claims, damages, losses, demands or expenses- including reasonable attorney’s
                                fees arising from:</p>
                            <ul>
                                <li> your access and use of the Services;</li>
                                <li> your breach of these Terms and Conditions; or</li>
                                <li> your infringement of any third-party right.</li>
                            </ul>
                            <p>Your indemnification responsibility will survive the termination of your use of the
                                Service and these Terms and Conditions.</p>
                            <h4>Governing Law and Jurisdiction</h4>
                            <p>These Terms are governed by the laws of Honduras without reference to its choice
                                or conflicts of law principles. You consent to the exclusive jurisdiction and venue of
                                federal and state courts in Honduras for any legal issues with us.</p>
                            <h4>Modification of These Terms and Conditions</h4>
                            <p>We may modify these Terms and Conditions from time to time to clarify our
                                practices or to reflect new or different practices (for instance, when we add new
                                features). Promasters reserve the sole right in its discretion to modify and/or make
                                certain changes to these Terms and Conditions at any given time.</p>
                            <p>If we make any material changes, we may notify you via the best available channel
                                of reaching you such as through email notice sent to the email you submitted while
                                creating an account, or by posting a notice through our Services.</p>
                            <p>Your continued access and use of our Services after the modifications have been
                                made will be interpreted as your acceptance of the changes. Any modified Terms
                                and Conditions shall prevail over the previous versions.</p>
                            <h4>PRIVACY POLICY</h4>
                            <p>Welcome to our Services and thank you for joining us. We at Promasters have high
                                regard for your privacy and want you to understand how we collect, use and
                                disclose information about you. This Privacy Policy covers our data collection
                                practices and details your rights to access, correct, or restrict our use of your
                                personal information.</p>
                            <p>Unless we link to a different policy or state otherwise, this Privacy Policy applies
                                when you visit or use the Promasters website, or related services (the “Services”).
                                By using the Services, you consent to the terms of this Privacy Policy. You should
                                not use the Services if you don’t comply with this Privacy Policy or any other
                                agreement that governs your use of the Services.</p>
                            <h4>INFORMATION WE COLLECT</h4>
                            <stong>Information you provide to us</stong>
                            <p>We may collect different information from or about you depending on how you use
                                the Services. Below are some examples to help you better understand the
                                information we collect.</p>
                            <p>When you create an account and use the Services, including through a third-party
                                platform, we collect any information you provide directly, including:</p>
                            <ul>
                                <li>Account Information: To use the Promasters Services and platform, it is
                                    necessary for the user to create an account. When you create or update
                                    your account, we collect and store the information you provide, like your
                                    name, email address, password, gender, and date of birth, and other
                                    information as required.</li>
                                <li> Payment Information: You can link your card details, or other payment
                                    channels to the Services to pay bills. For security reasons, Promasters
                                    does not collect or store sensitive bank account information. The
                                    collection, use, and disclosure of your payment and billing data is subject
                                    to the privacy policy and other terms of your payment service provider.</li>
                                <li> Communication and support: If you reach out to us for support or to
                                    report certain problems (notwithstanding if you have created an account),
                                    we collect and store your contact information, messages, and other
                                    information about you such as your name, email address, location,
                                    operating system, IP address, and any other information you provide or
                                    that we collect through automated means (which we cover below). We
                                    use this information to respond to you and research your question or
                                    concern, in compliance with this Privacy Policy.</li>
                            </ul>
                            <h4>Information we collect through automated means</h4>
                            <p>When you access the Services (including browsing courses), we collect certain
                                information through automated means. Such information includes:</p>
                            <ul>
                                <li> System Information: Technical data about your computer or
                                    device, like your IP address, device type, operating system type and
                                    version, unique device identifiers, browser type, browser language,
                                    domain and other systems data, and platform types (“System
                                    Information”).</li>
                                <li> Usage Information: Usage statistics about your interactions with and
                                    navigations on the Services, including courses accessed, time spent on
                                    pages or the Service, pages visited, features used, your search queries,
                                    click data, date and time, and other data regarding your use of the
                                    Services (“Usage Information”).</li>
                            </ul>
                            <h4>Cookies and Data Collection Tools</h4>
                            <p>As explained in our Cookie Policy, Promasters and its service providers (such as
                                Google Analytics and though party advertisers) engage the use of server logs and
                                automated information collection tools such as tags, cookies, customized links,
                                scripts, browser or device fingerprints, and web beacons (collectively referred to as
                                “Data Collection Tools”) when you access the website and use the Services. These
                                Tools track and collect certain Usage and System Data automatically when you
                                access the website and use the Services. In certain situations, we connect
                                information gathered with the aid of Data Collection Tools to other information that
                                we collect according to this Privacy Policy.</p>
                            <p>We use cookies (which are small files that the website sends to your device to
                                uniquely identify your device or your browser or to store certain information in your
                                browser) for cases such as analyzing your navigation on and use of the Services,
                                saving your preferences, personalizing your experience, simplifying your access to
                                the services and recognizing when you return.</p>
                            <p>Web beacons (small objects that allow us to measure the actions of users and
                                visitors using the Services) are used for identifying whether a page was visited,
                                whether an email was opened and to check the efficiency of advertisements by
                                excluding current users from specific promotional messages.</p>
                            <h4>How We Use Your Information</h4>
                            <p>We use the information we collect through your use of the Services to:</p>
                            <ul>
                                <li>Process your requests and orders for certain courses, specific services,
                                    products, features or information;</li>
                                <li>Communicate with you concerning your account by:
                                    <ul>

                                        <li>Replying to your inquires, questions and general concerns;</li>
                                        <li>Sending you timely administrative messages and information,</li>
                                    </ul>

                                    notification about updates to our agreement and changes to our
                                    Services;</li>
                                <li>Manage your account preferences;</li>
                                <li>Solicit feedback from users;</li>
                                <li>Improve the Services’ technical functionality, which includes
                                    troubleshooting and issue resolution, securing the Services against fraud
                                    and abuse;</li>
                                <li>Administer and analyze surveys and promotions managed or sponsored
                                    by Promasters;</li>
                                <li>Enhance our Services and develop new products, features and services;</li>
                                <li>Advertise our Services on third party websites and applications;</li>
                                <li>As permitted or mandated by the law; or</li>
                                <li>As we, in our exclusive discretion, determine to be necessary to ascertain
                                    the safety or integrity of our users, employees, third parties, the general
                                    public, or our Services.</li>
                                <h4>Information Sharing</h4>
                                <p>We may disclose your information with third parties under the following
                                    circumstances or as described in this Privacy Policy:</p>
                                <li>With Contractors, Service Providers, and Agents: We will disclose
                                    your personal information to third party service providers who perform
                                    certain services on our behalf. These services may include payment
                                    processing, data analysis, advertising and marketing services (including
                                    redirected advertising), email and hosting services, and customer
                                    support. These service providers may have access to your personal
                                    information and are mandated to use it strictly as we direct, to provide the
                                    requested services.</li>
                                <li>With Business Partners: We have a binding contract with other
                                    websites and platforms to distribute our Services and drive traffic to
                                    Promasters. Depending on your location, we may share your information
                                    with these business partners.</li>
                                <li>With Data Enrichment Services and Analytics: As part of our use of
                                    third party data enrichment services and analytics tool (such as Google
                                    Analytics), we will disclose certain contact information, Account
                                    information, Usage data, System data or de-identified data as required.
                                    This is to communicate with you in a more effective and personalized
                                    manner.</li>
                                <li>For Legal Compliance and Security: We may disclose your information
                                    to third parties if, in our sole discretion, we have a good faith belief that
                                    the disclosure is:
                                    <ul>
                                        <li>Required or permitted by law;
                                        <li>Mandated as part of governmental, judicial or legal inquiry,
                                            proceeding, or order;</li>
                                        <li>Considerably necessary as part of a valid warrant, subpoena or
                                            any other legally-valid request;</li>
                                        <li> Considerably essential to enforce our Terms and Conditions,
                                            Privacy Policy and other binding contracts;</li>
                                        <li> Necessary to prevent, detect, or address fraud, misuse, abuse, a
                                            potential breach of law (or guideline, rule or regulation), or technical or
                                            security issues;</li>
                                        <li>Considerably necessary as determined by our exclusive
                                            discretion to protect against pending harm to the rights, safety, or
                                            property of Promasters, our employees, users, members of the general
                                            public, or our Services; or</li>
                                        <li>We may also share your personal information with our legal
                                            advisors and auditors to access our disclosure obligations and rights
                                            according to this Privacy Policy.
                                        </li>
                                    </ul>
                                </li>
                                <li>During a change in management: If Promasters is involved in a
                                    business transaction such as acquisition, merger, corporate divestiture, or
                                    dissolution (such as bankruptcy), or a sale of all or some aspects of its
                                    assets, we may disclose, share or transfer all of your information to the
                                    successor organization during the transaction or in contemplation of a
                                    transaction (inclusive of due diligence).</li>
                                <h4>Information Security</h4>
                                <p>Promasters takes considerable security measures to protect our Services and
                                    platform against unauthorized access, disclosure, alteration or destruction of your
                                    personal information that we collect and store. These security measures are
                                    dependent on the type and sensitivity of the information. Despite the security
                                    measures, no internet system can be completely secured; in this regard, we cannot
                                    ascertain that communications between you and Promasters, the Services and any
                                    information you provided to us in connection with the information we collect through
                                    the Services will be completely free from unsolicited access by third parties.</p>
                                <p>Your password is an important component of our security system, and it is your sole
                                    responsibility to keep it safe. You should not share your password with any third
                                    party, and if you believe that your password or account has been compromised, you
                                    are advised to change it immediately and contact us through our email address for
                                    any concerns you may have.</p>
                                <h4>Your Rights</h4>
                                <p>You have certain rights concerning the use of your personal information, including
                                    the ability to opt out of cookies, promotional emails, and collection of certain
                                    information by analytics providers. You can terminate or update your account from
                                    within our services; you can also contact us for individual rights about your personal
                                    information. Parents who believe we have unintentionally collected personal
                                    information from their underage child should contact us for help in deleting such
                                    information.</p>
                                <h4>Modifications of This Privacy Policy</h4>
                                <p>We may update this Privacy Policy document from time to time, according to our
                                    sole discretion. If we make any material changes to it, we will send a notification to
                                    you via your email address, or through a notification posted on the Services, or as
                                    suggested by the applicable law. We will also include a summary of the key
                                    changes in the notification. Unless where stated otherwise, modifications will
                                    become effective on the day they are posted.</p>
                                <p>As permitted by applicable law, your continued access and use of the Services and
                                    the platform after the effective date of any modification will be considered as an
                                    acceptance of (and agreement to follow and be bound by) the modified Privacy
                                    Policy. The modified Privacy Policy supersedes all previous Privacy Policies.</p>
                                <h4>Contact Us</h4>
                                <strong>Contact Email Address:</strong>
                                general@promastersgips.com (for general inquiries)
                                reports@promastersgips.com (for inquiries and technical issues from paid users.
                                <strong>Company Mailing Address:</strong>
                                Residencial Las Uvas Etapa 1, Bloque 39, Casa 19, Oficina de Empresa de
                                Seguridad
                                Torre Fuerte, Tegucigalpa, Honduras.
                        </p>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    })



    $(document).ready(function() {
        $("ul li").click(function() {
            $("ul li").removeClass("active");
            $(this).addClass("active");
        });
    });
</script>
@endsection