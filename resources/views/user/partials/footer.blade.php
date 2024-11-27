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

        <!-- Required Js -->
        <script src="{{ asset("../backend/js/plugins/popper.min.js") }}"></script>
        <script src="{{ asset("../backend/js/plugins/simplebar.min.js") }}"></script>
        <script src="{{ asset("../backend/js/plugins/bootstrap.min.js") }}"></script>
        <script src="{{ asset("../backend/js/fonts/custom-font.js") }}"></script>
        <script src="{{ asset("../backend/js/pcoded.js") }}"></script>
        <script src="{{ asset("../backend/js/show-password.js") }}"></script>
        <script src="{{ asset("../backend/js/plugins/feather.min.js") }}"></script>

    </body>
    <!-- [Body] end -->

</html>
