<!DOCTYPE html>
<html>
<head>
    <title>{{ $user->first_name }}'s Monthly Hotel Trips</title>

    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- [Google Font : Public Sans] icon -->
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet">

    <!-- [phosphor Icons] https://phosphoricons.com/ -->
    <link rel="stylesheet" href="https://millenniumconcierge.com/../backend/fonts/phosphor/duotone/style.css?v={{ time() }}">
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="https://millenniumconcierge.com/../backend/fonts/tabler-icons.min.css?v={{ time() }}">

    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="https://millenniumconcierge.com/../backend/fonts/feather.css?v={{ time() }}">

    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="https://millenniumconcierge.com/../backend/fonts/fontawesome.css?v={{ time() }}">

    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="https://millenniumconcierge.com/../backend/fonts/material.css?v={{ time() }}">

    <!-- [Remix Icons] https://remixicon.com -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="https://millenniumconcierge.com/../frontend/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://millenniumconcierge.com/../frontend/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://millenniumconcierge.com/../frontend/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="https://millenniumconcierge.com/img/favicon/site.webmanifest"><link rel="preconnect" href="https://fonts.googleapis.com">

    <!-- Google Fonts(Raleway & Libre) -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Display&amp;family=Outfit:wght@300;400&amp;display=swap">

    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="https://millenniumconcierge.com/../backend/css/style.css?v={{ time() }}" id="main-style-link">
    <link rel="stylesheet" href="https://millenniumconcierge.com/../backend/css/style-preset.css?v={{ time() }}">
</head>
<body>
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
                    <h2 class="mb-0 f-w-500">${{ number_format($sum, 2) }}</h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5>All Pending Bookings</h5>
              </div>
              <div class="card-body">
                <table id="res-config" class="display table table-striped table-hover dt-responsive nowrap" style="width: 100%">
                  <thead>
                    <tr>
                      <th>User</th>
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
                    @if($bookings->isEmpty())
                        <tr>
                            <td colspan="8" style="text-align: center;">No Hotel Trips created for you yet</td>
                        </tr>
                    @else
                        @foreach ($bookings as $trip)
                            <tr>
                                <td>{{ $trip->user->first_name }} {{ $trip->user->last_name }}</td>
                                <td>{{ $trip->hotel }}</td>
                                <td class="cost" data-price="{{ $trip->cost }}">${{ number_format($trip->cost, 2) }}</td>
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
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>
      <!-- [ Main Content ] end -->

</body>
</html>
