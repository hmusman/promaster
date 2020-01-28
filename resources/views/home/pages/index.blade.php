@extends('home.includes.layout')
@section('section-1')


<style type="text/css">
    #topbar{
    position: fixed;
    width: 100%;
    z-index: 10000;
    height: 80px;
    background-image: linear-gradient(243deg, #525f7b00 0%, #4dd8bc00 100%) ; 
}
.shop-content .title{
    min-height: 54px;
}
</style>
  <!-- Preloader area start here -->
        <div id="loading" class="icon-preloader">
            <div class="loader">
                <div class="animate3">
                    <img src="{{url('public/assets/user-images/logo.png')
                }}" alt="Preloader Image animate3">
                </div>
            </div>
        </div>
        <!--End preloader here -->
   <div class="home-banner">
            <div class="container">
                <div class="banner-item">
                    <div class="banner-text text-center">
                        <h1 class="white-color mb-140 semi-bold uppercase" data-animation-in="slideInDown" data-animation-out="animate-out slideOutUp" style="color: #000;"> E-Learning Courses To Strengthen Your Soft Skills </h1>
                        <div class="btn-banner"> 
                            <a href="#" class="readon banner radius" data-animation-in="slideInUp" data-animation-out="animate-out slideOutDown">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
<!-- jow it works section -->
@section('section-2')

        <!-- About Section Start-->
        <div id="neuron-about" class="neuron-about white-bg pt-90 pb-90 md-pt-80 md-pb-70">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 padding-0 order-last md-mb-30 col-padding-md">
                        <div class="neuron-about-img-part">
                            <div class="about-img">
                                <img src="{{url('public/assets/newtheme/images/about/about-style3.png')}}" alt="About Image">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="sec-title mb-40">
                            <h2 class="title2 semi-bold mb-20">Get Certified In Soft Skills To Strengthen Your Resume</h2>
                            <p>Competition in today’s labor force is more fierce than ever before. In order to make
                                your name standout, you need to possess skills which job recruiters are looking for in
                                their applicants. Promasters is an e-learning platform that offers courses in the soft
                                skills needed to make you a more desirable applicant.</p>

                            <p class="margin-0">We provide the ability to attain certifications for soft skills by completing courses
                            through our convenient e-learning platform. The wide range of courses we offer help
                            you learn in an effective setting and at your own pace. Upon completion of our
                            courses, you will receive certification for the coursework which can be a valuable
                            addition to your resume.</p>
                        </div>
                        <div class="">
                            <a class="readon style3 radius" href="#">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="row col-20 pt-100 md-pt-80">
                    <div class="col-lg-4 col-md-6 sm-mb-30">
                        <div class="single-about no-bg-style top-border">
                            <div class="about-title">
                                <h4 class="title mb-20">Innovative and Flexible E-Learning </h4>
                            </div>
                            <div class="about-desc">
                                <p class="desc-txt">Courses through our platform are available on demand. This makes learning your
                                desired skills extremely efficient as you are able to complete coursework at your own
                                pace. Earning soft skill certifications through our platform is made simple as you are
                                able to create your own study schedule. </p>
                            </div>
                        </div>                                    
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-about no-bg-style top-border">
                            <div class="about-title">
                                <h4 class="title mb-20">Convenient Functionality </h4>
                            </div>
                            <div class="about-desc">
                                <p class="desc-txt">We offer 13 languages for our coursework so you are able to learn in the language you
                                feel most comfortable with. Regardless of the soft skills you are seeking, you can rest
                                assured that you will find what you’re looking to learn within our platform as we offer
                                a wide array of skills to attain through course completion.</p>
                            </div>
                        </div>                                  
                    </div>
                    <div class="col-lg-4 hidden-md">
                        <div class="single-about no-bg-style top-border">
                            <div class="about-title">
                                <h4 class="title mb-20">Add Value To Your Career </h4>
                            </div>
                            <div class="about-desc">
                                <p class="desc-txt">Possession of strong soft skills serve as an immediate boost to your resume. By completing our coursework and acquiring certifications, you can make yourself a more qualified candidate for higher paying jobs. Additionally, having strong soft skills will improve your interview skills and increase your leverage for salary negotiations</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .container end -->
        </div>
        <!-- About Section End-->
