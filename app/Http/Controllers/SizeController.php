<?php

namespace App\Http\Controllers;

use App\Http\Requests\SizeRequest;
use App\Http\Resources\Admin\SizeResource;
use App\Models\Size;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index(){
        $sizes = Size::all();
        return SizeResource::collection($sizes);
    }

    public function create(){
        $categories = CategoryService::run();
        return view('size.create', compact('categories'));
    }

    public function store(SizeRequest $request){
        $data = $request->validated();
        //dd($data);
        Size::firstOrCreate($data);
        return redirect()->route('size.index');
    }

    public function show(Size $size){
        return view('size.show', compact('size'));
    }

    public function edit(Size $size){
        $categories = CategoryService::run($size->category_id);
        return view('size.edit', compact('size','categories'));
    }

    public function update(SizeRequest $request,Size $size){
        $data = $request->validated();
        $size->update($data);
        return view('size.show', compact('size'));
    }

    public function delete(Size $size){
        $size->delete();
        return redirect()->route('size.index');
    }
}
