@extends('maba.layout')

@section('content')

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

                                <input type="file" name="file_pembayaran" class="form-control">


                                <button class="btn btn-sm btn-primary mt-3">Simpan</button>


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
                            <form action="{{ route('user.registrasi-ulang.upload') }}" method="POST"
                                enctype="multipart/form-data">

                                @csrf

                                <input type="hidden" name="nomor_registrasi"
                                    value="{{ $dataRegistrasi->nomor_registrasi }}">

                                <label for="" class="form-label">File Bukti Pembayaran</label>

                                @if ($dataRegistrasi->bukti_pembayaran->first()->status != 'Accept')
                                    <input type="file" name="file_pembayaran" class="form-control">
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



    {{-- @if ($pengajuanBerkas != null && $pengajuanBerkas->status != 'Verified')
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
                            <form action="{{ route('user.registrasi-ulang.upload') }}" method="POST"
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
                            <form action="{{ route('user.registrasi-ulang.upload') }}" method="POST"
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

                                @if ($dataRegistrasi->bukti_pembayaran->count() > 0)
                                    <img class="w-100 h-100 mt-1"
                                        src="{{ asset('storage') }}/{{ $dataRegistrasi->bukti_pembayaran->first()->path }}"
                                        alt="">
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
    @endif --}}

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
