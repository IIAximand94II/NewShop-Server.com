<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\FilterResource;
use App\Libraries\CategoryMenu;
use App\Libraries\TreeBuilder;
use App\Models\Category;
use App\Models\Color;
use App\Models\ProductGroup;
use App\Models\Size;
use App\Models\Tag;
use Response;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function index(){
        //$categories = Category::all();
        $categories = TreeBuilder::returnTree(Category::get());
        //$categories = CategoryMenu::run();
        $colors = Color::all();
        $sizes = Size::all();
        $tags = Tag::all();

        $minPrice = ProductGroup::orderBy('price', 'ASC')->first()->price;
        $maxPrice = ProductGroup::orderBy('price', 'DESC')->first()->price;

        $filters = [
            'categories' => $categories,
            'colors'     => $colors,
            'sizes'      => $sizes,
            'tags'       => $tags,
            'price' => [
                'min_price'  => $minPrice,
                'max_price'  => $maxPrice,
            ],

        ];
        //$filters = (object)$filters;
        //dd($filters);
        return Response::json($filters);
        //return response([])->json(['filters'=>$filters]);
        //return FilterResource::collection($filters);
    }
}
