@extends('pmb.layout')


@section('content')
    <div class="row mt-3">
        <div class="card">
            <div class="card-header">
                <h3>Data Registrasi</h3>
            </div>
            <div class="card-body">
                {{-- <div class="table-wrapper"> --}}
                {{ $dataTable->table() }}
                {{-- </div> --}}
            </div>
        </div>
    </div>

    @push('script')
        {{ $dataTable->scripts() }}
    @endpush
@endsection
