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
                <li class="breadcrumb-item"><a href="javascript: void(0)">Helicopter Trips</a></li>
                <li class="breadcrumb-item" aria-current="page">Completed</li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">All {{ $user->first_name }}'s Helicopter Trips</h2>
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
                    @php
                        $currencyService = app(App\Services\CurrencyService::class);
                        $convertedPrice = $currencyService->convert($sum, 'USD', session('currency', 'USD'));
                        $currencySymbol = currencySymbol(session('currency', 'USD'));
                    @endphp
                    <h2 class="mb-0 f-w-500">{{ $currencySymbol }}{{ number_format($convertedPrice, 2) }}</h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5>All {{ $user->first_name }}'s Helicopter Trips</h5>
              </div>
              <div class="card-body">
                <table id="res-config" class="display table table-striped table-hover dt-responsive nowrap" style="width: 100%">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Type</th>
                            <th>Ticket Type</th>
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
                            <th>Action</th>
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
                                <td>{{ $trip->ticket_type }}</td>
                                <td>{{ $trip->airline }}</td>
                                @php
                                    $currencyService = app(App\Services\CurrencyService::class);
                                    $converted = $currencyService->convert($trip->cost, 'USD', session('currency', 'USD'));
                                    $currencySymbol = currencySymbol(session('currency', 'USD'));
                                @endphp
                                <td>{{ $currencySymbol }}{{ number_format($converted, 2) }}</td>
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
                                <td>
                                    <span class="">Action</span>
                                    <div class="overlay-edit">
                                      <ul class="list-inline mb-0">
                                        <li class="list-inline-item m-0"
                                          ><a href="{{ route('admin.trips.edit.index', $trip->id) }}" class="avtar avtar-s btn btn-primary"><i class="ti ti-pencil f-18"></i></a
                                        ></li>
                                        <li class="list-inline-item m-0">
                                            <form action="{{ route('admin.trips.destroy', $trip->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('This action cannot be undone')" class="avtar avtar-s btn bg-white btn-link-danger"><i class="ti ti-trash f-18"></i></button>
                                        </li>
                                      </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
</div>

@include('admin.partials.footer')
