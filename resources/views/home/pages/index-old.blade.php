@extends('home.includes.layout')

@section('home-banner')
	<div class="header-content fullheight">
        <div class="slick-header fullheight">
           <div class="header-slide slide-2 master">
              <img src="{{url('public/assets/user-images/slider.jpg')}}" alt="Slider Background" class="slider-background">
              <div class="container-fluid pt">
                 <div class="row">
                    <div class="col-md-6 col-sm-4 bas">
                       <img class="with-h" src="{{url('public/assets/user-images/laptop.png')}}">
                    </div>
                    <div class="col-md-6 col-sm-8">
                       <div class="bann-wrap">
                          <h3>Join the World's Most Advanced E-learning Platform</h3>
                          <h4>Save $4,000 in your professional training</h4>
                          <h5>Get the Complete Program for $999</h5>
                          <div class="row">
                             <div class="mess">
                                <div class="dj">
                                   <div class="round">
                                      <img src="{{url('public/assets/user-images/icon1.png')}}">
                                   </div>
                                   <h4>10 Courses</h4>
                                </div>
                                <div class="dj">
                                   <div class="round">
                                      <img src="{{url('public/assets/user-images/icon2.png')}}">
                                   </div>
                                   <h4>10 Certificates</h4>
                                </div>
                                <div class="dj">
                                   <div class="round">
                                      <img src="{{url('public/assets/user-images/icon3.png')}}">
                                   </div>
                                   <h4>10 Ebooks</h4>
                                </div>
                             </div>
                             <div class="clearfix"></div>
                             <a href="#" data-toggle="modal" data-target="#sign-up" class="join">Join Now</a>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
@endsection
@section('section-1')
	<section class="drag-this-up pad-btm drag-up">
	   <div class="container">
	      <div class="col-lg-12 text-center sp-tp">
	         <h3>Unique Learning Features</h3>
	         <p class="mvp">E-learnig has never been so friendly</p>
	      </div>
	      <div class="clearfix"></div>
	      <div class="row pushtop-60">
	         <div class="col-md-4">
	            <div class="wrap-sec">
	               <div class="col-sm-4">
	                  <img src="{{url('public/assets/user-images/md1.png')}}">
	               </div>
	               <div class="col-sm-8 pd-l0">
	                  <h2>No Schedules</h2>
	                  <p>Learn any time, from anywhere as there are no class schedules to follow.</p>
	               </div>
	            </div>
	         </div>
	         <div class="col-md-4">
	            <div class="wrap-sec">
	               <div class="col-sm-4">
	                  <img src="{{url('public/assets/user-images/md2.png')}}">
	               </div>
	               <div class="col-sm-8 pd-l0">
	                  <h2>Career-Ready Program</h2>
	                  <p>Career-ready courses and professional training to polish your skills.</p>
	               </div>
	            </div>
	         </div>
	         <div class="col-md-4">
	            <div class="wrap-sec">
	               <div class="col-sm-4">
	                  <img src="{{url('public/assets/user-images/md5.png')}}">
	               </div>
	               <div class="col-sm-8 pd-l0">
	                  <h2>Personalized Learning</h2>
	                  <p>Customized learning to suit your course preferences.</p>
	               </div>
	            </div>
	         </div>
	      </div>
	      <div class="row pushtop-30">
	         <div class="col-md-4">
	            <div class="wrap-sec">
	               <div class="col-sm-4">
	                  <img src="{{url('public/assets/user-images/md4.png')}}">
	               </div>
	               <div class="col-sm-8 pd-l0">
	                  <h2>Innovative Learning System</h2>
	                  <p>Dynamic  content  display  and  AI-stimulated  Smart learning systems to help you learn efficiently.</p>
	               </div>
	            </div>
	         </div>
	         <div class="col-md-4">
	            <div class="wrap-sec">
	               <div class="col-sm-4">
	                  <img src="{{url('public/assets/user-images/md3.png')}}">
	               </div>
	               <div class="col-sm-8 pd-l0">
	                  <h2>Effective and Engaging Content</h2>
	                  <p>Our coursework features the most interesting topics to help you learn from the course experts.</p>
	               </div>
	            </div>
	         </div>
	         <div class="col-md-4">
	            <div class="wrap-sec">
	               <div class="col-sm-4">
	                  <img src="{{url('public/assets/user-images/md6.png')}}">
	               </div>
	               <div class="col-sm-8 pd-l0">
	                  <h2>Dedicated AI Teaching System</h2>
	                  <p>Learn from real-life examples to discover practical implications of academic coursework.</p>
	               </div>
	            </div>
	         </div>
	      </div>
	   </div>
	</section>
