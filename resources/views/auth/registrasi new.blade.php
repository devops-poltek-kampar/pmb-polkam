<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light"
    data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Sistem PMB - Login</title>
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="admin dashboard,admin template,admin,dashboard,bootstrap dashboard,bootstrap html template,dashboard template,bootstrap admin template,html admin template,dashboard html css,bootstrap admin,dashboard css,admin panel bootstrap,bootstrap dashboard template">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('/assets/images/brand-logos/favicon.ico') }}" type="image/x-icon">

    <!-- Main Theme Js -->
    <script src="{{ asset('/assets/js/authentication-main.js') }}"></script>

    <!-- Bootstrap Css -->
    <link id="style" href="{{ asset('/assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Style Css -->
    <link href="{{ asset('/assets/css/styles.min.css') }}" rel="stylesheet">

    <!-- Icons Css -->
    <link href="{{ asset('/assets/css/icons.min.css') }}" rel="stylesheet">

    {{-- <style>
        #body {
            background: url('assets-website/img/direktorat-polkam.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style> --}}

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.55),
                    rgba(0, 0, 0, 0.65)),
                url('assets-website/img/direktorat-polkam.jpeg');
            background-size: cover;
            background-position: center;
            font-family: 'Inter', sans-serif;
        }

        /* Glass Card */
        .login-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            animation: fadeSlide 0.8s ease;
        }

        @keyframes fadeSlide {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Input animation */
        .form-control {
            border-radius: 12px;
            padding: 14px 16px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #ffc107;
            box-shadow: 0 0 0 0.15rem rgba(255, 193, 7, 0.35);
        }

        /* Button */
        .btn-warning {
            border-radius: 14px;
            font-weight: 600;
            background: linear-gradient(135deg, #ffc107, #ff9800);
            border: none;
            transition: all 0.3s ease;
        }

        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(255, 193, 7, 0.45);
        }

        .btn-success {
            border-radius: 14px;
            font-weight: 600;
        }

        /* Logo animation */
        .login-logo img {
            max-width: 220px;
            animation: zoomIn 0.8s ease;
        }

        @keyframes zoomIn {
            from {
                opacity: 0;
                transform: scale(0.85);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Links */
        a {
            text-decoration: none;
            font-weight: 500;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>


</head>

<body id="body">


    <div class="container px-3">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">

                <div class="login-logo text-center mb-4">
                    <a href="{{ url('/login') }}">
                        <img src="{{ asset('/assets/images/logo.png') }}" alt="logo">
                    </a>
                </div>

                <div class="card login-card border-0">
                    <div class="card-body p-4 p-md-5">

                        <h3 class="fw-bold text-center text-white mb-4">
                            Sistem PMB
                        </h3>
                        <p class="text-center text-light mb-4">
                            Silakan melakukan registrasi untuk membuat akun
                        </p>

                        @if (session('error-message'))
                            <div class="alert alert-danger">
                                {{ session('error-message') }}
                            </div>
                        @endif

                        <form action="{{ route('auth.register') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <input type="email" name="email" class="form-control form-control-lg"
                                    placeholder="Email address" required>
                            </div>

                            <div class="input-group mb-4">
                                <input type="password" name="password" class="form-control form-control-lg"
                                    id="signin-password" placeholder="Password" required>
                                <button class="btn btn-light" type="button"
                                    onclick="createpassword('signin-password',this)">
                                    <i class="ri-eye-off-line"></i>
                                </button>
                            </div>

                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-lg btn-warning">
                                    Sign In
                                </button>
                            </div>

                            <div class="d-grid mb-3">
                                <a href="{{ url('/auth/google') }}" class="btn btn-lg btn-success">
                                    <i class="ri-google-fill me-1"></i>
                                    Sign In with Google
                                </a>
                            </div>

                            <div class="text-center mb-2">
                                <a href="{{ url('/auth/forgot-password') }}" class="text-warning">
                                    Lupa password?
                                </a>
                            </div>

                            <div class="text-center text-light">
                                Belum punya akun?
                                <a href="{{ url('/registrasi') }}" class="text-warning ms-1">
                                    Daftar
                                </a>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/js/custom-switcher.min.js"></script>

    <!-- Show Password JS -->
    <script src="../assets/js/show-password.js"></script>

</body>

</html>
