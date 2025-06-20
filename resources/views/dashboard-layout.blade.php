<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Manager - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: linear-gradient(90deg, #0052cc, #007bff);
            display: flex;
            align-items: start;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .container-box {
            background: #fff;
            border-radius: 15px;
            padding: 30px 40px;
            width: 100%;
            max-width: 1100px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            min-height: 95vh;
            display: flex;
            flex-direction: column;
        }

        .search-section input {
            border-radius: 8px;
        }

        .btn-primary, .btn-success {
            border-radius: 8px;
        }
        .logout-btn {
    border: 2px solid #dc3545;
    color: #dc3545;
    border-radius: 8px;
    background-color: transparent;
    padding: 5px 12px;
    transition: all 0.3s ease;
    font-weight: 500;
}

.logout-btn:hover {
    background-color: #dc3545;
    color: #fff;
    box-shadow: 0 4px 12px rgba(220, 53, 69, 0.3);
}

.footer {
    border-top: 1px solid #ddd;
    padding-top: 10px;
    font-size: 0.9rem;
    color: #6c757d;
     text-align: center;
     margin-top: auto;
}

    </style>
</head>
<body>
    <div class="container-box position-relative">
        <div class="mb-4">
        <div class="d-flex justify-content-between align-items-start">
            <div>
                <h4 class="text-primary fw-bold mb-0">Contact Manager</h4>
                <span class="text-muted">Welcome, {{ Auth::user()->name }}</span>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn logout-btn">Logout</button>
            </form>
        </div>
    </div>

    <div class="flex-grow-1">
        @yield('content')
    </div>
    <div class="footer mt-3">
            &copy; {{ date('Y') }} Contact Manager. All rights reserved.
        </div>
</body>
</html>
