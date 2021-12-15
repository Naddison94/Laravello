<div class="w-full bg-white p-2 pt-4 rounded shadow-lg">
    <div class="flex ml-3">
        <div class="mr-3">
            <img src="http://picsum.photos/50" alt="" class="rounded-full">
        </div>
        <div>
            <h1 class="font-semibold">{{ Auth::user()->name }}</h1>
            <p class="text-xs text-gray-500">Leave a comment</p>
        </div>

    </div>

    <div class="mt-3 p-3 w-full">
        <textarea rows="5" class="border p-2 rounded w-full" placeholder="Write something..."></textarea>
    </div>

    <div class="flex justify-between mx-3">
        <div>
            <button class="px-4 py-1 bg-gray-800 text-white rounded font-light hover:bg-gray-700">Submit</button>
        </div>
    </div>
    <div class="lg:mb-4 lg:px-4 p-4">
        <article class="overflow-hidden rounded-lg shadow-lg  bg-white">
            <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                Comments
            </header>

            <div class="flex justify-center">
                @foreach($post->comments as $comment)
                    {{ $comment->comment }}
                @endforeach
            </div>
        </article>
    </div>
</div>