@endsection

@section('section-2')
	<section class="courses-section drag-this-up">
		<div class="container">
		    <div class="row">
		       <div class="col-lg-12">
		          <div class="title-main">
		             <h3>Course Catalog</h3>
		             <p>Enroll in your preferred promasters program and build your future today</p>
		             <p class="upda">Every course program includes: <span><img src="{{url('public/assets/user-images/r2.png')}}">Professional Guide</span><span><img src="{{url('public/assets/user-images/r4.png')}}">Certificate</span></p>
		          </div>
		       </div>
		    </div>
	   	<div class="row pushtop-60 drag-this-up">
			@foreach($courses as $course)
		       <div class="col-md-6">
		          <div class="accordion">
		             <div class="card h-100 pros">
		                <div class="card-body">
		                   <div class="wpe">
		                      <div class="courses_catalogue" >
		                         <div class="course_title_wrapper">
		                             <h3 class="course_price">${{number_format($course->price,2)}}</h3>
		                             <img src="{{url('public/course-banners')}}/{{$course->course_banner}}">
		                             <h3 class="course_title">{{$course->course_title}}</h3>
		                         </div>
		                      </div>
		                   </div>
		                </div>
		             </div>
		          </div>
		          <div class="panel">
		             <div class="wrapme">
		                <h3>{{$course->course_title}}</h3>
		                <p class="margin-bottom:10px;">{!! nl2br($course->course_description) !!}</p>
		            @auth
		            	<form action="{{route('cart.add')}}" method="post" class="cart-forms add-to-cart-form">
		            		@csrf
		            		<input type="hidden" name="id" value="{{Crypt::encrypt($course->id)}}">
		            		<button type="submit" class="btn btn-success add-to-cart-btn"><img src="https://www.davidwygant.com/wp-content/uploads/2017/10/ajax-loader.gif" height="19" width="19"> Add to Cart</button>
		            	</form>
		            	<form action="" method="get" class="cart-forms">
		            		@csrf
		            		<input type="hidden" name="id" value="{{Crypt::encrypt($course->id)}}">
		            		<input type="hidden" name="pr" value="{{Crypt::encrypt($course->price)}}">
		            		<button class="btn btn-primary">Buy Now</button>
		            	</form>
		            	<div class="cart-message"></div>
		            @endauth
		            @guest
		                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModal">Add to Cart</a>
		            @endguest
		             </div>
		          </div>
		       </div>
			@endforeach
		 </div>

		</div>
	</section>
@endsection





@section('section-3')
	<section class="it-work drag-this-up">
	    <div class="container">
	       <div class="row">
	          <div class="col-lg-12">
	             <div class="title-main">
	                <h3>How It Works</h3>
	                <p>Professional education process made easy</p>
	             </div>
	          </div>
	       </div>
	       <div class="row pushtop-50">
	          <div class="col-lg-4">
	             <div class="blox">
	                <img class="percent" src="{{url('public/assets/user-images/complete.png')}}">
	                <div class="works">
	                   <h4><span>01.</span> Complete the Coursework </h4>
	                   <p>Enroll  yourself  in  expert  professional  training  programs  and  coursework  explicitly designed  to  meet  the  market  demand.  We  have  designed  real-life  teaching  examples, interactive slideshows, and credible content to help you excel in your career.</p>
	                </div>
	             </div>
	          </div>
	          <div class="col-lg-4">
	             <div class="blox">
	                <img class="percent" src="{{url('public/assets/user-images/certificate.png')}}">
	                <div class="works">
	                   <h4><span>02.</span> Receive your Certiﬁcates!</h4>
	                   <p>Add value and recognition to your learning and skills by receiving online certiﬁcates of appreciation by Promasters. We are determined to make you a valuable and credible asset of any workforce you join in the future.</p>
	                </div>
	             </div>
	          </div>
	          <div class="col-lg-4">
	             <div class="blox">
	                <img class="percent" src="{{url('public/assets/user-images/guides.png')}}">
	                <div class="works">
	                   <h4><span>03.</span> Enjoy your Professional Guides! </h4>
	                   <p>Take your knowledge to the next level with   Promasters professional guides for each course. Improve your skills by using these guides to understand and solve most of the common situations faced in the current demanding   professional world.</p>
	                </div>
	             </div>
	          </div>
	       </div>
	    </div>
	 </section>
@endsection

