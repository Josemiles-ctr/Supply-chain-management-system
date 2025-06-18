{{-- filepath: resources/views/welcome.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome | Shirt Supply Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #e0eafc 0%, #cfdef3 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        .shirt-logo {
            width: 90px;
            margin-bottom: 1rem;
        }

        .welcome-card {
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(44, 62, 80, 0.08);
            background: #fff;
        }

        .features-list li {
            margin-bottom: 0.7rem;
            font-size: 1.1rem;
        }

        .get-started-btn {
            border-radius: 25px;
            padding: 0.7rem 2.2rem;
            font-size: 1.1rem;
        }

        .footer {
            color: #7b8a99;
            font-size: 0.95rem;
            margin-top: 2rem;
        }
    </style>
</head>

<body>
    <div class="container d-flex flex-column justify-content-center align-items-center min-vh-100">
        <div class="welcome-card p-5 text-center">
            <img src="https://cdn-icons-png.flaticon.com/512/892/892458.png" alt="Shirt Logo" class="shirt-logo">
            <h1 class="mb-3">Welcome to ShirtFlow</h1>
            <p class="lead mb-4">Your trusted partner in shirt supply chain management.</p>
            <ul class="features-list list-unstyled mb-4">
                <li>🧾 Track shirt inventory in real-time</li>
                <li>🚚 Manage suppliers and deliveries</li>
                <li>📦 Monitor orders and shipments</li>
                <li>📊 Analyze sales and stock trends</li>
            </ul>
            <a href="{{ route('login') }}" class="btn btn-primary get-started-btn">Get Started</a>
        </div>
        <div class="footer text-center mt-4">
            &copy; {{ date('Y') }} ShirtFlow Supply Management
        </div>
    </div>
</body>

</html>