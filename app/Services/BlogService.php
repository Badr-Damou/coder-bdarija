<?php

namespace App\Services;

use App\Repositories\BlogRepository;

class BlogService
{
    /**
     * Create a new class instance.
     */
    protected $blogRepository;

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;   
    }

    public function storeBlog($data)
    {
        return $this->blogRepository->store($data);
    }
}
