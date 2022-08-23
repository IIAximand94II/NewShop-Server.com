<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Http\Resources\Admin\TagResource;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(){
        $tags = Tag::all();
        return TagResource::collection($tags);
    }

    public function create(){
        return view('tag.create');
    }

    public function store(TagRequest $request){
        $data = $request->validated();
        //dd($data);
        Tag::firstOrCreate($data);
        return redirect()->route('tag.index');
    }

    public function show(Tag $tag){
        return view('tag.show', compact('tag'));
    }

    public function edit(Tag $tag){
        return view('tag.edit', compact('tag'));
    }

    public function update(TagRequest $request, Tag $tag){
        $data = $request->validated();
        //dd($data);
        $tag->update($data);
        return view('tag.show', compact('tag'));
    }

    public function delete(Tag $tag){
        $tag->delete();
        return redirect()->route('tag.index');
    }
}
