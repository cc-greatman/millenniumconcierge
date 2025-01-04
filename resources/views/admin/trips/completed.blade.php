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
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.show') }}">Home</a></li>
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
        <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5>All Completed Trips</h5>
              </div>
              <div class="card-body">
                <table id="res-config" class="display table table-striped table-hover dt-responsive nowrap" style="width: 100%">
                  <thead>
                    <tr>
                      <th>User</th>
                      <th>Type</th>
                      <th>Cost</th>
                      <th>Departure</th>
                      <th>Destination</th>
                      <th>No of Seats</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($trips as $trip)
                        <tr>
                            <td>{{ $trip->user->first_name }} {{ $trip->user->last_name }}</td>
                            <td>
                                @if($trip->type === "jet")
                                    Private
                                @elseif($trip->type === "flight")
                                    Commercial
                                @else
                                    {{ $trip->type }}
                                @endif
                            </td>
                            <td>${{ number_format($trip->cost, 2) }}</td>
                            <td>{{ $trip->departure }}</td>
                            <td>{{ $trip->destination }}</td>
                            <td>{{ $trip->seats }}</td>
                            @if ($trip->status === "used")
                                <td>
                                    <span class="badge text-bg-success">Used</span>
                                </td>
                            @elseif ($trip->status === "unused")
                                <td><span class="badge text-bg-warning">Unused</span></td>
                            @endif
                            <td>
                                <div class="overlay-edit">
                                    <ul class="list-inline mb-0">
                                      <li class="list-inline-item m-0"
                                        ><a href="{{ route('admin.trips.edit.view', $trip->id) }}" class="avtar avtar-s btn btn-primary"><i class="ti ti-pencil f-18"></i></a
                                      ></li>
                                      <li class="list-inline-item m-0"><a href="#" onclick="return confirm('This action cannot be undone')" class="avtar avtar-s btn bg-white btn-link-danger"><i class="ti ti-trash f-18"></i></a
                                      ></li>
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
      <!-- [ Main Content ] end -->
    </div>
</div>

@include('admin.partials.footer')
