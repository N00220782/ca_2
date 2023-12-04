<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'genre'
    ];

    public function shows(){

        return $this->belongsToMany(Show::class, 'artist_shows');
    }

}
