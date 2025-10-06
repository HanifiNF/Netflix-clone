<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function action() {
        $movies = Movie::where('genre', 'Action')->paginate(14);
        $action = true;
        $comedy = false;
        $adventure = false;
        $romance = false;
        $horror = false;
        $mystery = false;
        $drama = false;

        return view('genre', compact('movies', 'action', 'comedy', 'adventure', 'romance', 'horror', 'mystery', 'drama'));
    }

    public function comedy(){
        $movies = Movie::where('genre', 'Comedy')->paginate(14);
        $action = false;
        $comedy = true;
        $adventure = false;
        $romance = false;
        $horror = false;
        $mystery = false;
        $drama = false;

        return view('genre', compact('movies', 'action', 'comedy', 'adventure', 'romance', 'horror', 'mystery', 'drama'));
    }

    public function adventure(){
        $movies = Movie::where('genre', 'Adventure')->paginate(14);
        $action = false;
        $comedy = false;
        $adventure = true;
        $romance = false;
        $horror = false;
        $mystery = false;
        $drama = false;

        return view('genre', compact('movies', 'action', 'comedy', 'adventure', 'romance', 'horror', 'mystery', 'drama'));
    }

    public function romance(){
        $movies = Movie::where('genre', 'Romance')->paginate(14);
        $action = false;
        $comedy = false;
        $adventure = false;
        $romance = true;
        $horror = false;
        $mystery = false;
        $drama = false;

        return view('genre', compact('movies', 'action', 'comedy', 'adventure', 'romance', 'horror', 'mystery', 'drama'));
    }

    public function horror(){
        $movies = Movie::where('genre', 'Horror')->paginate(14);
        $action = false;
        $comedy = false;
        $adventure = false;
        $romance = false;
        $horror = true;
        $mystery = false;
        $drama = false;

        return view('genre', compact('movies', 'action', 'comedy', 'adventure', 'romance', 'horror', 'mystery', 'drama'));
    }

    public function mystery(){
        $movies = Movie::where('genre', 'Mystery')->paginate(14);
        $action = false;
        $comedy = false;
        $adventure = false;
        $romance = false;
        $horror = false;
        $mystery = true;
        $drama = false;

        return view('genre', compact('movies', 'action', 'comedy', 'adventure', 'romance', 'horror', 'mystery', 'drama'));
    }

    public function drama(){
        $movies = Movie::where('genre', 'Drama')->paginate(14);
        $action = false;
        $comedy = false;
        $adventure = false;
        $romance = false;
        $horror = false;
        $mystery = false;
        $drama = true;

        return view('genre', compact('movies', 'action', 'comedy', 'adventure', 'romance', 'horror', 'mystery', 'drama'));
    }
}
