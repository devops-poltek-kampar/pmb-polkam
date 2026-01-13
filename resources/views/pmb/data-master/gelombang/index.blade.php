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
                <h3>Data Gelombang Pendaftaran</h3>
            </div>
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <a class="btn btn-success mb-3" href="{{ url('/pmb/gelombang/tambah') }}">Tambah</a>
                <table class="table table-bordered table-hovered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Gelombang</th>
                            <th>Tahun</th>
                            <th>Buka</th>
                            <th>Tutup</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>
                    <tbody>
                        @php
                            $nomor = 1;
                        @endphp
                        @foreach ($dataGelombang as $gelombang)
                            <tr>
                                <td>{{ $nomor++ }}</td>
                                <td>{{ $gelombang->nama }}</td>
                                <td>{{ $gelombang->tahun }}</td>
                                <td>{{ $gelombang->open }}</td>
                                <td>{{ $gelombang->close }}</td>
                                <td>

                                    @switch($gelombang->status)
                                        @case('OPEN')
                                            <span class="badge bg-success">{{ $gelombang->status }}</span>
                                        @break

                                        @case('CLOSE')
                                            <span class="badge bg-danger">{{ $gelombang->status }}</span>
                                        @break

                                        @default
                                            nothing
                                    @endswitch

                                </td>
                                <td>

                                    <div class="form-check form-switch mb-0">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckCheckedDisabled" onclick="onCheckboxClick(event)" checked>
                                        {{-- <label class="form-check-label" for="flexSwitchCheckCheckedDisabled">Disabled
                                            checked switch checkbox input</label> --}}
                                    </div>
                                    {{-- <a href="{{ url('/pmb/jalur/tambah') }}/{{ $gelombang->id }}"
                                        title="Tambah jalur gelombang" class="btn btn-sm btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                            <path
                                                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                            <path
                                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                        </svg>
                                    </a> --}}

                                    {{-- <a href="{{ url('/pmb/gelombang/jalur-gelombang/') }}/{{ $gelombang->id }}"
                                        title="Lihat jalur gelombang" class="btn btn-sm btn-info">
                                        Lihat Jalur
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                            <path
                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                        </svg>
                                    </a> --}}



                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            function onCheckboxClick(event) {

                if (event.target.checked) {



                }

            }
        </script>
    @endpush

    <!--End::row-1 -->
@endsection
