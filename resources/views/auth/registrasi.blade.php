<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light"
    data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Sistem PMB Polkam</title>
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template" />
    <meta name="Author" content="Spruko Technologies Private Limited" />
    <meta name="keywords"
        content="admin dashboard,admin template,admin,dashboard,bootstrap dashboard,bootstrap html template,dashboard template,bootstrap admin template,html admin template,dashboard html css,bootstrap admin,dashboard css,admin panel bootstrap,bootstrap dashboard template" />

    <!-- Favicon -->
    <link rel="icon" href="../assets/images/brand-logos/favicon.ico" type="image/x-icon" />

    <!-- Main Theme Js -->
    <script src="../assets/js/authentication-main.js"></script>

    <!-- Bootstrap Css -->
    <link id="style" href="../assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Style Css -->
    <link href="../assets/css/styles.min.css" rel="stylesheet" />

    <!-- Icons Css -->
    <link href="../assets/css/icons.min.css" rel="stylesheet" />

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

    <!-- Loader -->
    {{-- <div id="loader">
        <img src="../assets/images/media/loader.svg" alt="" />
    </div> --}}
    <!-- Loader -->

    <div class="container">
        <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                <div class="my-4 d-flex justify-content-center">
                    <a href="index.html">
                        <img src="{{ asset('/assets/images/logo.png') }}" alt="logo" class="w-100 h-100" />
                    </a>
                </div>
                <div class="card custom-card">
                    <div class="card-body p-4 pb-3">
                        <h4 class="fw-semibold mb-4 text-center">Registrasi Akun</h4>
                        <form action="{{ route('auth.register') }}" method="POST">
                            @csrf
                            <div class="input-box mb-3" data-bs-validate="Valid email is required: ex@abc.xyz">
                                <input type="text" value="{{ old('username') }}" name="username"
                                    class="form-control form-control-lg @error('username')
                                    is-invalid
                                @enderror"
                                    id="signin-username" placeholder="Nama" />
                                <span class="authentication-input-icon"><i
                                        class="ri-user-3-fill text-default fs-15 op-7"></i></span>
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input-box mb-3" data-bs-validate="Valid email is required: ex@abc.xyz">

                                <input type="text" name="email" value="{{ old('email') }}"
                                    class="form-control form-control-lg @error('email')
                                    is-invalid
                                @enderror"
                                    id="signin-username2" placeholder="Email" />
                                <span class="authentication-input-icon"><i
                                        class="ri-mail-fill text-default fs-15 op-7"></i></span>

                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input-box mb-3" data-bs-validate="Valid email is required: ex@abc.xyz">
                                <input type="number" name="nomor_hp" value="{{ old('nomor_hp') }}"
                                    class="form-control form-control-lg @error('nomor_hp')
                                    is-invalid
                                @enderror"
                                    id="signin-username2" placeholder="Nomor HP" />
                                <span class="authentication-input-icon"><i
                                        class="ri-mail-fill text-default fs-15 op-7"></i></span>
                                @error('nomor_hp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input-group input-box mb-3">
                                <input type="password" name="password" value="{{ old('password') }}"
                                    class="form-control form-control-lg @error('password')
                                    is-invalid
                                @enderror"
                                    id="signin-password" placeholder="Password" />
                                <span class="authentication-input-icon"><i
                                        class="ri-lock-2-fill text-default fs-15 op-7"></i></span>
                                <button aria-label="button" class="btn btn-light" type="button"
                                    onclick="createpassword('signin-password',this)" id="button-addon2">
                                    <i class="ri-eye-off-line align-middle"></i>
                                </button>

                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input-group input-box mb-3">
                                <input type="password" name="password_confirmation"
                                    class="form-control form-control-lg @error('password_confirmation')
                                    is-invalid
                                @enderror"
                                    id="confirm-password" placeholder="Konfirmasi Password" />
                                <span class="authentication-input-icon"><i
                                        class="ri-lock-2-fill text-default fs-15 op-7"></i></span>
                                <button aria-label="button" class="btn btn-light" type="button"
                                    onclick="createpassword('confirm-password',this)" id="button-addon2">
                                    <i class="ri-eye-off-line align-middle"></i>
                                </button>
                                @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                <label class="form-check-label text-muted fw-normal" for="defaultCheck1">
                                    Agree the
                                    <span class="text-primary">Terms and Policy.</span>
                                </label>
                            </div>
                        </div> --}}

                            <div class="col-xl-12 d-grid mb-3">
                                <button type="submit" class="btn btn-lg btn-primary">Register</button>
                            </div>

                        </form>
                        <div class="text-center mb-0">
                            Sudah punya akun ?<a href="{{ url('/login') }}" class="text-primary ms-2">Sign
                                In</a>
                        </div>

                    </div>
                    <div class="card-footer">
                        {{-- <div class="btn-list text-center">
                            <button type="button" aria-label="button" class="btn btn-icon btn-light">
                                <i class="ri-google-line fw-bold text-dark op-7 align-middle"></i>
                            </button>
                            <button type="button" aria-label="button" class="btn btn-icon btn-light">
                                <i class="ri-facebook-line fw-bold text-dark op-7 align-middle"></i>
                            </button>
                            <button type="button" aria-label="button" class="btn btn-icon btn-light">
                                <i class="ri-twitter-line fw-bold text-dark op-7 align-middle"></i>
                            </button>
                        </div> --}}
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
