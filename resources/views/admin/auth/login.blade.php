@include('admin.auth.partials.head')

  <div class="auth-main v1">
    <div class="auth-wrapper">
      <div class="auth-form">
        <div class="card my-5">
          <div class="card-body">
            @include('admin.alerts.success')
            @include('admin.alerts.error-lists')
            <div class="text-center">
              <img src="{{ asset("../frontend/img/logo-dark.png") }}" alt="images" class="img-fluid mb-5" width="180px" />
              <h4 class="f-w-500 mb-1">Login with your Staff email</h4>
              <p class="mb-5">Don't have an Account? <a href="javascript:void(0);" class="link-primary ms-1">Get Lost</a></p>
            </div>
            <form action="{{ route('admin.auth.login.perform') }}" method="post" autocomplete="off">
                @csrf
                <div class="mb-3">
                    <input type="text" name="email" class="form-control" id="floatingInput" placeholder="Email Address" />
                </div>
                <div class="mb-3">
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="{{ old('password') }}">
                        <button aria-label="button" class="btn btn-primary" onclick="createpassword('password',this)" type="button" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                    </div>
                </div>
                <div class="d-flex mt-1 justify-content-between align-items-center">
                    <div class="form-check">
                        <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked="" />
                        <label class="form-check-label text-muted" for="customCheckc1">Remember me?</label>
                    </div>
                </div>
                <div class="d-grid mt-4">
                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
          </div>
        </div>
      </div>
      @include('admin.auth.partials.side-footer')
    </div>
  </div>
  <!-- [ Main Content ] end -->

@include('admin.auth.partials.footer')
