@extends('home.includes.layout')
@section('section-1')
<div class="top-banner-wrapper top-banner-area">
    <div class="top-banner-content"> 
        <div class="tb-text-wrapper text-center">
            <span>Join the World's Most Advanced E-learning Platform</span>
        </div>
        <div class="get-program-wrapper">
            <div class="get-program-content container">
                <div class="saving-wrapper mt-5">
                    <p class="m-0 text-center"><span>Save +$5,000 in your professional training</span></p>
                </div>
                <div class="gcpt-wrapper mt-5">
                    <p class="m-0 text-center">Get the<br/> Complete Program for $999</p>
                </div>
                <div class="cce-wrapper container mt-5">
                    <div class="row">
                        <div class="col-md-4 cce-col">
                            <div class="cce-content text-right">
                                <img src="https://businessholics.com/public/assets/user-images/courses-12.png">
                                <p>{{@$totalCourses}} Courses</p>
                            </div>
                        </div>
                        <div class="col-md-4 cce-col">
                            <div class="cce-content text-center">
                                <img src="https://businessholics.com/public/assets/user-images/certificates-12.png">
                                <p>{{@$totalCourses}} Certificates</p>
                            </div>
                        </div>
                        <div class="col-md-4 cce-col">
                            <div class="cce-content text-left">
                                <img src="https://businessholics.com/public/assets/user-images/e-books-12.png">
                                <p>{{@$totalCourses}} Ebooks</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="join-now-wrapper mt-5">
                    <p class="text-center"><a href="#">join now</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- jow it works section -->
