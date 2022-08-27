<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\TagRequest;
use App\Http\Resources\Admin\Blog\TagResource;
use App\Models\Blog\Tag;
use Illuminate\Http\Request;


class TagController extends Controller
{
    public function index(){
        $tags = Tag::all();
        return TagResource::collection($tags);
    }

    public function store(TagRequest $request){
        $data = $request->validated();
        $data['slug'] = strtolower(str_replace(' ', '-', $data['title']));
        $tag = Tag::firstOrCreate($data);
        return response()->json(['message' => 'Tag create!']);
    }

    public function update(TagRequest $request, Tag $tag){
        $data = $request->validated();
        $data['slug'] = strtolower(str_replace(' ', '-', $data['title']));
        $tag->update($data);
        return response()->json(['message' => 'Tag update!']);
    }

    public function delete(Tag $tag){
        $tag->delete();
        return response()->json(['message' => 'Tag delete!']);
    }
}
