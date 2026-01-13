@extends('website.layout')

@section('content')
    @push('css')
        <style>
            .pmb-card {
                border-radius: 16px;
            }

            .pmb-left {
                background: linear-gradient(135deg, #ff7a2f, #ff9a5a);
                position: relative;
            }

            /* efek bubble */
            .pmb-left::before,
            .pmb-left::after {
                content: "";
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.15);
            }

            .pmb-left::before {
                width: 180px;
                height: 180px;
                top: -40px;
                left: -40px;
            }

            .pmb-left::after {
                width: 140px;
                height: 140px;
                bottom: -30px;
                right: -30px;
            }

            /* warna custom */
            .text-orange {
                color: #ff7a2f;
            }

            .btn-outline-orange {
                color: #ff7a2f;
                border-color: #ff7a2f;
            }

            .btn-outline-orange:hover {
                background-color: #ff7a2f;
                color: #fff;
            }
        </style>
    @endpush

    <div class="container my-5">
        <div class="row justify-content-center">

            <h2 class="text-center mb-3 fw-bold text-warning">Jadwal & Biaya</h2>

            <div class="col-lg-6">

                <div class="card pmb-card shadow-lg border-0 overflow-hidden">
                    <div class="row g-0">

                        <!-- LEFT PANEL -->
                        <div
                            class="col-md-4 pmb-left text-white d-flex flex-column justify-content-center align-items-center text-center">
                            <div class="mb-3">
                                <small class="fw-semibold">KIP</small>
                                <p class="mb-1">Gelombang</p>
                                <h1 class="fw-bold display-4 text-white">1</h1>
                            </div>

                            <a href="#" class="btn btn-light btn-sm fw-semibold text-warning">
                                Daftar Sekarang
                            </a>
                        </div>

                        <!-- RIGHT PANEL -->
                        <div class="col-md-8 bg-white">
                            <div class="card-body p-4 p-md-5">

                                <h5 class="fw-bold text-orange mb-2">
                                    Biaya Pendaftaran
                                </h5>
                                <p class="fs-5 mb-4">
                                    Rp. 200.000
                                </p>

                                <h5 class="fw-bold text-orange mb-2">
                                    Periode Pendaftaran
                                </h5>
                                <p class="text-muted mb-4">
                                    18 November 2025 – 31 Maret 2026
                                </p>

                                <a href="#" class="btn btn-outline-orange px-4">
                                    Detail Biaya
                                </a>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-lg-6">

                <div class="card pmb-card shadow-lg border-0 overflow-hidden">
                    <div class="row g-0">

                        <!-- LEFT PANEL -->
                        <div
                            class="col-md-4 pmb-left text-white d-flex flex-column justify-content-center align-items-center text-center">
                            <div class="mb-3">
                                <small class="fw-semibold">KIP</small>
                                <p class="mb-1">Gelombang</p>
                                <h1 class="fw-bold display-4 text-white">1</h1>
                            </div>

                            <a href="#" class="btn btn-light btn-sm fw-semibold text-warning">
                                Daftar Sekarang
                            </a>
                        </div>

                        <!-- RIGHT PANEL -->
                        <div class="col-md-8 bg-white">
                            <div class="card-body p-4 p-md-5">

                                <h5 class="fw-bold text-orange mb-2">
                                    Biaya Pendaftaran
                                </h5>
                                <p class="fs-5 mb-4">
                                    Rp. 200.000
                                </p>

                                <h5 class="fw-bold text-orange mb-2">
                                    Periode Pendaftaran
                                </h5>
                                <p class="text-muted mb-4">
                                    18 November 2025 – 31 Maret 2026
                                </p>

                                <a href="#" class="btn btn-outline-orange px-4">
                                    Detail Biaya
                                </a>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