@endsection
<!-- course programs -->
@section('section-3')
 <div id="neuron-shop"  style="background: #eff1f7;" class="neuron-shop pt-100 pb-100 md-pt-80 md-pb-80">
            <div class="container">
                 <div class="sec-title text-center mb-45">
                    <h2 class="title extra-none title-color mb-0">Explore the most in-demand courses in<br> today’s professional word</h2>
                </div>
                <div class="row">
                     @foreach($courses as $key => $course)    
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                        <div class="product-grid">
                            <div class="shop-item">
                                <img src="{{url('public/course-banners')}}/{{$course->course_banner}}" alt="Product Image">
                                <div class="icon-area">
                                    <ul>
                                        <li><a class="image-popup" href="images/shop/1.jpg"><i class="fa fa-search"></i></a></li>
                                        <li><i class="fa fa-heart-o"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="shop-content">
                                <h4 class="title"><a href="shop-single.html">{{$course->course_title}}</a></h4>
                                <span class="price">${{number_format($course->price,2)}}</span>
                                <!-- <a class="readon radius" href="#">add to cart</a> -->
                                 @auth
                                        <form action="{{route('cart.add')}}" method="post" class="cart-forms add-to-cart-form">
                                            @csrf
                                            <input type="hidden" name="id" value="{{Crypt::encrypt($course->id)}}">
                                            <button type="submit" class=" readon radius  add-to-cart-btn"><img src="https://thumbs.gfycat.com/BogusEmptyBrontosaurus-max-1mb.gif" height="19" width="19"> Add to Cart</button>
                                        </form>
                                    @endauth
                                    @guest
                                        <a href="{{url('login')}}" class=" readon radius  add-to-cart-btn">Add to cart</a>
                                    @endguest
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- <div class="bullet mt-50">
                    <ul>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#"><i class="flaticon-right-arrow"></i></a></li>
                    </ul>
                </div> -->
            </div>
        </div>
