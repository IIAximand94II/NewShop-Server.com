<?php

namespace App\Http\Controllers;



use App\Http\Requests\ProductGroupRequest;
use App\Models\ProductGallery;
use App\Models\ProductGroup;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductGroupController extends Controller
{


    public function store(ProductGroupRequest $request){
        $data = $request->validated();
        $images = $data['gallery'];unset($data['gallery']);
//        $sizes = $data['sizes']; unset($data['sizes']);
//
//        $product = ProductGroup::firstOrCreate($data);
//        $product->sizes()->attach($sizes);

        foreach($images as $image){
            $fileName = md5(Carbon::now().'_'.$image->getClientOriginalName()).'.'.$image->getClientOriginalExtension();
            $previewName = 'preview_'.$fileName;
            $filePath = Storage::disk('public')->putFileAs('/images/products/gallery', $image,$fileName);

            Image::make($image)->fit(60, 76)->save(storage_path('app/public/images/products/gallery/'.$previewName));

            dd(url('storage/'.$filePath));
            //dd($previewPath);
//            ProductGallery::create([
//                'product_id' => $product->id,
//                'image_url' => url('storage'.$filePath),
//                'preview_url' => url('storage/images/products/gallery/'.$previewName),
//            ]);


        }

        //dd($data);

        return response()->json(['message' => 'Product created!']);
    }

    public function update(ProductGroupRequest $request){
        $data = $request->validated();
        dd($data);
    }

    public function delete(ProductGroup $product){
        dd($product);
    }
}
