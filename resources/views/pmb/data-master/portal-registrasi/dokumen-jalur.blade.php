@extends('pmb.layout')


@section('content')
    <!-- Start::row-1 -->

    {{-- <div class="row mt-4">
        <div class="col">
            <div class="card custom-card">
                <div class="card-body">
                    <h6 class="mb-0">Tambah Jalur Pendaftaran</h6>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row my-4">

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3>Data Jalur
                    </h3>
                </div>
                <div class="card-body">

                    <table class="table table-striped table-bordered">
                        <tr>
                            <td>Gelombang</td>
                            <td>{{ $jalurMasuk->gelombang->nama }}</td>
                        </tr>
                        <tr>
                            <td>Tahun</td>
                            <td>{{ $jalurMasuk->gelombang->tahun }}</td>
                        </tr>
                        <tr>
                            <td>Jalur</td>
                            <td>{{ $jalurMasuk->jalur->nama }}</td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3>Tambah Dokumen Jalur
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/pmb/portal-registrasi/dokumen-jalur/create') }}" method="POST">

                        @csrf


                        <input type="hidden" name="pmb_jalur_masuk_id" value="{{ $jalurMasuk->id }}">

                        <div class="row">

                            <div class="col-md-6">
                                <label for="" class="form-label">Nama Dokumen <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="" class="form-label">Nama tipe <span
                                        class="text-danger">*</span></label>

                                <select name="tipe"
                                    class="form-select @error('tipe')
                                is-invalid
                            @enderror"
                                    id="">

                                    <option>Pilih</option>
                                    <option value="PDF" @selected(old('tipe') == 'PDF')>PDF</option>
                                    <option value="JPG" @selected(old('tipe') == 'JPG')>JPG</option>
                                    <option value="JPEG" @selected(old('tipe') == 'JPEG')>JPEG</option>
                                    <option value="PNG" @selected(old('tipe') == 'PNG')>PNG</option>

                                </select>

                                @error('tipe')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="" class="form-label">Sifat <span class="text-danger">*</span></label>
                                <select name="sifat"
                                    class="form-select @error('sifat')
                                is-invalid
                            @enderror"
                                    id="">
                                    <option>Pilih</option>
                                    <option value="required">Wajib</option>
                                    <option value="not required">Tidak Wajib</option>
                                </select>
                                @error('sifat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>

                        <button type="submit" class="btn btn-success mt-3">Simpan</button>

                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Data Dokumen Jalur</h4>
                </div>
                <div class="card-body">

                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <table class="table table-hovered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Sifat</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $nomor = 1;
                            @endphp

                            @foreach ($jalurMasuk->dokumen as $item)
                                <tr>
                                    <td>{{ $nomor++ }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->sifat }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!--End::row-1 -->
@endsection
