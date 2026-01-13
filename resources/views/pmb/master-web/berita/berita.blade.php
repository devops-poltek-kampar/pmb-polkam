@extends('pmb.layout')

@section('content')
    <div class="row mt-3">
        <div class="card">

            <div class="card-header">
                <h3>Data Berita</h3>
            </div>

            <div class="card-body">
                <a href="{{ url('/pmb/master-web/berita/tambah') }}" class="btn btn-sm btn-primary mb-3">Tambah</a>
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>

    @push('script')
        {{ $dataTable->scripts() }}
    @endpush
@endsection
