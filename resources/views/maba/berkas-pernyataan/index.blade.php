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

                    <h5 class="text-primary">Download Berkas Pernyataan Di Bawah Ini</h5>

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

                                            <tr>
                                                <td>
                                                    <i class="bi bi-filetype-docx text-success"></i>
                                                    {{-- <i class="bi bi-file-earmark-pdf text-danger me-2"></i> --}}
                                                    <span class="fw-semibold">Surat Pernyataan Persetujuan Hukum Mahasiswa
                                                        Baru Politeknik Kampar</span>
                                                </td>
                                                <td class="text-end">
                                                    <a download=""
                                                        href="{{ asset('/assets/doc/Surat Pernyataan Persetujuan Hukum Mahasiswa Baru Politeknik Kampar.docx') }}"
                                                        class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-download me-1"></i> Download
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="2">Jika Anda Mendaftar Sebagai Penerima Jalur KIP Kuliah
                                                    Silahkan Upload File Berikut</td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <i class="bi bi-filetype-docx text-success"></i>
                                                    <span class="fw-semibold">Surat Pernyataan Kesediaan Menerima Bantuan
                                                        Biaya Pendidikan KIP-Kuliah Politeknik Kampar</span>
                                                </td>
                                                <td class="text-end">
                                                    <a download=""
                                                        href="{{ asset('/assets/doc/Surat Pernyataan Kesediaan Menerima Bantuan Biaya Pendidikan KIP-Kuliah Politeknik Kampar.doc') }}"
                                                        class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-download me-1"></i> Download
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <i class="bi bi-filetype-docx text-success"></i>
                                                    <span class="fw-semibold">Surat Pernyataan Persetujuan Hukum Penerima
                                                        Bantuan KIP-Kuliah Politeknik Kampar</span>
                                                </td>
                                                <td class="text-end">
                                                    <a download=""
                                                        href="{{ asset('/assets/doc/Surat Pernyataan Persetujuan Hukum Penerima Bantuan KIP-Kuliah Politeknik Kampar.docx') }}"
                                                        class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-download me-1"></i> Download
                                                    </a>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>

                    @if ($berkasPernyataan == null)
                        @if (session('failed'))
                            <div class="alert alert-danger">
                                {{ session('failed') }}
                            </div>
                        @endif

                        <form action="{{ url('user/berkas-pernyataan/upload') }}" method="POST"
                            enctype="multipart/form-data">

                            @csrf

                            <input type="hidden" name="nomor_registrasi" value="{{ $dataRegistrasi->nomor_registrasi }}">

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="" class="form-label">Surat Pernyataan Persetujuan Hukum
                                        Mahasiswa Baru
                                        Politeknik Kampar <span class="text-danger">*</span> <br>
                                        <span class="text-danger">File harus berupa PDF</span>
                                    </label>

                                    <input type="file"
                                        class="form-control mb-3 @error('persetujuan_hukum')
                                is-invalid
                            @enderror"
                                        name="persetujuan_hukum">
                                    @error('persetujuan_hukum')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="" class="form-label">Surat Pernyataan Persetujuan Hukum Penerima
                                        Bantuan KIP-Kuliah Politeknik Kampar<br>
                                        <span class="text-danger">File harus berupa PDF</span>
                                    </label>

                                    <input type="persetujuan_hukum_kip"
                                        class="form-control mb-3 @error('persetujuan_hukum_kip')
                                is-invalid
                            @enderror"
                                        name="file">
                                    @error('persetujuan_hukum_kip')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="" class="form-label">Surat Pernyataan Kesediaan Menerima Bantuan
                                        Biaya Pendidikan KIP-Kuliah Politeknik Kampar<br>
                                        <span class="text-danger">File harus berupa PDF</span>
                                    </label>

                                    <input type="file"
                                        class="form-control mb-3 @error('kesedian_kip')
                                is-invalid
                            @enderror"
                                        name="kesedian_kip">
                                    @error('file')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>

                            <button class="btn btn-sm btn-primary mt-3">Kirim</button>

                        </form>
                    @else
                        @switch($berkasPernyataan->status)
                            @case('Review')
                                <div class="alert alert-info">
                                    <strong>Terima Kasih Sudah Upload Berkas Pernyataan. File Anda Akan Segera
                                        Diverifikasi!</strong>
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

                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($berkasPernyataan->file_pernyataan as $item)
                                    <tr>
                                        <td>{{ strtoupper(str_replace('_', ' ', $item->kategori)) }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>

                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#file-{{ $item->id }}">
                                                <i class="bi bi-eye-fill"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal modal-xl fade" id="file-{{ $item->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                {{ strtoupper(str_replace('_', ' ', $item->kategori)) }}
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <iframe class="w-100" height="700"
                                                                src="{{ asset('/storage') }}/{{ $item->path }}"
                                                                frameborder="0"></iframe>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>



                        {{-- <form action="{{ url('user/berkas-pernyataan/upload') }}" method="POST"
                            enctype="multipart/form-data">

                            @csrf

                            <input type="hidden" name="nomor_registrasi" value="{{ $dataRegistrasi->nomor_registrasi }}">

                            <label for="" class="form-label">Upload File Pernyataan Di sini</label>
                            <input type="file" class="form-control mb-3" name="file">


                            <iframe class="w-100" style="height: 40rem;"
                                src="{{ asset('/storage') }}/{{ $berkasPernyataan->path }}" frameborder="0"></iframe>

                            <button class="btn btn-sm btn-primary mt-3">Kirim</button>

                        </form> --}}
                    @endif

                </div>

            </div>
        </div>
    </div>
@endsection
