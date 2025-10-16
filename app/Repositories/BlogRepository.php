<?php

namespace App\Repositories;

use App\Models\Blog;
use Illuminate\Support\Facades\DB;

class BlogRepository
{

    public function getAll()
    {
        return Blog::all();
    }
    
    public function store($data)
    {
        return Blog::create($data);
    }

    public function delete($id)
    {
        return Blog::destroy($id);
    }

    public function update($id, $data)
    {

        
        $blog = DB::table('blogs')->where('id', $id)
            ->update([
                'slug' => $data['slug'],
                'title' => $data['title'],
                'content' => $data['content'] ?? null,
                'image' => $data['image'] ?? null,
                'read_time' => $data['read_time'] ?? null,
                'language' => $data['language'] ?? null,
                'author_id' => $data['author_id'] ?? null,
                'updated_at' => now(),
            ]);
        return $blog ? DB::table('blogs')
            ->where('id', $id)
            ->first() : null;
        
        // $updated = DB::table('playlists')
        //     ->where('id', $id)
        //     ->update([
        //         'slug' => $data['slug'],
        //         'title' => $data['title'],
        //         'description' => $data['description'] ?? null,
        //         'level' => $data['level'] ?? null,
        //         'constructor' => $data['constructor'] ?? null,
        //         'thumbnail' => $data['thumbnail'] ?? null,
        //         'rating' => $data['rating'] ?? null,
        //     ]);
        
        // return $updated ? DB::table('playlists')
        //     ->where('id', $id)
        //     ->first() : null;
    }
}
