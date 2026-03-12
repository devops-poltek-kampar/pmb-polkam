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

        <script>
            function deleteBerita(id) {

                Swal.fire({
                    title: "Yakin ingin hapus berita?",
                    showCancelButton: true,
                    confirmButtonText: "Hapus",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "DELETE",
                            url: `{{ url('pmb/master-web/berita/delete') }}`,
                            data: {
                                "id": id
                            },
                            headers: {
                                "X-CSRF-TOKEN": `{{ csrf_token() }}`
                            },
                            dataType: "json",
                            success: function(response) {
                                if (response.status == 200) {
                                    Swal.fire({
                                        title: "Sukses!",
                                        text: response.message,
                                        icon: "success"
                                    });
                                }
                            }
                        });
                    }
                });


            }
        </script>
    @endpush
@endsection
