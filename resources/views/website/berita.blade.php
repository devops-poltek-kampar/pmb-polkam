@extends('website.layout')

@section('content')
    <div class="container my-3">
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
    </div>
@endsection
