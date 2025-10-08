@extends('layouts.app_property')
@section('pageTitle', 'index')

@push('styles')
    <style>
        body {
            margin-left: 70px;
        }
    </style>
@endpush

<form id="propertyForm" action="{{ route('property.update', $property->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPropertyModalLabel">
                    <i class="fas fa-building me-2"></i>Add New Property
                </h5>

            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="propertyName" class="form-label">Property Name *</label>
                            <input type="text" name="name" class="form-control" id="propertyName"
                                placeholder="e.g., Sunset Villa" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="propertyType" class="form-label">Property Type</label>
                            <select name="property_type" class="form-select" id="propertyType">
                                <option value="apartment"
                                    {{ $property->propert_type == 'apartment' ? 'selected' : '' }}>Apartment Building
                                </option>
                                <option value="house" {{ $property->property_type == 'house' ? 'selected' : '' }}>Single
                                    Family Home</option>
                                <option value="townhouse"
                                    {{ $property->property_type == 'townhouse' ? 'selected' : '' }}>Townhouse</option>
                                <option value="condo" {{ $property->property_type == 'condo' ? 'selected' : '' }}>
                                    Condominium</option>
                                <option value="commercial"
                                    {{ $property->property_type == 'commercial' ? 'selected' : '' }}>Commercial</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="propertyAddress" class="form-label">Address *</label>
                    <textarea class="form-control" value="{{ $property->address }}" name="address" id="propertyAddress" rows="2"
                        placeholder="Full property address" required></textarea>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="totalUnits" class="form-label">Total Units</label>
                            <input type="number" name="total_units" class="form-control" id="totalUnits" value="1"
                                min="1" value="{{ $property->total_units }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="baseRent" class="form-label">Base Rent ($)</label>
                            <input type="number" name="base_rent" class="form-control" id="baseRent"
                                placeholder="0.00" step="0.01">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="securityDeposit" class="form-label">Security Deposit ($)</label>
                            <input type="number" class="form-control" id="securityDeposit" placeholder="0.00"
                                step="0.01" readonly>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="propertyDescription" class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="propertyDescription" rows="3"
                        placeholder="Describe the property features and amenities..."></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Property Features</label>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="parking" name="property_feature[]"
                                    value="parking">
                                <label class="form-check-label" for="parking">Parking</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gym" name="property_feature[]"
                                    value="gym">
                                <label class="form-check-label" for="gym">Gym</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="pool"
                                    name="property_feature[]" value="swiming pool">
                                <label class="form-check-label" for="pool">Swimming Pool</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="laundry"
                                    name="property_feature[]" value="laundry">
                                <label class="form-check-label" for="laundry">Laundry</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="pets"
                                    name="property_feature[]" value="pet friendly">
                                <label class="form-check-label" for="pets">Pet Friendly</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="security"
                                    name="property_feature[]" value="security">
                                <label class="form-check-label" for="security">Security</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="propertyPhotos" class="form-label">Upload Photos</label>
                    <input type="file" class="form-control" id="propertyPhotos" multiple accept="image/*"
                        name="image_url">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i>Save Property
                </button>
</form>
</div>
</div>
</div>



<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
