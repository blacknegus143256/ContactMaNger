<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - @yield('title', 'Contact Manager')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: linear-gradient(90deg, #0052cc, #007bff);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .container-box {
            background: #fff;
            border-radius: 15px;
            padding: 30px 40px;
            width: 900px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .btn-logout {
            border-radius: 8px;
        }

        .search-section input {
            border-radius: 8px;
        }

        .btn-primary, .btn-success {
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <header class="bg-primary text-white py-3 px-4 mb-4">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h4 mb-0">My Dashboard</h1>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
            </form>
        </div>
    </header>

    <div class="container py-4">
     @auth
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded shadow-sm px-4 mb-4">
            <a class="navbar-brand fw-bold text-primary" href="{{ route('contacts.index') }}">Contact Manager</a>
            <div class="ms-auto">
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button class="btn btn-outline-danger btn-sm">Logout</button>
                </form>
            </div>
        </nav>
        @endauth

    <div class="card">
        @yield('content')
    </div>
    
    <footer class="bg-light text-center py-3 border-top">
        <small>&copy; {{ date('Y') }} My App. All rights reserved.</small>
    </footer>
</body>
</html>
