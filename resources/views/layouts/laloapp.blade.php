<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Landlord Dashboard')</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
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
            width: 250px;
        }

        .sidebar.collapsed {
            width: 70px;
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 12px 20px;
            margin: 5px 0;
            border-radius: 8px;
            transition: all 0.3s;
            white-space: nowrap;
            display: flex;
            align-items: center;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .sidebar .nav-link i {
            width: 25px;
            text-align: center;
            margin-right: 10px;
            transition: margin-right 0.3s;
        }

        .sidebar.collapsed .nav-link i {
            margin-right: 0;
        }

        .sidebar.collapsed .nav-link span {
            display: none;
        }

        /* Submenu Styles */
        .sidebar .nav-item.has-submenu .nav-link {
            justify-content: space-between;
        }

        .sidebar .nav-item.has-submenu .nav-link .submenu-toggle {
            transition: transform 0.3s;
            font-size: 0.8rem;
        }

        .sidebar .nav-item.has-submenu.expanded .nav-link .submenu-toggle {
            transform: rotate(90deg);
        }

        .sidebar .submenu {
            list-style: none;
            padding-left: 0;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 8px;
            margin: 5px 10px;
        }

        .sidebar .nav-item.has-submenu.expanded .submenu {
            max-height: 500px;
        }

        .sidebar .submenu .nav-link {
            padding: 10px 20px 10px 55px;
            font-size: 0.9rem;
            margin: 2px 0;
        }

        .sidebar.collapsed .submenu {
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

        /* Add other CSS styles from your original code */
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="position-sticky pt-3">
            <div class="sidebar-brand d-flex align-items-center justify-content-between mb-4 mt-3">
                <div class="d-flex align-items-center">
                    <i class="fas fa-home me-2 fs-4"></i>
                    <span class="fs-4 fw-bold">Land Lord</span>
                </div>
                <button class="sidebar-toggle" id="sidebarToggle">
                    <i class="fas fa-chevron-left"></i>
                </button>
            </div>

            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <!-- Properties Submenu -->
                <li class="nav-item has-submenu">
                    <a class="nav-link submenu-trigger" href="#">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-building"></i>
                            <span>Properties</span>
                        </div>
                        <i class="fas fa-chevron-right submenu-toggle"></i>
                    </a>
                    <ul class="submenu">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('properties') ? 'active' : '' }}" href="{{ route('property.index') }}">
                                <i class="fas fa-list"></i>
                                <span>All Properties</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('property.create')}}" >
                                <i class="fas fa-plus"></i>
                                <span>Add Property</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Add other menu items -->
                <!-- Properties Submenu -->
                <li class="nav-item has-submenu">
                    <a class="nav-link submenu-trigger" href="#">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-home"></i>
                            <span>unit</span>
                        </div>
                        <i class="fas fa-chevron-right submenu-toggle"></i>
                    </a>
                    <ul class="submenu">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('properties') ? 'active' : '' }}" href="{{ route('unit.index') }}">
                                <i class="fas fa-list"></i>
                                <span>All unit</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#addPropertyModal">
                                <i class="fas fa-plus"></i>
                                <span>Add Unit</span>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-door-open"></i>
                                <span>Vacant Units</span>
                            </a>
                        </li>
                    </ul>
                </li>

                    <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-users"></i>
                        <span>Tenants</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#paymentsModal">
                        <i class="fas fa-dollar-sign"></i>
                        <span>Payments</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-tools"></i>
                        <span>Maintenance</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#messagesModal">
                        <i class="fas fa-envelope"></i>
                        <span>Messages</span>
                        <span class="badge bg-warning ms-auto">3</span>
                    </a>
                </li>


                                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-bell"></i>
                        <span>Notifications</span>
                    </a>
                </li>

                  <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-chart-bar"></i>
                        <span>Reports</span>
                    </a>
                </li>

                 
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                </li>

                     <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-bell"></i>
                        <span>Notifications</span>
                    </a>
                </li>


                <!-- Add other menu items -->
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <!-- Top Navigation -->
        <nav class=" navbar navbar-expand-sm navbar-light bg-white shadow-sm mb-4 ">
            <div class="container-fluid">
                <button class="btn btn-outline-primary me-2 d-none d-lg-block" id="mobileSidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                
                <div class="d-flex align-items-center ms-auto">
                   
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
        </nav>

        <!-- Page Content -->
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Laravel layout loaded');

            // Sidebar toggle
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const mobileSidebarToggle = document.getElementById('mobileSidebarToggle');

            // Main sidebar toggle
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function() {
                    console.log('Sidebar toggle clicked');
                    sidebar.classList.toggle('collapsed');
                    mainContent.classList.toggle('sidebar-collapsed');
                    
                    // Update chevron icon
                    const icon = this.querySelector('i');
                    if (sidebar.classList.contains('collapsed')) {
                        icon.className = 'fas fa-chevron-right';
                    } else {
                        icon.className = 'fas fa-chevron-left';
                    }
                });
            }

            // Mobile sidebar toggle
            if (mobileSidebarToggle) {
                mobileSidebarToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('collapsed');
                    mainContent.classList.toggle('sidebar-collapsed');
                });
            }

            // Submenu functionality
            const submenuTriggers = document.querySelectorAll('.submenu-trigger');
            submenuTriggers.forEach(trigger => {
                trigger.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    const parentItem = this.parentElement;
                    const isExpanded = parentItem.classList.contains('expanded');
                    
                    // Close all other submenus
                    document.querySelectorAll('.has-submenu').forEach(item => {
                        if (item !== parentItem) {
                            item.classList.remove('expanded');
                        }
                    });
                    
                    // Toggle current submenu
                    parentItem.classList.toggle('expanded');
                });
            });

            // Close submenus when clicking outside
            document.addEventListener('click', function(e) {
                if (!e.target.closest('.has-submenu')) {
                    document.querySelectorAll('.has-submenu').forEach(item => {
                        item.classList.remove('expanded');
                    });
                }
            });
        });

        // Global function for any page-specific JavaScript
        window.initializeSidebar = function() {
            console.log('Sidebar initialized');
        };
    </script>

    @stack('scripts')
</body>
</html>