<div class="card border w-96 hover:shadow-lg relative flex flex-col mx-auto">
    <div class="h-24 overflow-hidden" >
        <img class="w-full top-0" src="{{ getUserBanner($friend->user) }}" alt="banner" />
    </div>

    <div class="flex px-5 -mt-12">
        <img class="w-28 h-28 p-1 bg-white rounded-full" src="{{ getUserAvatar($friend->user) }}" alt=""/>
        <div class="title mt-11 ml-3 pt-1.5  flex flex-col">
            <div class="font-bold break-words">{{ $friend->user->name }}</div>
            <p class="text-gray-400">Last active: {{ \Carbon\Carbon::parse($friend->user->last_active)->diffForHumans() }}</p>
        </div>
    </div>
</div>
