<?php

namespace App\Repositories;

use App\Models\Blog;
use App\Models\BlogImages;
use Illuminate\Support\Facades\DB;

class BlogImageRepository
{

    public function store($request)
    {
         $uploadedImages = [];

        $files = is_array($request->file('images'))
            ? $request->file('images')
            : [$request->file('images')];

        foreach ($files as $image) {
            $path = $image->store('blog_images', 'public');
            
            $imageUrl = asset('storage/' . $path);

            BlogImages::create([
                'blog_id' => $request->input('blog_id'),
                'image_url' => $imageUrl,
            ]);

            $uploadedImages[] = $imageUrl;
        }
    }

}
