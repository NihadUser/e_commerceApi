<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use  \Illuminate\Foundation\Application;
use \Illuminate\Http\Response;
use \Illuminate\Contracts\Routing\ResponseFactory;


class DetailsController extends Controller
{
    public function index($id): Application|Response|ResponseFactory
    {
        $product = Product::query()
            ->from('products as p')
            ->with([
                'images',
                'info',
                'brand',
                'colors.color_name',
                'memories.memory'
            ])
            ->where('p.id', $id)->first();

        return response([
            'data' => $product,
        ], 200);
    }
}
