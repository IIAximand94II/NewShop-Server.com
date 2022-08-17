<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\API\FilterRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Response;

class ProductController extends Controller
{

    public function index(FilterRequest $request){
        $data = $request->validated();
        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);
        $products = Product::filter($filter)->paginate(3, ['*'], 'page', $data['page']);
        //dd(DB::getQueryLog());
        return ProductResource::collection($products);
    }

    public function hits(){
        $products = Product::all()->where('hit', 1);
        return ProductResource::collection($products);
    }

    public function show(Product $product){
        return new ProductResource($product);
    }
}
