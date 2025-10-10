<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Requests Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --success-color: #2ecc71;
            --warning-color: #f39c12;
            --danger-color: #e74c3c;
            --light-bg: #f8f9fa;
        }
        
        body {
            background-color: #f5f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .dashboard-header {
            background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
            color: white;
            padding: 1.5rem 0;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .stat-card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
            margin-bottom: 1.5rem;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .priority-low {
            border-left: 4px solid #2ecc71;
        }
        
        .priority-medium {
            border-left: 4px solid #f39c12;
        }
        
        .priority-high {
            border-left: 4px solid #e74c3c;
        }
        
        .priority-urgent {
            border-left: 4px solid #9b59b6;
        }
        
        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .status-in_progress {
            background-color: #cce7ff;
            color: #004085;
        }
        
        .status-completed {
            background-color: #d4edda;
            color: #155724;
        }
        
        .status-cancelled {
            background-color: #f8d7da;
            color: #721c24;
        }
        
        .badge-priority {
            padding: 0.4em 0.6em;
            font-size: 0.75em;
            font-weight: 600;
        }
        
        .filter-section {
            background-color: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            margin-bottom: 1.5rem;
        }
        
        .table-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }
        
        .table thead th {
            background-color: var(--secondary-color);
            color: white;
            border: none;
        }
        
        .action-btn {
            padding: 0.25rem 0.5rem;
            margin: 0 0.1rem;
        }
        
        .photo-thumbnail {
            width: 40px;
            height: 40px;
            border-radius: 5px;
            object-fit: cover;
            cursor: pointer;
        }
        
        .photo-modal-img {
            max-width: 100%;
            max-height: 80vh;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="dashboard-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1><i class="fas fa-tools me-2"></i>Maintenance Requests Dashboard</h1>
                    <p class="mb-0">Manage and track all maintenance requests</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <span class="badge bg-light text-dark p-2"><i class="fas fa-user me-1"></i>Admin User</span>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="card-title text-muted">Total Requests</h5>
                                <h2 class="text-primary">24</h2>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-clipboard-list fa-2x text-primary"></i>
                            </div>
                        </div>
                        <p class="card-text"><small class="text-success">+2 from last week</small></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="card-title text-muted">Pending</h5>
                                <h2 class="text-warning">8</h2>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-clock fa-2x text-warning"></i>
                            </div>
                        </div>
                        <p class="card-text"><small class="text-danger">+1 from yesterday</small></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="card-title text-muted">In Progress</h5>
                                <h2 class="text-info">12</h2>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-hammer fa-2x text-info"></i>
                            </div>
                        </div>
                        <p class="card-text"><small class="text-success">-2 from yesterday</small></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="card-title text-muted">Completed</h5>
                                <h2 class="text-success">4</h2>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-check-circle fa-2x text-success"></i>
                            </div>
                        </div>
                        <p class="card-text"><small class="text-success">+3 this week</small></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="filter-section">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="priorityFilter" class="form-label">Priority</label>
                    <select class="form-select" id="priorityFilter">
                        <option value="">All Priorities</option>
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                        <option value="urgent">Urgent</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="statusFilter" class="form-label">Status</label>
                    <select class="form-select" id="statusFilter">
                        <option value="">All Statuses</option>
                        <option value="pending">Pending</option>
                        <option value="in_progress">In Progress</option>
                        <option value="completed">Completed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="searchInput" class="form-label">Search</label>
                    <input type="text" class="form-control" id="searchInput" placeholder="Search requests...">
                </div>
                <div class="col-md-3 mb-3 d-flex align-items-end">
                    <button class="btn btn-primary w-100" id="applyFilters">
                        <i class="fas fa-filter me-1"></i> Apply Filters
                    </button>
                </div>
            </div>
        </div>

        <!-- Requests Table -->
        <div class="table-container">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Tenant</th>
                            <th>Unit</th>
                            <th>Priority</th>
                            <th>Status</th>
                            <th>Photos</th>
                            <th>Actions</th>
                            <th><a href="{{route('mainreq.create')}}">add new</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $d )
                        <tr class="priority-urgent">
                            <td>{{$d->id}}</td>
                            <td>{{$d->title}}</td>
                            <td>{{$d->dtenant_id}}</td>
                            <td>{{$d->unit_id}} </td>
                            <td><span class="badge bg-primary badge-priority">{{$d->priority}}</span></td>
                            <td><span class="badge status-pending">{{$d->status}}</span></td>
                            <td> 
                                <img src="{{asset('uploadsmr/'.$d->image_url)}}" class="photo-thumbnail" data-bs-toggle="modal" data-bs-target="#photoModal" width="80">
                            </td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary action-btn" title="Edit" onclick=window.location.href="{{route('mainreq.edit',$d->id)}}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-success action-btn" title="Mark In Progress">
                                    <i class="fas fa-play"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-info action-btn" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <form action="{{route('mainreq.destroy',$d->id)}}" method="post" style="display:inline">
                                    @csrf 
                                    @method('delete')
                                    <button type="submit"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td>no data found</td>
                        </tr>
                        @endforelse
                     
                     
                       
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <nav aria-label="Page navigation" class="mt-4">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Photo Modal -->
    <div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="photoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="photoModalLabel">Maintenance Request Photos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="https://via.placeholder.com/600x400" class="photo-modal-img" alt="Maintenance photo">
                    <div class="mt-3">
                        <button class="btn btn-sm btn-outline-secondary"><i class="fas fa-chevron-left"></i> Previous</button>
                        <button class="btn btn-sm btn-outline-secondary ms-2">Next <i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple filter functionality for demonstration
        document.getElementById('applyFilters').addEventListener('click', function() {
            const priorityFilter = document.getElementById('priorityFilter').value;
            const statusFilter = document.getElementById('statusFilter').value;
            const searchInput = document.getElementById('searchInput').value.toLowerCase();
            
            alert(`Filters applied:\nPriority: ${priorityFilter || 'All'}\nStatus: ${statusFilter || 'All'}\nSearch: ${searchInput || 'None'}`);
            
            // In a real application, you would filter the table rows here
        });
    </script>
</body>
</html>