@include('user.partials.head')

@include('user.partials.sidebar')

@include('user.partials.navbar')

@php
    $id = auth()->guard('web')->id();

    $user = \App\Models\User::findOrFail($id);
@endphp

<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
      <!-- [ breadcrumb ] start -->
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Pick a Membership Plan</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->

      <!-- [ Main Content ] start -->
      <div class="row">
        <div class="col-12">
          <div class="row g-4">
            <!-- [ sample-page ] start -->
            <div class="col-md-6 col-lg-4">
              <div class="card price-card p-4 border border-sliver border-2 h-100">
                <div class="card-body bg-sliver bg-opacity-10 rounded v3">
                  <div class="price-head v3">
                    <h4 class="mb-0 text-success">Silver</h4>
                    <div class="price-price mt-3" style="font-family: 'Libre', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">&#8358;75,000 <span class="text-muted"> annaully</span></div>
                  </div>
                  <ul class="list-group list-group-flush product-list v3">
                    <li class="list-group-item enable"><i class="ti ti-check text-success"></i> Discounted hotel rates</li>
                    <li class="list-group-item enable"><i class="ti ti-check text-success"></i> Itinerary management and flight booking at no extra fee</li>
                    <li class="list-group-item enable"><i class="ti ti-check text-success"></i> Free access to airport exclusive lounge</li>
                  </ul>
                  <div class="d-grid">
                    @if($user->getMembershipType() === "Silver Member")
                        <a class="btn btn-warning mt-4" href="{{ route('membership.setting.view') }}">Current Plan</a>
                    @else
                        <a class="btn btn-primary mt-4" href="{{ route('user.paystack.pay.process', ['plan' => 'silver', 'amount' => 75000]) }}">Buy Now</a>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="card price-card p-4 border border-gold border-2 h-100">
                <div class="card-body bg-gold bg-opacity-10 rounded v3">
                  <div class="price-head v3">
                    <h4 class="mb-0 text-primary">Gold</h4>
                    <div class="price-price mt-3" style="font-family: 'Libre', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">&#8358;100,000 <span class="text-muted"> annually</span></div>
                  </div>
                  <ul class="list-group list-group-flush product-list v3">
                    <li class="list-group-item enable"><i class="ti ti-check text-primary"></i> Discounted hotel rates</li>
                    <li class="list-group-item enable"><i class="ti ti-check text-primary"></i> Itinerary management and flight booking at no extra fee</li>
                    <li class="list-group-item enable"><i class="ti ti-check text-primary"></i> Free access to airport exclusive lounge</li>
                    <li class="list-group-item enable"><i class="ti ti-check text-primary"></i> Access to 24/7 customer service</li>
                  </ul>
                  <div class="d-grid">
                    @if($user->getMembershipType() === "Gold Member")
                        <a class="btn btn-warning mt-4" href="{{ route('membership.setting.view') }}">Current Plan</a>
                    @else
                        <a class="btn btn-primary mt-4" href="{{ route('user.paystack.pay.process', ['plan' => 'gold', 'amount' => 100000]) }}">Buy Now</a>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="card price-card p-4 border border-platinum border-2 h-100">
                <div class="card-body bg-platinum bg-opacity-10 rounded v3">
                  <div class="price-head v3">
                    <h4 class="mb-0 text-warning" style="color: black !important;">Millennium Society</h4>
                    <div class="price-price mt-3" style="font-family: 'Libre', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; color: black !important;">$3,000 <span class="text-muted"> annually</span></div>
                  </div>
                  <ul class="list-group list-group-flush product-list v3">
                    <li class="list-group-item enable"><i class="ti ti-check text-warning"></i> <strong style="color: black !important;">All Sliver & Gold Membership offers plus:</strong></li>
                    <li class="list-group-item enable" style="color: black !important;"><i class="ti ti-check text-warning"></i> Access to Private Jet Charter at no extra charge</li>
                    <li class="list-group-item enable" style="color: black !important;"><i class="ti ti-check text-warning"></i> E introduction to all Society Members</li>
                    <li class="list-group-item enable" style="color: black !important;"><i class="ti ti-check text-warning"></i> B 2 B meeting set up</li>
                    <li class="list-group-item enable" style="color: black !important;"><i class="ti ti-check text-warning"></i> International Speaking opportunity</li>
                    <li class="list-group-item enable" style="color: black !important;"><i class="ti ti-check text-warning"></i> International award nomination</li>
                    <li class="list-group-item enable" style="color: black !important;"><i class="ti ti-check text-warning"></i> Access to Exclusive High Value Domestic and International Events</li>
                  </ul>
                  <div class="d-grid">
                    @if($user->getMembershipType() === "Millennium Society Member")
                        <a class="btn btn-warning mt-4" href="{{ route('membership.setting.view') }}">Current Plan</a>
                    @else
                        <a class="btn btn-primary mt-4" href="{{ route('user.crypto.create.pay', ['type' => 'society']) }}">Buy Now</a>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <!-- [ sample-page ] end -->
          </div>
        </div>
      </div>
      <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->

@include('user.partials.footer')
