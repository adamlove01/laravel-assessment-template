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

        // Ensure each actor is attached to at least three movies
        foreach ($actors as $actor) {
            // Check if the actor is already attached to enough movies
            if ($actor->movies()->count() >= 3) {
                continue; // Skip if already attached to enough movies
            }

            // Attach random movies to the actor until they have at least three
            $moviesToAttach = $movies->shuffle()->take(3 - $actor->movies()->count());
            $actor->movies()->attach($moviesToAttach);
        }
    }
}
