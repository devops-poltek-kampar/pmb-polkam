@extends('website.layout')


@section('content')
    <div class="container my-5">

        <!-- HEADER -->
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary">Informasi Penerimaan Mahasiswa Baru (PMB)</h2>
            <p class="text-muted">Politeknik Kampar Tahun Akademik 2025</p>
        </div>

        <!-- A. GELOMBANG PENDAFTARAN -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <h4 class="fw-bold text-success mb-3">📅 Gelombang Pendaftaran</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>Gelombang I</strong> : Desember 2024 – Maret 2025
                    </li>
                    <li class="list-group-item">
                        <strong>Gelombang II</strong> : April – Juni 2025
                    </li>
                    <li class="list-group-item">
                        <strong>Gelombang III</strong> : Juli – September 2025
                    </li>
                </ul>
            </div>
        </div>

        <!-- B. PROGRAM STUDI -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <h4 class="fw-bold text-success mb-3">🎓 Program Studi</h4>
                <div class="row row-cols-1 row-cols-md-2 g-3">
                    <div class="col">• D2 Teknik Pengolahan Kelapa Sawit</div>
                    <div class="col">• D3 Teknik Pengolahan Sawit</div>
                    <div class="col">• D3 Perawatan dan Perbaikan Mesin</div>
                    <div class="col">• D3 Teknik Informatika</div>
                    <div class="col">• D4 Administrasi Bisnis Internasional</div>
                    <div class="col">• D4 Pengelolaan Perkebunan</div>
                    <div class="col">• D4 Manajemen Agribisnis</div>
                    <div class="col">• D4 Teknologi Rekayasa Logistik</div>
                </div>
            </div>
        </div>

        <!-- C. JALUR PENDAFTARAN -->
        {{-- <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <h4 class="fw-bold text-success mb-3">🛣️ Jalur Pendaftaran</h4>

                <div class="accordion" id="jalurPendaftaran">

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#umum">
                                Jalur Umum
                            </button>
                        </h2>
                        <div id="umum" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                Seleksi berdasarkan <strong>nilai rapor atau ijazah</strong>.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#akademik">
                                Jalur Prestasi Akademik
                            </button>
                        </h2>
                        <div id="akademik" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                Berdasarkan prestasi akademik seperti peringkat kelas (1–5), olimpiade,
                                lomba sains, cerdas cermat, minimal tingkat kabupaten dengan bukti sertifikat.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                data-bs-target="#nonakademik">
                                Jalur Prestasi Nonakademik
                            </button>
                        </h2>
                        <div id="nonakademik" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                Prestasi nonakademik seperti MTQ, olahraga, seni, bela diri, karya tulis,
                                jurnalistik, debat, atau hafis Al-Qur'an (minimal 2 juz).
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> --}}

        <!-- D. BIAYA MASUK -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <h4 class="fw-bold text-success mb-3">💰 Rincian Biaya Masuk</h4>

                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Komponen</th>
                                <th>Biaya</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Biaya Pendaftaran</td>
                                <td>Rp 200.000</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Pengembangan Pendidikan</td>
                                <td>Rp 10.000.000</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Seragam & Perlengkapan</td>
                                <td>Rp 2.500.000</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Asuransi + KTM</td>
                                <td>Rp 300.000</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Orientasi / Bintalfisdis</td>
                                <td>Rp 1.000.000</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Kemahasiswaan</td>
                                <td>Rp 2.000.000</td>
                            </tr>
                            <tr class="table-success fw-bold">
                                <td colspan="2">Total</td>
                                <td>Rp 16.000.000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <p class="text-muted mt-2 fst-italic">
                    * Biaya masuk dibayarkan satu kali dan dapat diangsur selama semester 1
                </p>
            </div>
        </div>

        <!-- F. SPP -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <h4 class="fw-bold text-success mb-3">📚 Uang Kuliah (SPP / Semester)</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>DII Teknik Pengolahan Kelapa Sawit</td>
                                <td>Rp 2.400.000</td>
                            </tr>
                            <tr>
                                <td>DIII Teknik Pengolahan Sawit</td>
                                <td>Rp 4.200.000</td>
                            </tr>
                            <tr>
                                <td>DIII Perawatan dan Perbaikan Mesin</td>
                                <td>Rp 3.000.000</td>
                            </tr>
                            <tr>
                                <td>DIII Teknik Informatika</td>
                                <td>Rp 3.000.000</td>
                            </tr>
                            <tr>
                                <td>DIV Administrasi Bisnis Internasional</td>
                                <td>Rp 3.600.000</td>
                            </tr>

                            <tr>
                                <td>DIV Manajemen Agribisnis</td>
                                <td>Rp 3.600.000</td>
                            </tr>
                            <tr>
                                <td>DIV Pengelolaan Perkebunan</td>
                                <td>Rp 3.600.000</td>
                            </tr>
                            <tr>
                                <td>DIV Teknologi Rekayasa Logistik</td>
                                <td>Rp 3.600.000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- CTA -->
        <div class="text-center mt-5">
            <a href="{{ url('/registrasi') }}" class="btn btn-primary btn-lg px-5">
                Daftar Sekarang
            </a>
        </div>

    </div>



    {{-- <div class="container">
        <div class="row">
            <h3>INFO PMB</h3>
        </div>
    </div> --}}
@endsection
