<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @foreach($posts as $post)
            <div class="flex justify-center">
                @include('components.post-card-v2')
            </div>

        @endforeach
        {{ $posts->links() }}
    </div>
</x-app-layout>

