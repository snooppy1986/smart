<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'title',
        'is_visible',
        'url'
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
}
