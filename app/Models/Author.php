<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'name', 'bio', 'profile_picture', 'website', 
        'x', 'linkedin', 'github', 'youtube',
    ];

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
