<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\{Brand, Product};
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function brands($keyword = null): JsonResponse
    {
        $brands = Brand::query()
            ->from('brands as b')
            ->select('b.id', 'b.name', DB::raw('count(p.id) as count'))
            ->leftJoin('products as p', 'p.brand_id', 'b.id')
            ->groupBy('b.name', 'b.id');

        if($keyword !== null) {
            $brands = $brands->where('b.name', 'like', '%' . $keyword . '%');
        }

        return response()->json([
            'data' => $brands->get()
        ], 200);
    }

    public function products($id): JsonResponse
    {
        $products = Product::query()
            ->from('products')
            ->with([
                'images',
                'info',
            ])
            ->where('products.category_id', $id)
            ->when(request()->name, fn ($q) => $q->where('products.name', 'like', '%' . request()->name . '%'))
            ->when(request()->minPrice || request()->maxPrice, function ($query){
                return $query->whereBetween('products.price', [request()->minPrice, request()->maxPrice]);
            })
            ->when(\request()->memory_id, function ($q){
                return $q->whereHas('memories', function ($query){
                    $query->where('memory_id', \request()->memory_id);
                });
            })
            ->when(request()->brand_id, function ($q){
                return $q->where('brand_id', \request()->brand_id);
            })
            ->get();

        return response()->json([
            'data' => $products,
            'message' => 'datanin duz gelmesi ucun hemse minPirce and maxPrice gonder requeste'
        ]);
    }


}
