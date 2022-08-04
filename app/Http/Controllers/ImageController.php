<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use Illuminate\Http\Request;

class ImageController extends Controller
{

    public function store(Request $request){
//        $image = $request->file('file');
//        $imageName = time().'_'.$image->extension();
//        $image->move(public_path('images'), $imageName);
        //dump(1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111);
        return response()->json(['success'=>'uploaded']);
    }

}
