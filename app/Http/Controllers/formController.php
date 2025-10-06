<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use illuminate\Support\Facades\File;

class formController extends Controller
{
    public function index ()
    {
        if (session('isAdmin')) {
            return view('form');
        } else {
            abort(403, 'Unauthorized');
        }
    }
    public function storeAndRedirect(Request $request)
    {
        if (session('isAdmin')) {
            $request->validate([
                'title' => 'required',
                'genre' => 'required',
                'year' => 'required',
                'description' => 'required',
                'poster' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image upload
                'video_path' => 'required|mimes:mp4,mov,ogg,qt|max:204800',
                'type' => 'required',
                'trending' => 'required',
                'popular' => 'required',
                'cast' => 'required',
                'director' => 'required',
                'studio' => 'required',
                'episode' => 'required',

            ], [
                'title.required' => 'Title field is required',
                'genre.required' => 'Genre field is required',
                'year.required' => 'Year field is required',
                'description.required' => 'Description field is required',
                'poster.image' => 'The file must be an image.',
                'poster.mimes' => 'Only JPEG, PNG, JPG, and GIF files are allowed.',
                'poster.max' => 'The image must be less than 2MB in size.',
                'video_path.required' => 'video is required',
                'video_path.mimes' => 'Only mp4 and MKV',
                'type.required' => 'type is required',
                'trending.required' => 'trending is required',
                'popular.required' => 'popular is required',
                'cast.required' => 'cast is required',
                'director.required' => 'director is required',
                'studio.required' => 'studio is required',
                'episode.required' => 'episode is required'
            ]);
    
            // Handle image upload and store the path
            if ($request->hasFile('poster')) {
                $posterPath = $request->file('poster');
                $extension = $posterPath->getClientOriginalExtension();

                $postfilename = time().'.'.$extension;

                $posterimgpath = 'uploads/poster/';
                $posterPath->move($posterimgpath, $postfilename);
            } 
            
            if ($request->hasFile('video_path')) {
                $videoPath = $request->file('video_path');
                $extension = $videoPath->getClientOriginalExtension();

                $vidfilename = time().'.'.$extension;

                $vidpath = 'uploads/video/';
                $videoPath->move($vidpath, $vidfilename);
            } 
    
            Movie::create([
                'title' => $request->title,
                'genre' => $request->genre,
                'year' => $request->year,
                'description' => $request->description,
                'poster' => $posterimgpath.$postfilename,
                'video_path' => $vidpath.$vidfilename, 
                'type' => $request->type,
                'trending' => $request->trending,
                'popular' => $request->popular,
                'cast' => $request->cast,
                'director' => $request->director,
                'studio' => $request->studio,
                'episode' => $request->episode,
            ]);
    
            return view('success');
        } else {
            abort(403, 'Unauthorized');
        }
    }
}
