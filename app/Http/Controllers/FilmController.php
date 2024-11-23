<?php

namespace App\Http\Controllers;

use App\DataTables\FilmsDataTable;
use App\Http\Requests\StoreFilmRequest;
use App\Models\Film;
use App\Services\FilmService;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    protected $filmService;

    public function __construct(FilmService $filmService)
    {
        $this->filmService = $filmService;
    }

    public function index(FilmsDataTable $dataTable)
    {
        return $dataTable->render('dashboard.film.index');
    }

    public function status(Film $film, Request $request)
    {
        $film->update([
            'is_visible' => $request->status
        ]);
    }

    public function create()
    {
        $genres = $this->filmService->getAllGenres();

        return view('dashboard.film.create', compact('genres'));
    }

    public function store(StoreFilmRequest $filmRequest)
    {
        $data = $filmRequest->validated();

        $this->filmService->saveFilmData($data);

        return redirect()->route('dashboard.films.index')->with('message', 'Вы добавили новый фильм.');
    }

    public function edit(Film $film)
    {
        $genres = $this->filmService->getAllGenres();
        $genresIds = $this->filmService->getGenresIds($film->genres);

        return view('dashboard.film.edit', compact('film', 'genres', 'genresIds'));
    }

    public function update(StoreFilmRequest $filmRequest, $id)
    {
        $data = $filmRequest->validated();

        $this->filmService->updateFilmData($data, $id);

        return redirect()->back()->with('message', 'Запись обновлена успешно.');
    }

    public function delete($id)
    {
        $this->filmService->deleteById($id);

        return response()->json(['message', 'Запись удалена.']);
    }
}
