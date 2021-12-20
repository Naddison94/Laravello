<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 ">
                    <div class="grid grid-cols-2 ">
                        <h3 class="text-lg font-semibold">Metrics</h3>
                        <h3 class="text-lg font-semibold">Users</h3>
                    </div>
                    <div class="flex justify-left items-center bg-gray-50 rounded-t-xl shadow-lg">
                        <div class="grid grid-cols-2 gap-2 w-1/2 p-2">
                            <div class="bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-blue-500 font-medium group">
                              @include('components.icons.admin-dasboard.users')
                                <div class="text-right">
                                    <p class="text-2xl">#{{ $users->total() }}</p>
                                    <p>Active users</p>
                                </div>
                            </div>

                            <div class="bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-green-500 dark:border-gray-600 text-green-500 font-medium group">
                                @include('components.icons.admin-dasboard.stonks')
                                <div class="text-right">
                                    @if($users->metrics)
                                        <p class="text-2xl">+{{ $users->metrics->count() }}</p>
                                    @else
                                        <p class="text-2xl">0</p>
                                    @endif
                                        <p>Users this month</p>
                                </div>
                            </div>

                            <div class="bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-blue-500 font-medium group">
                                @include('components.icons.admin-dasboard.users')
                                <div class="text-right">
                                    <p class="text-2xl">#{{ $posts->count() }}</p>
                                    <p>Active posts</p>
                                </div>
                            </div>

                            <div class="bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-green-500 dark:border-gray-600 text-green-500 font-medium group">
                                @include('components.icons.admin-dasboard.stonks')
                                <div class="text-right">
                                    @if($posts->metrics)
                                        <p class="text-2xl">+{{ $posts->metrics->count() }}</p>
                                    @else
                                        <p class="text-2xl">0</p>
                                    @endif
                                        <p>Posts this month</p>
                                </div>
                            </div>

                            <div class="bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-blue-500 font-medium group">
                                @include('components.icons.admin-dasboard.users')
                                <div class="text-right">
                                    <p class="text-2xl">#{{ $comments->count() }}</p>
                                    <p>Active comments</p>
                                </div>
                            </div>

                            <div class="bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-green-500 dark:border-gray-600 text-green-500 font-medium group">
                                @include('components.icons.admin-dasboard.stonks')
                                <div class="text-right">
                                    @if($comments->metrics)
                                        <p class="text-2xl">+{{ $comments->metrics->count() }}</p>
                                    @else
                                        <p class="text-2xl">0</p>
                                    @endif
                                        <p>Comments this month</p>
                                </div>
                            </div>

                            <div class="bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-blue-500 font-medium group">
                                @include('components.icons.admin-dasboard.users')
                                <div class="text-right">
                                    <p class="text-2xl">#{{ $tasks->count() }}</p>
                                    <p>Active tasks</p>
                                </div>
                            </div>

                            <div class="bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-green-500 dark:border-gray-600 text-green-500 font-medium group">
                                @include('components.icons.admin-dasboard.stonks')
                                <div class="text-right">
                                    @if($tasks->metrics)
                                        <p class="text-2xl">+{{ $tasks->metrics->count() }}</p>
                                    @else
                                        <p class="text-2xl">0</p>
                                    @endif
                                        <p>Tasks this month</p>
                                </div>
                            </div>
                        </div>

                        <div class="mr-2 w-1/2 shadow-lg rounded-xl">
                            <div class="mr-2 w-full overflow-hidden rounded-lg">
                                <div class="w-full overflow-x-auto ">
                                    <table class="w-full">
                                        <thead>
                                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                            <th class="px-4 py-3">User</th>
                                            <th class="px-4 py-3">Email</th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                        @foreach($users as $user)
                                        <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3">
                                                <div class="flex items-center text-sm">
                                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                        <img class="object-cover w-full h-full rounded-full" src="{{ getUserAvatar($user) }}" alt="" loading="lazy" />
                                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold">{{ $user->name }}</p>
                                                        <p class="text-xs text-gray-600 dark:text-gray-400">Last active: {{ \Carbon\Carbon::parse($user->last_active)->diffForHumans() }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 text-sm">{{ $user->email }}</td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="w-full px-4 py-3 text-xs text-gray-500 border-t bg-gray-50 sm:grid-cols-9">
                                    {{ $users->links() }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 shadow-lg md:grid-cols-2 xl:grid-cols-3 bg-gray-50 p-4 gap-4 text-black dark:text-white">
                        <div class="md:col-span-2 xl:col-span-3">
                            <h3 class="text-lg font-semibold">Project Management</h3>
                        </div>
                    @include('components.admin.pending-task-table')
                    @include('components.admin.in-progress-task-table')
                    @include('components.admin.completed-task-table')
                    </div>

                    <div class="relative flex flex-col min-w-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
                        <div class="rounded-t mb-0 px-0 border-0">
                            <div class="flex flex-wrap items-center px-4 py-2">
                                <div class="relative w-full max-w-full flex-grow flex-1">
                                    <h3 class="font-semibold text-base text-gray-900 dark:text-gray-50">Recent Activities</h3>
                                </div>
                                <div class="relative w-full max-w-full flex-grow flex-1 text-right">
                                    <button class="bg-blue-500 dark:bg-gray-100 text-white active:bg-blue-600 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">See all</button>
                                </div>
                            </div>
                            <div class="block w-full">
                                <div class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Today
                                </div>
                                <ul class="my-1">
                                    <li class="flex px-4">
                                        <div class="w-9 h-9 rounded-full flex-shrink-0 bg-indigo-500 my-2 mr-3">
                                            <svg class="w-9 h-9 fill-current text-indigo-50" viewBox="0 0 36 36"><path d="M18 10c-4.4 0-8 3.1-8 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L18.9 22H18c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z"></path></svg>
                                        </div>
                                        <div class="flex-grow flex items-center border-b border-gray-100 dark:border-gray-400 text-sm text-gray-600 dark:text-gray-100 py-2">
                                            <div class="flex-grow flex justify-between items-center">
                                                <div class="self-center">
                                                    <a class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-50 dark:hover:text-gray-100" href="#0" style="outline: none;">Nick Mark</a> mentioned <a class="font-medium text-gray-800 dark:text-gray-50 dark:hover:text-gray-100" href="#0" style="outline: none;">Sara Smith</a> in a new post
                                                </div>
                                                <div class="flex-shrink-0 ml-2">
                                                    <a class="flex items-center font-medium text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-500" href="#0" style="outline: none;">
                                                        View<span><svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" class="transform transition-transform duration-500 ease-in-out"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="flex px-4">
                                        <div class="w-9 h-9 rounded-full flex-shrink-0 bg-red-500 my-2 mr-3">
                                            <svg class="w-9 h-9 fill-current text-red-50" viewBox="0 0 36 36"><path d="M25 24H11a1 1 0 01-1-1v-5h2v4h12v-4h2v5a1 1 0 01-1 1zM14 13h8v2h-8z"></path></svg>
                                        </div>
                                        <div class="flex-grow flex items-center border-gray-100 text-sm text-gray-600 dark:text-gray-50 py-2">
                                            <div class="flex-grow flex justify-between items-center">
                                                <div class="self-center">
                                                    The post <a class="font-medium text-gray-800 dark:text-gray-50 dark:hover:text-gray-100" href="#0" style="outline: none;">Post Name</a> was removed by <a class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-50 dark:hover:text-gray-100" href="#0" style="outline: none;">Nick Mark</a>
                                                </div>
                                                <div class="flex-shrink-0 ml-2">
                                                    <a class="flex items-center font-medium text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-500" href="#0" style="outline: none;">
                                                        View<span><svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" class="transform transition-transform duration-500 ease-in-out"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Yesterday
                                </div>
                                <ul class="my-1">
                                    <li class="flex px-4">
                                        <div class="w-9 h-9 rounded-full flex-shrink-0 bg-green-500 my-2 mr-3">
                                            <svg class="w-9 h-9 fill-current text-light-blue-50" viewBox="0 0 36 36"><path d="M23 11v2.085c-2.841.401-4.41 2.462-5.8 4.315-1.449 1.932-2.7 3.6-5.2 3.6h-1v2h1c3.5 0 5.253-2.338 6.8-4.4 1.449-1.932 2.7-3.6 5.2-3.6h3l-4-4zM15.406 16.455c.066-.087.125-.162.194-.254.314-.419.656-.872 1.033-1.33C15.475 13.802 14.038 13 12 13h-1v2h1c1.471 0 2.505.586 3.406 1.455zM24 21c-1.471 0-2.505-.586-3.406-1.455-.066.087-.125.162-.194.254-.316.422-.656.873-1.028 1.328.959.878 2.108 1.573 3.628 1.788V25l4-4h-3z"></path></svg>
                                        </div>
                                        <div class="flex-grow flex items-center border-gray-100 text-sm text-gray-600 dark:text-gray-50 py-2">
                                            <div class="flex-grow flex justify-between items-center">
                                                <div class="self-center">
                                                    <a class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-50 dark:hover:text-gray-100" href="#0" style="outline: none;">240+</a> users have subscribed to <a class="font-medium text-gray-800 dark:text-gray-50 dark:hover:text-gray-100" href="#0" style="outline: none;">Newsletter #1</a>
                                                </div>
                                                <div class="flex-shrink-0 ml-2">
                                                    <a class="flex items-center font-medium text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-500" href="#0" style="outline: none;">
                                                        View<span><svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" class="transform transition-transform duration-500 ease-in-out"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

