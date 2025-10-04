<!DOCTYPE html>
<html lang="en" class="fixed sidebar-left-collapsed">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Management @yield('pageTitle')</title>
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
            --danger: #e63946;
            --sidebar-width: 250px;
            --sidebar-collapsed-width: 70px;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }
        
        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background-color: #2c3e50;
            transition: all 0.3s ease;
            z-index: 1000;
            overflow-y: auto;
        }
        
        .sidebar.collapsed {
            width: var(--sidebar-collapsed-width);
        }
        
        .sidebar-header {
            padding: 20px;
            background-color: #1a252f;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .sidebar-logo {
            display: flex;
            align-items: center;
            color: white;
            text-decoration: none;
        }
        
        .sidebar-logo i {
            font-size: 24px;
            margin-right: 10px;
            color: var(--primary);
        }
        
        .sidebar-logo span {
            font-weight: bold;
            font-size: 18px;
            transition: opacity 0.3s;
            white-space: nowrap;
        }
        
        .sidebar.collapsed .sidebar-logo span {
            opacity: 0;
            visibility: hidden;
        }
        
        .sidebar-toggle {
            background: none;
            border: none;
            color: white;
            font-size: 18px;
            cursor: pointer;
            z-index: 10;
            position: relative;
            flex-shrink: 0;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .sidebar-menu {
            padding: 20px 0;
        }
        
        .sidebar-item {
            padding: 12px 20px;
            color: #bdc3c7;
            display: flex;
            align-items: center;
            text-decoration: none;
            transition: all 0.2s;
            position: relative;
        }
        
        .sidebar-item:hover {
            background-color: #34495e;
            color: white;
        }
        
        .sidebar-item.active {
            background-color: var(--primary);
            color: white;
        }
        
        .sidebar-item.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 4px;
            background-color: white;
        }
        
        .sidebar-item i {
            margin-right: 15px;
            font-size: 18px;
            width: 20px;
            text-align: center;
            flex-shrink: 0;
        }
        
        .sidebar-item span {
            transition: opacity 0.3s;
            white-space: nowrap;
        }
        
        .sidebar.collapsed .sidebar-item span {
            opacity: 0;
            visibility: hidden;
        }
        
        .sidebar.collapsed .sidebar-item {
            justify-content: center;
        }
        
        .sidebar.collapsed .sidebar-item i {
            margin-right: 0;
        }
        
        .sidebar-divider {
            height: 1px;
            background-color: #34495e;
            margin: 15px 20px;
        }
        
        /* Main Content Styles */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 20px;
            transition: margin-left 0.3s ease;
            min-height: 100vh;
        }
        
        .main-content.expanded {
            margin-left: var(--sidebar-collapsed-width);
        }
        
        /* Mobile Responsive */
        .mobile-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1001;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            font-size: 18px;
            cursor: pointer;
        }
        
        /* Sidebar Toggle Button (visible when sidebar is collapsed) */
        .sidebar-expand-btn {
            position: fixed;
            top: 20px;
            left: 85px;
            z-index: 999;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px;
            font-size: 18px;
            cursor: pointer;
            display: none;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        
        .sidebar-expand-btn.show {
            display: block;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .sidebar.collapsed {
                width: var(--sidebar-width);
                transform: translateX(-100%);
            }
            
            .sidebar.collapsed.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .main-content.expanded {
                margin-left: 0;
            }
            
            .mobile-toggle {
                display: block;
            }
            
            .sidebar-expand-btn {
                display: none !important;
            }
        }
        
        /* Property Card Styles */
        .property-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s;
            overflow: hidden;
        }
        
        .property-card:hover {
            transform: translateY(-5px);
        }
        
        .property-image {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }
        
        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 500;
            font-size: 0.8rem;
        }
        
        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            border-left: 4px solid var(--primary);
        }
        
        .chart-container {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            height: 100%;
        }
        
        .progress-bar-custom {
            height: 8px;
            border-radius: 10px;
        }
        
        .feature-badge {
            background: #e9ecef;
            color: #495057;
            padding: 0.3rem 0.6rem;
            border-radius: 15px;
            font-size: 0.75rem;
            margin: 0.2rem;
        }
        
        .table-hover tbody tr:hover {
            background-color: rgba(67, 97, 238, 0.05);
        }
        
        .occupancy-chart {
            position: relative;
            height: 120px;
        }
        
        .property-actions .btn {
            margin: 0.1rem;
        }
        
        /* Advanced Search Filter Styles */
        .filter-container {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }
        
        .filter-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .filter-toggle {
            background: none;
            border: none;
            color: var(--primary);
            font-weight: 500;
            cursor: pointer;
        }
        
        .filter-content {
            display: block;
        }
        
        .filter-content.collapsed {
            display: none;
        }
        
        .filter-group {
            margin-bottom: 15px;
        }
        
        .filter-group label {
            font-weight: 500;
            margin-bottom: 5px;
            display: block;
        }
        
        .price-range {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .price-range input {
            flex: 1;
        }
        
        .date-range {
            display: flex;
            gap: 10px;
        }
        
        .date-range input {
            flex: 1;
        }
        
        .filter-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }
    </style>

     @stack('styles')
     
