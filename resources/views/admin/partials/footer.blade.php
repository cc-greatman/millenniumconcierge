        <!-- [ Main Content ] end -->
        <footer class="pc-footer">
            <div class="footer-wrapper container-fluid">
                <div class="row">
                    <div class="col-sm-3 my-1">
                      <p class="m-0">Made with ♥ by Team <a href="https://bitsys.ng" target="_blank"> BitSys Nigeria</a></p>
                    </div>
                    <div class="col-auto my-1">
                      <ul class="list-inline footer-link mb-0">
                        <li class="list-inline-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="list-inline-item"><a href="{{ route('about') }}">About</a></li>
                        <li class="list-inline-item"><a href="{{ route('gallery') }}">Gallery</a></li>
                        <li class="list-inline-item"><a href="{{ route('services') }}">Services</a></li>
                        <li class="list-inline-item"><a href="{{ route('membership') }}">Membership</a></li>
                        <li class="list-inline-item"><a href="{{ route('contact') }}">Enquiry</a></li>
                      </ul>
                    </div>
                    <div class="col-auto my-1">
                        <p>&copy; {{ date('Y') }} Millennium Concierge. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- [Page Specific JS] start -->
        <script src="{{ asset("../backend/js/pages/dashboard-help.js") }}"></script>
        <script src="{{ asset("../backend/js/plugins/apexcharts.min.js") }}"></script>
        <script src="{{ asset("../backend/js/plugins/jsvectormap.min.js") }}"></script>
        <script src="{{ asset("../backend/js/plugins/world.js") }}"></script>
        <script src="{{ asset("../backend/js/plugins/world-merc.js") }}"></script>
        <script src="{{ asset("../backend/js/pages/dashboard-default.js") }}"></script>
        <!-- [Page Specific JS] end -->
        <!-- Required Js -->
        <script src="{{ asset("../backend/js/plugins/popper.min.js") }}"></script>
        <script src="{{ asset("../backend/js/plugins/simplebar.min.js") }}"></script>
        <script src="{{ asset("../backend/js/plugins/bootstrap.min.js") }}"></script>
        <script src="{{ asset("../backend/js/fonts/custom-font.js") }}"></script>
        <script src="{{ asset("../backend/js/pcoded.js") }}"></script>
        <script src="{{ asset("../backend/js/show-password.js") }}"></script>
        <script src="{{ asset("../backend/js/plugins/feather.min.js") }}"></script>

        <!-- [Page Specific JS] start -->
        <!-- datatable Js -->
        <script src="{{ asset("../backend/js/cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js") }}"></script>
        <script src="{{ asset("../backend/js/plugins/dataTables.min.js") }}"></script>
        <script src="{{ asset("../backend/js/plugins/dataTables.bootstrap5.min.js") }}"></script>
        <script src="{{ asset("../backend/js/plugins/dataTables.responsive.min.js") }}"></script>
        <script src="{{ asset("../backend/js/plugins/responsive.bootstrap5.min.js") }}"></script>
        <script>
        // [ Configuration Option ]
        $('#res-config').DataTable({
            responsive: true
        });

        // [ New Constructor ]
        var newcs = $('#new-cons').DataTable();

        new $.fn.dataTable.Responsive(newcs);

        // [ Immediately Show Hidden Details ]
        $('#show-hide-res').DataTable({
            responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.childRowImmediate,
                type: ''
            }
            }
        });
        </script>
        <!-- [Page Specific JS] end -->

    </body>
    <!-- [Body] end -->

</html>
