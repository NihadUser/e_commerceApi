<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function products()
    {
        $products = Product::query()
            ->select('name', 'description', 'id', 'price')
            ->with(['images' => fn ($q) => $q->where('show_home', 1)])
            ->get();

        return response()->json([
            'data' => $products
        ], 200);
    }

    public function categories()
    {
        $categories = Category::query()
            ->select(['id', 'name', 'image'])
            ->get();
        if($categories == null){
            return response([
                'message' => 'No data found'
            ]);
        }

        return response()->json([
            'data' => $categories
        ], 201);
    }
}
