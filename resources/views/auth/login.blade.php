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

    <style>
        #body {
            background: url('assets-website/img/direktorat-polkam.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>

</head>

<body id="body">


    <div class="container px-3">
        <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                <div class="my-4 d-flex justify-content-center">
                    <a href="{{ url('/login') }}">
                        <img src="{{ asset('/assets/images/logo.png') }}" alt="logo" class="w-100 h-100">
                    </a>
                </div>

                <div class="card custom-card">
                    <div class="card-body p-4 pb-3">
                        <h4 class="fw-semibold mb-4 text-center">Sign In</h4>
                        @if (session('error-message'))
                            <div class="alert alert-danger">
                                {{ session('error-message') }}
                            </div>
                        @endif
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        <form action="{{ url('/auth') }}" method="POST">
                            @csrf
                            <div class="input-box mb-3" data-bs-validate="Valid email is required: ex@abc.xyz">
                                <input type="text" name="email" class="form-control form-control-lg"
                                    id="signin-username" placeholder="email">
                                <span class="authentication-input-icon"><i
                                        class="ri-mail-fill text-default fs-15 op-7"></i></span>
                            </div>
                            <div class="input-group input-box mb-3">
                                <input type="password" name="password" class="form-control form-control-lg"
                                    id="signin-password" placeholder="password">
                                <span class="authentication-input-icon"><i
                                        class="ri-lock-2-fill text-default fs-15 op-7"></i></span>
                                <button type="button" aria-label="button" class="btn btn-light"
                                    onclick="createpassword('signin-password',this)" id="button-addon2"><i
                                        class="ri-eye-off-line align-middle"></i></button>
                            </div>
                            {{-- <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label text-muted fw-normal" for="defaultCheck1">
                                        Remember password ?
                                    </label>
                                </div>
                            </div> --}}
                            <div class="col-xl-12 d-grid mb-3">
                                <button type="submit" class="btn btn-lg btn-warning">Sign In</button>
                                <a href="{{ url('/auth/google') }}" class="btn btn-lg btn-success mt-2">Sign In With
                                    Google</a>
                            </div>
                            <div class="text-center mb-2"><a href="{{ url('/auth/forgot-password') }}"
                                    class="text-danger">Lupa
                                    password ?</a></div>
                            <div class="text-center mb-0">Belum punya akun?<a href="{{ url('/registrasi') }}"
                                    class="text-primary ms-2">Buat
                                    akun</a></div>
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
