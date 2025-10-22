<?php

namespace App\Http\Controllers;

use App\Models\BlogImages;
use App\Services\BlogImageService;
use Illuminate\Http\Request;

class BlogImageController extends Controller
{
    protected $blogImageService;
    
    public function __construct(BlogImageService $blogImageService)
    {
        $this->blogImageService = $blogImageService;
    }

    public function storeBlogImage(Request $request)
    {
        $request->validate([
            'blog_id' => 'required|exists:blogs,id',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:4096'
        ]);

        if (!$request->hasFile('images')) {
            return response()->json(['error' => 'No image uploaded'], 400);
        }

        $uploadedImages = $this->blogImageService->store($request);

        
        return response()->json([
            'message' => 'Images uploaded successfully',
            'blog_id' => $request->input('blog_id'),
            'image_urls' => $uploadedImages
        ], 201);
    }
}
