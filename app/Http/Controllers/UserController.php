<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('user.index');
    }

    public function create(){
        return view('user.create');
    }

    public function store(UserRequest $request){
        $data = $request->validated();
        dd($data);
    }

    public function show(){
        return view('user.show');
    }

    public function edit(){
        return view('user.edit');
    }

    public function update(){

    }

    public function delete(){

    }
}
