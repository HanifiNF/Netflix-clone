<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TmdbImporter;

class AdminMovieImportController extends Controller
{
    public function create()
    {
        return view('admin.import');
    }

    public function store(Request $request, TmdbImporter $importer)
    {
        $validated = $request->validate([
            'tmdb_id' => 'required|integer',
            'type'    => 'required|in:movie,tv',
        ]);

        try {
            $movie = $importer->importById($validated['tmdb_id'], $validated['type']);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput()->with('error', 'TMDB import failed: '.$e->getMessage());
        }

        return redirect()->route('admin.import')->with('success', "Imported '{$movie->title}' ({$movie->year}) — {$movie->genre}");
    }
}