<?php


namespace App\Repositories;


use App\Models\Film;
use App\Models\Genre;
use Illuminate\Support\Facades\Storage;

class FilmRepository
{
    protected $film;

    public function __construct(Film $film)
    {
        $this->film = $film;
    }

    public function getAllGenres()
    {
        return Genre::all();
    }

    public function save($data)
    {
        $film = new $this->film;

        $film->title = $data['title'];

        if(isset($data['image'])){
            $file = $data['image'];
            $name = $file->hashName();
            Storage::disk('public')->put('images', $file);
            $film->image = $name;
        }

        $film->save();
        $film->genres()->attach($data['genres']);

        return $film->fresh();
    }

    public function update($data, $id)
    {
        $film = $this->film->find($id);

        $film->title = $data['title'];

        if(isset($data['image'])){
            Storage::disk('public')->delete('images/'.$film->image);

            $file = $data['image'];
            $name = $file->hashName();
            Storage::disk('public')->put('images', $file);
            $film->image = $name;
        }

        $film->update();
        $film->genres()->detach();
        $film->genres()->attach($data['genres']);

        return $film;
    }

    public function delete($id)
    {
        $film = $this->film->find($id);
        if($film->image != 'default-poster.jpg'){
            Storage::disk('public')->delete('images/'.$film->image);
        }
        $film->delete();

        return $film;
    }

    public function allJson()
    {
        $films = $this->film
            ->with('genres')
            ->where('is_visible',1)
            ->paginate(10);

        foreach ($films as $film){
            $film->image_url = url('storage/images/'. $film->image);
        }

        return $films;
    }

    public function show($id)
    {
        $film = $this->film
            ->with('genres')
            ->where('is_visible',1)
            ->find($id);

        $film->image_url = url('storage/images/'. $film->image);

        return $film;
    }
}
