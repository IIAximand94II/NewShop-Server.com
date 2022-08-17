<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //$products = ProductDetails::where('product_id', $this->id;

        return [
            'id' => $this->id,
            'title' => $this->title,
            'group' => ProductGroupResource::collection($this->group),
            'product_title' => $this->title,
            'slug' => $this->slug,
            'excerpt' => substr($this->description, 0, 130).'...',
            'description' => $this->description,
            'title_image' => url('storage/'.$this->title_image),
            'preview_image' => url('storage/'.$this->preview_image),
            'gallery' => $this->gallery,
            'category' => new CategoryResource($this->category),
            'tags' => $this->tags,
            //'colors' => $this->colors,
            'sizes' => $this->sizes,
            'gender' => $this->gender,
            'status' => $this->status,
            'price' => $this->price,
            'group_min_price' => $this->group->min('price'),
            'group_max_price' => $this->group->max('price'),
            'old_price' => $this->old_price,
            'quantity' => $this->quantity,
            'reviews' => ReviewResource::collection($this->reviews),
            'hit' => $this->hit,
            'sale' => $this->sale,
            'date' => $this->created_at,
        ];
    }
}
