<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    

    public function getCategories()
    {
        $categories = $this->categoryService->getCategories();
        if(! $categories){
            return response()->json(['message' => 'No categories found'], 404);
        }
        return response()->json(['categories' => $categories], 200);
    }

    public function storeCategory(Request $request)
    {
        $category = $this->categoryService->storeCategory($request->all());
        return response()->json(['message' => 'Category created', 'category' => $category],201);
    }

    public function deleteCategory($id)
    {
        $this->categoryService->deleteCategory($id);
        return response()->json(['message' => 'Category deleted'], 200);
    }

    public function updateCategory(Request $request, $id)
    {
        $category = $this->categoryService->updateCategory($id, $request->all());
        if(! $category){
            return response()->json(['message' => 'Category not found or updat failed'], 404);
        }

        return response()->json(['message' => 'Category updated', 'category' => $category], 201);
    }

    public function showCaregory($id)
    {
        $category = $this->categoryService->showCategoryById($id);
        if(! $category){
            return response()->json(['message' => 'Category not found'], 404);
        }
        return response()->json(['category' => $category], 200);
    }
}
