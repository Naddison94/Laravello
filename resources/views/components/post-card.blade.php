<div class="w-60 rounded-xl flex bg-gray-200 flex-col shadow">
    <img class="w-auto rounded-t-xl" src="https://avatars.githubusercontent.com/u/16485031?v=4" alt="Card image cap">
    <div class="text-center flex flex-col p-2">
        <span>{{ $post->title }}</span>
        <p>{{ $post->excerpt }}</p>
    </div>

    <div class="text-center flex flex-col p-2">
        <a href="#">
            <span class="text-base font-bold">{{ $post->author->name }}</span>
        </a>
    </div>
</div>
