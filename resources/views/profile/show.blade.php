<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-200 dark:bg-gray-800 flex flex-wrap items-center justify-center">
        <div class="container lg:w-2/6 xl:w-2/7 sm:w-full md:w-2/3 bg-white  shadow-lg transform duration-200 easy-in-out">
            <div class=" h-32 overflow-hidden" >
                <img class="w-full" src="https://images.unsplash.com/photo-1605379399642-870262d3d051?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2000&q=80" alt="" />
            </div>
            <div class="flex justify-center px-5  -mt-12">
                <a href="{{ route ('profile.edit', ['id' => $user->id]) }}"><img class="h-32 w-32 bg-white p-2 rounded-full" src="{{ getUserAvatar($user) }}" alt="avatar"/></a>
            </div>
            <div>
                <div class="text-center px-14">
                    <h2 class="text-gray-800 text-3xl font-bold">{{ $user->name }}</h2>
                    <p class="text-gray-400 mt-2">Last active: {{ \Carbon\Carbon::parse($user->last_active)->diffForHumans() }}</p>
                    <p class="mt-2 text-gray-600">{{ $user->bio }}</p>
                </div>
                <hr class="mt-6" />
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
                        <p> <span class="font-semibold">{{ $user->friends_count }}</span> Friends</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

