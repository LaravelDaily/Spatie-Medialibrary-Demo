<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostCollection;
use App\Models\Post;

class PostController extends Controller
{
    public function index(): PostCollection
    {
        return new PostCollection(
            Post::query()
                ->with('media')
                ->get()
        );
    }
}
