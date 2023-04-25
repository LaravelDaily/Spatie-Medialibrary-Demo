<?php

namespace App\Http\Controllers;

use App\Models\MediaHolder;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostMediaController extends Controller
{
    public function create()
    {
        $posts = Post::pluck('title', 'id');

        return view('postMedia.create', compact('posts'));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'image' => ['required', 'image'],
            'posts' => ['required', 'array'],
            'posts.*' => ['required', 'exists:posts,id']
        ]);

        $media = MediaHolder::create();
        $media->addMedia($request->file('image'))->toMediaCollection();

        $media->posts()->sync($request->input('posts'));

        return redirect()->route('posts.index');
    }
}
