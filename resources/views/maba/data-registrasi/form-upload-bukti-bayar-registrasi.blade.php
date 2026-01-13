@extends('maba.layout')

@section('content')
    <div class="row">

        <div class="col-lg-6">
            <div class="card my-3">
                <div class="card-header">
                    <h3>Form Upload Bukti Pembayaran Registrasi</h3>
                </div>
                <div class="card-body">

                    <form action="{{ url('/user/upload-bukti-pembayaran-registrasi') }}" method="POST"
                        enctype="multipart/form-data" class="card shadow-sm border-0">
                        @csrf

                        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Upload Bukti Pembayaran Registrasi</h5>
                            <i class="bi bi-upload"></i>
                        </div>

                        <div class="card-body">

                            {{-- ALERT STATUS --}}
                            @if ($dataRegistrasi->bukti_pembayaran->first())
                                @php
                                    $status =
                                        $dataRegistrasi->bukti_pembayaran->first()->status ??
                                        $dataRegistrasi->status_bayar_registrasi;
                                @endphp

                                @if ($status == 'Reject')
                                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                                        <i class="bi bi-x-circle-fill me-2"></i>
                                        <div>
                                            Status registrasi <strong>{{ $status }}</strong> — silakan upload ulang
                                            bukti registrasi yang valid!
                                        </div>
                                    </div>
                                @elseif ($status == 'Done' || $status == 'Accept')
                                    <div class="alert alert-success d-flex align-items-center" role="alert">
                                        <i class="bi bi-check-circle-fill me-2"></i>
                                        <div>
                                            Status registrasi <strong>{{ $status }}</strong> — pembayaran telah
                                            diverifikasi.
                                        </div>
                                    </div>
                                @elseif ($status == 'Pending')
                                    <div class="alert alert-warning d-flex align-items-center" role="alert">
                                        <i class="bi bi-hourglass-split me-2"></i>
                                        <div>
                                            Status registrasi <strong>{{ $status }}</strong> — menunggu proses
                                            verifikasi.
                                        </div>
                                    </div>
                                @endif
                            @endif

                            {{-- NOMOR REGISTRASI --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nomor Registrasi</label>
                                <input readonly name="pmb_registrasi_nomor_registrasi" type="number"
                                    value="{{ $dataRegistrasi->nomor_registrasi }}"
                                    class="form-control bg-light @error('nomor_registrasi') is-invalid @enderror">
                                @error('nomor_registrasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- INPUT FILE --}}
                            @php
                                $bolehUpload =
                                    !$dataRegistrasi->bukti_pembayaran->first() ||
                                    $dataRegistrasi->bukti_pembayaran->first()->status == 'Reject';
                            @endphp

                            @if ($bolehUpload)
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">File Bukti Registrasi</label>
                                    <input type="file" name="bukti_registrasi"
                                        class="form-control @error('bukti_registrasi') is-invalid @enderror">
                                    <div class="form-text text-muted">Format file: JPG, PNG, atau PDF (maks 2MB)</div>
                                    @error('bukti_registrasi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif

                            {{-- TAMPILKAN GAMBAR --}}
                            @if (
                                $dataRegistrasi->bukti_pembayaran->first() &&
                                    in_array($dataRegistrasi->bukti_pembayaran->first()->status, ['Pending', 'Accept', 'Done']))
                                <div class="text-center mt-4">
                                    <label class="form-label d-block fw-semibold mb-2">Bukti Pembayaran</label>
                                    <img src="{{ asset('storage/' . $dataRegistrasi->bukti_pembayaran->first()->path) }}"
                                        alt="Bukti Pembayaran" class="img-fluid rounded shadow-sm popup-image"
                                        style="max-width: 400px; cursor: pointer;">
                                    <div class="text-muted small mt-2">Klik gambar untuk memperbesar</div>
                                </div>
                            @endif
                        </div>

                        {{-- FOOTER --}}
                        <div class="card-footer bg-light text-end">
                            @if ($bolehUpload)
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-send"></i> Kirim
                                </button>
                            @endif
                        </div>
                    </form>

                    {{-- <form action="{{ url('/user/upload-bukti-pembayaran-registrasi') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        ALERT STATUS
                        @if ($dataRegistrasi->bukti_pembayaran)
                            @php $status = $dataRegistrasi->bukti_pembayaran->status ?? $dataRegistrasi->status_bayar_registrasi; @endphp

                            @if ($status == 'Reject')
                                <div class="alert alert-danger">
                                    Status registrasi {{ $status }} — silakan upload ulang bukti registrasi yang
                                    valid!
                                </div>
                            @elseif ($status == 'Done' || $status == 'Accept')
                                <div class="alert alert-success">
                                    Status registrasi {{ $status }}
                                </div>
                            @elseif ($status == 'Pending')
                                <div class="alert alert-warning">
                                    Status registrasi {{ $status }} — menunggu verifikasi.
                                </div>
                            @endif
                        @endif

                        NOMOR REGISTRASI
                        <label class="form-label">Nomor Registrasi</label>
                        <input readonly name="pmb_registrasi_nomor_registrasi" type="number"
                            value="{{ $dataRegistrasi->nomor_registrasi }}"
                            class="form-control bg-light mb-3 @error('nomor_registrasi') is-invalid @enderror">

                        @error('nomor_registrasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        INPUT FILE
                        @php
                            $bolehUpload =
                                !$dataRegistrasi->bukti_pembayaran ||
                                $dataRegistrasi->bukti_pembayaran->status == 'Reject';
                        @endphp

                        @if ($bolehUpload)
                            <label class="form-label">File Bukti Registrasi</label>
                            <input type="file" name="bukti_registrasi"
                                class="form-control mb-3 @error('bukti_registrasi') is-invalid @enderror">

                            @error('bukti_registrasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        @endif

                        TAMPILKAN GAMBAR
                        @if ($dataRegistrasi->bukti_pembayaran && in_array($dataRegistrasi->bukti_pembayaran->status, ['Pending', 'Accept', 'Done']))
                            <img src="{{ asset('storage/' . $dataRegistrasi->bukti_pembayaran->path) }}"
                                alt="Bukti Pembayaran" class="img-fluid mt-3 rounded shadow-sm" style="max-width: 400px;">
                        @endif

                        TOMBOL SUBMIT
                        @if ($bolehUpload)
                            <button type="submit" class="btn btn-sm btn-primary mt-3">Kirim</button>
                        @endif
                    </form> --}}


                    {{-- <form action="{{ url('/user/upload-bukti-pembayaran-registrasi') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        @if ($dataRegistrasi->bukti_pembayaran != null)
                            @if ($dataRegistrasi->status_bayar_registrasi == 'Reject')
                                <div class="alert alert-danger">
                                    Status registrasi {{ $dataRegistrasi->status_bayar_registrasi }}
                                    Silahkan upload ulang bukti registrasi yang valid!
                                </div>
                            @endif

                            @if ($dataRegistrasi->status_bayar_registrasi == 'Done')
                                <div class="alert alert-success">
                                    Status registrasi {{ $dataRegistrasi->status_bayar_registrasi }}
                                </div>
                            @endif
                        @endif

                        <label for="" class="form-label">Nomor Registrasi</label>
                        <input readonly name="pmb_registrasi_nomor_registrasi" type="number"
                            value="{{ $dataRegistrasi->nomor_registrasi }}"
                            class="form-control bg-light mb-3 @error('nomor_registrasi')
                                is-invalid
                            @enderror">

                        @error('nomor_registrasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror'

                        @if ($dataRegistrasi->bukti_pembayaran == null)
                            <label for="" class="form-label">File Bukti Registrasi</label>
                            <input type="file"
                                class="form-control mb-3 @error('bukti_registrasi')
                            is-invalid
                        @enderror"
                                name="bukti_registrasi">
                            @error('bukti_registrasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        @endif


                        @if ($dataRegistrasi->bukti_pembayaran != null)
                            @if ($dataRegistrasi->bukti_pembayaran->status == 'Reject')
                                <label for="" class="form-label">File Bukti Registrasi</label>
                                <input type="file"
                                    class="form-control mb-3 @error('bukti_registrasi')
                            is-invalid
                        @enderror"
                                    name="bukti_registrasi">
                                @error('bukti_registrasi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            @endif
                        @endif

                        @if ($dataRegistrasi->bukti_pembayaran != null)
                            @if ($dataRegistrasi->bukti_pembayaran->status == 'Pending' || $dataRegistrasi->bukti_pembayaran->status == 'Accept')
                                <img src="{{ asset('/storage') }}/{{ $dataRegistrasi->bukti_pembayaran->path }}"
                                    alt="">
                            @endif
                        @endif

                        @if ($dataRegistrasi->bukti_pembayaran == null)
                            <button type="submit" class="btn btn-sm btn-primary">Kirim</button>
                        @endif

                        @if ($dataRegistrasi->bukti_pembayaran != null)
                            @if ($dataRegistrasi->bukti_pembayaran->status == 'Reject')
                                <button type="submit" class="btn btn-sm btn-primary">Kirim</button>
                            @endif
                        @endif

                    </form> --}}

                </div>
            </div>
        </div>

        <div class="col-lg-6">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4">

                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 50px; height: 50px; font-size: 22px;">
                            <i class="bi bi-bank"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="mb-0 fw-bold">Bank Central</h5>
                            <small class="text-muted">Rekening Pembayaran</small>
                        </div>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <label class="text-muted">Nama Pemilik</label>
                        <h6 class="fw-semibold">Rahmat Hamdani</h6>
                    </div>

                    <div class="mb-3">
                        <label class="text-muted">Nomor Rekening</label>
                        <div class="d-flex align-items-center">
                            <span id="bca" class="fw-bold fs-5 text-primary">
                                1234 5678 9012 3456
                            </span>
                            <button class="btn btn-outline-primary btn-sm ms-3" onclick="copyRek('bca')">
                                <i class="bi bi-clipboard"></i> Copy
                            </button>
                        </div>
                    </div>

                    <div class="alert alert-info mt-3 mb-0 rounded-3">
                        Gunakan nomor rekening di atas hanya untuk transaksi valid.
                    </div>

                </div>
            </div>
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4">

                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 50px; height: 50px; font-size: 22px;">
                            <i class="bi bi-bank"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="mb-0 fw-bold">Bank Central</h5>
                            <small class="text-muted">Rekening Pembayaran</small>
                        </div>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <label class="text-muted">Nama Pemilik</label>
                        <h6 class="fw-semibold">Rahmat Hamdani</h6>
                    </div>

                    <div class="mb-3">
                        <label class="text-muted">Nomor Rekening</label>
                        <div class="d-flex align-items-center">
                            <span id="bsi" class="fw-bold fs-5 text-primary">
                                44332 4323 1212 4422
                            </span>
                            <button class="btn btn-outline-primary btn-sm ms-3" onclick="copyRek('bsi')">
                                <i class="bi bi-clipboard"></i> Copy
                            </button>
                        </div>
                    </div>

                    <div class="alert alert-info mt-3 mb-0 rounded-3">
                        Gunakan nomor rekening di atas hanya untuk transaksi valid.
                    </div>

                </div>
            </div>

        </div>

    </div>

    @push('script')
        <script>
            function copyRek(id) {
                let text = document.getElementById(id).innerText;
                navigator.clipboard.writeText(text);
                alert("Nomor rekening berhasil disalin!");
            }
        </script>
    @endpush
@endsection
