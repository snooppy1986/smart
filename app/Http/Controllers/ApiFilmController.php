<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Services\FilmService;
use Illuminate\Http\Request;

class ApiFilmController extends Controller
{
    protected $filmService;

    public function __construct(FilmService $filmService)
    {
        $this->filmService = $filmService;
    }
    public function index()
    {
        $films = $this->filmService->allFilmJson();
        return response()->json(['films' => $films]);
    }

    public function show($id)
    {
        $film = $this->filmService->showFilmById($id);
        return response()->json(['film'=>$film]);
    }
}
