@include('frontend.partials.head')

@include('frontend.partials.navbar')

<!-- Header Banner -->
<div class="banner-header section-padding valign bg-img bg-fixed bg-position-bottom" data-overlay-dark="5" data-background="{{ asset("../frontend/img/slider/5.jpg") }}">
    <div class="container">
        <div class="row">
            <div class="col-md-12 caption text-center">
                <h4>Get in touch</h4>
                <h1>Contact Us</h1>
            </div>
        </div>
    </div>
    <!-- button scroll -->
    <a href="#" data-scroll-nav="1" class="mouse smoothscroll"> <span class="mouse-icon">
            <span class="mouse-wheel"></span> </span>
    </a>
</div>
<!-- Contact -->
<section class="contact section-padding" data-scroll-index="1">
    <div class="container">
        <div class="row mb-30">
            <div class="col-md-3">
                <div class="sub-title border-bot-light">Location</div>
            </div>
            <div class="col-md-9">
                <div class="section-title">Contact Us</div>
                <p class="mb-30">Have a question or ready to embark on your personalized luxury journey with Millennium Concierge? We're here to assist you every step of the way. Whether you're seeking information about our exclusive services or ready to tailor your bespoke experience, our dedicated team is at your service. Contact us today to begin crafting unforgettable moments and experiencing the pinnacle of luxury living.</p>
                <div class="row mb-30">
                            <div class="col-lg-6 col-md-12">
                                <div class="reservations mb-15">
                                    <div class="icon"><span class="flaticon-envelope"></span></div>
                                    <div class="text">
                                        <p>Email Info</p> <a href="mailto:info@millenniumconcierge.com">info@millenniumconcierge.com</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="reservations mb-15">
                                    <div class="icon"><span class="flaticon-location-pin"></span></div>
                                    <div class="text">
                                        <p>Address</p> Plot 9, Coal City Garden Estate, Okpara Avenue,
                                        Enugu State, Nigeria
                                    </div>
                                </div>
                            </div>
                        </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Get in touch</h3>
                                <form method="post" class="contact__form" action="" autocomplete="off">
                                    @csrf
                                    <!-- form message -->
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="alert alert-success contact__msg" style="display: none" role="alert"> Your message was sent successfully. </div>
                                        </div>
                                    </div>
                                    <!-- form elements -->
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <input name="name" type="text" placeholder="Your Name *" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input name="email" type="email" placeholder="Your Email *" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input name="phone" type="text" placeholder="Your Number *" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input name="subject" type="text" placeholder="Subject *" required>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <textarea name="message" id="message" cols="30" rows="4" placeholder="Message *" required></textarea>
                                        </div>
                                        <div class="col-md-12 mt-10">
                                            <button type="submit" class="butn-dark2" style="font-weight: 700;"><span>Send Message</span></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('frontend.partials.footer')
