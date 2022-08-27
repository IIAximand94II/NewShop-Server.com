<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\PostRequest;
use App\Http\Resources\Admin\Blog\PostResource;
use App\Models\Blog\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return PostResource::collection($posts);
    }

    public function store(PostRequest $request){
        $data = $request->validated();
        $tags = $data['tags']; unset($data['tags']);
        $image = $data['image']; unset($data['image']);
        $data['status'] = $data['status'] ? 1 : 0;
        $data['slug'] = str_replace(' ', '-', (strtolower($data['title'])));

        // $data['user_id'] = auth()->user()->id;

        // image
        $imageName = md5(Carbon::now().'_'.$image->getClientOriginalName()).'.'.$image->getClientOriginalExtension();
        $imagePath = Storage::disk('public')->putFileAs('/images/blog/posts/title', $image, $imageName);
        $data['image_url'] = url('storage/'.$imagePath);

        $post = Post::firstOrCreate($data);
        $post->tags()->attach($tags);

        return response()->json(['message'=>'Post created!']);
    }

    public function show(Post $post){
        return new PostResource($post);
    }

    public function update(PostRequest $request, Post $post){
        $data = $request->validated();
        //dd($data);
        $tags = $data['tags']; unset($data['tags']);
        $data['status'] = $data['status'] ? 1 : 0;
        $data['slug'] = str_replace(' ', '-', (strtolower($data['title'])));

        // image
        if(!empty($data['image'])){
            $image = $data['image']; unset($data['image']);
            $imageName = md5(Carbon::now().'_'.$image->getClientOriginalName()).'.'.$image->getClientOriginalExtension();
            $imagePath = Storage::disk('public')->putFileAs('/images/blog/posts/title', $image, $imageName);
            $data['image_url'] = url('storage/'.$imagePath);
        }

        // $data['user_id'] = auth()->user()->id;

        $post->update($data);
        $post->tags()->toggle($tags);
        return response()->json(['message'=>'Post updated!']);
    }

    public function delete(Post $post){
        $post->delete();
        return response()->json(['message'=>'Post deleted!']);
    }
}
