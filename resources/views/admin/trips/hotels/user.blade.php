@include('admin.partials.head')

@include('admin.partials.sidebar')

@include('admin.partials.navbar')

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
                <li class="breadcrumb-item"><a href="javascript: void(0)">Hotel Trips</a></li>
                <li class="breadcrumb-item" aria-current="page">Completed</li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">All {{ $user->first_name }}'s Hotel Trips</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->


      <!-- [ Main Content ] start -->
      <div class="row">
        <!-- [ Row 1 ] start -->
        <div class="col-md-12 col-xxl-4">
          <div class="card statistics-card-1">
            <div class="card-body">
              <img src="{{ asset("../backend/images/widget/img-status-2.svg") }}" alt="img" class="img-fluid img-bg" />
              <div class="d-flex align-items-center">
                <div class="avtar bg-brand-color-3 text-white me-3">
                  <i class="ph-duotone ph-currency-dollar f-26"></i>
                </div>
                <div>
                  <p class="text-muted mb-0">Total Amount Spent</p>
                  <div class="d-flex align-items-end">
                    @php
                        $currencyService = app(App\Services\CurrencyService::class);
                        $convertedPrice = $currencyService->convert($sum, 'USD', session('currency', 'USD'));
                        $currencySymbol = currencySymbol(session('currency', 'USD'));
                    @endphp
                    <h2 class="mb-0 f-w-500">{{ $currencySymbol }}{{ number_format($convertedPrice, 2) }}</h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5>All {{ $user->first_name }}'s Hotel Trips</h5>
              </div>
              <div class="card-body">
                <table id="res-config" class="display table table-striped table-hover dt-responsive nowrap" style="width: 100%">
                  <thead>
                    <tr>
                      <th>Type</th>
                      <th>Hotel</th>
                      <th>Cost</th>
                      <th>Check In</th>
                      <th>Check Out</th>
                      <th>Details</th>
                      <th>No of Rooms</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($bookings as $trip)
                        <tr>
                            <td>Hotel</td>
                            <td>{{ $trip->hotel }}</td>
                            <td class="cost" data-price="{{ $trip->cost }}">{{ formatPrice($trip->cost) }}</td>
                            <td>{{ \Carbon\Carbon::parse($trip->check_in)->format('d F, Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($trip->check_in)->format('d F, Y') }}</td>
                            <td>{{ $trip->details }}</td>
                            <td>{{ $trip->room_qty }}</td>
                            @if ($trip->status === "used")
                                <td><span class="badge text-bg-success">Used</span></td>
                            @elseif ($trip->status === "unused")
                                <td><span class="badge text-bg-warning">Unused</span></td>
                            @endif
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
</div>

<script>
    function convertAllPrices(selectedCurrency) {
        let tableRows = document.querySelectorAll('#res-config tbody tr');

        let prices = Array.from(tableRows).map(row => row.getAttribute('data-price'));

        fetch(`/convert-prices?currency=${selectedCurrency}&prices=${JSON.stringify(prices)}`)
            .then(response => response.json())
            .then(data => {
                tableRows.forEach((row, index) => {
                    let costCell = row.querySelector('td:nth-child(2)'); // Assuming the "Cost" column is the second column
                    costCell.textContent = `${data.currencySymbol} ${data.convertedPrices[index]}`;
                });
            });
    }
</script>

@include('admin.partials.footer')
