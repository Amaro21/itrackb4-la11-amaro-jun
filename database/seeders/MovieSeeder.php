<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Genre;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $action    = Genre::create(['name' => 'Action']);
        $adventure = Genre::create(['name' => 'Adventure']);
        $scifi     = Genre::create(['name' => 'Sci-Fi']);

        Movie::create([
            'title' => 'Batman',
            'genre_id' => $action->id,
            'rating' => 4,
            'year' => 2003,
            'is_blockbuster' => true,
            'director' => 'Steve',
        ]);

        Movie::create([
            'title' => 'Tarzan',
            'genre_id' => $adventure->id,
            'rating' => 4,
            'year' => 2000,
            'is_blockbuster' => false,
            'director' => 'Gregory',
        ]);

        Movie::create([
            'title' => 'The Flash',
            'genre_id' => $action->id,
            'rating' => 4,
            'year' => 2010,
            'is_blockbuster' => true,
            'director' => 'Jhon Wo',
        ]);

        Movie::create([
            'title' => 'Antman',
            'genre_id' => $scifi->id,
            'rating' => 4,
            'year' => 2017,
            'is_blockbuster' => true,
            'director' => 'Justine',
        ]);

        Movie::create([
            'title' => 'Ramboo',
            'genre_id' => $action->id,
            'rating' => 4,
            'year' => 2005,
            'is_blockbuster' => true,
            'director' => 'Nash',
        ]);
    }
}
