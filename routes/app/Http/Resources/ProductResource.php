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
        $productGroup = Product::where('group_id', $this->group_id)->get();

        return [
            'id' => $this->id,
            'group' => ProductGroupResource::collection($productGroup),
            'group_id' => $this->group_id,
            'title' => $this->title,
            'slug' => $this->slug,
            'excerpt' => substr($this->description, 0, 130).'...',
            'description' => $this->description,
            'title_image' => url('storage/'.$this->title_image),
            'preview_image' => url('storage/'.$this->preview_image),
            'color' => new ColorResource($this->color),
            'available_sizes' => $this->sizes,
            //'sizes' => $this->sizes->groupBy('id'),
            'sizes' => $this->uniqueSizes,
            'amount' => $this->sizes->count(),
            'gallery' => ImageResource::collection($this->gallery),
            'tags' => $this->tags,
            'gender' => $this->gender,
            'price' => $this->price,
            'status' => $this->status,
            'rating' => '',
            'hit' => $this->hit,
            'sale' => $this->sale,
            'date' => $this->created_at,
            'reviews' => ReviewResource::collection($this->group->reviews),

        ];
    }
}
