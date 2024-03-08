<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Movie::create([
            'title' => 'The Shawshank Redemption',
            'director' => 'Frank Darabont',
            'year' => 1994,
        ]);

        Movie::create([
            'title' => 'The Godfather',
            'director' => 'Francis Ford Coppola',
            'year' => 1972,
        ]);

        Movie::create([
            'title' => 'The Godfather: Part II',
            'director' => 'Francis Ford Coppola',
            'year' => 1974,
        ]);

        Movie::create([
            'title' => 'The Good, the Bad and the Ugly',
            'director' => 'Sergio Leone',
            'year' => 1966,
        ]);

        Movie::create([
            'title' => 'The Lord of the Rings: The Return of the King',
            'director' => 'Peter Jackson',
            'year' => 2003,
        ]);
    }
}
