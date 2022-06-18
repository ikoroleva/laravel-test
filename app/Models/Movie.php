<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MovieType;
use App\Models\Genre;
use App\Models\Review;
use App\Models\Person;

class Movie extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function movieType()
    {
        return $this->belongsTo(MovieType::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function people()
    {
        return $this->hasMany(Person::class);
    }
}
