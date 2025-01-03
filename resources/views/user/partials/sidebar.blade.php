<!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
    <div class="navbar-wrapper">
      <div class="m-header">
        <a href="{{ route('user.dashboard') }}" class="b-brand text-primary">
          <!-- ========   Change your logo from here   ============ -->
          <img src="{{ asset("../frontend/img/logo-dark.png") }}" alt="logo image" width="150px" />
          <span class="badge bg-brand-color-2 rounded-pill ms-2 theme-version" style="color: black !important;">v1.0.0</span>
        </a>
      </div>
      <div class="navbar-content">
        <ul class="pc-navbar">
          <li class="pc-item pc-caption">
            <label>Navigation</label>
            <i class="ph-duotone ph-gauge"></i>
          </li>
          @php
              $user = auth()->guard('web')->user();
          @endphp
          @if ($user->getMembershipType() != "Non Member")
          <li class="pc-item pc-hasmenu  @if (Request::is('user.dashboard')) pc-trigger active @endif">
            <a href="{{ route('user.dashboard') }}" class="pc-link @if (Request::is('user.dashboard')) active @endif">
              <span class="pc-micon">
                <i class="ph-duotone ph-circles-four"></i>
              </span>
              <span class="pc-mtext">Dashboard</span>
            </a>
          </li>
          @endif
          <li class="pc-item pc-hasmenu  @if (Request::is('membership') || Request::is('membership/*')) pc-trigger active @endif">
            <a href="javascript:void(0);" class="pc-link">
              <span class="pc-micon">
                <i class="ph-duotone ph-identification-badge"></i>
              </span>
              <span class="pc-mtext">Membership</span>
              <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
            </a>
            <ul class="pc-submenu">
              <li class="pc-item @if(Route::is('membership.plans.view')) active @endif"><a class="pc-link" href="{{ route('membership.plans.view') }}">Plans</a></li>
              <li class="pc-item @if(Route::is('membership.setting.view')) active @endif"><a class="pc-link" href="{{ route('membership.setting.view') }}">Overview</a></li>
            </ul>
          </li>
          @if ($user->getMembershipType() != "Non Member")
          <li class="pc-item pc-hasmenu  @if (Request::is('user.trips') || Request::is('user/trips/*')) pc-trigger active @endif">
            <a href="javascript:void(0);" class="pc-link">
              <span class="pc-micon">
                <i class="ph-duotone ph-airplane-tilt"></i>
              </span>
              <span class="pc-mtext">Trips</span>
              <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
            </a>
            <ul class="pc-submenu">
              <li class="pc-item @if(Route::is('user.trips.all.view')) active @endif"><a class="pc-link" href="{{ route('user.trips.all.view') }}">Overview</a></li>
              <li class="pc-item @if(Route::is('user.trips.completed.view')) active @endif"><a class="pc-link" href="{{ route('user.trips.completed.view') }}">Completed</a></li>
              <li class="pc-item @if(Route::is('user.trips.pending.view')) active @endif"><a class="pc-link" href="{{ route('user.trips.pending.view') }}">Pending</a></li>
            </ul>
          </li>
          <li class="pc-item pc-hasmenu  @if (Request::is('user.bookings') || Request::is('user/bookings/*')) pc-trigger active @endif">
            <a href="javascript:void(0);" class="pc-link">
              <span class="pc-micon">
                <i class="ph-duotone ph-backpack"></i>
              </span>
              <span class="pc-mtext">Bookings</span>
              <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
            </a>
            <ul class="pc-submenu">
              <li class="pc-item @if(Route::is('user.bookings.all.view')) active @endif"><a class="pc-link" href="{{ route('user.bookings.all.view') }}">Overview</a></li>
              <li class="pc-item @if(Route::is('user.bookings.completed.view')) active @endif"><a class="pc-link" href="{{ route('user.bookings.completed.view') }}">Completed</a></li>
              <li class="pc-item @if(Route::is('user.bookings.pending.view')) active @endif"><a class="pc-link" href="{{ route('user.bookings.pending.view') }}">Pending</a></li>
            </ul>
          </li>
          <li class="pc-item pc-hasmenu  @if (Request::is('user.account') || Request::is('user/account/*')) pc-trigger active @endif">
            <a href="javascript:void(0);" class="pc-link">
              <span class="pc-micon">
                <i class="ph-duotone ph-user-circle"></i>
              </span>
              <span class="pc-mtext">My Account</span>
              <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
            </a>
            <ul class="pc-submenu">
              <li class="pc-item @if(Route::is('user.account.profile.view')) active @endif"><a class="pc-link" href="{{ route('user.account.profile.view') }}">Profile</a></li>
            </ul>
          </li>
          @endif
        </ul>
        <div class="card nav-action-card bg-brand-color-4">
          <div class="card-body" style="background-image: linear-gradient(to right, #DFBF81, #BF9A53) !important; border-radius: 12px; border: 0px;">
            <h5 class="text-dark" style="color: black !important;">Help Center</h5>
            <p class="text-dark text-opacity-75" style="color: black !important;">Please contact us for more questions.</p>
            <a href="mailto:help@millenniumconcierge.com" style="color: white" class="btn btn-dark" target="_blank">Reach Out</a>
          </div>
        </div>
      </div>
      <div class="card pc-user-card">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="flex-grow-1 ms-3">
              <div class="dropdown">
                <a href="javascript:void(0);" class="arrow-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="0,20">
                  <div class="d-flex align-items-center">
                    <div class="flex-grow-1 me-2">
                      @php
                            $user  = auth()->guard('web')->user();

                            $name  = $user->first_name." ".$user->last_name;
                            $email = $user->email;

                      @endphp
                      <h6 class="mb-0">{{ $name }}</h6>
                      <small>{{ $user->getMembershipType() }}</small>
                    </div>
                    <div class="flex-shrink-0">
                      <div class="btn btn-icon btn-link-secondary avtar">
                        <i class="ph-duotone ph-windows-logo"></i>
                      </div>
                    </div>
                  </div>
                </a>
                <div class="dropdown-menu">
                  <ul>
                    <li>
                      <a href="{{ route('user.account.profile.view') }}" class="pc-user-links">
                        <i class="ph-duotone ph-user"></i>
                        <span>My Account</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{ route('user.account.profile.view') }}" class="pc-user-links">
                        <i class="ph-duotone ph-gear"></i>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{ route('membership.setting.view') }}" class="pc-user-links">
                        <i class="ph-duotone ph-lock-key"></i>
                        <span>Membership</span>
                      </a>
                    </li>
                    <li>
                      <a class="pc-user-links" href="{{ route('logout') }}">
                        <i class="ph-duotone ph-power"></i>
                        <span>Logout</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</nav>
