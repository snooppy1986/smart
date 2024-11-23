<?php


namespace App\Services;


use App\Repositories\FilmRepository;
use http\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class FilmService
{
    protected $filmRepository;

    public function __construct(FilmRepository $filmRepository)
    {
        $this->filmRepository = $filmRepository;
    }

    public function getAllGenres()
    {
        return $this->filmRepository->getAllGenres();
    }

    public function getGenresIds($genres)
    {
        return $genres->pluck('id')->toArray();
    }

    public function saveFilmData($data)
    {
        $this->filmRepository->save($data);
    }

    public function updateFilmData($data, $id)
    {
        $this->filmRepository->update($data, $id);
    }

    public function deleteById($id)
    {
        $this->filmRepository->delete($id);
    }

    public function allFilmJson()
    {
        return $this->filmRepository->allJson();
    }

    public function showFilmById($id)
    {
        return $this->filmRepository->show($id);
    }
}
