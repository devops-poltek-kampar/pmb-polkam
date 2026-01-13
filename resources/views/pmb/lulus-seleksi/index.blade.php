@extends('pmb.layout')

@section('content')
    <div class="row mt-3">

        <div class="card">
            <div class="card-header">
                <h3>Data Kelulusan</h3>
            </div>

            <div class="card-body">

                {{ $dataTable->table() }}

                {{-- <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Registrasi</th>
                        </tr>
                    </thead>

                    <tbody>

                    </tbody>
                </table> --}}
            </div>

        </div>

    </div>


    @push('script')
        {{ $dataTable->scripts() }}
    @endpush
@endsection
