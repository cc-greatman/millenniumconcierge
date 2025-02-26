@include('frontend.partials.head')

@include('frontend.partials.navbar')

<!-- Header Banner -->
<div class="banner-header section-padding valign bg-img bg-fixed bg-position-bottom" data-overlay-dark="4" data-background="{{ asset("../frontend/img/gallery-bg.jpg") }}">
    <div class="container">
        <div class="row">
            <div class="col-md-12 caption text-center">
                <h1>Our Events Calendar</h1>
            </div>
        </div>
    </div>
    <!-- button scroll -->
    <a href="#" data-scroll-nav="1" class="mouse smoothscroll"> <span class="mouse-icon">
            <span class="mouse-wheel"></span> </span>
    </a>
</div>

<!-- News  -->
<section class="news section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-30">
                <div class="item">
                        <div class="position-re o-hidden"> <img src="{{ asset("../frontend/img/news/3.jpg") }}" alt="">
                            <div class="date">
                                <a href="javascript:void(0);"> <span>Aug</span> <i>2025</i> </a>
                            </div>
                        </div>
                        <div class="con"> <span class="category">
                                <a href="javascript:void(0);">Dubai, UAE</a>
                            </span>
                            <h5><a href="javascript:void(0);">Dubai Business Retreat</a></h5>
                        </div>
                    </div>
            </div>
            <div class="col-md-4 mb-30">
                <div class="item">
                        <div class="position-re o-hidden"> <img src="{{ asset("../frontend/img/news/2.jpg") }}" alt="">
                            <div class="date">
                                <a href="javascript:void(0);"> <span>Nov</span> <i>2025</i> </a>
                            </div>
                        </div>
                        <div class="con"> <span class="category">
                                <a href="javascript:void(0);">Thailand</a>
                            </span>
                            <h5><a href="javascript:void(0);">Asian Pacific Business Roundtable</a></h5>
                        </div>
                    </div>
            </div>
            <div class="col-md-4 mb-30">
                <div class="item">
                        <div class="position-re o-hidden"> <img src="{{ asset("../frontend/img/news/1.jpg") }}" alt="">
                            <div class="date">
                                <a href="javascript:void(0);"> <span>Dec</span> <i>2025</i> </a>
                            </div>
                        </div>
                        <div class="con"> <span class="category">
                                <a href="javascript:void(0);">Capetown, South Africa</a>
                            </span>
                            <h5><a href="javascript:void(0);">High Networth Convergence</a></h5>
                        </div>
                    </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <!-- Pagination -->
                <ul class="news-pagination-wrap align-center mb-30 mt-30">
                    <li><a href="javascript:void(0);"><i class="ti-angle-left"></i></a></li>
                    <li><a href="javascript:void(0);" class="active">1</a></li>
                    <li><a href="javascript:void(0);"><i class="ti-angle-right"></i></a></li>
                </ul>
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
