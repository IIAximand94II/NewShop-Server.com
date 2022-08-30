<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'parent_id' => $this->parent_id,
            'author' => UserResource::collection($this->user),
            'content' => $this->content,
            'children' => $this->children,
            'create' => $this->created_at,
        ];
    }
}