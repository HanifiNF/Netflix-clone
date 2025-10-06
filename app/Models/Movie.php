<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment; 


class Movie extends Model
{
    protected $fillable = [
        'title', 'genre', 'year', 'description', 'poster', 'video_path', 'type', 'trending', 'popular', 'cast', 'director', 'studio', 'episode'
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    protected $table = 'movies';
}