@include('frontend.partials.head')
@include('frontend.partials.navbar')

<!-- Kenburns Slider -->
<aside class="kenburns-section" id="kenburnsSliderContainer" data-overlay-dark="5">
    <div class="kenburns-inner h-100">
        <div class="v-middle caption text-center">
            <div class="container">
                <div class="row justify-content-center h-100">
                    <div class="col-lg-8 col-md-12">
                        <h4>Luxury at it's finest</h4>
                        <h1>Your Foremost Concierge Service</h1>
                        <div class="butn-light mt-30 mb-30"> <a href="{{ route('about') }}"><span>Explore More</span></a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- button scroll -->
    <a href="#" data-scroll-nav="1" class="mouse smoothscroll">
        <span class="mouse-icon">
            <span class="mouse-wheel"></span>
        </span>
    </a>
</aside>
<!-- About -->
<section class="about section-padding" data-scroll-index="1">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="sub-title border-bot-light">Welcome to</div>
            </div>
            <div class="col-md-9">
                <div class="section-title">Millennium Concierge</div>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <p>Welcome to Millennium Concierge, where elegance and dedication converge to craft unparalleled experiences. With a commitment to excellence, we offer bespoke services tailored to your unique preferences. From exclusive experiences to coveted amenities, we ensure every moment is extraordinary, embracing life to the fullest.</p>
                        <p>As your trusted concierge partner, we anticipate your needs and turn your desires into reality before they're even spoken. At Millennium, luxury is a personalized journey that elevates every aspect of your life. Welcome to a world where elegance and dedication redefine luxury at Millennium Concierge.</p>
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
<!-- Services -->
<section class="services2 section-padding" data-scroll-index="1">
    <div class="container">
        <div class="row mb-30">
            <div class="col-md-3">
                <div class="sub-title border-bot-light">Discover</div>
            </div>
            <div class="col-md-9">
                <div class="section-title">Our Core Services</div>
                <p>From indulging in exclusive escapades to accessing coveted amenities, we exist to transform your desires into tangible realities. At Millennium Concierge, luxury isn't merely a service – it's a personalized journey tailored to your distinct preferences and dreams. Our dedication lies in ensuring that every encounter with us transcends the ordinary, leaving an indelible mark on your memory.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <div class="owl-carousel owl-theme">
                <div class="services2 left">
                    <figure><img src="{{ asset("../frontend/img/restaurant/1.jpg") }}" alt="" class="img-fluid"></figure>
                    <div class="caption padding-left">
                        <h4><a href="{{ route('services') }}">Private Jet Charter</a></h4>
                        <p>Embark on unparalleled luxury with Millennium Concierge's Private Jet Charter Services. Elevate your travel experience with personalized service, unmatched comfort, and seamless efficiency. Whether for business or leisure, redefine the way you soar through the skies with us.</p>
                        <div class="info-wrapper mt-20">
                            <div class="butn-dark"> <a href="{{ route('services') }}"><span>Learn More</span></a> </div>
                        </div>
                    </div>
                </div>
                <div class="services2">
                    <figure><img src="{{ asset("../frontend/img/spa/3.jpg") }}" alt="" class="img-fluid"></figure>
                    <div class="caption padding-left">
                        <h4><a href="{{ route('services') }}">Luxury Vacations</a></h4>
                        <p>Experience unparalleled luxury with Millennium Concierge's exclusive vacation services. From lavish accommodations to meticulously crafted itineraries, escape the ordinary and indulge in a world where opulence knows no bounds. Welcome to luxury redefined.</p>
                        <div class="info-wrapper mt-20">
                            <div class="butn-dark"> <a href="{{ route('services') }}"><span>Learn More</span></a> </div>
                        </div>
                    </div>
                </div>
                <div class="services2 left">
                    <figure><img src="{{ asset("../frontend/img/spa/2.jpg") }}" alt="" class="img-fluid"></figure>
                    <div class="caption padding-left">
                        <h4><a href="{{ route('services') }}">Super Cars</a></h4>
                        <p>Experience bespoke luxury on the road with Millennium Concierge. Our expert team assists in selecting the ideal rental car, perfectly suited to your personality, location, and occasion. From sleek sports cars to prestigious sedans, we ensure every journey exceeds expectations.</p>
                        <div class="info-wrapper mt-20">
                            <div class="butn-dark"> <a href="{{ route('services') }}"><span>Learn More</span></a> </div>
                        </div>
                    </div>
                </div>
                <div class="services2">
                    <figure><img src="{{ asset("../frontend/img/spa/1.jpg") }}" alt="" class="img-fluid"></figure>
                    <div class="caption padding-left">
                        <h4><a href="{{ route('services') }}">Art Collection & Exhibition</a></h4>
                        <p> Delight in the unique beauty of expensive art. Our collection of fine art will let you explore a world of beauty and creativity. The experienced artisans who make each artwork take great care to provide enduring memories</p>
                        <div class="info-wrapper mt-20">
                            <div class="butn-dark"> <a href="{{ route('services') }}"><span>Learn More</span></a> </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('frontend.partials.footer')
