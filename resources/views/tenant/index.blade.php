<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenant Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .dashboard-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            border-radius: 15px;
            margin-bottom: 20px;
        }
        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        .profile-img-lg {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border: 4px solid #007bff;
        }
        .stat-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px;
        }
        .info-item {
            border-bottom: 1px solid #eee;
            padding: 10px 0;
        }
        .info-item:last-child {
            border-bottom: none;
        }
        .badge-gov { background: #28a745; }
        .badge-self { background: #ffc107; color: black; }
        .badge-student { background: #17a2b8; }
        .badge-unemployed { background: #6c757d; }
        .badge-prijob { background: #007bff; }
    </style>
</head>
<body class="bg-light">
    <div class="container-fluid">
        <!-- Header -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <i class="fas fa-home me-2"></i>Tenant Portal
                </a>
                <div class="navbar-nav ms-auto">
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-1"></i> John Doe
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container mt-4">
            <!-- Dashboard Stats -->
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card stat-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>1</h4>
                                    <p class="mb-0">Current Lease</p>
                                </div>
                                <i class="fas fa-file-contract fa-2x opacity-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card stat-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>$1,200</h4>
                                    <p class="mb-0">Monthly Rent</p>
                                </div>
                                <i class="fas fa-money-bill-wave fa-2x opacity-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card stat-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>5</h4>
                                    <p class="mb-0">Days to Due</p>
                                </div>
                                <i class="fas fa-calendar-day fa-2x opacity-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card stat-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>2</h4>
                                    <p class="mb-0">Maintenance</p>
                                </div>
                                <i class="fas fa-tools fa-2x opacity-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Left Column - Profile Information -->
                 @forelse ($data as $d )
                <div class="col-lg-4">
                    <!-- Profile Card -->
                    <div class="card dashboard-card">
                        <div class="card-body text-center">
                            <img src="https://via.placeholder.com/120/007bff/fff" alt="Profile" class="profile-img-lg rounded-circle mb-3">
                            <h4 class="card-title">{{$d->name}}</h4>
                            <span class="badge bg-success">Active Tenant</span>
                            
                            <div class="mt-3">
                                <button class="btn btn-outline-primary btn-sm me-2">
                                    <i class="fas fa-edit me-1"></i> Edit Profile
                                </button>
                                <button class="btn btn-outline-secondary btn-sm">
                                    <i class="fas fa-camera me-1"></i> Change Photo
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="card dashboard-card">
                        <div class="card-header bg-white">
                            <h6 class="card-title mb-0">
                                <i class="fas fa-bolt me-2"></i>Quick Actions
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <button class="btn btn-outline-primary text-start">
                                    <i class="fas fa-file-invoice-dollar me-2"></i> Pay Rent
                                </button>
                                <button class="btn btn-outline-warning text-start">
                                    <i class="fas fa-tools me-2"></i> Maintenance Request
                                </button>
                                <button class="btn btn-outline-info text-start">
                                    <i class="fas fa-file-contract me-2"></i> View Lease
                                </button>
                                <button class="btn btn-outline-success text-start">
                                    <i class="fas fa-envelope me-2"></i> Contact Landlord
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Detailed Information -->
                <div class="col-lg-8">
                    <!-- Personal Information -->
                    <div class="card dashboard-card">
                        <div class="card-header bg-white">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-user me-2"></i>Personal Information
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <strong><i class="fas fa-id-card me-2 text-muted"></i>Full Name</strong>
                                        <p class="mb-0">John Doe</p>
                                    </div>
                                    <div class="info-item">
                                        <strong><i class="fas fa-envelope me-2 text-muted"></i>Email</strong>
                                        <p class="mb-0">{{$d->email}}</p>
                                    </div>
                                    <div class="info-item">
                                        <strong><i class="fas fa-phone me-2 text-muted"></i>Phone</strong>
                                        <p class="mb-0">+1 {{$d->phone}}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <strong><i class="fas fa-fingerprint me-2 text-muted"></i>NID Number</strong>
                                        <p class="mb-0">{{$d->nid}}</p>
                                    </div>
                                    <div class="info-item">
                                        <strong><i class="fas fa-briefcase me-2 text-muted"></i>Employment Status</strong>
                                        <span class="badge badge-prijob">{{$d->employment_status}}</span>
                                    </div>
                                    <div class="info-item">
                                        <strong><i class="fas fa-user-check me-2 text-muted"></i>Account Status</strong>
                                        <span class="badge bg-success">{{$d->status}}</span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Address -->
                            <div class="info-item mt-3">
                                <strong><i class="fas fa-map-marker-alt me-2 text-muted"></i>Address</strong>
                                <p class="mb-0">{{$d->address}}</p>
                            </div>
                        </div>
                    </div>
                                            @empty
                                            <tr>
                                                <td>no data</td>
                                            </tr>
                                            @endforelse

                    <!-- Current Lease Information -->
                    <div class="card dashboard-card">
                        <div class="card-header bg-white">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-home me-2"></i>Current Lease
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <strong>Property</strong>
                                        <p class="mb-0">Sunrise Apartments - Unit 4B</p>
                                    </div>
                                    <div class="info-item">
                                        <strong>Lease Period</strong>
                                        <p class="mb-0">Jan 1, 2024 - Dec 31, 2024</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <strong>Monthly Rent</strong>
                                        <p class="mb-0">$1,200.00</p>
                                    </div>
                                    <div class="info-item">
                                        <strong>Security Deposit</strong>
                                        <p class="mb-0">$1,200.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="card dashboard-card">
                        <div class="card-header bg-white">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-history me-2"></i>Recent Activity
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        Rent Payment - October 2024
                                    </div>
                                    <small class="text-muted">2 days ago</small>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="fas fa-tools text-warning me-2"></i>
                                        Maintenance Request #MR-001
                                    </div>
                                    <small class="text-muted">1 week ago</small>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="fas fa-file-contract text-info me-2"></i>
                                        Lease Agreement Signed
                                    </div>
                                    <small class="text-muted">3 months ago</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>