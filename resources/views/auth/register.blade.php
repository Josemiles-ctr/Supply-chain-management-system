<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google Fonts: Roboto -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', Arial, sans-serif !important;
        }
    </style>
</head>
<body class="bg-light">

<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="card shadow-sm p-4" style="min-width: 350px; max-width: 400px; width: 100%;">
        <div class="text-center mb-4">
           <h2>Register</h2>
        </div>


        <form method="POST" action="/register">
            @csrf

            <div class="mb-2">
                <label for="name" class="form-label">Name</label>
                <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" required autofocus autocomplete="name" value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="email" class="form-label">Email</label>
                <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" required autocomplete="username" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="password" class="form-label">Password</label>
                <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password">
                @error('password')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" required autocomplete="new-password">
                @error('password_confirmation')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-2 form-check">
                <input type="checkbox" class="form-check-input @error('terms') is-invalid @enderror" id="terms" name="terms" required>
                <label class="form-check-label" for="terms">
                    I agree to the
                    <a href="javascript:void(0);" class="disabled text-muted" tabindex="-1" aria-disabled="true">Terms of Service</a>
                    and
                    <a href="javascript:void(0);" class="disabled text-muted" tabindex="-1" aria-disabled="true">Privacy Policy</a>
                </label>
                @error('terms')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
           
            <div class="mb-2 text-center">
                <button type="submit" class="btn btn-primary w-100">Sign Up</button>
            </div>

            <div class="mb-0 text-center">
                <p>Already have an account? <a href="/login" class="text-decoration-underline ms-2">Login</a></p>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap 5 JS CDN (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
