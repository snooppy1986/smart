<?php

namespace App\Http\Controllers;

use App\DataTables\GenresDataTable;
use App\Http\Requests\GenreRequest;
use App\Models\Genre;
use App\Services\GenreService;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    protected $genreService;

    public function __construct(GenreService $genreService)
    {
        $this->genreService = $genreService;
    }

    public function index(GenresDataTable $genresDataTable)
    {
        return $genresDataTable->render('dashboard.genre.index');
    }

    public function create()
    {
        return view('dashboard.genre.create');
    }

    public function store(GenreRequest $genreRequest)
    {
        $data = $genreRequest->validated();
        $this->genreService->storeGenreData($data);

        return redirect()->route('dashboard.genres.index');
    }

    public function edit(Genre $genre)
    {
        return view('dashboard.genre.edit', compact('genre'));
    }

    public function update(GenreRequest $genreRequest, $id)
    {
        $data = $genreRequest->validated();
        /*dd($data, $id);*/
        $this->genreService->updateGenreData($data, $id);

        return redirect()->back()->with('message', 'Запись обновлена успешно.');
    }

    public function destroy($id)
    {
        $status = $this->genreService->deleteById($id);

        return response()->json($status);
    }

}
