<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\ProductGroup;
use App\Models\Size;
use App\Models\Tag;


class FilterController extends Controller
{

    public function index(){
//        $categories = Category::all();
//        $colors = Color::all();
//        $sizes = Size::all();
//        $tags = Tag::all();
//
//        $minPrice = ProductGroup::orderBy('price', 'ASC')->first()->price;
//        $maxPrice = ProductGroup::orderBy('price', 'DESC')->first()->price;
//
//        $filters = [
//            'categories' => $categories,
//            'colors'     => $colors,
//            'sizes'      => $sizes,
//            'tags'       => $tags,
//            'price' => [
//                'min_price'  => $minPrice,
//                'max_price'  => $maxPrice,
//            ],
//
//        ];

        //dd($filters);
        return response()->json(['filters'=>'1111111111111111111111111111111111']);
        //return 11111111111111111111;
    }

}
