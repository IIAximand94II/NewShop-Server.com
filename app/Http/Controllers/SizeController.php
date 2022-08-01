<?php

namespace App\Http\Controllers;

use App\Http\Requests\SizeRequest;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index(){
        return view('size.index');
    }

    public function create(){
        return view('size.create');
    }

    public function store(SizeRequest $request){
        $data = $request->validated();
        dd($data);
        //Size::firstOrCreate($data);
        //return view('');
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
