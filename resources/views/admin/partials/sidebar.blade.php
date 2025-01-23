<!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
    <div class="navbar-wrapper">
      <div class="m-header">
        <a href="{{ route('admin.dashboard.show') }}" class="b-brand text-primary">
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
              $user = auth()->guard('admin')->user();
          @endphp
          <li class="pc-item pc-hasmenu  @if (Request::is('admin.dashboard.show')) pc-trigger active @endif">
            <a href="{{ route('admin.dashboard.show') }}" class="pc-link @if (Request::is('admin.dashboard.show')) active @endif">
              <span class="pc-micon">
                <i class="ph-duotone ph-circles-four"></i>
              </span>
              <span class="pc-mtext">Dashboard</span>
            </a>
          </li>
          <li class="pc-item pc-hasmenu  @if (Request::is('admin.manage') || Request::is('admin/manage/*')) pc-trigger active @endif">
            <a href="javascript:void(0);" class="pc-link">
              <span class="pc-micon">
                <i class="ph-duotone ph-identification-badge"></i>
              </span>
              <span class="pc-mtext">Users</span>
              <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
            </a>
            <ul class="pc-submenu">
              <li class="pc-item @if(Route::is('admin.manage.users.create')) active @endif"><a class="pc-link" href="{{ route('admin.manage.users.create') }}">Create</a></li>
              <li class="pc-item @if(Route::is('admin.manage.users.view')) active @endif"><a class="pc-link" href="{{ route('admin.manage.users.view') }}">Manage</a></li>
            </ul>
          </li>
          <li class="pc-item pc-hasmenu  @if (Request::is('admin.trips') || Request::is('admin/trips/*')) pc-trigger active @endif">
            <a href="javascript:void(0);" class="pc-link">
              <span class="pc-micon">
                <i class="ph-duotone ph-airplane-tilt"></i>
              </span>
              <span class="pc-mtext">Trips</span>
              <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
            </a>
            <ul class="pc-submenu">
              <li class="pc-item @if(Route::is('admin.trips.all.view')) active @endif"><a class="pc-link" href="{{ route('admin.trips.all.view') }}">Overview</a></li>
              <li class="pc-item pc-hasmenu @if (Request::is('admin.trips.hotels') || Request::is('admin/trips/hotels/*')) pc-trigger active @endif">
                <a class="pc-link" href="javascript:void(0);"
                  >Hotels<span class="pc-arrow"><i data-feather="chevron-right"></i></span
                ></a>
                <ul class="pc-submenu">
                    <li class="pc-item @if(Route::is('admin.trips.create.hotel.view')) active @endif"><a class="pc-link" href="{{ route('admin.trips.create.hotel.view') }}">Create</a></li>
                    <li class="pc-item @if(Route::is('admin.trips.hotels.completed.view')) active @endif"><a class="pc-link" href="{{ route('admin.trips.hotels.completed.view') }}">Completed</a></li>
                    <li class="pc-item @if(Route::is('admin.trips.hotels.pending.view')) active @endif"><a class="pc-link" href="{{ route('admin.trips.hotels.pending.view') }}">Pending</a></li>
                </ul>
            </li>
            <li class="pc-item pc-hasmenu @if (Request::is('admin.trips.flights') || Request::is('admin/trips/flights/*')) pc-trigger active @endif">
                <a class="pc-link" href="javascript:void(0);"
                  >Flights<span class="pc-arrow"><i data-feather="chevron-right"></i></span
                ></a>
                <ul class="pc-submenu">
                    <li class="pc-item @if(Route::is('admin.trips.create.index')) active @endif"><a class="pc-link" href="{{ route('admin.trips.create.index') }}">Create</a></li>
                    <li class="pc-item @if(Route::is('admin.trips.flights.completed.view')) active @endif"><a class="pc-link" href="{{ route('admin.trips.flights.completed.view') }}">Completed</a></li>
                    <li class="pc-item @if(Route::is('admin.trips.flights.pending.view')) active @endif"><a class="pc-link" href="{{ route('admin.trips.flights.pending.view') }}">Pending</a></li>
                </ul>
            </li>
            <li class="pc-item pc-hasmenu @if (Request::is('admin.trips.yachts') || Request::is('admin/trips/yachts/*')) pc-trigger active @endif">
                <a class="pc-link" href="javascript:void(0);"
                  >Yachts<span class="pc-arrow"><i data-feather="chevron-right"></i></span
                ></a>
                <ul class="pc-submenu">
                    <li class="pc-item @if(Route::is('admin.trips.create.index')) active @endif"><a class="pc-link" href="{{ route('admin.trips.create.index') }}">Create</a></li>
                    <li class="pc-item @if(Route::is('admin.trips.yachts.completed.view')) active @endif"><a class="pc-link" href="{{ route('admin.trips.yachts.completed.view') }}">Completed</a></li>
                    <li class="pc-item @if(Route::is('admin.trips.yachts.pending.view')) active @endif"><a class="pc-link" href="{{ route('admin.trips.yachts.pending.view') }}">Pending</a></li>
                </ul>
            </li>
            <li class="pc-item pc-hasmenu @if (Request::is('admin.trips.helicopters') || Request::is('admin/trips/helicopters/*')) pc-trigger active @endif">
                <a class="pc-link" href="javascript:void(0);"
                  >Helicopters<span class="pc-arrow"><i data-feather="chevron-right"></i></span
                ></a>
                <ul class="pc-submenu">
                    <li class="pc-item @if(Route::is('admin.trips.create.index')) active @endif"><a class="pc-link" href="{{ route('admin.trips.create.index') }}">Create</a></li>
                    <li class="pc-item @if(Route::is('admin.trips.helicopters.completed.view')) active @endif"><a class="pc-link" href="{{ route('admin.trips.helicopters.completed.view') }}">Completed</a></li>
                    <li class="pc-item @if(Route::is('admin.trips.helicopters.pending.view')) active @endif"><a class="pc-link" href="{{ route('admin.trips.helicopters.pending.view') }}">Pending</a></li>
                </ul>
            </li>
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
        </ul>
        <div class="card nav-action-card bg-brand-color-4">
          <div class="card-body" style="background-image: linear-gradient(to right, #DFBF81, #BF9A53) !important; border-radius: 12px; border: 0px;">
            <h5 class="text-dark" style="color: black !important;">Help Center</h5>
            <p class="text-dark text-opacity-75" style="color: black !important;">Please contact IT for support.</p>
            <a href="mailto:tech.help@millenniumconcierge.com" style="color: white" class="btn btn-dark" target="_blank">Reach Out</a>
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
                            $user  = auth()->guard('admin')->user();

                            $name  = $user->name;
                            $email = $user->email;

                      @endphp
                      <h6 class="mb-0">{{ $name }}</h6>
                      <small>Itinerary Staff</small>
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
                        <i class="ph-duotone ph-gear"></i>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li>
                      <a class="pc-user-links" href="{{ route('admin.logout') }}">
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
