@extends('pmb.layout')


@section('content')
    <!-- Start::row-1 -->

    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center">PENDAFTARAN</h3>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card custom-card">
                <div class="card-body">
                    <h3 class="mb-0 text-center">BUKA</h3>
                    <h4 class="text-center">1 September 2025</h4>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card custom-card">
                <div class="card-body">
                    <h3 class="mb-0 text-center">TUTUP</h3>
                    <h4 class="text-center">31 Desember 2025</h4>
                </div>
            </div>
        </div>

    </div>
    <div class="row m-0">
        <div class="col-lg-4">
            <div class="row">
                <div class="card h-100 bg-primary">
                    <div class="card-body">
                        <h3 class="text-center text-white">Tahun Aktif</h3>
                        <h4 class="text-center text-white">2025</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="card h-100 bg-success">
                    <div class="card-body">
                        <h3 class="text-center text-white">Gelombang Aktif</h3>
                        <h4 class="text-center text-white">1</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card bg-info h-100">
                <div class="card-body alig">
                    <h3 class="text-center text-white">Pendaftar Gelombang Ini</h3>
                    <h3 class="text-center text-white">2</h3>
                    <h3 class="text-center text-white">Orang</h3>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card bg-warning h-100">
                <div class="card-body">
                    <h3 class="text-center text-white">Sisa SMS Gateway <br>
                        233
                        <br>
                        SMS
                    </h3>
                </div>
            </div>
        </div>
    </div>



    <!--End::row-1 -->
@endsection
