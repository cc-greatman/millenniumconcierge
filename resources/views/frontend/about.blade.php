@include('frontend.partials.head')

@include('frontend.partials.navbar')

<!-- Header Banner -->
<div class="banner-header section-padding valign bg-img bg-fixed bg-position-bottom" data-overlay-dark="4" data-background="{{ asset("../frontend/img/slider/6.jpg") }}">
    <div class="container">
        <div class="row">
            <div class="col-md-12 caption text-center">
                <h1>About Us</h1>
            </div>
        </div>
    </div>
    <!-- button scroll -->
    <a href="#" data-scroll-nav="1" class="mouse smoothscroll"> <span class="mouse-icon">
            <span class="mouse-wheel"></span> </span>
    </a>
</div>
<!-- About -->
<section class="about section-padding" data-scroll-index="1">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="sub-title border-bot-light">About</div>
            </div>
            <div class="col-md-9">
                <div class="section-title">Millennium Concierge</div>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <p>At Millennium Concierge, we recognize that as a distinguished leader in cooperation, business, entertainment, and politics, your time is invaluable. Balancing the demands of your position with personal tasks can be daunting, leaving little room for efficient management of everything on your plate. That's where we come in.</p>
                        <p>Established with the sole purpose of granting you more precious time for yourself, Millennium Concierge specializes in handling time-consuming and repetitive tasks while ensuring your exclusive access to high-end private events. With our wealth of experience, we are dedicated to providing personalized support tailored specifically to your needs.</p>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="row g-3">
                            <div class="col-6 text-end"> <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="{{ asset("../frontend/img/about-1.jpg") }}" style="margin-top: 25%;"> </div>
                            <div class="col-6 text-start"> <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="{{ asset("../frontend/img/about-2.jpg") }}"> </div>
                            <div class="col-6 text-end"> <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s" src="{{ asset("../frontend/img/about-3.jpg") }}"> </div>
                            <div class="col-6 text-start"> <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="{{ asset("../frontend/img/about-4.jpg") }}"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Promo Video -->
<section class="video-wrapper video section-padding bg-img bg-fixed" data-overlay-dark="5" data-background="{{ asset("../frontend/img/slider/1.jpg") }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12 text-center">
                <div class="section-subtitle"><span style="color: #fff;">Millennium Concierge</span></div>
                <div class="section-title" style="margin-top: 30px;"><span>We only have one life. So why not make the most of it?</span></div>
            </div>
        </div>
    </div>
</section>
<!-- Team -->
<section class="about section-padding" data-scroll-index="1">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="section-title">Millennium Concierge</div>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <p>Understanding the dynamic nature of your schedule as a busy executive, we offer personalized membership packages designed to accommodate your unique requirements. Whether you need daily assistance or occasional support, we have a membership plan that suits you perfectly.</p>
                        <p>Millennium Concierge offers personalized services to reclaim your time and access exclusive experiences. With our personal concierge services, you can focus on your professional and personal life without worrying about the details. Contact us today to optimize your lifestyle with Millennium Concierge.</p>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="row g-3">
                            <div class="col-6 text-end"> <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="{{ asset("../frontend/img/about-5.jpg") }}" style="margin-top: 25%;"> </div>
                            <div class="col-6 text-start"> <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="{{ asset("../frontend/img/about-6.jpg") }}"> </div>
                            <div class="col-6 text-end"> <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s" src="{{ asset("../frontend/img/about-7.jpg") }}"> </div>
                            <div class="col-6 text-start"> <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="{{ asset("../frontend/img/about-8.jpg") }}"> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="sub-title border-bot-light">More on</div>
            </div>
        </div>
    </div>
</section>
<!-- Booking Search -->
<section class="section-padding bg-img bg-fixed" data-overlay-dark="3" data-background="{{ asset("../frontend/img/rooms/18.jpg") }}">
    <div class="container">
    </div>
</section>

@include('frontend.partials.footer')
