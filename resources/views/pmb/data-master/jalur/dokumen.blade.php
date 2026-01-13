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

    <div class="row my-4">
        <div class="card">
            <div class="card-header">
                <h3>Dokumen Syarat Jalur {{ $jalur->nama }} {{ $jalur->gelombang->nama }} {{ $jalur->gelombang->tahun }}
                </h3>
            </div>
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <a class="btn btn-success mb-3" href="{{ url('/pmb/jalur/dokumen/tambah') }}/{{ $jalur->id }}">Tambah</a>

                <table class="table table-bordered table-hovered">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Dokumen</th>
                            <th>Tipe Dokumen</th>
                            <th>Sifat</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $nomor = 1;
                        @endphp
                        @foreach ($jalur->dokumen as $item)
                            <tr>
                                <td>{{ $nomor++ }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->tipe }}</td>
                                <td>{{ $item->sifat }}</td>
                                <td>
                                    <button class="btn btn-sm btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                            <path
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                        </svg>
                                    </button>
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
