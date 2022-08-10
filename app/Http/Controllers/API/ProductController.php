<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{

    public function index(){
        $products = Product::all();
        return ProductResource::collection($products);
        //return 11111111111;
    }

    public function hit(){
        $products = Product::all()->where('hit', 1);
        return ProductResource::collection($products);
    }

    public function show(Product $product){
        return new ProductResource($product);
    }

}
