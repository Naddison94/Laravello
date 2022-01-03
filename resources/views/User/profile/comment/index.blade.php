<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @foreach($comments as $comment)
            @include('components.profile-comments-card')
        @endforeach
        {{ $comments->links() }}
    </div>
</x-app-layout>

