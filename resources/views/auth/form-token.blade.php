<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Sistem PMB Poltek Kampar</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            /* background: linear-gradient(135deg, #eef2ff, #ffffff); */
            background: url({{ asset('assets-website/img/direktorat-polkam.jpeg') }});
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .forgot-card {
            border-radius: 16px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, .08);
        }

        .icon-circle {
            width: 85px;
            height: 85px;
            background-color: #e7f1ff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }

        .icon-circle i {
            font-size: 38px;
            color: #0d6efd;
        }
    </style>
</head>

<body>

    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-7 col-sm-10">
            <div class="card forgot-card border-0">
                <div class="card-body p-5 text-center">

                    <!-- Icon -->
                    <div class="icon-circle mb-4">
                        <i class="bi bi-lock"></i>
                    </div>

                    <!-- Title -->
                    {{-- <h3 class="fw-bold mb-3">!</h3> --}}

                    <!-- Description -->
                    <p class="text-muted mb-4">
                        Silahkan masukan token yang sudah dikirim ke email anda!
                    </p>

                    <!-- Alert (optional) -->

                    @if (session('failed'))
                        <div class="alert alert-danger">
                            {{ session('failed') }}
                        </div>
                    @endif
                    {{--  --}}
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <!-- Form -->
                    <form method="POST" action="{{ url('/auth/forgot-password/token') }}">
                        @csrf

                        <div class="mb-4 text-start">
                            <label class="form-label fw-semibold">Token</label>
                            <input type="number" name="token" class="form-control form-control-lg"
                                placeholder="token" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2">
                            <i class="bi bi-envelope"></i> Kirim Token
                        </button>
                    </form>

                    <!-- Footer -->
                    {{-- <div class="mt-4">
                        <a href="/login" class="text-decoration-none">
                            <i class="bi bi-arrow-left"></i> Kembali ke Login
                        </a>
                    </div> --}}

                </div>
            </div>
        </div>
    </div>

</body>

</html>
