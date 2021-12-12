<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center items-center">
                <div class="container mx-auto">
                        @foreach($posts as $post)
                        <div class="flex justify-center">
                            @include('components.post-card')
                        </div>
                        @endforeach

                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

