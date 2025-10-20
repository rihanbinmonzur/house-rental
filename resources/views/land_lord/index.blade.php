<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landlord Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .table-hover tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.05);
        }

        .status-badge {
            font-size: 0.75rem;
            padding: 0.35em 0.65em;
        }

        .profile-img-sm {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 50%;
        }

        .action-buttons .btn {
            margin: 1px;
            padding: 0.25rem 0.5rem;
            font-size: 0.775rem;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container-fluid mt-4">
        <!-- Header -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="h3 text-primary">
                        <i class="fas fa-user-tie me-2"></i>Landlord Management
                    </h1>
                    <button onclick="window.location.href='{{ route('landlord.create') }}'" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i> Add New Landlord
                    </button>
                </div>
                <p class="text-muted">Manage all landlords and their properties</p>
            </div>
        </div>

        <!-- Search and Filter -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="Search landlords...">
                </div>
            </div>
            <div class="col-md-3">
                <select class="form-select">
                    <option value="">All Status</option>
                    <option value="active">Active</option>
                    <option value="suspended">Suspended</option>
                    <option value="deleted">Deleted</option>
                </select>
            </div>
            <div class="col-md-3">
                <button class="btn btn-outline-secondary w-100">
                    <i class="fas fa-filter me-1"></i> Filter
                </button>
            </div>
        </div>

        <!-- Landlords Table -->
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="card-title mb-0">
                    <i class="fas fa-list me-2"></i>Landlords List
                </h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-striped mb-0">
                        <thead class="table-light">
                            <tr>
                                <th width="50">#</th>
                                <th>Landlord</th>
                                <th>Contact Info</th>
                                <th>Properties</th>
                                <th>Status</th>
                                <th>Join Date</th>
                                <th width="200">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($data as $i=> $d)
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if ($d->image_url)
                                            <img src="{{asset('uploadsun/'.$d->image_url)}}" alt="Profile" class="profile-img-sm me-3">
                                            @endif
                                            <div>
                                                <strong>{{ $d->name }}</strong>
                                                <br>
                                                <small class="text-muted">ID: {{ $d->id }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <i class="fas fa-envelope text-muted me-1"></i>
                                            <small>{{ $d->email }}</small>
                                        </div>
                                        <div>
                                            <i class="fas fa-phone text-muted me-1"></i>
                                            <small>{{ $d->phone }}</small>
                                        </div>
                                    </td>
                                    <td>

                                        name password phone address profile_photo
                                        <span class="badge bg-primary status-badge">
                                            <i class="fas fa-building me-1"></i>5 Properties
                                        </span>
                                        <br>
                                        <small class="text-muted">12 Units Total</small>
                                    </td>
                                    <td>
                                        <span class="badge bg-success status-badge">{{ $d->status }}</span>
                                    </td>
                                    <td>
                                        <small>2024-01-15</small>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-sm btn-outline-primary" title="View Profile">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button onclick="window.location.href='{{route('landlord.edit',$d->id)}}'" class="btn btn-sm btn-outline-warning" >
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-info" title="Properties">
                                                <i class="fas fa-building"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-success" title="Activate">
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <form action="{{route('landlord.destroy',$d->id)}}" method="post" style="display:inline">
                                                @csrf
                                                @method('delete')
                                            
                                            <button class="btn btn-sm btn-outline-danger" title="Delete" type="submit">
                                                <i class="fas fa-trash"></i>
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
            <div class="card-footer bg-white">
                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-muted">
                        Showing 1 to 4 of 15 entries
                    </div>
                    <nav aria-label="Page navigation">
                        <ul class="pagination mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
