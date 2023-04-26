<?php

namespace App\Http\Resources\Media;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/** @mixin Media */
class MediaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            // Fields that I use
            'uuid' => $this->uuid,
            'humanReadableSize' => $this->humanReadableSize,
            'name' => $this->name,
            'file_name' => $this->file_name,
            'mime_type' => $this->mime_type,
            'order_column' => $this->order_column,
            'urls' => [
                // Full URL to the image
                'full' => $this->getFullUrl(),
                // Each conversion with Full URL to it
                'conversions' => collect($this->generated_conversions)->map(function ($value, $key) {
                    return $this->getFullUrl($key);
                }),
                // Responsive images with Full URL to each of them
                'responsiveImages' => $this->getResponsiveImageUrls()
            ],
            'custom_properties' => $this->custom_properties,

            // Other fields you might want to add
//            'previewUrl' => $this->previewUrl,
//            'id' => $this->id,
//            'type' => $this->type,
//            'extension' => $this->extension,
//            'originalUrl' => $this->originalUrl,
//            'model_id' => $this->model_id,
//            'model_type' => $this->model_type,
//            'collection_name' => $this->collection_name,
//            'disk' => $this->disk,
//            'conversions_disk' => $this->conversions_disk,
//            'size' => $this->size,
//            'manipulations' => $this->manipulations,
//            'created_at' => $this->created_at,
//            'updated_at' => $this->updated_at,
        ];
    }
}
