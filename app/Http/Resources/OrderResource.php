<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'products' => OrderProductResource::collection($this->product),
            //'products' => $this->products,
            'qty' => $this->qty,
            'total' => (float)$this->total,
            'address' => $this->address,
            'status' => $this->status,
            'date' => $this->created_at,
        ];
    }
}
