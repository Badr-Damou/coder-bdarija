<?php

namespace App\Repositories;

use App\Models\Playlist;
use Illuminate\Support\Facades\DB;

class PlaylistRepository
{
    
    public function store(array $data)
    {
        $playlist = Playlist::Create(
            [
                'slug' => $data['slug'],
                'title' => $data['title'],
                'description' => $data['description'],
                'level' => $data['level'],
                'constructor' => $data['constructor'],
                'thumbnail' => $data['thumbnail'],
                'rating' => $data['rating'],
            ]
        );

        return $playlist;
    }

    public function delete($id)
    {
        return Playlist::destroy($id);
    }

    public function update($id, array $data)
    {
        $updated = DB::table('playlists')
            ->where('id', $id)
            ->update([
                'slug' => $data['slug'],
                'title' => $data['title'],
                'description' => $data['description'] ?? null,
                'level' => $data['level'] ?? null,
                'constructor' => $data['constructor'] ?? null,
                'thumbnail' => $data['thumbnail'] ?? null,
                'rating' => $data['rating'] ?? null,
            ]);
        
        return $updated ? DB::table('playlists')
            ->where('id', $id)
            ->first() : null;
    }


    public function getplaylists()
    {
        return Playlist::all();
    }
}
