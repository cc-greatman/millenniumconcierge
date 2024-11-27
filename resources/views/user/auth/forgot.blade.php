@include('user.auth.partials.head')

<div class="auth-main v1">
    <div class="auth-wrapper">
      <div class="auth-form">
        <div class="card my-5">
          <div class="card-body">
            @include('user.alerts.success')
            <div class="text-center">
              <img src="{{ asset("../frontend/img/logo-dark.png") }}" alt="images" class="img-fluid mb-3" width="180px" />
              <h4 class="f-w-500 mb-1">Forgot Password</h4>
              <p class="mb-5">Remember Password? Back to <a href="{{ route('auth.login.show') }}" class="link-primary ms-1">Log in</a></p>
            </div>
            <form action="{{ route('auth.forgot-password.perform') }}" method="post">
                @csrf
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="Email Address" />
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="d-grid mt-3">
                    <button type="submit" name="submit" class="btn btn-primary">Send reset email</button>
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
