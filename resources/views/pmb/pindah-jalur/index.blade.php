@extends('pmb.layout')

@section('content')
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Data Pindah Jalur</h3>
                </div>

                <div class="card-body">

                    @if (session('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif

                    @if (session('failed'))
                        <div class="alert alert-danger">{{ session('message') }}</div>
                    @endif

                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>

    {{-- yanti 200
    tika 200
    sari 200
    fatra 200
    nisa 500
    diah 500
    ayu 500
    fina 200 --}}

    @push('script')
        {{ $dataTable->scripts() }}
    @endpush
@endsection
