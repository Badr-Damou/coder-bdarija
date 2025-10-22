<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    protected $authorService;
    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }
    
    public function getAuthors()
    {
        $authors = $this->authorService->getAllAuthors();
        if (!$authors){
            return response()->json(['message' => 'No authors found'], 404);
        }
        return response()->json($authors,200);
    }

    public function storeAuthor(Request $request)
    {
        $author = $this->authorService->storeAuthor($request);
        if (!$author){
            return response()->json(['message' => 'Author creation failed'], 500);
        };
        return response()->json(['message' => 'Author created',
            'author' => $author], 201);
    }
    
    public function showAuthor($id)
    {
        
    }
    
    public function updateAuthor(Request $request, $id)
    {
        
    }
    
    public function deleteAuthor($id)
    {
        
    }
}