@endsection
@section('section-4')
  <!-- Work Section Start -->
        <div id="neuron-work" class="neuron-work sec-bg pt-90 pb-100 md-pt-70 md-pb-80">
            <div class="container">
                <div class="row mb-45 md-mb-30">
                    <div class="col-lg-4">
                        <div class="sec-title">
                            <h2 class="title2 title-color semi-bold margin-0">How Does Promasters Work? </h2>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="title-desc">Promasters simplifies learning new skills through an innovative and streamlinedprocess. In order to get started, simply enroll in the soft skill coursework you are mostinterested in. Our e-learning platform is designed to be accessible, making itextremely easy to strengthen your soft skills by completing coursework in the setting you are most comfortable in. We allow you to finish coursework at your own pace andon your own schedule for maximum convenience. Once you complete coursework for a particular soft skill, we provide you with certification for that skill set which you canadd to your resume in order to further develop your career.</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 md-mb-30">
                        <div class="neuron-work-img-part display-flex align-items-center">
                            <div class="work-img mr-50">
                                <img src="{{url('public/assets/newtheme/images/about/phone.png')}}" alt="About Image">
                            </div>
                            <div class="work-img">
                                <img src="{{url('public/assets/newtheme/images/about/arrow-shape.png')}}" alt="About Image">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row align-items-center">
                            <div class="col-lg-4 md-mb-30">
                                <div class="language-work style3 text-center long-work box-shadow">
                                    <div class="work-icon mb-10">
                                        <i class="flaticon-artificial-intelligence-1"></i>
                                    </div>
                                    <div class="work-title">
                                        <h4 class="title title-color semi-bold mb-0">Natural Language Processing (NLP) Layer</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 md-mb-30">
                                <div class="work-shape-img-part text-center">
                                    <div class="shape-img mb-125 md-mb-50">
                                        <img src="{{url('public/assets/newtheme/images/about/arrow-shape.png')}}" alt="About Image">
                                    </div>
                                    <div class="shape-img">
                                        <img src="{{url('public/assets/newtheme/images/about/arrow-shape.png')}}" alt="About Image">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="language-work style3 text-center box-shadow mb-30">
                                    <div class="work-icon mb-10">
                                        <i class="flaticon-brain"></i>
                                    </div>
                                    <div class="work-title">
                                        <h4 class="title title-color semi-bold mb-0">Knowledge Base/CMS <span>(Source Content)</span></h4>
                                    </div>
                                </div>
                                <div class="language-work style3 text-center box-shadow">
                                    <div class="work-icon mb-10">
                                        <i class="flaticon-database"></i>
                                    </div>
                                    <div class="work-title">
                                        <h4 class="title title-color semi-bold mb-0">Data Storage<span>(History & Analytics)</span></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Work Section End -->
        
          <!-- Counter Section Start Here-->
        <div id="neuron-counter-area" class="neuron-counter-area style2 gradient-bg3-section pt-100 pb-95 md-pt-80 md-pb-75">
            <div class="container">
                <div class="row neuron-count">
                    <!-- COUNTER-LIST START -->
                    <div class="col-lg-3 col-md-6 md-mb-50">
                        <div class="neuron-counter-part text-center">
                            <div class="counter-text text-center">
                                <div class="neuron-counter white-color">4000</div>
                                <h4 class="counter-txt white-color">Complete Project</h4>
                            </div>
                        </div>
                    </div>
                    <!-- COUNTER-LIST END -->

                    <!-- COUNTER-LIST START -->
                    <div class="col-lg-3 col-md-6 md-mb-50">
                        <div class="neuron-counter-part text-center">
                            <div class="counter-text text-center">
                                <div class="neuron-counter white-color">600</div>
                                <h4 class="counter-txt white-color">NLP Experts</h4>
                            </div>
                        </div>
                    </div>
                    <!-- COUNTER-LIST END -->

                    <!-- COUNTER-LIST START -->
                    <div class="col-lg-3 col-md-6 sm-mb-50">
                        <div class="neuron-counter-part text-center">
                            <div class="counter-text text-center">
                                <div class="neuron-counter white-color">3500</div>
                                <h4 class="counter-txt white-color">Satisfied Clients</h4>
                            </div>
                        </div>
                    </div>
                    <!-- COUNTER-LIST END -->

                    <!-- COUNTER-LIST START -->
                    <div class="col-lg-3 col-md-6">
                        <div class="neuron-counter-part text-center">
                            <div class="counter-text text-center">
                                <div class="neuron-counter white-color">8000</div>
                                <h4 class="counter-txt white-color">Industries Served</h4>
                            </div>
                        </div>
                    </div>
                    <!-- COUNTER-LIST END -->
                </div>
            </div>
        </div>
        <!-- Counter Section End Here-->                        		                            
@endsection
<!-- our worldwide performance -->
@section('section-5')

        <!-- Services Section Start-->
        <div class="neuron-about sec-bg pt-90 pb-100 md-pt-70 md-pb-80">
            <div class="container">
                <div class="sec-title text-center mb-45">
                    <h2 class="title extra-none title-color mb-0">We Provide Innovative Features <br> For You </h2><br>
                    <p>Our platform ensures success in your development as we provide the following
features to help suit your learning needs</p>
                </div>
                <div class="row col-20">
                    <div class="col-lg-4 col-md-6 mb-40">
                        <div class="single-about style4 icon-style box-shadow">
                            <div class="about-icon">
                                <i class="flaticon-abc"></i>
                            </div>
                            <div class="about-title">
                                <h4 class="title mb-20">13 Study Languages</h4>
                            </div>
                        </div>                                    
                    </div>
                    <div class="col-lg-4 col-md-6 mb-40">
                        <div class="single-about style4 icon-style box-shadow">
                            <div class="about-icon">
                                <i class="flaticon-brain"></i>
                            </div>
                            <div class="about-title">
                                <h4 class="title mb-20">Flexible Scheduling</h4>
                            </div>
                        </div>                                  
                    </div>
                    <div class="col-lg-4 col-md-6 mb-40">
                        <div class="single-about style4 icon-style box-shadow">
                            <div class="about-icon">
                                <i class="flaticon-abc"></i>
                            </div>
                            <div class="about-title">
                                <h4 class="title mb-20">Affordable Pricing</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-40">
                        <div class="single-about style4 icon-style box-shadow">
                            <div class="about-icon">
                                <i class="flaticon-business-and-finance"></i>
                            </div>
                            <div class="about-title">
                                <h4 class="title mb-20">Industry-Recognized Credentials</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 md-mb-40">
                        <div class="single-about style4 icon-style box-shadow">
                            <div class="about-icon">
                                <i class="flaticon-font"></i>
                            </div>
                            <div class="about-title">
                                <h4 class="title mb-20">Lifetime Access To Coursework
