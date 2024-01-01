<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'caption' => $this->caption,
            'user_id' => $this->user_id,
            'likes' => $this->likers()->count(),
            'they_liked' => $this->they_liked,
            'image' => $this->image,
            'user_name' => $this->user->name,
            'comments' => CommentResource::collection($this->comments),


        ];
    }
}
