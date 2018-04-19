<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //Make the following mass assignable
    protected $fillable = [
        'title', 'body'
    ];
}
