<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductGroupResource extends JsonResource
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
            'gallery' => ImageResource::collection($this->gallery),
            'color' => ColorResource::collection($this->color),
            'sizes' => $this->uniqueSizes,
            'available_sizes' => $this->sizes,
            'price' => $this->price,
            'amount' => $this->sizes->count(),
            'quantity' => $this->quantity,
        ];
    }
}
