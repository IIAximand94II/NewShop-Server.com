<?php

namespace App\Http\Controllers\API\Blog;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Blog\Post;
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

    public function show(Post $post){
        return new PostResource($post);
    }
}
