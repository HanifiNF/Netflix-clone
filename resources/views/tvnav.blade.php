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
        @if($movies->isNotEmpty())
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-xl-6 g-3 text-white">
                @foreach($movies as $movie)
                    <div class="col">
                        <a href="{{ route('movie.play', $movie->id) }}" class="text-decoration-none">
                            <img src="{{ $movie->poster_url }}" alt="{{ $movie->title }}" class="imgsize rounded darken-on-hover">
                            <div class="mt-2">
                                <span class="fs-6 d-block text-truncate link-light">{{ $movie->title }}</span>
                                <p class="fs-6 fst-italic mb-0 small" style="color: #b3b1b1">{{ $movie->genre }} ({{ $movie->year }})</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
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