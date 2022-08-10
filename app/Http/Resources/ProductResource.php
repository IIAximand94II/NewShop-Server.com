<?php

namespace App\Http\Resources;

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
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'excerpt' => substr($this->description, 0, 130).'...',
            'description' => $this->description,
            'title_image' => url('storage/'.$this->title_image),
            'preview_image' => url('storage/'.$this->preview_image),
            'gallery' => $this->gallery,
            'category' => new CategoryResource($this->category),
            'tags' => $this->tags,
            'colors' => $this->colors,
            'sizes' => $this->sizes,
            'gender' => $this->gender,
            'status' => $this->status,
            'price' => $this->price,
            'old_price' => $this->old_price,
            'quantity' => $this->quantity,
            'reviews' => ReviewResource::collection($this->reviews),
            'hit' => $this->hit,
            'sale' => $this->sale,
            'date' => $this->created_at,
        ];
    }
}
