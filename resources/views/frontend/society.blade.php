@include('frontend.partials.head')

@include('frontend.partials.navbar')

<!-- Header Video -->
<header class="header">
    <div class="video-fullscreen-wrap">
        <!-- The opacity on the image is made with "data-overlay-dark="number". You can change it using the numbers 0-9. -->
        <div class="video-fullscreen-video" data-overlay-dark="6">
            <video playsinline="" autoplay="" loop="" muted="">
                <source src="{{ asset("../frontend/videos/video.mp4") }}" type="video/mp4" autoplay loop muted>
                <source src="{{ asset("../frontend/videos/video.webm") }}" type="video/webm" autoplay loop muted>
            </video>
        </div>
        <div class="v-middle caption overlay">
                <div class="container" style="margin-top: 50px; margin-bottom: 50px !important;">
                    <div class="row">
                        <div class="col-md-10 offset-md-1" style="padding-top: 40px !important;">
                            <h1 class="society">A sanctuary of privilege crafted for those who redefine success</h1>
                            <div class="butn-light"> <a href="#" data-scroll-nav="1"><span>Apply for Membership</span></a> </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- slider reservation -->
    <div class="reservation">
        <a href="javascript:void(0);">
            <div class="icon d-flex justify-content-center align-items-center">
                <i class="flaticon-call"></i>
            </div>
            <div class="call"><span>855 100 4444</span> <br>Reservation</div>
        </a>
    </div>
</header>
<!-- About -->
<section class="about section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-30 animate-box" data-animate-effect="fadeInUp">
                <div class="section-subtitle">Millennium Society - <em style="text-transform: lowercase !important;">for the one percent of the one percent</em></div>
                <div class="section-title">A Portal to the Extraordinary </div>
                <p><em style="font-weight: 700 !important;">The Millennium Society</em> stands as the epitome of prestige, brought to life by Millennium Concierge Limited, a brand celebrated for its impeccable global standards. Reserved for the elite, our society grants its members access to a lifestyle where every detail is meticulously curated to reflect refinement, convenience, comfort and grandeur. </p>
                <p>From bespoke travel arrangements to private aviation and from world-class event execution to personal lifestyle management, every service within <em style="font-weight: 700 !important;">The Millennium Society</em> reflects our commitment to excellence and meticulous attention to detail. </p>
                <!-- call -->
                <div class="reservations">
                    <div class="text">
                        <p>Where Exclusivity Meets Excellence</p> <a href="javascript:void(0);" style="cursor: none !important;">A curated world of luxury, privilege, and unparalleled access offering a gateway to a life of distinction and global prestige</a>
                    </div>
                </div>
            </div>
            <div class="col col-md-6 animate-box" data-animate-effect="fadeInUp">
                <img src="{{ asset("../frontend/img/about-9.jpg") }}" alt="">
            </div>
        </div>
    </div>
</section>
<!-- Facilties -->
<section class="facilties section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-subtitle">Exclusive Benefits</div>
                <div class="section-title">Experiences That Inspire</div>
                <p>Membership in The Millennium Society offers access to a suite of exceptional privileges:</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="single-facility animate-box" data-animate-effect="fadeInUp">
                    <span class="flaticon-world"></span>
                    <h5>A World-Class Network</h5>
                    <p>Connect with a select circle of like-minded leaders, innovators, and visionaries.</p>
                    <div class="facility-shape"> <span class="flaticon-world"></span> </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-facility animate-box" data-animate-effect="fadeInUp">
                    <span class="flaticon-bed"></span>
                    <h5>Top Luxury Services</h5>
                    <p> From private aviation to lifestyle management, every need is met with care.</p>
                    <div class="facility-shape"> <span class="flaticon-bed"></span> </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-facility animate-box" data-animate-effect="fadeInUp">
                    <span class="flaticon-breakfast"></span>
                    <h5>Elite Experiences</h5>
                    <p>Savor tailored journeys and exclusive events designed to elevate your lifestyle.</p>
                    <div class="facility-shape"> <span class="flaticon-breakfast"></span> </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About -->
