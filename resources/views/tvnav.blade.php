<!-- resources/views/search-results.blade.php -->
@extends('layouts.nav')

@section('content')
    @if($trending)
        <h1 class="ms-5 mt-5 mb-3 text-white fw-normal">Trending TV Series</h1>
    @elseif($popular)
        <h1 class="ms-5 mt-5 mb-3 text-white fw-normal">Popular TV Series</h1>
    @elseif($liked)
        <h1 class="ms-5 mt-5 mb-3 text-white fw-normal">Most Liked TV Series</h1>
    @endif
    <div class="container-fluid">
    <div class="mx-5">
        @php
            $moviesCount = $movies->count();
        @endphp
        @if($moviesCount > 0)
            @foreach($movies->chunk(7) as $chunkedMovies)
                <div class="row text-white row-cols-auto">
                    @foreach($chunkedMovies as $movie)
                        <div class="col-sm mt-2 d-flex flex-column justify-content-start">
                            <div class="container-fluid">
                                <a href="{{ route('movie.play', $movie->title) }}">
                                    <img src="{{ asset($movie->poster) }}" class="imgsize rounded darken-on-hover">
                                </a>
                                <div class="d-flex align-items-start text-start">
                                    <div class="details-section align-self-end">
                                        <a href="{{ route('movie.play', $movie->title) }}" class="fs-6 mt-2 d-inline-block text-truncate link-light" style="max-width: 170px;">{{ $movie->title }}</a>
                                        <p class="fs-6 fst-italic mb-3" style="color: #b3b1b1">{{ $movie->genre }} ({{ $movie->year }})</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @if ($chunkedMovies->count() < 7)
                        @for ($j = 0; $j < 7 - $chunkedMovies->count(); $j++)
                            <div class="col mt-5 mb-3"></div>
                        @endfor
                    @endif
                </div>
            @endforeach
            <div class="d-flex justify-content-center bg-white">
                {{ $movies->links() }}
            </div>
        @else
            <div class="row text-center text-white justify-content-center">
                <div class="col mt-5 mb-3">
                    <h5>No movies found.</h5>
                </div>
            </div>
        @endif
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

@endsection