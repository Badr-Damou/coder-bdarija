<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title', 'content', 'slug', 'thumbnail', 'read_time', 'language', 'author_id'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function blogCategories()
    {
        return $this->hasMany(BlogCategory::class);
    }

    public function blogImages()
    {
        return $this->hasMany(BlogImages::class);
    }
}
