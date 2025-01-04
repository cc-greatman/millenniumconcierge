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
                <li class="breadcrumb-item" aria-current="page">Edit Trip</li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Edit Trip</h2>
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
              <h5>Edit Trip</h5>
            </div>
            <div class="card-body">
              <form action="{{ route('admin.manage.new.create') }}" method="POST">
                @csrf
                <div class="row">
                  <div class="col-lg-6">
                    <div class="mb-3">
                        @if ($trip->type === "jet" || $trip->type === "flight")
                        <label class="form-label">Type of Flight</label>
                        <div class="col-md-8 col-sm-12">
                          <select class="form-control" name="type">
                            <option disabled selected>Select flight type</option>
                            <option value="jet">Private Flight</option>
                            <option value="flight">Commercial Flight</option>
                          </select>
                        </div>
                        @endif
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="mb-3">
                      <label class="form-label">Last Name:</label>
                      <input type="text" name="last_name" class="form-control" placeholder="Last Name" />
                      <small class="form-text text-muted">Enter user's last name</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="mb-3">
                      <label class="form-label">Password:</label>
                        <div class="input-group">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="{{ old('password') }}">
                            <button aria-label="button" class="btn btn-primary" onclick="createpassword('password',this)" type="button" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                        </div>
                      <small class="form-text text-muted">Please enter Password</small>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="mb-3">
                      <label class="form-label">Email:</label>
                      <div class="input-group search-form">
                        <input type="text" name="email" class="form-control" placeholder="Email Address" />
                        <span class="input-group-text bg-transparent"><i class="feather icon-link"></i></span>
                      </div>
                      <small class="form-text text-muted">Please enter user's email address</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                          <label class="form-label">Phone:</label>
                          <div class="input-group search-form">
                            <input type="text" name="phone" class="form-control" placeholder="07010001000 (digits only)" />
                            <span class="input-group-text bg-transparent"><i class="feather icon-link"></i></span>
                          </div>
                          <small class="form-text text-muted">Please enter user's phone number</small>
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
