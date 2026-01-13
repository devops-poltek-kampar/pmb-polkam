@extends('pmb.layout')

@section('content')
    @push('css')
        <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/47.3.0/ckeditor5.css" />
    @endpush

    <div class="row mt-3">
        <div class="card">
            <div class="card-content">
                <form action="{{ url('/pmb/master-web/berita/edit') }}" method="POST" enctype="multipart/form-data">
                    <div class="card-header">
                        <h3>Data Berita</h3>
                    </div>
                    <div class="card-body">

                        @csrf

                        <input type="hidden" name="id" value="{{ $berita->id }}">

                        <label for="" class="form-label">Judul</label>
                        <input type="text" name="subjek" value="{{ $berita->subjek }}" class="form-control mb-3">

                        <label for="" class="form-label">Thumbnail</label>
                        <input type="file" name="thumbnail" class="form-control mb-3">
                        <img class="w-100 my-3" src="{{ asset('/storage') }}/{{ $berita->thumbnail }}" alt="">

                        <label for="" class="form-label">Deskripsi</label>
                        <textarea id="editor" name="deskripsi" cols="30" rows="10">{{ $berita->deskripsi }}</textarea>
                    </div>
                    <button class="btn btn-sm btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    @push('script')
        <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
        {{-- <script src="https://cdn.ckeditor.com/ckeditor5/47.3.0/ckeditor5.umd.js"></script> --}}
        <script>
            ClassicEditor.create(document.querySelector('#editor'))
                .catch(error => console.error(error));
        </script>
    @endpush
@endsection
