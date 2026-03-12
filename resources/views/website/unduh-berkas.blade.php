@extends('website.layout')

@section('content')
    @push('css')
        <style>
            body {
                background: #f5f7fb;
            }

            .card-doc {
                border: none;
                border-radius: 15px;
                transition: 0.3s;
            }

            .card-doc:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            }

            .pdf-preview {
                height: 350px;
                border-radius: 10px;
            }

            .icon-doc {
                font-size: 40px;
                color: #0d6efd;
            }
        </style>
    @endpush


    <div class="container py-5">

        <h3 class="mb-4 text-center fw-bold">
            Dokumen Penerimaan Mahasiswa Baru
        </h3>

        <div class="row g-4">

            <!-- Brosur -->
            <div class="col-md-6">
                <div class="card card-doc shadow-sm p-3">

                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3 icon-doc">
                            📄
                        </div>

                        <div>
                            <h5 class="mb-0">Brosur PMB</h5>
                            <small class="text-muted">Informasi lengkap penerimaan mahasiswa</small>
                        </div>
                    </div>

                    <iframe class="w-100 pdf-preview" src="{{ asset('/assets-website/browsur.pdf') }}">
                    </iframe>

                    <div class="mt-3 d-flex gap-2">

                        <a href="{{ asset('/assets-website/browsur.pdf') }}" class="btn btn-primary w-100" target="_blank">
                            Lihat Fullscreen
                        </a>

                        <a href="{{ asset('/assets-website/browsur.pdf') }}" class="btn btn-outline-secondary w-100"
                            download>
                            Download
                        </a>

                    </div>

                </div>
            </div>

            <!-- Surat Pernyataan -->
            <div class="col-md-6">
                <div class="card card-doc shadow-sm p-3">

                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3 icon-doc">
                            📝
                        </div>

                        <div>
                            <h5 class="mb-0">Surat Pernyataan Kesiapan Kuliah</h5>
                            <small class="text-muted">Dokumen wajib untuk calon mahasiswa</small>
                        </div>
                    </div>

                    {{-- <iframe class="w-100 pdf-preview" src="">
                    </iframe> --}}

                    <div class="mt-3 d-flex gap-2">

                        <a href="surat_pernyataan.pdf" class="btn btn-success w-100" target="_blank">
                            Lihat Fullscreen
                        </a>

                        <a href="surat_pernyataan.pdf" class="btn btn-outline-secondary w-100" download>
                            Download
                        </a>

                    </div>

                </div>

            </div>




        </div>
    </div>
@endsection
