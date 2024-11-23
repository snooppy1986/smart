<?php

use App\Http\Controllers\ApiFilmController;
use App\Http\Controllers\ApiGenreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/
Route::get('films', [ApiFilmController::class, 'index'])->name('api.films.index');
Route::get('film/show/{id}', [ApiFilmController::class, 'show'])->name('api.film.show');


Route::get('genres', [ApiGenreController::class, 'index'])->name('api.genres.index');
Route::get('genre/show/{id}', [ApiGenreController::class, 'show'])->name('api.genre.show');
