
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Logo -->
            <div class="logo-wrapper">
                <a class="logo" href="{{ route('home') }}"> <img src="{{ asset("../frontend/img/logo-light.png") }}" class="logo-img" alt=""> </a>
            </div>
            <!-- Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"><i class="ti-menu"></i></span> </button>
            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link @if(Route::is('home')) active @endif" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link @if(Route::is('about')) active @endif" href="{{ route('about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link @if(Route::is('services')) active @endif" href="{{ route('services') }}">Services</a></li>
                    <li class="nav-item dropdown"> <a class="nav-link @if(Route::is('membership')) active @endif dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">Membership <i class="ti-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('membership') }}" class="dropdown-item @if(Route::is('membership')) active @endif"><span>Silver</span></a></li>
                            <li><a href="{{ route('membership') }}" class="dropdown-item @if(Route::is('membership')) active @endif"><span>Gold</span></a></li>
                            <li><a href="{{ route('society') }}" class="dropdown-item @if(Route::is('society')) active @endif"><span>Millennium Society</span></a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link @if(Route::is('calendar')) active @endif" href="{{ route('calendar') }}">Calendar</a></li>
                    <li class="nav-item"><a class="nav-link @if(Route::is('contact')) active @endif" href="{{ route('contact') }}">Enquiry</a></li>
                </ul>
                <div class="butn-dark mt-20 mb-20"> <a href="{{ route('auth.login.show') }}"><span>Secure Access</span></a> </div>
            </div>
        </div>
    </nav>