<section class="about section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-md-6 animate-box" data-animate-effect="fadeInUp">
                <img src="{{ asset("../frontend/img/about-11.png") }}" alt="">
            </div>
            <div class="col-md-6 mb-30 animate-box" data-animate-effect="fadeInUp">
                <div class="section-subtitle">Our Legacy of Excellence</div>
                <div class="section-title">Perfection, <br> Elevated</div>
                <p><em style="font-weight: 700 !important;">The Millennium Society</em> reflects the values and reputation of Millennium Concierge Limited. With an unwavering pursuit of perfection, we craft experiences that exceed expectations, set new standards, and create lasting impressions.</p>
                <p><em style="font-weight: 700 !important;">The Millennium Society</em> is more than a membership club, a sanctuary of privilege crafted for those who redefine success. This exclusive membership club is the embodiment of sophistication, offering unparalleled access to a world of luxury lifestyle and timeless elegance.</p>
                <!-- call -->
                <div class="reservations">
                    <div class="text">
                        <p>For the One Percent of the One Percent </p> <a href="javascript:void(0);" style="cursor: none !important;">Exceptional Individuals Engaging in Extraordinary Experiences at Exclusive Destinations</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Faqs -->
<section class="section-padding bg-darkblack">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center caption">
                <h1>Frequently Asked Questions</h1>
            </div>
            <div class="col-md-12">
                <ul class="accordion-box clearfix">
                    <li class="accordion block">
                        <div class="acc-btn">Who can apply to become a member of The Millennium Society?</div>
                        <div class="acc-content">
                            <div class="content">
                                <div class="text">We embrace individuals with ambition and passion, regardless of their background. Whether you are a visionary, a creator, or a wanderer, TuxedoSociety is tailored for those in pursuit of unparalleled experiences and genuine connections.</div>
                            </div>
                        </div>
                    </li>
                    <li class="accordion block">
                        <div class="acc-btn">What is the membership application process? </div>
                        <div class="acc-content">
                            <div class="content">
                                <div class="text">The application process begins by completing a form on our website. Our team thoroughly evaluates each submission to ensure alignment with the values and spirit of our community. Those selected may be invited to an exclusive interview.</div>
                            </div>
                        </div>
                    </li>
                    <li class="accordion block">
                        <div class="acc-btn">What are the benefits of becoming a member?</div>
                        <div class="acc-content">
                            <div class="content">
                                <div class="text">Members are granted access to meticulously curated luxury events, bespoke travel arrangements, exclusive networking opportunities, and personalized social concierge services. You will also join a distinguished community of visionary individuals, united by a shared passion for exploration and genuine connection.</div>
                            </div>
                        </div>
                    </li>
                    <li class="accordion block">
                        <div class="acc-btn">What does membership cost?</div>
                        <div class="acc-content">
                            <div class="content">
                                <div class="text">The cost of membership is based on the tier you choose. Specific pricing information will be shared with you during the application process to ensure clarity and openness.</div>
                            </div>
                        </div>
                    </li>
                    <li class="accordion block">
                        <div class="acc-btn">Can attend events without being a member?</div>
                        <div class="acc-content">
                            <div class="content">
                                <div class="text">Our events are reserved exclusively for members, guaranteeing a refined and bespoke experience. Membership is the sole gateway to our exceptional travel opportunities and curated gatherings.</div>
                            </div>
                        </div>
                    </li>
                    <li class="accordion block">
                        <div class="acc-btn">How often are events and trips organized?</div>
                        <div class="acc-content">
                            <div class="content">
                                <div class="text">Throughout the year, we curate a diverse range of events and journeys, blending global adventures with intimate local gatherings. Members have the freedom to select those that align most closely with their interests and availability.</div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Rooms
