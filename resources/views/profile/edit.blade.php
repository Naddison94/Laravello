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
                            <img class="w-auto rounded-t-xl" src="{{  $user->avatar ? '/user/' . $user->id . '/avatar/' . $user->avatar : 'https://avatars.githubusercontent.com/u/16485031?v=4' }}" alt="avatar" />
                            <div class="text-center flex flex-col p-2">
                                <span class="text-base font-bold"> {{ $user->name }}</span>
                                <span class="text-xs italic">Software Engineer</span>
                            </div>
                        </div>

                        <div class="p-6">
                            <form action="{{ route('profile.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label>Upload a new image</label>
                                @include('components.upload-image')
                                <hr>
                                <x-button>Save</x-button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
