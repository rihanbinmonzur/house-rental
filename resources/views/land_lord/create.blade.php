<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Landlord</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .form-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .profile-preview {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border: 3px solid #dee2e6;
            border-radius: 10px;
        }

        .required-field::after {
            content: " *";
            color: red;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container py-4">
        <div class="form-container">
            <!-- Header -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="h3 text-primary">
                            <i class="fas fa-user-plus me-2"></i>Add New Landlord
                        </h1>
                        <a href="{{ route('landlo.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Back to List
                        </a>
                    </div>
                </div>
            </div>

            <!-- Landlord Form -->
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-user-tie me-2"></i>Landlord Information
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('landlo.store') }}" method="post" enctype="multipart/form-data">
                        <!-- Basic Information -->
                        <div class="row mb-4">
                            <div class="col-md-8">
                                <h6 class="border-bottom pb-2 mb-3">Basic Information</h6>
                                @csrf
                                <!-- Name -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label required-field">Full Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            required placeholder="Enter full name" maxlength="100">
                                        <div class="form-text">Maximum 100 characters</div>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="email" class="form-label required-field">Email Address</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            required placeholder="Enter email address">
                                        <div class="form-text">Unique email address</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone" name="phone"
                                            placeholder="Enter phone number" maxlength="20">
                                        <div class="form-text">Optional, maximum 20 characters</div>
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="password" class="form-label required-field">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            required placeholder="Enter password">
                                        <div class="form-text">Minimum 8 characters</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="password_confirmation" class="form-label required-field">Confirm
                                            Password</label>
                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation" required placeholder="Confirm password">
                                    </div>
                                </div>
                            </div>

                            <!-- Profile Photo -->
                            <div class="col-md-4">
                                <h6 class="border-bottom pb-2 mb-3">Profile Photo</h6>
                                <div class="text-center">
                                    <img id="profilePreview"
                                        src="https://via.placeholder.com/120/dee2e6/6c757d?text=Upload+Photo"
                                        alt="Profile Preview" class="profile-preview mb-3">
                                    <div>
                                        <input type="file" class="form-control" id="profile_photo"
                                            name="profile_photo" accept="image/*" onchange="previewImage(this)">
                                        <div class="form-text">JPG, PNG, GIF. Max 2MB</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h6 class="border-bottom pb-2 mb-3">Address Information</h6>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter complete address"></textarea>
                                    <div class="form-text">Optional address information</div>
                                </div>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h6 class="border-bottom pb-2 mb-3">Account Status</h6>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status">
                                        <option value="active" selected>Active</option>
                                        <option value="suspended">Suspended</option>
                                        <option value="deleted">Deleted</option>
                                    </select>
                                    <div class="form-text">Set the initial account status</div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <button type="submit">save</button>
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <button type="reset" class="btn btn-outline-secondary">
                                        <i class="fas fa-redo me-1"></i> Reset Form
                                    </button>
                                    <div>
                                        <a href="index.html" class="btn btn-outline-danger me-2">
                                            <i class="fas fa-times me-1"></i> Cancel
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save me-1"></i> Save Landlord
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
        document.getElementById('landlordForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;

            if (password !== confirmPassword) {
                alert('Passwords do not match!');
                return;
            }



            // Form is valid - you can submit to server here
            alert('Landlord added successfully!');
            // this.submit(); // Uncomment to actually submit the form
        });

        // Phone number formatting (optional)
        document.getElementById('phone').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 0) {
                value = '+' + value;
            }
            e.target.value = value;
        });
    </script>
</body>

</html>
