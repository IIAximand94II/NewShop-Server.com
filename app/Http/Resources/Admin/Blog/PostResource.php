<?php

namespace App\Http\Resources\Admin\Blog;

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
            'content' => $this->content,
            'status' => $this->status,
            'author' => $this->author,
            'tags' => TagResource::collection($this->tags),
            'create' => $this->created_at,
            'update' => $this->updated_at,
        ];
    }
}
