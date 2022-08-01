<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        //$categories = Category::all();
        return view('category.index');
    }

    public function create(){
        $categories = Category::all();
        return view('category.create', compact('categories'));
    }

    public function store(CategoryRequest $request){
        $data = $request->validated();
        //dd($data);
        Category::firstOrCreate($data);
        return redirect()->route('category.index');
    }

    public function show(){
        return view('category.show');
    }

    public function edit(Category $category){
        $categories = Category::all();
        return view('category.edit', compact('categories', 'category'));
    }

    public function update(CategoryRequest $request, Category $category){
        $data = $request->validated();
        dd($data);
        $category->update($data);
        return redirect()->route('category.index');
    }

    public function delete(Category $category){
        $category->delete();
        return redirect()->route('category.index');
    }
}