</head>
<body class="bg-light">
    <!-- Mobile Toggle Button -->
    <button class="mobile-toggle" id="mobileToggle">
        <i class="fas fa-bars"></i>
    </button>
    
    <!-- Sidebar Expand Button (visible when sidebar is collapsed) -->
    <button class="sidebar-expand-btn" id="sidebarExpandBtn">
        <i class="fas fa-angle-right"></i>
    </button>
    
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <a href="#" class="sidebar-logo">
                <i class="fas fa-building"></i>
                <span>PropertyHub</span>
            </a>
            <button class="sidebar-toggle" id="sidebarToggle">
                <i class="fas fa-angle-left"></i>
            </button>
        </div>
        
        <div class="sidebar-menu">
            <a href="{{route('property.index')}}" class="sidebar-item active">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>

            <ul>
                <span>properties</span>
                <li>
                 <a href="{{route('property.create')}}" class="sidebar-item">
                <i class="fas fa-building"></i>
                <span>add new property</span>
            </a></li>
            </ul>
           
            <a href="#" class="sidebar-item">
                <i class="fas fa-home"></i>
                <span>Units</span>
            </a>
            <a href="#" class="sidebar-item">
                <i class="fas fa-users"></i>
                <span>Tenants</span>
            </a>
            <a href="#" class="sidebar-item">
                <i class="fas fa-tools"></i>
                <span>Maintenance</span>
            </a>
            <a href="#" class="sidebar-item">
                <i class="fas fa-file-invoice-dollar"></i>
                <span>Payments</span>
            </a>
            
            <div class="sidebar-divider"></div>
            
            <a href="#" class="sidebar-item">
                <i class="fas fa-chart-bar"></i>
                <span>Reports</span>
            </a>
            <a href="#" class="sidebar-item">
                <i class="fas fa-calendar-alt"></i>
                <span>Calendar</span>
            </a>
            <a href="#" class="sidebar-item">
                <i class="fas fa-bell"></i>
                <span>Notifications</span>
            </a>
            
            <div class="sidebar-divider"></div>
            
            <a href="#" class="sidebar-item">
                <i class="fas fa-cog"></i>
                <span>Settings</span>
            </a>
            <a href="#" class="sidebar-item">
                <i class="fas fa-question-circle"></i>
                <span>Help & Support</span>
            </a>
        </div>
    </div>
   
 


