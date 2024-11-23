<?php

namespace App\Http\Controllers;

use App\Services\GenreService;
use Illuminate\Http\Request;

class ApiGenreController extends Controller
{
    protected $genreService;

    public function __construct(GenreService $genreService)
    {
        $this->genreService = $genreService;
    }

    public function index()
    {
        $genres = $this->genreService->allGenreJson();

        return response()->json(['genres' => $genres]);
    }

    public function show($id)
    {
        $genre = $this->genreService->showGenreById($id);

        return response()->json(['genre' => $genre]);
    }
}
