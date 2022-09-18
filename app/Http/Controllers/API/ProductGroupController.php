<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\API\FilterRequest;
use App\Http\Resources\ProductGroupResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductGroup;
use Illuminate\Support\Facades\DB;
use Response;

class ProductGroupController extends Controller
{

    public function index(ProductGroup $productGroup){
        return new ProductGroupResource($productGroup);
    }

}
