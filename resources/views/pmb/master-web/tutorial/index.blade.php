@extends('pmb.layout')

@section('content')
    <div class="row mt-3">
        <div class="card">

            <div class="card-header">
                <h3>Tutorial</h3>
            </div>

            <div class="card-body">

                <form action="{{ url('/pmb/master-web/tutorial/edit') }}" method="POST">

                    @csrf

                    <label for="">link IFrame</label>

                    <textarea name="link" id="" cols="30" rows="5" class="form-control mb-3">{{ $tutorial->link }}</textarea>

                    {!! $tutorial->link !!}

                    {{-- <iframe width="560" height="315"
                        src="https://www.youtube.com/embed/7FsPLyOiW04?si=ZhmfF9bWIgBabQtz" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> --}}

                    <br>

                    <button class="btn btn-sm btn-primary mt-3">Simpan</button>


                </form>

            </div>
        </div>
    </div>
@endsection
