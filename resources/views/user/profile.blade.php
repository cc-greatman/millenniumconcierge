@include('user.partials.head')

@include('user.partials.sidebar')

@include('user.partials.navbar')

<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
      <!-- [ breadcrumb ] start -->
      @include('user.alerts.success')
        @include('user.alerts.error')
        @include('user.alerts.error-lists')
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href=".{{ route('user.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">Account</a></li>
                <li class="breadcrumb-item" aria-current="page">Profile</li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Account Profile</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->

      <!-- [ Main Content ] start -->
      <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
          <div class="card bg-primary">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="flex-grow-1 me-3">
                  <h3 class="text-white">Identity Verification</h3>
                  <p class="text-white text-opacity-75 text-opa mb-0"
                    >Your identity is not confirmed. Please complete verification by uploading a government issued identification card.
                    <a href="#" class="link-light"><u>Complete Verification</u></a>
                  </p>
                </div>
                <div class="flex-shrink-0">
                  <img src="{{ asset("../backend/images/application/img-accout-alert.png") }}" alt="img" class="img-fluid wid-80" />
                </div>
              </div>
            </div>
          </div>
          @php

              $id = auth()->guard('web')->id();

              $user = \App\Models\User::findOrFail($id);

              $name = $user->first_name." ".$user->last_name;
          @endphp
          <div class="row">
            <div class="col-lg-5 col-xxl-3">
              <div class="card overflow-hidden">
                <div class="card-body position-relative">
                  <div class="text-center mt-3">
                    <div class="chat-avtar d-inline-flex mx-auto">
                      <img
                        class="rounded-circle img-fluid wid-90 img-thumbnail"
                        src="{{ asset("../backend/images/user/avatar-1.jpg") }}"
                        alt="User image"
                      />
                      <i class="chat-badge bg-success me-2 mb-2"></i>
                    </div>
                    <h5 class="mb-0">{{ $name }}</h5>
                  </div>
                </div>
                <div
                  class="nav flex-column nav-pills list-group list-group-flush account-pills mb-0"
                  id="user-set-tab"
                  role="tablist"
                  aria-orientation="vertical"
                >
                  <a
                    class="nav-link list-group-item list-group-item-action"
                    id="user-set-information-tab"
                    data-bs-toggle="pill"
                    href="#user-set-information"
                    role="tab"
                    aria-controls="user-set-information"
                    aria-selected="true"
                  >
                    <span class="f-w-500"><i class="ph-duotone ph-clipboard-text m-r-10"></i>Personal Information</span>
                  </a>
                  <a
                    class="nav-link list-group-item list-group-item-action"
                    id="user-set-account-tab"
                    data-bs-toggle="pill"
                    href="#user-set-account"
                    role="tab"
                    aria-controls="user-set-account"
                    aria-selected="false"
                  >
                    <span class="f-w-500"><i class="ph-duotone ph-notebook m-r-10"></i>Identity Verification</span>
                  </a>
                  <a
                    class="nav-link list-group-item list-group-item-action"
                    id="user-set-passwort-tab"
                    data-bs-toggle="pill"
                    href="#user-set-passwort"
                    role="tab"
                    aria-controls="user-set-passwort"
                    aria-selected="false"
                  >
                    <span class="f-w-500"><i class="ph-duotone ph-key m-r-10"></i>Change Password</span>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-lg-7 col-xxl-9">
              <div class="tab-content" id="user-set-tabContent">
                <div class="tab-pane fade" id="user-set-information" role="tabpanel" aria-labelledby="user-set-information-tab">
                  <form action="{{ route('user.account.profile.update') }}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                          <h5>Personal Information</h5>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="mb-3">
                                <label class="form-label">First Name</label>
                                <input type="text" name="first_name" placeholder="Given Name" class="form-control" value="{{ optional($user)->first_name }}" />
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="mb-3">
                                <label class="form-label">Last Name</label>
                                <input type="text" name="last_name" class="form-control" placeholder="Surname" value="{{ optional($user)->last_name }}" />
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="text" name="phone" placeholder="0701000100 (digits only)" class="form-control" value="{{ optional($user)->phone }}" />
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="text-end btn-page">
                        <button name="submit" type="submit" class="btn btn-primary">Update Profile</button>
                      </div>
                  </form>
                </div>
                <div class="tab-pane fade" id="user-set-account" role="tabpanel" aria-labelledby="user-set-account-tab">
                <form action="{{ route('user.account.identity.upload') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                          <h5>Identity Verification</h5>
                        </div>
                        <div class="card-body">
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0">
                              <div class="row mb-0">
                                <label class="col-form-label col-md-4 col-sm-12 text-md-end">Type of ID Card</label>
                                <div class="col-md-8 col-sm-12">
                                  <select class="form-control" name="id_type">
                                    <option disabled selected>Select ID Type</option>
                                    <option value="local_passport">Local Passport</option>
                                    <option value="intl_passport">International Passport</option>
                                    <option value="drivers_license">Driver's License</option>
                                    <option value="nin">NIN Card(Physical/Digital)</option>
                                    <option value="voters_card">Voter's Card</option>
                                  </select>
                                </div>
                              </div>
                            </li>
                            <li class="list-group-item px-0 pt-0">
                                <div class="row mb-0">
                                  <label class="col-form-label col-md-4 col-sm-12 text-md-end"
                                    >Front of ID <span class="text-danger">*</span></label
                                  >
                                  <div class="col-md-8 col-sm-12">
                                    <input type="file" name="front_id" class="form-control" value="Ashoka_Tano_16" accept=".jpeg,.png,.jpg"/>
                                    <small class="text-muted">Allowed file types: JPEG, PNG. Max size: 10MB.</small>
                                  </div>
                                </div>
                            </li>
                            <li class="list-group-item px-0 pt-0">
                                <div class="row mb-0">
                                  <label class="col-form-label col-md-4 col-sm-12 text-md-end"
                                    >Back of ID <span class="text-danger">*</span></label
                                  >
                                  <div class="col-md-8 col-sm-12">
                                    <input type="file" name="back_id" class="form-control" value="Ashoka_Tano_16" accept=".jpeg,.png,.jpg" />
                                    <small class="text-muted">Allowed file types: JPEG, PNG. Max size: 10MB.</small>
                                  </div>
                                </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="text-end btn-page">
                        <button name="submit" type="submit" class="btn btn-primary">Update Profile</button>
                      </div>
                </form>
                </div>
                <div class="tab-pane fade" id="user-set-passwort" role="tabpanel" aria-labelledby="user-set-passwort-tab">
                    <form action="" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                              <h5>Change Password</h5>
                            </div>
                            <div class="card-body">
                              <ul class="list-group list-group-flush">
                                <li class="list-group-item pt-0 px-0">
                                  <div class="row mb-0">
                                    <label class="col-form-label col-md-4 col-sm-12 text-md-end"
                                      >Current Password <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-12">
                                      <input type="password" name="current_password" placeholder="Current Password" class="form-control" />
                                    </div>
                                  </div>
                                </li>
                                <li class="list-group-item px-0">
                                  <div class="row mb-0">
                                    <label class="col-form-label col-md-4 col-sm-12 text-md-end"
                                      >New Password <span class="text-danger">*</span></label
                                    >
                                    <div class="col-md-8 col-sm-12">
                                      <input type="password" name="password" placeholder="Password" class="form-control" />
                                    </div>
                                  </div>
                                </li>
                                <li class="list-group-item pb-0 px-0">
                                  <div class="row mb-0">
                                    <label class="col-form-label col-md-4 col-sm-12 text-md-end"
                                      >Confirm Password <span class="text-danger">*</span></label
                                    >
                                    <div class="col-md-8 col-sm-12">
                                      <input type="password" name="password_confirmation" placeholder="Password Confirmation" class="form-control" />
                                    </div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </div>
                          <div class="text-end btn-page">
                            <button name="submit" type="submit" class="btn btn-primary">Update Profile</button>
                          </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- [ sample-page ] end -->
      </div>
      <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->

@include('user.partials.footer')
