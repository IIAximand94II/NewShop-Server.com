<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
            'user' => $this->user->first()->first_name.' '.$this->user->first()->last_name,
            'user_avatar' => $this->user->first()->avatar,
            'content' => $this->content,
            'grade' => $this->grade,
            'date' => $this->created_at,
        ];
    }
}
