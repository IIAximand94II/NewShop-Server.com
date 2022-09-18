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
            'title' => $this->title,
            //'excerpt' => substr($this->description, 0, 130).'...',
            'title_image' => url('storage/'.$this->title_image),
            'preview_image' => url('storage/'.$this->preview_image),
            'color' => $this->color,
            //'sizes' => $this->uniqueSizes,
            'gallery' => $this->gallery,
            'price' => $this->price,
            'sale' => $this->sale,
        ];
    }
}
