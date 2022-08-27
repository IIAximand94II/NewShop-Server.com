<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{

    public function store(ImageRequest $request){
        $data = $request->validated();

        $imageName = md5(Carbon::now().'_'.$data['image']->getClientOriginalName()).'.'.$data['image']->getClientOriginalExtension();
        $imagePath = Storage::disk('public')->putFileAs('/images/blog/posts/content', $data['image'], $imageName);
        $imageUrl = url('storage/'.$imagePath);

        //dd(url('storage/'.$imagePath));
        return response()->json(['url'=>$imageUrl]);
    }

}
