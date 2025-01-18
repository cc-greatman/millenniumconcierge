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
                <h2 class="mb-0">Create New Trip</h2>
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
              <h5>Create New Trip</h5>
            </div>
            <div class="card-body">
              <form action="{{ route('admin.manage.new.trip.create') }}" method="POST">
                @csrf
                <input type="hidden" name="user" value="{{ $user->id }}">
                <div class="row">
                    <!-- Flight Type -->
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Flight Type:</label>
                            <select class="form-control" name="type" required>
                                <option disabled selected>Select flight type</option>
                                <option value="private">Private Flight</option>
                                <option value="commercial">Commercial Flight</option>
                                <option value="yacht">Yacht Trip</option>
                                <option value="helicopter">Helicopter Trip</option>
                            </select>
                            <small class="form-text text-muted">Select the type of trip.</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Airline -->
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Airline:</label>
                            <input type="text" name="airline" class="form-control" placeholder="Airline Name" required />
                            <small class="form-text text-muted">Enter the airline for the trip.</small>
                        </div>
                    </div>

                    <!-- Ticket Type -->
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Ticket Type:</label>
                            <input type="text" name="ticket_type" class="form-control" placeholder="e.g., Economy, Business, First Class" required />
                            <small class="form-text text-muted">Enter the ticket type for the trip.</small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Departure Date -->
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Departure Date:</label>
                            <input type="datetime-local" name="departure_date" class="form-control" required />
                            <small class="form-text text-muted">Select the departure date and time.</small>
                        </div>
                    </div>

                    <!-- Arrival Date -->
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Arrival Date:</label>
                            <input type="datetime-local" name="arrival_date" class="form-control" required />
                            <small class="form-text text-muted">Select the arrival date and time.</small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Baggage Allowance -->
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Baggage Allowance:</label>
                            <input type="text" name="baggage_allowance" class="form-control" placeholder="e.g., 20 kg" required />
                            <small class="form-text text-muted">Enter baggage allowance for the trip.</small>
                        </div>
                    </div>

                    <!-- Cost -->
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Cost:</label>
                            <input type="number" name="cost" class="form-control" placeholder="e.g., 1000.00" step="0.01" required />
                            <small class="form-text text-muted">Enter the cost of the trip.</small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Departure -->
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Departure Location:</label>
                            <input type="text" name="departure" class="form-control" placeholder="Departure City" required />
                            <small class="form-text text-muted">Enter the departure location.</small>
                        </div>
                    </div>

                    <!-- Destination -->
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Destination:</label>
                            <input type="text" name="destination" class="form-control" placeholder="Destination City" required />
                            <small class="form-text text-muted">Enter the destination.</small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Seats -->
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Seats:</label>
                            <input type="number" name="seats" class="form-control" placeholder="Number of Seats" min="1" required />
                            <small class="form-text text-muted">Enter the number of seats.</small>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Status:</label>
                            <select class="form-control" name="status" required>
                                <option disabled selected>Select Status</option>
                                <option value="used">Used</option>
                                <option value="unused">Unused</option>
                            </select>
                            <small class="form-text text-muted">Select the status of the trip.</small>
                        </div>
                    </div>
                </div>

                <!-- Extra Comments -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="form-label">Extra Comments:</label>
                            <textarea name="extra_comments" class="form-control" placeholder="Additional notes about the trip" rows="4"></textarea>
                            <small class="form-text text-muted">Provide any additional details about the trip.</small>
                        </div>
                    </div>
                </div>
                <div class="text-end btn-page">
                    <button name="submit" type="submit" class="btn btn-primary">Create User</button>
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