@yield('content')



 <script>
        // Revenue Chart
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        const revenueChart = new Chart(revenueCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
                datasets: [{
                    label: 'Monthly Revenue',
                    data: [22000, 25000, 23000, 26000, 24000, 27000, 26500, 28000, 27500, 28540],
                    backgroundColor: '#4361ee',
                    borderColor: '#3f37c9',
                    borderWidth: 1
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
                        beginAtZero: true,
                        grid: {
                            drawBorder: false
                        },
                        ticks: {
                            callback: function(value) {
                                return '$' + value.toLocaleString();
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

        // Occupancy Chart
        const occupancyCtx = document.getElementById('occupancyChart').getContext('2d');
        const occupancyChart = new Chart(occupancyCtx, {
            type: 'doughnut',
            data: {
                labels: ['Occupied', 'Vacant', 'Maintenance'],
                datasets: [{
                    data: [24, 4, 2],
                    backgroundColor: [
                        '#4cc9f0',
                        '#f72585',
                        '#4895ef'
                    ],
                    borderWidth: 2,
                    borderColor: '#fff'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                },
                cutout: '70%'
            }
        });

        // Sidebar Toggle
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const mainContent = document.getElementById('mainContent');
        const mobileToggle = document.getElementById('mobileToggle');
        const sidebarExpandBtn = document.getElementById('sidebarExpandBtn');
        
        // Desktop sidebar toggle
        sidebarToggle.addEventListener('click', function(e) {
            e.stopPropagation(); // Prevent event bubbling
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
            
            // Show/hide the expand button based on sidebar state
            if (sidebar.classList.contains('collapsed')) {
                sidebarExpandBtn.classList.add('show');
            } else {
                sidebarExpandBtn.classList.remove('show');
            }
            
            // Change icon
            const icon = this.querySelector('i');
            if (sidebar.classList.contains('collapsed')) {
                icon.classList.remove('fa-angle-left');
                icon.classList.add('fa-angle-right');
            } else {
                icon.classList.remove('fa-angle-right');
                icon.classList.add('fa-angle-left');
            }
        });
        
        // Sidebar expand button (visible when sidebar is collapsed)
        sidebarExpandBtn.addEventListener('click', function(e) {
            e.stopPropagation(); // Prevent event bubbling
            sidebar.classList.remove('collapsed');
            mainContent.classList.remove('expanded');
            sidebarExpandBtn.classList.remove('show');
            
            // Change icon in sidebar toggle
            const icon = sidebarToggle.querySelector('i');
            icon.classList.remove('fa-angle-right');
            icon.classList.add('fa-angle-left');
        });
        
        // Mobile Sidebar Toggle
        mobileToggle.addEventListener('click', function(e) {
            e.stopPropagation(); // Prevent event bubbling
            sidebar.classList.toggle('active');
        });
        
        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            if (window.innerWidth <= 768) {
                const isClickInsideSidebar = sidebar.contains(event.target);
                const isClickOnToggle = mobileToggle.contains(event.target);
                
                if (!isClickInsideSidebar && !isClickOnToggle && sidebar.classList.contains('active')) {
                    sidebar.classList.remove('active');
                }
            }
        });
        
        // Handle window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                // Reset mobile classes when switching to desktop
                sidebar.classList.remove('active');
                
                // Show/hide expand button based on sidebar state
                if (sidebar.classList.contains('collapsed')) {
                    sidebarExpandBtn.classList.add('show');
                } else {
                    sidebarExpandBtn.classList.remove('show');
                }
            } else {
                // Hide expand button on mobile
                sidebarExpandBtn.classList.remove('show');
            }
        });
        
        // Filter Toggle
        const filterToggle = document.getElementById('filterToggle');
        const filterContent = document.getElementById('filterContent');
        
        filterToggle.addEventListener('click', function() {
            filterContent.classList.toggle('collapsed');
            
            // Change text and icon
            if (filterContent.classList.contains('collapsed')) {
                this.innerHTML = '<i class="fas fa-chevron-down me-1"></i>Show Filters';
            } else {
                this.innerHTML = '<i class="fas fa-chevron-up me-1"></i>Hide Filters';
            }
        });
        
        // Reset Filters
        document.getElementById('resetFilters').addEventListener('click', function() {
            // Reset all filter inputs
            document.getElementById('searchKeyword').value = '';
            document.getElementById('propertyTypeFilter').value = '';
            document.getElementById('occupancyStatus').value = '';
            document.getElementById('locationFilter').value = '';
            document.getElementById('minUnits').value = '';
            document.getElementById('maxUnits').value = '';
            document.getElementById('minPrice').value = '';
            document.getElementById('maxPrice').value = '';
            document.getElementById('dateFrom').value = '';
            document.getElementById('dateTo').value = '';
            
            // Uncheck all feature checkboxes
            document.getElementById('filterParking').checked = false;
            document.getElementById('filterGym').checked = false;
            document.getElementById('filterPool').checked = false;
            document.getElementById('filterPets').checked = false;
        });
        
        // Apply Filters
        document.getElementById('applyFilters').addEventListener('click', function() {
            // In a real application, this would filter the data
            // For now, we'll just show a success message
            const filterValues = {
                keyword: document.getElementById('searchKeyword').value,
                propertyType: document.getElementById('propertyTypeFilter').value,
                occupancyStatus: document.getElementById('occupancyStatus').value,
                location: document.getElementById('locationFilter').value,
                minUnits: document.getElementById('minUnits').value,
                maxUnits: document.getElementById('maxUnits').value,
                minPrice: document.getElementById('minPrice').value,
                maxPrice: document.getElementById('maxPrice').value,
                dateFrom: document.getElementById('dateFrom').value,
                dateTo: document.getElementById('dateTo').value,
                features: {
                    parking: document.getElementById('filterParking').checked,
                    gym: document.getElementById('filterGym').checked,
                    pool: document.getElementById('filterPool').checked,
                    pets: document.getElementById('filterPets').checked
                }
            };
            
            console.log('Applied filters:', filterValues);
            
            // Show success message
            const alertDiv = document.createElement('div');
            alertDiv.className = 'alert alert-success alert-dismissible fade show';
            alertDiv.innerHTML = `
                <strong>Filters Applied!</strong> Your search results have been updated.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            `;
            
            document.querySelector('.filter-container').after(alertDiv);
            
            // Auto dismiss after 3 seconds
            setTimeout(() => {
                alertDiv.remove();
            }, 3000);
        });

        // File upload handler for property photos
        document.getElementById('propertyPhotos').addEventListener('change', function(e) {
            const files = e.target.files;
            if (files.length > 0) {
                console.log(`${files.length} property photos selected for upload`);
            }
        });

        // File upload handler for unit photos
        document.getElementById('unitPhotos').addEventListener('change', function(e) {
            const files = e.target.files;
            if (files.length > 0) {
                console.log(`${files.length} unit photos selected for upload`);
            }
        });

        // Property form submission handler
        document.querySelector('#addPropertyModal .btn-primary').addEventListener('click', function() {
            const form = document.getElementById('propertyForm');
            if (form.checkValidity()) {
                // In real application, submit form data
                alert('Property added successfully!');
                const modal = bootstrap.Modal.getInstance(document.getElementById('addPropertyModal'));
                modal.hide();
            } else {
                form.reportValidity();
            }
        });

        // Unit form submission handler
        document.getElementById('saveUnitBtn').addEventListener('click', function() {
            const form = document.getElementById('unitForm');
            if (form.checkValidity()) {
                // In real application, submit form data
                alert('Unit added successfully!');
                const modal = bootstrap.Modal.getInstance(document.getElementById('addUnitModal'));
                modal.hide();
            } else {
                form.reportValidity();
            }
        });
    </script>
@stack('scripts')
</body>
</html>