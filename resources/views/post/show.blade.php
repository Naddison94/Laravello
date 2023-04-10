<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center items-center">
                <div class="container mx-auto">
                    <div class="flex justify-left">
                        <div class="h-screen sticky top-3">
                            @include('components.post-card-v2')
                        </div>

                        <div class="flex justify-right w-2/3">
                            @include('components.post-comments-card')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

