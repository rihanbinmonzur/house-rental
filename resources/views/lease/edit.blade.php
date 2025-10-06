<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Lease - Lease Management Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --success: #4cc9f0;
            --light: #f8f9fa;
            --dark: #212529;
            --danger: #e63946;
            --warning: #fca311;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fb;
            overflow-x: hidden;
        }
        
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, var(--primary), var(--secondary));
            color: white;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            z-index: 100;
        }
        
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 12px 20px;
            margin: 4px 0;
            border-radius: 8px;
            transition: all 0.3s;
        }
        
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .sidebar .nav-link i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }
        
        .main-content {
            padding: 20px;
        }
        
        .dashboard-header {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }
        
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }
        
        .card-header {
            background-color: white;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            font-weight: 600;
            padding: 15px 20px;
            border-radius: 10px 10px 0 0 !important;
        }
        
        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
        }
        
        .btn-primary:hover {
            background-color: var(--secondary);
            border-color: var(--secondary);
        }
        
        .search-box {
            position: relative;
        }
        
        .search-box input {
            padding-left: 40px;
            border-radius: 20px;
        }
        
        .search-box i {
            position: absolute;
            left: 15px;
            top: 12px;
            color: #6c757d;
        }
        
        .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: var(--danger);
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .form-section {
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eaeaea;
        }
        
        .form-section-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--primary);
            display: flex;
            align-items: center;
        }
        
        .form-section-title i {
            margin-right: 10px;
        }
        
        .form-label {
            font-weight: 500;
            margin-bottom: 8px;
        }
        
        .required:after {
            content: " *";
            color: var(--danger);
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.25);
        }
        
        .terms-textarea {
            min-height: 150px;
            font-family: monospace;
            font-size: 0.9rem;
        }
        
        .preview-card {
            background-color: #f8f9fa;
            border-left: 4px solid var(--primary);
        }
        
        @media (max-width: 768px) {
            .sidebar {
                min-height: auto;
                width: 100%;
            }
            
            .main-content {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar p-0">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-4">
                    <h2 class="fw-bold mb-4 text-center w-100">
                        <i class="fas fa-home"></i> LeaseManager
                    </h2>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start w-100" id="menu">
                        <li class="w-100">
                            <a href="#" class="nav-link px-0">
                                <i class="fas fa-tachometer-alt"></i> <span class="ms-1">Dashboard</span>
                            </a>
                        </li>
                        <li class="w-100">
                            <a href="#" class="nav-link px-0 active">
                                <i class="fas fa-file-contract"></i> <span class="ms-1">Leases</span>
                            </a>
                        </li>
                        <li class="w-100">
                            <a href="#" class="nav-link px-0">
                                <i class="fas fa-building"></i> <span class="ms-1">Properties</span>
                            </a>
                        </li>
                        <li class="w-100">
                            <a href="#" class="nav-link px-0">
                                <i class="fas fa-users"></i> <span class="ms-1">Tenants</span>
                            </a>
                        </li>
                        <li class="w-100">
                            <a href="#" class="nav-link px-0">
                                <i class="fas fa-chart-line"></i> <span class="ms-1">Reports</span>
                            </a>
                        </li>
                        <li class="w-100">
                            <a href="#" class="nav-link px-0">
                                <i class="fas fa-cog"></i> <span class="ms-1">Settings</span>
                            </a>
                        </li>
                    </ul>
                    <hr class="w-100 text-white">
                    <div class="dropdown pb-4 w-100">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="Admin" width="30" height="30" class="rounded-circle me-2">
                            <span class="d-none d-sm-inline mx-1">Admin User</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 ms-sm-auto px-0">
                <!-- Top Navigation -->
                <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom px-4 py-3">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <div class="search-box me-3">
                                <i class="fas fa-search"></i>
                                <input type="text" class="form-control" placeholder="Search...">
                            </div>
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown me-3">
                                    <a class="nav-link position-relative" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-bell fa-lg"></i>
                                        <span class="notification-badge">3</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown">
                                        <li><a class="dropdown-item" href="#">New lease agreement signed</a></li>
                                        <li><a class="dropdown-item" href="#">Rent payment received</a></li>
                                        <li><a class="dropdown-item" href="#">Maintenance request submitted</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="user-profile me-2">
                                            <img src="https://github.com/mdo.png" alt="User">
                                        </div>
                                        <span>Admin User</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="#">Profile</a></li>
                                        <li><a class="dropdown-item" href="#">Settings</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="#">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                
                <!-- Main Content -->
                <div class="main-content">
                    <!-- Dashboard Header -->
                    <div class="dashboard-header">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h2 class="mb-0">Create New Lease</h2>
                                <p class="text-muted mb-0">Add a new lease agreement to the system</p>
                            </div>
                            <div class="col-md-6 text-end">
                                <a href="dashboard.html" class="btn btn-outline-secondary me-2">
                                    <i class="fas fa-arrow-left me-2"></i> Back to Dashboard
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Lease Form -->
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fas fa-file-contract me-2"></i> Lease Information
                                </div>
                                <div class="card-body">
                                    <form id="leaseForm" action="{{route('lease.update',$lease->id)}}" method="post" enctype="multipart/form-data" >
                                        @csrf
                                        @method('patch')
                                        <!-- Property & Tenant Information -->
                                        <div class="form-section">
                                            <div class="form-section-title">
                                                <i class="fas fa-building"></i> Property & Tenant Information
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="unit_id" class="form-label required">Property Unit</label>
                                                    <select class="form-select" id="unit_id" name="unit_id" required>
                                                        <option value="">Select a unit</option>
                                                        <option value="1" {{$less->unit_id ==1 ? 'selected' : ''}}  >Unit 1A - 123 Main St</option>
                                                        <option value="2" {{$less->unit_id ==2 ? 'selected' : ''}}>Unit 2B - 123 Main St</option>
                                                        <option value="3" {{$less->unit_id ==3 ? 'selected' : ''}}>Unit 3C - 456 Oak Ave</option>
                                                        <option value="4" {{$less->unit_id ==4 ? 'selected':''}}>Unit 4D - 456 Oak Ave</option>
                                                        <option value="5" {{$less->unit_id ==5 ? 'selected': ''}} >Unit 5E - 789 Pine Rd</option>
                                                    </select>
                                                    <div class="form-text">Select the property unit for this lease</div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="tenant_id" class="form-label required">Tenant</label>
                                                    <select class="form-select" id="tenant_id" name="tenant_id" required>
                                                        <option value="">Select a tenant</option>
                                                        <option value="1">John Smith (john@example.com)</option>
                                                        <option value="2">Emily Johnson (emily@example.com)</option>
                                                        <option value="3">Michael Brown (michael@example.com)</option>
                                                        <option value="4">Sarah Williams (sarah@example.com)</option>
                                                        <option value="5">David Miller (david@example.com)</option>
                                                    </select>
                                                    <div class="form-text">Select the tenant for this lease</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="landlord_id" class="form-label required">Landlord</label>
                                                    <select class="form-select" id="landlord_id" name="landlord_id" required>
                                                        <option value="">Select a landlord</option>
                                                        <option value="1">Robert Wilson (robert@example.com)</option>
                                                        <option value="2">Jennifer Lee (jennifer@example.com)</option>
                                                        <option value="3">James Anderson (james@example.com)</option>
                                                    </select>
                                                    <div class="form-text">Select the landlord for this property</div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="status" class="form-label required">Lease Status</label>
                                                    <select class="form-select" id="status" name="status" required>
                                                        <option value="">Select status</option>
                                                        <option value="active">Active</option>
                                                        <option value="pending">Pending</option>
                                                        <option value="cancelled">Cancelled</option>
                                                        <option value="ended">Ended</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Lease Dates -->
                                        <div class="form-section">
                                            <div class="form-section-title">
                                                <i class="fas fa-calendar-alt"></i> Lease Dates
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="start_date" class="form-label required">Start Date</label>
                                                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="end_date" class="form-label required">End Date</label>
                                                    <input type="date" class="form-control" id="end_date" name="end_date" required>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Financial Information -->
                                        <div class="form-section">
                                            <div class="form-section-title">
                                                <i class="fas fa-money-bill-wave"></i> Financial Information
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="rent_amount" class="form-label required">Monthly Rent ($)</label>
                                                    <input type="number" class="form-control" id="rent_amount" name="rent_amount" min="0" step="0.01" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="rent_due_day" class="form-label required">Rent Due Day</label>
                                                    <select class="form-select" id="rent_due_day" name="rent_due_day" required>
                                                        <option value="">Select day of month</option>
                                                        <option value="1">1st of the month</option>
                                                        <option value="5">5th of the month</option>
                                                        <option value="10">10th of the month</option>
                                                        <option value="15">15th of the month</option>
                                                        <option value="20">20th of the month</option>
                                                        <option value="25">25th of the month</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="security_deposit" class="form-label">Security Deposit ($)</label>
                                                    <input type="number" class="form-control" id="security_deposit" name="security_deposit" min="0" step="0.01">
                                                    <div class="form-text">Typically equal to one month's rent</div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="late_fee" class="form-label">Late Fee ($)</label>
                                                    <input type="number" class="form-control" id="late_fee" name="late_fee" min="0" step="0.01">
                                                    <div class="form-text">Fee charged for late rent payment</div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Lease Terms -->
                                        <div class="form-section">
                                            <div class="form-section-title">
                                                <i class="fas fa-file-alt"></i> Lease Terms & Conditions
                                            </div>
                                            <div class="mb-3">
                                                <label for="terms" class="form-label">Lease Terms</label>
                                                <textarea class="form-control terms-textarea" id="terms" name="terms" rows="6" placeholder="Enter lease terms and conditions..."></textarea>
                                                <div class="form-text">Specify any additional terms and conditions for this lease</div>
                                            </div>
                                        </div>
                                        
                                        <!-- Form Actions -->
                                        <div class="d-flex justify-content-between mt-4">
                                            <button type="button" class="btn btn-outline-secondary" id="resetBtn">
                                                <i class="fas fa-redo me-2"></i> Reset Form
                                            </button>
                                            <div>
                                                <button type="button" class="btn btn-outline-primary me-2" id="previewBtn">
                                                    <i class="fas fa-eye me-2"></i> Preview
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-save me-2"></i> Create Lease
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Preview & Help Section -->
                        <div class="col-lg-4">
                            <!-- Preview Card -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-eye me-2"></i> Lease Preview
                                </div>
                                <div class="card-body">
                                    <div id="leasePreview" class="preview-card p-3">
                                        <p class="text-muted mb-0">Fill out the form to see a preview of the lease information</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Help Card -->
                            <div class="card">
                                <div class="card-header">
                                    <i class="fas fa-info-circle me-2"></i> Creating a New Lease
                                </div>
                                <div class="card-body">
                                    <h6>Required Information</h6>
                                    <ul class="small">
                                        <li>Select a property unit and tenant</li>
                                        <li>Specify lease start and end dates</li>
                                        <li>Set the monthly rent amount</li>
                                        <li>Choose a rent due day</li>
                                        <li>Select the lease status</li>
                                    </ul>
                                    
                                    <h6>Tips</h6>
                                    <ul class="small">
                                        <li>Security deposit is typically one month's rent</li>
                                        <li>Late fees encourage timely payments</li>
                                        <li>Clear terms help prevent disputes</li>
                                        <li>Double-check all dates before submitting</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <!-- <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="successModalLabel">
                        <i class="fas fa-check-circle me-2"></i> Lease Created Successfully
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>The new lease has been successfully created and added to the system.</p>
                    <div class="alert alert-info">
                        <strong>Next Steps:</strong>
                        <ul class="mb-0 mt-2">
                            <li>Notify the tenant about the new lease</li>
                            <li>Prepare the lease agreement document</li>
                            <li>Schedule a signing appointment</li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="{{}}" class="btn btn-primary">Go to Dashboard</a>
                </div>
            </div>
        </div>
    </div> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('leaseForm');
            const resetBtn = document.getElementById('resetBtn');
            const previewBtn = document.getElementById('previewBtn');
            const previewContainer = document.getElementById('leasePreview');
            const successModal = new bootstrap.Modal(document.getElementById('successModal'));
            
            // Form reset functionality
            resetBtn.addEventListener('click', function() {
                if (confirm('Are you sure you want to reset the form? All entered data will be lost.')) {
                    form.reset();
                    updatePreview();
                }
            });
            
            // Preview functionality
            previewBtn.addEventListener('click', function() {
                updatePreview();
            });
            
            // Update preview based on form values
            function updatePreview() {
                const formData = new FormData(form);
                const unitText = document.querySelector('#unit_id option:checked').text || 'Not selected';
                const tenantText = document.querySelector('#tenant_id option:checked').text || 'Not selected';
                const landlordText = document.querySelector('#landlord_id option:checked').text || 'Not selected';
                
                let previewHTML = `
                    <h6 class="mb-3">Lease Summary</h6>
                    <div class="row mb-2">
                        <div class="col-5"><strong>Property:</strong></div>
                        <div class="col-7">${unitText}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-5"><strong>Tenant:</strong></div>
                        <div class="col-7">${tenantText}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-5"><strong>Landlord:</strong></div>
                        <div class="col-7">${landlordText}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-5"><strong>Status:</strong></div>
                        <div class="col-7">${formData.get('status') || 'Not set'}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-5"><strong>Lease Period:</strong></div>
                        <div class="col-7">${formData.get('start_date') || 'Not set'} to ${formData.get('end_date') || 'Not set'}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-5"><strong>Monthly Rent:</strong></div>
                        <div class="col-7">${formData.get('rent_amount') ? '$' + formData.get('rent_amount') : 'Not set'}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-5"><strong>Rent Due Day:</strong></div>
                        <div class="col-7">${formData.get('rent_due_day') ? formData.get('rent_due_day') + ' of month' : 'Not set'}</div>
                    </div>
                `;
                
                previewContainer.innerHTML = previewHTML;
            }
            
            // Form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Basic validation
                const requiredFields = form.querySelectorAll('[required]');
                let isValid = true;
                
                requiredFields.forEach(field => {
                    if (!field.value) {
                        isValid = false;
                        field.classList.add('is-invalid');
                    } else {
                        field.classList.remove('is-invalid');
                    }
                });
                
                if (!isValid) {
                    alert('Please fill in all required fields.');
                    return;
                }
                
                // In a real application, you would send the data to the server here
                // For this demo, we'll just show the success modal
                successModal.show();
            });
            
            // Auto-update preview when form values change
            const formInputs = form.querySelectorAll('input, select, textarea');
            formInputs.forEach(input => {
                input.addEventListener('change', updatePreview);
                input.addEventListener('keyup', updatePreview);
            });
            
            // Initialize the preview
            updatePreview();
        });
    </script>
</body>
</html>