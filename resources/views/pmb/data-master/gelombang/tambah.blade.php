@extends('pmb.layout')


@section('content')
    <!-- Start::row-1 -->

    <div class="row mt-4">
        <div class="col">
            <div class="card custom-card">
                <div class="card-body">
                    <h6 class="mb-0">Tambah Gelombang Pendaftaran</h6>
                </div>
            </div>
        </div>
    </div>

    <div class="row m-0">
        <div class="card">
            <div class="card-header">
                <h3>Tambah Gelombang Pendaftaran</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('/pmb/gelombang/create') }}" method="POST">

                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="form-label">Nama <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Tahun <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="tahun" value="{{ old('tahun') }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="form-label">Buka <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="open" value="{{ old('open') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Tutup <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="close" value="{{ old('close') }}">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success mt-3">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <!--End::row-1 -->
@endsection
