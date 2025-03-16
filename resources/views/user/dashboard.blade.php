@include('user.partials.head')

@include('user.partials.sidebar')

@include('user.partials.navbar')

<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
      <!-- [ breadcrumb ] start -->
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <ul class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page">Home</li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Dashboard</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->

      <!-- [ Main Content ] start -->
      <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="mb-0">Subscription Tracker</h5>
                  </div>
                  <div class="row g-3">
                    <div class="col-md-6 col-xxl-3">
                      <div class="card shadow-none border mb-0">
                        <div class="card-body p-3">
                          <div class="d-flex align-items-center justify-content-between mb-3">
                            <img src="{{ asset("../backend/images/widget/img-travel.png") }}" alt="img" class="img-fluid" />
                          </div>
                          @php
                              $user  = auth()->user();

                              $name  = $user->first_name." ".$user->last_name;
                              $email = $user->email;
                          @endphp
                          <h6 class="mb-3">Membership Type: {{ $user->getMembershipType() }}</h6>
                          <div class="bg-dark p-3 pt-4 rounded-4">
                            <div class="progress bg-white bg-opacity-25" style="height: 6px">
                              <div class="progress-bar bg-white" style="width: {{ min($tripsProgress, 100) }}%"></div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-2">
                              <p class="mb-0 text-white text-opacity-75 text-sm">{{ number_format($tripsProgress, 2) }}%</p>
                              <p class="mb-0 text-white text-opacity-75 text-sm">${{ number_format($yearlyTripsExpenses, 2) }}</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="card statistics-card-1 overflow-hidden">
            <div class="card-body">
              <img src="{{ asset("../backend/images/widget/img-status-4.svg") }}" alt="img" class="img-fluid img-bg" />
              <h5 class="mb-4">Weekly Expenses</h5>
              <div class="d-flex align-items-center mt-3">
                <h3 class="f-w-300 d-flex align-items-center m-b-0">${{ number_format($weeklyExpenses,2) }}</h3>
              </div>
              <p class="text-white text-opacity-75 mb-2 text-sm mt-3">You spent ${{ number_format($weeklyExpenses,2) }} this Week</p>
              <div class="progress bg-black" style="height: 7px">
                <div
                  class="progress-bar bg-brand-color-3"
                  role="progressbar"
                  style="width: 75%"
                  aria-valuenow="75"
                  aria-valuemin="0"
                  aria-valuemax="100"
                ></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="card statistics-card-1 overflow-hidden">
            <div class="card-body">
              <img src="{{ asset("../backend/images/widget/img-status-5.svg") }}" alt="img" class="img-fluid img-bg" />
              <h5 class="mb-4">Monthly Expenses</h5>
              <div class="d-flex align-items-center mt-3">
                <h3 class="f-w-300 d-flex align-items-center m-b-0">${{ number_format($monthlyExpenses,2) }}</h3>
              </div>
              <p class="text-white text-opacity-75 mb-2 text-sm mt-3">You spent ${{ number_format($monthlyExpenses,2) }} this Month</p>
              <div class="progress bg-black" style="height: 7px">
                <div
                  class="progress-bar bg-brand-color-3"
                  role="progressbar"
                  style="width: 75%"
                  aria-valuenow="75"
                  aria-valuemin="0"
                  aria-valuemax="100"
                ></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-12">
          <div class="card statistics-card-1 overflow-hidden bg-brand-color-3">
            <div class="card-body">
              <img src="{{ asset("../backend/images/widget/img-status-6.svg") }}" alt="img" class="img-fluid img-bg" />
              <h5 class="mb-4 text-white">Yearly Expenses</h5>
              <div class="d-flex align-items-center mt-3">
                <h3 class="text-white f-w-300 d-flex align-items-center m-b-0">${{ number_format($yearlyExpenses,2) }}</h3>
              </div>
              <p class="text-white text-opacity-75 mb-2 text-sm mt-3">You spent ${{ number_format($yearlyExpenses,2) }} this Year</p>
              <div class="progress bg-black " style="height: 7px">
                <div
                  class="progress-bar bg-white"
                  role="progressbar"
                  style="width: 75%"
                  aria-valuenow="75"
                  aria-valuemin="0"
                  aria-valuemax="100"
                ></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="mb-0">Expenditure Tracker</h5>
                  </div>
                  <div class="row g-3">
                    <div class="col-md-6 col-xxl-3">
                      <div class="card shadow-none border mb-0">
                        <div class="card-body p-3">
                          <div class="d-flex align-items-center justify-content-between mb-3">
                            <img src="{{ asset("../backend/images/widget/img-travel.png") }}" alt="img" class="img-fluid" />
                            <div class="dropdown">
                              <a
                                class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none"
                                href="#"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="ti ti-dots-vertical f-18"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="javscript:void(0);">Yearly</a>
                              </div>
                            </div>
                          </div>
                          <h6 class="mb-3">Flights</h6>
                          <div class="bg-dark p-3 pt-4 rounded-4">
                            <div class="progress bg-white bg-opacity-25" style="height: 6px">
                              <div class="progress-bar bg-white" style="width: {{ min($tripsProgress, 100) }}%"></div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-2">
                              <p class="mb-0 text-white text-opacity-75 text-sm">{{ number_format($tripsProgress, 2) }}%</p>
                              <p class="mb-0 text-white text-opacity-75 text-sm">${{ number_format($yearlyTripsExpenses, 2) }}</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-xxl-3">
                      <div class="card shadow-none border mb-0">
                        <div class="card-body p-3">
                          <div class="d-flex align-items-center justify-content-between mb-3">
                            <img src="{{ asset("../backend/images/widget/img-shoping.png") }}" alt="img" class="img-fluid" />
                            <div class="dropdown">
                              <a
                                class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none"
                                href="#"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="ti ti-dots-vertical f-18"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="javascript:void(0);">Yearly</a>
                              </div>
                            </div>
                          </div>
                          <h6 class="mb-3">Hotel Bookings</h6>
                          <div class="bg-dark p-3 pt-4 rounded-4">
                            <div class="progress bg-white bg-opacity-25" style="height: 6px">
                              <div class="progress-bar bg-white" style="width: {{ min($hotelProgress, 100) }}%"></div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-2">
                              <p class="mb-0 text-white text-opacity-75 text-sm">{{ number_format($hotelProgress, 2) }}%</p>
                              <p class="mb-0 text-white text-opacity-75 text-sm">${{ number_format($yearlyHotelExpenses, 2) }}</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
      </div>
      <!-- [ Main Content ] end -->
    </div>
  </div>
  <!-- [ Main Content ] end -->

@include('user.partials.footer')