<section class="rooms1 section-padding bg-darkblack" data-scroll-index="1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-subtitle">The Cappa Luxury Hotel</div>
                <div class="section-title">Rooms & Suites</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="item">
                    <div class="position-re o-hidden"> <img src="img/rooms/1.jpg" alt=""> </div> <span class="category"><a href="rooms2.html">Book</a></span>
                    <div class="con">
                        <h6><a href="room-details.html">150$ / Night</a></h6>
                        <h5><a href="room-details.html">Junior Suite</a> </h5>
                        <div class="line"></div>
                        <div class="row facilities">
                            <div class="col col-md-7">
                                <ul>
                                    <li><i class="flaticon-bed"></i></li>
                                    <li><i class="flaticon-bath"></i></li>
                                    <li><i class="flaticon-breakfast"></i></li>
                                    <li><i class="flaticon-towel"></i></li>
                                </ul>
                            </div>
                            <div class="col col-md-5 text-end">
                                <div class="permalink"><a href="room-details.html">Details <i class="ti-arrow-right"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item">
                    <div class="position-re o-hidden"> <img src="img/rooms/2.jpg" alt=""> </div> <span class="category"><a href="rooms2.html">Book</a></span>
                    <div class="con">
                        <h6><a href="room-details.html">200$ / Night</a></h6>
                        <h5><a href="room-details.html">Family Room</a></h5>
                        <div class="line"></div>
                        <div class="row facilities">
                            <div class="col col-md-7">
                                <ul>
                                    <li><i class="flaticon-bed"></i></li>
                                    <li><i class="flaticon-bath"></i></li>
                                    <li><i class="flaticon-breakfast"></i></li>
                                    <li><i class="flaticon-towel"></i></li>
                                </ul>
                            </div>
                            <div class="col col-md-5 text-end">
                                <div class="permalink"><a href="room-details.html">Details <i class="ti-arrow-right"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item">
                    <div class="position-re o-hidden"> <img src="img/rooms/3.jpg" alt=""> </div> <span class="category"><a href="rooms2.html">Book</a></span>
                    <div class="con">
                        <h6><a href="room-details.html">250$ / Night</a></h6>
                        <h5><a href="room-details.html">Double Room</a></h5>
                        <div class="line"></div>
                        <div class="row facilities">
                            <div class="col col-md-7">
                                <ul>
                                    <li><i class="flaticon-bed"></i></li>
                                    <li><i class="flaticon-bath"></i></li>
                                    <li><i class="flaticon-breakfast"></i></li>
                                    <li><i class="flaticon-towel"></i></li>
                                </ul>
                            </div>
                            <div class="col col-md-5 text-end">
                                <div class="permalink"><a href="room-details.html">Details <i class="ti-arrow-right"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="item">
                    <div class="position-re o-hidden"> <img src="img/rooms/4.jpg" alt=""> </div> <span class="category"><a href="rooms2.html">Book</a></span>
                    <div class="con">
                        <h6><a href="room-details.html">300$ / Night</a></h6>
                        <h5><a href="room-details.html">Deluxe Room</a></h5>
                        <div class="line"></div>
                        <div class="row facilities">
                            <div class="col col-md-7">
                                <ul>
                                    <li><i class="flaticon-bed"></i></li>
                                    <li><i class="flaticon-bath"></i></li>
                                    <li><i class="flaticon-breakfast"></i></li>
                                    <li><i class="flaticon-towel"></i></li>
                                </ul>
                            </div>
                            <div class="col col-md-5 text-end">
                                <div class="permalink"><a href="room-details.html">Details <i class="ti-arrow-right"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="item">
                    <div class="position-re o-hidden"> <img src="img/rooms/7.jpg" alt=""> </div> <span class="category"><a href="rooms2.html">Book</a></span>
                    <div class="con">
                        <h6><a href="room-details.html">150$ / Night</a></h6>
                        <h5><a href="room-details.html">Superior Room</a></h5>
                        <div class="line"></div>
                        <div class="row facilities">
                            <div class="col col-md-7">
                                <ul>
                                    <li><i class="flaticon-bed"></i></li>
                                    <li><i class="flaticon-bath"></i></li>
                                    <li><i class="flaticon-breakfast"></i></li>
                                    <li><i class="flaticon-towel"></i></li>
                                </ul>
                            </div>
                            <div class="col col-md-5 text-end">
                                <div class="permalink"><a href="room-details.html">Details <i class="ti-arrow-right"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
 Pricing
