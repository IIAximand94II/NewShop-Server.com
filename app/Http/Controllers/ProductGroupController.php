<?php

namespace App\Http\Controllers;



use App\Http\Requests\ProductGroupRequest;
use App\Models\ProductGroup;

class ProductGroupController extends Controller
{


    public function store(ProductGroupRequest $request){
        $data = $request->validated();
        dd($data);
    }

    public function update(ProductGroupRequest $request){
        $data = $request->validated();
        dd($data);
    }

    public function delete(ProductGroup $product){
        dd($product);
    }
}
