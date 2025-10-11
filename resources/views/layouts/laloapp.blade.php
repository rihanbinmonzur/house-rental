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

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
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

            .voucher-container,
            .voucher-container * {
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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent">
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
                            <a class="nav-link" href="#" data-bs-toggle="modal"
                                data-bs-target="#propertiesModal">Properties</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tenants</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal"
                                data-bs-target="#paymentsModal">Payments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal"
                                data-bs-target="#messagesModal">Messages</a>
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
                            <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle"
                                data-bs-toggle="dropdown">
                                <img src="https://ui-avatars.com/api/?name=John+Doe&background=4361ee&color=fff"
                                    class="user-avatar me-2">
                                <span class="d-none d-md-inline">John Doe</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>




        @yield('content')





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
