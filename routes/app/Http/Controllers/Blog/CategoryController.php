<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\CategoryRequest;
use App\Http\Resources\Admin\Blog\CategoryResource;
use App\Models\Blog\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return CategoryResource::collection($categories);
    }

    public function store(CategoryRequest $request){
        $data = $request->validated();
        $data['slug'] = strtolower(str_replace(' ', '-', $data['title']));
        $category = Category::firstOrCreate($data);
        return response()->json(['message' => 'Category create!']);
    }

    public function update(CategoryRequest $request, Category $category){
        $data = $request->validated();
        $data['slug'] = strtolower(str_replace(' ', '-', $data['title']));
        $category->update($data);
        return response()->json(['message' => 'Category update!']);
    }

    public function delete(Category $category){
        $category->delete();
        return response()->json(['message' => 'Category delete!']);
    }
}