<section class="pricing section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="section-subtitle"><span>Best Prices</span></div>
                <div class="section-title">Extra Services</div>
                <p class="color-2">The best prices for your relaxing vacation. The utanislen quam nestibulum ac quame odion elementum sceisue the aucan.</p>
                <p class="color-2">Orci varius natoque penatibus et magnis disney parturient monte nascete ridiculus mus nellen etesque habitant morbine.</p>
                <div class="reservations mb-30">
                    <div class="icon"><span class="flaticon-call"></span></div>
                    <div class="text">
                        <p class="color-2">For information</p> <a href="tel:855-100-4444">855 100 4444</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="owl-carousel owl-theme">
                    <div class="pricing-card">
                        <img src="img/pricing/1.jpg" alt="">
                        <div class="desc">
                            <div class="name">Room cleaning</div>
                            <div class="amount">$50<span>/ month</span></div>
                            <ul class="list-unstyled list">
                                <li><i class="ti-check"></i> Hotel ut nisan the duru</li>
                                <li><i class="ti-check"></i> Orci miss natoque vasa ince</li>
                                <li><i class="ti-close unavailable"></i>Clean sorem ipsum morbin</li>
                            </ul>
                        </div>
                    </div>
                    <div class="pricing-card">
                        <img src="img/pricing/2.jpg" alt="">
                        <div class="desc">
                            <div class="name">Drinks included</div>
                            <div class="amount">$30<span>/ daily</span></div>
                            <ul class="list-unstyled list">
                                <li><i class="ti-check"></i> Hotel ut nisan the duru</li>
                                <li><i class="ti-check"></i> Orci miss natoque vasa ince</li>
                                <li><i class="ti-close unavailable"></i>Clean sorem ipsum morbin</li>
                            </ul>
                        </div>
                    </div>
                    <div class="pricing-card">
                        <img src="img/pricing/3.jpg" alt="">
                        <div class="desc">
                            <div class="name">Room Breakfast</div>
                            <div class="amount">$30<span>/ daily</span></div>
                            <ul class="list-unstyled list">
                                <li><i class="ti-check"></i> Hotel ut nisan the duru</li>
                                <li><i class="ti-check"></i> Orci miss natoque vasa ince</li>
                                <li><i class="ti-close unavailable"></i>Clean sorem ipsum morbin</li>
                            </ul>
                        </div>
                    </div>
                    <div class="pricing-card">
                        <img src="img/pricing/4.jpg" alt="">
                        <div class="desc">
                            <div class="name">Safe & Secure</div>
                            <div class="amount">$15<span>/ daily</span></div>
                            <ul class="list-unstyled list">
                                <li><i class="ti-check"></i> Hotel ut nisan the duru</li>
                                <li><i class="ti-check"></i> Orci miss natoque vasa ince</li>
                                <li><i class="ti-close unavailable"></i>Clean sorem ipsum morbin</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
 Promo Video
<section class="video-wrapper video section-padding bg-img bg-fixed" data-overlay-dark="3" data-background="img/slider/2.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                   <span><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i></span>
                    <div class="section-subtitle"><span>The Cappa Luxury Hotel</span></div>
                    <div class="section-title"><span>Promotional Video</span></div>
                </div>
            </div>
            <div class="row">
                <div class="text-center col-md-12">
                    <a class="vid" href="https://youtu.be/7BGNAGahig8">
                    <div class="vid-butn">
                        <span class="icon">
                            <i class="ti-control-play"></i>
                        </span>
                    </div>
                </a>
                </div>

            </div>
        </div>
</section>
<!-- Testiominals
<section class="testimonials">
    <div class="background bg-img bg-fixed section-padding pb-0" data-background="img/slider/2.jpg" data-overlay-dark="3">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="testimonials-box">
                        <div class="head-box">
                            <h6>Testimonials</h6>
                            <h4>What Client's Say?</h4>
                            <div class="line"></div>
                        </div>
                        <div class="owl-carousel owl-theme">
                            <div class="item">
                                <span class="quote"><img src="img/quot.png" alt=""></span>
                                <p>Hotel dapibus asue metus the nec feusiate eraten miss hendreri net ve ante the lemon sanleo nectan feugiat erat hendrerit necuis ve ante otel inilla duiman at finibus viverra neca the sene on satien the miss drana inc fermen norttito sit space, mus nellentesque habitan.</p>
                                <div class="info">
                                    <div class="author-img"> <img src="img/team/4.jpg" alt=""> </div>
                                    <div class="cont"> <span><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i></span>
                                        <h6>Emily Brown</h6> <span>Guest review</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <span class="quote"><img src="img/quot.png" alt=""></span>
                                <p>Hotel dapibus asue metus the nec feusiate eraten miss hendreri net ve ante the lemon sanleo nectan feugiat erat hendrerit necuis ve ante otel inilla duiman at finibus viverra neca the sene on satien the miss drana inc fermen norttito sit space, mus nellentesque habitan.</p>
                                <div class="info">
                                    <div class="author-img"> <img src="img/team/1.jpg" alt=""> </div>
                                    <div class="cont"> <span><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i></span>
                                        <h6>Nolan White</h6> <span>Guest review</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <span class="quote"><img src="img/quot.png" alt=""></span>
                                <p>Hotel dapibus asue metus the nec feusiate eraten miss hendreri net ve ante the lemon sanleo nectan feugiat erat hendrerit necuis ve ante otel inilla duiman at finibus viverra neca the sene on satien the miss drana inc fermen norttito sit space, mus nellentesque habitan.</p>
                                <div class="info">
                                    <div class="author-img"> <img src="img/team/5.jpg" alt=""> </div>
                                    <div class="cont"> <span><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i></span>
                                        <h6>Olivia Martin</h6> <span>Guest review</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services
