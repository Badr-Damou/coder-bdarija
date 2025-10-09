<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title', 'content', 'slug', 'image', 'read_time',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function blogCategories()
    {
        return $this->hasMany(BlogCategory::class);
    }
}
