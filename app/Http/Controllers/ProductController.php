<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Libraries\CategoryMenu;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Size;
use App\Models\Tag;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(){
        //$cat = Category::all();
        //dd(CategoryMenu::run());
        return view('product.index');
    }

    public function create(){
        $categories = CategoryService::run();
        $tags = Tag::all();
        $colors = Color::all();
        $sizes = Size::all();
        return view('product.create', compact('categories', 'sizes', 'colors', 'tags'));
    }

    public function store(ProductRequest $request){
        $data = $request->validated();
        //dd($data);
        $data['preview_image'] = Storage::disk('public')->put('/images/products', $data['preview_image']);
        $tags = $data['tags'];
        $colors = $data['colors'];
        $sizes = $data['sizes'];
        unset($data['tags'], $data['colors'], $data['sizes']);
        $product = Product::create($data);
        if($product){
            $product->tags()->attach($tags);
            $product->colors()->attach($colors);
            $product->sizes()->attach($sizes);
        }
    }

    public function show(Product $product){
        dd($product->groupColors());
    }

    public function edit(Product $product){
        $categories = CategoryService::run();
        $tags = Tag::all();
        $colors = Color::all();
        $sizes = Size::all();
        return view('product.edit', compact('categories', 'sizes', 'colors', 'tags', 'product'));
    }

    public function update(Product $product){

    }

    public function delete(Product $product){

    }
}
