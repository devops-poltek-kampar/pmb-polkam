@extends('pmb.layout')


@section('content')
    <!-- Start::row-1 -->

    @if ($gelombang != null)
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">PENDAFTARAN</h3>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card custom-card">
                    <div class="card-body">
                        <h3 class="mb-0 text-center">BUKA</h3>
                        <h4 class="text-center">
                            {{ \Carbon\Carbon::parse($gelombang->open)->locale('id')->translatedFormat('j F Y') }}</h4>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card custom-card">
                    <div class="card-body">
                        <h3 class="mb-0 text-center">TUTUP</h3>
                        <h4 class="text-center">
                            {{ \Carbon\Carbon::parse($gelombang->close)->locale('id')->translatedFormat('j F Y') }}</h4>
                    </div>
                </div>
            </div>

        </div>
        <div class="row m-0">
            <div class="col-lg-4">
                <div class="row">
                    <div class="card h-100 bg-primary">
                        <div class="card-body">
                            <h3 class="text-center text-white">Tahun Aktif</h3>
                            <h4 class="text-center text-white">{{ $gelombang->tahun }}</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="card h-100 bg-success">
                        <div class="card-body">
                            {{-- <h3 class="text-center text-white">Gelombang Aktif</h3> --}}
                            <h4 class="text-center text-white">{{ $gelombang->nama }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card bg-info h-100">
                    <div class="card-body alig">
                        <h3 class="text-center text-white">Pendaftar Gelombang Ini</h3>
                        <h3 class="text-center text-white">{{ $gelombang->registrasi_count }}</h3>
                        <h3 class="text-center text-white">Orang</h3>
                    </div>
                </div>
            </div>

            {{-- <div class="col-lg-4">
                <div class="card bg-warning h-100">
                    <div class="card-body">
                        <h3 class="text-center text-white">Sisa SMS Gateway <br>
                            233
                            <br>
                            SMS
                        </h3>
                    </div>
                </div>
            </div> --}}
        </div>
    @else
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="col-md-7 col-lg-6">
                <div class="card border-0 shadow-lg rounded-4 text-center">
                    <div class="card-body p-5">

                        <!-- Icon -->
                        <div class="mb-4">
                            <i class="bi bi-clock-history text-warning" style="font-size: 80px;"></i>
                        </div>

                        <!-- Title -->
                        <h3 class="fw-bold text-warning">
                            Gelombang Pendaftaran Belum Dibuka
                        </h3>

                        <!-- Description -->
                        <p class="text-muted mt-3">
                            Saat ini gelombang pendaftaran belum dibuka.
                            Silakan buka gelombang pendaftaran terlebih dahulu!
                        </p>

                        <!-- Info Box -->
                        <div class="alert alert-warning mt-4 text-start">
                            <strong>Informasi:</strong>
                            <ul class="mb-0">
                                <li>Pendaftaran akan diumumkan melalui website resmi</li>
                                <li>Pastikan data akun Anda sudah lengkap</li>
                                {{-- <li>Periksa notifikasi secara berkala</li> --}}
                            </ul>
                        </div>

                        <!-- Action -->
                        {{-- <div class="d-grid gap-2 mt-4">
                            <a href="/" class="btn btn-warning btn-lg">
                                <i class="bi bi-house-door me-1"></i> Kembali ke Beranda
                            </a>
                            <a href="/kontak" class="btn btn-outline-secondary">
                                <i class="bi bi-envelope me-1"></i> Hubungi Panitia
                            </a>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    @endif






    <!--End::row-1 -->
@endsection
