<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Actor;
use Illuminate\Http\Request;

class ActorMovieController extends Controller
{
    public function index()
    {
        $actors = Actor::all();
        $movies = Movie::all();

        return view('actors_and_movies', compact('actors', 'movies' ));
    }
}
