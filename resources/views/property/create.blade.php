<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Property Management Form</title>
    <style>
        :root {
            --primary: #3498db;
            --primary-dark: #2980b9;
            --success: #2ecc71;
            --warning: #f39c12;
            --danger: #e74c3c;
            --light: #ecf0f1;
            --dark: #2c3e50;
            --gray: #95a5a6;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            color: var(--dark);
            line-height: 1.6;
            padding: 20px;
            min-height: 100vh;
        }
        
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 30px;
            position: relative;
            overflow: hidden;
        }
        
        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary), var(--success));
        }
        
        h1 {
            text-align: center;
            color: var(--dark);
            margin-bottom: 10px;
            font-weight: 700;
        }
        
        .subtitle {
            text-align: center;
            color: var(--gray);
            margin-bottom: 30px;
            font-size: 1.1rem;
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }
        
        .form-section {
            margin-bottom: 25px;
            padding: 20px;
            border-radius: 8px;
            background-color: var(--light);
            transition: all 0.3s ease;
        }
        
        .form-section.active {
            box-shadow: 0 0 0 2px var(--primary);
        }
        
        .section-title {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            font-weight: 600;
            color: var(--dark);
        }
        
        .section-title i {
            margin-right: 10px;
            color: var(--primary);
        }
        
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark);
        }
        
        .required::after {
            content: '*';
            color: var(--danger);
            margin-left: 4px;
        }
        
        input, select, textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            transition: all 0.3s;
        }
        
        input:focus, select:focus, textarea:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        }
        
        textarea {
            min-height: 100px;
            resize: vertical;
        }
        
        .input-with-icon {
            position: relative;
        }
        
        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
        }
        
        .feature-checkboxes {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 12px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            background-color: white;
        }
        
        .checkbox-group {
            display: flex;
            align-items: center;
        }
        
        .checkbox-group input {
            width: auto;
            margin-right: 8px;
        }
        
        .file-upload-area {
            border: 2px dashed #ddd;
            border-radius: 8px;
            padding: 30px;
            text-align: center;
            transition: all 0.3s;
            cursor: pointer;
            background-color: #f9f9f9;
        }
        
        .file-upload-area:hover, .file-upload-area.dragover {
            border-color: var(--primary);
            background-color: #e8f4fc;
        }
        
        .file-upload-icon {
            font-size: 48px;
            color: var(--gray);
            margin-bottom: 15px;
        }
        
        .file-upload-text {
            margin-bottom: 15px;
        }
        
        .file-upload-btn {
            display: inline-block;
            background-color: var(--primary);
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .file-upload-btn:hover {
            background-color: var(--primary-dark);
        }
        
        .file-input {
            display: none;
        }
        
        .file-preview {
            margin-top: 15px;
            display: none;
        }
        
        .file-preview img {
            max-width: 100%;
            max-height: 200px;
            border-radius: 6px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        
        .file-info {
            margin-top: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .file-name {
            font-weight: 500;
        }
        
        .file-remove {
            color: var(--danger);
            cursor: pointer;
            font-weight: 600;
        }
        
        .suggestions {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border: 1px solid #ddd;
            border-top: none;
            border-radius: 0 0 6px 6px;
            max-height: 150px;
            overflow-y: auto;
            z-index: 10;
            display: none;
        }
        
        .suggestion-item {
            padding: 10px 15px;
            cursor: pointer;
            transition: background 0.2s;
        }
        
        .suggestion-item:hover {
            background-color: var(--light);
        }
        
        .form-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
            gap: 15px;
        }
        
        button {
            padding: 14px 25px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        
        .btn-submit {
            background-color: var(--primary);
            color: white;
            flex: 2;
        }
        
        .btn-submit:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.3);
        }
        
        .btn-reset {
            background-color: var(--danger);
            color: white;
            flex: 1;
        }
        
        .btn-reset:hover {
            background-color: #c0392b;
        }
        
        .btn-preview {
            background-color: var(--warning);
            color: white;
            flex: 1;
        }
        
        .btn-preview:hover {
            background-color: #e67e22;
        }
        
        .validation-message {
            font-size: 14px;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .valid {
            color: var(--success);
        }
        
        .invalid {
            color: var(--danger);
        }
        
        .progress-bar {
            height: 6px;
            background-color: #eee;
            border-radius: 3px;
            margin-bottom: 30px;
            overflow: hidden;
        }
        
        .progress {
            height: 100%;
            background: linear-gradient(90deg, var(--primary), var(--success));
            width: 0%;
            transition: width 0.5s ease;
        }
        
        .form-summary {
            background-color: var(--light);
            padding: 20px;
            border-radius: 8px;
            margin-top: 30px;
            display: none;
        }
        
        .summary-title {
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--dark);
        }
        
        .summary-item {
            display: flex;
            margin-bottom: 10px;
        }
        
        .summary-label {
            font-weight: 600;
            width: 150px;
        }
        
        .summary-value {
            flex: 1;
        }
        
        .smart-suggestions {
            background-color: #e8f4fc;
            border-left: 4px solid var(--primary);
            padding: 15px;
            margin-top: 15px;
            border-radius: 0 6px 6px 0;
            display: none;
        }
        
        .suggestion-title {
            font-weight: 600;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .form-actions {
                flex-direction: column;
            }
            
            .feature-checkboxes {
                grid-template-columns: 1fr;
            }
        }
        
        .fade-in {
            animation: fadeIn 0.5s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="container fade-in">
        <h1>Smart Property Management</h1>
        <p class="subtitle">Fill out the form below to add a new property to the system</p>
        
        <div class="progress-bar">
            <div class="progress" id="formProgress"></div>
        </div>
        
       
        <form id="propertyForm" action="{{ route('property.store') }}" method="POST" enctype="multipart/form-data">
            @csrf 
            
            <div class="form-grid">
                <div>
                    <div class="form-section active" id="basicInfoSection">
                        <div class="section-title">
                            <i>🏢</i> Basic Information
                        </div>
                        
                        <div class="form-group">
                            <label for="name" class="required">Property Name</label>
                            <input type="text" id="name" name="name" placeholder="Enter property name" autocomplete="off">
                            <div class="validation-message" id="nameValidation"></div>
                        </div>
                        
                        <div class="form-group">
                            <label for="property_type" class="required">Property Type</label>
                            <select id="property_type" name="property_type">
                                <option value="">Select Property Type</option>
                                <option value="apartment">Apartment Building</option>
                                <option value="condominium">Condominium</option>
                                <option value="house">Single Family House</option>
                                <option value="townhouse">Townhouse</option>
                                <option value="commercial">Commercial Property</option>
                                <option value="mixed-use">Mixed-Use Property</option>
                            </select>
                            <div class="validation-message" id="typeValidation"></div>
                        </div>
                        
                        <div class="form-group">
                            <label for="address" class="required">Address</label>
                            <textarea id="address" name="address" placeholder="Enter full address"></textarea>
                            <div class="validation-message" id="addressValidation"></div>
                        </div>
                    </div>
                    
                    <div class="form-section" id="financialSection">
                        <div class="section-title">
                            <i>💰</i> Financial Information
                        </div>
                        
                        <div class="form-group">
                            <label for="total_units" class="required">Total Units</label>
                            <input type="number" id="total_units" name="total_units" placeholder="Enter total number of units" min="1">
                            <div class="validation-message" id="unitsValidation"></div>
                        </div>
                        
                        <div class="form-group">
                            <label for="base_rent" class="required">Base Rent ($)</label>
                            <div class="input-with-icon">
                                <input type="number" id="base_rent" name="base_rent" placeholder="Enter base rent amount" step="0.01" min="0">
                                <span class="input-icon">$</span>
                            </div>
                            <div class="validation-message" id="rentValidation"></div>
                        </div>
                    </div>
                </div>
                
                <div>
                    <div class="form-section" id="detailsSection">
                        <div class="section-title">
                            <i>📝</i> Property Details
                        </div>
                        
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" placeholder="Enter property description"></textarea>
                            <div class="validation-message" id="descValidation"></div>
                        </div>
                        
                        <div class="form-group">
                            <label>Property Features</label>
                            <div class="feature-checkboxes">
                                <div class="checkbox-group">
                                    <input type="checkbox" id="parking" name="property_feature[]" value="parking">
                                    <label for="parking">Parking</label>
                                </div>
                                <div class="checkbox-group">
                                    <input type="checkbox" id="pool" name="property_feature[]" value="pool">
                                    <label for="pool">Pool</label>
                                </div>
                                <div class="checkbox-group">
                                    <input type="checkbox" id="gym" name="property_feature[]" value="gym">
                                    <label for="gym">Gym</label>
                                </div>
                                <div class="checkbox-group">
                                    <input type="checkbox" id="laundry" name="property_feature[]" value="laundry">
                                    <label for="laundry">Laundry</label>
                                </div>
                                <div class="checkbox-group">
                                    <input type="checkbox" id="elevator" name="property_feature[]" value="elevator">
                                    <label for="elevator">Elevator</label>
                                </div>
                                <div class="checkbox-group">
                                    <input type="checkbox" id="security" name="property_feature[]" value="security">
                                    <label for="security">Security</label>
                                </div>
                                <div class="checkbox-group">
                                    <input type="checkbox" id="pet_friendly" name="property_feature[]" value="pet_friendly">
                                    <label for="pet_friendly">Pet Friendly</label>
                                </div>
                                <div class="checkbox-group">
                                    <input type="checkbox" id="furnished" name="property_feature[]" value="furnished">
                                    <label for="furnished">Furnished</label>
                                </div>
                                <div class="checkbox-group">
                                    <input type="checkbox" id="air_conditioning" name="property_feature[]" value="air_conditioning">
                                    <label for="air_conditioning">Air Conditioning</label>
                                </div>
                                <div class="checkbox-group">
                                    <input type="checkbox" id="heating" name="property_feature[]" value="heating">
                                    <label for="heating">Heating</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="image_url" class="required">Property Image</label>
                            <div class="file-upload-area" id="fileUploadArea">
                                <div class="file-upload-icon">📁</div>
                                <div class="file-upload-text">
                                    <p>Drag & drop your property image here</p>
                                    <p>or</p>
                                </div>
                                <div class="file-upload-btn">Browse Files</div>
                                <input type="file" id="image_url" name="image_url" class="file-input" accept="image/*">
                                <p class="file-upload-hint">Supported formats: JPG, PNG, GIF (Max 5MB)</p>
                            </div>
                            <div class="file-preview" id="filePreview">
                                <img id="previewImage" src="" alt="Property preview">
                                <div class="file-info">
                                    <span class="file-name" id="fileName"></span>
                                    <span class="file-remove" id="removeFile">Remove</span>
                                </div>
                            </div>
                            <div class="validation-message" id="imageValidation"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="smart-suggestions" id="smartSuggestions">
                <div class="suggestion-title">
                    <i>💡</i> Smart Suggestion
                </div>
                <div id="suggestionText"></div>
            </div>
            
            <div class="form-actions">
                <button type="button" class="btn-preview" id="previewBtn">
                    <i>👁️</i> Preview
                </button>
                <button type="reset" class="btn-reset">
                    <i>🔄</i> Reset Form
                </button>
                <button type="submit" class="btn-submit">
                    <i>✅</i> Submit Property
                </button>
            </div>
        </form>
        
        <div class="form-summary" id="formSummary">
            <div class="summary-title">Property Summary</div>
            <div id="summaryContent"></div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('propertyForm');
            const progressBar = document.getElementById('formProgress');
            const smartSuggestions = document.getElementById('smartSuggestions');
            const suggestionText = document.getElementById('suggestionText');
            const formSummary = document.getElementById('formSummary');
            const summaryContent = document.getElementById('summaryContent');
            const previewBtn = document.getElementById('previewBtn');
            const fileInput = document.getElementById('image_url');
            const fileUploadArea = document.getElementById('fileUploadArea');
            const filePreview = document.getElementById('filePreview');
            const previewImage = document.getElementById('previewImage');
            const fileName = document.getElementById('fileName');
            const removeFile = document.getElementById('removeFile');
            
            // Update progress bar based on form completion
            function updateProgress() {
                const fields = form.querySelectorAll('input, select, textarea');
                let filledCount = 0;
                
                fields.forEach(field => {
                    if (field.type !== 'checkbox' && field.value.trim() !== '') {
                        filledCount++;
                    } else if (field.type === 'checkbox' && field.checked) {
                        filledCount++;
                    } else if (field.type === 'file' && field.files.length > 0) {
                        filledCount++;
                    }
                });
                
                const progress = (filledCount / fields.length) * 100;
                progressBar.style.width = `${progress}%`;
            }
            
            // Show smart suggestions based on input
            function showSmartSuggestion(field, value) {
                if (value.trim() === '') {
                    smartSuggestions.style.display = 'none';
                    return;
                }
                
                let suggestion = '';
                
                if (field.id === 'name') {
                    if (value.length < 5) {
                        suggestion = 'Property names should be descriptive and at least 5 characters long.';
                    } else if (!value.includes(' ')) {
                        suggestion = 'Consider adding a location or type to your property name (e.g., "Sunset Apartments").';
                    }
                } else if (field.id === 'property_type') {
                    if (value === 'apartment') {
                        suggestion = 'For apartment buildings, consider adding amenities like gym, pool, or laundry facilities.';
                    } else if (value === 'house') {
                        suggestion = 'For single family homes, highlight features like yard space, garage, or recent renovations.';
                    }
                } else if (field.id === 'total_units') {
                    const units = parseInt(value);
                    if (units > 50) {
                        suggestion = 'Large properties may benefit from professional management services.';
                    } else if (units < 5) {
                        suggestion = 'Small properties often attract long-term tenants seeking personalized service.';
                    }
                } else if (field.id === 'base_rent') {
                    const rent = parseFloat(value);
                    if (rent > 3000) {
                        suggestion = 'Premium rental rates should be justified with luxury amenities and prime location.';
                    } else if (rent < 1000) {
                        suggestion = 'Competitive pricing can help attract tenants quickly in most markets.';
                    }
                } else if (field.id === 'description') {
                    if (value.length < 50) {
                        suggestion = 'A detailed description (100+ characters) can significantly improve tenant interest.';
                    }
                }
                
                if (suggestion) {
                    suggestionText.textContent = suggestion;
                    smartSuggestions.style.display = 'block';
                } else {
                    smartSuggestions.style.display = 'none';
                }
            }
            
            // Validate individual fields
            function validateField(field) {
                const value = field.type === 'file' ? field.files : field.value.trim();
                const validationElement = document.getElementById(`${field.id}Validation`);
                
                if (field.hasAttribute('required')) {
                    if (field.type === 'file' && (!value || value.length === 0)) {
                        validationElement.textContent = 'Please upload a property image';
                        validationElement.className = 'validation-message invalid';
                        return false;
                    } else if (field.type !== 'file' && value === '') {
                        validationElement.textContent = 'This field is required';
                        validationElement.className = 'validation-message invalid';
                        return false;
                    }
                }
                
                if (field.id === 'name' && value !== '' && value.length < 3) {
                    validationElement.textContent = 'Property name should be at least 3 characters';
                    validationElement.className = 'validation-message invalid';
                    return false;
                }
                
                if (field.id === 'total_units' && value !== '' && parseInt(value) < 1) {
                    validationElement.textContent = 'Total units must be at least 1';
                    validationElement.className = 'validation-message invalid';
                    return false;
                }
                
                if (field.id === 'base_rent' && value !== '' && parseFloat(value) < 0) {
                    validationElement.textContent = 'Base rent cannot be negative';
                    validationElement.className = 'validation-message invalid';
                    return false;
                }
                
                if (field.type === 'file' && value.length > 0) {
                    const file = value[0];
                    const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
                    const maxSize = 5 * 1024 * 1024; // 5MB
                    
                    if (!validTypes.includes(file.type)) {
                        validationElement.textContent = 'Please select a valid image file (JPG, PNG, GIF)';
                        validationElement.className = 'validation-message invalid';
                        return false;
                    }
                    
                    if (file.size > maxSize) {
                        validationElement.textContent = 'File size must be less than 5MB';
                        validationElement.className = 'validation-message invalid';
                        return false;
                    }
                }
                
                validationElement.textContent = 'Looks good!';
                validationElement.className = 'validation-message valid';
                return true;
            }
            
            // Handle file selection and preview
            function handleFileSelect(file) {
                if (file) {
                    fileName.textContent = file.name;
                    
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                        filePreview.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                    
                    validateField(fileInput);
                    updateProgress();
                }
            }
            
            // Generate form summary
            function generateSummary() {
                const formData = new FormData(form);
                let summaryHTML = '';
                
                // Handle text fields
                const textFields = ['name', 'property_type', 'address', 'total_units', 'base_rent', 'description'];
                textFields.forEach(field => {
                    const value = document.getElementById(field).value;
                    if (value) {
                        let displayValue = value;
                        if (field === 'base_rent') {
                            displayValue = `$${parseFloat(value).toFixed(2)}`;
                        }
                        
                        summaryHTML += `
                            <div class="summary-item">
                                <div class="summary-label">${getFieldLabel(field)}:</div>
                                <div class="summary-value">${displayValue}</div>
                            </div>
                        `;
                    }
                });
                
                // Handle checkboxes
                const checkboxes = form.querySelectorAll('[name="property_feature[]"]:checked');
                if (checkboxes.length > 0) {
                    const features = Array.from(checkboxes).map(cb => {
                        return cb.labels[0].textContent;
                    });
                    
                    summaryHTML += `
                        <div class="summary-item">
                            <div class="summary-label">Property Features:</div>
                            <div class="summary-value">${features.join(', ')}</div>
                        </div>
                    `;
                }
                
                // Handle file
                if (fileInput.files.length > 0) {
                    summaryHTML += `
                        <div class="summary-item">
                            <div class="summary-label">Property Image:</div>
                            <div class="summary-value">${fileInput.files[0].name}</div>
                        </div>
                    `;
                }
                
                if (summaryHTML === '') {
                    summaryHTML = '<p>No information provided yet.</p>';
                }
                
                return summaryHTML;
            }
            
            // Get display label for form fields
            function getFieldLabel(fieldName) {
                const labels = {
                    'name': 'Property Name',
                    'property_type': 'Property Type',
                    'address': 'Address',
                    'total_units': 'Total Units',
                    'base_rent': 'Base Rent',
                    'description': 'Description',
                    'property_feature': 'Property Features',
                    'image_url': 'Property Image'
                };
                
                return labels[fieldName] || fieldName;
            }
            
            // Event listeners
            form.addEventListener('input', function(e) {
                updateProgress();
                validateField(e.target);
                showSmartSuggestion(e.target, e.target.value);
            });
            
            form.addEventListener('change', function(e) {
                updateProgress();
                validateField(e.target);
                if (e.target.id !== 'image_url') {
                    showSmartSuggestion(e.target, e.target.value);
                }
            });
            
            // File upload events
            fileUploadArea.addEventListener('click', function() {
                fileInput.click();
            });
            
            fileInput.addEventListener('change', function() {
                if (this.files.length > 0) {
                    handleFileSelect(this.files[0]);
                }
            });
            
            removeFile.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                fileInput.value = '';
                filePreview.style.display = 'none';
                validateField(fileInput);
                updateProgress();
            });
            
            // Drag and drop functionality
            fileUploadArea.addEventListener('dragover', function(e) {
                e.preventDefault();
                this.classList.add('dragover');
            });
            
            fileUploadArea.addEventListener('dragleave', function() {
                this.classList.remove('dragover');
            });
            
            fileUploadArea.addEventListener('drop', function(e) {
                e.preventDefault();
                this.classList.remove('dragover');
                
                if (e.dataTransfer.files.length > 0) {
                    fileInput.files = e.dataTransfer.files;
                    handleFileSelect(e.dataTransfer.files[0]);
                }
            });
            
            previewBtn.addEventListener('click', function() {
                summaryContent.innerHTML = generateSummary();
                formSummary.style.display = 'block';
                formSummary.scrollIntoView({ behavior: 'smooth' });
            });
            
            // FIXED: Form submission - only prevent default if validation fails
            form.addEventListener('submit', function(e) {
                // Validate all required fields
                const requiredFields = form.querySelectorAll('[required]');
                let isValid = true;
                
                requiredFields.forEach(field => {
                    if (!validateField(field)) {
                        isValid = false;
                        // Highlight the first invalid field
                        if (isValid === false) {
                            field.scrollIntoView({ behavior: 'smooth', block: 'center' });
                            field.focus();
                        }
                    }
                });
                
                if (!isValid) {
                    e.preventDefault();
                    alert('Please fix the errors in the form before submitting.');
                } else {
                    // Form is valid - allow submission to Laravel
                    // Show loading state
                    const submitBtn = form.querySelector('.btn-submit');
                    submitBtn.innerHTML = '<i>⏳</i> Saving...';
                    submitBtn.disabled = true;
                    
                    // Progress bar animation
                    progressBar.style.background = 'linear-gradient(90deg, var(--success), var(--primary))';
                    
                    // Form will now submit to Laravel normally
                    console.log('Form is valid, submitting to Laravel...');
                }
            });
            
            // Initialize progress bar
            updateProgress();
        });
    </script>
</body>
</html>