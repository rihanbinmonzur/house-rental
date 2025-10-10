<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landlord Dashboard - Rental System</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --success: #4cc9f0;
            --info: #4895ef;
            --warning: #f72585;
            --light: #f8f9fa;
            --dark: #212529;
        }
        
        body {
            background-color: #f5f7fb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            transition: margin-left 0.3s ease;
        }
        
        .sidebar {
            background: linear-gradient(180deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            height: 100vh;
            position: fixed;
            box-shadow: 3px 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            transition: width 0.3s ease;
            overflow-x: hidden;
        }
        
        .sidebar.collapsed {
            width: 70px;
        }
        
        .sidebar.expanded {
            width: 250px;
        }
        
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 12px 20px;
            margin: 5px 0;
            border-radius: 8px;
            transition: all 0.3s;
            white-space: nowrap;
        }
        
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .sidebar .nav-link i {
            width: 25px;
            text-align: center;
            transition: margin-right 0.3s;
        }
        
        .sidebar.collapsed .nav-link i {
            margin-right: 0;
        }
        
        .sidebar.collapsed .nav-link span {
            display: none;
        }
        
        .sidebar.collapsed .sidebar-brand span {
            display: none;
        }
        
        .sidebar.collapsed .nav-link .badge {
            display: none;
        }
        
        .main-content {
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }
        
        .main-content.sidebar-collapsed {
            margin-left: 70px;
        }
        
        .navbar-custom {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .stat-card {
            border-radius: 12px;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-card .card-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }
        
        .bg-primary-light {
            background-color: rgba(67, 97, 238, 0.1);
            color: var(--primary);
        }
        
        .bg-success-light {
            background-color: rgba(76, 201, 240, 0.1);
            color: var(--success);
        }
        
        .bg-warning-light {
            background-color: rgba(247, 37, 133, 0.1);
            color: var(--warning);
        }
        
        .bg-info-light {
            background-color: rgba(72, 149, 239, 0.1);
            color: var(--info);
        }
        
        .dashboard-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            border: none;
            margin-bottom: 24px;
        }
        
        .dashboard-card .card-header {
            background-color: transparent;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 16px 20px;
        }
        
        .activity-item {
            padding: 12px 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .activity-item:last-child {
            border-bottom: none;
        }
        
        .badge-priority {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
        }
        
        .quick-action-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 15px 10px;
            border-radius: 10px;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
            text-decoration: none;
            color: var(--dark);
        }
        
        .quick-action-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            color: var(--primary);
        }
        
        .quick-action-btn i {
            font-size: 24px;
            margin-bottom: 8px;
        }
        
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: var(--warning);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        /* Property and Unit Styles */
        .property-card {
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
        }
        
        .property-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .property-image {
            height: 180px;
            background-size: cover;
            background-position: center;
        }
        
        .unit-status-occupied {
            background-color: #d4edda;
            color: #155724;
        }
        
        .unit-status-vacant {
            background-color: #cce7ff;
            color: #004085;
        }
        
        .unit-status-maintenance {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .property-actions {
            position: absolute;
            top: 15px;
            right: 15px;
            opacity: 0;
            transition: opacity 0.3s;
        }
        
        .property-card:hover .property-actions {
            opacity: 1;
        }
        
        /* Payment Voucher Styles */
        .voucher-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        
        .voucher-header {
            text-align: center;
            border-bottom: 2px solid #4361ee;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        
        .voucher-details {
            margin-bottom: 30px;
        }
        
        .voucher-table {
            width: 100%;
            margin-bottom: 30px;
        }
        
        .voucher-table th {
            background-color: #f8f9fa;
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }
        
        .voucher-table td {
            padding: 12px;
            border-bottom: 1px solid #dee2e6;
        }
        
        .voucher-total {
            background-color: #f8f9fa;
            font-weight: bold;
        }
        
        .voucher-footer {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px dashed #dee2e6;
        }
        
        /* Print Styles */
        @media print {
            body * {
                visibility: hidden;
            }
            .voucher-container, .voucher-container * {
                visibility: visible;
            }
            .voucher-container {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                box-shadow: none;
            }
            .no-print {
                display: none !important;
            }
        }

        /* Toggle Button */
        .sidebar-toggle {
            background: none;
            border: none;
            color: white;
            font-size: 1.2rem;
            cursor: pointer;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        
        .sidebar-toggle:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .sidebar-brand {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            transition: padding 0.3s;
        }
        
        .sidebar.collapsed .sidebar-brand {
            padding: 15px 10px;
            justify-content: center;
        }

        @media (max-width: 992px) {
            .sidebar {
                width: 70px;
                text-align: center;
            }
            
            .sidebar .nav-link span {
                display: none;
            }
            
            .sidebar .nav-link i {
                margin-right: 0;
            }
            
            .main-content {
                margin-left: 70px;
            }
            
            .sidebar-brand span {
                display: none;
            }
            
            .sidebar-toggle {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar col-md-2 col-lg-2 d-md-block expanded" id="sidebar">
        <div class="position-sticky pt-3">
            <div class="sidebar-brand d-flex align-items-center justify-content-between mb-4 mt-3">
                <div class="d-flex align-items-center">
                    <i class="fas fa-home me-2 fs-4"></i>
                    <span class="fs-4 fw-bold">RentalManager</span>
                </div>
                <button class="sidebar-toggle" id="sidebarToggle">
                    <i class="fas fa-chevron-left"></i>
                </button>
            </div>
            
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        <i class="fas fa-tachometer-alt me-2"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#propertiesModal">
                        <i class="fas fa-building me-2"></i>
                        <span>Properties</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-users me-2"></i>
                        <span>Tenants</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#paymentsModal">
                        <i class="fas fa-dollar-sign me-2"></i>
                        <span>Payments</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-tools me-2"></i>
                        <span>Maintenance</span>
                    </a>
                </li>
                <!-- New Messages Menu Item -->
                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#messagesModal">
                        <i class="fas fa-envelope me-2"></i>
                        <span>Messages</span>
                        <span class="badge bg-warning ms-2">3</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-bell me-2"></i>
                        <span>Notifications</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-chart-bar me-2"></i>
                        <span>Reports</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-cog me-2"></i>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <!-- Top Navigation -->
        <nav class="navbar navbar-custom navbar-expand-lg mb-4 rounded">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <button class="btn btn-outline-primary me-2 d-none d-lg-block" id="mobileSidebarToggle">
                                <i class="fas fa-bars"></i>
                            </button>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#propertiesModal">Properties</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tenants</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#paymentsModal">Payments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#messagesModal">Messages</a>
                        </li>
                    </ul>
                    
                    <div class="d-flex align-items-center">
                        <div class="dropdown me-3">
                            <a class="position-relative" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-bell fs-5 text-muted"></i>
                                <span class="notification-badge">3</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">New payment received</a></li>
                                <li><a class="dropdown-item" href="#">Maintenance request submitted</a></li>
                                <li><a class="dropdown-item" href="#">Lease expiration reminder</a></li>
                            </ul>
                        </div>
                        
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                                <img src="https://ui-avatars.com/api/?name=John+Doe&background=4361ee&color=fff" class="user-avatar me-2">
                                <span class="d-none d-md-inline">John Doe</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title text-muted mb-2">Total Properties</h5>
                                <h2 class="mb-0">12</h2>
                                <small class="text-success">
                                    <i class="fas fa-arrow-up me-1"></i>2 new this month
                                </small>
                            </div>
                            <div class="card-icon bg-primary-light">
                                <i class="fas fa-building"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title text-muted mb-2">Monthly Revenue</h5>
                                <h2 class="mb-0">$8,540</h2>
                                <small class="text-danger">
                                    <i class="fas fa-clock me-1"></i>$1,200 pending
                                </small>
                            </div>
                            <div class="card-icon bg-success-light">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title text-muted mb-2">Occupancy Rate</h5>
                                <h2 class="mb-0">92%</h2>
                                <small class="text-info">
                                    10 occupied / 2 vacant
                                </small>
                            </div>
                            <div class="card-icon bg-info-light">
                                <i class="fas fa-chart-line"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title text-muted mb-2">Unread Messages</h5>
                                <h2 class="mb-0">3</h2>
                                <small class="text-warning">
                                    <i class="fas fa-envelope me-1"></i>From tenants
                                </small>
                            </div>
                            <div class="card-icon bg-warning-light">
                                <i class="fas fa-comments"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="row">
            <!-- Left Column -->
            <div class="col-lg-8">
                <!-- Revenue Chart -->
                <div class="card dashboard-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Monthly Revenue</h5>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                Last 6 months
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Last 3 months</a></li>
                                <li><a class="dropdown-item" href="#">Last 6 months</a></li>
                                <li><a class="dropdown-item" href="#">This year</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="revenueChart" height="250"></canvas>
                    </div>
                </div>
                
                <!-- Recent Payments and Maintenance Row -->
                <div class="row">
                    <!-- Recent Payments -->
                    <div class="col-md-6">
                        <div class="card dashboard-card h-100">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Recent Payments</h5>
                                <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#paymentsModal">View All</a>
                            </div>
                            <div class="card-body">
                                <div class="list-group list-group-flush">
                                    <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-primary-light rounded p-2 me-3">
                                                <i class="fas fa-dollar-sign text-primary"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-1">Sarah Johnson</h6>
                                                <small class="text-muted">Sunset Villa • Oct 15, 2023</small>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <strong class="text-success">$1,200</strong>
                                            <span class="badge payment-status-paid rounded-pill ms-2">Paid</span>
                                        </div>
                                    </div>
                                    
                                    <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-primary-light rounded p-2 me-3">
                                                <i class="fas fa-dollar-sign text-primary"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-1">Mike Wilson</h6>
                                                <small class="text-muted">Garden Apartments • Oct 14, 2023</small>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <strong>$950</strong>
                                            <span class="badge payment-status-paid rounded-pill ms-2">Paid</span>
                                        </div>
                                    </div>
                                    
                                    <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-primary-light rounded p-2 me-3">
                                                <i class="fas fa-dollar-sign text-primary"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-1">Emma Davis</h6>
                                                <small class="text-muted">City View Loft • Oct 12, 2023</small>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <strong>$1,350</strong>
                                            <span class="badge payment-status-pending rounded-pill ms-2">Pending</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Recent Maintenance -->
                    <div class="col-md-6">
                        <div class="card dashboard-card h-100">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Recent Maintenance</h5>
                                <a href="#" class="btn btn-sm btn-primary">View All</a>
                            </div>
                            <div class="card-body">
                                <div class="list-group list-group-flush">
                                    <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-warning-light rounded p-2 me-3">
                                                <i class="fas fa-tools text-warning"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-1">Kitchen Sink Leak</h6>
                                                <small class="text-muted">Sarah Johnson • Sunset Villa</small>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <span class="badge maintenance-priority-urgent rounded-pill me-2">Urgent</span>
                                            <span class="badge maintenance-status-pending rounded-pill">Pending</span>
                                        </div>
                                    </div>
                                    
                                    <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-warning-light rounded p-2 me-3">
                                                <i class="fas fa-tools text-warning"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-1">AC Not Working</h6>
                                                <small class="text-muted">Mike Wilson • Garden Apartments</small>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <span class="badge maintenance-priority-high rounded-pill me-2">High</span>
                                            <span class="badge maintenance-status-in-progress rounded-pill">In Progress</span>
                                        </div>
                                    </div>
                                    
                                    <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-warning-light rounded p-2 me-3">
                                                <i class="fas fa-tools text-warning"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-1">Paint Touch-up</h6>
                                                <small class="text-muted">Emma Davis • City View Loft</small>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <span class="badge maintenance-priority-medium rounded-pill me-2">Medium</span>
                                            <span class="badge maintenance-status-completed rounded-pill">Completed</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- My Properties Preview -->
                <div class="card dashboard-card mt-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">My Properties</h5>
                        <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#propertiesModal">View All Properties</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="card property-card">
                                    <div class="property-image" style="background-image: url('https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80')"></div>
                                    <div class="card-body">
                                        <h5 class="card-title">Sunset Villa</h5>
                                        <p class="card-text text-muted">123 Main Street, San Francisco, CA</p>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>Units: 8</span>
                                            <span class="badge bg-success">92% Occupied</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <small class="text-muted">Monthly Revenue: $9,600</small>
                                        </div>
                                    </div>
                                    <div class="property-actions">
                                        <button class="btn btn-sm btn-light me-1"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-sm btn-light"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="card property-card">
                                    <div class="property-image" style="background-image: url('https://images.unsplash.com/photo-1513584684374-8bab748fbf90?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80')"></div>
                                    <div class="card-body">
                                        <h5 class="card-title">Garden Apartments</h5>
                                        <p class="card-text text-muted">456 Oak Avenue, San Francisco, CA</p>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>Units: 12</span>
                                            <span class="badge bg-success">83% Occupied</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <small class="text-muted">Monthly Revenue: $11,400</small>
                                        </div>
                                    </div>
                                    <div class="property-actions">
                                        <button class="btn btn-sm btn-light me-1"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-sm btn-light"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Column -->
            <div class="col-lg-4">
                <!-- Quick Actions -->
                <div class="card dashboard-card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Quick Actions</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-6">
                                <a href="#" class="quick-action-btn" data-bs-toggle="modal" data-bs-target="#addPropertyModal">
                                    <i class="fas fa-plus text-primary"></i>
                                    <span class="small">Add Property</span>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="quick-action-btn" data-bs-toggle="modal" data-bs-target="#newMessageModal">
                                    <i class="fas fa-envelope text-success"></i>
                                    <span class="small">New Message</span>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="quick-action-btn" data-bs-toggle="modal" data-bs-target="#createInvoiceModal">
                                    <i class="fas fa-file-invoice-dollar text-info"></i>
                                    <span class="small">Create Invoice</span>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="quick-action-btn">
                                    <i class="fas fa-tools text-warning"></i>
                                    <span class="small">Maintenance</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Upcoming Lease Expirations -->
                <div class="card dashboard-card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Lease Expirations</h5>
                        <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
                    </div>
                    <div class="card-body">
                        <div class="activity-item">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h6 class="mb-1">Sunset Villa</h6>
                                    <p class="mb-1 small text-muted">Sarah Johnson</p>
                                </div>
                                <span class="badge bg-warning">15 days</span>
                            </div>
                            <p class="small text-muted mb-0">Expires: Nov 15, 2023</p>
                        </div>
                        
                        <div class="activity-item">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h6 class="mb-1">Garden Apartments</h6>
                                    <p class="mb-1 small text-muted">Mike Wilson</p>
                                </div>
                                <span class="badge bg-warning">22 days</span>
                            </div>
                            <p class="small text-muted mb-0">Expires: Nov 22, 2023</p>
                        </div>

                        <div class="activity-item">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h6 class="mb-1">City View Loft</h6>
                                    <p class="mb-1 small text-muted">Emma Davis</p>
                                </div>
                                <span class="badge bg-warning">30 days</span>
                            </div>
                            <p class="small text-muted mb-0">Expires: Nov 30, 2023</p>
                        </div>
                    </div>
                </div>

                <!-- Payment Summary -->
                <div class="card dashboard-card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Payment Summary</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span>Total Received</span>
                            <strong class="text-success">$7,340</strong>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span>Pending Payments</span>
                            <strong class="text-warning">$1,350</strong>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span>Overdue</span>
                            <strong class="text-danger">$1,100</strong>
                        </div>
                        <div class="progress mb-2" style="height: 8px;">
                            <div class="progress-bar bg-success" style="width: 70%"></div>
                            <div class="progress-bar bg-warning" style="width: 15%"></div>
                            <div class="progress-bar bg-danger" style="width: 15%"></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <small class="text-muted">Paid: 70%</small>
                            <small class="text-muted">Pending: 15%</small>
                            <small class="text-muted">Overdue: 15%</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Properties Modal -->
    <div class="modal fade" id="propertiesModal" tabindex="-1" aria-labelledby="propertiesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="propertiesModalLabel">
                        <i class="fas fa-building me-2"></i>My Properties
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-between mb-4">
                        <div class="input-group w-50">
                            <input type="text" class="form-control" placeholder="Search properties...">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPropertyModal">
                            <i class="fas fa-plus me-1"></i>Add Property
                        </button>
                    </div>
                    
                    <div class="row">
                        <!-- Property Cards -->
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card property-card">
                                <div class="property-image" style="background-image: url('https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80')"></div>
                                <div class="card-body">
                                    <h5 class="card-title">Sunset Villa</h5>
                                    <p class="card-text text-muted">123 Main Street, San Francisco, CA</p>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Units: 8</span>
                                        <span class="badge bg-success">92% Occupied</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <small class="text-muted">Monthly Revenue: $9,600</small>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#propertyDetailsModal">View Details</button>
                                        <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#unitsModal">Manage Units</button>
                                    </div>
                                </div>
                                <div class="property-actions">
                                    <button class="btn btn-sm btn-light me-1"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-sm btn-light"><i class="fas fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card property-card">
                                <div class="property-image" style="background-image: url('https://images.unsplash.com/photo-1513584684374-8bab748fbf90?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80')"></div>
                                <div class="card-body">
                                    <h5 class="card-title">Garden Apartments</h5>
                                    <p class="card-text text-muted">456 Oak Avenue, San Francisco, CA</p>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Units: 12</span>
                                        <span class="badge bg-success">83% Occupied</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <small class="text-muted">Monthly Revenue: $11,400</small>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#propertyDetailsModal">View Details</button>
                                        <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#unitsModal">Manage Units</button>
                                    </div>
                                </div>
                                <div class="property-actions">
                                    <button class="btn btn-sm btn-light me-1"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-sm btn-light"><i class="fas fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card property-card">
                                <div class="property-image" style="background-image: url('https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80')"></div>
                                <div class="card-body">
                                    <h5 class="card-title">City View Loft</h5>
                                    <p class="card-text text-muted">789 Park Road, San Francisco, CA</p>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Units: 6</span>
                                        <span class="badge bg-success">100% Occupied</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <small class="text-muted">Monthly Revenue: $8,100</small>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#propertyDetailsModal">View Details</button>
                                        <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#unitsModal">Manage Units</button>
                                    </div>
                                </div>
                                <div class="property-actions">
                                    <button class="btn btn-sm btn-light me-1"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-sm btn-light"><i class="fas fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Units Modal -->
    <div class="modal fade" id="unitsModal" tabindex="-1" aria-labelledby="unitsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="unitsModalLabel">
                        <i class="fas fa-home me-2"></i>Units - Sunset Villa
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-between mb-4">
                        <h6>8 Units Total</h6>
                        <button class="btn btn-primary btn-sm">
                            <i class="fas fa-plus me-1"></i>Add Unit
                        </button>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Unit No.</th>
                                    <th>Type</th>
                                    <th>Bed/Bath</th>
                                    <th>Rent</th>
                                    <th>Status</th>
                                    <th>Tenant</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>101</td>
                                    <td>Apartment</td>
                                    <td>2/1</td>
                                    <td>$1,200</td>
                                    <td><span class="badge unit-status-occupied">Occupied</span></td>
                                    <td>Sarah Johnson</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">Edit</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>102</td>
                                    <td>Apartment</td>
                                    <td>1/1</td>
                                    <td>$950</td>
                                    <td><span class="badge unit-status-occupied">Occupied</span></td>
                                    <td>Mike Wilson</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">Edit</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>103</td>
                                    <td>Apartment</td>
                                    <td>3/2</td>
                                    <td>$1,500</td>
                                    <td><span class="badge unit-status-vacant">Vacant</span></td>
                                    <td>-</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">Edit</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>201</td>
                                    <td>Apartment</td>
                                    <td>2/2</td>
                                    <td>$1,350</td>
                                    <td><span class="badge unit-status-occupied">Occupied</span></td>
                                    <td>Emma Davis</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">Edit</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>202</td>
                                    <td>Apartment</td>
                                    <td>1/1</td>
                                    <td>$900</td>
                                    <td><span class="badge unit-status-maintenance">Maintenance</span></td>
                                    <td>-</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">Edit</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Payments Modal -->
    <div class="modal fade" id="paymentsModal" tabindex="-1" aria-labelledby="paymentsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentsModalLabel">
                        <i class="fas fa-dollar-sign me-2"></i>Payment Management
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs mb-4" id="paymentTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="all-payments-tab" data-bs-toggle="tab" data-bs-target="#all-payments" type="button" role="tab">All Payments</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="create-payment-tab" data-bs-toggle="tab" data-bs-target="#create-payment" type="button" role="tab">Create Payment</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="vouchers-tab" data-bs-toggle="tab" data-bs-target="#vouchers" type="button" role="tab">Payment Vouchers</button>
                        </li>
                    </ul>
                    
                    <div class="tab-content" id="paymentTabsContent">
                        <div class="tab-pane fade show active" id="all-payments" role="tabpanel">
                            <div class="d-flex justify-content-between mb-4">
                                <div class="input-group w-50">
                                    <input type="text" class="form-control" placeholder="Search payments...">
                                    <button class="btn btn-outline-secondary" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                                <div>
                                    <button class="btn btn-outline-primary me-2">Export</button>
                                    <button class="btn btn-primary" onclick="showVoucher()">Generate Voucher</button>
                                </div>
                            </div>
                            
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tenant</th>
                                            <th>Property</th>
                                            <th>Unit</th>
                                            <th>Amount</th>
                                            <th>Due Date</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>001</td>
                                            <td>Sarah Johnson</td>
                                            <td>Sunset Villa</td>
                                            <td>101</td>
                                            <td>$1,200</td>
                                            <td>Oct 15, 2023</td>
                                            <td><span class="badge payment-status-paid">Paid</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary" onclick="showVoucher()">View Voucher</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>002</td>
                                            <td>Mike Wilson</td>
                                            <td>Garden Apartments</td>
                                            <td>102</td>
                                            <td>$950</td>
                                            <td>Oct 14, 2023</td>
                                            <td><span class="badge payment-status-paid">Paid</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary" onclick="showVoucher()">View Voucher</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>003</td>
                                            <td>Emma Davis</td>
                                            <td>City View Loft</td>
                                            <td>201</td>
                                            <td>$1,350</td>
                                            <td>Oct 12, 2023</td>
                                            <td><span class="badge payment-status-pending">Pending</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary" onclick="showVoucher()">View Voucher</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="create-payment" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6">
                                    <form>
                                        <div class="mb-3">
                                            <label for="tenantSelect" class="form-label">Tenant</label>
                                            <select class="form-select" id="tenantSelect">
                                                <option selected>Select a tenant...</option>
                                                <option value="1">Sarah Johnson (Sunset Villa - Unit 101)</option>
                                                <option value="2">Mike Wilson (Garden Apartments - Unit 102)</option>
                                                <option value="3">Emma Davis (City View Loft - Unit 201)</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="paymentAmount" class="form-label">Amount</label>
                                            <div class="input-group">
                                                <span class="input-group-text">$</span>
                                                <input type="number" class="form-control" id="paymentAmount" placeholder="0.00">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="paymentDate" class="form-label">Payment Date</label>
                                            <input type="date" class="form-control" id="paymentDate">
                                        </div>
                                        <div class="mb-3">
                                            <label for="paymentMethod" class="form-label">Payment Method</label>
                                            <select class="form-select" id="paymentMethod">
                                                <option selected>Select payment method...</option>
                                                <option value="bank">Bank Transfer</option>
                                                <option value="cash">Cash</option>
                                                <option value="check">Check</option>
                                                <option value="card">Credit/Debit Card</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="paymentNotes" class="form-label">Notes</label>
                                            <textarea class="form-control" id="paymentNotes" rows="3"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Record Payment</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="vouchers" role="tabpanel">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="voucher-container" id="voucherPrint">
                                        <div class="voucher-header">
                                            <h2>Rental Payment Voucher</h2>
                                            <p class="text-muted">Voucher #: <strong>PV-2023-001</strong></p>
                                        </div>
                                        
                                        <div class="voucher-details">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h5>Tenant Information</h5>
                                                    <p><strong>Name:</strong> Sarah Johnson</p>
                                                    <p><strong>Property:</strong> Sunset Villa</p>
                                                    <p><strong>Unit:</strong> 101</p>
                                                    <p><strong>Contact:</strong> (555) 123-4567</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <h5>Payment Details</h5>
                                                    <p><strong>Voucher Date:</strong> October 15, 2023</p>
                                                    <p><strong>Payment Date:</strong> October 15, 2023</p>
                                                    <p><strong>Due Date:</strong> October 15, 2023</p>
                                                    <p><strong>Payment Method:</strong> Bank Transfer</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <table class="voucher-table">
                                            <thead>
                                                <tr>
                                                    <th>Description</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Monthly Rent (October 2023)</td>
                                                    <td>$1,200.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Late Fee</td>
                                                    <td>$0.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Utilities</td>
                                                    <td>$0.00</td>
                                                </tr>
                                                <tr class="voucher-total">
                                                    <td><strong>Total Amount</strong></td>
                                                    <td><strong>$1,200.00</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        
                                        <div class="voucher-footer">
                                            <p>Thank you for your payment!</p>
                                            <p class="text-muted">This is an computer-generated voucher. No signature is required.</p>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4 no-print">
                                        <button class="btn btn-primary me-2" onclick="window.print()">
                                            <i class="fas fa-print me-1"></i>Print Voucher
                                        </button>
                                        <button class="btn btn-outline-primary">
                                            <i class="fas fa-download me-1"></i>Download PDF
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Property Modal -->
    <div class="modal fade" id="addPropertyModal" tabindex="-1" aria-labelledby="addPropertyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPropertyModalLabel">
                        <i class="fas fa-plus me-2"></i>Add New Property
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="propertyName" class="form-label">Property Name</label>
                                <input type="text" class="form-control" id="propertyName" placeholder="Enter property name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="propertyType" class="form-label">Property Type</label>
                                <select class="form-select" id="propertyType">
                                    <option selected>Select property type...</option>
                                    <option value="apartment">Apartment Building</option>
                                    <option value="house">Single Family Home</option>
                                    <option value="condo">Condominium</option>
                                    <option value="townhouse">Townhouse</option>
                                    <option value="commercial">Commercial Property</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="propertyAddress" class="form-label">Address</label>
                            <input type="text" class="form-control" id="propertyAddress" placeholder="Enter full address">
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="totalUnits" class="form-label">Total Units</label>
                                <input type="number" class="form-control" id="totalUnits" placeholder="0">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="propertySize" class="form-label">Property Size (sq ft)</label>
                                <input type="number" class="form-control" id="propertySize" placeholder="0">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="yearBuilt" class="form-label">Year Built</label>
                                <input type="number" class="form-control" id="yearBuilt" placeholder="YYYY">
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="propertyDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="propertyDescription" rows="3"></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="propertyImage" class="form-label">Property Image</label>
                            <input type="file" class="form-control" id="propertyImage">
                        </div>
                        
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Add Property</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Revenue Chart
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        const revenueChart = new Chart(revenueCtx, {
            type: 'line',
            data: {
                labels: ['May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
                datasets: [{
                    label: 'Monthly Revenue',
                    data: [7200, 8100, 7800, 8300, 8600, 8540],
                    borderColor: '#4361ee',
                    backgroundColor: 'rgba(67, 97, 238, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#4361ee',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 5
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        grid: {
                            drawBorder: false
                        },
                        ticks: {
                            callback: function(value) {
                                return '$' + value;
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

        // Sidebar toggle functionality
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const mobileSidebarToggle = document.getElementById('mobileSidebarToggle');
        
        function toggleSidebar() {
            if (sidebar.classList.contains('expanded')) {
                sidebar.classList.remove('expanded');
                sidebar.classList.add('collapsed');
                mainContent.classList.add('sidebar-collapsed');
                sidebarToggle.innerHTML = '<i class="fas fa-chevron-right"></i>';
            } else {
                sidebar.classList.remove('collapsed');
                sidebar.classList.add('expanded');
                mainContent.classList.remove('sidebar-collapsed');
                sidebarToggle.innerHTML = '<i class="fas fa-chevron-left"></i>';
            }
        }
        
        sidebarToggle.addEventListener('click', toggleSidebar);
        
        if (mobileSidebarToggle) {
            mobileSidebarToggle.addEventListener('click', toggleSidebar);
        }

        // Show voucher function
        function showVoucher() {
            const voucherTab = document.getElementById('vouchers-tab');
            const paymentTabs = new bootstrap.Tab(voucherTab);
            paymentTabs.show();
        }

        // Auto-scroll to bottom of messages
        function scrollToBottom() {
            const messageContainer = document.getElementById('chatMessages');
            if (messageContainer) {
                messageContainer.scrollTop = messageContainer.scrollHeight;
            }
        }

        // Initialize scroll on page load
        document.addEventListener('DOMContentLoaded', function() {
            scrollToBottom();
        });
    </script>
</body>
</html>