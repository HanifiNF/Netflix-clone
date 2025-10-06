@extends('layouts.app')

@section('content')
<style>
    body {
        background-image: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.2)), url('{{ asset("img/1_2KWziNOstK2Vsy6n77ylNg.jpg") }}');
        background-size: cover;
        background-position: center;
        height: 100vh;
        margin: 0;
        padding: 0;   
    }
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: rgba(0,0,0,0.6);">
            <div class="card-header border-bottom text-light">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label text-white font-weight-bold">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror custom-input" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus style="background-color: #333; color: white; border: none; width: 50%">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label text-white font-weight-bold">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror custom-input" name="email" value="{{ old('email') }}" required autocomplete="email" style="background-color: #333; color: white; border: none; width: 50%">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label text-white font-weight-bold">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror custom-input" name="password" required autocomplete="new-password" style="background-color: #333; color: white; border: none; width: 50%;">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm" class="form-label text-white font-weight-bold">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control custom-input" name="password_confirmation" required autocomplete="new-password" style="background-color: #333; color: white; border: none; width: 50%">
                        </div>

                        <div class="mt-5">
                            <button type="submit" class="btn btn-dark">{{ __('Register') }}</button>
                        </div>
                       
                    </form>
                    <img src="{{ asset('img/create-account-icon.png') }}" alt="Create Account Icon" style="width: 200px; position: absolute; top: 50%; right: 12.5%; transform: translateY(-50%);">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
