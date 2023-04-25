<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostMediaController extends Controller
{
    public function update(Request $request, Post $post, int $mediaID)
    {
        $this->validate($request, [
            'caption' => ['nullable', 'string', 'max:200'],
            'alt_text' => ['nullable', 'string', 'max:200'],
        ]);

        $media = $post->media()->find($mediaID);

        $media->update(['caption' => $request->input('caption')]);
        $media->setCustomProperty('alt_text', $request->input('alt_text'));
        $media->save();

        return redirect()->back();
    }
}
