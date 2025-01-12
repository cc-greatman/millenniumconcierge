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
                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">Trips</a></li>
                <li class="breadcrumb-item" aria-current="page">Completed</li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Completed Trips</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->


      <!-- [ Main Content ] start -->
      <div class="row">
        <!-- [ Row 1 ] start -->
        <div class="col-md-12 col-xxl-4">
          <div class="card statistics-card-1">
            <div class="card-body">
              <img src="{{ asset("../backend/images/widget/img-status-2.svg") }}" alt="img" class="img-fluid img-bg" />
              <div class="d-flex align-items-center">
                <div class="avtar bg-brand-color-3 text-white me-3">
                  <i class="ph-duotone ph-currency-dollar f-26"></i>
                </div>
                <div>
                  <p class="text-muted mb-0">Total Amount Spent</p>
                  <div class="d-flex align-items-end">
                    <h2 class="mb-0 f-w-500">${{ number_format($sum, 2) }}</h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <!-- [ Main Content ] end -->
        @php
            $tripTypes = [
                'jet' => ['label' => 'Private Jet Trips', 'color' => 'text-info'],
                'flight' => ['label' => 'Flight Trips', 'color' => 'text-primary'],
                'yacht' => ['label' => 'Yacht Trips', 'color' => 'text-success'],
            ];
        @endphp
        @foreach ($tripTypes as $type => $details)
            @php
                $data = $tripData->get($type, [
                    'total_trips' => 0,
                    'used_tickets' => 0,
                    'total_cost' => 0.00
                ]);
            @endphp
            <!-- support-section start -->
            <div class="col-xl-4 col-md-6">
                <div class="card support-bar">
                    <div class="card-body pb-0">
                        <h2 class="m-0">{{ $data['total_trips'] }}</h2>
                        <a href="http://">
                            <span class="{{ $details['color'] }}">{{ $details['label'] }}</span>
                        </a>
                        <p class="mb-3 mt-3">Total number of completed trips taken through {{ strtolower($details['label']) }}.</p>
                        <p><a href=""><strong>View All</strong></a></p>
                    </div>
                    <div class="card-footer bg-brand-color-3 text-white">
                        <div class="row text-center">
                            <div class="col">
                                <h4 class="m-0 text-white">{{ $data['used_tickets'] }}</h4>
                                <span>Completed</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- support-section end -->
        @endforeach
    </div>
</div>

@include('user.partials.footer')
