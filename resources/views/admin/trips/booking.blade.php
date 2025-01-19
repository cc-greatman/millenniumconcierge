@include('admin.partials.head')

@include('admin.partials.sidebar')

@include('admin.partials.navbar')

<!-- [ Main Content ] start -->
<section class="pc-container">
    <div class="pc-content">
      <!-- [ breadcrumb ] start -->
        @include('admin.alerts.success')
        @include('admin.alerts.error')
        @include('admin.alerts.error-lists')
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.show') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">Trips</a></li>
                <li class="breadcrumb-item" aria-current="page">Create New Trip</li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Create New Trip for {{ $user->first_name }}</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->


      <!-- [ Main Content ] start -->
      <div class="row">
        <!-- [ form-element ] start -->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h5>Create New Trip for {{ $user->first_name }}</h5>
            </div>
            <div class="card-body">
              <form action="{{ route('admin.trips.create.hotel.process') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <div class="row">
                    <!-- Hotel Name -->
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Hotel Name:</label>
                            <input type="text" name="hotel" class="form-control" placeholder="Hotel Name" required />
                            <small class="form-text text-muted">Enter the name of the hotel.</small>
                        </div>
                    </div>

                    <!-- Room Type -->
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Room Type:</label>
                            <select class="form-control" name="room_type" required>
                                <option disabled selected>Select Room Type</option>
                                <option value="Executive Suite">Executive Suite</option>
                                <option value="Penthouse">Penthouse</option>
                                <option value="Single Room">Single Room</option>
                            </select>
                            <small class="form-text text-muted">Select the type of room.</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Room Quantity -->
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Room Quantity:</label>
                            <input type="number" name="room_qty" class="form-control" placeholder="Number of Rooms" min="1" required />
                            <small class="form-text text-muted">Enter the number of rooms required.</small>
                        </div>
                    </div>
                    <!-- Cost -->
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Cost:</label>
                            <input type="number" name="cost" class="form-control" placeholder="e.g., 1000.00" step="0.01" required />
                            <small class="form-text text-muted">Enter the total cost of the booking.</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Check-In Date -->
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Check-In Date:</label>
                            <input type="date" name="check_in" class="form-control" required />
                            <small class="form-text text-muted">Select the check-in date.</small>
                        </div>
                    </div>
                    <!-- Check-Out Date -->
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Check-Out Date:</label>
                            <input type="date" name="check_out" class="form-control" required />
                            <small class="form-text text-muted">Select the check-out date.</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Booking Details -->
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="form-label">Details:</label>
                            <textarea name="details" class="form-control" placeholder="Additional details about the booking" rows="4"></textarea>
                            <small class="form-text text-muted">Provide additional information about the booking.</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Status -->
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Status:</label>
                            <select class="form-control" name="status" required>
                                <option disabled selected>Select Status</option>
                                <option value="used">Used</option>
                                <option value="unused">Unused</option>
                            </select>
                            <small class="form-text text-muted">Select the status of the booking.</small>
                        </div>
                    </div>
                </div>
                <div class="text-end btn-page">
                    <button name="submit" type="submit" class="btn btn-primary">Create New Booking</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- [ form-element ] end -->
      </div>
      <!-- [ Main Content ] end -->
    </div>
</section>
<!-- [ Main Content ] end -->

@include('admin.partials.footer')
