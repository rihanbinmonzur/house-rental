<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Request Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --success-color: #2ecc71;
            --warning-color: #f39c12;
            --danger-color: #e74c3c;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 20px 0;
        }

        .maintenance-form-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 900px;
            margin: 0 auto;
        }

        .form-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 30px;
            text-align: center;
        }

        .form-header h2 {
            margin: 0;
            font-weight: 700;
        }

        .form-header p {
            margin: 10px 0 0 0;
            opacity: 0.9;
        }

        .form-body {
            padding: 40px;
        }

        .form-section {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e9ecef;
        }

        .form-section:last-of-type {
            border-bottom: none;
            margin-bottom: 0;
        }

        .section-title {
            color: var(--secondary-color);
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .section-title i {
            margin-right: 10px;
            background: var(--primary-color);
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
        }

        .form-control,
        .form-select,
        .form-textarea {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #e1e5e9;
            transition: all 0.3s;
        }

        .form-control:focus,
        .form-select:focus,
        .form-textarea:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }

        .form-textarea {
            min-height: 120px;
            resize: vertical;
        }

        .form-label {
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 8px;
        }

        .priority-option {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .priority-option:hover {
            border-color: var(--primary-color);
            background-color: #f8f9fa;
        }

        .priority-option.selected {
            border-color: var(--primary-color);
            background-color: rgba(52, 152, 219, 0.1);
        }

        .priority-low.selected {
            border-color: var(--success-color);
            background-color: rgba(46, 204, 113, 0.1);
        }

        .priority-medium.selected {
            border-color: var(--warning-color);
            background-color: rgba(243, 156, 18, 0.1);
        }

        .priority-high.selected {
            border-color: var(--danger-color);
            background-color: rgba(231, 76, 60, 0.1);
        }

        .priority-urgent.selected {
            border-color: #8e44ad;
            background-color: rgba(142, 68, 173, 0.1);
        }

        .priority-icon {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .priority-low .priority-icon {
            color: var(--success-color);
        }

        .priority-medium .priority-icon {
            color: var(--warning-color);
        }

        .priority-high .priority-icon {
            color: var(--danger-color);
        }

        .priority-urgent .priority-icon {
            color: #8e44ad;
        }

        .photo-preview-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 15px;
            margin-top: 15px;
        }

        .photo-preview {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .photo-preview img {
            width: 100%;
            height: 120px;
            object-fit: cover;
        }

        .photo-remove {
            position: absolute;
            top: 5px;
            right: 5px;
            background: rgba(231, 76, 60, 0.9);
            color: white;
            border: none;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            cursor: pointer;
        }

        .file-upload-area {
            border: 2px dashed #dee2e6;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            background: #f8f9fa;
            cursor: pointer;
            transition: all 0.3s;
        }

        .file-upload-area:hover {
            border-color: var(--primary-color);
            background: rgba(52, 152, 219, 0.05);
        }

        .file-upload-area.dragover {
            border-color: var(--primary-color);
            background: rgba(52, 152, 219, 0.1);
        }

        .upload-icon {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), #2980b9);
            border: none;
            border-radius: 8px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
        }

        .btn-outline-secondary {
            border-radius: 8px;
            padding: 12px 30px;
            font-weight: 600;
        }

        .form-footer {
            background: #f8f9fa;
            padding: 20px 40px;
            border-top: 1px solid #e9ecef;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .info-text {
            font-size: 0.85rem;
            color: #6c757d;
            margin-top: 5px;
        }

        .tenant-info-card {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            border-left: 4px solid var(--primary-color);
        }

        .tenant-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        @media (max-width: 768px) {
            .form-body {
                padding: 20px;
            }

            .form-footer {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .photo-preview-container {
                grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            }
        }

        .character-count {
            font-size: 0.8rem;
            text-align: right;
            color: #6c757d;
            margin-top: 5px;
        }

        .character-count.near-limit {
            color: var(--warning-color);
        }

        .character-count.over-limit {
            color: var(--danger-color);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="maintenance-form-container">
            <!-- Form Header -->
            <div class="form-header">
                <h2><i class="fas fa-tools me-2"></i>Maintenance Request</h2>
                <p>Report a maintenance issue in your rental unit</p>
            </div>

            <!-- Form Body -->
            <div class="form-body">
                <form action="{{ route('mainreq.store') }}" method="post" enctype="multipart/form-data"  >
                    @csrf
                    <!-- Tenant & Unit Information -->
                    <div class="form-section">
                        <h4 class="section-title">
                            <i class="fas fa-home"></i>
                            Unit Information
                        </h4>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="tenantSelect" class="form-label">Tenant *</label>
                                <select class="form-select" id="tenantSelect" name="tenant_id" required>
                                    <option value="">Select yourself...</option>

                                    <option value="104" data-units='["5"]'>David Wilson</option>
                                    <option value="105" data-units='["8"]'>Lisa Thompson</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="unitSelect" class="form-label">Unit *</label>
                                <select class="form-select" id="unitSelect" name="unit_id" required disabled>
                                    <option value="1">Select tenant first</option>
                                </select>
                            </div>
                        </div>

                        <!-- Tenant Info Display -->
                        <div class="tenant-info-card mt-3" id="tenantInfo" style="display: none;">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <img src="" alt="Tenant Avatar" class="tenant-avatar" id="tenantAvatar">
                                </div>
                                <div class="col">
                                    <h6 class="mb-1" id="tenantName">Tenant Name</h6>
                                    <p class="mb-1 text-muted" id="tenantEmail">email@example.com</p>
                                    <p class="mb-0 text-muted" id="tenantPhone">+1 (555) 123-4567</p>
                                </div>
                                <div class="col-auto">
                                    <span class="badge bg-primary" id="unitBadge">Unit 3B</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Issue Details -->
                    <div class="form-section">
                        <h4 class="section-title">
                            <i class="fas fa-exclamation-circle"></i>
                            Issue Details
                        </h4>

                        <div class="mb-3">
                            <label for="issueTitle" class="form-label">Issue Title *</label>
                            <input type="text" class="form-control" id="issueTitle"
                                placeholder="Brief description of the issue (e.g., Leaking Faucet, Broken AC)" required
                                maxlength="100" name="title">
                            <div class="character-count" id="titleCount">0/100 characters</div>
                        </div>

                        <div class="mb-3">
                            <label for="issueDescription" class="form-label">Detailed Description *</label>
                            <textarea class="form-textarea" id="issueDescription"
                                placeholder="Please provide a detailed description of the issue, including when it started, how it affects you, and any other relevant information..."
                                required maxlength="1000" name="description"></textarea>
                            <div class="character-count" id="descriptionCount">0/1000 characters</div>
                            <div class="info-text">Be as specific as possible to help us address the issue quickly</div>
                        </div>
                    </div>

                    <!-- Priority Level -->
                    <div class="form-section">
                        <h4 class="section-title">
                            <i class="fas fa-flag"></i>
                            Priority Level
                        </h4>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="priority-option priority-low" data-priority="low">
                                    <div class="priority-icon">
                                        <i class="fas fa-info-circle"></i>
                                    </div>
                                    <h6>Low Priority</h6>
                                    <p class="mb-0 small text-muted">Minor issues that don't affect daily living (e.g.,
                                        dripping faucet, loose cabinet handle)</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="priority-option priority-medium" data-priority="medium">
                                    <div class="priority-icon">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </div>
                                    <h6>Medium Priority</h6>
                                    <p class="mb-0 small text-muted">Issues that cause inconvenience (e.g., broken
                                        appliance, minor electrical issues)</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="priority-option priority-high" data-priority="high">
                                    <div class="priority-icon">
                                        <i class="fas fa-times-circle"></i>
                                    </div>
                                    <h6>High Priority</h6>
                                    <p class="mb-0 small text-muted">Issues affecting health/safety (e.g., no hot
                                        water, broken heater in winter)</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="priority-option priority-urgent" data-priority="urgent">
                                    <div class="priority-icon">
                                        <i class="fas fa-skull-crossbones"></i>
                                    </div>
                                    <h6>Urgent Priority</h6>
                                    <p class="mb-0 small text-muted">Emergency situations (e.g., flooding, gas leak, no
                                        power, broken locks)</p>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" id="priority" name="priority" required>
                    </div>

                    <!-- Photos -->
                    <div class="form-section">
                        <h4 class="section-title">
                            <i class="fas fa-camera"></i>
                            Photos (Optional)
                        </h4>

                        <div class="file-upload-area" id="fileUploadArea">
                            <div class="upload-icon">
                                <i class="fas fa-cloud-upload-alt"></i>
                            </div>
                            <h5>Upload Photos</h5>
                            <p class="text-muted mb-2">Drag & drop images here or click to browse</p>
                            <p class="small text-muted">Supported formats: JPG, PNG, GIF (Max: 5MB per file)</p>
                            <input type="file" id="photoUpload" name="image_url" multiple accept="image/*"
                                style="display: none;">
                            <input type="file"  name="image_url" multiple accept="image/*"
                                style="display: none;">
                        </div>
                                    <div>
                                        <label for="">photo</label>
                                         <input type="file"  name="image_url" multiple accept="image/*"
                                >
                                    </div>
                        <div class="photo-preview-container" id="photoPreviewContainer">
                            <!-- Photo previews will be added here -->
                        </div>
                    </div>

            </div>

            <!-- Form Footer -->
            <div class="form-footer">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="emergencyContact">
                    <label class="form-check-label" for="emergencyContact">
                        This is an emergency - contact me immediately
                    </label>
                </div>
                <div>
                    <button type="button" class="btn btn-outline-secondary me-2" id="resetBtn">
                        <i class="fas fa-redo me-1"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-primary" id="submitBtn">
                        <i class="fas fa-paper-plane me-1"></i> Submit Request
                    </button>
                </div>
            </div>
        </div>
    </div>
    </form>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-5">
                    <div class="mb-4">
                        <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
                    </div>
                    <h3 class="mb-3">Request Submitted!</h3>
                    <p class="mb-4">Your maintenance request has been received. We'll contact you shortly to schedule
                        the repair.</p>
                    <div class="mb-4 p-3 bg-light rounded">
                        <strong>Reference #: </strong><span id="referenceNumber">MR-2023-001</span>
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Submit Another
                        Request</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // DOM Elements
            const tenantSelect = document.getElementById('tenantSelect');
            const unitSelect = document.getElementById('unitSelect');
            const issueTitle = document.getElementById('issueTitle');
            const issueDescription = document.getElementById('issueDescription');
            const priorityOptions = document.querySelectorAll('.priority-option');
            const priorityInput = document.getElementById('priority');
            const photoUpload = document.getElementById('photoUpload');
            const fileUploadArea = document.getElementById('fileUploadArea');
            const photoPreviewContainer = document.getElementById('photoPreviewContainer');
            const tenantInfo = document.getElementById('tenantInfo');
            const tenantAvatar = document.getElementById('tenantAvatar');
            const tenantName = document.getElementById('tenantName');
            const tenantEmail = document.getElementById('tenantEmail');
            const tenantPhone = document.getElementById('tenantPhone');
            const unitBadge = document.getElementById('unitBadge');
            const resetBtn = document.getElementById('resetBtn');
            const submitBtn = document.getElementById('submitBtn');
            const form = document.getElementById('maintenanceRequestForm');
            const titleCount = document.getElementById('titleCount');
            const descriptionCount = document.getElementById('descriptionCount');
            const emergencyContact = document.getElementById('emergencyContact');

            // Sample data (in a real app, this would come from an API)
            const tenants = {



                '104': {
                    name: 'David Wilson',
                    email: 'david.w@example.com',
                    phone: '+1 (555) 456-7890',
                    avatar: 'https://randomuser.me/api/portraits/men/22.jpg',
                    units: {
                        '5': {
                            id: 304,
                            property: 'Sunset Apartments',
                            address: '123 Sunset Blvd, Los Angeles, CA'
                        }
                    }
                },
                '105': {
                    name: 'Lisa Thompson',
                    email: 'lisa.t@example.com',
                    phone: '+1 (555) 567-8901',
                    avatar: 'https://randomuser.me/api/portraits/women/45.jpg',
                    units: {
                        '8': {
                            id: 305,
                            property: 'Garden Villas',
                            address: '456 Garden St, San Francisco, CA'
                        }
                    }
                }
            };

            const units = {
                '3B': {
                    name: 'Unit 3B',
                    property: 'Sunset Apartments'
                },
                '12': {
                    name: 'Unit 12',
                    property: 'Garden Villas'
                },
                '7A': {
                    name: 'Unit 7A',
                    property: 'City Heights'
                },
                '5': {
                    name: 'Unit 5',
                    property: 'Sunset Apartments'
                },
                '8': {
                    name: 'Unit 8',
                    property: 'Garden Villas'
                }
            };

            // Store uploaded photos
            let uploadedPhotos = [];

            // Event Listeners
            tenantSelect.addEventListener('change', handleTenantChange);
            unitSelect.addEventListener('change', handleUnitChange);
            issueTitle.addEventListener('input', updateCharacterCount);
            issueDescription.addEventListener('input', updateCharacterCount);
            priorityOptions.forEach(option => {
                option.addEventListener('click', handlePrioritySelect);
            });
            fileUploadArea.addEventListener('click', () => photoUpload.click());
            fileUploadArea.addEventListener('dragover', handleDragOver);
            fileUploadArea.addEventListener('dragleave', handleDragLeave);
            fileUploadArea.addEventListener('drop', handleDrop);
            photoUpload.addEventListener('change', handlePhotoUpload);
            resetBtn.addEventListener('click', resetForm);
            submitBtn.addEventListener('click', submitForm);
            emergencyContact.addEventListener('change', handleEmergencyContact);

            // Functions
            function handleTenantChange() {
                const tenantId = tenantSelect.value;

                if (tenantId) {
                    // Enable unit select
                    unitSelect.disabled = false;

                    // Clear and populate unit select
                    unitSelect.innerHTML = '<option value="">Select your unit...</option>';

                    const tenant = tenants[tenantId];
                    const unitCodes = JSON.parse(tenantSelect.options[tenantSelect.selectedIndex].getAttribute(
                        'data-units'));

                    unitCodes.forEach(unitCode => {
                        const unit = units[unitCode];
                        const option = document.createElement('option');
                        option.value = unitCode;
                        option.textContent = `${unit.name} - ${unit.property}`;
                        unitSelect.appendChild(option);
                    });

                    // Show tenant info when unit is selected
                    if (unitCodes.length === 1) {
                        unitSelect.value = unitCodes[0];
                        handleUnitChange();
                    }
                } else {
                    // Reset form if no tenant selected
                    unitSelect.disabled = true;
                    unitSelect.innerHTML = '<option value="">Select tenant first</option>';
                    tenantInfo.style.display = 'none';
                }
            }

            function handleUnitChange() {
                const tenantId = tenantSelect.value;
                const unitCode = unitSelect.value;

                if (tenantId && unitCode) {
                    const tenant = tenants[tenantId];
                    const unit = tenant.units[unitCode];

                    // Show tenant info
                    tenantInfo.style.display = 'block';
                    tenantAvatar.src = tenant.avatar;
                    tenantName.textContent = tenant.name;
                    tenantEmail.textContent = tenant.email;
                    tenantPhone.textContent = tenant.phone;
                    unitBadge.textContent = `Unit ${unitCode}`;
                } else {
                    tenantInfo.style.display = 'none';
                }
            }

            function updateCharacterCount() {
                const titleLength = issueTitle.value.length;
                const descriptionLength = issueDescription.value.length;

                titleCount.textContent = `${titleLength}/100 characters`;
                descriptionCount.textContent = `${descriptionLength}/1000 characters`;

                // Update styling based on character count
                titleCount.className = 'character-count';
                descriptionCount.className = 'character-count';

                if (titleLength > 80) {
                    titleCount.classList.add('near-limit');
                }
                if (titleLength > 100) {
                    titleCount.classList.add('over-limit');
                }

                if (descriptionLength > 800) {
                    descriptionCount.classList.add('near-limit');
                }
                if (descriptionLength > 1000) {
                    descriptionCount.classList.add('over-limit');
                }
            }

            function handlePrioritySelect(event) {
                const selectedOption = event.currentTarget;
                const priority = selectedOption.getAttribute('data-priority');

                // Remove selected class from all options
                priorityOptions.forEach(option => {
                    option.classList.remove('selected');
                });

                // Add selected class to clicked option
                selectedOption.classList.add('selected');

                // Update hidden input
                priorityInput.value = priority;
            }

            function handleDragOver(event) {
                event.preventDefault();
                fileUploadArea.classList.add('dragover');
            }

            function handleDragLeave(event) {
                event.preventDefault();
                fileUploadArea.classList.remove('dragover');
            }

            function handleDrop(event) {
                event.preventDefault();
                fileUploadArea.classList.remove('dragover');

                const files = event.dataTransfer.files;
                handleFiles(files);
            }

            function handlePhotoUpload(event) {
                const files = event.target.files;
                handleFiles(files);
            }

            function handleFiles(files) {
                for (let file of files) {
                    // Check if file is an image
                    if (!file.type.startsWith('image/')) {
                        alert('Please upload only image files');
                        continue;
                    }

                    // Check file size (5MB limit)
                    if (file.size > 5 * 1024 * 1024) {
                        alert('File size must be less than 5MB');
                        continue;
                    }

                    // Add to uploaded photos
                    uploadedPhotos.push(file);

                    // Create preview
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const photoPreview = document.createElement('div');
                        photoPreview.className = 'photo-preview';
                        photoPreview.innerHTML = `
                            <img src="${e.target.result}" alt="Uploaded photo">
                            <button type="button" class="photo-remove">
                                <i class="fas fa-times"></i>
                            </button>
                        `;

                        // Add remove event listener
                        const removeBtn = photoPreview.querySelector('.photo-remove');
                        removeBtn.addEventListener('click', function() {
                            const index = uploadedPhotos.indexOf(file);
                            if (index > -1) {
                                uploadedPhotos.splice(index, 1);
                            }
                            photoPreview.remove();
                        });

                        photoPreviewContainer.appendChild(photoPreview);
                    };
                    reader.readAsDataURL(file);
                }

                // Reset file input
                photoUpload.value = '';
            }

            function handleEmergencyContact() {
                if (emergencyContact.checked) {
                    // Auto-select urgent priority
                    priorityOptions.forEach(option => {
                        option.classList.remove('selected');
                        if (option.getAttribute('data-priority') === 'urgent') {
                            option.classList.add('selected');
                            priorityInput.value = 'urgent';
                        }
                    });

                    alert(
                        'Emergency contact enabled. Your request will be prioritized and we will contact you immediately.'
                    );
                }
            }

            function resetForm() {
                form.reset();
                unitSelect.disabled = true;
                unitSelect.innerHTML = '<option value="">Select tenant first</option>';
                tenantInfo.style.display = 'none';
                photoPreviewContainer.innerHTML = '';
                uploadedPhotos = [];

                // Reset priority selection
                priorityOptions.forEach(option => {
                    option.classList.remove('selected');
                });
                priorityInput.value = '';

                // Reset character counts
                updateCharacterCount();

                // Reset emergency contact
                emergencyContact.checked = false;
            }

            function submitForm() {
                // Validate form
                if (!form.checkValidity()) {
                    // Check if priority is selected
                    if (!priorityInput.value) {
                        alert('Please select a priority level for your maintenance request');
                        return;
                    }

                    form.reportValidity();
                    return;
                }

                // Collect form data
                const formData = {
                    tenant_id: tenantSelect.value,
                    tenant_name: tenants[tenantSelect.value].name,
                    unit_id: tenants[tenantSelect.value].units[unitSelect.value].id,
                    unit_code: unitSelect.value,
                    title: issueTitle.value,
                    description: issueDescription.value,
                    priority: priorityInput.value,
                    status: 'pending',
                    emergency_contact: emergencyContact.checked,
                    photos: uploadedPhotos.map(file => file.name),
                    submitted_at: new Date().toISOString()
                };

                // In a real application, you would send this data to your server
                console.log('Form data to be submitted:', formData);

                // Generate reference number
                const referenceNumber = 'MR-' + new Date().getFullYear() + '-' + String(Math.floor(Math.random() *
                    1000)).padStart(3, '0');
                document.getElementById('referenceNumber').textContent = referenceNumber;

                // Show success modal
                const successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();

                // Reset form after successful submission
                setTimeout(() => {
                    resetForm();
                    successModal.hide();
                }, 5000);
            }

            // Initialize character counts
            updateCharacterCount();
        });
    </script>
</body>

</html>
