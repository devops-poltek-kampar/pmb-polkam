@extends('pmb.layout')


@section('content')
    <div class="row mt-3">
        <div class="card">
            <div class="card-header">
                <h3>Data Registrasi</h3>
            </div>
            <div class="card-body">


                <form action="{{ url('/pmb/export-calon-mahasiswa') }}" method="GET">

                    <div class="row">
                        <div class="col-md-6">
                            <label for=""><strong>Gelombang</strong></label>
                            <select name="pmb_gelombang_id" class="form-select" id="">

                                <option>Pilih</option>

                                @foreach ($gelombang as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }} {{ $item->tahun }}</option>
                                @endforeach

                            </select>
                        </div>

                        {{-- <div class="col-md-6">

                            <label for=""><strong>Jalur Masuk</strong></label>
                            <select name="pmb_jalur_masuk_id" class="form-select" id="">

                                <option>Pilih</option>
                                @foreach ($jalurMasuk as $item)
                                    <option value="{{ $item->id }}">{{ $item->jalur->nama }}
                                    </option>
                                @endforeach

                            </select>
                        </div> --}}
                    </div>


                    <!-- Button -->
                    <div class="d-grid mt-3">
                        <button type="submit" class="btn btn-info btn-export">
                            ⬇️ Export Data
                        </button>
                    </div>

                </form>



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
