<?php

namespace App\Services;

use App\Repositories\AuthorRepository;

class AuthorService
{
    /**
     * Create a new class instance.
     */
    protected $authorRepository;
    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }
    public function getAllAuthors()
    {
        return $this->authorRepository->getAll();
    }

    public function storeAuthor($request){
        return $this->authorRepository->store($request);
    }

    public function showAuthor($id){
        return $this->authorRepository->getById($id);
    }

    public function updateAuthor($id, $data){
        return $this->authorRepository->update($id, $data);
    }
}
