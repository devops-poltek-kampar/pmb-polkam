@extends('pmb.layout')

@section('content')
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Tambah Jalur</h3>
                </div>

                <div class="card-body">

                    <form action="{{ url('/pmb/jalur/create') }}" method="POST">
                        @csrf

                        {{-- <input type="hidden" name="pmb_gelombang_id" value="{{ $gelombang->id }}"> --}}

                        <label for="" class="form-label">Nama <span class="text-danger">*</span></label>
                        <input type="text"
                            class="form-control @error('nama')
                            is-invalid
                        @enderror"
                            name="nama">

                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
