@extends('maba.layout')

@section('content')
    @if ($pengajuanBerkas != null)
        <div class="row mt-3">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h6 class="mb-0">
                        <i class="bi bi-person-lines-fill me-2"></i>
                        Informasi Pendaftar
                    </h6>
                </div>

                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <tbody>
                            <tr>
                                <th class="w-25 text-muted">Nama</th>
                                <td class="fw-semibold">{{ $pengajuanBerkas->registrasi->nama }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Nomor Registrasi</th>
                                <td>{{ $pengajuanBerkas->nomor_registrasi }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Gelombang</th>
                                <td>
                                    <span class="badge bg-info">
                                        {{ $pengajuanBerkas->registrasi->jalur_masuk->gelombang->nama }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-muted">Tahun</th>
                                <td>
                                    <span class="badge bg-secondary">
                                        {{ $pengajuanBerkas->registrasi->jalur_masuk->gelombang->tahun }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-muted">Jalur</th>
                                <td>
                                    <span class="badge bg-success">
                                        {{ $pengajuanBerkas->registrasi->jalur_masuk->jalur->nama }}
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

    <div class="row mt-3">
        <div class="col-12">

            <div class="card border-0 shadow-sm rounded-4">

                <!-- HEADER -->
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="mb-0 fw-bold text-primary">
                        📁 Upload Dokumen Registrasi
                    </h5>
                    <small class="text-muted">
                        Silakan upload dan pantau status dokumen registrasi Anda
                    </small>
                </div>

                <div class="card-body">

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

                    {{-- STATUS ALERT --}}
                    @if ($pengajuanBerkas != null)
                        @if ($pengajuanBerkas->status == 'Review')
                            <div class="alert alert-info border-0 shadow-sm rounded-3">
                                ⏳ Dokumen sedang diverifikasi oleh admin
                            </div>
                        @endif

                        @if ($pengajuanBerkas->status == 'Reject')
                            <div class="alert alert-danger border-0 shadow-sm rounded-3">
                                ❌ Beberapa dokumen ditolak, silakan upload ulang
                            </div>
                        @endif

                        @if ($pengajuanBerkas->status == 'Verified')
                            <div class="alert alert-success border-0 shadow-sm rounded-3">
                                ✅ Dokumen telah diverifikasi
                            </div>
                        @endif


                        <!-- LIST DOKUMEN -->
                        <div class="row g-4 mt-1">

                            @foreach ($pengajuanBerkas->berkas as $item)
                                <div class="col-md-6 col-lg-4">

                                    <div class="card border-0 shadow-sm rounded-4 h-100">

                                        <div class="card-body">

                                            <!-- ICON -->
                                            <div class="mb-3 text-center">
                                                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center"
                                                    style="width:60px;height:60px;font-size:24px;">
                                                    📄
                                                </div>
                                            </div>

                                            <!-- TITLE -->
                                            <h6 class="fw-bold text-center mb-3">
                                                {{ str_replace('_', ' ', $item->kategori) }}
                                            </h6>

                                            <!-- STATUS -->
                                            <div class="text-center mb-3">

                                                @if ($item->status == 'Review')
                                                    <span class="badge bg-info px-3 py-2">
                                                        ⏳ Review
                                                    </span>
                                                @elseif($item->status == 'Reject')
                                                    <span class="badge bg-danger px-3 py-2">
                                                        ❌ Reject
                                                    </span>
                                                @elseif($item->status == 'Accept')
                                                    <span class="badge bg-success px-3 py-2">
                                                        ✅ Accept
                                                    </span>
                                                @endif

                                            </div>

                                            <!-- MESSAGE -->
                                            <div class="mb-3">
                                                <small class="text-muted">
                                                    {{ $item->message ?? 'Tidak ada pesan dari admin' }}
                                                </small>
                                            </div>

                                            <!-- BUTTON -->
                                            <div class="d-grid">
                                                <button class="btn btn-outline-primary rounded-3" data-bs-toggle="modal"
                                                    data-bs-target="#file{{ $item->id }}">
                                                    👁 Lihat Dokumen
                                                </button>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <!-- MODAL -->
                                <div class="modal fade" id="file{{ $item->id }}">
                                    <div class="modal-dialog modal-xl">
                                        <form action="{{ route('user.pengajuan-berkas.edit') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="modal-content rounded-4 border-0 shadow">

                                                <div class="modal-header">
                                                    <h5 class="modal-title fw-bold">
                                                        {{ str_replace('_', ' ', $item->kategori) }}
                                                    </h5>

                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>

                                                <div class="modal-body">

                                                    <input type="hidden" name="id" value="{{ $item->id }}">

                                                    <input type="hidden" name="name_attribute"
                                                        value="{{ $item->kategori }}">

                                                    <iframe class="w-100 rounded-3 border" style="height:600px"
                                                        src="{{ asset('storage') }}/{{ $item->path }}">
                                                    </iframe>

                                                    @if ($item->status == 'Reject' || $item->status == 'Review')
                                                        <div class="mt-3">
                                                            <label class="form-label fw-semibold">
                                                                Upload ulang dokumen
                                                            </label>

                                                            <input type="file" class="form-control"
                                                                name="{{ $item->kategori }}">
                                                        </div>
                                                    @endif

                                                </div>

                                                <div class="modal-footer">

                                                    <button class="btn btn-light" data-bs-dismiss="modal">
                                                        Tutup
                                                    </button>

                                                    @if ($item->status == 'Reject' || $item->status == 'Review')
                                                        <button class="btn btn-primary">
                                                            Simpan Perubahan
                                                        </button>
                                                    @endif

                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    @else
                        <!-- FORM UPLOAD AWAL -->
                        <form action="{{ route('user.upload.dokumen') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="row g-4">

                                <input type="hidden" name="nomor_registrasi"
                                    value="{{ $dataRegistrasi->nomor_registrasi }}">
                                <input type="hidden" name="pmb_jalur_masuk_id"
                                    value="{{ $dataRegistrasi->pmb_jalur_masuk_id }}">


                                @foreach ($dokumenJalur as $dokumen)
                                    <div class="col-md-4">

                                        <div class="card border-0 shadow-sm rounded-4">

                                            <div class="card-body">

                                                <h6 class="fw-semibold">
                                                    {{ $dokumen->nama }}
                                                    @if ($dokumen->sifat == 'required')
                                                        <span class="text-danger">*</span>
                                                    @endif
                                                </h6>

                                                <input type="file" class="form-control mt-2"
                                                    name="{{ $dokumen->name_attribute }}">

                                                <small class="text-muted">
                                                    Format: {{ $dokumen->tipe }}
                                                </small>

                                            </div>

                                        </div>

                                    </div>
                                @endforeach

                            </div>

                            <button class="btn btn-primary mt-4 px-4 py-2 rounded-3 shadow-sm">
                                🚀 Upload Dokumen
                            </button>

                        </form>
                    @endif

                </div>

            </div>

        </div>
    </div>


    {{-- <div class="row mt-1">
        <div class="card">
            <div class="card-header">
                <h6>Upload Dokumen Registrasi</h6>
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
                            Berkas sudah diverifikasi! silahkan melanjutkan pembayaran registrasi ulang sebesar
                            Rp.
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
                                            <td>
                                                @switch($item->status)
                                                    @case('Review')
                                                        <span class="badge bg-info">{{ $item->status }}</span>
                                                    @break

                                                    @case('Reject')
                                                        <span class="badge bg-danger">{{ $item->status }}</span>
                                                    @break

                                                    @case('Accept')
                                                        <span class="badge bg-success">{{ $item->status }}</span>
                                                    @break

                                                    @default
                                                @endswitch
                                            </td>
                                            <td>{{ $item->message }}</td>
                                            <td>

                                                <button type="button"
                                                    class="btn btn-sm @if ($item->status == 'Review') btn-info @endif @if ($item->status == 'Reject') btn-danger @endif @if ($item->status == 'Accept') btn-primary @endif"
                                                    data-bs-toggle="modal" data-bs-target="#file{{ $item->id }}">
                                                    View
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal modal-xl fade" id="file{{ $item->id }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <form action="{{ route('user.pengajuan-berkas.edit') }}"
                                                            method="POST" enctype="multipart/form-data">

                                                            @csrf

                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                        {{ str_replace('_', ' ', $item->kategori) }}
                                                                    </h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
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
                                <input type="hidden" name="nomor_registrasi"
                                    value="{{ $dataRegistrasi->nomor_registrasi }}">
                                <input type="hidden" name="pmb_jalur_masuk_id"
                                    value="{{ $dataRegistrasi->pmb_jalur_masuk_id }}">
                                @foreach ($dokumenJalur as $dokumen)
                                    <div class="col-md-4">
                                        <label for="" class="form-label">{{ $dokumen->nama }}
                                            @if ($dokumen->sifat == 'required')
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

    </div> --}}
@endsection
