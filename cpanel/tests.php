<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Offcanvas Job Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .offcanvas-body {
            background-color: #f8f9fa;
        }
        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
        .icon-badge-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: .5rem;
            font-size: 0.75rem;
            font-weight: 500;
        }
        .icon-badge-item .badge {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 4rem;
            height: 4rem;
            border-radius: 50%;
            margin-bottom: .25rem;
            font-size: 1.5rem;
        }
        .icon-badge-item .badge-text {
            font-size: 0.65rem;
            color: #6c757d;
            text-transform: uppercase;
            text-align: center;
            line-height: 1.1;
        }
        
        /* New styling for navigation buttons */
        .nav-buttons .btn {
            border-radius: 0;
            border: 1px solid #dee2e6;
            margin-right: -1px;
        }
        .nav-buttons .btn:first-child {
            border-top-left-radius: 0.5rem;
            border-bottom-left-radius: 0.5rem;
        }
        .nav-buttons .btn:last-child {
            border-top-right-radius: 0.5rem;
            border-bottom-right-radius: 0.5rem;
        }
        .nav-buttons .btn.active {
            background-color: #0d6efd;
            color: white;
            border-color: #0d6efd;
            box-shadow: none;
        }
        .nav-buttons .btn:hover:not(.active) {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>

<div class="p-3">
    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#jobOffcanvas" aria-controls="jobOffcanvas">
        Open Job Details
    </button>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>