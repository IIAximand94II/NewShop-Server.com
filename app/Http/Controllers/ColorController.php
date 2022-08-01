<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColorRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index(){
        return view('color.index');
    }

    public function create(){
        return view('color.create');
    }

    public function store(ColorRequest $request){
        $data = $request->validated();
        dd($data);
        //Color::firstOrCreate($data);
        //return view('color.index');
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
