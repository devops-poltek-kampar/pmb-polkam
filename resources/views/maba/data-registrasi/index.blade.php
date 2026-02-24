@extends('maba.layout')

@section('content')
    <div class="row mt-3">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">

                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Data Registrasi</h5>
                </div>

                <div class="card-body">

                    {{-- Alert --}}
                    @if ($dataRegistrasi->status_bayar_registrasi == 'Pending')
                        <div class="alert alert-info">
                            DATA REGISTRASI SUDAH DISIMPAN, SILAHKAN MELAKUKAN PEMBAYARAN UANG REGISTRASI SEBESAR Rp.
                            200.000
                            <br>
                            <strong>Silahkan upload bukti pembayaran</strong>
                        </div>
                    @endif

                    @if ($dataRegistrasi->status_bayar_registrasi == 'Done')
                        <div class="alert alert-success">
                            FORMULIR DAN BUKTI PEMBAYARAN SUDAH DIVERIFIKASI
                        </div>
                    @endif

                    {{-- Data --}}
                    <div class="row mb-2">
                        <div class="col-md-4 fw-semibold">Nama</div>
                        <div class="col-md-8">{{ $dataRegistrasi->nama }}</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-4 fw-semibold">Email</div>
                        <div class="col-md-8">{{ $dataRegistrasi->users->email }}</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-4 fw-semibold">Nomor Registrasi</div>
                        <div class="col-md-8">{{ $dataRegistrasi->nomor_registrasi }}</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-4 fw-semibold">Jalur</div>
                        <div class="col-md-8">{{ $dataRegistrasi->jalur_masuk->jalur->nama }}</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-4 fw-semibold">Gelombang</div>
                        <div class="col-md-8">
                            {{ $dataRegistrasi->jalur_masuk->gelombang->nama }}
                            ({{ $dataRegistrasi->jalur_masuk->gelombang->tahun }})
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-4 fw-semibold">Status Pembayaran</div>
                        <div class="col-md-8">
                            <span
                                class="badge
                            @if ($dataRegistrasi->status_bayar_registrasi == 'Done') bg-success
                            @elseif ($dataRegistrasi->status_bayar_registrasi == 'Reject') bg-danger
                            @else bg-warning text-dark @endif">
                                {{ $dataRegistrasi->status_bayar_registrasi }}
                            </span>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-4 fw-semibold">Bukti Pembayaran</div>
                        <div class="col-md-8">
                            @if ($dataRegistrasi->bukti_pembayaran->first())
                                <span class="text-success fw-semibold">
                                    ✔ Sudah upload
                                </span>
                            @else
                                <span class="text-danger fw-semibold">
                                    ✘ Belum upload
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-semibold">Status Registrasi</div>
                        <div class="col-md-8">
                            <span
                                class="badge
                            @if ($dataRegistrasi->status_registrasi == 'Approve') bg-success
                            @elseif ($dataRegistrasi->status_registrasi == 'Reject') bg-danger
                            @else bg-warning text-dark @endif">
                                {{ $dataRegistrasi->status_registrasi }}
                            </span>
                        </div>
                    </div>

                    {{-- Action --}}
                    <div class="d-flex gap-2 mt-3">
                        <a href="{{ url('/user/detail-registrasi') }}/{{ $dataRegistrasi->id }}"
                            class="btn btn-success btn-sm">
                            👁 Detail
                        </a>

                        <a href="{{ url('/user/form-upload-bukti-registrasi') }}/{{ $dataRegistrasi->nomor_registrasi }}"
                            class="btn btn-primary btn-sm">
                            ⬆ Upload Bukti
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>



    {{-- @push('css')
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
    </div> --}}
@endsection
