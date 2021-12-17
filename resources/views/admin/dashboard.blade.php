<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Admin Dashboard') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="grid grid-cols-2">
                    <h3 class="text-lg font-semibold">Metrics</h3>
                    <h3 class="text-lg font-semibold">Users</h3>
                </div>
                <div class="flex justify-left items-center bg-gray-200 rounded-xl">
                    <div class="grid grid-cols-2 gap-2 w-1/2 p-2">
                        <div class="bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-blue-500 font-medium group">
                          @include('components.icons.admin-dasboard.users')
                            <div class="text-right">
                                <p class="text-2xl">{{ $users->total() }}</p>
                                <p>Active users</p>
                            </div>
                        </div>

                        <div class="bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-green-500 dark:border-gray-600 text-green-500 font-medium group">
                            @include('components.icons.admin-dasboard.stonks')
                            <div class="text-right">
                                @if($users->metrics)
                                    <p class="text-2xl">{{ $users->metrics->count() }}</p>
                                @else
                                    <p class="text-2xl">0</p>
                                @endif
                                    <p>Users this month</p>
                            </div>
                        </div>

                        <div class="bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-blue-500 font-medium group">
                            @include('components.icons.admin-dasboard.users')
                            <div class="text-right">
                                <p class="text-2xl">{{ $posts->count() }}</p>
                                <p>Active posts</p>
                            </div>
                        </div>

                        <div class="bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-green-500 dark:border-gray-600 text-green-500 font-medium group">
                            @include('components.icons.admin-dasboard.stonks')
                            <div class="text-right">
                                @if($posts->metrics)
                                    <p class="text-2xl">{{ $posts->metrics->count() }}</p>
                                @else
                                    <p class="text-2xl">0</p>
                                @endif
                                    <p>Posts this month</p>
                            </div>
                        </div>

                        <div class="bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-blue-500 font-medium group">
                            @include('components.icons.admin-dasboard.users')
                            <div class="text-right">
                                <p class="text-2xl">{{ $comments->count() }}</p>
                                <p>Active comments</p>
                            </div>
                        </div>

                        <div class="bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-green-500 dark:border-gray-600 text-green-500 font-medium group">
                            @include('components.icons.admin-dasboard.stonks')
                            <div class="text-right">
                                @if($comments->metrics)
                                    <p class="text-2xl">{{ $comments->metrics->count() }}</p>
                                @else
                                    <p class="text-2xl">0</p>
                                @endif
                                    <p>Comments this month</p>
                            </div>
                        </div>

                        <div class="bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-blue-500 font-medium group">
                            @include('components.icons.admin-dasboard.users')
                            <div class="text-right">
                                <p class="text-2xl">{{ $tasks->count() }}</p>
                                <p>Active tasks</p>
                            </div>
                        </div>

                        <div class="bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-green-500 dark:border-gray-600 text-green-500 font-medium group">
                            @include('components.icons.admin-dasboard.stonks')
                            <div class="text-right">
                                @if($tasks->metrics)
                                    <p class="text-2xl">{{ $tasks->metrics->count() }}</p>
                                @else
                                    <p class="text-2xl">0</p>
                                @endif
                                    <p>Tasks this month</p>
                            </div>
                        </div>
                    </div>

                    <div class="mr-2 mb-2 w-1/2">
                        <div class="w-full overflow-hidden rounded-lg shadow-xs">
                            <div class="w-full overflow-x-auto">
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

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 p-4 gap-4 text-black dark:text-white">
                    <div class="md:col-span-2 xl:col-span-3">
                        <h3 class="text-lg font-semibold">Project Management</h3>
                    </div>
                    <div class="md:col-span-2 xl:col-span-1">
                        <div class="rounded bg-gray-200 dark:bg-gray-800 p-3">
                            <div class="flex justify-between py-1 text-black dark:text-white">
                                <h3 class="text-sm font-semibold">Pending</h3>
                                <svg class="h-4 fill-current text-gray-600 dark:text-gray-500 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5 10a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4z" /></svg>
                            </div>
                            <div class="text-sm text-black dark:text-gray-50 mt-2">
                                @foreach($tasks as $task)
                                    @if($task->status_id === 1)
                                       <div class="bg-white dark:bg-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 p-2 rounded mt-1 border-b border-gray-100 dark:border-gray-900 cursor-pointer">
                                           {{ $task->title }}
                                           <span class="text-xs text-gray-600 dark:text-gray-400 float-right">{{ $task->category->title }}</span>
                                       </div>
                                    @endif
                                @endforeach
                                <div class="mt-3">
                                    <a class="no-underline hover:underline text-gray-600" href="#"><label class="text-gray-600">Add new</label></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-2 xl:col-span-1">
                        <div class="rounded bg-gray-200 dark:bg-gray-800 p-3">
                            <div class="flex justify-between py-1 text-black dark:text-white">
                                <h3 class="text-sm font-semibold">Pending</h3>
                                <svg class="h-4 fill-current text-gray-600 dark:text-gray-500 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5 10a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4z" /></svg>
                            </div>
                            <div class="text-sm text-black dark:text-gray-50 mt-2">
                                @foreach($tasks as $task)
                                    @if($task->status_id === 2)
                                        <div class="bg-white dark:bg-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 p-2 rounded mt-1 border-b border-gray-100 dark:border-gray-900 cursor-pointer">
                                            {{ $task->title }}
                                            <span class=" text-xs text-gray-600 dark:text-gray-400 float-right">{{ $task->category->title }}</span>
                                        </div>
                                    @endif
                                @endforeach
                                <div class="mt-3">
                                    <a class="no-underline hover:underline text-gray-600" href="#"><label class="text-gray-600">Add new</label></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-2 xl:col-span-1">
                        <div class="rounded bg-gray-200 dark:bg-gray-800 p-3">
                            <div class="flex justify-between py-1 text-black dark:text-white">
                                <h3 class="text-sm font-semibold">Completed</h3>
                                <svg class="h-4 fill-current text-gray-600 dark:text-gray-500 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5 10a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4z" /></svg>
                            </div>
                            <div class="text-sm text-black dark:text-gray-50 mt-2">
                                @foreach($tasks as $task)
                                    @if($task->status_id === 3)
                                        <div class="bg-white dark:bg-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 p-2 rounded mt-1 border-b border-gray-100 dark:border-gray-900 cursor-pointer">
                                            {{ $task->title }}
                                            <span class="text-xs text-gray-600 dark:text-gray-400 float-right">{{ $task->category->title }}</span>
                                        </div>
                                    @endif
                                @endforeach
                                <div class="mt-3">
                                    <a class="no-underline hover:underline text-gray-600" href="#"><label class="text-gray-600">Add new</label></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>

