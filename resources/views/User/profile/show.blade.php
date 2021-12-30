<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>


    <div class="py-12 bg-gray-100 flex flex-wrap items-center justify-center">
        <div class="container lg:w-2/6 xl:w-2/7 sm:w-full md:w-2/3 bg-white  shadow-lg transform duration-200 easy-in-out">
            <div class=" h-32 overflow-hidden" >
                <img class="w-full" src="https://images.unsplash.com/photo-1605379399642-870262d3d051?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2000&q=80" alt="" />
            </div>
            <div class="flex justify-center px-5  -mt-12">
                @if(isOwner($user->id))
                    <a href="{{ route ('user.profile.edit', ['id' => $user->id]) }}"><img class="h-32 w-32 bg-white p-2 rounded-full" src="{{ getUserAvatar($user) }}" alt="avatar"/></a>
                @else
                    <img class="h-32 w-32 bg-white p-2 rounded-full" src="{{ getUserAvatar($user) }}" alt="avatar"/>
                @endif
            </div>
            <div>
                <div class="text-center px-14">
                    <h2 class="inline-block text-gray-800 text-3xl font-bold">{{ $user->name }}</h2>

                    @if(Auth::id() != $user->id)
                        @if(!Auth::user()->isFriend($user->id))
                            <a href="{{ route('user.friend.create', ['owner_user_id' => Auth::id(), 'friend_user_id' => $user->id]) }}">
                                <button class="justify-center focus:outline-none space-between bg-green-700 font-medium p-2 rounded inline-flex items-center">
                                    <svg class="w-4 h-4" fill='#FFF' stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="white"><path d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                                </button>
                            </a>
                        @else
                            <a href="{{ route('user.friend.delete', ['owner_user_id' => Auth::id(), 'friend_user_id' => $user->id]) }}">
                                <button class="justify-center focus:outline-none space-between bg-red-700 font-medium p-2 rounded inline-flex items-center">
                                    <svg class="w-4 h-4" fill='#FFF' stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="white"><path d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                                </button>
                            </a>
                        @endif()
                    @endif
                    <p class="text-gray-400 mt-2">Last active: {{ \Carbon\Carbon::parse($user->last_active)->diffForHumans() }}</p>
                    <p class="mt-2 text-gray-600">{{ $user->bio }}</p>
                </div>
                <hr class="mt-6"/>
                <div class="flex  bg-gray-50 ">
                    <div class="text-center w-1/2 p-4 hover:bg-gray-100 cursor-pointer">
                        <p><span class="font-semibold">{{ $user->posts_count }}</span> Posts</p>
                    </div>
                    <div class="border"></div>
                    <div class="text-center w-1/2 p-4 hover:bg-gray-100 cursor-pointer">
                        <p> <span class="font-semibold">{{ $user->comments_count }} </span> Comments</p>
                    </div>
                    <div class="border"></div>
                    <div class="text-center w-1/2 p-4 hover:bg-gray-100 cursor-pointer">
                        <a href="{{ route('user.friend.index', ['owner_user_id' => $user->id]) }}">
                            <p><span class="font-semibold">{{ $user->friends_count }}</span> Friends</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

