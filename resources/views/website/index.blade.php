@extends('website.layout')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row align-items-center gy-5">
                <div class="col-lg-6">
                    <div class="hero-card shadow-sm" data-aos="fade-right" data-aos-delay="150">
                        {{-- <div class="eyebrow d-inline-flex align-items-center mb-3">
                                <i class="bi bi-stars me-2"></i>
                                <span>Lorem ipsum vivamus dictum</span>
                            </div> --}}
                        <div class="content">
                            <h2 class="display-5 fw-bold mb-3">SELAMAT DATANG</h2>
                            <p class="lead mb-4">Di Sistem Penerimaan Mahasiswa Baru Politeknik Kampar</p>
                            <div class="d-flex flex-wrap gap-3">
                                <a href="{{ url('/login') }}" class="btn btn-primary-ghost">
                                    <span>DAFTAR SEKARANG</span>
                                    <i class="bi bi-arrow-right ms-2"></i>
                                </a>
                                <a href="https://youtu.be/sJ_1bmyjwAI?si=WoEI4-Ol51rV1se8"
                                    class="glightbox btn-video d-inline-flex align-items-center">
                                    <span class="play-icon d-inline-flex align-items-center justify-content-center me-2">
                                        <i class="bi bi-play-fill"></i>
                                    </span>
                                    <span>Lihat Profil</span>
                                </a>
                            </div>
                            <div class="mini-stats d-flex flex-wrap gap-4 mt-4" data-aos="zoom-in" data-aos-delay="250">
                                <div class="stat d-flex align-items-center">
                                    <i class="bi bi-lightning-charge me-2"></i>
                                    <span>UNGGUL</span>
                                </div>
                                <div class="stat d-flex align-items-center">
                                    <i class="bi bi-shield-check me-2"></i>
                                    <span>INOVATIF</span>
                                </div>
                                <div class="stat d-flex align-items-center">
                                    <i class="bi bi-people me-2"></i>
                                    <span>TERKEMUKA</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="media-stack" data-aos="zoom-in" data-aos-delay="200">
                        <figure class="media primary shadow-sm">
                            <img src="{{ asset('/assets-website/img/direktorat-polkam.jpeg') }}" class="img-fluid"
                                alt="Hero visual">
                        </figure>
                        {{-- <figure class="media secondary shadow-sm">
                                <img src="assets-website/img/foto-1.jpg" class="img-fluid" alt="Supporting visual">
                            </figure> --}}
                        <div class="floating-badge d-flex align-items-center shadow-sm" data-aos="fade-down"
                            data-aos-delay="300">
                            <i class="bi bi-award me-2"></i>
                            <span>KOMPETEN & PROFESSIONAL</span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row align-items-center gy-5 mt-2">
                <div class="col-lg-6">
                    <div class="media-stack" data-aos="zoom-in" data-aos-delay="200">
                        <figure class="media primary shadow-sm">
                            <img src="{{ asset('/assets-website/img/foto-1.jpg') }}" class="img-fluid" alt="Hero visual">
                        </figure>
                        {{-- <figure class="media secondary shadow-sm">
                                <img src="assets-website/img/foto-1.jpg" class="img-fluid" alt="Supporting visual">
                            </figure> --}}
                        <div class="floating-badge d-flex align-items-center shadow-sm" data-aos="fade-down"
                            data-aos-delay="300">
                            <i class="bi bi-award me-2"></i>
                            <span>KOMPETEN & PROFESSIONAL</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="media-stack" data-aos="zoom-in" data-aos-delay="200">
                        <figure class="media primary shadow-sm">
                            <img src="{{ asset('/assets-website/img/foto-2.jpg') }}" class="img-fluid" alt="Hero visual">
                        </figure>
                        {{-- <figure class="media secondary shadow-sm">
                                <img src="assets-website/img/foto-1.jpg" class="img-fluid" alt="Supporting visual">
                            </figure> --}}
                        <div class="floating-badge d-flex align-items-center shadow-sm" data-aos="fade-down"
                            data-aos-delay="300">
                            <i class="bi bi-award me-2"></i>
                            <span>KOMPETEN & PROFESSIONAL</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section><!-- /Hero Section -->



    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">

                <img id="banner" class="w-100 h-100" src="{{ asset('/assets-website/img/hero-image.jpg') }}"
                    alt="">

            </div>
        </div>
    </div>
@endsection
