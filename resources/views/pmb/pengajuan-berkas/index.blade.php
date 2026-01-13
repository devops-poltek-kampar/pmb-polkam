@extends('pmb.layout')

@section('content')
    <div class="row mt-3">
        <div class="card">
            <div class="card-header">
                <h3>Pengajuan Berkas</h3>
            </div>

            <div class="card-body">

                @if (session('error-message'))
                    <div class="alert alert-danger">
                        {{ session('error-message') }}
                    </div>
                @endif

                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                {{ $dataTable->table() }}

            </div>
        </div>
    </div>

    @push('script')
        {{ $dataTable->scripts() }}
    @endpush
@endsection
