@include('user.partials.head')

@include('user.partials.sidebar')

@include('user.partials.navbar')

<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
      <!-- [ breadcrumb ] start -->
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">Bookings</a></li>
                <li class="breadcrumb-item" aria-current="page">Overview</li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Bookings Overview</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->


      <!-- [ Main Content ] start -->
      <div class="row">
            <!-- support-section start -->
            <div class="col-xl-6 col-md-6">
                <div class="card support-bar">
                    <div class="card-body pb-0">
                        <h2 class="m-0">{{ $bookingData['count'] }}</h2>
                        <a href="http://">
                            <span class="text-info">Hotel Bookings</span>
                        </a>
                        <p class="mb-3 mt-3">Total number of times we've booked a hotel room for {{ auth()->guard('web')->user()->first_name }}.</p>
                        <p><strong>Amount Spent:</strong> ${{ number_format($bookingData['sum'], 2) }}</p>
                    </div>
                    <div class="card-footer bg-brand-color-3 text-white">
                        <div class="row text-center">
                            <div class="col border-end">
                                <h4 class="m-0 text-white">{{ $bookingData['completed'] }}</h4>
                                <span>Used Bookings</span>
                            </div>
                            <div class="col border-end">
                                <h4 class="m-0 text-white">{{ $bookingData['pending'] }}</h4>
                                <span>Unused Bookings</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- support-section end -->
      </div>
      <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->

@include('user.partials.footer')

