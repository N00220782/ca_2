<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date',
        'start_time',
        'end_time',
        'ticket_price',
        'description',
        'venue_id',
        'show_image'
    ];

    public function venue(){
        return $this->belongsTo(Venue::class);
    }

    public function artists(){
        return $this->belongsToMany(Artist::class, 'artist_shows');
    }

}
