<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-left items-center">
                        <div class="w-48 h-64 rounded-xl bg-gray-200 flex flex-col shadow">
                            @if(Auth::id() == $user->id)
                                <a href="{{ route ('profile.edit', ['id' => $user->id]) }}">
                                    <img class="w-auto rounded-t-xl" src="{{  $user->avatar ? '/user/' . $user->id . '/avatar/' . $user->avatar : 'https://avatars.githubusercontent.com/u/16485031?v=4' }}" alt="avatar" />
                                </a>
                            @else
                                <img class="w-auto rounded-t-xl" src="{{  $user->avatar ? '/' . $user->avatar : 'https://avatars.githubusercontent.com/u/16485031?v=4' }}" alt="avatar" />
                            @endif
                            <div class="text-center flex flex-col p-2">
                                <span class="text-base font-bold"> {{ $user->name }}</span>
                                <span class="text-xs italic">Software Engineer</span>
                            </div>
                        </div>

                        <div class="p-6">
                            Last active: {{ \Carbon\Carbon::parse($user->last_active)->diffForHumans() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

