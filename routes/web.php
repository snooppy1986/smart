<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('main');

Route::prefix('dashboard')->group(function (){
    Route::get('/', function (){
        return view('layout.dashboard');
    })->name('dashboard.index');

    Route::get('films', [FilmController::class, 'index'])->name('dashboard.films.index');

    Route::prefix('film')->group(function (){
        Route::post('status/{film}', [FilmController::class, 'status']);
        Route::get('create', [FilmController::class, 'create'])->name('film.create');
        Route::post('store', [FilmController::class, 'store'])->name('film.store');
        Route::get('edit/{film}', [FilmController::class, 'edit'])->name('film.edit');
        Route::post('update/{id}', [FilmController::class, 'update'])->name('film.update');
        Route::post('delete/{id}', [FilmController::class, 'delete'])->name('film.delete');
    });

    Route::get('genres', [GenreController::class, 'index'])->name('dashboard.genres.index');
    Route::prefix('genre')->group(function (){
        Route::get('create', [GenreController::class, 'create'])->name('genre.create');
        Route::post('store', [GenreController::class, 'store'])->name('genre.store');
        Route::get('edit/{genre}', [GenreController::class, 'edit'])->name('genre.edit');
        Route::post('update/{id}', [GenreController::class, 'update'])->name('genre.update');
        Route::post('delete/{id}', [GenreController::class, 'destroy'])->name('genre.delete');
    });

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
