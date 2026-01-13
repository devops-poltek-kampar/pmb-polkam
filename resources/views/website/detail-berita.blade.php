@extends('website.layout')

@section('content')
    @push('css')
        <style>
            .news-header img {
                border-radius: 16px;
                object-fit: cover;
            }

            .news-content p {
                line-height: 1.8;
                font-size: 1.05rem;
            }

            .badge-category {
                background: #0d6efd;
            }

            .related-news img {
                height: 80px;
                object-fit: cover;
                border-radius: 10px;
            }

            /* .berita-card {
                                                                        transition: all 0.3s ease;
                                                                        cursor: pointer;
                                                                    }

                                                                    .berita-card:hover {
                                                                        transform: translateY(-6px);
                                                                        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
                                                                    }

                                                                    .berita-img {
                                                                        transition: transform 0.4s ease;
                                                                    }

                                                                    .berita-card:hover .berita-img {
                                                                        transform: scale(1.08);
                                                                    }

                                                                    .berita-title h4 {
                                                                        transition: color 0.3s ease;
                                                                    }

                                                                    .berita-card:hover .berita-title h4 {
                                                                        color: #0d6efd;
                                                                        warna primary Bootstrap
                                                                    } */
        </style>
    @endpush

    <div class="container py-5">
        <div class="row justify-content-center">

            <!-- MAIN CONTENT -->
            <div class="col-lg-8">

                <!-- CATEGORY -->
                <span class="badge badge-category mb-3">
                    Pendidikan
                </span>

                <!-- TITLE -->
                <h1 class="fw-bold mb-3">
                    Pengumuman Hasil Seleksi Penerimaan Mahasiswa Baru 2026
                </h1>

                <!-- META -->
                <div class="text-muted mb-4">
                    <small>
                        Dipublikasikan pada
                        <strong>20 Januari 2026</strong> ·
                        Oleh <strong>Admin</strong>
                    </small>
                </div>

                <!-- IMAGE -->
                <div class="news-header mb-4">
                    <img src="https://via.placeholder.com/900x450" class="img-fluid w-100" alt="Gambar Berita">
                </div>

                <!-- CONTENT -->
                <div class="news-content bg-white p-4 rounded-4 shadow-sm">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Pellentesque habitant morbi tristique senectus et netus et
                        malesuada fames ac turpis egestas.
                    </p>

                    <p>
                        Vestibulum ante ipsum primis in faucibus orci luctus et
                        ultrices posuere cubilia curae; Donec velit neque,
                        auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                    </p>

                    <p>
                        Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.
                        Vivamus suscipit tortor eget felis porttitor volutpat.
                    </p>
                </div>

            </div>

            <!-- SIDEBAR -->
            <div class="col-lg-4 mt-5 mt-lg-0">

                <!-- INFO BOX -->
                <div class="card mb-4 shadow-sm rounded-4">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">Informasi</h6>
                        <ul class="list-unstyled mb-0">
                            <li>📅 Tanggal: 20 Januari 2026</li>
                            <li>🏷 Kategori: Pendidikan</li>
                            <li>👁 Dibaca: 1.245 kali</li>
                        </ul>
                    </div>
                </div>

                <!-- RELATED NEWS -->
                <div class="card shadow-sm rounded-4">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">Berita Terkait</h6>

                        <div class="related-news d-flex mb-3">
                            <img src="https://via.placeholder.com/150" class="me-3" alt="">
                            <div>
                                <a href="#" class="text-decoration-none fw-semibold">
                                    Jadwal Daftar Ulang Mahasiswa Baru
                                </a>
                                <div class="text-muted small">18 Januari 2026</div>
                            </div>
                        </div>

                        <div class="related-news d-flex">
                            <img src="https://via.placeholder.com/150" class="me-3" alt="">
                            <div>
                                <a href="#" class="text-decoration-none fw-semibold">
                                    Tata Cara Pembayaran Registrasi
                                </a>
                                <div class="text-muted small">15 Januari 2026</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-8">
                <img class="w-100" src="{{ asset('/storage') }}/{{ $berita->thumbnail }}" alt="">

                <h3 class="mt-3 fw-bold">{{ $berita->subjek }}</h3>

                <p>{{ $berita->created_at }}</p>

                <div class="text-justify">
                    {!! $berita->deskripsi !!}
                </div>

            </div>

            <div class="col-md-4">
                <h4 class="fw-bold text-warning">Berita Lainnya</h4>

                <div class="card berita-card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <div class="row align-items-center">

                            <div class="col-md-4 overflow-hidden rounded">
                                <img class="w-100 berita-img" src="{{ asset('/storage') }}/{{ $berita->thumbnail }}"
                                    alt="">
                            </div>

                            <div class="col-md-8">
                                <a href="{{ url('/berita') }}/{{ $berita->slug }}"
                                    class="text-decoration-none berita-title">
                                    <h4 class="fw-bold mb-2">
                                        {{ $berita->subjek }}
                                    </h4>
                                </a>

                                <p class="text-muted mb-0">
                                    {!! \Illuminate\Support\Str::words(strip_tags($berita->deskripsi), 20, '...') !!}
                                </p>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img class="w-100" src="{{ asset('/storage') }}/{{ $berita->thumbnail }}"
                                        alt="">
                                </div>

                                <div class="col-md-8">
                                    <a href="{{ url('/berita') }}/{{ $berita->slug }}" class="fw-bold">
                                        <h4 class="fw-bold">{{ $berita->subjek }}</h4>
                                    </a>

                                    <p>{!! \Illuminate\Support\Str::words($berita->deskripsi, 20, '......') !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
