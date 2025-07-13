@include('frontend.partials.head')

<iframe src="https://munarealestate.com/?fluent-form=7" allowfullscreen></iframe>

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
