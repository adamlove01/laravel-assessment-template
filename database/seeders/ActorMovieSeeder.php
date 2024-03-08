<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Actor;

class ActorMovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Retrieve all movies and actors from the database
        $movies = Movie::all();
        $actors = Actor::all();

        // Seed the movie_actor pivot table with relationships
        foreach ($movies as $movie) {
            // Randomly attach actors to the movie
            $actorsToAttach = $actors->random(rand(1, 5));
            $movie->actors()->attach($actorsToAttach);
        }
    }
}
