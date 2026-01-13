@extends('pmb.layout')

@section('content')
    @push('css')
        <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/47.3.0/ckeditor5.css" />
    @endpush

    <div class="row mt-3">
        <div class="card">
            <div class="card-content">
                <form action="{{ url('/pmb/master-web/berita/create') }}" method="POST" enctype="multipart/form-data">
                    <div class="card-header">
                        <h3>Data Berita</h3>
                    </div>
                    <div class="card-body">

                        @csrf

                        <label for="" class="form-label">Judul</label>
                        <input type="text" name="subjek"
                            class="form-control mb-3 @error('subjek')
                            is-invalid
                        @enderror">
                        @error('subjek')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="" class="form-label">Thumbnail</label>
                        <input type="file" name="thumbnail"
                            class="form-control mb-3 @error('thumbnail')
                            is-invalid
                        @enderror">
                        @error('thumbnail')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="" class="form-label">Deskripsi</label>
                        <textarea id="editor"
                            class="@error('deskripsi')
                            is-invalid
                        @enderror"
                            name="deskripsi" cols="30" rows="10"></textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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
