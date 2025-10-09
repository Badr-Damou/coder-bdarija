<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'description',
    ];

    public function playlistCategories()
    {
        return $this->hasMany(PlaylistCategory::class);
    }

    public function blogCategories()
    {
        return $this->hasMany(BlogCategory::class);
    }
}
