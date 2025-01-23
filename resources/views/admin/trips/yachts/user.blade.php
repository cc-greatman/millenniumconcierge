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
                <li class="breadcrumb-item"><a href="javascript: void(0)">Yacht Trips</a></li>
                <li class="breadcrumb-item" aria-current="page">Completed</li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">All {{ $user->first_name }}'s Yacht Trips</h2>
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
                    <h2 class="mb-0 f-w-500" id="price-display">{{ $currencySymbol }}{{ number_format($convertedPrice, 2) }}</h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5>All {{ $user->first_name }}'s Yacht Trips</h5>
              </div>
              <div class="card-body">
                <table id="res-config" class="display table table-striped table-hover dt-responsive nowrap" style="width: 100%">
                  <thead>
                    <tr>
                      <th>Type</th>
                      <th>Cost</th>
                      <th>Departure</th>
                      <th>Destination</th>
                      <th>No of Seats</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($trips as $trip)
                        <tr>
                            <td>
                                Yacht
                            </td>
                            <td data-price="{{ $trip->cost }}">{{ formatPrice($trip->cost) }}</td>
                            <td>{{ $trip->departure }}</td>
                            <td>{{ $trip->destination }}</td>
                            <td>{{ $trip->seats }}</td>
                            @if ($trip->status === "used")
                                <td><span class="badge text-bg-success">Completed</span></td>
                            @elseif ($trip->status === "unused")
                                <td><span class="badge text-bg-warning">Pending</span></td>
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

      let prices = [];

      // Collect all original prices from the table rows
      tableRows.forEach(row => {
          prices.push(row.getAttribute('data-price'));
      });

      // Send AJAX request to the backend to get the converted prices
      fetch(`/convert-prices?currency=${selectedCurrency}&prices=${JSON.stringify(prices)}`)
          .then(response => response.json())
          .then(data => {
              // Update the price displays in the table
              tableRows.forEach((row, index) => {
                  row.querySelector('.price-display').innerHTML = `${selectedCurrency} ${data.convertedPrices[index]}`;
              });
          });
  }
</script>

<script>
    function convertCurrency(selectedCurrency) {
        // Assuming the price you want to convert is stored in a variable or HTML element
        let price = 100; // Example price, you can dynamically update this

        // Make the AJAX call to convert the price
        fetch(`/convert-single-price?currency=${selectedCurrency}&price=${price}`)
            .then(response => response.json())
            .then(data => {
                // Update the price on the page
                document.getElementById('price-display').innerHTML = `Price: ${selectedCurrency} ${data.convertedPrice}`;
            });
    }
</script>

@include('admin.partials.footer')
