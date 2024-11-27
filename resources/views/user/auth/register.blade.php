@include('user.auth.partials.head')

<div class="auth-main v1">
    <div class="auth-wrapper">
      <div class="auth-form">
        <div class="card my-5">
          <div class="card-body">
            @include('user.alerts.success')
            @include('user.alerts.error')
            <div class="text-center">
              <img src="{{ asset("../frontend/img/logo-dark.png") }}" alt="images" class="img-fluid mb-3" width="180px" />
              <h4 class="f-w-500 mt-3 mb-1">Register with your email</h4>
              <p class="mb-5">Already have an Account? <a href="{{ route('auth.login.show') }}" class="link-primary">Log in</a></p>
            </div>
            <form action="{{ route('auth.register.perform') }}" method="POST" autocomplete="off">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <input type="text" name="first_name" class="form-control" placeholder="First Name" />
                            @if ($errors->has('first_name'))
                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" />
                            @if ($errors->has('last_name'))
                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email Address" />
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="Phone number (digits only)" />
                    @if ($errors->has('phone'))
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="{{ old('password') }}">
                        <button aria-label="button" class="btn btn-primary" onclick="createpassword('password',this)" type="button" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                    </div>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <div class="input-group">
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Password" value="{{ old('password_confirmation') }}">
                        <button aria-label="button" class="btn btn-primary" onclick="createpassword('password_confirmation',this)" type="button" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                    </div>
                    @if ($errors->has('password_confirmation'))
                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>
                <div class="d-flex mt-1 justify-content-between">
                <div class="form-check">
                    <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked="" required/>
                    <label class="form-check-label" for="customCheckc1">I agree to all the Terms & Conditions of Millennium Concierge</label>
                </div>
                </div>
                <div class="d-grid mt-4">
                <button type="submit" name="submit" class="btn btn-primary">Create Account</button>
                </div>
            </form>
            <div class="saprator my-3">
              <span>Or continue with</span>
            </div>
            <div class="text-center">
              <ul class="list-inline mx-auto mt-3 mb-0">
                <li class="list-inline-item">
                  <a href="https://myaccount.google.com/" class="avtar avtar-s rounded-circle bg-googleplus" target="_blank">
                    <i class="fab fa-google text-white"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      @include('user.auth.partials.side-footer')
    </div>
  </div>
  <!-- [ Main Content ] end -->

@include('user.auth.partials.footer')
