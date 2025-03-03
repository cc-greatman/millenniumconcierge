@include('frontend.partials.head')

@include('frontend.partials.navbar')

<!-- Header Banner -->
<div class="banner-header section-padding valign bg-img bg-fixed bg-position-bottom" data-overlay-dark="5" data-background="{{ asset("../frontend/img/restaurant/10.jpg") }}">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center caption">
                <h1>Membership</h1>
            </div>
        </div>
    </div>
    <!-- button scroll -->
    <a href="#" data-scroll-nav="1" class="mouse smoothscroll"> <span class="mouse-icon">
            <span class="mouse-wheel"></span> </span>
    </a>
</div>
<!-- Services 4 -->
<section class="service4 section-padding" data-scroll-index="1">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-30">
                <div class="services4">
                    <div class="service-img"><img src="{{ asset("../frontend/img/news/1.jpg") }}" alt="" class="w-100"></div>
                    <div class="service-header">
                        <h3 class="service-label">Silver Membership</h3>
                    </div>
                    <div class="service-wrap">
                        <div class="service-cont">
                            <h4 class="service-title"><a href="#" style="background-image: linear-gradient(to right, #DFBF81, #BF9A53);
                                -webkit-background-clip: text;
                                -webkit-text-fill-color: transparent;
                                background-clip: text;
                                -text-fill-color: transparent;
                            ">Silver</a></h4>
                            <p class="service-text"><strong style="font-weight: 700;">This membership offers:</strong></p>
                            <p class="service-text">* Discounted hotel rates</p>
                            <p class="service-text">* Itinerary management and flight booking at no extra fee</p>
                        </div>
                        <div class="service-actions">
                            <a href="{{ route('auth.register.show') }}" class="icon-btn"><i class="ti-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-30">
                <div class="services4">
                    <div class="service-img"><img src="{{ asset("../frontend/img/news/2.jpg") }}" alt="" class="w-100"></div>
                    <div class="service-header">
                        <h3 class="service-label">Gold Membership</h3>
                    </div>
                    <div class="service-wrap">
                        <div class="service-cont">
                            <h4 class="service-title"><a href="#" style="background-image: linear-gradient(to right, #DFBF81, #BF9A53);
                                -webkit-background-clip: text;
                                -webkit-text-fill-color: transparent;
                                background-clip: text;
                                -text-fill-color: transparent;
                            ">Gold</a></h4>
                            <p class="service-text"><strong style="font-weight: 700;">This membership offers:</strong></p>
                            <p class="service-text"><strong style="font-weight: 700; color: #fff">All Silver Membership offers plus:</strong></p>
                            <p class="service-text">* Free access to airport exclusive lounge</p>
                            <p class="service-text" style="margin-top: -10px;">* Access to 24/7 customer service</p>
                        </div>
                        <div class="service-actions">
                            <a href="{{ route('auth.register.show') }}" class="icon-btn"><i class="ti-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-30">
                <div class="services4">
                    <div class="service-img"><img src="{{ asset("../frontend/img/news/5.jpg") }}" alt="" class="w-100"></div>
                    <div class="service-header">
                        <h3 class="service-label">Millennium Society</h3>
                    </div>
                    <div class="service-wrap">
                        <div class="service-cont">
                            <h4 class="service-title"><a href="#" style="background-image: linear-gradient(to right, #DFBF81, #BF9A53);
                                -webkit-background-clip: text;
                                -webkit-text-fill-color: transparent;
                                background-clip: text;
                                -text-fill-color: transparent;
                            ">Millennium Society</a></h4>
                            <p class="service-text"><strong style="font-weight: 700;">This membership offers:</strong></p>
                            <p class="service-text"><strong style="font-weight: 700; color: #fff">All Gold & Silver Membership offers plus:</strong></p>
                            <p class="service-text" style="margin-top: -10px;">* Access to Private Jet Charter at no extra charge</p>
                            <p class="service-text">* E introduction to all Platinum Members</p>
                            <p class="service-text" style="margin-top: -10px;">* B 2 B meeting set up</p>
                            <p class="service-text" style="margin-top: -10px;">* International Speaking opportunity</p>
                            <p class="service-text" style="margin-top: -10px;">* International award nomination</p>
                            <p class="service-text" style="margin-top: -10px;">* Access to Exclusive High Value Domestic and International Events</p>
                        </div>
                        <div class="service-actions">
                            <a href="{{ route('contact') }}" class="icon-btn"><i class="ti-angle-right"></i></a>
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
