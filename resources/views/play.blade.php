@extends('layouts.nav')

@section('content')
    <div class="container text-light mt-5">
        <div class="card bg-dark">
            <div class="card-body text-light">
                <div class="video-container border-bottom">
                    <video width="100%" controls>
                        <source src="{{ asset($movie->video_path) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <div class="row mt-4">
                    <div class="col-md-8">
                        <div class="container-fluid mw-100 border-end">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="{{ asset($movie->poster) }}" alt="Movie Poster" class="imgsize rounded img-responsive">
                                </div>
                                <div class="col-md-9 d-flex flex-column justify-content-between">
                                    <h1 class="movie-title ms-3">{{ $movie->title }}</h1>
                                    <div class="d-flex align-items-end">
                                        <div class="details-section align-self-end fs-4 ms-3">
                                            <p><strong></strong> {{ $movie->genre }}</p>
                                            <p><strong></strong> {{ $movie->year }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mx-3 text-justify">{{ $movie->description }}</p>
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <p><strong>Type:</strong> {{ $movie->type }}</p>
                            <p><strong>Cast:</strong> {{ $movie->cast }}</p>
                            <p><strong>Director:</strong> {{ $movie->director }}</p>
                            <p><strong>Studios:</strong> {{ $movie->studio }}</p>
                            <p><strong>Episodes:</strong> {{ $movie->episode }}</p>
                        </div>
                        <div class="row">
                            <div class="d-flex justify-content-center" style="min-height: 20vh;">
                                <div class="d-flex flex-column justify-content-center">
                                    <button class="btn btn-outline-light" id="like-button" style="max-width: 70px;">Like</button>
                                    <p class="text-center mt-2" id="likes-count">{{ $movie->likes }} Likes</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container text-light mt-5">
        @auth
            <form action="{{ route('movie.comment', $movie->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="content" class="form-label">Add a comment</label>
                    <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-outline-light">Submit</button>
            </form>
        @else
            <p><a href="{{ route('login') }}">Log in</a> to add a comment.</p>
        @endauth
        <div class="mt-4">
            <h3>Comments</h3>
            @foreach($comments as $comment)
                <div class="mb-3 p-3 rounded" style="background-color: #232323;">
                    <div class="d-flex align-items-center text-white">
                        <span>{{ $comment->user->name }}</span>
                        <span class="ms-auto small text-muted">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="mt-2 text-white">
                        <p class="mb-0">{{ $comment->content }}</p>
                    </div>
                    @if(session('isAdmin'))
                        <div class="text-end mt-2">
                            <form action="{{ route('comment.delete', $comment->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    @endif
                </div>
            @endforeach

            @if (count($comments) > 0)
                @if (count($comments) >= 5)
                    @if(!$showAll)
                        <!-- Link to show all comments -->
                        <div class="text-center mt-3">
                            <a href="{{ route('movie.comments.all', ['id' => $movie->id]) }}" class="btn btn-outline-light">Show More Comments</a>
                        </div>
                    @else
                        <div class="text-center mt-3">
                            <a href="{{ route('movie.play', ['id' => $movie->id]) }}" class="btn btn-outline-light">Show Less</a>
                        </div>
                    @endif
                @endif
            @else
                <div class="text-center mt-3">
                    <p>No comments found</p>
                </div>
            @endif
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#like-button').click(function() {
            $.ajax({
                url: '{{ route("movies.like", $movie->id) }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#likes-count').text(response.likes + ' Likes');
                },
                error: function(response) {
                    alert('Error: ' + response.responseJSON.message);
                }
            });
        });
    });
    </script>
@endsection
