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
                <li class="breadcrumb-item"><a href="javascript: void(0)">User</a></li>
                <li class="breadcrumb-item" aria-current="page">Overview</li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Manage Users</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->


      <!-- [ Main Content ] start -->
      <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="card border-0 table-card user-profile-list">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover" id="pc-dt-simple">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Member Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>
                                <div class="d-inline-block align-middle">
                                    <div class="d-inline-block">
                                        <h6 class="m-b-0"><a href="{{ route('admin.manage.user.report.view', $user->id) }}" style="color: #bfbfbf;">{{ $user->first_name }} {{ $user->last_name }}</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td><a href="{{ route('admin.manage.user.report.view', $user->id) }}" style="color: #bfbfbf;">{{ $user->email }}</a></td>
                            <td><a href="{{ route('admin.manage.user.report.view', $user->id) }}" style="color: #bfbfbf;">{{ $user->phone }}</a></td>
                            <td><a href="{{ route('admin.manage.user.report.view', $user->id) }}" style="color: #bfbfbf;">{{ $user->getMembershipType() }}</a></td>
                            <td>
                                <span class="badge bg-light-success">Active</span>
                                <div class="overlay-edit">
                                  <ul class="list-inline mb-0">
                                    <li class="list-inline-item m-0"
                                      ><a href="{{ route('admin.manage.person.view', $user->id) }}" class="avtar avtar-s btn btn-primary"><i class="ti ti-pencil f-18"></i></a
                                    ></li>
                                    <li class="list-inline-item m-0"><a href="{{ route('admin.manage.user.delete', $user->id) }}" onclick="return confirm('This action cannot be undone')" class="avtar avtar-s btn bg-white btn-link-danger"><i class="ti ti-trash f-18"></i></a
                                    ></li>
                                  </ul>
                                </div>
                              </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- [ sample-page ] end -->
      </div>
      <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->

<!-- [Page Specific JS] start -->
<script src="{{ asset("../backend/js/plugins/simple-datatables.js") }}"></script>
<script>
  const dataTable = new simpleDatatables.DataTable('#pc-dt-simple', {
    sortable: false,
    perPage: 5
  });
</script>
<!-- [Page Specific JS] end -->

@include('admin.partials.footer')
