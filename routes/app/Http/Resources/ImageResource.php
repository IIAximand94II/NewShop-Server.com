<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class ImageResource extends JsonResource
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
            'image' => url('storage/'.$this->image_url),
            'preview_image' => url('storage/'.$this->preview_image)
        ];
    }
}
