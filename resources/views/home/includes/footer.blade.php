 <footer class="new_footer_area bg_color">
     <div class="new_footer_top">
         <div class="container">
             <div class="row">
                 <div class="col-lg-3 col-md-6">
                     <div id="subscribed" class="f_widget company_widget wow fadeInLeft" data-wow-delay="0.2s">
                         <h3 class="f-title f_600 t_color f_size_18">Get in Touch</h3>
                         <p>Don’t miss any updates of our new offers and course programs!</p>
                         <form action="{{url('subscribe')}}" class="f_subscribe_two" method="post">
                          @csrf
                          @if (Session::has('message'))
                          <div class="row">
                             <div class="alert alert-info">{{ Session::get('message') }}</div>
                          </div>
                          @endif
                          @if (Session::has('error'))
                          <div class="row">
                             <div class="alert alert-danger">{{ Session::get('error') }}</div>
                          </div>
                          @endif
                             <input type="email" name="email" class="form-control" placeholder="Email" required>
                             <button class="btn btn_get btn_get_two" type="submit">Subscribe</button>
                             <p class="mchimp-errmessage"></p>
                             <p class="mchimp-sucmessage"></p>
                         </form>
                     </div>
                 </div>
                 <div class="col-lg-3 col-md-6">
                     <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.4s">
                         <h3 class="f-title f_600 t_color f_size_18">Institute</h3>
                         <ul class="list-unstyled f_list">
                             <li><a href="{{url('/')}}#">Home</a></li>
                             <li><a href="{{url('/')}}#courses">Courses</a></li>
                             <li><a href="{{url('/')}}#how">How It Works</a></li>
                             <li><a href="{{url('/')}}#numbers">About Us</a></li>
                             <li><a href="{{url('/')}}#pricing">Pricing</a></li>
                         </ul>
                     </div>
                 </div>
                 <div class="col-lg-3 col-md-6">
                     <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.6s">
                         <h3 class="f-title f_600 t_color f_size_18">Help</h3>
                         <ul class="list-unstyled f_list">
                             <li><a href="{{url('assistance-directory')}}">Assistance Directory</a></li>
                             <li><a data-toggle="modal" data-target=".terms">Terms & Conditions</a></li>
                             <li><a data-toggle="modal" data-target=".privacy">Privacy Policy</a></li>
                             <li><a data-toggle="modal" data-target=".support">Support Policy</a></li>
                             <li><a data-toggle="modal" data-target=".deliver">Delivery Policy</a></li>

                         </ul>
                     </div>
                 </div>
                 <div class="col-lg-3 col-md-6">
                     <div class="f_widget social-widget pl_70 wow fadeInLeft" data-wow-delay="0.8s">
                         <h3 class="f-title f_600 t_color f_size_18">Contact Us</h3>
                         <div class="guide-text" style="padding: 0!important">

                             <a href="{{route('contactUs')}}" class="price_btn btn_hover">Send Message</a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <div class="footer_bg ">

         </div>



     </div>
     <div class="highlight">
         <h5>Providing innovative and high quality education for students, professionals and work forces all around the globe</h5>
     </div>
     <div class="footer_bottom">
         <div class="container">
             <p class="mb-0 f_400">© 2020 Promasters All Rights
                 Reserved</p>

         </div>
     </div>
 </footer>
 </div>

 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>


 <script src="{{url('public/assets/js/propper.js')}}"></script>
 <script src="{{url('public/assets/js/bootstrap.min.js')}}"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.18.0/js/mdb.min.js" type="text/javascript" charset="utf-8" async defer></script>
 <script src="{{url('public/assets/vendors/bootstrap-selector/js/bootstrap-select.min.js')}}"></script>
 <script src="{{url('public/assets/vendors/wow/wow.min.js')}}"></script>
 <script src="{{url('public/assets/vendors/sckroller/jquery.parallax-scroll.js')}}"></script>
 <script src="{{url('public/assets/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
 <script src="{{url('public/assets/vendors/nice-select/jquery.nice-select.min.js')}}"></script>
 <script src="{{url('public/assets/vendors/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
 <script src="{{url('public/assets/vendors/isotope/isotope-min.js')}}"></script>
 <script src="{{url('public/assets/vendors/magnify-pop/jquery.magnific-popup.min.js')}}"></script>
 <script src="{{url('public/assets/vendors/circle-progress/circle-progress.js')}}"></script>
 <script src="{{url('public/assets/vendors/counterup/jquery.counterup.min.js')}}"></script>
 <script src="{{url('public/assets/vendors/counterup/jquery.waypoints.min.js')}}"></script>
 <script src="{{url('public/assets/vendors/counterup/appear.js')}}"></script>
 <script src="{{url('public/assets/vendors/scroll/jquery.mCustomScrollbar.concat.min.js')}}"></script>
 <script src="{{url('public/assets/js/plugins.js')}}"></script>
 <script src="{{url('public/assets/vendors/multiscroll/jquery.easings.min.js')}}"></script>
 <script src="{{url('public/assets/vendors/multiscroll/multiscroll.responsiveExpand.limited.min.js')}}"></script>
 <script src="{{url('public/assets/vendors/multiscroll/jquery.multiscroll.extensions.min.js')}}"></script>
 <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->
 <script src="{{url('public/assets/js/main.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
 <!-- Optional JavaScript -->
 <!-- jQuery first, then Popper.js, then Bootstrap JS -->

 @yield('script')

 <script type="text/javascript">
