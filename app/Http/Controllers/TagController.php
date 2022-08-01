<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(){
        return view('tag.index');
    }

    public function create(){
        return view('tag.create');
    }

    public function store(TagRequest $request){
        $data = $request->validated();
        dd($data);
        //Tag::firstOrCreate($data);
        //return view();
    }

    public function show(){

    }

    public function edit(){

    }

    public function update(){

    }

    public function delete(){

    }
}
