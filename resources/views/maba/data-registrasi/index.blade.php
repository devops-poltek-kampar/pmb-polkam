@extends('maba.layout')

@section('content')
    @push('css')
        <style>
            .table-wrapper {
                overflow-x: auto;
                width: 100%;
            }
        </style>
    @endpush
    <div class="row mt-3">
        <div class="card">
            <div class="card-header">
                <h3>Data Registrasi</h3>
            </div>

            <div class="card-body">

                @if ($dataRegistrasi->status_bayar_registrasi == 'Pending')
                    <div class="alert alert-info">
                        DATA REGISTRASI SUDAH DISIMPAN, SILAHKAN MELAKUKAN PEMBAYARAN UANG REGISTRASI SEBESAR Rp. 200.000
                        <br>
                        <strong>UNTUK MENGINPUTKAN FILE BUKTI TRANSFER REGISTRASI SILAH KLIK TOMBOL UPLOAD DI BAGIAN KANAN
                            TABEL</strong>
                    </div>
                @endif

                @if ($dataRegistrasi->status_bayar_registrasi == 'Done')
                    <div class="alert alert-success">
                        FORMULIR DAN BUKTI PEMBAYARAN REGISTRASI SUDAH DIVERIFIKASI OLEH BAGIAN KEUANGAN <br>
                        <strong> SILAHKAN MELANJUTKAN KE TAHAP UPLOAD DOKUMEN SYARAT REGISTRASI</strong>
                    </div>
                @endif

                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                @if (session('failed'))
                    <div class="alert alert-danger">
                        {{ session('failed') }}
                    </div>
                @endif

                {{-- <a href="{{ url('/user/form-registrasi') }}" class="btn btn-sm btn-primary mb-3">Tambah</a> --}}
                <div class="table-wrapper">
                    <table class="table table-bordered">
                        <thead>
                            <tr>

                                <th>Nama</th>
                                <th>Email</th>
                                <th>Nomor Registrasi</th>
                                <th>Jalur</th>
                                <th>Gelombang</th>
                                <th>Tahun</th>
                                <th>Status Pembayaran</th>
                                <th>Bukti Bayar Registrasi</th>
                                <th>Status Registrasi</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>{{ $dataRegistrasi->nama }}</td>
                                <td>{{ $dataRegistrasi->users->email }}</td>
                                <td>{{ $dataRegistrasi->nomor_registrasi }}</td>
                                <td>{{ $dataRegistrasi->jalur_masuk->jalur->nama }}</td>
                                <td>{{ $dataRegistrasi->jalur_masuk->gelombang->nama }}</td>
                                <td>{{ $dataRegistrasi->jalur_masuk->gelombang->tahun }}</td>
                                <td>
                                    <span
                                        class="badge @if ($dataRegistrasi->status_bayar_registrasi == 'Done') text-bg-success @endif @if ($dataRegistrasi->status_bayar_registrasi == 'Reject') text-bg-danger @endif @if ($dataRegistrasi->status_bayar_registrasi == 'Pending') text-bg-warning @endif">{{ $dataRegistrasi->status_bayar_registrasi }}</span>
                                </td>

                                <td>
                                    @if ($dataRegistrasi->bukti_pembayaran->first())
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-check-circle-fill text-success"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-x-circle-fill text-danger" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                                        </svg>
                                    @endif
                                </td>

                                <td>
                                    <span
                                        class="badge @if ($dataRegistrasi->status_registrasi == 'Review') text-bg-warning @endif @if ($dataRegistrasi->status_registrasi == 'Reject') text-bg-danger @endif @if ($dataRegistrasi->status_registrasi == 'Approve') text-bg-success @endif">{{ $dataRegistrasi->status_registrasi }}</span>

                                </td>

                                <td>
                                    <a href="{{ url('/user/detail-registrasi') }}/{{ $dataRegistrasi->id }}"
                                        title="Lihat detail" class="btn btn-sm btn-success"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                            <path
                                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                        </svg></a>

                                    <a href="{{ url('/user/form-upload-bukti-registrasi') }}/{{ $dataRegistrasi->nomor_registrasi }}"
                                        title="Upload bukti pembayaran" class="btn btn-sm btn-primary"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                                            <path
                                                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                                            <path
                                                d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    {{-- @if ($dataRegistrasi->status_bayar_registrasi == 'Done')

        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h3>Upload Dokumen Registrasi</h3>
                </div>
                <div class="card-body">

                    @if ($pengajuanBerkas != null)

                        @if ($pengajuanBerkas->status == 'Review')
                            <div class="alert alert-info">
                                Anda sudah melakukan pengajuan berkas!
                                Silahkan menunggu admin memverifikasi berkas anda!
                            </div>
                        @endif

                        @if ($pengajuanBerkas->status == 'Reject')
                            <div class="alert alert-danger">
                                Silahkan perbaiki berkas yang tidak valid!
                            </div>
                        @endif

                        @if ($pengajuanBerkas->status == 'Verified')
                            <div class="alert alert-primary">
                                Berkas sudah diverifikasi! silahkan melanjutkan pembayaran registrasi ulang sebesar Rp.
                                1.000.000 ke rekening politeknik kampar
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Status</th>
                                            <th>Pesan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @php
                                            $nomor = 1;
                                        @endphp

                                        @foreach ($pengajuanBerkas->berkas as $item)
                                            <tr>
                                                <td>{{ $nomor++ }}</td>
                                                <td>{{ str_replace('_', ' ', $item->kategori) }}</td>
                                                <td>{{ $item->status }}</td>
                                                <td>{{ $item->message }}</td>
                                                <td>

                                                    <button type="button"
                                                        class="btn btn-sm @if ($item->status == 'Review') btn-info @endif @if ($item->status == 'Reject') btn-danger @endif @if ($item->status == 'Accept') btn-primary @endif"
                                                        data-bs-toggle="modal" data-bs-target="#file{{ $item->id }}">
                                                        View
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal modal-xl fade" id="file{{ $item->id }}"
                                                        tabindex="-1" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <form action="{{ url('/user/edit-berkas') }}" method="POST"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                            {{ str_replace('_', ' ', $item->kategori) }}
                                                                        </h1>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <input type="hidden" name="id"
                                                                            value="{{ $item->id }}">
                                                                        <input type="hidden" name="name_attribute"
                                                                            value="{{ $item->kategori }}">

                                                                        <iframe class="w-100" style="height: 1000px"
                                                                            src="{{ asset('storage') }}/{{ $item->path }}"
                                                                            frameborder="0"></iframe>

                                                                        @if ($item->status == 'Reject' || $item->status == 'Review')
                                                                            <label for=""
                                                                                class="form-label">File</label>
                                                                            <input type="file" class="form-control"
                                                                                name="{{ $item->kategori }}">
                                                                        @endif

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        @if ($item->status == 'Review' || $item->status == 'Reject')
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Simpan</button>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    @else
                        @if ($dokumenJalur != null)
                            <form action="{{ route('user.upload.dokumen') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="pmb_registrasi_id" value="{{ $dataRegistrasi->id }}">
                                    <input type="hidden" name="pmb_jalur_masuk_id"
                                        value="{{ $dataRegistrasi->pmb_jalur_masuk_id }}">
                                    @foreach ($dokumenJalur as $dokumen)
                                        <div class="col-md-4">
                                            <label for="" class="form-label">{{ $dokumen->nama }} @if ($dokumen->sifat == 'required')
                                                    <span class="text-danger">*</span>
                                                @endif
                                            </label>
                                            <input type="file"
                                                class="form-control @error($dokumen->name_attribute) is-invalid @enderror"
                                                name="{{ $dokumen->name_attribute }}">
                                            <p>Format File : {{ $dokumen->tipe }}</p>
                                            @error($dokumen->name_attribute)
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    @endforeach

                                </div>

                                <button class="btn btn-md btn-primary mt-3">Upload Dokumen</button>

                            </form>
                        @endif
                    @endif

                </div>
            </div>

        </div>

    @endif --}}


    {{-- @if ($pengajuanBerkas != null && $pengajuanBerkas->status == 'Verified')
        <div class="row">
            <div class="card">
                <div class="alert alert-info">
                    SELAMAT BERKAS ANDA SUDAH BERHASIL DIVALIDASI. SILAHKAN MELANJUTKAN REGISTRASI DENGAN MEMBAYAR BIAYA
                    REGISTRASI ULANG SEBESAR Rp. 1.000.000
                </div>
                <div class="card-header">
                    <h4>Pembayaran Registrasi Ulang</h4>
                </div>

                <div class="card-body">

                    @if ($dataRegistrasi->bukti_pembayaran->count() > 0)
                        @switch($dataRegistrasi->bukti_pembayaran->first()->status)
                            @case('Pending')
                                <div class="alert alert-info">
                                    PEMBAYARAN BERHASIL DIKIRIM, SILAHKAN TUNGGU BAGIAN KEUANGAN UNTUK MEMVERIFIKASI PEMBAYARAN
                                    ANDA!
                                </div>
                            @break

                            @case('Reject')
                                <div class="alert alert-danger">
                                    MAAF PEMBAYARAN TIDAK BISA DIVERIFIKASI, SILAHKAN KIRIMKAN ULANG BUKTI PEMBAYARAN YANG VALID!
                                </div>
                            @break

                            @case('Accept')
                                <div class="alert alert-primary">
                                    SELAMAT, PEMBAYARAN SUDAH DIVERIFIKASI OLEH BAGIAN KEUANGAN. SILAHKAN MELANJUTKAN PROSES KE
                                    TAHAP SELANJUTNYA
                                </div>
                            @break

                            @default
                        @endswitch
                    @endif

                    <div class="row">
                        <div class="col-md-6">

                            @if (session('success-pembayaran-message'))
                                <div class="alert alert-success">
                                    {{ session('success-pembayaran-message') }}
                                </div>
                            @endif

                            @if (session('error-pembayaran-message'))
                                <div class="alert alert-success">
                                    {{ session('error-pembayaran-message') }}
                                </div>
                            @endif
                            <form action="{{ url('/user/upload-bukti-registrasi-ulang') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="nomor_registrasi"
                                    value="{{ $dataRegistrasi->nomor_registrasi }}">

                                <label for="" class="form-label">File Bukti Pembayaran</label>

                                @switch($dataRegistrasi->bukti_pembayaran->first()->status)
                                    @case('Pending')
                                        <div class="alert alert-info">
                                            File pembayaran akan diverifikasi oleh keuangan. silahkan menunggu verifikasi.
                                            <strong>Status :
                                                {{ $dataRegistrasi->bukti_pembayaran->first()->status }}</strong>
                                        </div>
                                    @break

                                    @case('Reject')
                                        <div class="alert alert-danger">
                                            File pembayaran gagal diverifikasi. silahkan memasukan ulang file pembayaran yang
                                            valid!. <strong>Status :
                                                {{ $dataRegistrasi->bukti_pembayaran->first()->status }}</strong>
                                        </div>
                                    @break

                                    @case('Accept')
                                        <div class="alert alert-success">
                                            File pembayaran sudah diverifikasi oleh keungan. Silahkan melanjutkan ke tahap
                                            selanjutnya!. <strong>Status :
                                                {{ $dataRegistrasi->bukti_pembayaran->first()->status }}</strong>
                                        </div>
                                    @break

                                    @default
                                @endswitch

                                @if ($dataRegistrasi->bukti_pembayaran->first()->status != 'Accept')
                                    <input type="file" name="file_pembayaran" class="form-control">
                                @endif
                                @if ($dataRegistrasi->bukti_pembayaran->count() > 0)
                                    <img class="w-100 h-100 mt-1"
                                        src="{{ asset('storage') }}/{{ $dataRegistrasi->bukti_pembayaran->first()->path }}"
                                        alt="">
                                @endif

                                @if ($dataRegistrasi->bukti_pembayaran->first()->status != 'Accept')
                                    <button class="btn btn-sm btn-primary mt-3">Simpan</button>
                                @endif

                            </form>

                        </div>

                        <div class="col-md-6">

                            <h3 class="mb-4 fw-bold">Data Rekening</h3>

                            <div class="row g-3">
                                <!-- Card -->
                                <div class="col-md-4">
                                    <div class="card border-0 shadow-sm rounded-4">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="p-3 bg-primary text-white rounded-4 me-3">
                                                    <i class="bi bi-bank2 fs-3"></i>
                                                </div>
                                                <div>
                                                    <h5 class="card-title mb-0 fw-bold">Bank BCA</h5>
                                                    <small class="text-muted">Rekening Utama</small>
                                                </div>
                                            </div>

                                            <p class="mb-1"><strong>No. Rekening:</strong></p>
                                            <div class="d-flex align-items-center">
                                                <span id="rek1" class="fw-semibold fs-5">1234567890</span>
                                                <button class="btn btn-sm btn-outline-secondary ms-3"
                                                    onclick="copyText('rek1')">
                                                    Copy
                                                </button>
                                            </div>

                                            <p class="mt-3 mb-0"><strong>Atas Nama:</strong></p>
                                            <p class="text-muted">Rahmat Hamdani</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    @endif

    @push('script')
        <script>
            function copyText(id) {
                const text = document.getElementById(id).innerText;
                navigator.clipboard.writeText(text);
                alert("Nomor rekening berhasil disalin!");
            }
        </script>
    @endpush --}}
@endsection
