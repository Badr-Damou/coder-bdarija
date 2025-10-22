<?php

namespace App\Services;

use App\Repositories\BlogImageRepository;
use App\Repositories\BlogRepository;

class BlogImageService
{
    /**
     * Create a new class instance.
     */
    protected $blogImageRepository;

    public function __construct(BlogImageRepository $blogImageRepository)
    {
        $this->blogImageRepository = $blogImageRepository;   
    }
    

    public function store($data)
    {
        return $this->blogImageRepository->store($data);
    }

}