<div class="relative flex flex-col min-w-0 break-words bg-gray-50 w-full shadow-lg rounded">
    <div class="rounded-t mb-0 px-0 border-0">
        <div class="flex flex-wrap items-center px-4 py-2">
            <div class="md:col-span-2 xl:col-span-3">
                <h3 class="text-lg font-semibold">Recent Activity</h3>
            </div>
        </div>

        <div class="block w-full">
            <div class="hover:text-gray-900 px-4 bg-gray-100 text-gray-500 align-middle border border-solid border-gray-200 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                <label>Recent</label>
            </div>
            <ul class="my-1 ">
                @foreach($recentActivity as $activity)
                    <li class="flex px-4 hover:bg-gray-100">
                    @switch($activity)
                        @case($activity instanceof App\Models\User\User)
                            <div class="w-9 h-9 rounded-full flex-shrink-0 bg-green-500 my-2 mr-3">
                                <svg class="w-9 h-9 fill-current text-light-blue-50" viewBox="0 0 36 36"><path d="M23 11v2.085c-2.841.401-4.41 2.462-5.8 4.315-1.449 1.932-2.7 3.6-5.2 3.6h-1v2h1c3.5 0 5.253-2.338 6.8-4.4 1.449-1.932 2.7-3.6 5.2-3.6h3l-4-4zM15.406 16.455c.066-.087.125-.162.194-.254.314-.419.656-.872 1.033-1.33C15.475 13.802 14.038 13 12 13h-1v2h1c1.471 0 2.505.586 3.406 1.455zM24 21c-1.471 0-2.505-.586-3.406-1.455-.066.087-.125.162-.194.254-.316.422-.656.873-1.028 1.328.959.878 2.108 1.573 3.628 1.788V25l4-4h-3z"></path></svg>
                            </div>
                            <div class="flex-grow flex items-center border-b border-gray-100 text-sm text-gray-600 py-2">
                                <div class="flex-grow flex justify-between items-center">
                                    <div class="self-center">
                                        <label class="font-medium"><a class="text-green-500 decoration-green no-underline hover:underline" href="{{ route('user.profile.show', ['id' => $activity->id]) }}"><strong>{{ $activity->name }}</strong></a> registered {{ $activity->created_at->diffForHumans() }}</label>
                                    </div>
                                </div>
                            </div>
                            @break
                        @case($activity instanceof App\Models\Post\Post)
                            <div class="w-9 h-9 rounded-full flex-shrink-0 bg-red-500 my-2 mr-3">
                                <svg class="w-9 h-9 fill-current text-red-50" viewBox="0 0 36 36"><path d="M25 24H11a1 1 0 01-1-1v-5h2v4h12v-4h2v5a1 1 0 01-1 1zM14 13h8v2h-8z"></path></svg>
                            </div>

                            <div class="flex-grow flex items-center border-b border-gray-100 text-sm text-gray-600 py-2">
                                <div class="flex-grow flex justify-between items-center">
                                    <div class="self-center">
                                        <label class="font-medium text-gray-800 hover:text-gray-900"><a class="text-green-500 decoration-green no-underline hover:underline" href="{{ route('user.profile.show', ['id' => $activity->author->id]) }}"><strong>{{ $activity->author->name }}</strong></a> created the post <a class="text-red-500 decoration-red no-underline hover:underline" href="{{ route('post.show', ['id' => $activity->id]) }}"><strong>{{ $activity->title }} </strong></a> {{ $activity->created_at->diffForHumans() }}</label>
                                    </div>
                                </div>
                            </div>
                            @break
                        @case($activity instanceof App\Models\Post\Comment)
                            <div class="w-9 h-9 rounded-full flex-shrink-0 bg-indigo-500 my-2 mr-3">
                                <svg class="w-9 h-9 fill-current text-indigo-50" viewBox="0 0 36 36"><path d="M18 10c-4.4 0-8 3.1-8 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L18.9 22H18c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z"></path></svg>
                            </div>
                            <div class="flex-grow flex items-center border-b border-gray-100 text-sm text-gray-600 py-2">
                                <div class="flex-grow flex justify-between items-center">
                                    <div class="self-center">
                                        <label class="font-medium text-gray-800 hover:text-gray-900">
                                            <a class="text-green-500 decoration-green no-underline hover:underline" href="{{ route('user.profile.show', ['id' => $activity->author->id]) }}">
                                                <strong>{{ $activity->author->name }}</strong>
                                            </a>
                                            @if($activity->reply_id)
                                                replied to <a class="text-green-500 decoration-green no-underline hover:underline" href="{{ route('user.profile.show', ['id' => $activity->author->id]) }}"><strong>{{ $activity->reply->author->name }}</strong></a>'s comment <a class="text-indigo-500 no-underline hover:underline" href="#"><strong>{{ $activity->reply->comment }}</strong></a> with
                                            @else
                                                commented
                                            @endif
                                            <a class="text-indigo-500 no-underline hover:underline" href="#"><strong>{{ $activity->comment }}</strong></a> on the post
                                            <a class="text-red-500 decoration-red no-underline hover:underline" href="{{ route('post.show', ['id' => $activity->post->id]) }}">
                                                <strong>{{ $activity->post->title }}</strong>
                                            </a>
                                            {{ $activity->created_at->diffForHumans() }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            @break
                    @endswitch
                    </li>
                @endforeach
           </ul>
        </div>
    </div>
</div>
