@extends('pmb.layout')

@section('content')
    <div class="row mt-3">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Pindah Prodi</h3>
                </div>
                <div class="card-body">


                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('failed'))
                        <div class="alert alert-success">
                            {{ session('failed') }}
                        </div>
                    @endif

                    {{ $dataTable->table() }}


                    <!-- Modal -->
                    <div class="modal fade" id="modal-ganti-prodi" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ url('/pmb/pindah-prodi') }}" method="POST">

                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ganti Prodi</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        @csrf

                                        <input type="hidden" name="pmb_kelulusan_id" id="pmb_kelulusan_id">

                                        <label for="" class="form-label">Ganti Prodi</label>
                                        <select name="kode_prodi" class="form-select">
                                            <option>Pilih</option>
                                            @foreach ($prodi as $item)
                                                <option value="{{ $item->kode_prodi }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    @push('script')
        {{ $dataTable->scripts() }}

        <script>
            function openModal(row) {
                $("#pmb_kelulusan_id").val(row.id);
                $("#modal-ganti-prodi").modal('show');
            }
        </script>
    @endpush
@endsection
