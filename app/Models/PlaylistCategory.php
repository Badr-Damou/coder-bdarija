<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlaylistCategory extends Model
{
    protected $fillable = [
        'playlist_id', 'category_id', 'description',
    ];

}
