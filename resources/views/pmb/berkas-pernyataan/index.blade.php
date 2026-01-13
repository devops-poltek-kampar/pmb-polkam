@extends('pmb.layout')

@section('content')
    <div class="row mt-3">

        <div class="card">
            <div class="card-header">
                <h3>Data Berkas Pernyataan</h3>
            </div>

            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>

    </div>

    @push('script')
        {{ $dataTable->scripts() }}
    @endpush
@endsection
