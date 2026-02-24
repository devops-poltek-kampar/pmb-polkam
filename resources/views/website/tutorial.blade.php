@extends('website.layout')

@section('content')
    <div class="container my-4">

        <div class="row mb-3">
            <div class="col-md-8">
                <h3 class="fw-bold text-primary">
                    🎥 Tutorial Registrasi
                </h3>
                <p class="text-muted">
                    Silakan tonton video tutorial berikut untuk panduan proses registrasi.
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body">

                        <!-- Responsive YouTube Embed -->
                        <div class="ratio ratio-16x9 rounded-3 overflow-hidden">
                            <iframe width="560" height="315"
                                src="https://www.youtube.com/embed/7FsPLyOiW04?si=ZhmfF9bWIgBabQtz"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
