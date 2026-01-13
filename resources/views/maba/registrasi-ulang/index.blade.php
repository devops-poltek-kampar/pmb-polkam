@extends('maba.layout')

@section('content')

    {{-- Jika belum upload --}}
    @if ($dataRegistrasi->bukti_pembayaran->count() <= 0)
        <div class="row mt-3">
            <div class="card">
                <div class="alert alert-info mt-3">
                    SELAMAT BERKAS ANDA SUDAH BERHASIL DIVALIDASI. SILAHKAN MELANJUTKAN REGISTRASI DENGAN MEMBAYAR BIAYA
                    REGISTRASI ULANG SEBESAR Rp. 1.000.000
                </div>
                <div class="card-header">
                    <h4>Pembayaran Registrasi Ulang</h4>
                </div>

                <div class="card-body">

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
                            <form action="{{ route('user.registrasi-ulang.upload') }}" method="POST"
                                enctype="multipart/form-data">

                                @csrf

                                <input type="hidden" name="nomor_registrasi"
                                    value="{{ $dataRegistrasi->nomor_registrasi }}">

                                <label for="" class="form-label">File Bukti Pembayaran</label>

                                <input type="file" name="file_pembayaran"
                                    class="form-control @error('file_pembayaran')
                                    is-invalid
                                @enderror">

                                <small>Format file harus berupa : JPG, JPEG, PNG</small>

                                @error('file_pembayaran')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <br>

                                <button class="btn btn-sm btn-primary mt-3">Simpan</button>


                            </form>

                        </div>

                        <div class="col-md-6">

                            <h3 class="mb-4 fw-bold">Data Rekening</h3>

                            <div class="row g-3">
                                <!-- Card -->
                                <div class="col">
                                    <div class="card border-0 shadow-sm rounded-4">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="p-3 bg-primary text-white rounded-4 me-3">
                                                    <i class="bi bi-bank2 fs-3"></i>
                                                </div>
                                                <div>
                                                    <h5 class="card-title mb-0 fw-bold">Bank Mandiri</h5>
                                                    <small class="text-muted">Rekening Utama</small>
                                                </div>
                                            </div>

                                            <p class="mb-1"><strong>No. Rekening:</strong></p>
                                            <div class="d-flex align-items-center">
                                                <span id="rek1" class="fw-semibold fs-5">108-00-1005009-5</span>
                                                <button class="btn btn-sm btn-outline-secondary ms-3"
                                                    onclick="copyText('rek1')">
                                                    Copy
                                                </button>
                                            </div>

                                            <p class="mt-3 mb-0">Atas Nama:</p>
                                            <p class="text-muted"><strong>POLITEKNIK KAMPAR</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>

        {{-- Jika sudah upload --}}
    @else
        <div class="row mt-3">
            <div class="card">
                <div class="alert alert-info mt-3">
                    SELAMAT BERKAS ANDA SUDAH BERHASIL DIVALIDASI. SILAHKAN MELANJUTKAN REGISTRASI DENGAN MEMBAYAR BIAYA
                    REGISTRASI ULANG SEBESAR Rp. 1.000.000
                </div>
                <div class="card-header">
                    <h4>Pembayaran Registrasi Ulang</h4>
                </div>

                <div class="card-body">

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


                            @if ($dataRegistrasi->bukti_pembayaran->first()->status == 'Accept')
                                <div class="alert alert-success">
                                    Bukti Pembayaran Sudah Dikonfirmasi. Silahkan melanjutkan ke tahap <strong>Upload Berkas
                                        Pernyataan</strong>
                                    <br>
                                    STATUS : {{ $dataRegistrasi->bukti_pembayaran->first()->status }}
                                </div>
                            @endif

                            @if ($dataRegistrasi->bukti_pembayaran->first()->status == 'Reject')
                                <div class="alert alert-danger">
                                    Bukti pembayaran gagal diverifikasi. pastikan file yang anda masukan jelas dan valid!
                                    <br>
                                    STATUS : {{ $dataRegistrasi->bukti_pembayaran->first()->status }}
                                </div>
                            @endif

                            @if ($dataRegistrasi->bukti_pembayaran->first()->status == 'Pending')
                                <div class="alert alert-warning">
                                    Bukti pembayaran berhasil diupload, silahkan menunggu verifikasi!
                                    <br>
                                    STATUS : {{ $dataRegistrasi->bukti_pembayaran->first()->status }}
                                </div>
                            @endif



                            <form action="{{ route('user.registrasi-ulang.upload') }}" method="POST"
                                enctype="multipart/form-data">

                                @csrf

                                <input type="hidden" name="nomor_registrasi"
                                    value="{{ $dataRegistrasi->nomor_registrasi }}">

                                <label for="" class="form-label">File Bukti Pembayaran</label>



                                @if ($dataRegistrasi->bukti_pembayaran->first()->status != 'Accept')
                                    <input type="file" name="file_pembayaran" class="form-control">
                                    <small>Format file harus berupa : JPG, JPEG, PNG</small>
                                @endif

                                <img src="{{ asset('/storage') }}/{{ $dataRegistrasi->bukti_pembayaran->first()->path }}"
                                    class=" w-100 mt-3" alt="">

                                @if ($dataRegistrasi->bukti_pembayaran->first()->status != 'Accept')
                                    <button class="btn btn-sm btn-primary mt-3">Simpan</button>
                                @endif

                            </form>

                        </div>

                        <div class="col-md-6">

                            <h3 class="mb-4 fw-bold">Data Rekening</h3>

                            <div class="row g-3">
                                <!-- Card -->
                                {{-- <div class="col"> --}}
                                <div class="card border-0 shadow-sm rounded-4">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="p-3 bg-primary text-white rounded-4 me-3">
                                                <i class="bi bi-bank2 fs-3"></i>
                                            </div>
                                            <div>
                                                <h5 class="card-title mb-0 fw-bold">Bank Mandiri</h5>
                                                <small class="text-muted">Rekening Utama</small>
                                            </div>
                                        </div>

                                        <p class="mb-1"><strong>No. Rekening:</strong></p>
                                        <div class="d-flex align-items-center">
                                            <span id="rek1" class="fw-semibold fs-5">108-00-1005009-5</span>
                                            <button class="btn btn-sm btn-outline-secondary ms-3"
                                                onclick="copyText('rek1')">
                                                Copy
                                            </button>
                                        </div>

                                        <p class="mt-3 mb-0">Atas Nama:</p>
                                        <p class="text-muted"><strong>POLITEKNIK KAMPAR</strong></p>
                                    </div>
                                </div>
                                {{-- </div> --}}
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
    @endpush
@endsection
