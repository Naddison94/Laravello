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
                            <div class="bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 text-blue-500 font-medium group">
                              @include('components.icons.admin-dasboard.users')
                                <div class="text-right">
                                    <p class="text-2xl">#{{ $users->total() }}</p>
                                    <p>Active users</p>
                                </div>
                            </div>

                            <div class="bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-green-500 text-green-500 font-medium group">
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

                            <div class="bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 text-blue-500 font-medium group">
                                @include('components.icons.admin-dasboard.users')
                                <div class="text-right">
                                    <p class="text-2xl">#{{ $posts->count() }}</p>
                                    <p>Active posts</p>
                                </div>
                            </div>

                            <div class="bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-green-500 text-green-500 font-medium group">
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

                            <div class="bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 text-blue-500 font-medium group">
                                <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                                    <svg class="fill-current text-blue-500" viewBox="0 0 36 36"><path d="M18 10c-4.4 0-8 3.1-8 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L18.9 22H18c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z"></path></svg>
                                </div>
                                <div class="text-right">
                                    <p class="text-2xl">#{{ $comments->count() }}</p>
                                    <p>Active comments</p>
                                </div>
                            </div>

                            <div class="bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-green-500 text-green-500 font-medium group">
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

                            <div class="bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 text-blue-500 font-medium group">
                                @include('components.icons.admin-dasboard.users')
                                <div class="text-right">
                                    <p class="text-2xl">#{{ $tasks->count() }}</p>
                                    <p>Active tasks</p>
                                </div>
                            </div>

                            <div class="bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-green-500 text-green-500 font-medium group">
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
                                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                                            <th class="px-4 py-3">User</th>
                                            <th class="px-4 py-3">Email</th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y">
                                        @foreach($users as $user)
                                        <tr class="bg-gray-50 hover:bg-gray-100 text-gray-700">
                                            <td class="px-4 py-3">
                                                    <div class="flex items-center text-sm">
                                                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                            <img class="object-cover w-full h-full rounded-full" src="{{ getUserAvatar($user) }}" alt="" loading="lazy" />
                                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                                        </div>
                                                        <div>
                                                            <a href="{{ route('user.profile.show', ['id' => $user->id]) }}">
                                                                <p class="hover:underline font-semibold">{{ $user->name }}</p>
                                                            </a>
                                                            <p class="text-xs text-gray-600">Last active: {{ \Carbon\Carbon::parse($user->last_active)->diffForHumans() }}</p>
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

                    <div class="grid grid-cols-1 shadow-lg md:grid-cols-2 xl:grid-cols-3 bg-gray-50 p-4 gap-4 text-black">
                        <div class="md:col-span-2 xl:col-span-3">
                            <a class="text-lg font-semibold no-underline hover:underline" href="{{ route('admin.task.index') }}">
                              Project Management
                            </a>
                        </div>
                        @include('components.admin.dashboard.pending-task-table')
                        @include('components.admin.dashboard.in-progress-task-table')
                        @include('components.admin.dashboard.completed-task-table')
                    </div>
                    @include('components.recent-activity')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

