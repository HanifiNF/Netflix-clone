<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class moviedatacontroller extends Controller
{
    public function index(Request $request)
    {
        if (session('isAdmin')) {

            $query = $request->input('search');
            $movies = Movie::when($query, function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(7);

            return view('movdata', ['movies' => $movies, 'search' => $query]);
        } else {
            abort(403, 'Unauthorized');
        }
    }

    public function destroy($id)
    {
        if (session('isAdmin')) {
            $movie = movie::findOrFail($id);
            $movie->delete();
            return redirect()->back()->with('success', 'movie deleted successfully.');
        } else {
            abort(403, 'Unauthorized');
        }
    }

    public function more(Request $request)
    {
        if (session('isAdmin')) {

            $query = $request->input('search');
            $movies = Movie::when($query, function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10); 

            return view('movdata', ['movies' => $movies, 'search' => $query]);
        } else {
            abort(403, 'Unauthorized');
        }
    }

    public function less(Request $request)
    {
        if (session('isAdmin')) {

            $query = $request->input('search');
            $movies = Movie::when($query, function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(3); 

            return view('movdata', ['movies' => $movies, 'search' => $query]);
        } else {
            abort(403, 'Unauthorized');
        }
    }

    public function edit($id){
        if (session('isAdmin')) {
            $movie = Movie::findOrFail($id);
            return view('movieedit', compact('movie'));
        } else {
            abort(403, 'Unauthorized');
        }
    }

    public function update(Request $request, $id)
    {
        if (session('isAdmin')) {
            $request->validate([
                'title' => 'required',
                'genre' => 'required',
                'year' => 'required',
                'description' => 'required',
                'poster' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'video_path' => 'mimes:mp4,mov,ogg,qt|max:204800',
                'type' => 'required',
                'trending' => 'required',
                'popular' => 'required',
                'cast' => 'required',
                'director' => 'required',
                'studio' => 'required',
                'episode' => 'required',
            ]);

            $movie = Movie::findOrFail($id);

            // Handle image upload and store the path
            if ($request->hasFile('poster')) {
                $posterPath = $request->file('poster');
                $extension = $posterPath->getClientOriginalExtension();
                $postfilename = time().'.'.$extension;
                $posterimgpath = 'uploads/poster/';
                $posterPath->move($posterimgpath, $postfilename);
                $movie->poster = $posterimgpath.$postfilename;
            } 
            
            if ($request->hasFile('video_path')) {
                $videoPath = $request->file('video_path');
                $extension = $videoPath->getClientOriginalExtension();
                $vidfilename = time().'.'.$extension;
                $vidpath = 'uploads/video/';
                $videoPath->move($vidpath, $vidfilename);
                $movie->video_path = $vidpath.$vidfilename;
            } 

            $movie->title = $request->title;
            $movie->genre = $request->genre;
            $movie->year = $request->year;
            $movie->description = $request->description;
            $movie->type = $request->type;
            $movie->trending = $request->trending;
            $movie->popular = $request->popular;
            $movie->cast = $request->cast;
            $movie->director = $request->director;
            $movie->studio = $request->studio;
            $movie->episode = $request->episode;

            $movie->save();

            return view('success');
        } else {
            abort(403, 'Unauthorized');
    }
    }
}
