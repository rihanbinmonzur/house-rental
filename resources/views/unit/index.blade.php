<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Management Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            padding: 20px;
        }
        
        .dashboard-header {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            margin-bottom: 25px;
        }
        
        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s;
            margin-bottom: 20px;
            cursor: pointer;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-card i {
            font-size: 2rem;
            margin-bottom: 15px;
        }
        
        .card-available {
            border-left: 4px solid #4cc9f0;
        }
        
        .card-occupied {
            border-left: 4px solid #f72585;
        }
        
        .card-maintenance {
            border-left: 4px solid #ff9e00;
        }
        
        .card-total {
            border-left: 4px solid #7209b7;
        }
        
        .unit-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s;
            margin-bottom: 20px;
        }
        
        .unit-card:hover {
            transform: translateY(-5px);
        }
        
        .unit-image {
            height: 180px;
            background-size: cover;
            background-position: center;
        }
        
        .status-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        
        .badge-available {
            background-color: #4cc9f0;
            color: white;
        }
        
        .badge-occupied {
            background-color: #f72585;
            color: white;
        }
        
        .badge-maintenance {
            background-color: #ff9e00;
            color: white;
        }
        
        .filter-section {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            margin-bottom: 25px;
        }
        
        .feature-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .feature-list li {
            margin-bottom: 5px;
            font-size: 0.9rem;
        }
        
        .feature-list li i {
            color: var(--primary);
            margin-right: 5px;
        }
        
        .rent-amount {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
        }
        
        .action-buttons {
            display: flex;
            gap: 8px;
            margin-top: 15px;
        }
        
        .action-buttons .btn {
            flex: 1;
        }
        
        .table-container {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            margin-bottom: 25px;
        }
        
        .table th {
            border-top: none;
            font-weight: 600;
            color: var(--primary);
        }
        
        .table-actions {
            display: flex;
            gap: 5px;
        }
        
        .table-actions .btn {
            padding: 5px 10px;
        }
        
        .modal-content {
            border-radius: 10px;
            border: none;
        }
        
        .modal-header {
            background-color: var(--primary);
            color: white;
            border-radius: 10px 10px 0 0;
        }
        
        .maintenance-request-card {
            background: white;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            margin-bottom: 15px;
            border-left: 4px solid #ff9e00;
        }
        
        .maintenance-priority-high {
            border-left-color: #e63946;
        }
        
        .maintenance-priority-medium {
            border-left-color: #ff9e00;
        }
        
        .maintenance-priority-low {
            border-left-color: #4cc9f0;
        }
        
        .repairman-card {
            background: white;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            margin-bottom: 15px;
            text-align: center;
        }
        
        .repairman-card img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }
        
        .unit-photo {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            object-fit: cover;
            border: 2px solid #e9ecef;
        }
        
        .photo-placeholder {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px dashed #dee2e6;
            color: #6c757d;
        }
        
        .new-service-form {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
        }
        
        @media (max-width: 768px) {
            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h3 mb-0">Property Management Dashboard</h1>
                <p class="text-muted mb-0">Landlord Portal - Manage your rental properties</p>
            </div>
            <div class="col-md-6 text-end">
                <div class="btn-group">
                    <a href="{{route('unit.create')}}">add new</a>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUnitModal">
                        <i class="fas fa-plus me-2"></i> Add New Unit
                    </button>
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#maintenanceModal">
                        <i class="fas fa-tools me-2"></i> Maintenance Requests
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Statistics Cards -->
    <div class="row">
        <div class="col-md-3">
            <div class="stat-card card-total">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="text-muted">Total Units</h3>
                        <h2 class="mb-0">1</h2>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-building text-purple"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card card-available">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="text-muted">Available</h3>
                        <h2 class="mb-0">1</h2>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-door-open text-info"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card card-occupied">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="text-muted">Occupied</h3>
                        <h2 class="mb-0">0</h2>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-user-friends text-danger"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card card-maintenance" data-bs-toggle="modal" data-bs-target="#maintenanceModal">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="text-muted">Maintenance</h3>
                        <h2 class="mb-0">0</h2>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-tools text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Units Table View -->
    <div class="table-container">
        <h4 class="mb-3">All Units</h4>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>ID</th>
                        <th>Property ID</th>
                        <th>Unit Number</th>
                        <th>Floor</th>
                        <th>Size</th>
                        <th>Bed/Bath</th>
                        <th>Rent Amount</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example Unit Row -->
                      @forelse($data as $i=> $d)
                    <tr>
                        <td>

                            <img src="{{$d->id}}" 
                                 alt="Unit 301" class="unit-photo">
                        </td>
                        <td>{{$d->id}}</td>
                        <td>{{$d->property_id }}</td>
                        <td>{{$d->unit_number}}</td>
                        <td>{{$d->floor}}</td>
                        <td>{{$d->size}}</td>
                        <td>{{$d->bedrooms}}</td>
                        <td>{{$d->bathrooms}}</td>
                        <td>{{$d->rent_amount}}</td>
                        <td><span class="badge bg-info">{{$d->status}}</span></td>
                        <td>
                            <div class="table-actions">
                                <button class="btn btn-sm btn-outline-primary" title="View">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-success" title="Edit" onclick=window.location.href="{{route('unit.edit',$d->id)}}">
                                    <i class="fas fa-edit"></i>
                                </button>

                                <form action="{{route('unit.destroy',$d->id)}}" method="post">
                                    @csrf 
                                    @method('delete')

                                     <button type="submit" class="btn btn-sm btn-outline-warning" title="Maintenance" data-bs-toggle="modal" data-bs-target="#maintenanceModal">
                                    <i class="fas fa-tools"></i>
                                </button>
                                </form>
                               
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td>no data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Units Grid View -->
    <h4 class="mb-3">Rental Units</h4>
    <div class="row">
        <!-- Example Unit Card -->
        <div class="col-md-6 col-lg-4">
            <div class="unit-card">
                <div class="position-relative">
                    <div class="unit-image"  >img src=""</div>
                    <span class="status-badge badge-available">Available</span>
                </div>
                <div class="p-3">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="mb-0">Unit #301</h5>
                        <div class="rent-amount">$1,850</div>
                    </div>
                    <p class="text-muted mb-2">Property 101 • Floor 3 • 850 sq ft</p>
                    <div class="d-flex justify-content-between mb-3">
                        <span><i class="fas fa-bed me-1"></i> 2 Bed</span>
                        <span><i class="fas fa-bath me-1"></i> 1 Bath</span>
                        <span><i class="fas fa-layer-group me-1"></i> Floor 3</span>
                    </div>
                    <div class="action-buttons">
                        <button class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-eye me-1"></i> View
                        </button>
                        <button class="btn btn-outline-success btn-sm">
                            <i class="fas fa-edit me-1"></i> Edit
                        </button>
                        <button class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#maintenanceModal">
                            <i class="fas fa-tools me-1"></i> Maintenance
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Add Unit Modal -->
    <div class="modal fade" id="addUnitModal" tabindex="-1" aria-labelledby="addUnitModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUnitModalLabel">Add New Unit</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addUnitForm">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="property_id" class="form-label">Property ID</label>
                                <input type="number" class="form-control" id="property_id" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="unit_number" class="form-label">Unit Number</label>
                                <input type="number" class="form-control" id="unit_number" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="floor" class="form-label">Floor</label>
                                <input type="number" class="form-control" id="floor" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="size" class="form-label">Size (sq ft)</label>
                                <input type="number" class="form-control" id="size" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="bedrooms" class="form-label">Bedrooms</label>
                                <input type="number" class="form-control" id="bedrooms" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="bathrooms" class="form-label">Bathrooms</label>
                                <input type="number" class="form-control" id="bathrooms" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="rent_amount" class="form-label">Rent Amount ($)</label>
                                <input type="number" class="form-control" id="rent_amount" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" required>
                                    <option value="available">Available</option>
                                    <option value="occupied">Occupied</option>
                                    <option value="maintenance">Maintenance</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="image_url" class="form-label">Image URL</label>
                            <input type="url" class="form-control" id="image_url" placeholder="https://example.com/image.jpg">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveUnitBtn">Save Unit</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Maintenance Modal -->
    <div class="modal fade" id="maintenanceModal" tabindex="-1" aria-labelledby="maintenanceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="maintenanceModalLabel">Maintenance Management</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="maintenanceTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="requests-tab" data-bs-toggle="tab" data-bs-target="#requests" type="button" role="tab">Maintenance Requests</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="new-request-tab" data-bs-toggle="tab" data-bs-target="#new-request" type="button" role="tab">New Request</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="repairmen-tab" data-bs-toggle="tab" data-bs-target="#repairmen" type="button" role="tab">Repair Personnel</button>
                        </li>
                    </ul>
                    
                    <div class="tab-content p-3" id="maintenanceTabsContent">
                        <!-- Maintenance Requests Tab -->
                        <div class="tab-pane fade show active" id="requests" role="tabpanel">
                            <h5>Active Maintenance Requests</h5>
                            
                            <div class="maintenance-request-card maintenance-priority-high">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6>Unit #108 - Plumbing Issue</h6>
                                        <p class="mb-1"><strong>Tenant:</strong> John Smith</p>
                                        <p class="mb-1"><strong>Issue:</strong> Leaking pipe under kitchen sink</p>
                                        <p class="mb-1"><strong>Reported:</strong> 2 days ago</p>
                                        <span class="badge bg-danger">High Priority</span>
                                    </div>
                                    <div class="text-end">
                                        <p class="mb-1"><strong>Status:</strong> <span class="text-warning">Pending Assignment</span></p>
                                        <button class="btn btn-sm btn-primary assign-repairman-btn">
                                            Assign Repairman
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- New Request Tab -->
                        <div class="tab-pane fade" id="new-request" role="tabpanel">
                            <h5>Create New Maintenance Request</h5>
                            <form id="maintenanceRequestForm">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="requestUnit" class="form-label">Select Unit</label>
                                        <select class="form-select" id="requestUnit" required>
                                            <option value="">Select Unit</option>
                                            <option value="1">Unit #301 (Property 101)</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="requestPriority" class="form-label">Priority Level</label>
                                        <select class="form-select" id="requestPriority" required>
                                            <option value="low">Low Priority</option>
                                            <option value="medium">Medium Priority</option>
                                            <option value="high">High Priority</option>
                                            <option value="emergency">Emergency</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="issueType" class="form-label">Issue Type</label>
                                    <select class="form-select" id="issueType" required>
                                        <option value="">Select Issue Type</option>
                                        <option value="plumbing">Plumbing</option>
                                        <option value="electrical">Electrical</option>
                                        <option value="appliance">Appliance</option>
                                        <option value="heating/cooling">Heating/Cooling</option>
                                        <option value="structural">Structural</option>
                                        <option value="pest">Pest Control</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="issueDescription" class="form-label">Issue Description</label>
                                    <textarea class="form-control" id="issueDescription" rows="4" placeholder="Please describe the issue in detail..." required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="tenantContact" class="form-label">Tenant Contact Information</label>
                                    <input type="text" class="form-control" id="tenantContact" placeholder="Name and phone number">
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="tenantAccess">
                                    <label class="form-check-label" for="tenantAccess">Tenant has granted access for repairs</label>
                                </div>
                            </form>
                            <div class="text-end">
                                <button type="button" class="btn btn-primary" id="submitRequestBtn">Submit Request</button>
                            </div>
                        </div>
                        
                        <!-- Repair Personnel Tab -->
                        <div class="tab-pane fade" id="repairmen" role="tabpanel">
                            <h5>Available Repair Personnel</h5>
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="repairman-card">
                                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Mike Johnson">
                                        <h6>Mike Johnson</h6>
                                        <p class="text-muted small">Plumbing Pros Inc.</p>
                                        <p class="small">Specializes in plumbing and pipe repairs</p>
                                        <div class="mb-2">
                                            <span class="badge bg-success">Available</span>
                                        </div>
                                        <button class="btn btn-sm btn-primary assign-btn">
                                            Assign to Job
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="repairman-card">
                                        <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Maria Garcia">
                                        <h6>Maria Garcia</h6>
                                        <p class="text-muted small">General Contracting Co.</p>
                                        <p class="small">Painting, drywall, and general repairs</p>
                                        <div class="mb-2">
                                            <span class="badge bg-success">Available</span>
                                        </div>
                                        <button class="btn btn-sm btn-primary assign-btn">
                                            Assign to Job
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Add New Repair Service Form -->
                            <div class="new-service-form">
                                <h5><i class="fas fa-plus-circle me-2"></i>Add New Repair Service</h5>
                                <form id="newRepairmanForm">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="companyName" class="form-label">Company Name</label>
                                            <input type="text" class="form-control" id="companyName" placeholder="Enter company name">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="contactName" class="form-label">Contact Person</label>
                                            <input type="text" class="form-control" id="contactName" placeholder="Enter contact name">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="specialization" class="form-label">Specialization</label>
                                            <select class="form-select" id="specialization">
                                                <option value="">Select specialization</option>
                                                <option value="plumbing">Plumbing</option>
                                                <option value="electrical">Electrical</option>
                                                <option value="hvac">HVAC</option>
                                                <option value="general">General Repairs</option>
                                                <option value="pest">Pest Control</option>
                                                <option value="painting">Painting</option>
                                                <option value="carpentry">Carpentry</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="phone" class="form-label">Phone Number</label>
                                            <input type="tel" class="form-control" id="phone" placeholder="Enter phone number">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="form-label">Email Address</label>
                                            <input type="email" class="form-control" id="email" placeholder="Enter email address">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="hourlyRate" class="form-label">Hourly Rate ($)</label>
                                            <input type="number" class="form-control" id="hourlyRate" placeholder="Enter hourly rate">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="serviceNotes" class="form-label">Service Notes</label>
                                        <textarea class="form-control" id="serviceNotes" rows="3" placeholder="Any additional notes about this service..."></textarea>
                                    </div>
                                    <div class="text-end">
                                        <button type="button" class="btn btn-success" id="addServiceBtn">
                                            <i class="fas fa-save me-2"></i>Add Service
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple form submission handlers
        document.getElementById('saveUnitBtn').addEventListener('click', function() {
            alert('Unit added successfully!');
            const modal = bootstrap.Modal.getInstance(document.getElementById('addUnitModal'));
            modal.hide();
            document.getElementById('addUnitForm').reset();
        });

        document.getElementById('submitRequestBtn').addEventListener('click', function() {
            alert('Maintenance request submitted successfully!');
            document.getElementById('maintenanceRequestForm').reset();
            
            // Switch back to requests tab
            const requestsTab = new bootstrap.Tab(document.getElementById('requests-tab'));
            requestsTab.show();
        });

        // Add new repair service
        document.getElementById('addServiceBtn').addEventListener('click', function() {
            const companyName = document.getElementById('companyName').value;
            const contactName = document.getElementById('contactName').value;
            
            if (companyName && contactName) {
                alert(`New repair service added: ${companyName} (${contactName})`);
                document.getElementById('newRepairmanForm').reset();
            } else {
                alert('Please fill in at least Company Name and Contact Person');
            }
        });

        // Handle assign repairman buttons
        document.querySelectorAll('.assign-repairman-btn').forEach(button => {
            button.addEventListener('click', function() {
                // Switch to repairmen tab
                const repairmenTab = new bootstrap.Tab(document.getElementById('repairmen-tab'));
                repairmenTab.show();
                alert('Please select a repair person for this job');
            });
        });

        document.querySelectorAll('.assign-btn').forEach(button => {
            button.addEventListener('click', function() {
                alert('Repairman has been assigned to the job!');
                
                // Switch back to requests tab
                const requestsTab = new bootstrap.Tab(document.getElementById('requests-tab'));
                requestsTab.show();
            });
        });

        // Simple view/edit functions
        function viewUnit(id) {
            alert(`Viewing unit ${id} details`);
        }

        function editUnit(id) {
            alert(`Editing unit ${id}`);
        }
    </script>
</body>
</html>