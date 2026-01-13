@extends('maba.layout')

@section('content')
    <!-- Start::row-1 -->

    @push('css')
        <style>
            body {
                background: linear-gradient(135deg, #fff8e1, #ffffff);
            }

            .announcement-card {
                border-radius: 16px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
            }

            .icon-circle {
                width: 90px;
                height: 90px;
                background-color: #fff3cd;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto;
            }

            .icon-circle i {
                font-size: 40px;
                color: #ffc107;
            }
        </style>
    @endpush

    @if ($registrasi == null)
        <div class="row mt-3">
            <div class="card">
                <div class="card-body">

                    @if (session('message'))
                        <div class="alert alert-danger">{{ session('message') }}</div>
                    @endif

                    <h1 class="mb-3 fw-bold">Selamat Datang!</h1>
                    <p class="mb-4">Selamat Datang Di Sistem Penerimaan Mahasiswa Baru Berbasis Online Politeknik Kampar!
                    </p>

                    @if ($gelombang != null)
                        <div class="row mb-3">
                            <div class="alert alert-success">
                                <h3 class="text-success">Selamat {{ $gelombang->nama }} {{ $gelombang->tahun }} sudah dibuka
                                </h3>
                            </div>

                            <div class="alert alert-info">
                                {{ $gelombang->nama }} {{ $gelombang->tahun }} dibuka {{ $gelombang->open }} sampai dengan
                                {{ $gelombang->close }}
                            </div>
                        </div>

                        <form action="{{ url('/user/form-registrasi') }}" method="GET">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <select class="form-select" name="pmb_jalur_masuk_id" id="jalur">
                                        <option value="Pilih">Pilih Jalur Masuk</option>
                                        @foreach ($gelombang->jalur_masuk as $jalurMasuk)
                                            <option data-msg="{{ $jalurMasuk->keterangan }}" value="{{ $jalurMasuk->id }}">
                                                {{ $jalurMasuk->jalur->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6" id="kolom-jalur">
                                    <div class="alert alert-solid-success">
                                        Pilih Jalur Terlebih Dahulu Sebelum Melanjutkan
                                    </div>
                                </div>
                            </div>
                        </form>
                    @else
                        <div class="row">
                            <div class="container min-vh-100 d-flex align-items-center justify-content-center">
                                <div class="col-lg-6 col-md-8 col-sm-12">
                                    <div class="card announcement-card border-0">
                                        <div class="card-body text-center p-5">

                                            <div class="icon-circle mb-4">
                                                <i class="bi bi-calendar-x"></i>
                                            </div>

                                            <h3 class="fw-bold mb-3 text-dark">
                                                Gelombang Pendaftaran Belum Dibuka
                                            </h3>

                                            <p class="text-muted mb-4">
                                                Saat ini <strong>gelombang pendaftaran belum tersedia</strong>.
                                                Silakan menunggu hingga jadwal pendaftaran resmi dibuka oleh panitia.
                                            </p>

                                            <div
                                                class="alert alert-warning d-flex align-items-center justify-content-center mb-4">
                                                <i class="bi bi-info-circle me-2"></i>
                                                Informasi pembukaan gelombang akan diumumkan melalui website resmi.
                                            </div>

                                            <div class="d-flex justify-content-center gap-3 flex-wrap">
                                                <a href="/" class="btn btn-outline-secondary px-4">
                                                    <i class="bi bi-arrow-left"></i> Kembali
                                                </a>
                                                <a href="https://wa.me/628xxxxxxxxx"
                                                    class="btn btn-warning px-4 text-white">
                                                    <i class="bi bi-whatsapp"></i> Hubungi Admin
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @else
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="col-md-6 col-lg-5">
                <div class="card border-0 shadow-lg rounded-4 text-center">
                    <div class="card-body p-5">

                        <!-- Icon -->
                        <div class="mb-4">
                            <i class="bi bi-check-circle-fill text-success" style="font-size: 80px;"></i>
                        </div>

                        <!-- Title -->
                        <h3 class="fw-bold text-success">Registrasi Berhasil</h3>

                        <!-- Description -->
                        <p class="text-muted mt-3">
                            Terima kasih telah melakukan registrasi.
                            Data Anda telah kami terima dan sedang diproses.
                        </p>

                        <!-- Info Box -->
                        <div class="alert alert-success mt-4">
                            <strong>Status:</strong> {{ $registrasi->status_registrasi }}
                            <br>
                            <strong>Tanggal:</strong> {{ $registrasi->created_at }}
                        </div>

                        <!-- Buttons -->
                        <div class="d-grid gap-2 mt-4">
                            {{-- <a href="/dashboard" class="btn btn-success btn-lg">
                                <i class="bi bi-speedometer2 me-1"></i> Ke Dashboard
                            </a>
                            <a href="/cetak-bukti" class="btn btn-outline-secondary">
                                <i class="bi bi-printer me-1"></i> Cetak Bukti Registrasi
                            </a> --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>

    @endif


    @push('script')
        <script>
            document.getElementById('jalur').addEventListener('change', function() {

                if (this.value == "Pilih") {
                    $("#kolom-jalur").html(` <div class="alert alert-solid-success">
                    Pilih Jalur Registrasi Terlebih Dahulu
                </div>`);
                    return;
                }

                const selectedOption = this.options[this.selectedIndex];
                const keterangan = selectedOption.dataset.msg;
                $("#kolom-jalur").html(`

                <div class="alert alert-solid-success">
                    ${keterangan}
                </div>

                <button type="submit" class="btn btn-primary">Registrasi</button>
                `)
            });
        </script>
    @endpush

    <!--End::row-1 -->
@endsection
