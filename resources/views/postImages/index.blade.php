<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post Images') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <div class="flex flex-row justify-between">
                    @foreach($images as $image)
                        <div>
                            <h2 class="w-full text-center text-xl font-bold">{{ $image->model->title }}</h2>
                            <img src="{{ $image->getUrl() }}" alt="{{ $image->name }}" width="200"/>
                            <span class="w-full text-center block">{{ $image->name }} / {{ $image->order_column }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
