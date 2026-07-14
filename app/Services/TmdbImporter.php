<?php

namespace App\Services;

use App\Models\Movie;
use Illuminate\Support\Facades\Http;

class TmdbImporter
{
    public function importById(int $tmdbId, string $type = 'movie'): Movie
    {
        $endpoint = $type === 'tv' ? 'tv' : 'movie';

        $response = Http::get(config('services.tmdb.base_url')."/{$endpoint}/{$tmdbId}", [
            'api_key'             => config('services.tmdb.key'),
            'append_to_response'  => 'credits,videos',
        ]);

        if ($response->failed()) {
            abort($response->status(), 'TMDB request failed');
        }

        $data = $response->json();

        $title       = $type === 'tv' ? ($data['name'] ?? '') : ($data['title'] ?? '');
        $description = $data['overview'] ?? '';
        $dateField   = $type === 'tv' ? ($data['first_air_date'] ?? '') : ($data['release_date'] ?? '');
        $year        = $dateField ? (int) substr($dateField, 0, 4) : null;
        $posterPath  = $data['poster_path'] ? config('services.tmdb.image_url').$data['poster_path'] : null;

        $genres = collect($data['genres'] ?? [])
            ->pluck('name')
            ->implode(', ');

        $cast = collect($data['credits']['cast'] ?? [])
            ->take(5)
            ->pluck('name')
            ->implode(', ');

        $crew = collect($data['credits']['crew'] ?? []);
        $director = $type === 'tv'
            ? collect($data['created_by'] ?? [])->pluck('name')->implode(', ')
            : $crew->firstWhere('job', 'Director')['name'] ?? '';

        $studio = collect($data['production_companies'] ?? [])
            ->take(3)
            ->pluck('name')
            ->implode(', ');

        $episodes = $type === 'tv' ? ($data['number_of_episodes'] ?? 0) : 0;

        $trailerKey = collect($data['videos']['results'] ?? [])
            ->first(fn ($v) => $v['site'] === 'YouTube' && in_array($v['type'], ['Trailer', 'Teaser']));
        $videoPath = $trailerKey ? 'youtube:'.$trailerKey['key'] : null;

        return Movie::create([
            'title'       => $title,
            'genre'       => $genres ?: 'Unknown',
            'year'        => $year ?? 0,
            'description' => $description,
            'poster'      => $posterPath,
            'video_path'  => $videoPath,
            'type'        => $type === 'tv' ? 'TV-Series' : 'Movie',
            'trending'    => 0,
            'popular'     => 0,
            'cast'        => $cast,
            'director'    => $director,
            'studio'      => $studio,
            'episode'     => $episodes,
            'likes'       => 0,
        ]);
    }
}