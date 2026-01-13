@extends('pmb.layout')

@section('content')
    <div class="row mt-3">
        <div class="card">
            <div class="card-header">
                <h3>Pengajuan Berkas</h3>
            </div>

            <div class="card-body">



                <div class="row">

                    <table class="table table-borderless mb-0">
                        <tbody>
                            <tr class="border-bottom">
                                <td class="text-muted fw-semibold ps-4">Nama</td>
                                <td class="fw-bold text-dark">
                                    {{ $berkas->registrasi->nama }}
                                </td>
                            </tr>

                            <tr class="border-bottom">
                                <td class="text-muted fw-semibold ps-4">Nomor Registrasi</td>
                                <td>
                                    <span class="badge bg-success fs-6">
                                        {{ $berkas->nomor_registrasi }}
                                    </span>
                                </td>
                            </tr>

                            <tr class="border-bottom">
                                <td class="text-muted fw-semibold ps-4">Gelombang</td>
                                <td class="fw-semibold">
                                    {{ $berkas->registrasi->jalur_masuk->gelombang->nama }}
                                </td>
                            </tr>

                            <tr class="border-bottom">
                                <td class="text-muted fw-semibold ps-4">Tahun</td>
                                <td>
                                    <span class="badge bg-info text-dark">
                                        {{ $berkas->registrasi->jalur_masuk->gelombang->tahun }}
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-muted fw-semibold ps-4">Tanggal Pengajuan</td>
                                <td class="fw-semibold">
                                    {{ \Carbon\Carbon::parse($berkas->created_at)->translatedFormat('d F Y H:i') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    {{-- <table class="table table-striped table-hovered">

                        <tr>
                            <td><strong>NAMA</strong></td>
                            <td><strong>{{ $berkas->registrasi->nama }}</strong></td>
                        </tr>

                        <tr>
                            <td><strong>NOMOR REGISTRASI</strong></td>
                            <td><strong>{{ $berkas->nomor_registrasi }}</strong></td>
                        </tr>

                        <tr>
                            <td><strong>GELOMBANG</strong></td>
                            <td><strong>{{ $berkas->registrasi->jalur_masuk->gelombang->nama }}</strong></td>
                        </tr>

                        <tr>
                            <td><strong>TAHUN</strong></td>
                            <td><strong>{{ $berkas->registrasi->jalur_masuk->gelombang->tahun }}</strong></td>
                        </tr>

                        <tr>
                            <td><strong>TANGGAL PENGAJUAN</strong></td>
                            <td><strong>{{ $berkas->created_at }}</strong></td>
                        </tr>

                    </table> --}}

                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    @if (session('error-message'))
                        <div class="alert alert-danger">
                            {{ session('error-message') }}
                        </div>
                    @endif


                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Pesan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @php
                                $nomor = 1;
                            @endphp
                            @foreach ($berkas->berkas as $item)
                                <tr>
                                    <td>{{ $nomor++ }}</td>

                                    <td>{{ str_replace('_', ' ', $item->kategori) }}</td>
                                    <td>
                                        @switch($item->status)
                                            @case('Review')
                                                <span class="badge bg-info">{{ $item->status }}</span>
                                            @break

                                            @case('Reject')
                                                <span class="badge bg-danger">{{ $item->status }}</span>
                                            @break

                                            @case('Accept')
                                                <span class="badge bg-primary">{{ $item->status }}</span>
                                            @break

                                            @default
                                        @endswitch

                                    </td>
                                    <td>{{ $item->message }}</td>
                                    <td>

                                        <button type="button"
                                            class="btn btn-sm @if ($item->status == 'Review') btn-info @endif @if ($item->status == 'Reject') btn-danger @endif @if ($item->status == 'Accept') btn-primary @endif"
                                            data-bs-toggle="modal" data-bs-target="#file{{ $item->id }}">
                                            View
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal modal-xl fade" id="file{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="" method="POST">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                {{ str_replace('_', ' ', $item->kategori) }}</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <iframe class="w-100" style="height: 700px"
                                                                src="{{ asset('storage') }}/{{ $item->path }}"
                                                                frameborder="0"></iframe>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#reject{{ $item->id }}">
                                            Reject
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="reject{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ url('/pmb/pengajuan-berkas/reject') }}"
                                                        method="POST">

                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                Pesan reject {{ str_replace('_', ' ', $item->kategori) }}
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @csrf

                                                            <input type="hidden" name="berkas_id"
                                                                value="{{ $item->id }}">
                                                            <label for="" class="form-label">Pesan</label>
                                                            <input type="text" class="form-control" name="message">
                                                        </div>
                                                        <div class="modal-footer">

                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="{{ url('/pmb/pengajuan-berkas/accept-berkas') }}/{{ $item->id }}"
                                            class="btn btn-sm btn-primary">Accept</a>



                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>


            </div>
        </div>
    </div>
@endsection