@section('section-4')
	<section class="system drag-this-up">
		<div class="container">
		   <div class="row">
		      <div class="title-sys">
		         <h3>Innovative systems</br> that improve your learning experience </br></h3>
		      </div>
		   </div>
		   <div class="row pushtop-50">
		      <div class="col-md-6">
		         <div class="vac">
		            <div class="ms">
		               <img src="{{url('public/assets/user-images/in2.jpg')}}">
		            </div>
		            <div class="content-ms">
		               <p>Do you think traditional learning methods lack the realistic stroke of practicality? We are in the same boat! Introducing the Smart Learning System to make learning more interactive for you! Bid farewell to the bland routine of cramming books and stuffing your brain with irrelevant information as this Smart Learning system will help you in interactive learning based on real-life examples and situations. Step into a thought-provoking world on online education with this innovative learning system.</p>
		            </div>
		         </div>
		      </div>
		      <div class="col-md-6">
		         <div class="vac">
		            <div class="ms">
		               <img src="{{url('public/assets/user-images/in3.jpg')}}">
		            </div>
		            <div class="content-ms">
		               <p>Avail the  privilege  of  maximized e-learning with  the  help  of  visual  content display. Students and career professionals can optimize their professional training by viewing visually  appealing online  training sessions.  The  Dynamic  Content  Display  adjusts easily  with  your  inherent  learning  curve  so  that  you  can  understand  the  various aspects of online courses without much trouble.</p>
		               <p class="pusp-53"></p>
		            </div>
		         </div>
		      </div>
		   </div>
		</div>
	</section>
@endsection

@section('section-5')
	<section class="about-us drag-this-up" id="about">
	    <div class="container-fluid">
	       <div class="row">
	          <div class="col-sm-5  about_us_img">
	             <div class="ab">
	                <img src="{{url('public/assets/user-images/aboutUs_2.png')}}">
	                <!--<img src="https://businessholics.com/public/assets/user-images/back_rounded.png">-->
	             </div>
	          </div>
	          <div class="col-sm-6">
	             <div class="about-right">
	                <h3>About Us</h3>
	                <p>Promasters is a leading e-learning platform targeted at college students, career professionals, and international workforces. We offer a broad spectrum of online courses to  help students  and  career  professionals  learn  about  various  skills  and  concepts for  the  sake of  stimulating  personal  and  professional  development  in  a  new  dimension.  As  an ultimate  platform  for distance  learning  courses and professional  training,  we  have become a leader in the e-learning industry.</p>
	                <p>We believe  in  making  professional  and  expert online  training accessible  for  everyone around  the  globe,  which  is  why  we  have  taken  a  detour  from  traditional  learning methods  by  introducing  distance  learning. Our  expert  team  holds  a  strong  reputation for  changing  many  lives  through  their  vast  reserves  of  information  reflected  in  our online education system.</p>
	                <p>As a trustable online learning platform, we offer online certificates for every student who  passes  our courses.  These certificates serve  as  great  additions  to  professional portfolios to help the students in their future.</p>
	             </div>
	          </div>
	       </div>
	    </div>
 	</section>
@endsection

@section('section-6')
	<section class="value-us drag-this-up" id="value">
        <div class="container-fluid">
           <div class="row">
              <div class="col-sm-6">
                 <div class="value-right">
                    <h3>Our Values</h3>
                    <p>
                       Promasters is  operating  intending  to  help  students,  career  experts,  and  mid-level career professional’s on acquiring new skills to keep up with the advancements in their industry. Regardless of what type of industry you belong to, Promasters will help you in achieving  new  skills development  in  the  most  convenient manner. Our online courses have been serving as an excellent means of learning and online training for everyone interesting  in distance  learning and  training. We offer  reliable  and  comprehensive courses which can be trusted for their credibility and resourcefulness. Count on us to be your ultimate e-learning platform, and we promise not to disappoint you! 
                    </p>
                 </div>
              </div>
              <div class="col-sm-6 our_values_img">
                 <div class="ab">
                    <img src="{{url('public/assets/user-images/our_values.jpg')}}">
                 </div>
              </div>
           </div>
        </div>
     </section>
@endsection

