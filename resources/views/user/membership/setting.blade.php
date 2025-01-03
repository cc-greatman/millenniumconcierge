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
                    <li class="breadcrumb-item"><a href="javascript: void(0)">Membership</a></li>
                    <li class="breadcrumb-item" aria-current="page">Overview</li>
                </ul>
                </div>
                <div class="col-md-12">
                <div class="page-header-title">
                    <h2 class="mb-0">Membership Overview</h2>
                </div>
                </div>
            </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        @include('user.alerts.success')
        @include('user.alerts.error')


        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h5>Setting</h5>
                </div>
                <div class="card-body">
                <div class="card shadow-none border">
                    <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                        <div class="avtar avtar-l btn-light-secondary rounded-circle">
                            <img src="{{ asset("../backend/images/user/user.png") }}" alt="user-image" class="user-avtar" width="60px" style="border-radius: 100%;"/>
                        </div>
                        </div>
                        <div class="flex-grow-1 mx-3">
                        @php

                            $id = auth()->guard('web')->id();

                            $user= \App\Models\User::findOrFail($id);

                            $name = $user->first_name." ".$user->last_name;

                        @endphp
                        <h6 class="mb-0">{{ $name }}</h6>
                        <p class="mb-0">{{ $user->email }}</p>
                        </div>
                        <div class="flex-shrink-0">
                        <a class="btn btn-sm btn-light-secondary"><i class="ti ti-edit"></i></a>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6 col-xl-4">
                    <div class="card shadow-none border mb-0">
                        <div class="card-body">
                        <h6 class="mb-3 fw-medium">Membership Plan</h6>
                        <h4 class="mb-3 fw-normal text-muted">{{ $user->getMembershipType() }}</h4>
                        <a href="{{ route('membership.plans.view') }}" class="link-primary d-flex align-items-center gap-2"
                            >See more Plans <i class="ti ti-chevron-right"></i
                        ></a>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                    <div class="card shadow-none border mb-0">
                        <div class="card-body">
                        <h6 class="mb-3 fw-medium">Manage Membership</h6>
                        <p class="link-primary d-flex align-items-center gap-2"
                            >
                            @if($user->getMembershipType() === "Platinum Member")
                                <a href="{{ route('membership.plans.view') }}" class="link-primary">Downgrade</a><i data-feather="chevrons-down"></i>
                            @else
                                <a href="{{ route('membership.plans.view') }}" class="link-primary">Upgrade</a><i data-feather="chevrons-up"></i>
                            @endif
                            <a href="" class="link-danger">Cancel</a><i data-feather="x"></i
                        ></p>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-12 col-xl-4">
                    <div class="card shadow-none border mb-0">
                        <div class="card-body">
                        <h6 class="mb-3 fw-medium">Renewal Date</h6>
                        <h4 class="mb-3 fw-normal text-muted">{{ \Carbon\Carbon::parse($user->memberships->end_date)->format('d F, Y') }}</h4>
                        <a class="link-primary">
                            @php
                                $daysRemaining = \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($user->memberships->end_date), false);
                            @endphp
                            {{ $daysRemaining > 0 ? "$daysRemaining days till renewal" : "Membership expired" }}
                        </a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card shadow-none border mb-0 table-card">
                      <div class="card-header d-flex align-items-center justify-content-between py-3">
                        <h5 class="mb-0">Transaction History</h5>
                        <button class="btn btn-sm btn-link-primary">View All</button>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-hover" id="pc-dt-simple">
                            <thead>
                              <tr>
                                <th>Membership Type</th>
                                <th>Amount</th>
                                <th>Payment ID</th>
                                <th>Status</th>
                                <th>Date</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $payment)
                                <tr>
                                    <td>
                                      <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 ms-3">
                                          <h6 class="mb-0">
                                            @if($payment->membership_type ===  1)
                                                SILVER MEMBERSHIP
                                            @elseif($payment->membership_type ===  2)
                                                GOLD MEMBERSHIP
                                            @elseif($payment->membership_type ===  3)
                                                PLATINUM MEMBERSHIP
                                            @endif</h6>
                                        </div>
                                      </div>
                                    </td>
                                    <td>@if($payment->membership_type ===  1)&#8358;@else$@endif{{ number_format($payment->amount, 2) }}</td>
                                    <td>{{ $payment->payment_id }}</td>
                                    <td>{{ $payment->created_at->format('Y-m-d H:i') }}/td>
                                    @if ($payment->status === "completed")
                                    <td><span class="badge text-bg-success">Completed</span></td>
                                    @elseif ($payment->status === "pending")
                                    <td><span class="badge text-bg-warning">Pending</span></td>
                                    @elseif ($payment->status === "failed")
                                    <td><span class="badge text-bg-danger">Failed</span></td>
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
                </div>
            </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->

@include('user.partials.footer')
