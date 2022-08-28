<?php

namespace App\Http\Controllers\API\Blog;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\API\FilterRequest;
use App\Http\Resources\PostResource;
use App\Http\Resources\ProductResource;
use App\Models\Blog\Post;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Response;

class PostController extends Controller
{

    public function index(){
        $posts = Post::all();
        return PostResource::collection($posts);
    }

    public function latest(){
        $posts = Post::all();
        return PostResource::collection($posts);
    }

    public function show(){

    }
}
