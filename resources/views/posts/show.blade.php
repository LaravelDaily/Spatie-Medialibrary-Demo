<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Viewing: :post', ['post' => $post->title]) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4">
                    <div class="flex flex-col">
                        <label for="title" class="text-gray-700">Title</label>
                        <input type="text" name="title" id="title"
                               value="{{ old('title', $post->title) }}"
                               class="border rounded-md p-2 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                               readonly>
                    </div>
                </div>

                <div class="p-4">
                    <div class="flex flex-col">
                        <label for="post_text" class="text-gray-700">Text</label>
                        <textarea name="post_text" id="post_text" cols="30" rows="10"
                                  class="border rounded-md p-2 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                  readonly>{{ old('post_text', $post->post_text) }}</textarea>
                    </div>
                    @error('post_text')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="p-4">
                    @foreach($post->getMedia() as $media)
                        <div class="flex flex-rows space-x-4">
                            <div class="flex flex-col justify-center">
                                @if($media->order_column !== $post->getMedia()->min('order_column'))
                                    <a href="{{ route('posts.moveMedia', [$post, $media, 'up']) }}"
                                       class="text-blue-500 hover:text-blue-600 underline">Move up</a>
                                @endif
                                @if($media->order_column !== $post->getMedia()->max('order_column'))
                                    <a href="{{ route('posts.moveMedia', [$post, $media, 'down']) }}"
                                       class="text-blue-500 hover:text-blue-600 underline">Move down</a>
                                @endif
                            </div>
                            <div class="flex flex-col justify-center">
                                <span>Current position: {{ $media->order_column }}</span>
                            </div>
                            <div class="">
                                <img src="{{ $media->getUrl('thumbnail') }}" alt="{{ $media->name }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>