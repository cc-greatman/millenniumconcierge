@include('frontend.partials.head')

@include('frontend.partials.navbar')

<!-- Header Banner -->
<div class="banner-header section-padding valign bg-img bg-fixed bg-position-bottom" data-overlay-dark="4" data-background="{{ asset("../frontend/img/gallery-bg.jpg") }}">
    <div class="container">
        <div class="row">
            <div class="col-md-12 caption text-center">
                <h1>Our Events</h1>
            </div>
        </div>
    </div>
    <!-- button scroll -->
    <a href="#" data-scroll-nav="1" class="mouse smoothscroll"> <span class="mouse-icon">
            <span class="mouse-wheel"></span> </span>
    </a>
</div>

<!-- Image Gallery -->
<section class="news section-padding bg-darkblack">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-subtitle">Calendar</div>
                <div class="section-title">Events Calendar</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme">
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
<!-- Video Gallery -->
<section class="section-padding bg-darkblack">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-subtitle">Videos</div>
                <div class="section-title">Video Story</div>
            </div>
            <!-- 2 columns -->
            <div class="col-md-6">
                <div class="vid-area mb-30">
                    <div class="vid-icon"> <img src="{{ asset("../frontend/img/slider/2.jpg") }}" alt="YouTube">
                        <a class="video-gallery-button vid" href="https://youtu.be/xh4GnTKFQso"> <span class="video-gallery-polygon">
                                <i class="ti-control-play"></i>
                            </span> </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="vid-area mb-30">
                    <div class="vid-icon"> <img src="{{ asset("../frontend/img/slider/3.jpg") }}" alt="Vimeo">
                        <a class="video-gallery-button vid" href="https://youtu.be/xh4GnTKFQso"> <span class="video-gallery-polygon">
                                <i class="ti-control-play"></i>
                            </span> </a>
                    </div>
                </div>
            </div>
            <!-- 3 columns -->
            <div class="col-md-4">
                <div class="vid-area mb-30">
                    <div class="vid-icon"> <img src="{{ asset("../frontend/img/slider/4.jpg") }}" alt="YouTube">
                        <a class="video-gallery-button vid" href="https://youtu.be/xh4GnTKFQso"> <span class="video-gallery-polygon">
                                <i class="ti-control-play"></i>
                            </span> </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="vid-area mb-30">
                    <div class="vid-icon"> <img src="{{ asset("../frontend/img/slider/7.jpg") }}" alt="YouTube">
                        <a class="video-gallery-button vid" href="https://youtu.be/xh4GnTKFQso"> <span class="video-gallery-polygon">
                                <i class="ti-control-play"></i>
                            </span> </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="vid-area mb-30">
                    <div class="vid-icon"> <img src="{{ asset("../frontend/img/slider/1.jpg") }}" alt="YouTube">
                        <a class="video-gallery-button vid" href="https://youtu.be/xh4GnTKFQso"> <span class="video-gallery-polygon">
                                <i class="ti-control-play"></i>
                            </span> </a>
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