@section('section-7')
	<section class="reviews">
        <div class="container">
           <div class="row">
              <div class="title-main">
                 <h3>Testimonials </h3>
              </div>
           </div>
           <div class="owl-carousel pushtop-60">
              <!-- card -->
              <div class="item">
                 <div class="padm">
                    <div class="card3 h-100 border-orange">
                       <div class="card-body">
                          <div class="test-img">
                             <img src="{{url('public/assets/user-images/user4.jpg')}}">
                          </div>
                          <div class="content-area">
                             <h5>Nothing like Promasters online training!</h5>
                             <p>I  have  been  a  sucker  for online  training programs  for  quite  a  while  now.  After researching  and  trying  several  big  names  in  the  field  of e-learning,  I  have  come  to love  Promasters.  What  strikes  me  the  most  about  this e-learning platform  is  its interactive training sessions and affordable pricing.</p>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="item">
                 <div class="padm">
                    <div class="card3 h-100 border-blue">
                       <div class="card-body">
                          <div class="test-img">
                             <img src="{{url('public/assets/user-images/user.jpg')}}">
                          </div>
                          <div class="content-area">
                             <h5>I am hooked!</h5>
                             <p>As  a  business  student,  I  am  always  in  hunt  of  new courses to  improve  my  scope  of skills. Luckily, I found Promasters, which is by far the best e-learning platform I have ever come across. Impressive course catalog and real-life examples and situationsby this online education platform are all that I live to learn now! </p>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
              <!-- card -->
              <div class="item">
                 <div class="padm">
                    <div class="card3 h-100 border-voilet">
                       <div class="card-body">
                          <div class="test-img">
                             <img src="{{url('public/assets/user-images/user2.jpg')}}">
                          </div>
                          <div class="content-area">
                             <h5>Love their practical Teaching method! </h5>
                             <p>I  have  always  had  a  strong  distaste  for  the  book  cramming  culture.  Stepping  into professional life showed how academic learning is worth only a little as compared to practical  knowledge.  Promasters  has  proven  to  be  a  great  source  of professional training for me because of its dynamic content display and real-time situations. I am in love!</p>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
              <!-- card -->
              <div class="item">
                 <div class="padm">
                    <div class="card3 h-100 border-green">
                       <div class="card-body">
                          <div class="test-img">
                             <img src="{{url('public/assets/user-images/user3.jpg')}}">
                          </div>
                          <div class="content-area">
                             <h5>Amazing and Affordable! </h5>
                             <p>We  all  know  how  much  student-class  suffers  from  bank  loans  and  educational expenses.  Promasters  is  undoubtedly  a  relief  because  of  its  pocket-friendly  course catalog.  I  purchased  its  Course  bundle  worth  $999  and  was  surprised  to  see  so  much information packed in a package of 10 courses and eBooks.</p>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="item">
                 <div class="padm">
                    <div class="card3 h-100 border-red">
                       <div class="card-body">
                          <div class="test-img">
                             <img src="{{url('public/assets/user-images/user5.jpg')}}">
                          </div>
                          <div class="content-area">
                             <h5>Promasters changed my life! </h5>
                             <p>I  am  a  highly  functional  analyst  who  is  always  struggling  with  emotional  intelligence and  creative  thinking.  Often,  I  have  been  mistaken  for  a  narcissist  because  of  poor communication skills. Recently, I bought the $ 999-course bundle from Promasters. Let me tell you, the course catalog and eBooks changed my life for the better. Yo u  have to trythis!</p>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="item">
                 <div class="padm">
                    <div class="card3 h-100 border-lasun">
                       <div class="card-body">
                          <div class="test-img">
                             <img src="{{url('public/assets/user-images/user6.jpg')}}">
                          </div>
                          <div class="content-area">
                             <h5>Promasters helped me in many ways! </h5>
                             <p>I love Promasters because this platform encourages effort and values interest. I am a holder of all 10 online certificates offered by Promasters, thanks to its extremely affordable  $999  bundle.  Trust  me  when  I  say  that  the  market  out  there  awaits online certificate holders.</p>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="item">
                 <div class="padm">
                    <div class="card3 h-100 border-blue">
                       <div class="card-body">
                          <div class="test-img">
                             <img src="{{url('public/assets/user-images/user7.jpg')}}">
                          </div>
                          <div class="content-area">
                             <h5>Thank you for helping me establish professionally!</h5>
                             <p>I have struggled with getting a good job for quite some years now. Always in debt to the  friend  who  suggested  me  to  get  Promasters’s  $999  package  which  helped  me establish professionally. Take it from a fellow professional; it’s worth it!</p>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="item">
                 <div class="padm">
                    <div class="card3 h-100 border-yellow">
                       <div class="card-body">
                          <div class="test-img">
                             <img src="{{url('public/assets/user-images/user8.jpg')}}">
                          </div>
                          <div class="content-area">
                             <h5>My team loves me!</h5>
                             <p>As a startup leader, I found Promasters much resourceful considering its vast range of courses for new leaders and team workers. I have recommended this platform to all my employees.</p>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="item">
                 <div class="padm">
                    <div class="card3 h-100 border-green">
                       <div class="card-body">
                          <div class="test-img">
                             <img src="{{url('public/assets/user-images/user9.jpg')}}">
                          </div>
                          <div class="content-area">
                             <h5>Promasters made me a winner!</h5>
                             <p>My boss loves me! Promasteris the reason behind it. I took some time to learn time management  coursework,  which  helped  me  in  boosting  my  productivity.  I  am  now the star in my office!</p>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="item">
                 <div class="padm">
                    <div class="card3 h-100 border-lavda">
                       <div class="card-body">
                          <div class="test-img">
                             <img src="{{url('public/assets/user-images/user10.jpg')}}">
                          </div>
                          <div class="content-area">
                             <h5>Thank you for making a peace-lover!</h5>
                             <p>As  a  short-tempered  person,  I  have  always  struggled  with  preventing  conflicts. Promasters’s  EI  course  and  Conflict  management  course  helped  me  in  becoming  a peace-lover. I am now living a conflict-free professional and personal life.</p>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