</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 md-mb-40">
                        <div class="single-about style4 icon-style box-shadow">
                            <div class="about-icon">
                                <i class="flaticon-contract"></i>
                            </div>
                            <div class="about-title">
                                <h4 class="title mb-20">Streamlined Learning Processes</h4>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-3 col-md-6 sm-mb-40">
                        <div class="single-about style4 icon-style box-shadow">
                            <div class="about-icon">
                                <i class="flaticon-speech-bubble"></i>
                            </div>
                            <div class="about-title">
                                <h4 class="title mb-20">Message Personalization</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-about style4 icon-style box-shadow">
                            <div class="about-icon">
                                <i class="flaticon-binary-code"></i>
                            </div>
                            <div class="about-title">
                                <h4 class="title mb-20">Digit vs Numeric Words</h4>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div><!-- .container end -->
        </div>
        <!-- Services Section End-->

        <!-- Testimonial Style Start -->
        <div class="neuron-testimonial white-bg pt-100 pb-100 md-pt-80 md-pb-80">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 pr-100 col-padding-md md-mb-30">
                        <div class="sec-title">
                            <h2 class="title extra-none title-color mb-20">What Our Client Says About Us</h2>
                            <span class="title-desc">Bring to the table win-win survival strategies to ensure proac tive domination. At the end of the day, going forward, a news normal that evolved generation</span>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="testimonial-vertical-carousel box-shadow">
                            <div class="row align-items-center">
                                <div class="col-md-2 padding-0 sm-mb-30 col-padding-sm">
                                    <div class="slider-nav">
                                        <div class="item">
                                            <img src="{{url('public/assets/newtheme/images/testimonial/layer-601.png')}}" alt="image" draggable="false" />
                                        </div>
                                        <div class="item">
                                            <img src="{{url('public/assets/newtheme/images/testimonial/layer-601.png')}}" alt="image" draggable="false" />
                                        </div>
                                        <div class="item">
                                            <img src="{{url('public/assets/newtheme/images/testimonial/layer-601.png')}}" alt="image" draggable="false" />
                                        </div>
                                        <div class="item">
                                            <img src="{{url('public/assets/newtheme/images/testimonial/layer-601.png')}}" alt="image" draggable="false" />
                                        </div>
                                        <div class="item">
                                            <img src="{{url('public/assets/newtheme/images/testimonial/layer-601.png')}}" alt="image" draggable="false" />
                                        </div>
                                        <div class="item">
                                            <img src="{{url('public/assets/newtheme/images/testimonial/layer-601.png')}}" alt="image" draggable="false" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-10 padding-0">
                                    <div class="slider-for">
                                        <div class="item">
                                            <p class="author-desc">I must explain to you how all this mistaken idea of de nounc ing pleasure and praising pain was born and I will give you a  com plete account of the system, and ex pound the actual teach ings of the great explorer of the truth. Credibly pontifi cate highly efficient manufactured products and enabled data. and ex pound the actual teach ings.</p>
                                            <div class="author-info">
                                                <h6 class="name">Luise Henrikes</h6>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <p class="author-desc">I must explain to you how all this mistaken idea of de nounc ing pleasure and praising pain was born and I will give you a  com plete account of the system, and ex pound the actual teach ings of the great explorer of the truth. Credibly pontifi cate highly efficient manufactured products and enabled data. and ex pound the actual teach ings.</p>
                                            <div class="author-info">
                                                <h6 class="name">Luise Henrikes</h6>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <p class="author-desc">I must explain to you how all this mistaken idea of de nounc ing pleasure and praising pain was born and I will give you a  com plete account of the system, and ex pound the actual teach ings of the great explorer of the truth. Credibly pontifi cate highly efficient manufactured products and enabled data. and ex pound the actual teach ings.</p>
                                            <div class="author-info">
                                                <h6 class="name">Luise Henrikes</h6>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <p class="author-desc">I must explain to you how all this mistaken idea of de nounc ing pleasure and praising pain was born and I will give you a  com plete account of the system, and ex pound the actual teach ings of the great explorer of the truth. Credibly pontifi cate highly efficient manufactured products and enabled data. and ex pound the actual teach ings.</p>
                                            <div class="author-info">
                                                <h6 class="name">Luise Henrikes</h6>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <p class="author-desc">I must explain to you how all this mistaken idea of de nounc ing pleasure and praising pain was born and I will give you a  com plete account of the system, and ex pound the actual teach ings of the great explorer of the truth. Credibly pontifi cate highly efficient manufactured products and enabled data. and ex pound the actual teach ings.</p>
                                            <div class="author-info">
                                                <h6 class="name">Luise Henrikes</h6>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <p class="author-desc">I must explain to you how all this mistaken idea of de nounc ing pleasure and praising pain was born and I will give you a  com plete account of the system, and ex pound the actual teach ings of the great explorer of the truth. Credibly pontifi cate highly efficient manufactured products and enabled data. and ex pound the actual teach ings.</p>
                                            <div class="author-info">
                                                <h6 class="name">Luise Henrikes</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
        <!-- Testimonial Style End -->
