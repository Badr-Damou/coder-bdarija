<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService
{
    /**
     * Create a new class instance.
     */

    protected $categoryRepository;
    public function __construct(CategoryRepository $categoryRepositroy)
    {
        $this->categoryRepository = $categoryRepositroy;
    }

    public function getCategories()
    {
        $categories = $this->categoryRepository->getAll();
        return $categories;
    }

    public function storeCategory($data)
    {
        return $this->categoryRepository->store($data);
    }

    public function deleteCategory($id)
    {
        return $this->categoryRepository->delete($id);
    }

    public function updateCategory($id, $data)
    {
        return $this->categoryRepository->update($id, $data);
    }

    public function showCategoryById($id)
    {
        return $this->categoryRepository->getById($id);
    }
}
