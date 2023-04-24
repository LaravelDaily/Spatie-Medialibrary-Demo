<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['media'])->paginate(10);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->validated());

        if ($request->hasFile('images')) {
            foreach ($request->file('images', []) as $image) {
                $post->addMedia($image)->toMediaCollection();
            }
        } else {
            // Adding default image
            $post->addMedia(storage_path('defaults/defaultPostImage.png'))->preservingOriginal()->toMediaCollection();
        }

        return redirect()->route('posts.index');
    }
}
