<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'category' => new CategoryResource($this->category),
            'image' => $this->image_url,
            'excerpt' => substr($this->content, 0, 450).'..',
            'content' => $this->content,
            'status' => $this->status,
            'author' => $this->author,
            'tags' => TagResource::collection($this->tags),
            'updated' => $this->updated_at,
        ];
    }
}
