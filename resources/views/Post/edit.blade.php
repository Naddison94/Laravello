<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit your post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex items-center justify-center mt-1">
                            <x-input placeholder="Title" id="title" class="block mt-1 w-2/6" type="text" name="title" :value="old('title')" required autofocus />
                        </div>

                        @include('components.upload-image')

                        <div class="flex items-center justify-center mt-1">
                            <textarea class="block mt-1 w-2/6" name="body" rows="8" placeholder="Content"></textarea>
                        </div>

                        <div class="flex items-center justify-center mt-4">
                            <x-button class="ml-4">
                                {{ __('Submit') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
