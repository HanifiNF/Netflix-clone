@extends('layouts.nav')

@section('content')
    <div class="container mt-5 h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="card border-light mb-3 bg-black text-light">
                <div class="card-header text-center borderl-light border-bottom">
                    <h1 class="card-title">Edit User</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <div class="row g-3">
                                    <div class="col-md">
                                        <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                                    </div>
                                </div>
                            </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <div class="row g-3">
                                    <div class="col-md">
                                        <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="admin" class="form-label">Admin Status</label>
                            <div class="row g-3"> 
                                <div class="col-md">
                                    <select name="admin" id="admin" class="form-select">
                                        <option value="" {{ old('admin') == '' ? 'selected' : '' }}>-- Option --</option>
                                        <option value="0" {{ old('admin') == 0 ? 'selected' : '' }}>No</option>
                                        <option value="1" {{ old('admin') == 1 ? 'selected' : '' }}>Yes</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Add more fields as needed -->
                        <div class="card-footer text-body-secondary d-flex flex-column align-items-center justify-content-end text-light">
                                <button type="submit" class="btn btn-outline-light btn-lg">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
@endsection
