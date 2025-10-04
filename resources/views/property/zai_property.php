@extends('layouts.app')

@section('title', 'Property Management')

@section('styles')
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
        
        /* Image Preview Styles */
        .image-preview-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }
        
        .image-preview {
            position: relative;
            width: 100px;
            height: 100px;
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid #ddd;
        }
        
        .image-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .image-preview .remove-image {
            position: absolute;
            top: 5px;
            right: 5px;
            background: rgba(255, 255, 255, 0.7);
            border: none;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: #dc3545;
        }
        
        /* Features Display */
        .features-display {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }
        
        .feature-tag {
            background-color: #e9ecef;
            color: #495057;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 0.75rem;
        }
    </style>
@endsection

@section('content')
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
            <a href="{{ route('dashboard') }}" class="sidebar-logo">
                <i class="fas fa-building"></i>
                <span>PropertyHub</span>
            </a>
            <button class="sidebar-toggle" id="sidebarToggle">
                <i class="fas fa-angle-left"></i>
            </button>
        </div>
        
        <div class="sidebar-menu">
            <a href="{{ route('dashboard') }}" class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('properties.index') }}" class="sidebar-item {{ request()->routeIs('properties.*') ? 'active' : '' }}">
                <i class="fas fa-building"></i>
                <span>Properties</span>
            </a>
            <a href="{{ route('units.index') }}" class="sidebar-item {{ request()->routeIs('units.*') ? 'active' : '' }}">
                <i class="fas fa-home"></i>
                <span>Units</span>
            </a>
            <a href="{{ route('tenants.index') }}" class="sidebar-item {{ request()->routeIs('tenants.*') ? 'active' : '' }}">
                <i class="fas fa-users"></i>
                <span>Tenants</span>
            </a>
            <a href="{{ route('maintenance.index') }}" class="sidebar-item {{ request()->routeIs('maintenance.*') ? 'active' : '' }}">
                <i class="fas fa-tools"></i>
                <span>Maintenance</span>
            </a>
            <a href="{{ route('payments.index') }}" class="sidebar-item {{ request()->routeIs('payments.*') ? 'active' : '' }}">
                <i class="fas fa-file-invoice-dollar"></i>
                <span>Payments</span>
            </a>
            
            <div class="sidebar-divider"></div>
            
            <a href="{{ route('reports.index') }}" class="sidebar-item {{ request()->routeIs('reports.*') ? 'active' : '' }}">
                <i class="fas fa-chart-bar"></i>
                <span>Reports</span>
            </a>
            <a href="{{ route('calendar.index') }}" class="sidebar-item {{ request()->routeIs('calendar.*') ? 'active' : '' }}">
                <i class="fas fa-calendar-alt"></i>
                <span>Calendar</span>
            </a>
            <a href="{{ route('notifications.index') }}" class="sidebar-item {{ request()->routeIs('notifications.*') ? 'active' : '' }}">
                <i class="fas fa-bell"></i>
                <span>Notifications</span>
            </a>
            
            <div class="sidebar-divider"></div>
            
            <a href="{{ route('settings.index') }}" class="sidebar-item {{ request()->routeIs('settings.*') ? 'active' : '' }}">
                <i class="fas fa-cog"></i>
                <span>Settings</span>
            </a>
            <a href="{{ route('help.index') }}" class="sidebar-item {{ request()->routeIs('help.*') ? 'active' : '' }}">
                <i class="fas fa-question-circle"></i>
                <span>Help & Support</span>
            </a>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <!-- Header -->
        <div class="row mb-4">
            <div class="col">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="h3 mb-1">Property Management</h1>
                        <p class="text-muted mb-0">Manage your properties, units, and occupancy</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary btn-lg" data-bs-toggle="modal" data-bs-target="#addUnitModal">
                            <i class="fas fa-plus me-2"></i>Add New Unit
                        </button>
                        <button class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#addPropertyModal">
                            <i class="fas fa-building me-2"></i>Add New Property
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Advanced Search Filter -->
        <div class="filter-container">
            <div class="filter-header">
                <h5 class="mb-0">Advanced Search & Filters</h5>
                <button class="filter-toggle" id="filterToggle">
                    <i class="fas fa-chevron-up me-1"></i>Hide Filters
                </button>
            </div>
            
            <form action="{{ route('properties.index') }}" method="GET" id="filterForm">
                <div class="filter-content" id="filterContent">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="filter-group">
                                <label for="searchKeyword">Keyword</label>
                                <input type="text" class="form-control" id="searchKeyword" name="keyword" placeholder="Property name, address..." value="{{ request('keyword') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="filter-group">
                                <label for="statusFilter">Status</label>
                                <select class="form-select" id="statusFilter" name="status">
                                    <option value="">All Status</option>
                                    <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                                    <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="archived" {{ request('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="filter-group">
                                <label for="landlordFilter">Landlord</label>
                                <select class="form-select" id="landlordFilter" name="landlord_id">
                                    <option value="">All Landlords</option>
                                    @foreach($landlords as $landlord)
                                        <option value="{{ $landlord->id }}" {{ request('landlord_id') == $landlord->id ? 'selected' : '' }}>{{ $landlord->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="filter-group">
                                <label for="locationFilter">Location</label>
                                <input type="text" class="form-control" id="locationFilter" name="location" placeholder="City, State, ZIP" value="{{ request('location') }}">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="filter-group">
                                <label>Rent Amount Range ($)</label>
                                <div class="price-range">
                                    <input type="number" class="form-control" id="minRent" name="min_rent" placeholder="Min" value="{{ request('min_rent') }}">
                                    <span>-</span>
                                    <input type="number" class="form-control" id="maxRent" name="max_rent" placeholder="Max" value="{{ request('max_rent') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="filter-group">
                                <label>Features</label>
                                <div class="d-flex flex-wrap">
                                    <div class="form-check me-3">
                                        <input class="form-check-input" type="checkbox" id="filterParking" name="features[]" value="parking" @if(in_array('parking', request('features', []))) checked @endif>
                                        <label class="form-check-label" for="filterParking">Parking</label>
                                    </div>
                                    <div class="form-check me-3">
                                        <input class="form-check-input" type="checkbox" id="filterGym" name="features[]" value="gym" @if(in_array('gym', request('features', []))) checked @endif>
                                        <label class="form-check-label" for="filterGym">Gym</label>
                                    </div>
                                    <div class="form-check me-3">
                                        <input class="form-check-input" type="checkbox" id="filterPool" name="features[]" value="pool" @if(in_array('pool', request('features', []))) checked @endif>
                                        <label class="form-check-label" for="filterPool">Pool</label>
                                    </div>
                                    <div class="form-check me-3">
                                        <input class="form-check-input" type="checkbox" id="filterPets" name="features[]" value="pet_friendly" @if(in_array('pet_friendly', request('features', []))) checked @endif>
                                        <label class="form-check-label" for="filterPets">Pet Friendly</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="filter-actions">
                        <a href="{{ route('properties.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-redo me-1"></i>Reset Filters
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search me-1"></i>Apply Filters
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Property Statistics -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="text-muted mb-2">Total Properties</h5>
                            <h2 class="mb-0">{{ $stats['total_properties'] }}</h2>
                            <small class="text-success">
                                <i class="fas fa-arrow-up me-1"></i>{{ $stats['new_this_month'] }} new this month
                            </small>
                        </div>
                        <div class="text-primary">
                            <i class="fas fa-building fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stat-card" style="border-left-color: var(--success);">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="text-muted mb-2">Occupied Units</h5>
                            <h2 class="mb-0">{{ $stats['occupied_units'] }}</h2>
                            <small class="text-info">
                                {{ $stats['occupancy_rate'] }}% occupancy rate
                            </small>
                        </div>
                        <div class="text-success">
                            <i class="fas fa-home fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stat-card" style="border-left-color: var(--warning);">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="text-muted mb-2">Vacant Units</h5>
                            <h2 class="mb-0">{{ $stats['vacant_units'] }}</h2>
                            <small class="text-warning">
                                {{ $stats['vacancy_rate'] }}% vacancy rate
                            </small>
                        </div>
                        <div class="text-warning">
                            <i class="fas fa-door-open fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stat-card" style="border-left-color: var(--info);">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="text-muted mb-2">Monthly Revenue</h5>
                            <h2 class="mb-0">${{ number_format($stats['monthly_revenue']) }}</h2>
                            <small class="text-success">
                                <i class="fas fa-trend-up me-1"></i>{{ $stats['revenue_growth'] }}% growth
                            </small>
                        </div>
                        <div class="text-info">
                            <i class="fas fa-dollar-sign fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Left Column - Charts -->
            <div class="col-lg-8">
                <!-- Revenue & Occupancy Charts -->
                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <div class="chart-container">
                            <h5 class="mb-3">Monthly Revenue</h5>
                            <canvas id="revenueChart" height="250"></canvas>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="chart-container">
                            <h5 class="mb-3">Occupancy Rate</h5>
                            <canvas id="occupancyChart" height="250"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Properties Table -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">All Properties</h5>
                        <div class="d-flex gap-2">
                            <div class="dropdown">
                                <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-sort me-1"></i>Sort
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                                    <li><a class="dropdown-item" href="{{ route('properties.index', ['sort' => 'name', 'order' => 'asc']) }}">Name (A-Z)</a></li>
                                    <li><a class="dropdown-item" href="{{ route('properties.index', ['sort' => 'name', 'order' => 'desc']) }}">Name (Z-A)</a></li>
                                    <li><a class="dropdown-item" href="{{ route('properties.index', ['sort' => 'rent_amount', 'order' => 'desc']) }}">Rent (High to Low)</a></li>
                                    <li><a class="dropdown-item" href="{{ route('properties.index', ['sort' => 'rent_amount', 'order' => 'asc']) }}">Rent (Low to High)</a></li>
                                </ul>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="exportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-download me-1"></i>Export
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="exportDropdown">
                                    <li><a class="dropdown-item" href="{{ route('properties.export', ['format' => 'pdf']) }}">Export as PDF</a></li>
                                    <li><a class="dropdown-item" href="{{ route('properties.export', ['format' => 'excel']) }}">Export as Excel</a></li>
                                    <li><a class="dropdown-item" href="{{ route('properties.export', ['format' => 'csv']) }}">Export as CSV</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Property</th>
                                        <th>Landlord</th>
                                        <th>Rent Amount</th>
                                        <th>Deposit</th>
                                        <th>Occupancy</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($properties as $property)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @if(!empty($property->photos) && is_array(json_decode($property->photos)))
                                                        @php
                                                            $photos = json_decode($property->photos);
                                                            $mainPhoto = !empty($photos) ? $photos[0] : null;
                                                        @endphp
                                                        @if($mainPhoto)
                                                            <img src="{{ asset('storage/' . $mainPhoto) }}" 
                                                                 class="rounded me-3" width="40" height="40">
                                                        @else
                                                            <img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994?w=100&h=60&fit=crop" 
                                                                 class="rounded me-3" width="40" height="40">
                                                        @endif
                                                    @else
                                                        <img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994?w=100&h=60&fit=crop" 
                                                             class="rounded me-3" width="40" height="40">
                                                    @endif
                                                    <div>
                                                        <strong>{{ $property->name }}</strong>
                                                        <div class="text-muted small">{{ Str::limit($property->address, 40) }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $property->landlord->name }}</td>
                                            <td>${{ number_format($property->rent_amount) }}</td>
                                            <td>${{ number_format($property->deposit) }}</td>
                                            <td>
                                                <strong class="text-success">{{ $property->occupancy_rate ?? 0 }}%</strong>
                                                <div class="text-muted small">{{ $property->occupied_units ?? 0 }}/{{ $property->total_units ?? 0 }} occupied</div>
                                            </td>
                                            <td>
                                                @switch($property->status)
                                                    @case('published')
                                                        <span class="status-badge bg-success">Published</span>
                                                        @break
                                                    @case('draft')
                                                        <span class="status-badge bg-warning">Draft</span>
                                                        @break
                                                    @case('archived')
                                                        <span class="status-badge bg-secondary">Archived</span>
                                                        @break
                                                @endswitch
                                            </td>
                                            <td>
                                                <div class="property-actions">
                                                    <a href="{{ route('properties.show', $property->id) }}" class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('properties.edit', $property->id) }}" class="btn btn-sm btn-outline-secondary">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('properties.destroy', $property->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this property?')">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center py-4">No properties found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <div class="text-muted">Showing {{ $properties->firstItem() }}-{{ $properties->lastItem() }} of {{ $properties->total() }} properties</div>
                        {{ $properties->links() }}
                    </div>
                </div>
            </div>

            <!-- Right Column - Property Cards & Analytics -->
            <div class="col-lg-4">
                <!-- Property Performance -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Property Performance</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Best Performing</label>
                            <div class="d-flex justify-content-between align-items-center">
                                <strong>{{ $topPerformingProperty->name ?? 'N/A' }}</strong>
                                <span class="text-success">{{ $topPerformingProperty->occupancy_rate ?? 0 }}% occupancy</span>
                            </div>
                            <div class="progress progress-bar-custom mt-1">
                                <div class="progress-bar bg-success" style="width: {{ $topPerformingProperty->occupancy_rate ?? 0 }}%"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Highest Revenue</label>
                            <div class="d-flex justify-content-between align-items-center">
                                <strong>{{ $highestRevenueProperty->name ?? 'N/A' }}</strong>
                                <span class="text-info">${{ number_format($highestRevenueProperty->rent_amount ?? 0) }} avg rent</span>
                            </div>
                            <div class="progress progress-bar-custom mt-1">
                                <div class="progress-bar bg-info" style="width: {{ min(($highestRevenueProperty->rent_amount / $maxRent) * 100, 100) ?? 0 }}%"></div>
                            </div>
                        </div>
                        <div>
                            <label class="form-label">Needs Attention</label>
                            <div class="d-flex justify-content-between align-items-center">
                                <strong>{{ $needsAttentionProperty->name ?? 'N/A' }}</strong>
                                <span class="text-warning">{{ $needsAttentionProperty->occupancy_rate ?? 0 }}% occupancy</span>
                            </div>
                            <div class="progress progress-bar-custom mt-1">
                                <div class="progress-bar bg-warning" style="width: {{ $needsAttentionProperty->occupancy_rate ?? 0 }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Properties -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Recent Properties</h5>
                        <a href="{{ route('properties.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
                    </div>
                    <div class="card-body">
                        @forelse($recentProperties as $property)
                            <!-- Property Card -->
                            <div class="property-card card mb-3">
                                @if(!empty($property->photos) && is_array(json_decode($property->photos)))
                                    @php
                                        $photos = json_decode($property->photos);
                                        $mainPhoto = !empty($photos) ? $photos[0] : null;
                                    @endphp
                                    @if($mainPhoto)
                                        <img src="{{ asset('storage/' . $mainPhoto) }}" 
                                             class="property-image" alt="{{ $property->name }}">
                                    @else
                                        <img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994?w=400&h=200&fit=crop" 
                                             class="property-image" alt="{{ $property->name }}">
                                    @endif
                                @else
                                    <img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994?w=400&h=200&fit=crop" 
                                         class="property-image" alt="{{ $property->name }}">
                                @endif
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <h5 class="card-title mb-0">{{ $property->name }}</h5>
                                        @switch($property->status)
                                            @case('published')
                                                <span class="status-badge bg-success">Published</span>
                                                @break
                                            @case('draft')
                                                <span class="status-badge bg-warning">Draft</span>
                                                @break
                                            @case('archived')
                                                <span class="status-badge bg-secondary">Archived</span>
                                                @break
                                        @endswitch
                                    </div>
                                    <p class="text-muted small mb-3">{{ Str::limit($property->address, 50) }}</p>
                                    <div class="row text-center mb-3">
                                        <div class="col-4">
                                            <div class="text-primary fw-bold">{{ $property->total_units ?? 0 }}</div>
                                            <div class="text-muted small">Units</div>
                                        </div>
                                        <div class="col-4">
                                            <div class="text-success fw-bold">{{ $property->occupancy_rate ?? 0 }}%</div>
                                            <div class="text-muted small">Occupied</div>
                                        </div>
                                        <div class="col-4">
                                            <div class="text-info fw-bold">${{ number_format($property->rent_amount) }}</div>
                                            <div class="text-muted small">Rent</div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-wrap mb-3">
                                        @if(!empty($property->features) && is_array(json_decode($property->features)))
                                            @php
                                                $features = json_decode($property->features);
                                                $displayFeatures = array_slice($features, 0, 3);
                                            @endphp
                                            @foreach($displayFeatures as $feature)
                                                <span class="feature-badge">{{ ucwords(str_replace('_', ' ', $feature)) }}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="d-grid gap-2">
                                        <a href="{{ route('properties.show', $property->id) }}" class="btn btn-primary btn-sm">View Details</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-4">No recent properties</div>
                        @endforelse
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
                        <i class="fas fa-building me-2"></i>Add New Property
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data" id="propertyForm">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="propertyName" class="form-label">Property Name *</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="propertyName" name="name" placeholder="e.g., Sunset Villa" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="landlordId" class="form-label">Landlord *</label>
                                    <select class="form-select @error('landlord_id') is-invalid @enderror" id="landlordId" name="landlord_id" required>
                                        <option value="" selected disabled>Select a landlord</option>
                                        @foreach($landlords as $landlord)
                                            <option value="{{ $landlord->id }}" {{ old('landlord_id') == $landlord->id ? 'selected' : '' }}>{{ $landlord->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('landlord_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="propertyAddress" class="form-label">Address *</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" id="propertyAddress" name="address" rows="2" placeholder="Full property address" required>{{ old('address') }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="rentAmount" class="form-label">Rent Amount ($) *</label>
                                    <input type="number" class="form-control @error('rent_amount') is-invalid @enderror" id="rentAmount" name="rent_amount" placeholder="0.00" step="0.01" value="{{ old('rent_amount') }}" required>
                                    @error('rent_amount')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="deposit" class="form-label">Security Deposit ($)</label>
                                    <input type="number" class="form-control @error('deposit') is-invalid @enderror" id="deposit" name="deposit" placeholder="0.00" step="0.01" value="{{ old('deposit') }}">
                                    @error('deposit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="propertyDescription" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="propertyDescription" name="description" rows="3" placeholder="Describe the property features and amenities...">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="propertyStatus" class="form-label">Status</label>
                            <select class="form-select @error('status') is-invalid @enderror" id="propertyStatus" name="status">
                                <option value="draft" {{ old('status', 'draft') == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                                <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Property Features</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="parking" name="features[]" value="parking" @if(in_array('parking', old('features', []))) checked @endif>
                                        <label class="form-check-label" for="parking">Parking</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gym" name="features[]" value="gym" @if(in_array('gym', old('features', []))) checked @endif>
                                        <label class="form-check-label" for="gym">Gym</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="pool" name="features[]" value="pool" @if(in_array('pool', old('features', []))) checked @endif>
                                        <label class="form-check-label" for="pool">Swimming Pool</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="laundry" name="features[]" value="laundry" @if(in_array('laundry', old('features', []))) checked @endif>
                                        <label class="form-check-label" for="laundry">Laundry</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="pet_friendly" name="features[]" value="pet_friendly" @if(in_array('pet_friendly', old('features', []))) checked @endif>
                                        <label class="form-check-label" for="pet_friendly">Pet Friendly</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="security" name="features[]" value="security" @if(in_array('security', old('features', []))) checked @endif>
                                        <label class="form-check-label" for="security">Security</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="propertyPhotos" class="form-label">Upload Photos</label>
                            <input type="file" class="form-control @error('photos') is-invalid @enderror" id="propertyPhotos" name="photos[]" multiple accept="image/*">
                            @error('photos')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="image-preview-container" id="imagePreviewContainer"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>Save Property
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Unit Modal -->
    <div class="modal fade" id="addUnitModal" tabindex="-1" aria-labelledby="addUnitModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUnitModalLabel">
                        <i class="fas fa-plus me-2"></i>Add New Unit
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('units.store') }}" method="POST" id="unitForm">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="propertySelect" class="form-label">Property *</label>
                                    <select class="form-select @error('property_id') is-invalid @enderror" id="propertySelect" name="property_id" required>
                                        <option value="" selected disabled>Select a property</option>
                                        @foreach($properties as $property)
                                            <option value="{{ $property->id }}" {{ old('property_id') == $property->id ? 'selected' : '' }}>{{ $property->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('property_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="unitNumber" class="form-label">Unit Number *</label>
                                    <input type="text" class="form-control @error('unit_number') is-invalid @enderror" id="unitNumber" name="unit_number" placeholder="e.g., 101, A1, etc." value="{{ old('unit_number') }}" required>
                                    @error('unit_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="unitType" class="form-label">Unit Type</label>
                                    <select class="form-select @error('unit_type') is-invalid @enderror" id="unitType" name="unit_type">
                                        <option value="studio" {{ old('unit_type') == 'studio' ? 'selected' : '' }}>Studio</option>
                                        <option value="1-bedroom" {{ old('unit_type', '2-bedroom') == '1-bedroom' ? 'selected' : '' }}>1 Bedroom</option>
                                        <option value="2-bedroom" {{ old('unit_type') == '2-bedroom' ? 'selected' : '' }}>2 Bedroom</option>
                                        <option value="3-bedroom" {{ old('unit_type') == '3-bedroom' ? 'selected' : '' }}>3 Bedroom</option>
                                        <option value="4-bedroom" {{ old('unit_type') == '4-bedroom' ? 'selected' : '' }}>4 Bedroom</option>
                                    </select>
                                    @error('unit_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="bathrooms" class="form-label">Bathrooms</label>
                                    <select class="form-select @error('bathrooms') is-invalid @enderror" id="bathrooms" name="bathrooms">
                                        <option value="1" {{ old('bathrooms', '2') == '1' ? 'selected' : '' }}>1 Bathroom</option>
                                        <option value="1.5" {{ old('bathrooms') == '1.5' ? 'selected' : '' }}>1.5 Bathrooms</option>
                                        <option value="2" {{ old('bathrooms') == '2' ? 'selected' : '' }}>2 Bathrooms</option>
                                        <option value="2.5" {{ old('bathrooms') == '2.5' ? 'selected' : '' }}>2.5 Bathrooms</option>
                                        <option value="3" {{ old('bathrooms') == '3' ? 'selected' : '' }}>3+ Bathrooms</option>
                                    </select>
                                    @error('bathrooms')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="squareFootage" class="form-label">Square Footage</label>
                                    <input type="number" class="form-control @error('square_footage') is-invalid @enderror" id="squareFootage" name="square_footage" placeholder="e.g., 850" value="{{ old('square_footage') }}">
                                    @error('square_footage')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="monthlyRent" class="form-label">Monthly Rent ($) *</label>
                                    <input type="number" class="form-control @error('monthly_rent') is-invalid @enderror" id="monthlyRent" name="monthly_rent" placeholder="0.00" step="0.01" value="{{ old('monthly_rent') }}" required>
                                    @error('monthly_rent')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="securityDepositUnit" class="form-label">Security Deposit ($)</label>
                                    <input type="number" class="form-control @error('security_deposit') is-invalid @enderror" id="securityDepositUnit" name="security_deposit" placeholder="0.00" step="0.01" value="{{ old('security_deposit') }}">
                                    @error('security_deposit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="unitDescription" class="form-label">Unit Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="unitDescription" name="description" rows="3" placeholder="Describe the unit features, condition, and any special details...">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Unit Features</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="unitParking" name="features[]" value="parking" @if(in_array('parking', old('features', []))) checked @endif>
                                        <label class="form-check-label" for="unitParking">Parking Space</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="unitBalcony" name="features[]" value="balcony" @if(in_array('balcony', old('features', []))) checked @endif>
                                        <label class="form-check-label" for="unitBalcony">Balcony/Patio</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="unitFireplace" name="features[]" value="fireplace" @if(in_array('fireplace', old('features', []))) checked @endif>
                                        <label class="form-check-label" for="unitFireplace">Fireplace</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="unitWasherDryer" name="features[]" value="washer_dryer" @if(in_array('washer_dryer', old('features', []))) checked @endif>
                                        <label class="form-check-label" for="unitWasherDryer">In-Unit Washer/Dryer</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="unitCentralAC" name="features[]" value="central_ac" @if(in_array('central_ac', old('features', []))) checked @endif>
                                        <label class="form-check-label" for="unitCentralAC">Central A/C</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="unitHardwood" name="features[]" value="hardwood_floors" @if(in_array('hardwood_floors', old('features', []))) checked @endif>
                                        <label class="form-check-label" for="unitHardwood">Hardwood Floors</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="unitPhotos" class="form-label">Upload Unit Photos</label>
                            <input type="file" class="form-control @error('photos') is-invalid @enderror" id="unitPhotos" name="photos[]" multiple accept="image/*">
                            @error('photos')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="image-preview-container" id="unitImagePreviewContainer"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="saveUnitBtn">
                            <i class="fas fa-save me-1"></i>Save Unit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        // Revenue Chart
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        const revenueChart = new Chart(revenueCtx, {
            type: 'bar',
            data: {
                labels: @json($revenueChartLabels),
                datasets: [{
                    label: 'Monthly Revenue',
                    data: @json($revenueChartData),
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
                labels: @json($occupancyChartLabels),
                datasets: [{
                    data: @json($occupancyChartData),
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
        
        // Image Preview for Property Photos
        document.getElementById('propertyPhotos').addEventListener('change', function(e) {
            const files = e.target.files;
            const previewContainer = document.getElementById('imagePreviewContainer');
            previewContainer.innerHTML = '';
            
            if (files.length > 0) {
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    const reader = new FileReader();
                    
                    reader.onload = function(event) {
                        const preview = document.createElement('div');
                        preview.className = 'image-preview';
                        
                        const img = document.createElement('img');
                        img.src = event.target.result;
                        
                        const removeBtn = document.createElement('button');
                        removeBtn.className = 'remove-image';
                        removeBtn.innerHTML = '<i class="fas fa-times"></i>';
                        removeBtn.addEventListener('click', function() {
                            preview.remove();
                        });
                        
                        preview.appendChild(img);
                        preview.appendChild(removeBtn);
                        previewContainer.appendChild(preview);
                    };
                    
                    reader.readAsDataURL(file);
                }
            }
        });
        
        // Image Preview for Unit Photos
        document.getElementById('unitPhotos').addEventListener('change', function(e) {
            const files = e.target.files;
            const previewContainer = document.getElementById('unitImagePreviewContainer');
            previewContainer.innerHTML = '';
            
            if (files.length > 0) {
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    const reader = new FileReader();
                    
                    reader.onload = function(event) {
                        const preview = document.createElement('div');
                        preview.className = 'image-preview';
                        
                        const img = document.createElement('img');
                        img.src = event.target.result;
                        
                        const removeBtn = document.createElement('button');
                        removeBtn.className = 'remove-image';
                        removeBtn.innerHTML = '<i class="fas fa-times"></i>';
                        removeBtn.addEventListener('click', function() {
                            preview.remove();
                        });
                        
                        preview.appendChild(img);
                        preview.appendChild(removeBtn);
                        previewContainer.appendChild(preview);
                    };
                    
                    reader.readAsDataURL(file);
                }
            }
        });
        
        // Show success message if it exists
        @if(session('success'))
            const successAlert = document.createElement('div');
            successAlert.className = 'alert alert-success alert-dismissible fade show';
            successAlert.innerHTML = `
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            `;
            document.querySelector('.main-content').prepend(successAlert);
            
            // Auto dismiss after 5 seconds
            setTimeout(() => {
                successAlert.remove();
            }, 5000);
        @endif
        
        // Show error message if it exists
        @if(session('error'))
            const errorAlert = document.createElement('div');
            errorAlert.className = 'alert alert-danger alert-dismissible fade show';
            errorAlert.innerHTML = `
                <strong>Error!</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            `;
            document.querySelector('.main-content').prepend(errorAlert);
            
            // Auto dismiss after 5 seconds
            setTimeout(() => {
                errorAlert.remove();
            }, 5000);
        @endif
    </script>
@endsection