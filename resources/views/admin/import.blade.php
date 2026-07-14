@extends('layouts.admin')

@section('title', 'Import from TMDB')

@section('content')
    <div class="admin-topbar">
        <h1>Import from TMDB</h1>
        <span class="text-muted small">The Movie Database</span>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card bg-dark border-secondary" style="max-width: 600px;">
        <div class="card-body text-light">
            <p class="text-muted mb-4">
                Enter a TMDB ID and choose the type. The movie/TV series metadata,
                cast, director, studio, and YouTube trailer will be fetched and
                inserted into your database.
            </p>

            <form action="{{ route('admin.import') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="tmdb_id" class="form-label">TMDB ID</label>
                    <input type="number" class="form-control @error('tmdb_id') is-invalid @enderror"
                           id="tmdb_id" name="tmdb_id" value="{{ old('tmdb_id') }}" required
                           placeholder="e.g. 27205 for Inception">
                    @error('tmdb_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="type" class="form-label">Type</label>
                    <select class="form-control" id="type" name="type">
                        <option value="movie" @if(old('type', 'movie') === 'movie') selected @endif>Movie</option>
                        <option value="tv" @if(old('type') === 'tv') selected @endif>TV Series</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-cloud-download-alt me-2"></i> Import
                </button>
            </form>

            <hr class="border-secondary mt-4">
            <p class="text-muted small mb-0">
                Tip: find TMDB IDs in the URL of any title on
                <a href="https://www.themoviedb.org" target="_blank" class="text-danger">themoviedb.org</a>
                (e.g. <code>/movie/27205</code> → ID is <code>27205</code>).
            </p>
        </div>
    </div>
@endsection