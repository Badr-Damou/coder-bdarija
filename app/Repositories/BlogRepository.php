<?php

namespace App\Repositories;

use App\Models\Blog;
use Illuminate\Support\Facades\DB;

class BlogRepository
{
    
    public function store($data)
    {
        return Blog::create($data);
    }
}