<section class="services section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6 p-0 animate-box" data-animate-effect="fadeInLeft">
                <div class="img left">
                    <a href="restaurant.html"><img src="img/restaurant/1.jpg" alt=""></a>
                </div>
            </div>
            <div class="col-md-6 p-0 bg-darkblack valign animate-box" data-animate-effect="fadeInRight">
                <div class="content">
                    <div class="cont text-left">
                        <div class="info">
                            <h6>Discover</h6>
                        </div>
                        <h4>The Restaurant</h4>
                        <p>Restaurant inilla duiman at elit finibus viverra nec a lacus themo the nesudea seneoice misuscipit non sagie the fermen ziverra tristiue duru the ivite dianne onen nivami acsestion augue artine.</p>
                        <div class="butn-dark"> <a href="restaurant.html"><span>Learn More</span></a> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 bg-darkblack p-0 order2 valign animate-box" data-animate-effect="fadeInLeft">
                <div class="content">
                    <div class="cont text-left">
                        <div class="info">
                            <h6>Experiences</h6>
                        </div>
                        <h4>Spa Center</h4>
                        <p>Spa center inilla duiman at elit finibus viverra nec a lacus themo the nesudea seneoice misuscipit non sagie the fermen ziverra tristiue duru the ivite dianne onen nivami acsestion augue artine.</p>
                        <div class="butn-dark"> <a href="spa-wellness.html"><span>Learn More</span></a> </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 p-0 order1 animate-box" data-animate-effect="fadeInRight">
                <div class="img">
                    <a href="spa-wellness.html"><img src="img/spa/3.jpg" alt=""></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 p-0 animate-box" data-animate-effect="fadeInLeft">
                <div class="img left">
                    <a href="spa-wellness.html"><img src="img/spa/2.jpg" alt=""></a>
                </div>
            </div>
            <div class="col-md-6 p-0 bg-darkblack valign animate-box" data-animate-effect="fadeInRight">
                <div class="content">
                    <div class="cont text-left">
                        <div class="info">
                            <h6>Modern</h6>
                        </div>
                        <h4>Fitness Center</h4>
                        <p>Restaurant inilla duiman at elit finibus viverra nec a lacus themo the nesudea seneoice misuscipit non sagie the fermen ziverra tristiue duru the ivite dianne onen nivami acsestion augue artine.</p>
                        <div class="butn-dark"> <a href="spa-wellness.html"><span>Learn More</span></a> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 bg-darkblack p-0 order2 valign animate-box" data-animate-effect="fadeInLeft">
                <div class="content">
                    <div class="cont text-left">
                        <div class="info">
                            <h6>Experiences</h6>
                        </div>
                        <h4>The Health Club & Pool</h4>
                        <p>The health club & pool at elit finibus viverra nec a lacus themo the nesudea seneoice misuscipit non sagie the fermen ziverra tristiue duru the ivite dianne onen nivami acsestion augue artine.</p>
                        <div class="butn-dark"> <a href="spa-wellness.html"><span>Learn More</span></a> </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 p-0 order1 animate-box" data-animate-effect="fadeInRight">
                <div class="img">
                    <a href="spa-wellness.html"><img src="img/spa/1.jpg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- News
