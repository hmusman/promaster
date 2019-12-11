
       

            </div><!--container-fluid dashboard-content -->
        </div><!--dashboard-ecommerce -->
    </div> <!--dashboard-wrapper -->

    <!-- jquery 3.3.1 -->
    <script src="{{url('public/assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <!-- bootstap bundle js -->
    <script src="{{url('public/assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <!-- slimscroll js -->
    <script src="{{url('public/assets/vendor/slimscroll/jquery.slimscroll.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="{{url('public/assets/vendor/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{url('public/assets/vendor/datatables/js/data-table.js')}}"></script>
    <script src="{{url('public/assets/libs/js/main-js.js')}}"></script>
   <script src="{{url('public/assets/vendor/bootstrap-select/js/bootstrap-select.js')}}"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    @stack('scripts');
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