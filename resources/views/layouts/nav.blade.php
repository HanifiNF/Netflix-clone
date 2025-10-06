<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Vidlix</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    <!-- some library -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body style="background-color:#191919">
    <div id="app">
        <nav class="navbar text-light navbar-expand-md navbar-black fixed-top" id="Navbar" style="background-color:#100C08">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="{{ url('/home') }}">
                    <img src="../img/vidlix.png" alt="vidlix" height="24">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto mx-3">
                        <li class="nav-item dropdown">
                            <a class="nav-link text-white dropdown-toggle ms-5 me-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../img/movie.webp" alt="Logo" width="20" height="20" class="d-inline-block align-text-top"> 
                            Movies
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark bg-dark">
                                <li><a class="dropdown-item text-white bg-dark" href="{{ route('movie.trending') }}">Trending</a></li>
                                <li><a class="dropdown-item text-white bg-dark" href="{{ route('movie.popular') }}">Popular</a></li>
                                <li><a class="dropdown-item text-white bg-dark" href="{{ route('movie.liked') }}">Most Likes</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link text-white dropdown-toggle mx-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../img/tv.png" alt="Logo" width="20" height="20" class="d-inline-block align-text-top"> 
                            TV Series
                            </a>
                            <ul class="dropdown-menu  bg-dark">
                                <li><a class="dropdown-item text-white bg-dark" href="{{ route('tv.trending') }}">Trending</a></li>
                                <li><a class="dropdown-item text-white bg-dark" href="{{ route('tv.popular') }}">Popular</a></li>
                                <li><a class="dropdown-item text-white bg-dark" href="{{ route('tv.liked') }}">Most Likes</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link text-white dropdown-toggle mx-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../img/folder.png" alt="Logo" width="20" height="20" class="d-inline-block align-text-top"> 
                            Genre
                            </a>
                            <ul class="dropdown-menu bg-dark">
                                <li><a class="dropdown-item text-white bg-dark" href="{{ route('genre.action') }}">Action</a></li>
                                <li><a class="dropdown-item text-white bg-dark" href="{{ route('genre.comedy') }}">Comedy</a></li>
                                <li><a class="dropdown-item text-white bg-dark" href="{{ route('genre.adventure') }}">Adventure</a></li>
                                <li><a class="dropdown-item text-white bg-dark" href="{{ route('genre.romance') }}">Romance</a></li>
                                <li><a class="dropdown-item text-white bg-dark" href="{{ route('genre.horror') }}">Horror</a></li>
                                <li><a class="dropdown-item text-white bg-dark" href="{{ route('genre.mystery') }}">Mystery</a></li>
                                <li><a class="dropdown-item text-white bg-dark" href="{{ route('genre.drama') }}">Drama</a></li>
                            </ul>
                        </li>
                    </ul>
                    
                    <div class="container-fluid">
                        <form class="d-flex ms-auto" style="width: 35%;" role="search" method="GET" action="{{ route('search') }}">
                            <button type="submit mt-1" style="background-color: transparent; border:none; margin: 0; padding: 0; text-align: inherit; border-radius: 0; appearance: none;" class="mx-1">
                                <img src="../img/search.png" alt="searchcon">
                            </button>
                            <input class="form-control form-control-sm mt-1 w-100" type="search" name="query" placeholder="Title, Genre, Year" aria-label="Search" style="border-radius: 15px;">
                        </form>
                    </div>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown text-white">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end text-white bg-dark" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-white bg-dark" href="{{ route('edit.profile')}}">
                                       Profile
                                    </a>
                                    <a class="dropdown-item text-white bg-dark" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    @if(session('isAdmin'))
                                    <a class="dropdown-item text-white bg-dark" href="{{ route('database') }}">
                                        Users Database
                                    </a>
                                    <a class="dropdown-item text-white bg-dark" href="{{ route('movdatabase') }}">
                                        Movies Database
                                    </a>
                                    <a class="dropdown-item text-white bg-dark" href="{{ route('form') }}">
                                        Upload
                                    </a>
                                    @endif
            

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Footer -->
    <footer class=" text-center text-white" style="background-color:#262626;">
        <!-- Grid container -->
        <div class="container p-4">
            <div class="container-sm border-bottom mb-4">
                <ul class="social-icons mb-2">
                    <li><a href="https://twitter.com/HanifiAS1" class="fab fa-twitter" target="_blank"></a></li>
                    <li><a href="https://www.instagram.com/hanifi.setiawan/" class="fab fa-instagram" target="_blank"></a></li>
                    <li><a href="https://www.linkedin.com/in/hanifi-abrar-setiawan" class="fab fa-linkedin" target="_blank"></a></li>
                    <li><a href="https://github.com/HanifiSetiawan" class="fab fa-github" target="_blank"></a></li>
                </ul>
            </div>



            <!-- Section: Text -->
            <section class="row mb-4 justify-content-md-center ">
                <div class="col-6">
                    <img src="../img/logovid.png" class="logosize">
                </div>
                <div class="col-6 d-flex flex-column justify-content-between">
                    <p class="text-justify">
                    Welcome to Vidlix, your favorite streaming website! Vidlix offers a seamless and immersive viewing experience with an extensive library of movies, TV shows, documentaries, and exclusive content. 
                    Designed with user-friendly navigation and personalized recommendations, Vidlix ensures that you'll always find something to enjoy. 
                    Whether you're into the latest blockbusters, timeless classics, or hidden gems, Vidlix caters to all your entertainment needs. 
                    </p>
                    
                    <div class="d-flex justify-content-end text-end mt-1 mx-2">
                            <a class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover mx-1" href="/home">Home</a>
                            <a class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover mx-1" href="{{ route('about') }}">About</a>
                            <a class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover mx-1" href="{{ route('Contact') }}">Contact</a>
                    </div>
                    
                </div>
            </section>
            <!-- Section: Text -->


        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2024 Copyright:
            <a class="text-white" href="#!">Vidlix.com</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
    <script>
        let lastScrollTop = 0;

        window.addEventListener("scroll", function() {
            let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

            if (currentScroll > lastScrollTop) {
                // Scroll Down
                document.getElementById("Navbar").style.top = "-100px"; // Hides the navbar
            } else {
                // Scroll Up
                document.getElementById("Navbar").style.top = "0"; // Shows the navbar
            }

            lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // For Mobile or negative scrolling
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
