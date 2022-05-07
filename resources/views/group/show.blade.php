<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Group') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white flex relative shadow justify-between items-center px-8 w-full h-20">
                <div class="inline-flex">
                    Submit a post
                </div>
{{--                <div class="inline-flex">--}}
{{--                    <a href="{{ route('group.show', ['id' => $group->id]) }}">--}}
{{--                        <img alt="banner" class="overflow-hidden" src="{{ getGroupBanner($group) }}">--}}
{{--                    </a>--}}
{{--                </div>--}}
                <!-- search bar -->
                <div class="relative hidden sm:block flex-shrink flex-grow-0">
                    <input type="text" class="bg-purple-white bg-gray-100 rounded-lg border-0 p-3 w-full" placeholder="Search" style="min-width:400px;">
                    <div class="absolute top-0 right-0 p-4 pr-3 text-purple-lighter">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
                make this a component and replce others
                <!-- end search bar -->
            </div>

            <main class="grid grid-cols-1 lg:grid-cols-2 gap-6 my-12 mx-12 w-2xl container px-2 mx-auto">

                <aside class="">
                    <div class="flex flex-wrap items-center justify-center">
                        <div class="container">
                            <div class="h-32 overflow-hidden rounded" >
                                <a href="{{ route('group.show', ['id' => $group->id]) }}">
                                    <img alt="banner" src="{{ getGroupBanner($group) }}">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white shadow rounded-lg p-4">
                        <div class="flex flex-col gap-1 text-center items-center">
                            <div class="inline-flex">

                                <a href="{{ route('group.show', ['id' => $group->id]) }}">
                                    <img alt="avatar" class="w-20 h-20" src="{{ getGroupAvatar($group) }}">
                                </a>
                            </div>
                            <p class="font-semibold">{{ $group->name }}</p>
                            <div class="text-sm leading-normal text-gray-400 flex justify-center items-center">
                                {{ $group->description }}
                            </div>
                        </div>
                        <div class="flex justify-center items-center gap-2 my-3">
                            <div class="font-semibold text-center mx-4">
                                <p class="text-black">102</p>
                                <span class="text-gray-400">Posts</span>
                            </div>
                            <div class="font-semibold text-center mx-4">
                                <p class="text-black">102</p>
                                <span class="text-gray-400">Members</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white shadow mt-6  rounded-lg p-6 grid grid-cols-3">
                        <div class="grid">
                            <h3 class="text-gray-600 text-sm font-semibold mb-4">Rules</h3>
                            <ul class="flex">
                                13zxgwEG

                                <br>
                                dasdasd
                            </ul>
                        </div>

                        <div class="grid">
                            <h3 class="text-gray-600 text-sm font-semibold mb-4">Links</h3>
                            <ul class="flex">
                                1312123

                                <br>
                                123123
                            </ul>
                        </div>

                        <div class="grid">
                            <h3 class="text-gray-600 text-sm font-semibold mb-4">Roles</h3>
                            <ul class="flex">
                                blueberry

                                <br>
                                admin
                            </ul>
                        </div>

                    </div>

                    <div class="bg-white shadow mt-6  rounded-lg p-6">
                        <h3 class="text-gray-600 text-sm font-semibold mb-4">Members</h3>
                        <ul class="flex items-center justify-center space-x-2">
                            @foreach($groupUsers as $groupUser)
                                <li class="flex flex-col items-center space-y-2">

                                    <a class="flex items-center no-underline hover:underline text-black" href="{{ route ('user.profile.show', ['id' => $groupUser->user->id]) }}">
                                        <img class="block rounded-full sm:w-14 sm:h-14" src="{{ getUserAvatar($groupUser->user) }}">
                                    </a>

                                    <span class="text-xs text-gray-500">
                                        {{ $groupUser->user->name }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>

                        <a class="pt-4 hover:underline" href="#">
                            See all members
                        </a>
                    </div>

                    <div class="bg-white shadow mt-6  rounded-lg p-6">
                        <h3 class="text-gray-600 text-sm font-semibold mb-4">Badges</h3>
                        <ul class="flex items-center justify-center space-x-2">

                        </ul>

                        <a class="pt-4 hover:underline" href="#">
                            See all badges
                        </a>
                    </div>
                </aside>

                <div class="justify-center items-center w-full">
                    @foreach($posts as $post)
                        <div>
                            @include('components.post-card-v2')
                        </div>
                    @endforeach
                    {{ $posts->links() }}
                </div>
            </main>
        </div>
    </div>
</x-app-layout>

