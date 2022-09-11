<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'email' => $this->email,
            'login' => $this->login,
            'full_name' => "$this->first_name $this->last_name",
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'birth_date' => $this->birth_date,
            'avatar' => $this->avatar,
            'phone' => $this->phone,
            'gender' => $this->gender,
            'register_date' => $this->created_at,
            'wishlist' => $this->wishlist,
            'reviews' => ReviewResource::collection($this->reviews),
            'comments' => CommentResource::collection($this->comments),
            'addresses' => UserAddressResource::collection($this->addresses),
        ];
    }
}
