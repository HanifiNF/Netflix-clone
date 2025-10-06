<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;


class MoviesTableSeeder extends Seeder
{
    public function run()
    {
        Movie::create([
            'title' => '',
            'genre' => 'comedy',
            'year' => 2022,
            'description' => 'In the 1970s, young Gru tries to join a group of supervillains called the Vicious 6 after they oust their leader -- the legendary fighter Wild Knuckles. When the interview turns disastrous, Gru and his Minions go on the run with the Vicious 6 hot on their tails. Luckily, he finds an unlikely source for guidance -- Wild Knuckles himself -- and soon discovers that even bad guys need a little help from their friends.',
            'poster' => 'img/moviepost/minions.jpg',
            'video_path' => 'video/minions.mp4',
            'type' => 'Movie',
        ]);
    }
}
