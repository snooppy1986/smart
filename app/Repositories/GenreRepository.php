<?php


namespace App\Repositories;


use App\Models\Genre;

class GenreRepository
{
    protected $genre;

    public function __construct(Genre $genre)
    {
        $this->genre = $genre;
    }

    public function store($data)
    {
        $genre = new $this->genre;

        $genre->title = $data['title'];

        $genre->save();
    }

    public function update($data, $id)
    {
        $genre = $this->genre->find($id);

        $genre->title = $data['title'];

        $genre->update();

        return $genre;
    }

    public function destroy($id)
    {
        $genre = $this->genre->find($id);
        $genre->delete();
    }

    public function allGenres()
    {
        return $this->genre->all();
    }

    public function show($id)
    {
        $genre = $this->genre->find($id);

        $films = $genre->films()->with('genres')->paginate(2);

        foreach ($films as $film){
            $film->image_url = url('storage/images/'. $film->image);
        }

        return $films;
    }
}
