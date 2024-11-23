<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'title'
    ];

    public function films()
    {
        return $this->belongsToMany(Film::class);
    }
}
