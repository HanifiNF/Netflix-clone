@extends('layouts.nav')

@section('content')
<section class="container-fluid">
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                @foreach($carouselMovies as $index => $movie)
                    <div class="carousel-item @if($index == 0) active @endif gradient-overlay">
                        <img src="../img/godzilla.jpg" class="d-block" alt="{{ $movie->title }}">
                        <div class="carousel-caption d-none d-md-block" style="z-index: 10;">
                            <h3>{{ $movie->title }}</h3>
                            <p>{{ $movie->description }}</p>
                            <a href="{{ route('movie.play', $movie->id) }}" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="container-fluid">
            <div class="d-flex mt-5 ms-3 me-4">
                <div class="me-auto">
                    <h1 class="fw-normal text-white" style="font-family: lora;"> Recently Added</h1>
                </div>
                <div class="p-2 text-light link-light">
                    <a href="{{route('recently')}}" class="text-light">Show More</a>
                </div>
            </div>
            @if($sortedMovies->isNotEmpty())
                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-xl-6 g-3 text-white">
                    @foreach($sortedMovies as $movie)
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
            @else
                <div class="row text-center text-white justify-content-center">
                    <div class="col mt-5 mb-3"><h5>No movies found.</h5></div>
                </div>
            @endif
        </div>
        <div class="container-fluid">
            <div class="d-flex mt-5 ms-3 me-4">
                <div class="me-auto">
                    <h1 class="fw-normal text-white" style="font-family: lora;"> Movie</h1>
                </div>
                <div class="p-2 text-light link-light">
                    <a href="{{route('movie')}}" class="text-light">Show More</a>
                </div>
            </div>
            @if($movietype->isNotEmpty())
                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-xl-6 g-3 text-white">
                    @foreach($movietype as $movie)
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
            @else
                <div class="row text-center text-white justify-content-center">
                    <div class="col mt-5 mb-3"><h5>No movies found.</h5></div>
                </div>
            @endif
        </div>
        <div class="container-fluid">
            <div class="d-flex mt-5 ms-3 me-4">
                <div class="me-auto">
                    <h1 class="fw-normal text-white" style="font-family: lora;"> TV-Series</h1>
                </div>
                <div class="p-2 text-light link-light">
                    <a href="{{route('tv')}}" class="text-light">Show More</a>
                </div>
            </div>
            @if($tv->isNotEmpty())
                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-xl-6 g-3 text-white">
                    @foreach($tv as $movie)
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
            @else
                <div class="row text-center text-white justify-content-center">
                    <div class="col mt-5 mb-3"><h5>No movies found.</h5></div>
                </div>
            @endif
        </div>
</section>

<!-- Add this script to show the pop-up -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#loggedInAlert').modal('show');
    });
</script>

@endsection
