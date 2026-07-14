@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="admin-topbar">
        <h1>Dashboard</h1>
        <span class="text-muted small">Welcome back, {{ auth()->user()->name }}</span>
    </div>

    <div class="row g-3 mb-5">
        <div class="col-sm-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(229, 9, 20, 0.15); color:#e50914;">
                    <i class="fas fa-film"></i>
                </div>
                <div class="stat-value">{{ $stats['movies'] }}</div>
                <div class="stat-label">Total Movies &amp; TV</div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(0, 168, 255, 0.15); color:#00a8ff;">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-value">{{ $stats['users'] }}</div>
                <div class="stat-label">Total Users</div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(255, 193, 7, 0.15); color:#ffc107;">
                    <i class="fas fa-user-shield"></i>
                </div>
                <div class="stat-value">{{ $stats['admins'] }}</div>
                <div class="stat-label">Administrators</div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(40, 167, 69, 0.15); color:#28a745;">
                    <i class="fas fa-comment"></i>
                </div>
                <div class="stat-value">{{ $stats['comments'] }}</div>
                <div class="stat-label">Comments</div>
            </div>
        </div>
    </div>

    <h2 class="text-white mb-4" style="font-size:1.5rem; font-weight:600;">Management Tools</h2>

    <div class="row g-3">
        <div class="col-md-3">
            <a href="{{ route('database') }}" class="tile-card">
                <div class="tile-icon" style="background: rgba(0, 168, 255, 0.15); color:#00a8ff;">
                    <i class="fas fa-users-cog"></i>
                </div>
                <h3>Users Database</h3>
                <p>Search, edit, promote, or remove user accounts.</p>
                <span class="btn-open">Open &rarr;</span>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('movdatabase') }}" class="tile-card">
                <div class="tile-icon" style="background: rgba(229, 9, 20, 0.15); color:#e50914;">
                    <i class="fas fa-film"></i>
                </div>
                <h3>Movies Database</h3>
                <p>Browse, edit metadata, or remove movies &amp; TV series.</p>
                <span class="btn-open">Open &rarr;</span>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('form') }}" class="tile-card">
                <div class="tile-icon" style="background: rgba(40, 167, 69, 0.15); color:#28a745;">
                    <i class="fas fa-upload"></i>
                </div>
                <h3>Upload Content</h3>
                <p>Add a new movie or TV series with poster &amp; video file.</p>
                <span class="btn-open">Open &rarr;</span>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('admin.import') }}" class="tile-card">
                <div class="tile-icon" style="background: rgba(255, 193, 7, 0.15); color:#ffc107;">
                    <i class="fas fa-cloud-download-alt"></i>
                </div>
                <h3>Import from TMDB</h3>
                <p>Fetch metadata + YouTube trailer from The Movie Database.</p>
                <span class="btn-open">Open &rarr;</span>
            </a>
        </div>
    </div>
@endsection