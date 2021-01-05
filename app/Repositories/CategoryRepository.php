<?php

namespace App\Repositories;

use App\Http\Resources\BalancePackageResource;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryRepository
{

    public function all()
    {
        $categories = CategoryResource::collection(Category::all());

        if (!$categories) {
            return response()->json([
                'status'     => 200,
                'categories' => $categories
            ]);
        }

        return response()->json([
            'status'  => 404,
            'message' => 'Not found any category'
        ]);

    }


    public function findById($id)
    {
        $category = CategoryResource::collection(Category::where('id', $id)->get());

        if (!$category) {
            return response()->json([
                'status'   => 200,
                'category' => $category
            ]);
        }

        return response()->json([
            'status'  => 404,
            'message' => 'Category is not found'
        ]);

    }

}
