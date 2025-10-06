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
<div class="d-flex align-items-center justify-content-center" style="height: 100%;">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: rgba(0,0,0,0.6); margin-top: 50px;"> <!-- Added margin-top -->
                    <div class="card-header border-bottom text-light">{{ __('Login') }}</div>

                    <div class="card-body text-light">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3 text-left"> 
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="background-color: #333; color: white; border: none; width:50%">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3 text-left"> 
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="background-color: #333; color: white; border: none; width:50%">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3 text-left"> 
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>

                            <div class="mb-0 text-left"> 
                                <button type="submit" class="btn btn-dark">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-white" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                        <img src="{{ asset('img/man-right-arrow-symbol_51613.png') }}" alt="Create Account Icon" style="width: 200px; position: absolute; top: 50%; right: 12.5%; transform: translateY(-50%);">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
