
<footer>
          <div class="pull-center">
            <!-- <p class="text-center">© 2020 All rights reserved.</p> -->
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- jQuery -->
    <script src="{{ asset('assets/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('assets/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('assets/vendors/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('assets/vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="{{ asset('assets/vendors/gauge.js/dist/gauge.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('assets/vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ asset('assets/vendors/skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('assets/vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('assets/vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('assets/vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('assets/vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('assets/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('assets/vendors/DateJS/build/date.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('assets/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ asset('assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('assets/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('assets/admin/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/switchery/dist/switchery.min.js') }}"></script>
    <script src="{{ asset('assets/js/ajax/ajax.js') }}"></script>
    <script src="{{ asset('assets/js/ajax/offcanvas.js') }}"></script>
    <script src="{{ asset('assets/js/toaster/toaster.js') }}"></script>
    <script src="{{ asset('assets/js/validation/validation.js') }}"></script>
    <script src="{{ asset('assets/js/validation/validate.js') }}"></script>
    <script src="{{ asset('assets/ckeditor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/bootstrap-iconpicker/jquery-menu-editor.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/bootstrap-iconpicker/js/iconset/fontawesome5-3-1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/bootstrap-iconpicker/js/bootstrap-iconpicker.min.js') }}"></script>
    

@yield('scripts')


    <script>
    @if(Session::has('message'))
    toastr.options =
    {
      "closeButton" : true,
      "progressBar" : true
    }
        toastr.success("{{ session('message') }}");
    @endif
    </script>


<script>

   $(document).ready(function(){

        @foreach($errors->all() as $error)
    toastr.options =
    {
      "closeButton" : true,
      "progressBar" : true
    }
        toastr.error("All field is required");
        return false;
        @endforeach
        
      })
    </script>


<script type="text/javascript">
        $(document).ready(function() {
          $(".sidebar-action-close").on("click", function() {
            $(".sidebar-container").animate({
                                      right: "-100%"
                                    }, 500, function() {
                                       $(".sidebar-container").addClass("d-none");
                                    });
            $(".sidebar-container").removeClass("sidebar-bg");
            $('html').removeClass('viewcrmbody');
            });

            $(".sidebar-action-open").on("click", function() {
                //update title of action in sidebar
                // $("h3[data-sidebar-title]").html($(".sidebar-action-open").html());

            $(".sidebar-container").removeClass("d-none");
            $('html').addClass('viewcrmbody');

            $(".sidebar-container").addClass("sidebar-bg");
            $(".sidebar-container").animate({
                                  right: "0"
                                }, 500, function() {
                          });
          });
        });
        </script>

<script type="text/javascript">
    CKEDITOR.replace( 'page_body' );
</script>
  </body>
</html>