<section class="news section-padding bg-darkblack">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-subtitle"><span>Hotel Blog</span></div>
                <div class="section-title">Our News</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme owl-loaded owl-drag">
                    <div class="item">
                        <div class="position-re o-hidden"> <img src="img/news/1.jpg" alt="">
                            <div class="date">
                                <a href="post.html"> <span>Dec</span> <i>02</i> </a>
                            </div>
                        </div>
                        <div class="con"> <span class="category">
                                <a href="news.html">Restaurant</a>
                            </span>
                            <h5><a href="post.html">Historic restaurant renovated</a></h5>
                        </div>
                    </div>
                    <div class="item">
                        <div class="position-re o-hidden"> <img src="img/news/2.jpg" alt="">
                            <div class="date">
                                <a href="post.html"> <span>Dec</span> <i>04</i> </a>
                            </div>
                        </div>
                        <div class="con"> <span class="category">
                                <a href="news.html">Spa</a>
                            </span>
                            <h5><a href="post.html">Benefits of Spa Treatments</a></h5>
                        </div>
                    </div>
                    <div class="item">
                        <div class="position-re o-hidden"> <img src="img/news/3.jpg" alt="">
                            <div class="date">
                                <a href="post.html"> <span>Dec</span> <i>06</i> </a>
                            </div>
                        </div>
                        <div class="con"> <span class="category">
                                <a href="news.html">Bathrooms</a>
                            </span>
                            <h5><a href="post.html">Hotel Bathroom Collections</a></h5>
                        </div>
                    </div>
                    <div class="item">
                        <div class="position-re o-hidden"> <img src="img/news/4.jpg" alt="">
                            <div class="date">
                                <a href="post.html"> <span>Dec</span> <i>08</i> </a>
                            </div>
                        </div>
                        <div class="con">
                            <span class="category">
                                <a href="news.html">Health</a>
                            </span>
                            <h5><a href="post.html">Weight Loss with Fitness Health Club</a></h5>
                        </div>
                    </div>

                    <div class="item">
                        <div class="position-re o-hidden"> <img src="img/news/6.jpg" alt="">
                            <div class="date">
                                <a href="post.html"> <span>Dec</span> <i>08</i> </a>
                            </div>
                        </div>
                        <div class="con"> <span class="category">
                                <a href="news.html">Design</a>
                            </span>
                            <h5><a href="post.html">Retro Lighting Design in The Hotels</a></h5>
                        </div>
                    </div>
                    <div class="item">
                        <div class="position-re o-hidden"> <img src="img/news/5.jpg" alt="">
                            <div class="date">
                                <a href="post.html"> <span>Dec</span> <i>08</i> </a>
                            </div>
                        </div>
                        <div class="con"> <span class="category">
                                <a href="news.html">Health</a>
                            </span>
                            <h5><a href="post.html">Benefits of Swimming for Your Health</a></h5>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
<!-- Reservation & Booking Form
<section class="testimonials">
    <div class="background bg-img bg-fixed section-padding pb-0" data-background="img/slider/2.jpg" data-overlay-dark="2">
        <div class="container">
            <div class="row">
                <!-- Reservation
                <div class="col-md-5 mb-30 mt-30">
                    <p><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i></p>
                    <h5>Each of our guest rooms feature a private bath, wi-fi, cable television and include full breakfast.</h5>
                    <div class="reservations mb-30">
                        <div class="icon color-1"><span class="flaticon-call"></span></div>
                        <div class="text">
                            <p class="color-1">Reservation</p> <a class="color-1" href="tel:855-100-4444">855 100 4444</a>
                        </div>
                    </div>
                    <p><i class="ti-check"></i><small>Call us, it's toll-free.</small></p>
                </div>
                <!-- Booking From 
                <div class="col-md-5 offset-md-2">
                    <div class="booking-box">
                        <div class="head-box">
                            <h6>Rooms & Suites</h6>
                            <h4>Hotel Booking Form</h4>
                        </div>
                        <div class="booking-inner clearfix">
                            <form action="https://duruthemes.com/demo/html/cappa/demo1-dark/rooms2.html" class="form1 clearfix">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input1_wrapper">
                                            <label>Check in</label>
                                            <div class="input1_inner">
                                                <input type="text" class="form-control input datepicker" placeholder="Check in">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input1_wrapper">
                                            <label>Check out</label>
                                            <div class="input1_inner">
                                                <input type="text" class="form-control input datepicker" placeholder="Check out">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="select1_wrapper">
                                            <label>Adults</label>
                                            <div class="select1_inner">
                                                <select class="select2 select" style="width: 100%">
                                                    <option value="0">Adults</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="select1_wrapper">
                                            <label>Children</label>
                                            <div class="select1_inner">
                                                <select class="select2 select" style="width: 100%">
                                                    <option value="0">Children</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn-form1-submit mt-15">Check Availability</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Clients
<section class="clients">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
            <div class="owl-carousel owl-theme">
                <div class="clients-logo">
                    <a href="#0"><img src="img/clients/1.png" alt=""></a>
                </div>
                <div class="clients-logo">
                    <a href="#0"><img src="img/clients/2.png" alt=""></a>
                </div>
                <div class="clients-logo">
                    <a href="#0"><img src="img/clients/3.png" alt=""></a>
                </div>
                <div class="clients-logo">
                    <a href="#0"><img src="img/clients/4.png" alt=""></a>
                </div>
                <div class="clients-logo">
                    <a href="#0"><img src="img/clients/5.png" alt=""></a>
                </div>
                <div class="clients-logo">
                    <a href="#0"><img src="img/clients/6.png" alt=""></a>
                </div>
            </div>
            </div>
        </div>
    </div>
</section> -->

@include('frontend.partials.footer')
