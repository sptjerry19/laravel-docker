<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'year',
        'rated',
        'released',
        'runtime',
        'genre',
        'director',
        'writer',
        'actors',
        'plot',
        'language',
        'country',
        'awards',
        'poster',
        'metascore',
        'imdb_rating',
        'imdb_votes',
        'imdb_id',
        'type',
        'images'
    ];

    protected $casts = [
        'images' => 'array',
        'released' => 'date',
    ];
}