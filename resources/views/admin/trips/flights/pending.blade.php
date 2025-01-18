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
                <li class="breadcrumb-item"><a href="javascript: void(0)">Flights</a></li>
                <li class="breadcrumb-item" aria-current="page">Pending</li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Pending Flights</h2>
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
        <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5>All Pending Flights</h5>
              </div>
              <div class="card-body">
                <table id="res-config" class="display table table-striped table-hover dt-responsive nowrap" style="width: 100%">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Type</th>
                            <th>Airline</th>
                            <th>Cost</th>
                            <th>Departure</th>
                            <th>Departure Time</th>
                            <th>Destination</th>
                            <th>Arrival Time</th>
                            <th>Seats</th>
                            <th>Status</th>
                            <th>Baggage</th>
                            <th>Comments</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trips as $trip)
                            <tr>
                                <td>{{ $trip->user->first_name }} {{ $trip->user->last_name }}</td>
                                <td>
                                    @switch($trip->type)
                                        @case('private')
                                            Private Flight
                                            @break
                                        @case('commercial')
                                            Commercial Flight
                                            @break
                                        @case('yacht')
                                            Yacht Trip
                                            @break
                                        @case('helicopter')
                                            Helicopter Trip
                                            @break
                                        @default
                                            {{ ucfirst($trip->type) }}
                                    @endswitch
                                </td>
                                <td>{{ $trip->airline }}</td>
                                <td>${{ number_format($trip->cost, 2) }}</td>
                                <td>{{ $trip->departure }}</td>
                                <td>{{ \Carbon\Carbon::parse($trip->departure_date)->format('Y-m-d H:i:s') }}</td>
                                <td>{{ $trip->destination }}</td>
                                <td>{{ \Carbon\Carbon::parse($trip->arrival_date)->format('Y-m-d H:i:s') }}</td>
                                <td>{{ $trip->seats }}</td>
                                <td>
                                    @if ($trip->status === 'used')
                                        <span class="badge text-bg-success">Completed</span>
                                    @else
                                        <span class="badge text-bg-warning">Pending</span>
                                    @endif
                                </td>
                                <td>{{ $trip->baggage_allowance }}</td>
                                <td>{{ $trip->extra_comments }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
            </div>
        </div>
      <!-- [ Main Content ] end -->
    </div>
</div>

@include('admin.partials.footer')
