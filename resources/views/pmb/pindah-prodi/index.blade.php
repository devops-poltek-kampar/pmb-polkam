@extends('pmb.layout')

@section('content')
    <div class="row mt-3">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Pindah Prodi</h3>
                </div>
                <div class="card-body">
                    {{ $dataTable->table() }}




                    <!-- Modal -->
                    <div class="modal fade" id="modal-ganti-prodi" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ganti Prodi</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="">
                                        <label for="" class="form-label">Ganti Prodi</label>
                                        <select name="kode_prodi" class="form-select">
                                            <option>Pilih</option>
                                            @foreach ($prodi as $item)
                                                <option value="{{ $item->kode_prodi }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Simpan</button>
                                </div>
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
                $("#modal-ganti-prodi").modal('show');
            }
        </script>
    @endpush
@endsection
