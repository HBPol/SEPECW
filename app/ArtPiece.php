<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtPiece extends Model
{
    //Make the following mass assignable
    protected $fillable = [
        'title', 'description', 'type', 'artist', 'price'
    ];
}
