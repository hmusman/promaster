			<footer class="bg-white p-4 footer">
			    <div class="row">
			        <div class="col-md-6">
			            <div class="text-center text-md-left">
			                <p class="mb-0"> © Copyright <span id="copyright">
			                        <script>
			                        document.getElementById('copyright').appendChild(document.createTextNode(new Date()
			                            .getFullYear()))
			                        </script>
			                    </span>. <a href="{{url('user/courses')}}"> Promasters </a> All Rights Reserved. </p>
			            </div>
			        </div>
			        <div class="col-md-6">

			        </div>
			    </div>
			</footer>
			</div>
			</div>
			</div>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script src="{{url('public/assets/js/plugins-jquery.js')}}"></script>
			<script src="{{url('public/assets/js/circle-progress-bar.min.js')}}"></script>
			<script src="{{url('public/assets/js/progress.js')}}"></script>
			<script>
var plugin_path = "{{url('public/assets/js')}}";
			</script>
			<script src="{{url('public/assets/js/custom.js')}}"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
			
			<style>

@media print {
    #google_translate_element {
        display: none;
    }
}

body>.skiptranslate {
    display: none;
}

body {
    top: 0px !important;
}

.goog-te-banner-frame.skiptranslate {
    display: none !important;
}

#google_translate_element {
    position: absolute;
    bottom: 15px;
    left: 25px;
}
			</style>
<!-- 			<div id="google_translate_element"></div>
			<script type="text/javascript">
function googleTranslateElementInit() {
    new google.translate.TranslateElement({
        pageLanguage: 'en'
    }, 'google_translate_element');
}
			</script> -->
			<script type="text/javascript"
			    src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
			@stack('script');
<script type="text/javascript">
setInterval(function() {
    $("option").not('.goog-te-combo option[value="es"],.goog-te-combo option[value="en"]').hide();
}, 1000);
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
			</script>
			@yield('script')
			<script>
			    $(document).ready(
			            function() {
			                setInterval(function() {
			                    $('#notification').load(location.href + " #notification");
			                }, 10000);
			            });
			</script>
			</body>

			</html>