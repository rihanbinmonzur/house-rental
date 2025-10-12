<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenant Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .form-container {
            max-width: 900px;
            margin: 0 auto;
        }
        .form-section {
            background: #fff;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .section-title {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
            margin-bottom: 20px;
            font-weight: 600;
        }
        .profile-preview {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border: 3px solid #dee2e6;
            border-radius: 10px;
            cursor: pointer;
        }
        .required-field::after {
            content: " *";
            color: #e74c3c;
        }
        .form-control:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }
        .btn-primary {
            background: linear-gradient(135deg, #3498db, #2980b9);
            border: none;
            padding: 10px 30px;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #2980b9, #21618c);
            transform: translateY(-1px);
        }
    </style>
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="form-container">
            <!-- Header -->
            <div class="text-center mb-5">
                <h1 class="text-primary mb-3">
                    <i class="fas fa-user-plus me-2"></i>Tenant Registration
                </h1>
                <p class="text-muted">Fill in the form below to register as a new tenant</p>
            </div>

            <!-- Tenant Form -->
            <form action="{{route('tenant.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Personal Information Section -->
                <div class="form-section">
                    <h4 class="section-title">
                        
                        <i class="fas fa-user me-2"></i>Personal Information
                    </h4>
                    
                    <div class="row">
                        <!-- Left Column - Basic Info -->
                        <div class="col-md-8">
                            <div class="row">
                                <!-- Name -->
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label required-field">Full Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <input type="text" class="form-control" id="name" name="name" required 
                                               placeholder="Enter full name" maxlength="100">
                                    </div>
                                    <div class="form-text">Maximum 100 characters</div>
                                </div>

                                <!-- Email -->
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label required-field">Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                        <input type="email" class="form-control" id="email" name="email" required 
                                               placeholder="Enter email address">
                                    </div>
                                    <div class="form-text">Unique email address</div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Phone -->
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-phone"></i>
                                        </span>
                                        <input type="tel" class="form-control" id="phone" name="phone" 
                                               placeholder="Enter phone number" maxlength="20">
                                    </div>
                                    <div class="form-text">Optional, maximum 20 characters</div>
                                </div>

                                <!-- NID -->
                                <div class="col-md-6 mb-3">
                                    <label for="nid" class="form-label">National ID (NID)</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-id-card"></i>
                                        </span>
                                        <input type="text" class="form-control" id="nid" name="nid" 
                                               placeholder="Enter NID number">
                                    </div>
                                    <div class="form-text">Optional national identification number</div>
                                </div>
                            </div>

                            <!-- Employment Status -->
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="employment_status" class="form-label">Employment Status</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-briefcase"></i>
                                        </span>
                                        <select class="form-select" id="employment_status" name="employment_status">
                                            <option value="">Select Employment Status</option>
                                            <option value="gov.job">Government Job</option>
                                            <option value="prijob">Private Job</option>
                                            <option value="self_employed">Self Employed</option>
                                            <option value="student">Student</option>
                                            <option value="unemployed">Unemployed</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="password" class="form-label required-field">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                        <input type="password" class="form-control" id="password" name="password" required 
                                               placeholder="Enter password" >
                                    </div>
                                    <div class="form-text">Minimum 8 characters</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="password_confirmation" class="form-label required-field">Confirm Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required 
                                               placeholder="Confirm password">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column - Profile Photo -->
                        <div class="col-md-4 text-center">
                            <div class="mb-3">
                                <label class="form-label">Profile Photo</label>
                                <div class="position-relative d-inline-block">
                                    <img id="profilePreview" src="https://via.placeholder.com/150/dee2e6/6c757d?text=Upload+Photo" 
                                         alt="Profile Preview" class="profile-preview mb-2"
                                         onclick="document.getElementById('profile_photo').click()">
                                    <div class="position-absolute top-0 end-0">
                                        <span class="badge bg-primary">
                                            <i class="fas fa-camera"></i>
                                        </span>
                                    </div>
                                </div>
                                <input type="file" class="form-control d-none" id="profile_photo" name="profile_photo" 
                                       accept="image/*" onchange="previewImage(this)">
                                <div class="form-text">Click image to upload. JPG, PNG, GIF. Max 2MB</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Address Information Section -->
                <div class="form-section">
                    <h4 class="section-title">
                        <i class="fas fa-map-marker-alt me-2"></i>Address Information
                    </h4>
                    
                    <div class="mb-3">
                        <label for="address" class="form-label">Current Address</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-home"></i>
                            </span>
                            <textarea class="form-control" id="address" name="address" rows="4" 
                                      placeholder="Enter your complete current address..."></textarea>
                        </div>
                        <div class="form-text">Your current residential address</div>
                    </div>
                </div>

                <!-- Account Status Section -->
                <div class="form-section">
                    <h4 class="section-title">
                        <i class="fas fa-cog me-2"></i>Account Settings
                    </h4>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <label for="status" class="form-label">Account Status</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-user-check"></i>
                                </span>
                                <select class="form-select" id="status" name="status">
                                    <option value="active" selected>Active</option>
                                    <option value="suspended">Suspended</option>
                                    <option value="deleted">Deleted</option>
                                </select>
                            </div>
                            <div class="form-text">Set the initial account status</div>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-section text-center">
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="reset" class="btn btn-outline-secondary">
                            <i class="fas fa-redo me-1"></i> Reset Form
                        </button>
                        
                        <div>
                            <a href="index.html" class="btn btn-outline-danger me-3">
                                <i class="fas fa-times me-1"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Register Tenant
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Image preview function
        function previewImage(input) {
            const preview = document.getElementById('profilePreview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Form validation
        document.getElementById('tenantForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            
            // Password validation
            if (password !== confirmPassword) {
                alert('Passwords do not match!');
                return;
            }
            
          
            }

            // Email validation
            const email = document.getElementById('email').value;
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert('Please enter a valid email address!');
                return;
            }

            // Form is valid
            alert('Tenant registered successfully!');
            console.log('Form Data:', {
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                phone: document.getElementById('phone').value,
                nid: document.getElementById('nid').value,
                employment_status: document.getElementById('employment_status').value,
                address: document.getElementById('address').value,
                status: document.getElementById('status').value
            });
            
            // this.submit(); // Uncomment to actually submit the form
        });

        // Phone number formatting
        document.getElementById('phone').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            e.target.value = value;
        });

        // NID number formatting
        document.getElementById('nid').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            e.target.value = value;
        });
    </script>
</body>
</html>