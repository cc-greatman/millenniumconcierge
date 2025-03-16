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
            <div class="col-md-9">
              <div class="page-header-title">
                <h2 class="mb-0">{{ $user->first_name }}'s Trips Report</h2>
              </div>
            </div>
            <div class="col-md-3">
                <div class="btn btn-primary">
                    <form action="{{ route('admin.trips.create.view.switch') }}" method="POST" id="trip-type-form">
                        @csrf
                        <div style="margin-top: 10px !important; margin-left: 5px !important; margin-bottom:5px !important;">
                            <label for="currency">Create a New Trip</label>
                        </div>
                        <div class="dropdown-item">
                            <input type="hidden" name="user" value="{{ $user->id }}">
                            <select name="trip_type" id="trip_type" onchange="document.getElementById('trip-type-form').submit();" class="form-select" style="width: 100%;">
                                <option value="Commercial">Commercial Trip</option>
                                <option value="Private Flight">Private Flight Trip</option>
                                <option value="Yatch">Yatch Trip</option>
                                <option value="Helicopter">Helicopter Trip</option>
                                <option value="Hotel">Hotel Trip</option>
                            </select>
                        </div>
                    </form>
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
                    <h5 class="mb-0">{{ $user->first_name }}'s Membership Tracker</h5>
                  </div>
                  <div class="row g-3">
                    <div class="col-md-12 col-xxl-12">
                        <div class="card shadow-none border mb-0">
                            <div class="card-body p-3">
                                @php
                                    use Carbon\Carbon;

                                    $membership = $user->memberships;

                                    $startDate = $membership->start_date ? Carbon::parse($membership->start_date) : null;
                                    $endDate = $membership->end_date ? Carbon::parse($membership->end_date) : null;
                                    $currentDate = Carbon::now();

                                    // Default values
                                    $daysElapsed = 0;
                                    $totalDays = 365;
                                    $progress = 0;

                                    if ($startDate && $endDate) {
                                        $totalDays = $endDate->diffInDays($startDate);
                                        $daysElapsed = $currentDate->diffInDays($startDate);
                                        $daysRemaining = $endDate ? max($endDate->diffInDays($currentDate), 0) : 365;

                                        // Prevent exceeding 100%
                                        $progress = min(($daysElapsed / $totalDays) * 100, 100);
                                    }
                                @endphp

                                <h6 class="mb-3">Membership Type: <strong>{{ $user->getMembershipType() }}</strong></h6>

                                <p class="mb-1 text-sm"><strong>Status:</strong>
                                    <span class="badge
                                        @if($membership->status == 'active') bg-success
                                        @elseif($membership->status == 'canceled') bg-danger
                                        @else bg-warning @endif">
                                        {{ ucfirst($membership->status) }}
                                    </span>
                                </p>

                                <!-- Subscription Progress Tracker -->
                                <div class="bg-dark p-3 pt-4 rounded-4">
                                    <div class="progress bg-white bg-opacity-25" style="height: 6px">
                                        <div class="progress-bar
                                            @if($progress <= 75) bg-success
                                            @elseif($progress >= 76) bg-warning
                                            @else bg-danger @endif"
                                            style="width: {{ $progress }}%">
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-2">
                                        <p class="mb-0 text-white text-opacity-75 text-sm">Start: 0 Days</p>
                                        <p class="mb-0 text-white text-opacity-75 text-sm">Current: {{ $daysElapsed }} Days</p>
                                        <p class="mb-0 text-white text-opacity-75 text-sm">End: {{ $totalDays }} Days</p>
                                    </div>
                                </div>

                                <!-- Renewal & Payment Details -->
                                <div class="d-flex align-items-center justify-content-between mt-3">
                                    <p class="mb-1 text-sm"><strong>Renewal Date:</strong> {{ $endDate ? $endDate->format('M d, Y') : 'N/A' }}</p>
                                    <p class="mb-1 text-sm"><strong>Days Remaining:</strong> {{ $daysRemaining }} days</p>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-md-12">
            <div class="card support-bar">
                <div class="card-body pb-0">
                    <h2 class="m-0">{{ $user->first_name }}'s Personal Information</h2>
                    <p class="mb-3 mt-3"><strong>Name:</strong> {{ $user->first_name }} {{ $user->last_name }}</p>
                    <p class="mb-3"><strong>Email:</strong> {{ $user->email }}</p>
                    <p class="mb-3"><strong>Phone:</strong> {{ $user->phone ? $user->phone : 'N/A' }}</p>
                    <div class="mt-3">
                        <a href="{{ route('admin.manage.person.view', $user->id) }}" class="btn btn-primary btn-sm">View User</a>
                    </div>
                </div>
            </div>
        </div>
        @php
            $tripTypes = [
                'commercial' => ['label' => 'Commercial Flights', 'color' => 'text-primary', 'link' => route('admin.trips.user.commercial.flights.view', $user->id) ],
                'private' => ['label' => 'Private Flights', 'color' => 'text-info', 'link' => route('admin.trips.user.private.flights.view', $user->id) ],
                'yacht' => ['label' => 'Yacht Trips', 'color' => 'text-success', 'link' => route('admin.trips.user.yachts.view', $user->id) ],
                'helicopter' => ['label' => 'Helicopter Trips', 'color' => 'text-info', 'link' => route('admin.trips.user.helicopters.view', $user->id) ],
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
            <div class="col-xl-12 col-md-12">
                <div class="card support-bar">
                    <div class="card-body pb-0">
                        <h2 class="m-0">{{ $data['total_trips'] }}</h2>
                        <a href="vascript:void(0);">
                            <span class="{{ $details['color'] }}">{{ $details['label'] }}</span>
                        </a>
                        <p class="mb-3 mt-3">Total number of trips taken through {{ strtolower($details['label']) }}.</p>
                        <p>
                            <a href="{{ $details['link'] }}"><strong>View All</strong></a>
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
        <div class="col-xl-12 col-md-12">
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

