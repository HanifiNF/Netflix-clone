@extends('layouts.nav')

@section('content')
<div class="container text-light mt-5">
    <div class="card border-light mb-3 bg-dark text-light">
        <div class="card-header text-center border-light">
            <h1 class="card-title">Edit Movie</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('movie.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $movie->title }}" required>
                </div>
                <div class="form-group">
                    <label for="genre">Genre</label>
                    <input type="text" class="form-control" id="genre" name="genre" value="{{ $movie->genre }}" required>
                </div>
                <div class="form-group">
                    <label for="year">Year</label>
                    <input type="text" class="form-control" id="year" name="year" value="{{ $movie->year }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" required>{{ $movie->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="poster">Poster</label>
                    <input type="file" class="form-control" id="poster" name="poster">
                </div>
                <div class="form-group">
                    <label for="video_path">Video</label>
                    <input type="file" class="form-control" id="video_path" name="video_path">
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" class="form-control" id="type" name="type" value="{{ $movie->type }}" required>
                </div>
                <div class="form-group">
                    <label for="trending">Trending</label>
                    <input type="text" class="form-control" id="trending" name="trending" value="{{ $movie->trending }}" required>
                </div>
                <div class="form-group">
                    <label for="popular">Popular</label>
                    <input type="text" class="form-control" id="popular" name="popular" value="{{ $movie->popular }}" required>
                </div>
                <div class="form-group">
                    <label for="cast">Cast</label>
                    <input type="text" class="form-control" id="cast" name="cast" value="{{ $movie->cast }}" required>
                </div>
                <div class="form-group">
                    <label for="director">Director</label>
                    <input type="text" class="form-control" id="director" name="director" value="{{ $movie->director }}" required>
                </div>
                <div class="form-group">
                    <label for="studio">Studio</label>
                    <input type="text" class="form-control" id="studio" name="studio" value="{{ $movie->studio }}" required>
                </div>
                <div class="form-group">
                    <label for="episode">Episode</label>
                    <input type="text" class="form-control" id="episode" name="episode" value="{{ $movie->episode }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
