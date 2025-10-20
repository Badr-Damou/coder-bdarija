<?php

namespace App\Repositories;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryRepository
{

    public function getAll()
    {
        return Category::all();
    }

    public function getById($id)
    {
        return Category::find($id);
    }
    
    public function store($data)
    {
        return Category::create($data);
    }

    public function delete($id)
    {
        return Category::destroy($id);
    }

    public function update($id, $data)
    {
        $blog = DB::table('categories')->where('id', $id)
            ->update([
                'name' => $data['name']?? null,
                'description' => $data['description'] ?? null,
                'updated_at' => now(),
            ]);
        return $blog ? DB::table('categories')
            ->where('id', $id)
            ->first() : null;
    }
}