@endsection

@section('section-8')
	<section class="number drag-this-up">
        <div class="container-fluid">
           <div class="col-lg-6">
              <div class="left-section">
                 <img src="{{url('public/assets/user-images/client_map.png')}}">
              </div>
           </div>
           <div class="col-lg-5">
              <div class="right-section">
                 <h4><img src="{{url('public/assets/user-images/logo.png')}}"> in numbers</h4>
                 <div class="row voms">
                    <div class="col-md-6 col-xs-6">
                       <div class="center-img">
                          <img src="{{url('public/assets/user-images/inovet1.png')}}">
                          <h3>100,000+ </h3>
                          <p>Certified Professionals</p>
                       </div>
                    </div>
                    <div class="col-md-6 col-xs-6">
                       <div class="center-img">
                          <img src="{{url('public/assets/user-images/inovet2.png')}}">
                          <h3>36 </h3>
                          <p>Countries Represented</p>
                       </div>
                    </div>
                 </div>
                 <div class="br-right"></div>
                 <div class="row mast">
                    <div class="col-md-6 col-xs-6">
                       <div class="center-img">
                          <img src="{{url('public/assets/user-images/inovet3.png')}}">
                          <h3>100,000+ </h3>
                          <p>Certificates Awarded</p>
                       </div>
                    </div>
                    <div class="col-md-6 col-xs-6">
                       <div class="center-img">
                          <img src="{{url('public/assets/user-images/inovet4.png')}}">
                          <h3>+2 Million </h3>
                          <p>Reached Workforce</p>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
@endsection

@section('section-9')
	<section class="contact-vs drag-this-up" id="contact">
        <div class="container">
           <div class="row">
              <div class="title-main">
                 <h3>Contact Us</h3>
              </div>
           </div>
           <div class="row pushtop-60">
              <div class="center-form">
                 <form>
                    <div class="formgroup">
                       <input type="text" placeholder="Name" name="">
                    </div>
                    <div class="formgroup">
                       <input type="text" placeholder="Email" name="">
                    </div>
                    <div class="formgroup">
                       <input type="text" placeholder="Subject" name="">
                    </div>
                    <div class="formgroup">
                       <textarea class="" rows="5" id="comment" placeholder="Message"></textarea>
                    </div>
                    <div class="formgroup">
                       <a href="#" class="btn-send-w" data-toggle="modal" data-target="#myModal2">Send Message</a>
                    </div>
                 </form>
              </div>
           </div>
        </div>
	</section>
@endsection

@section('section-10')
	<section class="socail">
        <div class="container">
           <div class="col-lg-6">
              <div class="ftr-sec">
                 <h2>Join the <img src="{{url('public/assets/user-images/logo.png')}}"> community</h2>
              </div>
           </div>
           <div class="col-lg-6">
              <div class="socail-media">
                 <span>Follow us on</span>
                 <ul class="media">
                    <li><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i>
                       </a>
                    </li>
                    <li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i>
                       </a>
                    </li>
                    <li><a href=""><i class="fa fa-google-plus" aria-hidden="true"></i>
                       </a>
                    </li>
                    <li><a href=""><i class="fa fa-instagram" aria-hidden="true"></i>
                       </a>
                    </li>
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
				var obj = $(this).parent().next().next();
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
						obj.html('<div class="alert alert-success"> <i class="fa fa-check-circle"></i><span class="cart-message">Course Added Successfully!</span> <a href="{{url("cart")}}" class="btn btn-success view-cart">view cart</a> </div>');
					},error: function(xhr, status, error){
	                     obj.html('<div class="alert alert-danger"> <i class="fa fa-warning"></i><span class="cart-message">Somthing went wrong! try again.</span> </div>');
	                     $(".add-to-cart-btn").attr('disabled',false);
						$('.add-to-cart-btn img').hide();
	                 }
				})
			})
		})
	</script>	
@endsection






