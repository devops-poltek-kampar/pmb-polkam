@extends('pmb.layout')


@section('content')
    <!-- Start::row-1 -->

    {{-- <div class="row mt-4">
        <div class="col">
            <div class="card custom-card">
                <div class="card-body">
                    <h6 class="mb-0">Data Gelombang Pendaftaran</h6>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row mt-3">
        <div class="card">
            <div class="card-header">
                <h3>Data Jalur Pendaftaran</h3>
            </div>
            <div class="card-body">
                <a class="btn btn-sm btn-primary mb-3" href="{{ url('/pmb/jalur/tambah') }}">
                    Tambah</a>
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                {{-- <a class="btn btn-success mb-3" href="{{ url('/pmb/gelombang/tambah') }}">Tambah</a> --}}
                <table class="table table-bordered table-hovered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Jalur</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>
                    <tbody>
                        @php
                            $nomor = 1;
                        @endphp
                        @foreach ($dataJalur as $jalur)
                            <tr>
                                <td>{{ $nomor++ }}</td>
                                <td>{{ $jalur->nama }}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning">Edit</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!--End::row-1 -->
@endsection
