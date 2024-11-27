<div class="auth-sidefooter">
    <img src="{{ asset("../frontend/img/logo-dark.png") }}" class="img-brand img-fluid" alt="images" width="180px" />
    <hr class="mb-3 mt-4" />
    <div class="row">
      <div class="col-sm-3 my-1">
        <p class="m-0">Made with ♥ by Team <a href="https://bitsys.ng" target="_blank"> BitSys Nigeria</a></p>
      </div>
      <div class="col-auto my-1">
        <ul class="list-inline footer-link mb-0">
          <li class="list-inline-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="list-inline-item"><a href="{{ route('about') }}">About</a></li>
          <li class="list-inline-item"><a href="{{ route('gallery') }}">Gallery</a></li>
          <li class="list-inline-item"><a href="{{ route('services') }}">Services</a></li>
          <li class="list-inline-item"><a href="{{ route('membership') }}">Membership</a></li>
          <li class="list-inline-item"><a href="{{ route('contact') }}">Enquiry</a></li>
        </ul>
      </div>
      <div class="col-auto my-1">
          <p>&copy; {{ date('Y') }} Millennium Concierge. All rights reserved.</p>
      </div>
    </div>
</div>
