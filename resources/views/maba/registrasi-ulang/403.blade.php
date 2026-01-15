@extends('maba.layout')

@section('content')
    @push('css')
        <style>
            body {
                background: linear-gradient(135deg, #e3f2fd, #ffffff);
            }

            .notice-card {
                border-radius: 18px;
                box-shadow: 0 12px 35px rgba(0, 0, 0, .08);
            }

            .icon-box {
                width: 90px;
                height: 90px;
                background-color: #e7f1ff;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto;
            }

            .icon-box i {
                font-size: 42px;
                color: #0d6efd;
            }

            .step-item {
                background: #f8f9fa;
                border-radius: 12px;
                padding: 12px 16px;
            }
        </style>
    @endpush


    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <div class="col-xl-6 col-lg-7 col-md-9 col-sm-12">
            <div class="card notice-card border-0">
                <div class="card-body text-center p-5">

                    <!-- Icon -->
                    <div class="icon-box mb-4">
                        <i class="bi bi-cloud-arrow-up"></i>
                    </div>

                    <!-- Title -->
                    <h3 class="fw-bold text-dark mb-3">
                        Silahkan Menyelesaikan Tahap Pengajuan Berkas
                    </h3>

                    <!-- Description -->
                    <p class="text-muted mb-4">
                        Untuk melanjutkan ke tahap ini, Anda wajib
                        <strong>Menyelesaikan tahap pengajuan berkas registrasi</strong>
                        yang telah ditentukan oleh panitia.
                    </p>

                    <!-- Info Alert -->
                    <div class="alert alert-info d-flex align-items-center justify-content-center mb-4">
                        <i class="bi bi-info-circle me-2"></i>
                        Status pendaftaran Anda akan diproses setelah semua berkas lengkap.
                    </div>

                    <!-- Steps -->
                    <div class="text-start mb-4">
                        <div class="step-item mb-2 d-flex align-items-center">
                            <i class="bi bi-check-circle text-primary me-2"></i>
                            Unggah dokumen persyaratan
                        </div>
                        <div class="step-item mb-2 d-flex align-items-center">
                            <i class="bi bi-check-circle text-primary me-2"></i>
                            Pastikan data sesuai dan terbaca jelas
                        </div>
                        <div class="step-item d-flex align-items-center">
                            <i class="bi bi-check-circle text-primary me-2"></i>
                            Klik tombol kirim untuk verifikasi
                        </div>
                    </div>

                    <!-- Action -->
                    {{-- <div class="d-flex justify-content-center gap-3 flex-wrap">
                        <a href="/pmb/berkas" class="btn btn-primary px-4">
                            <i class="bi bi-upload"></i> Lengkapi Berkas
                        </a>
                        <a href="/" class="btn btn-outline-secondary px-4">
                            Kembali ke Dashboard
                        </a>
                    </div> --}}

                </div>
            </div>
        </div>
    </div>
@endsection
