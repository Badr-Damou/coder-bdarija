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

    public function getBlogs(Request $request)
    {
        $blogs = $this->blogService->getBlogs($request->all());
        if(!$blogs){
            return response()->json(['message' => 'No blogs found'], 404);
        }
        return response()->json(['blogs' => $blogs], 200);
    }

    public function showBlog($id)
    {
        $blog = $this->blogService->getBlogById($id);
        if(!$blog){
            return response()->json(['message' => 'blog not found'], 404);
        }
        return response()->json(['blog' => $blog], 200);
    }
    
    public function storeBlog(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string', 
            'slug' => 'required|string|unique:blogs,slug,',
            'thumbnail' => 'nullable|url',
            'author_id' => 'required|exists:authors,id',
            'read_time' => 'nullable|integer',
            'language' => 'required|string|max:10',
        ]);

        $blog = $this->blogService->storeBlog($request->all()); 
        return response()->json(['message' => 'Blog created',
        "blog" => $blog], 201);
    }

    
    public function updateBlog(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'level' => 'nullable|string',
            'constructor' => 'nullable|string',
            'thumbnail' => 'nullable|url',
            'slug' => "required|string|unique:playlists,slug,$id",
            'rating' => 'nullable|numeric|min:0|max:5',
        ]);
        $updatedBlog = $this->blogService->updateBlog($id, $request->all());
        if ($updatedBlog) {
            return response()->json(['message' => 'Blog updated', 'blog' => $updatedBlog], 200);
        } else {
            return response()->json(['message' => 'Blog not found or update failed'], 404);
        }
    }
    
    public function deleteBlog($id)
    {
        $this->blogService->deleteblog($id);
        return response()->json(['message' => 'Blog deleted'], 200);
    }
}

