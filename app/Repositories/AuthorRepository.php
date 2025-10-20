<?php

namespace App\Repositories;

use App\Models\Author;
use Illuminate\Support\Facades\DB;

class AuthorRepository
{
    
    public function getAll()
    {
        return Author::all();
    }

    public function store($data)
    {
        return Author::create($data);
    }

    public function getById($id)
    {
        return Author::find($id);
    }

    public function update($id, $data)
    {
        $author = DB::table('authors')->where('id', $id)
            ->update([
                'name' => $data['name'],
                'bio' => $data['bio'] ?? null,
                'avatar' => $data['avatar'] ?? null,
                'website' => $data['website'] ?? null,
                'updated_at' => now(),
            ]);
        return $author ? DB::table('authors')
            ->where('id', $id)
            ->first() : null;
    }
}
