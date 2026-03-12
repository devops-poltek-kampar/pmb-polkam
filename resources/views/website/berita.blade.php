@extends('website.layout')

@section('content')
    @push('css')
        <style>
            .berita-card {
                transition: all 0.3s ease;
            }

            .berita-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            }

            .object-fit-cover {
                object-fit: cover;
            }
        </style>
    @endpush


    <div class="container my-4">
        <div class="row g-3">

            <!-- Berita Utama -->
            <div class="col-md-6">
                <div class="card border-0 shadow h-100">
                    <img src="{{ asset('/storage') }}/{{ $berita[0]->thumbnail }}" class="card-img-top" alt="Berita Utama">
                    <div class="card-body">
                        {{-- <span class="badge bg-danger mb-2">Highlight</span> --}}
                        <small class="text-muted">10 Maret 2026</small>
                        <h4 class="card-title">
                            {{ $berita[0]->subjek }}
                        </h4>
                        <p class="card-text text-muted">
                            {!! $berita[0]->deskripsi !!}
                        </p>
                        <a href="{{ url('/berita') }}/{{ $berita[0]->slug }}" class="btn btn-sm btn-primary">Baca
                            Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- List Highlight Berita -->
            <div class="col-md-6">

                @for ($i = 1; $i < $berita->count(); $i++)
                    <div class="card mb-3 border-0 shadow-sm">
                        <div class="row g-0">
                            <div class="col-4">
                                <img src="{{ asset('/storage') }}/{{ $berita[$i]->thumbnail }}"
                                    class="img-fluid rounded-start h-100" style="object-fit:cover;">
                            </div>
                            <div class="col-8">
                                <div class="card-body p-2">
                                    <h6 class="card-title mb-1">
                                        <a href="{{ url('/berita') }}/{{ $berita[$i]->slug }}">{{ $berita[$i]->subjek }}</a>
                                    </h6>
                                    <small class="text-muted">{{ $berita[$i]->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor

                {{-- <div class="card mb-3 border-0 shadow-sm">
                    <div class="row g-0">
                        <div class="col-4">
                            <img src="https://picsum.photos/200/150" class="img-fluid rounded-start h-100"
                                style="object-fit:cover;">
                        </div>
                        <div class="col-8">
                            <div class="card-body p-2">
                                <h6 class="card-title mb-1">
                                    <a href="#">Judul Highlight Berita 1</a>
                                </h6>
                                <small class="text-muted">10 Maret 2026</small>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- 
                <div class="card mb-3 border-0 shadow-sm">
                    <div class="row g-0">
                        <div class="col-4">
                            <img src="https://picsum.photos/201/150" class="img-fluid rounded-start h-100"
                                style="object-fit:cover;">
                        </div>
                        <div class="col-8">
                            <div class="card-body p-2">
                                <h6 class="card-title mb-1">
                                    Judul Highlight Berita 2
                                </h6>
                                <small class="text-muted">9 Maret 2026</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3 border-0 shadow-sm">
                    <div class="row g-0">
                        <div class="col-4">
                            <img src="https://picsum.photos/202/150" class="img-fluid rounded-start h-100"
                                style="object-fit:cover;">
                        </div>
                        <div class="col-8">
                            <div class="card-body p-2">
                                <h6 class="card-title mb-1">
                                    Judul Highlight Berita 3
                                </h6>
                                <small class="text-muted">8 Maret 2026</small>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>

        </div>
    </div>



    {{-- <div class="container my-5">
        <div class="row g-4">

            @foreach ($berita as $item)
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100 berita-card">

                        <div class="row g-0">

                            <div class="col-md-5">
                                <img src="{{ asset('/storage/' . $item->thumbnail) }}"
                                    class="img-fluid rounded-start h-100 object-fit-cover" alt="{{ $item->subjek }}">
                            </div>

                            <div class="col-md-7">
                                <div class="card-body d-flex flex-column h-100">

                                    <h5 class="card-title fw-bold">
                                        <a href="{{ url('/berita/' . $item->slug) }}"
                                            class="text-decoration-none text-dark">
                                            {{ $item->subjek }}
                                        </a>
                                    </h5>

                                    <small class="text-muted mb-2">
                                        {{ $item->created_at->format('d M Y') }}
                                    </small>

                                    <p class="card-text text-muted flex-grow-1">
                                        {!! \Illuminate\Support\Str::words($item->deskripsi, 25, '...') !!}
                                    </p>

                                    <a href="{{ url('/berita/' . $item->slug) }}" class="btn btn-sm btn-primary mt-auto">
                                        Baca Selengkapnya
                                    </a>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            @endforeach

        </div>
    </div> --}}



    {{-- <div class="container my-3">
        @foreach ($berita as $item)
            <div class="row mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img class="w-100 h-100 p-0 m-0" src="{{ asset('/storage') }}/{{ $item->thumbnail }}"
                                    alt="">
                            </div>

                            <div class="col-md-6">
                                <a href="{{ url('/berita') }}/{{ $item->slug }}">
                                    <h4 class="fw-bold">{{ $item->subjek }}</h4>
                                </a>
                                <p>{{ $item->created_at }}</p>

                                <p>{!! \Illuminate\Support\Str::words($item->deskripsi, 50, '...') !!}<a href="{{ url('/berita') }}/{{ $item->slug }}">lihat
                                        selengkapnya!</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div> --}}
@endsection
