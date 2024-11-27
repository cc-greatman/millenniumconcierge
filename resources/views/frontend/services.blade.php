@include('frontend.partials.head')

@include('frontend.partials.navbar')

<!-- Header Banner -->
<div class="banner-header section-padding valign bg-img bg-fixed bg-position-bottom" data-overlay-dark="5" data-background="{{ asset("../frontend/img/restaurant/2.jpg") }}">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center caption">
                <h1>Our Services</h1>
            </div>
        </div>
    </div>
    <!-- button scroll -->
    <a href="#" data-scroll-nav="1" class="mouse smoothscroll"> <span class="mouse-icon">
            <span class="mouse-wheel"></span> </span>
    </a>
</div>
<!-- Services -->
<section class="services2 section-padding" data-scroll-index="1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="services2 left mb-90">
                    <figure><img src="{{ asset("../frontend/img/restaurant/1.jpg") }}" alt="" class="img-fluid"></figure>
                    <div class="caption padding-left">
                        <h4><a href="{{ route('services') }}">Private Jet Charter</a></h4>
                        <p>Embark on unparalleled luxury with Millennium Concierge's Private Jet Charter Services. Elevate your travel experience with personalized service, unmatched comfort, and seamless efficiency. Whether for business or leisure, redefine the way you soar through the skies with us.</p>
                        <div class="info-wrapper mt-20">
                            <div class="butn-dark"> <a href="{{ route('contact') }}"><span>Learn More</span></a> </div>
                        </div>
                    </div>
                </div>
                <div class="services2 mb-90">
                    <figure><img src="{{ asset("../frontend/img/spa/3.jpg") }}" alt="" class="img-fluid"></figure>
                    <div class="caption padding-left">
                        <h4><a href="{{ route('services') }}">Luxury Vacations</a></h4>
                        <p>Experience unparalleled luxury with Millennium Concierge's exclusive vacation services. From lavish accommodations to meticulously crafted itineraries, escape the ordinary and indulge in a world where opulence knows no bounds. Welcome to luxury redefined.</p>
                        <div class="info-wrapper mt-20">
                            <div class="butn-dark"> <a href="{{ route('contact') }}"><span>Learn More</span></a> </div>
                        </div>
                    </div>
                </div>
                <div class="services2 left mb-90">
                    <figure><img src="{{ asset("../frontend/img/spa/2.jpg") }}" alt="" class="img-fluid"></figure>
                    <div class="caption padding-left">
                        <h4><a href="{{ route('services') }}">Super Cars</a></h4>
                        <p>Experience bespoke luxury on the road with Millennium Concierge. Our expert team assists in selecting the ideal rental car, perfectly suited to your personality, location, and occasion. From sleek sports cars to prestigious sedans, we ensure every journey exceeds expectations.</p>
                        <div class="info-wrapper mt-20">
                            <div class="butn-dark"> <a href="{{ route('contact') }}"><span>Learn More</span></a> </div>
                        </div>
                    </div>
                </div>
                <div class="services2 mb-90">
                    <figure><img src="{{ asset("../frontend/img/spa/1.jpg") }}" alt="" class="img-fluid"></figure>
                    <div class="caption padding-left">
                        <h4><a href="{{ route('services') }}">Art Collection & Exhibition</a></h4>
                        <p> Delight in the unique beauty of expensive art. Our collection of fine art will let you explore a world of beauty and creativity. The experienced artisans who make each artwork take great care to provide enduring memories</p>
                        <div class="info-wrapper mt-20">
                            <div class="butn-dark"> <a href="{{ route('contact') }}"><span>Learn More</span></a> </div>
                        </div>
                    </div>
                </div>
                <div class="services2 left mb-90">
                    <figure><img src="{{ asset("../frontend/img/restaurant/5.jpg") }}" alt="" class="img-fluid"></figure>
                    <div class="caption padding-left">
                        <h4><a href="{{ route('services') }}">Luxury Gifting</a></h4>
                        <p>Elevate your gifting with Millennium Concierge. Discover personalized luxury gifts reflecting your refined taste. From curated items to tailored packages, each offering is crafted to impress. Let us create memorable experiences for your celebrations and sentiments. Sophistication meets service at Millennium Concierge.</p>
                        <div class="info-wrapper mt-20">
                            <div class="butn-dark"> <a href="{{ route('contact') }}"><span>Learn More</span></a> </div>
                        </div>
                    </div>
                </div>
                <div class="services2 mb-90">
                    <figure><img src="{{ asset("../frontend/img/spa/6.jpg") }}" alt="" class="img-fluid"></figure>
                    <div class="caption padding-left">
                        <h4><a href="{{ route('services') }}">Fine Dining</a></h4>
                        <p>Experience culinary perfection with Millennium Concierge's Fine Dining services. From Michelin-starred venues to exclusive chef-led tastings, indulge in unforgettable moments tailored to exceed your expectations. Elevate your dining experience with us.</p>
                        <div class="info-wrapper mt-20">
                            <div class="butn-dark"> <a href="{{ route('contact') }}"><span>Learn More</span></a> </div>
                        </div>
                    </div>
                </div>
                <div class="services2 left mb-90">
                    <figure><img src="{{ asset("../frontend/img/rooms/19.jpg") }}" alt="" class="img-fluid"></figure>
                    <div class="caption padding-left">
                        <h4><a href="{{ route('services') }}">Hotel Booking</a></h4>
                        <p>Discover unparalleled luxury with Millennium Concierge's Hotel Booking services. From lavish suites to serene retreats, we cater to every traveler's needs, with utmost privacy while ensuring unforgettable stays. Experience comfort and convenience redefined with us.</p>
                        <div class="info-wrapper mt-20">
                            <div class="butn-dark"> <a href="{{ route('contact') }}"><span>Learn More</span></a> </div>
                        </div>
                    </div>
                </div>
                <div class="services2 mb-90">
                    <figure><img src="{{ asset("../frontend/img/spa/5.jpg") }}" alt="" class="img-fluid"></figure>
                    <div class="caption padding-left">
                        <h4><a href="{{ route('services') }}">Flight Booking</a></h4>
                        <p>Welcome to Millennium Concierge's Flight Booking services, where seamless travel experiences take flight. From securing the best flight options to arranging bespoke travel itineraries, trust us to elevate your journey with personalized perfection. Welcome aboard, where your adventure begins with us.</p>
                        <div class="info-wrapper mt-20">
                            <div class="butn-dark"> <a href="{{ route('contact') }}"><span>Learn More</span></a> </div>
                        </div>
                    </div>
                </div>
                <div class="services2 left mb-90">
                    <figure><img src="{{ asset("../frontend/img/rooms/0.jpg") }}" alt="" class="img-fluid"></figure>
                    <div class="caption padding-left">
                        <h4><a href="{{ route('services') }}">Luxury Yatchs</a></h4>
                        <p>Experience luxury on the waves with Millennium Concierge's Yacht Cruise services. From serene escapes to vibrant celebrations, our tailored experiences ensure every moment at sea is unforgettable. Welcome aboard for an extraordinary maritime adventure with us.</p>
                        <div class="info-wrapper mt-20">
                            <div class="butn-dark"> <a href="{{ route('contact') }}"><span>Learn More</span></a> </div>
                        </div>
                    </div>
                </div>
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
