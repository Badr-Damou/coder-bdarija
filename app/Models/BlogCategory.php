<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $fillable = [
        'playlist_id, categoey_id'
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
