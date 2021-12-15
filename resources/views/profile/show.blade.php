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
                        @include('components.profile-card')
                    </div>
                </div>
            </div>
        </div>

    @isset($posts)
        <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="flex justify-center items-center">
                        <div class="p-6 bg-white border-b border-gray-200">
                            My Posts
                            <div x-data="{ open: false }">
                                <button x-on:click="open = ! open">Toggle Dropdown</button>
                                <div x-show="open">
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
                </div>
            </div>
        </div>
    @endisset
</x-app-layout>