@endsection
<!-- join the fastest growing e-learning platform -->
@section('section-6')
 <!-- Author Section Start -->
        <div id="neuron-author" class="neuron-author gradient-bg3-section pt-90 pb-90 md-pt-70 md-pb-70">
            <div class="container">
                <div class="sec-title text-center mb-45">
                    <h2 class="title extra-none white-color mb-0">Reach More Audiences <br>Wherever They Are </h2>
                </div>
                <div class="rs-carousel owl-carousel wow" data-loop="true" data-items="3" data-margin="40" data-autoplay="true" data-autoplay-timeout="9000" data-smart-speed="2000" data-dots="false" data-nav="false" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="1" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="3" data-md-device-nav="false" data-md-device-dots="false">
                    <div class="single-author text-center">
                        <div class="author-img">
                            <a href="#"><img src="{{url('public/assets/newtheme/images/author/1.png')}}" alt=""></a>
                        </div>
                        <div class="author-details">
                            <h4 class="author-title semi-bold mb-20 mt-25"><a href="#">On Any Platform</a></h4>
                            <p class="author-desc margin-0">Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide wit additional clickthroughs</p>
                        </div>
                    </div>
                    <div class="single-author text-center">
                        <div class="author-img">
                            <a href="#"><img src="{{url('public/assets/newtheme/images/author/2.png')}}" alt=""></a>
                        </div>
                        <div class="author-details">
                            <h4 class="author-title semi-bold mb-20 mt-25"><a href="#">Across Devices</a></h4>
                            <p class="author-desc margin-0">Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide wit additional clickthroughs</p>
                        </div>
                    </div>
                    <div class="single-author text-center">
                        <div class="author-img">
                            <a href="#"><img src="{{url('public/assets/newtheme/images/author/3.png')}}" alt=""></a>
                        </div>
                        <div class="author-details">
                            <h4 class="author-title semi-bold mb-20 mt-25"><a href="#">Around the World</a></h4>
                            <p class="author-desc margin-0">Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide wit additional clickthroughs</p>
                        </div>
                    </div>
                    <div class="single-author text-center">
                        <div class="author-img">
                            <a href="#"><img src="{{url('public/assets/newtheme/images/author/2.png')}}" alt=""></a>
                        </div>
                        <div class="author-details">
                            <h4 class="author-title semi-bold mb-20 mt-25"><a href="#">Across Devices</a></h4>
                            <p class="author-desc margin-0">Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide wit additional clickthroughs</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Author Section End --> 

        <!-- Blog Section Start -->
        <div id="neuron-blog" class="neuron-blog pt-90 pb-100 md-pt-70 md-pb-80">
            <div class="container">
                <div class="row mb-45 md-mb-20">
                    <div class="col-lg-4 md-mb-15">
                        <div class="sec-title">
                            <h2 class="title2 title-color semi-bold margin-0">Our Latest News & Blog Post</h2>
                        </div>                        
                    </div>
                    <div class="col-lg-8">
                        <div class="title-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis at dictum risus, non suscipit arcu. Quisque aliquam posuere tortor, sit amet convallis nunc scelerisque in.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore eius molestiae facere, natus reprehenderit eaque eum, autem ipsam. Magni, error. Tempora odit laborum iure inventore possimus laboriosam qui nam. Fugit!</div>
                    </div>
                </div>
                <div class="rs-carousel owl-carousel wow" data-loop="true" data-items="3" data-margin="30" data-autoplay="true" data-autoplay-timeout="9000" data-smart-speed="2000" data-dots="false" data-nav="false" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="1" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="3" data-md-device-nav="false" data-md-device-dots="false">
                    <div class="single-blog style3 white-bg text-center">
                        <div class="blog-img">
                            <a href="#"><img src="{{url('public/assets/newtheme/images/blog/1.jpg')}}" alt=""></a>
                        </div>
                        <div class="blog-details">
                            <ul class="blog-meta">
                                <li><i class="fa fa-calendar-check-o" aria-hidden="true"></i>Nov 28, 2019</li>
                                <li><i class="fa fa-user-o" aria-hidden="true"></i>Admin</li>
                                <li><span>10</span>Comments</li>
                            </ul>
                            <div class="blog-desc">
                                <h4 class="blog-title"><a href="#">Man in Red Plaid Shirt Talking on Phone Terrace</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="single-blog style3 white-bg text-center">
                        <div class="blog-img">
                            <a href="#"><img src="{{url('public/assets/newtheme/images/blog/2.jpg')}}" alt=""></a>
                        </div>
                        <div class="blog-details">
                            <ul class="blog-meta">
                                <li><i class="fa fa-calendar-check-o" aria-hidden="true"></i>Nov 28, 2019</li>
                                <li><i class="fa fa-user-o" aria-hidden="true"></i>Admin</li>
                                <li><span>10</span>Comments</li>
                            </ul>
                            <div class="blog-desc">
                                <h4 class="blog-title"><a href="#">Man in Red Plaid Shirt Talking on Phone Terrace</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="single-blog style3 white-bg text-center">
                        <div class="blog-img">
                            <a href="#"><img src="{{url('public/assets/newtheme/images/blog/3.jpg')}}" alt=""></a>
                        </div>
                        <div class="blog-details">
                            <ul class="blog-meta">
                                <li><i class="fa fa-calendar-check-o" aria-hidden="true"></i>Nov 28, 2019</li>
                                <li><i class="fa fa-user-o" aria-hidden="true"></i>Admin</li>
                                <li><span>10</span>Comments</li>
                            </ul>
                            <div class="blog-desc">
                                <h4 class="blog-title"><a href="#">Man in Red Plaid Shirt Talking on Phone Terrace</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="single-blog style3 white-bg text-center">
                        <div class="blog-img">
                            <a href="#"><img src="{{url('public/assets/newtheme/images/blog/2.jpg')}}" alt=""></a>
                        </div>
                        <div class="blog-details">
                            <ul class="blog-meta">
                                <li><i class="fa fa-calendar-check-o" aria-hidden="true"></i>Nov 28, 2019</li>
                                <li><i class="fa fa-user-o" aria-hidden="true"></i>Admin</li>
                                <li><span>10</span>Comments</li>
                            </ul>
                            <div class="blog-desc">
                                <h4 class="blog-title"><a href="#">Man in Red Plaid Shirt Talking on Phone Terrace</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog Section End -->       

@endsection
@section('section-10')
	<section class="socail">
       
	</section>
@endsection


@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $(document).delegate('.add-to-cart-btn','click',function(){
                $(this).attr('disabled',true);
                $(this).children("img").show();
                var obj = $(this).parent().next();
                var form = $(this).parent();
                var url = form.attr("action");
                var type = form.attr("method");
                $.ajax({
                    url : url,
                    type : type,
                    data: form.serialize(),
                    success:function(data){
                        $(".add-to-cart-btn").attr('disabled',false);
                        $('.add-to-cart-btn img').hide();
                        $('a.cart-count').html('Cart <span class="badge badge-light">'+data+'</span>');
                        Command: toastr["success"]('<span>Course Added Successfully! <a href="{{url("cart")}}" class="btn btn-success view-cart">view cart</a></span> ');
                    },error: function(xhr, status, error){
                        Command: toastr["error"]('Something went wrong.');
                         $(".add-to-cart-btn").attr('disabled',false);
                        $('.add-to-cart-btn img').hide();
                     }
                })
            })
        })
    </script>   
@endsection