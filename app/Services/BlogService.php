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

    public function getBlogs()
    {
        return $this->blogRepository->getAll();
    }

    public function getBlogById($id)
    {
        return $this->blogRepository->getById($id);
    }

    public function storeBlog($data)
    {
        return $this->blogRepository->store($data);
    }

    public function deleteblog($id){
        return $this->blogRepository->delete($id);
    }

    public function updateBlog($id, $data)
    {
        return $this->blogRepository->update($id, $data);
    }
}
