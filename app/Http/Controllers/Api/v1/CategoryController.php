<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }


    public function index()
    {
        return $this->categoryRepository->all();
    }


    public function show($id)
    {
        return $this->categoryRepository->findById($id);
    }

}
