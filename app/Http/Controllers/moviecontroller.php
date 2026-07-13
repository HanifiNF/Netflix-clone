<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Comment;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(){
        $movies = Movie::all();
        return $movies;
    }
    
    public function play($id)
    {
        $movie = Movie::findOrFail($id);
        $comments = $movie->comments()->latest()->take(5)->get();
        $showAll = false;

        return view('play', compact('movie', 'comments', 'showAll'));
    }

    public function playcommentall($id)
    {
        $movie = Movie::findOrFail($id);
        $comments = $movie->comments()->with('user')->latest()->take(20)->get();
        $showAll = true;

        return view('play', compact('movie', 'comments', 'showAll'));
    }

    public function storeComment(Request $request, $movieId)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        Comment::create([
            'movie_id' => $movieId,
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Comment added successfully!');
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        $movies = Movie::where('title', 'LIKE', "%{$query}%")
                       ->orWhere('genre', 'LIKE', "%{$query}%")
                       ->get();

        return view('search-result', compact('movies'));
    }

    public function likeMovie($id)
    {
        $movie = Movie::find($id);
        if ($movie) {
            $movie->likes += 1;
            $movie->save();
            return response()->json(['likes' => $movie->likes], 200);
        }
        return response()->json(['message' => 'Movie not found'], 404);
    }
}
