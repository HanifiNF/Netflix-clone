@extends('layouts.nav')

@section('content')
    <div class="container mt-5 h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="card border-light mb-3 bg-dark text-light" style="width: 50rem;">
                    <div class="card-header text-center border-light">
                        <h1 class="card-title">Upload Movie or TV Series</h1>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        
                        <form action="{{ route('submit.form') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="poster" class="form-label">
                                    Poster Image
                                </label>
                                <div class="row g-3">
                                    <div class="col-md">
                                        <input type="file" class="form-control" name="poster" id="poster" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="video_path" class="form-label">
                                    Video
                                </label>
                                <div class="row g-3">
                                    <div class="col-md">
                                        <input type="file" class="form-control" name="video_path" id="video_path" required>
                                    </div>
                                </div>
                            </div>  
                            
                            <div class="mb-3">
                                <label for="title" class="form-label">
                                    Title
                                </label>
                                <div class="row g-3">
                                    <div class="col-md">
                                        <input type="text" class="form-control" name="title" id="title" placeholder="Please input the title" value="{{ old('title') }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="genre" class="form-label">
                                    Genre
                                </label>
                                <select class="form-select" name="genre" id="genre">
                                    <option value="" {{ old('genre') == '' ? 'selected' : '' }}>-- Option --</option>
                                    <option value="Action" {{ old('genre') == 'Action' ? 'selected' : '' }}>Action</option>
                                    <option value="Comedy" {{ old('genre') == 'Comedy' ? 'selected' : '' }}>Comedy</option>
                                    <option value="Family" {{ old('genre') == 'Family' ? 'selected' : '' }}>Family</option>
                                    <option value="Adventure" {{ old('genre') == 'Adventure' ? 'selected' : '' }}>Adventure</option>
                                    <option value="Romance" {{ old('genre') == 'Romance' ? 'selected' : '' }}>Romance</option>
                                    <option value="Horror" {{ old('genre') == 'Horror' ? 'selected' : '' }}>Horror</option>
                                    <option value="Drama" {{ old('genre') == 'Drama' ? 'selected' : '' }}>Drama</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="type" class="form-label">
                                    Type
                                </label>
                                <select class="form-select" name="type" id="type">
                                    <option value="" {{ old('type') == '' ? 'selected' : '' }}>-- Option --</option>
                                    <option value="Movie" {{ old('type') == 'Movie' ? 'selected' : '' }}>Movie</option>
                                    <option value="TV-Series" {{ old('type') == 'TV-Series' ? 'selected' : '' }}>TV Series</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="trending" class="form-label">
                                    Trending Status
                                </label>
                                <select class="form-select" name="trending" id="trending">
                                    <option value="" {{ old('trending') == '' ? 'selected' : '' }}>-- Option --</option>
                                    <option value="1" {{ old('trending') == '1' ? 'selected' : '' }}>1</option>
                                    <option value="0" {{ old('trending') == '0' ? 'selected' : '' }}>0</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="popular" class="form-label">
                                    Popular Status
                                </label>
                                <select class="form-select" name="popular" id="popular">
                                    <option value="" {{ old('popular') == '' ? 'selected' : '' }}>-- Option --</option>
                                    <option value="1" {{ old('popular') == '1' ? 'selected' : '' }}>1</option>
                                    <option value="0" {{ old('popular') == '0' ? 'selected' : '' }}>0</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="cast" class="form-label">
                                    Casts 
                                </label>
                                <div class="row g-3">
                                    <div class="col-md">
                                        <input type="text" class="form-control" name="cast" id="cast" placeholder="Please input the casts" value="{{ old('cast') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="director" class="form-label">
                                    Director
                                </label>
                                <div class="row g-3">
                                    <div class="col-md">
                                        <input type="text" class="form-control" name="director" id="director" placeholder="Please input the director" value="{{ old('director') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="studio" class="form-label">
                                    Studio
                                </label>
                                <div class="row g-3">
                                    <div class="col-md">
                                        <input type="text" class="form-control" name="studio" id="studio" placeholder="Please input the studio" value="{{ old('studio') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="episode" class="form-label">
                                    Episode
                                </label>
                                <div class="row g-3">
                                    <div class="col-md">
                                        <input type="text" class="form-control" name="episode" id="episode" placeholder="Please input the episode (number)" value="{{ old('episode') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="year" class="form-label">
                                    Year
                                </label>
                                <div class="row g-3">
                                    <div class="col-md">
                                        <input type="text" class="form-control" name="year" id="year" placeholder="Please input the released year" value="{{ old('year') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">
                                    Description:
                                </label>
                                <div class="row g-3">
                                    <div class="col-md">
                                        <textarea class="form-control" name="description" id="description" placeholder="Please input the descrpition" value="{{ old('description') }}" row="4"></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card-footer text-body-secondary d-flex flex-column align-items-end justify-content-end text-light">
                                <button type="submit" class="btn btn-outline-success btn-lg">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
@endsection
