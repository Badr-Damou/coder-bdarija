<?php

namespace App\Http\Controllers;

use App\Services\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function storeBlog(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string', 
            'slug' => 'required|string|unique:blogs,slug,',
            'image' => 'nullable|url',
            'author_id' => 'required|exists:authors,id',
            'read_time' => 'nullable|integer',
            'language' => 'required|string|max:10',
        ]);

        $blog = $this->blogService->storeBlog($request->all()); 
        return response()->json(['message' => 'Blog created',
        "blog" => $blog], 201);
    }

    public function deleteBlog($id)
    {
        
    }

    public function updateBlog(Request $request, $id)
    {
        
    }

    public function getAllBlogs()
    {
        
    }
}

