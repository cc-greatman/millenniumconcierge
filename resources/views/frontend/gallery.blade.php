@include('frontend.partials.head')

@include('frontend.partials.navbar')

<!-- Header Banner -->
<div class="banner-header section-padding valign bg-img bg-fixed bg-position-bottom" data-overlay-dark="4" data-background="{{ asset("../frontend/img/gallery-bg.jpg") }}">
    <div class="container">
        <div class="row">
            <div class="col-md-12 caption text-center">
                <h1>Our Gallery</h1>
            </div>
        </div>
    </div>
    <!-- button scroll -->
    <a href="#" data-scroll-nav="1" class="mouse smoothscroll"> <span class="mouse-icon">
            <span class="mouse-wheel"></span> </span>
    </a>
</div>

<!-- Image Gallery -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-subtitle">Pictures</div>
                <div class="section-title">Picture Story</div>
            </div>
            <!-- 3 columns -->
            <div class="col-md-4 gallery-item">
                <a href="{{ asset("../frontend/img/slider/7.jpg") }}" title="" class="img-zoom">
                    <div class="gallery-box">
                        <div class="gallery-img"> <img src="{{ asset("../frontend/img/slider/7.jpg") }}" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 gallery-item">
                <a href="{{ asset("../frontend/img/slider/5.jpg") }}" title="" class="img-zoom">
                    <div class="gallery-box">
                        <div class="gallery-img"> <img src="{{ asset("../frontend/img/slider/5.jpg") }}" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 gallery-item">
                <a href="{{ asset("../frontend/img/slider/4.jpg") }}" title="" class="img-zoom">
                    <div class="gallery-box">
                        <div class="gallery-img"> <img src="{{ asset("../frontend/img/slider/4.jpg") }}" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                    </div>
                </a>
            </div>
            <!-- 2 columns -->
            <div class="col-md-6 gallery-item">
                <a href="{{ asset("../frontend/img/slider/2.jpg") }}" title="" class="img-zoom">
                    <div class="gallery-box">
                        <div class="gallery-img"> <img src="{{ asset("../frontend/img/slider/2.jpg") }}" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 gallery-item">
                <a href="{{ asset("../frontend/img/slider/1.jpg") }}" title="" class="img-zoom">
                    <div class="gallery-box">
                        <div class="gallery-img"> <img src="{{ asset("../frontend/img/slider/1.jpg") }}" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                    </div>
                </a>
            </div>
            <!-- 3 columns -->
            <div class="col-md-4 gallery-item">
                <a href="{{ asset("../frontend/img/slider/4.jpg") }}" title="" class="img-zoom">
                    <div class="gallery-box">
                        <div class="gallery-img"> <img src="{{ asset("../frontend/img/slider/4.jpg") }}" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 gallery-item">
                <a href="{{ asset("../frontend/img/slider/5.jpg") }}" title="" class="img-zoom">
                    <div class="gallery-box">
                        <div class="gallery-img"> <img src="{{ asset("../frontend/img/slider/5.jpg") }}" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 gallery-item">
                <a href="{{ asset("../frontend/img/slider/2.jpg") }}" title="" class="img-zoom">
                    <div class="gallery-box">
                        <div class="gallery-img"> <img src="{{ asset("../frontend/img/slider/2.jpg") }}" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                    </div>
                </a>
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
