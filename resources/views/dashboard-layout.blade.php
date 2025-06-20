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
    <div class="container-box">
        @yield('content')
    </div>
</body>
</html>
