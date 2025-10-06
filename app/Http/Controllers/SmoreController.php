<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class SmoreController extends Controller
{
    public function Recently(){
        $movies = Movie::orderBy('created_at', 'desc')->paginate(14);
        $recently = true;
        $mov = false;
        $tv = false;
        return view('smore', compact('movies', 'recently', 'mov', 'tv'));
    }

    public function movie(){
        $movies = Movie::where('type','Movie')->orderBy('created_at', 'desc')->paginate(14);
        $recently = false;
        $mov = true;
        $tv = false;
        return view('smore', compact('movies', 'recently', 'mov', 'tv'));
    }

    public function tv(){
        $movies = Movie::where('type','TV-Series')->orderBy('created_at', 'desc')->paginate(14);
        $recently = false;
        $mov = false;
        $tv = true;
        return view('smore', compact('movies', 'recently', 'mov', 'tv'));
    }
}
