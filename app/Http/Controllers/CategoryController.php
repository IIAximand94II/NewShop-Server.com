<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Libraries\Menu\Menu;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        $categoriesTree = CategoryService::run();
        return view('category.index', compact('categories', 'categoriesTree'));
    }

    public function create(){
        $categories = CategoryService::run();
        return view('category.create', compact('categories'));
    }

    public function store(CategoryRequest $request){
        $data = $request->validated();
        Category::firstOrCreate($data);
        return redirect()->route('category.index');
    }

    public function show(Category $category){
        return view('category.show', compact('category'));
    }

    public function edit(Category $category){
        $categories = CategoryService::run($category->id);
        return view('category.edit', compact('categories', 'category'));
    }

    public function update(CategoryRequest $request, Category $category){
        $data = $request->validated();
        //dd($data);
        $category->update($data);
        return redirect()->route('category.index');
    }

    public function delete(Category $category){
        $category->delete();
        return redirect()->route('category.index');
    }
}
