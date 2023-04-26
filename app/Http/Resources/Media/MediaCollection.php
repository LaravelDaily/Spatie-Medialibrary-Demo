<?php

namespace App\Http\Resources\Media;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/** @see \Spatie\MediaLibrary\MediaCollections\Models\Media */
class MediaCollection extends ResourceCollection
{
    public $collects = MediaResource::class;

    public function toArray(Request $request): array
    {
        return $this->collection->toArray();
    }
}
