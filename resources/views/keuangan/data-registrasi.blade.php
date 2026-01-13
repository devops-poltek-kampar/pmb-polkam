@extends('keuangan.layout')

@section('content')
    <div class="row my-4">
        <div class="card">
            <div class="card-header">
                <h3>Data Registrasi</h3>
            </div>

            <div class="card-body">

                {{-- <a href="{{ url('/user/form-registrasi') }}" class="btn btn-sm btn-primary mb-3">Tambah</a> --}}
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                @if (session('error-message'))
                    <div class="alert alert-danger">{{ session('message') }}</div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Nomor Registrasi</th>
                            <th>Status Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $nomor = 1;
                        @endphp
                        @foreach ($dataRegistrasi as $item)
                            <tr>
                                <td>{{ $nomor++ }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->users->email }}</td>
                                <td>{{ $item->nomor_registrasi }}</td>
                                <td>

                                    <div class="btn-group">
                                        <button type="button"
                                            class="btn @if ($item->status_bayar_registrasi == 'Done') btn-success @endif @if ($item->status_bayar_registrasi == 'Pending') btn-warning @endif @if ($item->status_bayar_registrasi == 'Reject') btn-danger @endif btn-sm dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            {{ $item->status_bayar_registrasi }}
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item"
                                                    href="{{ url('/keuangan') }}/{{ $item->nomor_registrasi }}/{{ 'Pending' }}">Pending</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="{{ url('/keuangan') }}/{{ $item->nomor_registrasi }}/{{ 'Reject' }}">Reject</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="{{ url('/keuangan') }}/{{ $item->nomor_registrasi }}/{{ 'Accept' }}">Accept</a>
                                            </li>

                                        </ul>
                                    </div>
                                    {{-- @if ($item->status_bayar_registrasi == 'Pending')
                                        <span class="badge text-bg-danger">{{ $item->status_bayar_registrasi }}</span>
                                    @endif
                                    @if ($item->status_bayar_registrasi == 'Done')
                                        <span class="badge text-bg-success">{{ $item->status_bayar_registrasi }}</span>
                                    @endif --}}
                                </td>
                                <td>

                                    <button title="Lihat detail" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#modal-pembayaran-{{ $item->id }}"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                            <path
                                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                        </svg>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modal-pembayaran-{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Bukti Pembayaran
                                                        {{ $item->nomor_registrasi }}</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    @if ($item->bukti_pembayaran->count() > 0)
                                                        <div class="row">
                                                            <img src="{{ asset('/storage') }}/{{ $item->bukti_pembayaran->path }}"
                                                                alt="">
                                                        </div>
                                                    @else
                                                        <div class="row">
                                                            <h3>Belum upload pembayaran!</h3>
                                                        </div>
                                                    @endif

                                                </div>
                                                {{-- <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="modal-container"></div>
@endsection
