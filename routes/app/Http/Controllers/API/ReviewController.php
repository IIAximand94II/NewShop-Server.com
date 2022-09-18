<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\ReviewRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ReviewResource;
use App\Models\Product;
use App\Models\ProductGroup;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

//    public function store(Product $product, ReviewRequest $request){
//        $data = $request->validated();
//        $data['product_id'] = $product->id;
//        $data['user_id'] = 1;
//        //(auth()->user());
//        Review::create($data);
//        return response()->json(['message' => 'Review added.']);
//    }

    public function store(ProductGroup $productGroup, ReviewRequest $request){
        $data = $request->validated();
        $data['product_id'] = $productGroup->id;
        Review::create($data);
        return response()->json(['message' => 'Review added.']);
    }


}
