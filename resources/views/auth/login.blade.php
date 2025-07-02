<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Penarikan Dana</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #004080 0%, #0073e6 100%);
            color: #f8f9fa;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .login-container {
            margin-top: 10%;
            max-width: 400px;
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            color: #212529;
        }
        .login-container label,
        .login-container .form-label {
            color: #495057;
        }
        .login-container .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
            color: #fff;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }
        .login-container .btn-primary:hover {
            background-color: #0b5ed7;
            border-color: #0a58ca;
        }
        .login-container .form-control {
            background-color: #fff;
            border: 1px solid #ced4da;
            color: #212529;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .login-container .form-control:focus {
            background-color: #fff;
            color: #212529;
            border-color: #86b7fe;
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="login-container shadow w-100" style="max-width: 400px; transform: none; margin: auto;">
            <div class="text-center mb-4">
                <img src="{{ asset('images/bayu_bank_logo.png') }}" alt="Bayu Bank Logo" style="max-width: 150px; height: auto; margin-bottom: 15px;">
                <h3>User Login</h3>
            </div>
            <form method="POST" action="{{ route('loginUser') }}">
                @csrf

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" 
                           class="form-control @error('email') is-invalid @enderror" 
                           id="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" 
                           class="form-control @error('password') is-invalid @enderror" 
                           id="password" 
                           name="password" 
                           required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
            <p class="text-center mt-3" style="color: #212529;">Email: bayu@gmail.com</p>
            <p class="text-center" style="color: #212529;">Password: admin123</p>
        </div>
    </div>

    <footer class="text-center mt-4 mb-3 w-100" style="color: #212529; position: fixed; bottom: 10px; left: 0;">
        &copy; Bayu Bank 2025
    </footer>
</body>
</html>
