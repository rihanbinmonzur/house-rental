@extends('layouts.app')
@section('pageTitle', 'Dashboard')
@section('content')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white mt-3 rounded shadow-sm">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-nav ms-auto">
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown">
                            <img src="https://ui-avatars.com/api/?name=Admin&background=4e73df&color=fff"
                                class="rounded-circle me-2" width="32" height="32">
                            <span>Super Admin</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-danger" href="#"><i
                                        class="fas fa-sign-out-alt me-2"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mt-4 mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard Overview</h1>
            <button class="d-none d-sm-inline-block btn btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
            </button>
        </div>

        <!-- Statistics Cards -->
        <div class="row">
            <!-- Total Properties -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stat-card card-primary h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Properties</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalProperties">367
                                </div>
                                <div class="mt-2 text-success">
                                    <small><i class="fas fa-arrow-up me-1"></i> 12% increase</small>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-home stat-icon text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Landlords -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stat-card card-success h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Landlords</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalLandlords">145
                                </div>
                                <div class="mt-2 text-success">
                                    <small><i class="fas fa-arrow-up me-1"></i> 8 new this month</small>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-tie stat-icon text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Tenants -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stat-card card-info h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Total Tenants</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalTenants">892
                                </div>
                                <div class="mt-2 text-success">
                                    <small><i class="fas fa-arrow-up me-1"></i> 45 new this month</small>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users stat-icon text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Approvals -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stat-card card-warning h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Pending Approvals</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="pendingApprovals">12
                                </div>
                                <div class="mt-2 text-warning">
                                    <small>Need immediate attention</small>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clock stat-icon text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions & Recent Activity -->
        <div class="row">
            <!-- Quick Actions -->
            <div class="col-lg-6 mb-4">
                <div class="card shadow h-100">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Quick Actions</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <a href="#" class="quick-action-btn" style="background: var(--primary);">
                                    <i class="fas fa-home fa-2x mb-2"></i><br>
                                    View All Posts<br>
                                    <small>367 Properties</small>
                                </a>
                            </div>
                            <div class="col-md-6 mb-3">
                                <a href="#" class="quick-action-btn" style="background: var(--warning);">
                                    <i class="fas fa-flag fa-2x mb-2"></i><br>
                                    Reported Listings<br>
                                    <small>3 Needs Review</small>
                                </a>
                            </div>
                            <div class="col-md-6 mb-3">
                                <a href="#" class="quick-action-btn" style="background: var(--info);">
                                    <i class="fas fa-user-clock fa-2x mb-2"></i><br>
                                    Pending Approvals<br>
                                    <small>12 Landlords</small>
                                </a>
                            </div>
                            <div class="col-md-6 mb-3">
                                <a href="#" class="quick-action-btn" style="background: var(--danger);">
                                    <i class="fas fa-ban fa-2x mb-2"></i><br>
                                    Banned Users<br>
                                    <small>7 Accounts</small>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="col-lg-6 mb-4">
                <div class="card shadow h-100">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">Recent Activity</h6>
                        <span class="badge bg-primary">Live</span>
                    </div>
                    <div class="card-body recent-activity">
                        <div class="activity-item new">
                            <div class="d-flex justify-content-between">
                                <strong>New Property Listed</strong>
                                <small class="text-muted">2 min ago</small>
                            </div>
                            <p class="mb-0">"Luxury Apartment Downtown" by John Doe</p>
                            <small class="text-primary">Needs approval</small>
                        </div>

                        <div class="activity-item warning">
                            <div class="d-flex justify-content-between">
                                <strong>Property Reported</strong>
                                <small class="text-muted">15 min ago</small>
                            </div>
                            <p class="mb-0">"Beach House Malibu" reported for fake images</p>
                            <small class="text-warning">3 reports received</small>
                        </div>

                        <div class="activity-item">
                            <div class="d-flex justify-content-between">
                                <strong>New Landlord Registered</strong>
                                <small class="text-muted">1 hour ago</small>
                            </div>
                            <p class="mb-0">Sarah Johnson signed up as landlord</p>
                            <small class="text-info">Pending verification</small>
                        </div>

                        <div class="activity-item danger">
                            <div class="d-flex justify-content-between">
                                <strong>User Banned</strong>
                                <small class="text-muted">2 hours ago</small>
                            </div>
                            <p class="mb-0">Mike Smith banned for multiple violations</p>
                            <small class="text-danger">Permanent ban</small>
                        </div>

                        <div class="activity-item">
                            <div class="d-flex justify-content-between">
                                <strong>Rent Payment Processed</strong>
                                <small class="text-muted">3 hours ago</small>
                            </div>
                            <p class="mb-0">$1,200 payment for "Garden Apartment"</p>
                            <small class="text-success">Successful</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Stats -->
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card bg-danger text-white shadow">
                    <div class="card-body">
                        <div class="text-white-50 small">Banned Users</div>
                        <div class="mb-0 h4" id="bannedUsers">7</div>
                        <i class="fas fa-ban fa-2x text-white-300 float-end"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card bg-warning text-white shadow">
                    <div class="card-body">
                        <div class="text-white-50 small">Reported Listings</div>
                        <div class="mb-0 h4" id="reportedListings">3</div>
                        <i class="fas fa-flag fa-2x text-white-300 float-end"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card bg-info text-white shadow">
                    <div class="card-body">
                        <div class="text-white-50 small">Active Today</div>
                        <div class="mb-0 h4" id="activeToday">89</div>
                        <i class="fas fa-user-check fa-2x text-white-300 float-end"></i>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
