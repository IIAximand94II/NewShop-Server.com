<?php

namespace App\Http\Controllers\API\Blog;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Blog\CategoryResource;
use App\Models\Blog\Category;
use Illuminate\Support\Facades\DB;
use Response;

class CategoryController extends Controller
{

    public function index(){
        $categories = Category::all();
        return CategoryResource::collection($categories);
    }
}
