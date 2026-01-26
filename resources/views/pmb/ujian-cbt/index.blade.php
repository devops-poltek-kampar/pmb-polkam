@extends('pmb.layout')

@section('content')
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Data Ujian CBT</h3>
                </div>

                <div class="card-body">

                    @if (session('info'))
                        <div class="alert alert-info">
                            {{ session('info') }}
                        </div>
                    @endif

                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>

    @push('script')
        {{ $dataTable->scripts() }}
    @endpush
@endsection
