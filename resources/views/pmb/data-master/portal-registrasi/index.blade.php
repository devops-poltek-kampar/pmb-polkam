@extends('pmb.layout')

@section('content')
    <div class="row mt-3">
        <div class="card">
            <div class="card-header">
                <h3>Data Portal Registrasi</h3>
            </div>
            <div class="card-body">

                <a href="{{ url('/pmb/portal-registrasi/tambah') }}" class="btn btn-sm btn-primary mb-3">Tambah Portal</a>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gelombang</th>
                            <th>Tahun</th>
                            <th>Jalur Masuk</th>
                            <th>Buka</th>
                            <th>Tutup</th>
                            <th>Status</th>
                            <th>Biaya Registrasi</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $nomor = 1;
                        @endphp
                        @foreach ($portalRegistrasi as $item)
                            <tr>
                                <td>{{ $nomor++ }}</td>
                                <td>{{ $item->gelombang->nama }}</td>
                                <td>{{ $item->gelombang->tahun }}</td>
                                <td>{{ $item->jalur->nama }}</td>
                                <td>{{ $item->gelombang->open }}</td>
                                <td>{{ $item->gelombang->close }}</td>
                                <td>{{ $item->gelombang->status }}</td>
                                <td>Rp. {{ number_format($item->biaya_registrasi, 0, ',', '.') }}</td>
                                <td>

                                    <a class="btn btn-sm btn-primary"
                                        href="{{ url('/pmb/portal-registrasi/dokumen-jalur') }}/{{ $item->id }}">Dokumen</a>

                                    <a class="btn btn-sm btn-success"
                                        href="{{ url('/pmb/portal-registrasi/program-studi') }}/{{ $item->id }}">Program
                                        Studi</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
