@include('admin.partials.head')

@include('admin.partials.sidebar')

@include('admin.partials.navbar')

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
                <li class="breadcrumb-item" aria-current="page">Report</li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">{{ $user->first_name }}'s Trips Report</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->


      <!-- [ Main Content ] start -->
      <div class="row">
        @php
            $tripTypes = [
                'private' => ['label' => 'Private Flights', 'color' => 'text-info', 'link' =>' {{ route('admin.trips.user.flights.view', $user->id) }}'],
                'commercial' => ['label' => 'Commercial Flights', 'color' => 'text-primary', 'link' => '{{ route('admin.trips.user.flights.view', $user->id) }}'],
                'yacht' => ['label' => 'Yacht Trips', 'color' => 'text-success', 'link' => '{{ route('admin.trips.user.yachts.view', $user->id) }}'],
                'helicopter' => ['label' => 'Helicopter Trips', 'color' => 'text-info', 'link' => '{{ route('admin.trips.user.helicopters.view', $user->id) }}'],
            ];
        @endphp
        @foreach ($tripTypes as $type => $details)
            @php
                $data = $tripData->get($type, [
                    'total_trips' => 0,
                    'used_tickets' => 0,
                    'unused_tickets' => 0,
                    'total_cost' => 0.00
                ]);
            @endphp
            <!-- support-section start -->
            <div class="{{ $loop->last ? 'col-xl-6 col-md-6' : 'col-xl-4 col-md-6' }}">
                <div class="card support-bar">
                    <div class="card-body pb-0">
                        <h2 class="m-0">{{ $data['total_trips'] }}</h2>
                        <a href="vascript:void(0);">
                            <span class="{{ $details['color'] }}">{{ $details['label'] }}</span>
                        </a>
                        <p class="mb-3 mt-3">Total number of trips taken through {{ strtolower($details['label']) }}.</p>
                        <p>
                            <a href="{{ $data['link'] }}"><strong>View All</strong></a>
                        </p>
                    </div>
                    <div class="card-footer bg-brand-color-3 text-white">
                        <div class="row text-center">
                            <div class="col border-end">
                                <h4 class="m-0 text-white">{{ $data['used_tickets'] }}</h4>
                                <span>Completed</span>
                            </div>
                            <div class="col border-end">
                                <h4 class="m-0 text-white">{{ $data['unused_tickets'] }}</h4>
                                <span>Pending</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- support-section end -->
        @endforeach
        <div class="col-xl-6 col-md-6">
            <div class="card support-bar">
                <div class="card-body pb-0">
                    <h2 class="m-0">{{ $hotelData['count'] }}</h2>
                    <a href="javascript:void(0);">
                        <span class="text-info">Hotel Trips</span>
                    </a>
                    <p class="mb-3 mt-3">Total number of times we've booked a hotel room for {{ $user->first_name }}.</p>
                    <p>
                        <a href="{{ route('admin.trips.user.hotels.view', $user->id) }}"><strong>View All</strong></a>
                    </p>
                </div>
                <div class="card-footer bg-brand-color-3 text-white">
                    <div class="row text-center">
                        <div class="col border-end">
                            <h4 class="m-0 text-white">{{ $hotelData['completed'] }}</h4>
                            <span>Completed</span>
                        </div>
                        <div class="col border-end">
                            <h4 class="m-0 text-white">{{ $hotelData['pending'] }}</h4>
                            <span>Pending</span>
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

@include('admin.partials.footer')

