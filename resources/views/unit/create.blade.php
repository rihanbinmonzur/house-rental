<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apartment Unit Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 20px;
            padding-bottom: 40px;
        }
        .form-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 30px;
        }
        .header-section {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 1px solid #eaeaea;
            padding-bottom: 20px;
        }
        .header-section h1 {
            color: #2c3e50;
            font-weight: 600;
        }
        .header-section p {
            color: #7f8c8d;
            margin-bottom: 0;
        }
        .form-section {
            margin-bottom: 25px;
        }
        .form-section h5 {
            color: #3498db;
            border-bottom: 1px solid #eaeaea;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .required-field::after {
            content: " *";
            color: #e74c3c;
        }
        .feature-tag {
            display: inline-block;
            background-color: #e8f4fc;
            color: #3498db;
            padding: 5px 10px;
            border-radius: 20px;
            margin: 5px;
            font-size: 0.85rem;
        }
        .feature-tag i {
            margin-right: 5px;
        }
        .preview-image {
            max-width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 5px;
            margin-top: 10px;
            border: 1px solid #ddd;
        }
        .btn-submit {
            background-color: #3498db;
            border-color: #3498db;
            padding: 10px 30px;
            font-weight: 600;
        }
        .btn-submit:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }
        .form-footer {
            text-align: center;
            margin-top: 30px;
            color: #7f8c8d;
            font-size: 0.9rem;
        }
        .unit-card {
            border: 1px solid #eaeaea;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
        }
        .unit-card h6 {
            color: #2c3e50;
            margin-bottom: 10px;
        }
        .file-upload-container {
            border: 2px dashed #dee2e6;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
            background-color: #f8f9fa;
            transition: all 0.3s;
        }
        .file-upload-container:hover {
            border-color: #3498db;
            background-color: #e8f4fc;
        }
        .file-upload-label {
            cursor: pointer;
            display: block;
        }
        .file-upload-icon {
            font-size: 48px;
            color: #6c757d;
            margin-bottom: 10px;
        }
        .file-input {
            display: none;
        }
        .file-name {
            margin-top: 10px;
            font-size: 0.9rem;
            color: #495057;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="form-container">
                    <div class="header-section">
                        <h1><i class="fas fa-building me-2"></i>Apartment Unit Management</h1>
                        <p>Add or update apartment unit information</p>
                    </div>

                    <form method="post" action="{{route('unit.store')}}" enctype="multipart/form-data">
                        @csrf
                        <!-- Basic Information Section -->
                        <div class="form-section">
                            <h5><i class="fas fa-info-circle me-2"></i>Basic Information</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="property_id" class="form-label required-field">Property ID</label>88
                                    <input type="number" class="form-control" id="property_id" name="property_id" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="unit_number" class="form-label required-field">Unit Number</label>
                                    <input type="number" class="form-control" id="unit_number" name="unit_number" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="floor" class="form-label required-field">Floor</label>
                                    <input type="number" class="form-control" id="floor" name="floor" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="size" class="form-label required-field">Size (sq ft)</label>
                                    <input type="number" class="form-control" id="size" name="size" required>
                                </div>
                            </div>
                        </div>

                        <!-- Unit Details Section -->
                        <div class="form-section">
                            <h5><i class="fas fa-home me-2"></i>Unit Details</h5>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="bedrooms" class="form-label">Bedrooms</label>
                                    <select class="form-select" id="bedrooms" name="bedrooms">
                                        <option value="0">0</option>
                                        <option value="1" selected>1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5+</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="bathrooms" class="form-label">Bathrooms</label>
                                    <select class="form-select" id="bathrooms" name="bathrooms">
                                        <option value="1" selected>1</option>
                                     
                                        <option value="2">2</option>
                                     
    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="rent_amount" class="form-label required-field">Rent Amount ($)</label>
                                    <input type="number" class="form-control" id="rent_amount" name="rent_amount" required>
                                </div>
                            </div>
                        </div>

                        <!-- Status Section -->
                        <div class="form-section">
                            <h5><i class="fas fa-tag me-2"></i>Status</h5>
                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="available" value="available" checked>
                                    <label class="form-check-label" for="available">
                                        <i class="fas fa-check-circle text-success me-1"></i>Available
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="occupied" value="occupied">
                                    <label class="form-check-label" for="occupied">
                                        <i class="fas fa-user text-primary me-1"></i>Occupied
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="maintenance" value="maintenance">
                                    <label class="form-check-label" for="maintenance">
                                        <i class="fas fa-tools text-warning me-1"></i>Maintenance
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Image Section -->
                        <div class="form-section">
                            <h5><i class="fas fa-image me-2"></i>Unit Image</h5>
                            <div class="mb-3">
                                <div class="file-upload-container">
                                    <label for="image_file" class="file-upload-label">
                                        <div class="file-upload-icon">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                        </div>
                                        <div class="mb-2">
                                            <span class="fw-bold">Click to upload</span> or drag and drop
                                        </div>
                                        <div class="text-muted small">
                                            PNG, JPG, GIF up to 5MB
                                        </div>
                                    </label>
                                    <input type="file" class="file-input" id="image_file" name="image_url" accept="image/*">
                                    <div id="fileName" class="file-name"></div>
                                </div>
                                <div id="imagePreview" class="text-center mt-3" style="display: none;">
                                    <img id="previewImg" src="" alt="Unit Preview" class="preview-image">
                                </div>
                            </div>
                        </div>

                        <!-- Features Section -->
                        <div class="form-section">
                            <h5><i class="fas fa-star me-2"></i>Unit Features</h5>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="feature_balcony" name="features[]" value="balcony">
                                            <label class="form-check-label" for="feature_balcony">
                                                Balcony/Patio
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="feature_parking" name="features[]" value="parking">
                                            <label class="form-check-label" for="feature_parking">
                                                Parking Space
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="feature_laundry" name="features[]" value="laundry">
                                            <label class="form-check-label" for="feature_laundry">
                                                In-unit Laundry
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="feature_ac" name="features[]" value="ac">
                                            <label class="form-check-label" for="feature_ac">
                                                Air Conditioning
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="feature_pet" name="features[]" value="pet_friendly">
                                            <label class="form-check-label" for="feature_pet">
                                                Pet Friendly
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="feature_furnished" name="features[]" value="furnished">
                                            <label class="form-check-label" for="feature_furnished">
                                                Furnished
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="feature_gym" name="features[]" value="gym_access">
                                            <label class="form-check-label" for="feature_gym">
                                                Gym Access
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="feature_pool" name="features[]" value="pool_access">
                                            <label class="form-check-label" for="feature_pool">
                                                Pool Access
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="custom_features" class="form-label">Additional Features</label>
                                <textarea class="form-control" id="custom_features" name="custom_features" rows="2" placeholder="Enter any additional features separated by commas"></textarea>
                                <div class="form-text">Separate features with commas (e.g., Fireplace, Hardwood Floors, Walk-in Closet)</div>
                            </div>
                            <div id="featurePreview" class="mt-3">
                                <h6>Selected Features:</h6>
                                <div id="featureTags"></div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <button type="button" class="btn btn-outline-secondary me-md-2" id="resetBtn">Reset</button>
                            <button type="submit" class="btn btn-primary btn-submit">Save Unit</button>
                        </div>
                    </form>

                    <div class="form-footer">
                        <p><i class="far fa-copyright me-1"></i>2023 Property Management System</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // File upload functionality
        const fileInput = document.getElementById('image_file');
        const fileName = document.getElementById('fileName');
        const preview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');
        
        fileInput.addEventListener('change', function() {
            const file = this.files[0];
            
            if (file) {
                fileName.textContent = file.name;
                
                // Create a preview of the image
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                fileName.textContent = '';
                preview.style.display = 'none';
            }
        });

        // Drag and drop functionality
        const fileUploadContainer = document.querySelector('.file-upload-container');
        
        fileUploadContainer.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.style.borderColor = '#3498db';
            this.style.backgroundColor = '#e8f4fc';
        });
        
        fileUploadContainer.addEventListener('dragleave', function(e) {
            e.preventDefault();
            this.style.borderColor = '#dee2e6';
            this.style.backgroundColor = '#f8f9fa';
        });
        
        fileUploadContainer.addEventListener('drop', function(e) {
            e.preventDefault();
            this.style.borderColor = '#dee2e6';
            this.style.backgroundColor = '#f8f9fa';
            
            if (e.dataTransfer.files.length) {
                fileInput.files = e.dataTransfer.files;
                const event = new Event('change');
                fileInput.dispatchEvent(event);
            }
        });

        // Feature tags preview
        function updateFeatureTags() {
            const featureTags = document.getElementById('featureTags');
            featureTags.innerHTML = '';
            
            // Checkbox features
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    const tag = document.createElement('span');
                    tag.className = 'feature-tag';
                    tag.innerHTML = `<i class="fas fa-check"></i>${checkbox.nextElementSibling.textContent.trim()}`;
                    featureTags.appendChild(tag);
                }
            });
            
            // Custom features
            const customFeatures = document.getElementById('custom_features').value;
            if (customFeatures) {
                const features = customFeatures.split(',').map(f => f.trim()).filter(f => f);
                features.forEach(feature => {
                    const tag = document.createElement('span');
                    tag.className = 'feature-tag';
                    tag.innerHTML = `<i class="fas fa-plus"></i>${feature}`;
                    featureTags.appendChild(tag);
                });
            }
        }
        
        // Add event listeners to all checkboxes and custom features textarea
        document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
            checkbox.addEventListener('change', updateFeatureTags);
        });
        
        document.getElementById('custom_features').addEventListener('input', updateFeatureTags);
        
        // Form submission
     

        // Reset form
        document.getElementById('resetBtn').addEventListener('click', function() {
            document.getElementById('unitForm').reset();
            preview.style.display = 'none';
            fileName.textContent = '';
            updateFeatureTags();
        });
    </script>
</body>
</html>