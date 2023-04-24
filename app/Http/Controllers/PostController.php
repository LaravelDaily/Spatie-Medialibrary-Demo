<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

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

        foreach ($request->file('images', []) as $image) {
            $post->addMedia($image)->toMediaCollection();
        }

        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        $post->load('media');

        return view('posts.show', compact('post'));
    }

    public function moveMedia(Post $post, Media $media, string $direction): RedirectResponse
    {
        if ($direction === 'up') {
            $mediaInFinalPosition = $post->media()->where('order_column', '<', $media->order_column)->orderBy('order_column', 'desc')->first();
        } else {
            $mediaInFinalPosition = $post->media()->where('order_column', '>', $media->order_column)->orderBy('order_column', 'asc')->first();
        }

        $currentPosition = $media->order_column;
        $media->order_column = $mediaInFinalPosition->order_column;
        $media->save();
        $mediaInFinalPosition->order_column = $currentPosition;
        $mediaInFinalPosition->save();

        return redirect()->back();
    }
}
