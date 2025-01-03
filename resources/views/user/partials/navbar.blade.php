<!-- [ Header Topbar ] start -->
<header class="pc-header">
    <div class="header-wrapper"> <!-- [Mobile Media Block] start -->
      <div class="me-auto pc-mob-drp">
        <ul class="list-unstyled">
          <!-- ======= Menu collapse Icon ===== -->
          <li class="pc-h-item pc-sidebar-collapse">
            <a href="javascript:void(0);" class="pc-head-link ms-0" id="sidebar-hide">
              <i class="ti ti-menu-2"></i>
            </a>
          </li>
          <li class="pc-h-item pc-sidebar-popup">
            <a href="javascript:void(0);" class="pc-head-link ms-0" id="mobile-collapse">
              <i class="ti ti-menu-2"></i>
            </a>
          </li>
          <li class="dropdown pc-h-item d-inline-flex d-md-none">
            <a
              class="pc-head-link dropdown-toggle arrow-none m-0"
              data-bs-toggle="dropdown"
              href="#"
              role="button"
              aria-haspopup="false"
              aria-expanded="false"
            >
              <i class="ph-duotone ph-magnifying-glass"></i>
            </a>
            <div class="dropdown-menu pc-h-dropdown drp-search">
              <form class="px-3">
                <div class="mb-0 d-flex align-items-center">
                  <input type="search" class="form-control border-0 shadow-none" placeholder="Search..." />
                  <button class="btn btn-light-secondary btn-search">Search</button>
                </div>
              </form>
            </div>
          </li>
          <li class="pc-h-item d-none d-md-inline-flex">
            <form class="form-search">
              <i class="ph-duotone ph-magnifying-glass icon-search"></i>
              <input type="search" class="form-control" placeholder="Search..." />

              <button class="btn btn-search" style="padding: 0"><kbd>ctrl+k</kbd></button>
            </form>
          </li>
        </ul>
      </div>
      <!-- [Mobile Media Block end] -->
      <div class="ms-auto">
        <ul class="list-unstyled">
          <li class="dropdown pc-h-item header-user-profile">
            <a
              class="pc-head-link dropdown-toggle arrow-none me-0"
              data-bs-toggle="dropdown"
              href="#"
              role="button"
              aria-haspopup="false"
              data-bs-auto-close="outside"
              aria-expanded="false"
            >
              <img src="{{ asset("../backend/images/user/user.png") }}" alt="user-image" class="user-avtar" />
            </a>
            <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
              <div class="dropdown-header d-flex align-items-center justify-content-between">
                <h5 class="m-0">Profile</h5>
              </div>
              <div class="dropdown-body">
                <div class="profile-notification-scroll position-relative" style="max-height: calc(100vh - 225px)">
                  <ul class="list-group list-group-flush w-100">
                    <li class="list-group-item">
                      <div class="d-flex align-items-center">
                        <div class="flex-grow-1 mx-3">
                          @php
                              $user  = auth()->user();

                              $name  = $user->first_name." ".$user->last_name;
                              $email = $user->email;
                          @endphp
                          <h5 class="mb-0">{{ $name }}</h5>
                          <a class="link-primary">{{ $user->getMembershipType() }}</a>
                        </div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <a href="{{ route('user.account.profile.view') }}" class="dropdown-item">
                        <span class="d-flex align-items-center">
                          <i class="ph-duotone ph-user-circle"></i>
                          <span>Verify Identity</span>
                        </span>
                      </a>
                      <a href="{{ route('membership.plans.view') }}" class="dropdown-item">
                        <span class="d-flex align-items-center">
                          <i class="ph-duotone ph-star text-warning"></i>
                          <span>Upgrade account</span>
                          <span class="badge bg-brand-color-3 ms-2">NEW</span>
                        </span>
                      </a>
                      <a href="{{ route('user.account.profile.view') }}" class="dropdown-item">
                        <span class="d-flex align-items-center">
                          <i class="ph-duotone ph-gear-six"></i>
                          <span>Settings</span>
                        </span>
                      </a>
                    </li>
                    <li class="list-group-item">
                      <a href="{{ route('logout') }}" class="dropdown-item">
                        <span class="d-flex align-items-center">
                          <i class="ph-duotone ph-power"></i>
                          <span>Logout</span>
                        </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
</header>
<!-- [ Header ] end -->
