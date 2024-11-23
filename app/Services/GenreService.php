<?php


namespace App\Services;


use App\Repositories\GenreRepository;

class GenreService
{
    protected $genreRepository;

    public function __construct(GenreRepository $genreRepository)
    {
        $this->genreRepository = $genreRepository;
    }

    public function storeGenreData($data)
    {
        $this->genreRepository->store($data);
    }

    public function updateGenreData($data, $id)
    {
        $this->genreRepository->update($data, $id);
    }

    public function deleteById($id)
    {
        return $this->genreRepository->destroy($id);
    }

    public function allGenreJson()
    {
        return $this->genreRepository->allGenres();
    }

    public function showGenreById($id)
    {
        return $this->genreRepository->show($id);
    }
}
