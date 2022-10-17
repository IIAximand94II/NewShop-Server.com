<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderProductResource extends JsonResource
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
            'order_id' => $this->order_id,
            'product_info' => new ProductResource($this->product),
            //'color' => $this->color,
            //'size' => $this->size_id,
            'size' => $this->size,
            'qty' => $this->qty,
            'price' => $this->price,
            'total' => $this->total,

        ];
    }
}
