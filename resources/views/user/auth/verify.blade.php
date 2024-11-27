@include('user.auth.partials.head')

<div class="auth-main v1">
    <div class="auth-wrapper">
      <div class="auth-form">
        <div class="card my-5">
          <div class="card-body">
            @include('user.alerts.success')
            @include('user.alerts.error')
            <div class="text-center">
              <img src="{{ asset("../frontend/img/logo-dark.png") }}" width="180px" alt="images" class="img-fluid mb-3" />
              <h4 class="f-w-500 mb-3">Please confirm your email address</h4>
              <p class="mb-0">We`ve sent you code to <span style="color:#DFBF81">{{ Auth::user()->email }}</span></p>
              <p class="mb-3">Did not receive the email?
            </div>
            <form method="post" action="{{ route("email.verify.resend") }}">
                @csrf
                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                <div class="d-grid mt-4">
                <button type="submit" name="submit" class="btn btn-primary">Resend Verification Email</button>
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
