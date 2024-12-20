<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Link to Bootstrap Icons (for eye icon) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            border-radius: 15px 15px 0 0;
        }

        .form-label {
            font-weight: 500;
        }

        .form-control {
            border-radius: 10px;
        }

        .password-eye {
            cursor: pointer;
        }

        .password-eye i {
            font-size: 1.2rem;
        }

        .btn-primary {
            border-radius: 10px;
            padding: 12px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .alert-danger {
            border-radius: 10px;
        }

        .mb-3 {
            margin-bottom: 1.5rem;
        }

        .password-field {
            position: relative;
        }

        .password-field .password-eye {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
        }

    </style>
</head>
<body>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row w-100">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header text-center">
                        <h3 class="card-title">Register</h3>
                    </div>
                    <div class="card-body">
                        <!-- Error Messages -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Registration Form -->
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                            </div>

                            <div class="mb-3 password-field">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                <span class="password-eye" onclick="togglePassword()">
                                    <i class="bi bi-eye"></i>
                                </span>
                            </div>

                            <div class="mb-3 password-field">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                <span class="password-eye" onclick="togglePasswordConfirmation()">
                                    <i class="bi bi-eye"></i>
                                </span>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <script>
        function togglePassword() {
            var passwordField = document.getElementById('password');
            var passwordIcon = document.querySelector('#password + .password-eye i');
            if (passwordField.type === "password") {
                passwordField.type = "text";
                passwordIcon.classList.remove('bi-eye');
                passwordIcon.classList.add('bi-eye-slash');
            } else {
                passwordField.type = "password";
                passwordIcon.classList.remove('bi-eye-slash');
                passwordIcon.classList.add('bi-eye');
            }
        }

        function togglePasswordConfirmation() {
            var passwordConfirmationField = document.getElementById('password_confirmation');
            var passwordConfirmationIcon = document.querySelector('#password_confirmation + .password-eye i');
            if (passwordConfirmationField.type === "password") {
                passwordConfirmationField.type = "text";
                passwordConfirmationIcon.classList.remove('bi-eye');
                passwordConfirmationIcon.classList.add('bi-eye-slash');
            } else {
                passwordConfirmationField.type = "password";
                passwordConfirmationIcon.classList.remove('bi-eye-slash');
                passwordConfirmationIcon.classList.add('bi-eye');
            }
        }
    </script>

</body>
</html>
