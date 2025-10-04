
@extends('layouts.app_property')
@section('pageTitle',"index")


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
            
            <div class="filter-content" id="filterContent">
                <div class="row">
                    <div class="col-md-3">
                        <div class="filter-group">
                            <label for="searchKeyword">Keyword</label>
                            <input type="text" class="form-control" id="searchKeyword" placeholder="Property name, address...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="filter-group">
                            <label for="propertyTypeFilter">Property Type</label>
                            <select class="form-select" id="propertyTypeFilter">
                                <option value="">All Types</option>
                                <option value="apartment">Apartment Building</option>
                                <option value="house">Single Family Home</option>
                                <option value="townhouse">Townhouse</option>
                                <option value="condo">Condominium</option>
                                <option value="commercial">Commercial</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="filter-group">
                            <label for="occupancyStatus">Occupancy Status</label>
                            <select class="form-select" id="occupancyStatus">
                                <option value="">All Status</option>
                                <option value="occupied">Occupied</option>
                                <option value="vacant">Vacant</option>
                                <option value="maintenance">Under Maintenance</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="filter-group">
                            <label for="locationFilter">Location</label>
                            <input type="text" class="form-control" id="locationFilter" placeholder="City, State, ZIP">
                        </div>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-3">
                        <div class="filter-group">
                            <label for="minUnits">Min Units</label>
                            <input type="number" class="form-control" id="minUnits" min="1" placeholder="1">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="filter-group">
                            <label for="maxUnits">Max Units</label>
                            <input type="number" class="form-control" id="maxUnits" min="1" placeholder="100">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="filter-group">
                            <label>Price Range ($)</label>
                            <div class="price-range">
                                <input type="number" class="form-control" id="minPrice" placeholder="Min">
                                <span>-</span>
                                <input type="number" class="form-control" id="maxPrice" placeholder="Max">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="filter-group">
                            <label>Date Added</label>
                            <div class="date-range">
                                <input type="date" class="form-control" id="dateFrom">
                                <span class="align-self-center">to</span>
                                <input type="date" class="form-control" id="dateTo">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="filter-group">
                            <label>Features</label>
                            <div class="d-flex flex-wrap">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="checkbox" id="filterParking">
                                    <label class="form-check-label" for="filterParking">Parking</label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="checkbox" id="filterGym">
                                    <label class="form-check-label" for="filterGym">Gym</label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="checkbox" id="filterPool">
                                    <label class="form-check-label" for="filterPool">Pool</label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="checkbox" id="filterPets">
                                    <label class="form-check-label" for="filterPets">Pet Friendly</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="filter-actions">
                    <button class="btn btn-outline-secondary" id="resetFilters">
                        <i class="fas fa-redo me-1"></i>Reset Filters
                    </button>
                    <button class="btn btn-primary" id="applyFilters">
                        <i class="fas fa-search me-1"></i>Apply Filters
                    </button>
                </div>
            </div>
        </div>

        <!-- Property Statistics -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="text-muted mb-2">Total Properties</h5>
                            <h2 class="mb-0">8</h2>
                            <small class="text-success">
                                <i class="fas fa-arrow-up me-1"></i>2 new this month
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
                            <h2 class="mb-0">24</h2>
                            <small class="text-info">
                                85% occupancy rate
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
                            <h2 class="mb-0">4</h2>
                            <small class="text-warning">
                                15% vacancy rate
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
                            <h2 class="mb-0">$28,540</h2>
                            <small class="text-success">
                                <i class="fas fa-trend-up me-1"></i>12% growth
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
                                    <li><a class="dropdown-item" href="#">Name (A-Z)</a></li>
                                    <li><a class="dropdown-item" href="#">Name (Z-A)</a></li>
                                    <li><a class="dropdown-item" href="#">Occupancy (High to Low)</a></li>
                                    <li><a class="dropdown-item" href="#">Occupancy (Low to High)</a></li>
                                    <li><a class="dropdown-item" href="#">Revenue (High to Low)</a></li>
                                    <li><a class="dropdown-item" href="#">Revenue (Low to High)</a></li>
                                </ul>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="exportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-download me-1"></i>Export
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="exportDropdown">
                                    <li><a class="dropdown-item" href="#">Export as PDF</a></li>
                                    <li><a class="dropdown-item" href="#">Export as Excel</a></li>
                                    <li><a class="dropdown-item" href="#">Export as CSV</a></li>
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
                                        <th>name</th>
                                        <th>property type</th>
                                        <th>address</th>
                                        <th>total_units</th>
                                        <th>base rent</th>
                                        <th>description</th>
                                        <th>property feature</th>

                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994?w=100&h=60&fit=crop" 
                                                     class="rounded me-3" width="40" height="40">
                                                <div>
                                                    <strong>Sunset Villa</strong>
                                                    <div class="text-muted small">123 Sunset Blvd</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div>8 Units</div>
                                            <div class="progress progress-bar-custom mt-1">
                                                <div class="progress-bar bg-success" style="width: 87%"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <strong class="text-success">87%</strong>
                                            <div class="text-muted small">7/8 occupied</div>
                                        </td>
                                        <td>$1,450</td>
                                        <td>$10,150</td>
                                        <td><span class="status-badge bg-success">Published</span></td>
                                        <td>
                                            <div class="property-actions">
                                                <button class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-secondary">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-info">
                                                    <i class="fas fa-chart-bar"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://images.unsplash.com/photo-1513584684374-8bab748fbf90?w=100&h=60&fit=crop" 
                                                     class="rounded me-3" width="40" height="40">
                                                <div>
                                                    <strong>Garden Apartments</strong>
                                                    <div class="text-muted small">456 Garden St</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div>12 Units</div>
                                            <div class="progress progress-bar-custom mt-1">
                                                <div class="progress-bar bg-success" style="width: 92%"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <strong class="text-success">92%</strong>
                                            <div class="text-muted small">11/12 occupied</div>
                                        </td>
                                        <td>$1,200</td>
                                        <td>$13,200</td>
                                        <td><span class="status-badge bg-success">Published</span></td>
                                        <td>
                                            <div class="property-actions">
                                                <button class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-secondary">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-info">
                                                    <i class="fas fa-chart-bar"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                   @forelse($data as $i=>$d)
                                   <tr>
                                    <td>{{$i++}}</td>
                                    <td>@if ($d->image_url)
                                        <img src="{{asset('uploads/'.$d->image_url)}}" alt="" width="80">
                                             @endif
                                    </td>
                                    <td>{{$d->name}}</td>
                                    <td>{{$d->property_type}}</td>
                                    <td>{{$d->address}}</td>
                                    <td>{{$d->total_units}}</td>
                                    <td>{{$d->base_rent}}</td>
                                    <td>{{$d->property_feature}}</td>
                                    <td><div class="property-actions">
                                                <button class="btn btn-sm btn-outline-primary" onclick="window.location.href='{{route('property.show',$d->id)}}'" >
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-secondary" onclick=window.location.href="{{route('property.edit',$d->id)}}" >
                                                    <i class="fas fa-edit"  ></i>
                                                </button>

                                                <form action="{{route('property.destroy',$d->id)}}" method="POST" style="display:inline;" >
                                                    @csrf 
                                                    @method('delete')

                                                <button class="btn btn-sm btn-outline-info">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                            </form>
                                   </tr>

                                        @empty
                                        <tr>
                                            <td> no data found</td>
                                        </tr>
                                        @endforelse

                                   
                                </tbody>
                            </table>
                        </div>
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
                                <strong>Garden Apartments</strong>
                                <span class="text-success">92% occupancy</span>
                            </div>
                            <div class="progress progress-bar-custom mt-1">
                                <div class="progress-bar bg-success" style="width: 92%"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Highest Revenue</label>
                            <div class="d-flex justify-content-between align-items-center">
                                <strong>City View Loft</strong>
                                <span class="text-info">$1,800 avg rent</span>
                            </div>
                            <div class="progress progress-bar-custom mt-1">
                                <div class="progress-bar bg-info" style="width: 90%"></div>
                            </div>
                        </div>
                        <div>
                            <label class="form-label">Needs Attention</label>
                            <div class="d-flex justify-content-between align-items-center">
                                <strong>City View Loft</strong>
                                <span class="text-warning">67% occupancy</span>
                            </div>
                            <div class="progress progress-bar-custom mt-1">
                                <div class="progress-bar bg-warning" style="width: 67%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Properties -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Recent Properties</h5>
                        <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
                    </div>
                    <div class="card-body">
                        <!-- Property Card 1 -->
                        <div class="property-card card mb-3">
                            <img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994?w=400&h=200&fit=crop" 
                                 class="property-image" alt="Sunset Villa">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="card-title mb-0">Sunset Villa</h5>
                                    <span class="status-badge bg-success">Published</span>
                                </div>
                                <p class="text-muted small mb-3">123 Sunset Blvd, Beverly Hills</p>
                                <div class="row text-center mb-3">
                                    <div class="col-4">
                                        <div class="text-primary fw-bold">8</div>
                                        <div class="text-muted small">Units</div>
                                    </div>
                                    <div class="col-4">
                                        <div class="text-success fw-bold">87%</div>
                                        <div class="text-muted small">Occupied</div>
                                    </div>
                                    <div class="col-4">
                                        <div class="text-info fw-bold">$1,450</div>
                                        <div class="text-muted small">Avg Rent</div>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap mb-3">
                                    <span class="feature-badge">Parking</span>
                                    <span class="feature-badge">Gym</span>
                                    <span class="feature-badge">Pool</span>
                                </div>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary btn-sm">View Details</button>
                                </div>
                            </div>
                        </div>

                        <!-- Property Card 2 -->
                        <div class="property-card card">
                            <img src="https://images.unsplash.com/photo-1513584684374-8bab748fbf90?w=400&h=200&fit=crop" 
                                 class="property-image" alt="Garden Apartments">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="card-title mb-0">Garden Apartments</h5>
                                    <span class="status-badge bg-success">Published</span>
                                </div>
                                <p class="text-muted small mb-3">456 Garden Street, Santa Monica</p>
                                <div class="row text-center mb-3">
                                    <div class="col-4">
                                        <div class="text-primary fw-bold">12</div>
                                        <div class="text-muted small">Units</div>
                                    </div>
                                    <div class="col-4">
                                        <div class="text-success fw-bold">92%</div>
                                        <div class="text-muted small">Occupied</div>
                                    </div>
                                    <div class="col-4">
                                        <div class="text-info fw-bold">$1,200</div>
                                        <div class="text-muted small">Avg Rent</div>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap mb-3">
                                    <span class="feature-badge">Laundry</span>
                                    <span class="feature-badge">Garden</span>
                                    <span class="feature-badge">Pet Friendly</span>
                                </div>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary btn-sm">View Details</button>
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
                        <i class="fas fa-building me-2"></i>Add New Property
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="propertyForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="propertyName" class="form-label">Property Name *</label>
                                    <input type="text" class="form-control" id="propertyName" placeholder="e.g., Sunset Villa" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="propertyType" class="form-label">Property Type</label>
                                    <select class="form-select" id="propertyType">
                                        <option value="apartment">Apartment Building</option>
                                        <option value="house">Single Family Home</option>
                                        <option value="townhouse">Townhouse</option>
                                        <option value="condo">Condominium</option>
                                        <option value="commercial">Commercial</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="propertyAddress" class="form-label">Address *</label>
                            <textarea class="form-control" id="propertyAddress" rows="2" placeholder="Full property address" required></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="totalUnits" class="form-label">Total Units</label>
                                    <input type="number" class="form-control" id="totalUnits" value="1" min="1">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="baseRent" class="form-label">Base Rent ($)</label>
                                    <input type="number" class="form-control" id="baseRent" placeholder="0.00" step="0.01">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="securityDeposit" class="form-label">Security Deposit ($)</label>
                                    <input type="number" class="form-control" id="securityDeposit" placeholder="0.00" step="0.01">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="propertyDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="propertyDescription" rows="3" placeholder="Describe the property features and amenities..."></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Property Features</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="parking">
                                        <label class="form-check-label" for="parking">Parking</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gym">
                                        <label class="form-check-label" for="gym">Gym</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="pool">
                                        <label class="form-check-label" for="pool">Swimming Pool</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="laundry">
                                        <label class="form-check-label" for="laundry">Laundry</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="pets">
                                        <label class="form-check-label" for="pets">Pet Friendly</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="security">
                                        <label class="form-check-label" for="security">Security</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="propertyPhotos" class="form-label">Upload Photos</label>
                            <input type="file" class="form-control" id="propertyPhotos" multiple accept="image/*">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i>Save Property
                    </button>
                </div>
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
                <div class="modal-body">
                    <form id="unitForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="propertySelect" class="form-label">Property *</label>
                                    <select class="form-select" id="propertySelect" required>
                                        <option value="" selected disabled>Select a property</option>
                                        <option value="sunset-villa">Sunset Villa</option>
                                        <option value="garden-apartments">Garden Apartments</option>
                                        <option value="city-view-loft">City View Loft</option>
                                        <option value="lakeside-residence">Lakeside Residence</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="unitNumber" class="form-label">Unit Number *</label>
                                    <input type="text" class="form-control" id="unitNumber" placeholder="e.g., 101, A1, etc." required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="unitType" class="form-label">Unit Type</label>
                                    <select class="form-select" id="unitType">
                                        <option value="studio">Studio</option>
                                        <option value="1-bedroom">1 Bedroom</option>
                                        <option value="2-bedroom" selected>2 Bedroom</option>
                                        <option value="3-bedroom">3 Bedroom</option>
                                        <option value="4-bedroom">4 Bedroom</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="bathrooms" class="form-label">Bathrooms</label>
                                    <select class="form-select" id="bathrooms">
                                        <option value="1">1 Bathroom</option>
                                        <option value="1.5">1.5 Bathrooms</option>
                                        <option value="2" selected>2 Bathrooms</option>
                                        <option value="2.5">2.5 Bathrooms</option>
                                        <option value="3">3+ Bathrooms</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="squareFootage" class="form-label">Square Footage</label>
                                    <input type="number" class="form-control" id="squareFootage" placeholder="e.g., 850">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="monthlyRent" class="form-label">Monthly Rent ($) *</label>
                                    <input type="number" class="form-control" id="monthlyRent" placeholder="0.00" step="0.01" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="securityDepositUnit" class="form-label">Security Deposit ($)</label>
                                    <input type="number" class="form-control" id="securityDepositUnit" placeholder="0.00" step="0.01">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="unitDescription" class="form-label">Unit Description</label>
                            <textarea class="form-control" id="unitDescription" rows="3" placeholder="Describe the unit features, condition, and any special details..."></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Unit Features</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="unitParking">
                                        <label class="form-check-label" for="unitParking">Parking Space</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="unitBalcony">
                                        <label class="form-check-label" for="unitBalcony">Balcony/Patio</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="unitFireplace">
                                        <label class="form-check-label" for="unitFireplace">Fireplace</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="unitWasherDryer">
                                        <label class="form-check-label" for="unitWasherDryer">In-Unit Washer/Dryer</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="unitCentralAC">
                                        <label class="form-check-label" for="unitCentralAC">Central A/C</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="unitHardwood">
                                        <label class="form-check-label" for="unitHardwood">Hardwood Floors</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="unitPhotos" class="form-label">Upload Unit Photos</label>
                            <input type="file" class="form-control" id="unitPhotos" multiple accept="image/*">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveUnitBtn">
                        <i class="fas fa-save me-1"></i>Save Unit
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
   