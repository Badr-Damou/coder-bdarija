<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $fillable = [
        'title', 'description', 'level', 'constructor', 'thumbnail', 'slug', 'rating'
    ];

    public function videos()
    {
        return $this->hasMany(Videos::class);
    }

    public function playlistCategories()
    {
        return $this->hasMany(PlaylistCategory::class);
    }
    
}
