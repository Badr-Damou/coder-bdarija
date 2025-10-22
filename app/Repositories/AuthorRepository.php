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

    public function store($request)
    {
        $data = $request->only(['name', 'bio', 'email', 'website', 'twitter', 'linkedin', 'github', 'youtube']); 
        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_picture')->store('author_images', 'public');
            $data['profile_picture'] = asset('storage/' . $path);
        }
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
