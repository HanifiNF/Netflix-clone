@extends('layouts.nav')

@section('content')
    <div class="container table-responsive mt-5">
        <h1 class="text-light">Movie Data</h1>
        <form action="{{ route('movdatabase') }}" method="GET" class="mb-1 d-flex align-items-center justify-content-center">
            <div class="input-group ">
                <input type="text" name="search" class="form-control" placeholder="Search by title" value="{{ $search }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </div>
        </form>
        <table class="table table-striped table-dark table-wrap align-middle mt-2">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Genre</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Created at</th>
                    <th>Last Updated at</th>
                    <th>Poster</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                    <tr>
                        <td class="overflow-auto" style="max-width: 150px;">{{ $movie->title }}</td>
                        <td>{{ $movie->genre }}</td>
                        <td>{{ $movie->type }}</td>
                        <td class="text-truncate" style="max-width: 150px;">{{ $movie->description }}</td>
                        <td>{{ $movie->created_at }}</td>
                        <td>{{ $movie->updated_at }}</td>
                        <td>
                            <img class="foto" src="{{ asset($movie->poster) }}" alt="poster">
                        </td>
                        <td>
                            <a href="{{ route('movie.edit', $movie->id) }}" class="btn btn-outline-primary mb-2">Edit</a>
                            <form action="{{ route('movie.delete', $movie->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="container">
                {{ $movies->links() }}
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
@endsection