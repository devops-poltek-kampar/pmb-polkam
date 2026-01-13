@extends('maba.layout')

@section('content')
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


                {{-- <a href="{{ url('/user/form-registrasi') }}" class="btn btn-sm btn-primary mb-3">Tambah</a> --}}
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
                                <a href="{{ url('/user/detail-registrasi') }}/{{ $dataRegistrasi->id }}" title="Lihat detail"
                                    class="btn btn-sm btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                        <path
                                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                    </svg></a>

                                <a href="{{ url('/user/form-upload-bukti-registrasi') }}/{{ $dataRegistrasi->nomor_registrasi }}"
                                    title="Upload bukti pembayaran" class="btn btn-sm btn-primary"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-upload" viewBox="0 0 16 16">
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

    @if ($pengajuanBerkas)
        {{-- <div class="row">
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

        </div> --}}
    @endif



    {{-- @push('script')
        <script>
            function copyText(id) {
                const text = document.getElementById(id).innerText;
                navigator.clipboard.writeText(text);
                alert("Nomor rekening berhasil disalin!");
            }
        </script>
    @endpush --}}
@endsection