@section('section-2')
<div class="hiw-global-wrapper" >
    <div class="hiw-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 hiw-img-col">
                    <div class="hiw-img-content">
                        <img src="https://businessholics.com/public/assets/user-images/Illustration.png">
                    </div>
                </div>
                <div class="col-md-6 hiw-text-col">
                    <div class="hiw-text-content">
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <div class="hiw-heading-wrapper">`
                                    <div class="hiw-heading-content">
                                        <p class="text-capitalize how-text">How</p>
                                        <p class="text-capitalize iw-text">it works</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hiw-content-wrapper">
                            <div class="hiw-sub-content">
                                <div class="row">
                                    <div class="col-sm-3 hiw-sub-img-wrapper">
                                        <div class="hiw-sub-img-content sub-ellipse text-center">
                                            <img src="https://businessholics.com/public/assets/user-images/ellipse-2.png">
                                        </div>
                                    </div>
                                    <div class="col-sm-9 hiw-sub-text-wrapper">
                                        <div class="hiw-sub-text-content">
                                            <p class="hiw-sub-heading">Complete the Coursework</p>
                                            <p class="hiw-sub-desc">Enroll yourself in expert professional training programs and co</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 hiw-sub-img-wrapper">
                                        <div class="hiw-sub-img-content sub-ellipse text-center">
                                            <img  src="https://businessholics.com/public/assets/user-images/ellipse-1.png">
                                        </div>
                                    </div>
                                    <div class="col-sm-9 hiw-sub-text-wrapper">
                                        <div class="hiw-sub-text-content">
                                            <p class="hiw-sub-heading">Receive your Certiﬁcates!</p>
                                            <p class="hiw-sub-desc">Enroll yourself in expert professional training programs and co</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 hiw-sub-img-wrapper">
                                        <div class="hiw-sub-img-content text-center">
                                            <img src="https://businessholics.com/public/assets/user-images/ellipse-3.png">
                                        </div>
                                    </div>
                                    <div class="col-sm-9 hiw-sub-text-wrapper">
                                        <div class="hiw-sub-text-content">
                                            <p class="hiw-sub-heading">Enjoy your Professional Guides!</p>
                                            <p class="hiw-sub-desc">Enroll yourself in expert professional training programs and co</p>
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
</div>
@endsection
<!-- course programs -->
@section('section-3')
<div class="course-programe-wrapper">
    <div class="course-program-content container">
        <div class="cp-heading-wrapper">
            <div class="cp-text-wrapper">
                <p class="text-center">Course Programs</p>
            </div>
            <div class="cp-desc-wrapper">
                <p class="text-center">Explore the most in-demand courses in today’s professional word</p>
            </div>
        </div>
        <div class="row cp-cards-row">
            @foreach($courses as $key => $course)    
                <div class=" col-sm-4 col-md-3 cp-col-wrapper">
                    <div class="cp-col-content">
                        <div class="cp-col-img-wrapper">
                            <div class="cp-col-img-content" style="background-image: url('{{url('public/course-banners')}}/{{$course->course_banner}}')">
                                <p class="cp-img-overlay"></p>
                            </div>
                        </div>
                        <div class="cp-col-body-wrapper">
                            <div class="cp-col-body-content">
                                <p class="cp-col-heading-text"> {{$course->course_title}} </p>
                                <span class="rating-wrapper-{{$key}}">
                                </span>
                                <span class="rating-counter">
                                    <span class="rating-digit">{{$course->averageRating(1)}}</span>
                                    <span class="rating-total">({{($course->countRating())}})</span>
                                </span>
                            </div>
                        </div>
                        <div class="cp-price-wrapper">
                            <div class="cp-price-content">
                                <div class="cp-price-wrapper">
                                    <span class="cp-price">
                                    ${{number_format($course->price,2)}}</span>
                                    @auth
                                        <form action="{{route('cart.add')}}" method="post" class="cart-forms add-to-cart-form">
                                            @csrf
                                            <input type="hidden" name="id" value="{{Crypt::encrypt($course->id)}}">
                                            <button type="submit" class="atc-btn text-capitalize add-to-cart-btn"><img src="https://thumbs.gfycat.com/BogusEmptyBrontosaurus-max-1mb.gif" height="19" width="19"> Add to Cart</button>
                                        </form>
                                    @endauth
                                    @guest
                                        <a href="{{url('login')}}" class="atc-btn text-capitalize">Add to cart</a>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @push('scripts')
                    <script type="text/javascript">
                          $(".rating-wrapper-{{$key}}").rateYo({
                            rating: "{{$course->averageRating()}}",
                            readOnly: true,
                            starWidth: "18px"
                          });
                    </script>
                @endpush
            @endforeach
            
        </div>
    </div>
</div>
@endsection
@section('section-4')
<div class="slider-wrapper">
    <div class="container">
	    <div class="row">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Carousel indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>   
				<!-- Wrapper for carousel items -->
				<div class="carousel-inner">
					<div class="item carousel-item active">
						<div class="row">
						    <div class="col-lg-6 slider-text-wrapper">
						        <div class="slider-text-content">
						            <p class="slider-heading-text">What our  students have  to say </p>
						            <p class="slider-text">Providing the best quality professional  education to meet the market standards </p>
						        </div>
						    </div>
						    <div class="col-lg-6 slider-card-wrapper">
						        <div class="slider-card-content">
						            <div class="row card-holder-wrapper">
						                <div class="col-sm-6 card-holder-name">
						                    <p class="card-holder-text">Brendon Ace</p>
						                    <p class="card-holder-status">Entrepreneur</p>
						                </div>
						                <div class="col-sm-6">
						                    <div class="card-holder-img">
						                        <img src="https://businessholics.com/public/assets/user-images/layer-60.png">
						                    </div>
						                </div>
						            </div>
						            <div class="card-desc-wrapper">
						                <div class="card-desc-content">
						                    <p>As a startup leader, I found Promasters much resourceful considergin its vast range of courses for new leaders and team workders. I have recommended this platform to all my employees.</p>
						                </div>
						            </div>
						        </div>
						    </div>
						</div>
					</div>
					<div class="item carousel-item">
						<div class="item carousel-item active">
						<div class="row">
						    <div class="col-lg-6 slider-text-wrapper">
						        <div class="slider-text-content">
						            <p class="slider-heading-text">What our  students have  to say </p>
						            <p class="slider-text">Providing the best quality professional  education to meet the market standards </p>
						        </div>
						    </div>
						    <div class="col-lg-6 slider-card-wrapper">
						        <div class="slider-card-content">
						            <div class="row card-holder-wrapper">
						                <div class="col-sm-6 card-holder-name">
						                    <p class="card-holder-text">Brendon Ace</p>
						                    <p class="card-holder-status">Entrepreneur</p>
						                </div>
						                <div class="col-sm-6">
						                    <div class="card-holder-img">
						                        <img src="https://businessholics.com/public/assets/user-images/layer-60.png">
						                    </div>
						                </div>
						            </div>
						            <div class="card-desc-wrapper">
						                <div class="card-desc-content">
						                    <p>As a startup leader, I found Promasters much resourceful considergin its vast range of courses for new leaders and team workders. I have recommended this platform to all my employees.</p>
						                </div>
						            </div>
						        </div>
						    </div>
						</div>
					</div>	
					</div>
					<div class="item carousel-item">
						<div class="item carousel-item active">
    						<div class="row">
    						    <div class="col-lg-6 slider-text-wrapper">
    						        <div class="slider-text-content">
    						            <p class="slider-heading-text">What our  students have  to say </p>
    						            <p class="slider-text">Providing the best quality professional  education to meet the market standards </p>
    						        </div>
    						    </div>
    						    <div class="col-lg-6 slider-card-wrapper">
						        <div class="slider-card-content">
						            <div class="row card-holder-wrapper">
						                <div class="col-sm-6 card-holder-name">
						                    <p class="card-holder-text">Brendon Ace</p>
						                    <p class="card-holder-status">Entrepreneur</p>
						                </div>
						                <div class="col-sm-6">
						                    <div class="card-holder-img">
						                        <img src="https://businessholics.com/public/assets/user-images/layer-60.png">
						                    </div>
						                </div>
						            </div>
						            <div class="card-desc-wrapper">
						                <div class="card-desc-content">
						                    <p>As a startup leader, I found Promasters much resourceful considergin its vast range of courses for new leaders and team workders. I have recommended this platform to all my employees.</p>
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
    </div>
</div>
                               		                            
@endsection
<!-- our worldwide performance -->
@section('section-5')
<div class="owp-global-wrapper">
    <div class="owp-global-content container">
        <div class="owp-heading-wrapper">
            <p class="text-center owp-heading">Our Worldwide Performance</p>
            <p class="text-center owp-desc">Internationally Recognized Education Platform</p>
        </div>
        <div class="owp-img-wrapper">
            <div class="owp-img-content text-center">
                <img src="https://businessholics.com/public/assets/user-images/People.png">
            </div>
        </div>
        <div class="row owp-row">
            <div class="col-sm-4 col-xs-6 col-md-3 ">
                <div class="owp-col-cotent">
                    <div class="owp-col-img-wrapper">
                        <div class="owp-col-img-content text-center">
                            <img src="https://businessholics.com/public/assets/user-images/inovet-1.png">
                        </div>
                    </div>
                    <div class="owp-col-counter-wrapper">
                        <p class="owp-col-counter">100,000+</p>
                    </div>
                    <div class="owp-col-desc-wrapper">
                        <p class="owp-col-desc">certified </br> professional</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-xs-6 col-md-3 ">
                <div class="owp-col-cotent">
                    <div class="owp-col-img-wrapper">
                        <div class="owp-col-img-content text-center">
                            <img src="https://businessholics.com/public/assets/user-images/inovet-2.png">
                        </div>
                    </div>
                    <div class="owp-col-counter-wrapper">
                        <p class="owp-col-counter">36</p>
                    </div>
                    <div class="owp-col-desc-wrapper">
                        <p class="owp-col-desc">Countries</br> Represented  </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-xs-6 col-md-3 ">
                <div class="owp-col-cotent">
                    <div class="owp-col-img-wrapper">
                        <div class="owp-col-img-content text-center">
                            <img src="https://businessholics.com/public/assets/user-images/inovet-3.png">
                        </div>
                    </div>
                    <div class="owp-col-counter-wrapper">
                        <p class="owp-col-counter">100,000+</p>
                    </div>
                    <div class="owp-col-desc-wrapper">
                        <p class="owp-col-desc">Certificates  </br> Awarded</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-xs-6 col-md-3 ">
                <div class="owp-col-cotent">
                    <div class="owp-col-img-wrapper">
                        <div class="owp-col-img-content text-center">
                            <img src="https://businessholics.com/public/assets/user-images/inovet-4.png">
                        </div>
                    </div>
                    <div class="owp-col-counter-wrapper">
                        <p class="owp-col-counter">100,000+</p>
                    </div>
                    <div class="owp-col-desc-wrapper">
                        <p class="owp-col-desc">Reached  </br> Workforce</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- join the fastest growing e-learning platform -->
@section('section-6')
<div class="jfg-global-wrapper">
    <div class="jfg-global-content" style="background-image:url(https://businessholics.com/public/assets/user-images/join.png)">
        <div class="container jfg-content">
            <div class="row jfg-row">
                <div class="col-md-6">
                    <div class="jfg-desc-wrapper">
                        <p class="jfg-desc-text">Join The Fastest-Growing  E-learning Platform</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="jfg-button-wrapper">
                        <button class=" sun-btn">sign up now</button>
                        <button class=" cu-btn">contact us</button>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
    <div class="followUs-wrapper">
            <div class="container followUs-cotent">
                <div class="row">
                    <div class="col-md-6">
                        <div class="followUs-text-wrapper">
                            <p class="followUs-text text-center">Follow Us On Social Media</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="sm-icon-wrapper">
                            <a href=#><img src="https://businessholics.com/public/assets/user-images/Facebook.png"></a>
                            <a href=#><img src="https://businessholics.com/public/assets/user-images/LinkedIn.png"></a>
                            <a href=#><img src="https://businessholics.com/public/assets/user-images/YouTube.png"></a>
                            <a href=#><img src="https://businessholics.com/public/assets/user-images/Twitter.png"></a>
                            <a href=#><img src="https://businessholics.com/public/assets/user-images/Instagram.png"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
@section('section-10')
	<section class="socail">
        <div class="container">
           <div class="col-lg-3">
              <div class="ftr-sec">
                <img src="{{url('public/assets/user-images/footer-logo.png')}}">
                <div class="footer-desc-wrapper">
                    <p class="fd-text">Providing high quality education for professionals and workforce all around the globe.</p>
                </div>
              </div>
           </div>
           <div class="col-md-4 col-lg-3 col-sm-6">
               <div class="footer-list-head">
                   <p class="footer-list-text">MOST POPULAR</p>
               </div>
               <div class="footer-list-wrapper">
                   <ul>
                       <li><a href="#">Human resource management</a></li>
                       <li><a href="#">Organizational Leadership</a></li>
                       <li><a href="#">Effective Communication</a></li>
                       <li><a href="#">Customer Service Management</a></li>
                       <li><a href="#">Emotional Intelligence</a></li>
                       <li><a href="#">Work Ethics</a></li>
                   </ul>
               </div>
           </div>
           <div class="col-md-4 col-lg-3 col-sm-6">
               <div class="footer-list-head">
                   <p class="footer-list-text">MOST POPULAR</p>
               </div>
               <div class="footer-list-wrapper">
                   <ul>
                       <li><a href="#">Initiative and Problem Solving</a></li>
                       <li><a href="#">Time Management</a></li>
                       <li><a href="#">Conflict Resolution</a></li>
                       <li><a href="#">Creative Thinking</a></li>
                       <li><a href="#">Team work and Collaboration</a></li>
                       <li><a href="#">Adaptability and Flexibility</a></li>
                   </ul>
               </div>
           </div>
           <div class="col-md-4 col-lg-3 col-sm-6">
               <div class="footer-list-head">
                   <p class="footer-list-text">MOST POPULAR</p>
               </div>
               <div class="footer-list-wrapper">
                   <ul>
                       <li><a href="#">Terms & Conditions</a></li>
                       <li><a href="#">Privacy Policy</a></li>
                       <li><a href="#">Help</a></li>
                   </ul>
               </div>
           </div>
        </div>
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