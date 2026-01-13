@extends('pmb.layout')


@section('content')
    <!-- Start::row-1 -->

    <div class="row my-4">

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Data Jalur</h4>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <td>Gelombang</td>
                            <td>: {{ $programStudiJalur->gelombang->nama }}</td>
                        </tr>
                        <tr>
                            <td>Tahun</td>
                            <td>: {{ $programStudiJalur->gelombang->tahun }}</td>
                        </tr>
                        <tr>
                            <td>Jalur</td>
                            <td>: {{ $programStudiJalur->jalur->nama }}</td>
                        </tr>

                        <tr>
                            <td>Biaya Registrasi</td>
                            <td>: Rp. {{ number_format($programStudiJalur->biaya_registrasi, 0, ',', '.') }}</td>
                        </tr>

                    </table>
                </div>

            </div>

        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Prodi</h4>
                </div>

                <form action="{{ url('/pmb/portal-registrasi/program-studi/create') }}" method="POST">

                    @csrf

                    <input type="hidden" name="pmb_jalur_masuk_id" value="{{ $programStudiJalur->id }}">

                    <label for="" class="form-label mt-3">Program Studi</label>
                    <select name="master_program_studi_id" id="" class="form-select mb-3">
                        <option>Pilih</option>
                        @foreach ($prodi as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>

                    {{-- <label for="" class="form-label">Keterangan</label>

                    <input type="text" class="form-control mb-3" name="keterangan"> --}}

                    <button type="submit" class="btn btn-sm btn-primary">Tambah</button>

                </form>
            </div>

        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <p><strong>Prodi Yang Dibuka Pada Jalur {{ $programStudiJalur->jalur->nama }}</strong></p>
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
                                <th>Prodi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $nomor = 1;
                            @endphp
                            @foreach ($programStudiJalur->program_studi as $prodi)
                                <tr>
                                    <td>{{ $nomor++ }}</td>
                                    <td>{{ $prodi->prodi->nama }}</td>

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
