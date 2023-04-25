<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create new Post Media') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('media.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="p-4">
                        <div class="flex flex-col">
                            <label for="image" class="text-gray-700">Image</label>
                            <input type="file" name="image" id="image"
                                   class="border rounded-md p-2 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        </div>
                        @error('image')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="p-4 flex flex-row justify-around space-x-4">
                        @foreach($posts as $id => $title)
                            <div class="">
                                <label for="post-{{ $id }}">
                                    <input type="checkbox" name="posts[]" id="post-{{ $id }}"
                                           value="{{ $id }}">
                                    {{ $title }}
                                </label>
                            </div>
                        @endforeach
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
