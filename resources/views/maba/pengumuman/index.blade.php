@extends('maba.layout')


@section('content')
    @push('css')
        <style>
            .result-card {
                border-radius: 20px;
                animation: fadeIn 0.7s ease-in-out;
            }

            .status-card {
                border-radius: 20px;
                box-shadow: 0 20px 40px rgba(0, 0, 0, .15);
                animation: fadeInUp .8s ease;
            }

            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }

            }

            /* .status-card {
                                                                                                                                                                                                                        border-radius: 20px;
                                                                                                                                                                                                                        box-shadow: 0 20px 40px rgba(0, 0, 0, .15);
                                                                                                                                                                                                                        animation: fadeInUp .8s ease;
                                                                                                                                                                                                                    } */

            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .icon-circle {
                width: 90px;
                height: 90px;
                background: #dc3545;
                color: #fff;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 42px;
                margin: 0 auto;
            }
        </style>
    @endpush


    @if ($registrasi == null)
        <div class="row mt-3">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-7 col-lg-6">

                        <div class="card status-card text-center">
                            <div class="card-body p-5">

                                <!-- ICON -->
                                <div class="icon-circle mb-4">
                                    !
                                </div>

                                <!-- TITLE -->
                                <h3 class="fw-bold text-danger mb-3">
                                    Anda Belum Melakukan Registrasi
                                </h3>

                                <!-- DESC -->
                                <p class="text-muted fs-6 mb-4">
                                    Untuk dapat mengakses seluruh fitur dan mengikuti proses seleksi,
                                    silakan lakukan registrasi terlebih dahulu.
                                </p>

                                <!-- INFO -->
                                <div class="alert alert-danger text-start">
                                    <ul class="mb-0">
                                        <li>Lengkapi data diri sesuai identitas</li>
                                        <li>Pastikan email dan nomor aktif</li>
                                        <li>Registrasi hanya dapat dilakukan satu kali</li>
                                    </ul>
                                </div>

                                <!-- BUTTON -->
                                <a href="/registrasi" class="btn btn-danger btn-lg px-5 rounded-pill">
                                    Daftar Sekarang
                                </a>

                                <!-- FOOTER -->
                                <div class="mt-4 text-muted small">
                                    Jika sudah pernah mendaftar, silakan login kembali.
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif


    @if ($kelulusan == null)
        <div class="row mt-3">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-7 col-lg-6">

                        <div class="card status-card text-center">
                            <div class="card-body p-5">

                                <!-- ICON -->
                                <div class="mb-4">
                                    <div class="spinner-border text-warning" style="width:4rem; height:4rem;"
                                        role="status">
                                    </div>
                                </div>

                                <!-- TITLE -->
                                <h3 class="fw-bold text-warning mb-3">
                                    Menunggu Pengumuman Kelulusan
                                </h3>

                                <!-- DESC -->
                                <p class="text-muted fs-6 mb-4">
                                    Terima kasih telah mengikuti seluruh tahapan seleksi.
                                    Saat ini hasil kelulusan sedang dalam proses penilaian.
                                </p>

                                <!-- INFO BOX -->
                                <div class="alert alert-warning text-start">
                                    <ul class="mb-0">
                                        <li>Pastikan data diri sudah lengkap</li>
                                        <li>Periksa email secara berkala</li>
                                        <li>Pengumuman akan diinformasikan resmi melalui sistem</li>
                                    </ul>
                                </div>

                                <!-- STATUS BADGE -->
                                <span class="badge rounded-pill bg-warning text-dark px-4 py-2 fs-6">
                                    STATUS: MENUNGGU
                                </span>

                                <!-- FOOTER -->
                                <div class="mt-4 text-muted small">
                                    Mohon bersabar, kami akan segera menginformasikan hasilnya 🙏
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($kelulusan != null)
        <div class="row mt-3">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-7 col-lg-6">
                        <div class="card shadow-lg result-card">
                            <div class="card-body text-center p-5">

                                <!-- STATUS ICON -->
                                <div class="mb-4">
                                    <i class="bi bi-check-circle-fill text-success" style="font-size: 80px;"></i>
                                </div>

                                <!-- JUDUL -->
                                <h3 class="fw-bold mb-2">PENGUMUMAN KELULUSAN</h3>
                                {{-- <p class="text-muted mb-4">
                                Seleksi Penerimaan Mahasiswa Baru
                            </p> --}}
                                <!-- STATUS -->
                                <div class="alert alert-success fw-bold fs-5 text-center">
                                    🎉 SELAMAT, ANDA DINYATAKAN <span class="text-uppercase">LULUS</span>
                                    <br> <span class="fs-6">Silahkan melanjutkan ke tahap Registrasi Ulang</span>
                                </div>

                                <!-- DATA PESERTA -->
                                <table class="table table-borderless mb-4">
                                    <tr>
                                        <th class="text-start">Nama</th>
                                        <td class="text-end fw-semibold">{{ $registrasi->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-start">No. Registrasi</th>
                                        <td class="text-end fw-semibold">{{ $registrasi->nomor_registrasi }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-start">Program Studi</th>
                                        <td class="text-end fw-semibold">{{ $kelulusan->prodi->nama }}</td>
                                    </tr>

                                    <tr>
                                        <th class="text-start">Gelombang</th>
                                        <td class="text-end fw-semibold">{{ $registrasi->jalur_masuk->gelombang->nama }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="text-start">Tahun</th>
                                        <td class="text-end fw-semibold">{{ $registrasi->jalur_masuk->gelombang->tahun }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="text-start">Gelombang</th>
                                        <td class="text-end fw-semibold">{{ $registrasi->jalur_masuk->jalur->nama }}
                                        </td>
                                    </tr>
                                </table>


                                <!-- BUTTON -->
                                {{-- <div class="d-flex justify-content-center gap-2 mt-4">
                                    <button class="btn btn-success px-4">
                                        <i class="bi bi-printer"></i> Cetak
                                    </button>
                                    <a href="/" class="btn btn-outline-secondary px-4">
                                        Kembali
                                    </a>
                                </div> --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif





    @push('script')
    @endpush
@endsection