setInterval(function(){ 
   $("option").not('.goog-te-combo option[value="es"],.goog-te-combo option[value="en"]').hide();
 }, 1000);
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
console.log($('meta[name="csrf-token"]').attr('content'));
</script>

<script type="text/javascript">
   $(document).delegate('.wpe','click',function(){
      $(".alert").remove();
   })
   $(document).ready(function(){
      jQuery.validator.addClassRules("required", {
          required: true,
          normalizer: function(value) {
            return $.trim(value);
          }
        });

      $("#login-form").validate({
         submitHandler: function (form) {
            $('.form-submit-btn').attr('disabled',true);
            $('.form-submit-btn').text('WAIT...');
             $.ajax({
                 type: "POST",
                 url: "{{url('login')}}",
                 data: $(form).serialize(),
                 success: function (data) {
                     console.log(data);
                    if($.trim(data) == 'true'){
                        $('.form-submit-btn').attr('disabled',false);
                        $('.form-submit-btn').text('LOGIN');
                        window.location="{{url('user/courses')}}";
                    }else{
                        // Command: toastr["error"]("invalid email or password");
                        // $.toaster({ priority : 'info', title : 'Error', message : 'invalid email or password'});
                        $('.error-message').removeClass('display');
                        $('.form-submit-btn').attr('disabled',false);
                        $('.form-submit-btn').text('LOGIN');
                    }
                 },
                 error: function(xhr, status, error){
                     Command: toastr["error"]("Something went wrong");
                     $('.form-submit-btn').attr('disabled',false);
                     $('.form-submit-btn').text('LOGIN');
                 }
             });
         }
      });
   });
</script>
<script type="text/javascript">
   var acc = document.getElementsByClassName("accordion");
   var i;
   for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var panel = this.nextElementSibling;
      if (panel.style.display === "block") {
        panel.style.display = "none";
      } else {
        panel.style.display = "block";
      }
    });
   }
</script>
<script>
   // Reviews slider
   $(".reviews .owl-carousel").owlCarousel({
       loop: true,
       margin: 35,
       nav: true,
       center: true,
       autoplay: true,
       navText: [
           '<i class="fa fa-angle-left"></i>',
           '<i class="fa fa-angle-right"></i>'
       ],
       responsive: {
           0: {
               items: 1
           },
           600: {
               items: 2
           },
           750: {
               items: 2
           },
           1000: {
               items: 3
           }
       }
   });
@if(session('status'))
   Command: toastr["success"]("{{session('status')}}");
@endif
@if(session('error'))
   Command: toastr["error"]("{{session('error')}}");
@endif
@if(session('success'))
   Command: toastr["success"]("{{session('success')}}");
@endif
</script>

 
 </body>

 </html>