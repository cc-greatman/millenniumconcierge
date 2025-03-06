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
                            <div class="butn-light"> <a href="{{ route('application.form') }}" ><span>Apply for Membership</span></a> </div>
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
                        <p>For the One Percent of the One Percent </p> <a href="javascript:void(0);" style="cursor: none !important;">Our society grants its members access to a lifestyle where every detail is meticulously curated to reflect refinement, convenience, comfort and grandeur.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact CTA -->
<section class="video-wrapper video section-padding bg-img bg-fixed" data-overlay-dark="3">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <div class="section-title"><span>Exceptional Individuals Engaging in Extraordinary Experiences at Exclusive Destinations</span></div>
            </div>
        </div>
    </div>
</section>
<!-- Faqs -->
<section class="section-padding bg-darkblack">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center caption" style="margin-bottom: 20px;">
                <h1>Frequently Asked Questions</h1>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col col-md-6 animate-box" data-animate-effect="fadeInUp">
                        <img src="{{ asset("../frontend/img/about-12.jpg") }}" alt="">
                    </div>
                    <div class="col-md-6">
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
        </div>
    </div>
</section>
<!-- Contact CTA -->
<section class="video-wrapper video section-padding bg-img bg-fixed" data-overlay-dark="3" data-background="{{ asset("../frontend/img/slider/7.jpg") }}">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <div class="section-subtitle"><span style="color: #fff; font-weight: 700; font-family: 'Raleway', sans-serif">Let’s Begin Your Journey to Excellence </span></div>
                    <div class="section-title"><span>Contact Us</span></div>
                    <p style="font-size: 24px; font-weight: 400;">We know you are willing and ready to explore a life of privilege and sophistication, so connect with us today to <strong>Discover The Millennium Society's Trails of Magic.</strong></p>
                </div>
            </div>
            <div class="row">
                <div class="text-center col-md-12">
                    <a class="" href="{{ route('contact') }}">
                    <div class="vid-butn">
                        <span class="icon">
                            <i class="ti-headphone-alt"></i>
                        </span>
                    </div>
                </a>
                </div>

            </div>
        </div>
</section>

@include('frontend.partials.footer')
