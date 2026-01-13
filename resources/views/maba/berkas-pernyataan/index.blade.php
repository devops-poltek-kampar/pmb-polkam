@extends('maba.layout')

@section('content')
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Berkas Pernyataan</h3>
                </div>

                <div class="card-body">
                    <div class="alert alert-info">
                        <strong>SELAMAT KAMU SUDAH SAMPAI DI TAHAP UPLOAD BERKAS PERNYATAAN
                            SILAHKAN UPLOAD DOWNLOAD BERKAS PERNYATAAN BERIKUT INI, LENGKAPI BERKAS, KEMUDIAN UPLOAD KEMBALI
                            PADA HALAMAN INI</strong>
                    </div>

                    <h5 class="text-primary">Download Berkas Pernyataan Sesuai Program Studi Kelulusan Anda</h5>

                    <div class="row mb-3">
                        <div class="col-md-6">

                            <div class="card shadow-sm border-0">
                                <div class="card-header bg-primary text-white fw-semibold">
                                    <i class="bi bi-folder2-open me-2"></i>
                                    Daftar Berkas Pernyataan
                                </div>

                                <div class="card-body p-0">
                                    <table class="table table-hover align-middle mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Nama Berkas</th>
                                                <th class="text-end">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($prodi as $item)
                                                @if ($kelulusan->kode_prodi == $item->kode_prodi)
                                                    <tr>
                                                        <td>
                                                            <i class="bi bi-file-earmark-pdf text-danger me-2"></i>
                                                            <span class="fw-semibold">Berkas Pernyataan Teknik Pengolahan
                                                                Sawit</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <a href="" class="btn btn-sm btn-outline-primary">
                                                                <i class="bi bi-download me-1"></i> Download
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach



                                            {{-- <tr>
                                                <td>
                                                    <i class="bi bi-file-earmark-pdf text-danger me-2"></i>
                                                    <span class="fw-semibold">Berkas Pernyataan Perawatan & Perbaikan
                                                        Mesin</span>
                                                </td>
                                                <td class="text-end">
                                                    <a href="" class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-download me-1"></i> Download
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <i class="bi bi-file-earmark-pdf text-danger me-2"></i>
                                                    <span class="fw-semibold">Berkas Pernyataan Teknik Informatika</span>
                                                </td>
                                                <td class="text-end">
                                                    <a href="" class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-download me-1"></i> Download
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <i class="bi bi-file-earmark-pdf text-danger me-2"></i>
                                                    <span class="fw-semibold">Berkas Pernyataan Administrasi Bisnis
                                                        Internasional</span>
                                                </td>
                                                <td class="text-end">
                                                    <a href="" class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-download me-1"></i> Download
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <i class="bi bi-file-earmark-pdf text-danger me-2"></i>
                                                    <span class="fw-semibold">Berkas Pernyataan Teknik Pengolahan Kelapa
                                                        Sawit</span>
                                                </td>
                                                <td class="text-end">
                                                    <a href="" class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-download me-1"></i> Download
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <i class="bi bi-file-earmark-pdf text-danger me-2"></i>
                                                    <span class="fw-semibold">Berkas Pernyataan Teknologi Rekayasa
                                                        Logistik</span>
                                                </td>
                                                <td class="text-end">
                                                    <a href="" class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-download me-1"></i> Download
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <i class="bi bi-file-earmark-pdf text-danger me-2"></i>
                                                    <span class="fw-semibold">Berkas Pernyataan Manajemen Agribisnis</span>
                                                </td>
                                                <td class="text-end">
                                                    <a href="" class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-download me-1"></i> Download
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <i class="bi bi-file-earmark-pdf text-danger me-2"></i>
                                                    <span class="fw-semibold">Berkas Pernyataan Pengelolaan
                                                        Perkebunan</span>
                                                </td>
                                                <td class="text-end">
                                                    <a href="" class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-download me-1"></i> Download
                                                    </a>
                                                </td>
                                            </tr> --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            {{-- <table class="table table-striped">
                                <tr>
                                    <td><strong>Berkas Pernyataan Teknik Pengolahan Sawit</strong></td>
                                    <td><a href="">Download Berkas</a></td>
                                </tr>
                                <tr>
                                    <td><strong>Berkas Pernyataan Perawatan & Perbaikan Mesin</strong></td>
                                    <td><a href="">Download Berkas</a></td>
                                </tr>
                                <tr>
                                    <td><strong>Berkas Pernyataan Teknik Informatika</strong></td>
                                    <td><a href="">Download Berkas</a></td>
                                </tr>

                                <tr>
                                    <td><strong>Berkas Pernyataan Admninistrasi Bisnis Internasional</strong></td>
                                    <td><a href="">Download Berkas</a></td>
                                </tr>
                                <tr>
                                    <td><strong>Berkas Pernyataan Teknik Pengolahan Kelapa Sawit</strong></td>
                                    <td><a href="">Download Berkas</a></td>
                                </tr>

                                <tr>
                                    <td><strong>Berkas Pernyataan Teknologi Rekayasa Logistik</strong></td>
                                    <td><a href="">Download Berkas</a></td>
                                </tr>

                                <tr>
                                    <td><strong>Berkas Pernyataan Manajemen Agribisnis</strong></td>
                                    <td><a href="">Download Berkas</a></td>
                                </tr>

                                <tr>
                                    <td><strong>Berkas Pernyataan Pengelolaan Perkebunan</strong></td>
                                    <td><a href="">Download Berkas</a></td>
                                </tr>
                            </table> --}}

                        </div>
                    </div>

                    @if ($berkasPernyataan == null)
                        {{-- @switch($berkasPernyataan->status)
                            @case('Review')
                                <div class="alert alert-warning">
                                    <strong>Terima Kasih Sudah Upload Berkas Pernyataan. Silahkan Menunggu Admin Memverifikasi File
                                        Anda</strong>
                                </div>
                            @break

                            @case('Reject')
                                <div class="alert alert-danger">
                                    <strong>Mohon maaf ada kesalahan pada file berkas pernyataan anda. silahkan upload ulang file
                                        yang baru!</strong>
                                </div>
                            @break

                            @case('Approve')
                                <div class="alert alert-success">
                                    <strong>Selamat Berkas Pernyataan Sudah Diverifikasi. Silahkan Melanjutkan Ke Tahap
                                        Selanjutnya!</strong>
                                </div>
                            @break

                            @default
                        @endswitch --}}

                        <form action="{{ url('user/berkas-pernyataan/upload') }}" method="POST"
                            enctype="multipart/form-data">

                            @csrf

                            <input type="hidden" name="nomor_registrasi" value="{{ $dataRegistrasi->nomor_registrasi }}">

                            <label for="" class="form-label">Upload File Pernyataan Di sini <br>
                                <span class="text-danger">File harus berupa PDF</span>
                            </label>

                            <input type="file"
                                class="form-control mb-3 @error('file')
                                is-invalid
                            @enderror"
                                name="file">
                            @error('file')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <button class="btn btn-sm btn-primary mt-3">Kirim</button>

                        </form>
                    @else
                        @switch($berkasPernyataan->status)
                            @case('Review')
                                <div class="alert alert-warning">
                                    <strong>Terima Kasih Sudah Upload Berkas Pernyataan. Silahkan Menunggu Admin Memverifikasi File
                                        Anda</strong>
                                </div>
                            @break

                            @case('Reject')
                                <div class="alert alert-danger">
                                    <strong>Mohon maaf ada kesalahan pada file berkas pernyataan anda. silahkan upload ulang file
                                        yang baru!</strong>
                                </div>
                            @break

                            @case('Approve')
                                <div class="alert alert-success">
                                    <strong>Selamat Berkas Pernyataan Sudah Diverifikasi. Silahkan Melanjutkan Ke Tahap
                                        Selanjutnya!</strong>
                                </div>
                            @break

                            @default
                        @endswitch

                        <form action="{{ url('user/berkas-pernyataan/upload') }}" method="POST"
                            enctype="multipart/form-data">

                            @csrf

                            <input type="hidden" name="nomor_registrasi" value="{{ $dataRegistrasi->nomor_registrasi }}">

                            <label for="" class="form-label">Upload File Pernyataan Di sini</label>
                            <input type="file" class="form-control mb-3" name="file">


                            <iframe class="w-100" style="height: 40rem;"
                                src="{{ asset('/storage') }}/{{ $berkasPernyataan->path }}" frameborder="0"></iframe>

                            <button class="btn btn-sm btn-primary mt-3">Kirim</button>

                        </form>
                    @endif

                </div>

            </div>
        </div>
    </div>
@endsection
