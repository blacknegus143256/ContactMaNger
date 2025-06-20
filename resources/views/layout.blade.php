<!DOCTYPE html>
<html>
<head>
    <title>Contact Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #0062E6, #33AEFF);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            background: #fff;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 700px;
        }
    </style>
</head>
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

<body class="card">
        @yield('content')
    </div>
    </div>
</body>
</html>
