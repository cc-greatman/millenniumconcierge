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
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.show') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page">Overview</li>
              </ul>
            </div>
            <div class="col-md-9">
              <div class="page-header-title">
                <h2 class="mb-0">Staff Dashboard</h2>
              </div>
            </div>
            <div class="col-md-3">
                <a href="https://millenniumconcierge.com/admin/manage/user/view" class="btn btn-primary"><i class="ti ti-pencil f-18"></i> Create a New Trip </a>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->

      <div class="row">
        <!-- [ Row 2 ] start -->
        <div class="col-sm-12 col-xl-12">
          <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
              <h5>Total Registered Users</h5>
            </div>
            <div class="card-body">
              <div class="d-flex align-items-end mb-3">
                <h4 class="mb-0">{{ $totalUsers }}</h4>
              </div>
              <p class="text-muted mb-0">Total Number of Registered Users</p>
            </div>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
              <h5>Total Silver Members</h5>
            </div>
            <div class="card-body">
              <div class="d-flex align-items-end mb-3">
                <h4 class="mb-0">{{ $totalSilverMembers }}</h4>
              </div>
              <p class="text-muted mb-0">Total Number of Sliver Members</p>
            </div>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
              <h5>Total Gold Members</h5>
            </div>
            <div class="card-body">
              <div class="d-flex align-items-end mb-3">
                <h4 class="mb-0">{{ $totalGoldMembers }}</h4>
              </div>
              <p class="text-muted mb-0">Total Number of Gold Members</p>
            </div>
          </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
              <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h5>Total Platinum Members</h5>
              </div>
              <div class="card-body">
                <div class="d-flex align-items-end mb-3">
                  <h4 class="mb-0">{{ $totalPlatinumMembers }}</h4>
                </div>
                <p class="text-muted mb-0">Total Number of Platinum Members</p>
              </div>
            </div>
        </div>
        <!-- [ Row 2 ] end -->
      </div>
    </div>
    <!-- [ Main Content ] end -->
</div>
<!-- [ Main Content ] end -->

@include('admin.partials.footer')
