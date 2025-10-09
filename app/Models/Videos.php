<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    protected $fillable = [
        'title', 'description', 'url', 'duration', 'order',
    ];

    public function playlist()
    {
        return $this->belongsTo(Playlist::class);
    }
}
