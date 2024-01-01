<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'is_liked' => $this->is_liked,
            'is_followed' => $this->is_followed,
            'followers' => $this->followers,
            'followings' => $this->followings,
            'posts' => $this->posts,
            'avatar' => $this->avatar,
            'Posts' => PostResource::collection($this->postss),

        ];
    }
}
