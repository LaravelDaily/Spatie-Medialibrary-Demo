<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create new Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="p-4">
                        <div class="flex flex-col">
                            <label for="title" class="text-gray-700">Title</label>
                            <input type="text" name="title" id="title"
                                   value="{{ old('title') }}"
                                   class="border rounded-md p-2 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        </div>
                        @error('title')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="p-4">
                        <div class="flex flex-col">
                            <label for="post_text" class="text-gray-700">Text</label>
                            <textarea name="post_text" id="post_text" cols="30" rows="10"
                                      class="border rounded-md p-2 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                                {{ old('post_text') }}
                            </textarea>
                        </div>
                        @error('post_text')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="p-4">
                        <div class="flex flex-col">
                            <label for="images" class="text-gray-700">Images</label>
                            <input type="file" name="images[]" id="images"
                                   multiple
                                   class="border rounded-md p-2 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        </div>
                        @error('images')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="p-4">
                        <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Submit') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
