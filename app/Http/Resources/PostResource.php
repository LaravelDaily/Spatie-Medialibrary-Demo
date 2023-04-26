<?php

namespace App\Http\Resources;

use App\Http\Resources\Media\MediaCollection;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Post */
class PostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'post_text' => $this->post_text,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'media_count' => $this->media_count,
            'media' => $this->whenLoaded('media', new MediaCollection($this->media)),
        ];
    }
}
