<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PostImagesController extends Controller
{
    public function __invoke()
    {
        $images = Media::query()
            ->with('model')
            ->where('model_type', Post::class)
            ->orderBy('order_column')
            ->orderBy('name')
            ->get();

        return view('postImages.index', compact('images'));
    }
}
