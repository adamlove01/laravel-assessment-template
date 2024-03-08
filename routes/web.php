<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActorMovieController;
use App\Http\Controllers\StarWarsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ActorMovieController::class, 'index'])->name('actors-and-movies');

Route::get('/starwars-search', [StarWarsController::class, 'search']);