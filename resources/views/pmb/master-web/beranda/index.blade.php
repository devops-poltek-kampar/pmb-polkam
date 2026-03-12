@extends('pmb.layout')

@section('content')
    <div class="row mt-3">
        <div class="col-lg-6">
            <div class="card">

                <div class="card-header">
                    <h3>Data Beranda</h3>
                </div>

                <div class="card-body">
                    <form action="{{ url('/pmb/master-web/edit-beranda') }}" enctype="multipart/form-data" method="POST">

                        @csrf

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('failed'))
                            <div class="alert alert-danger">
                                {{ session('failed') }}
                            </div>
                        @endif

                        <label for="">Link Video</label>

                        <input type="text" value="{{ $beranda->link_video }}" class="form-control" name="link_video">

                        <a target="_blank" href="https://youtu.be/sJ_1bmyjwAI?si=WoEI4-Ol51rV1se8"
                            class="glightbox my-3 btn-video d-inline-flex align-items-center">
                            <span class="play-icon d-inline-flex align-items-center justify-content-center me-2">
                                <i class="bi bi-play-fill"></i>
                            </span>
                            <span>Lihat Video Profil</span>
                        </a>

                        <br>

                        <label for="">Banner</label>
                        <br>
                        <img src="{{ asset('/storage') }}/{{ $beranda->banner_path }}" class="w-100" alt="">

                        <br>

                        <input type="file"
                            class="form-control @error('banner_path')
                            is-invalid
                        @enderror"
                            name="banner_path">

                        @error('banner_path')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <br>

                        <label for="">Banner 1 (Ratio 16:9)</label>


                        <img src="{{ asset('/storage') }}/{{ $beranda->path_img1 }}" class="w-100" alt="">

                        <input type="file"
                            class="form-control @error('path_img1')
                            is-invalid
                        @enderror"
                            name="path_img1">
                        @error('path_img1')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <br>

                        <label for="">Banner 2 (Ratio 16:9)</label>

                        <img src="{{ asset('/storage') }}/{{ $beranda->path_img2 }}" class="w-100" alt="">

                        <input type="file"
                            class="form-control @error('path_img2')
                            is-invalid
                        @enderror"
                            name="path_img2">
                        @error('path_img2')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <br>

                        <label for="">Banner 3 (Ratio 16:9)</label>

                        <img src="{{ asset('/storage') }}/{{ $beranda->path_img3 }}" class="w-100" alt="">

                        <input type="file"
                            class="form-control @error('path_img3')
                            is-invalid
                        @enderror"
                            name="path_img3">

                        @error('path_img3')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <button class="btn mt-3 btn-sm btn-primary">Simpan</button>

                    </form>
                </div>


            </div>
        </div>
    </div>
@endsection
