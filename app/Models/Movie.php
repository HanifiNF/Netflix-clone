<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\User;


class Movie extends Model
{
    protected $fillable = [
        'title', 'genre', 'year', 'description', 'poster', 'video_path', 'type', 'trending', 'popular', 'cast', 'director', 'studio', 'episode'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'movie_user')->withTimestamps();
    }

    protected $table = 'movies';

    protected $appends = ['poster_url', 'video_url'];

    public function getPosterUrlAttribute(): ?string
    {
        $path = $this->poster;

        if (! $path) {
            return null;
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        if (str_starts_with($path, 'img/') || str_starts_with($path, 'uploads/')) {
            return asset($path);
        }

        return asset('storage/'.$path);
    }

    public function getVideoUrlAttribute(): ?string
    {
        $path = $this->video_path;

        if (! $path) {
            return null;
        }

        if (str_starts_with($path, 'youtube:')) {
            return 'https://www.youtube.com/embed/'.substr($path, 8);
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        if (str_starts_with($path, 'img/') || str_starts_with($path, 'uploads/')) {
            return asset($path);
        }

        return asset('storage/'.$path);
    }

    public function isYoutubeVideo(): bool
    {
        return $this->video_path && str_starts_with($this->video_path, 'youtube:');
    }
}