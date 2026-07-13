<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\User;
use App\Models\Comment;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'movies'   => Movie::count(),
            'users'    => User::count(),
            'admins'   => User::where('admin', 1)->count(),
            'comments' => Comment::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}