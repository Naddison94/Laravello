<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Friends') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 items-center flex justify-center w-full">
        <div class="grid grid-cols-2 gap-2">
            @foreach($friends as $friend)
                @include('components.profile-card')
            @endforeach
            {{ $friends->links() }}
        </div>
    </div>
</x-app-layout>

