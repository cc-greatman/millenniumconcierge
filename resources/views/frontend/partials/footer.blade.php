<!-- Footer -->
<footer class="footer">
    <div class="top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-1">
                    <div class="item">
                        <h3>Get in touch</h3>
                        <p><strong>Enugu Office: </strong>Plot 9, Coal City Garden Estate, Okpara Avenue,
                            <br>Enugu State, Nigeria.
                        </p>
                        <p><strong>Abuja Office: </strong>Suite C303 Third Floor Block C, Millennium Plaza,
                            <br> Plot 251 Herbert Macaulay Way,
                            <br>Central Business District, Abuja.
                        </p>
                        <p class="phone"><a href="tel:+234 813 699 9988">+234 813 699 9988</a></p>
                        <p class="mail"><a href="mailto:info@millenniumconcierge.com">info@millenniumconcierge.com</a></p>
                        <div class="social mt-2"> <a target="_blank" href="https://www.instagram.com/millennium_concierge"><i class="ti-instagram"></i></a> </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item">
                        <h3>Useful Links</h3>
                        <ul class="footer-explore-list list-unstyled">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('about') }}">About</a></li>
                            <li><a href="{{ route('services') }}">Services</a></li>
                            <li><a href="{{ route('calendar') }}">Calendar</a></li>
                            <li><a href="{{ route('membership') }}">Membership</a></li>
                            <li><a href="{{ route('contact') }}">Enquiry</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <p>&copy; {{ date('Y') }} Millennium Concierge. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- jQuery -->
<script src="{{ asset("../frontend/js/jquery-3.6.3.min.js") }}"></script>
<script src="{{ asset("../frontend/js/jquery-migrate-3.0.0.min.js") }}"></script>
<script src="{{ asset("../frontend/js/modernizr-2.6.2.min.js") }}"></script>
<script src="{{ asset("../frontend/js/imagesloaded.pkgd.min.js") }}"></script>
<script src="{{ asset("../frontend/js/jquery.isotope.v3.0.2.js") }}"></script>
<script src="{{ asset("../frontend/js/pace.js") }}"></script>
<script src="{{ asset("../frontend/js/popper.min.js") }}"></script>
<script src="{{ asset("../frontend/js/bootstrap.min.js") }}"></script>
<script src="{{ asset("../frontend/js/scrollIt.min.js") }}"></script>
<script src="{{ asset("../frontend/js/jquery.waypoints.min.js") }}"></script>
<script src="{{ asset("../frontend/js/owl.carousel.min.js") }}"></script>
<script src="{{ asset("../frontend/js/jquery.stellar.min.js") }}"></script>
<script src="{{ asset("../frontend/js/jquery.magnific-popup.js") }}"></script>
<script src="{{ asset("../frontend/js/YouTubePopUp.js") }}"></script>
<script src="{{ asset("../frontend/js/select2.js") }}"></script>
<script src="{{ asset("../frontend/js/datepicker.js") }}"></script>
<script src="{{ asset("../frontend/js/smooth-scroll.min.js") }}"></script>
<script src="{{ asset("../frontend/js/wow.min.js") }}"></script>
<script src="{{ asset("../frontend/js/vegas.slider.min.js") }}"></script>
<script src="{{ asset("../frontend/js/custom.js") }}"></script>
<!-- Vegas Background Slideshow (vegas.slider kenburns) -->
<script>
    $(document).ready(function() {
        $('#kenburnsSliderContainer').vegas({
            slides: [{
                src: "../frontend/img/slider/0.jpg"
            },{
                src: "../frontend/img/slider/1.jpg"
            }, {
                src: "../frontend/img/slider/2.jpg"
            }, {
                src: "../frontend/img/slider/3.jpg"
            }, {
                src: "../frontend/img/slider/4.jpg"
            }, {
                src: "../frontend/img/slider/5.jpg"
            }],
            overlay: true,
            transition: 'fade2',
            animation: 'kenburnsUpRight',
            transitionDuration: 1000,
            delay: 10000,
            animationDuration: 20000
        });
    });

</script>
</body>
</html>
