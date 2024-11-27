@include('user.auth.partials.head')

<div class="auth-main v1">
    <div class="auth-wrapper">
      <div class="auth-form">
        <div class="card my-5">
          <div class="card-body">
            <div class="text-center">
              <img src="{{ asset("../frontend/img/logo-dark.png") }}" alt="images" class="img-fluid mb-3" width="180px" />
              <h4 class="f-w-500 mb-1">Reset password</h4>
              <p class="mb-5">Back to <a href="{{ route('auth.login.show') }}" class="link-primary ms-1">Log in</a></p>
            </div>
            <form action="{{ route('auth.reset-password.perform') }}" method="post" autocomplete="off">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="mb-3">
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="floatingInput" placeholder="Email Address" />
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
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
                <div class="d-grid mt-4">
                    <button type="submit" name="submit" class="btn btn-primary">Reset Password</button>
                </div>
            </form>
          </div>
        </div>
      </div>
      @include('user.auth.partials.side-footer')
    </div>
</div>
<!-- [ Main Content ] end -->

@include('user.auth.partials.footer')
