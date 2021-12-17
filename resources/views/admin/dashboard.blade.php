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
                <div class="flex justify-left items-center bg-gray-200 rounded-xl">
                    <div class="grid grid-cols-2 gap-2 w-1/2 p-2">

                        <div class="bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-blue-500 font-medium group">
                          @include('components.icons.admin-dasboard.users')
                            <div class="text-right">
                                <p class="text-2xl">{{ $activeUsersCount }}</p>
                                <p>Active users</p>
                            </div>
                        </div>

                        <div class="bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-green-500 dark:border-gray-600 text-green-500 font-medium group">
                            @include('components.icons.admin-dasboard.stonks')
                            <div class="text-right">
                                <p class="text-2xl">{{ $users->count() }}</p>
                                <p>New users {{ \Carbon\Carbon::now()->format('M') }}</p>
                            </div>
                        </div>

                        <div class="bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-blue-500 font-medium group">
                            @include('components.icons.admin-dasboard.users')
                            <div class="text-right">
                                <p class="text-2xl">{{ $users->count() }}</p>
                                <p>Active posts</p>
                            </div>
                        </div>

                        <div class="bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-green-500 dark:border-gray-600 text-green-500 font-medium group">
                            @include('components.icons.admin-dasboard.stonks')
                            <div class="text-right">
                                <p class="text-2xl">{{ $users->count() }}</p>
                                <p>New posts {{ \Carbon\Carbon::now()->format('M') }}</p>
                            </div>
                        </div>


                        <div class="bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-blue-500 font-medium group">
                            @include('components.icons.admin-dasboard.users')
                            <div class="text-right">
                                <p class="text-2xl">{{ $users->count() }}</p>
                                <p>Active comments</p>
                            </div>
                        </div>

                        <div class="bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-green-500 dark:border-gray-600 text-green-500 font-medium group">
                            @include('components.icons.admin-dasboard.stonks')
                            <div class="text-right">
                                <p class="text-2xl">{{ $users->count() }}</p>
                                <p>New comments {{ \Carbon\Carbon::now()->format('M') }}</p>
                            </div>
                        </div>

                        <div class="bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-blue-500 font-medium group">
                            @include('components.icons.admin-dasboard.users')
                            <div class="text-right">
                                <p class="text-2xl">{{ $users->count() }}</p>
                                <p>Active tasks</p>
                            </div>
                        </div>

                        <div class="bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-green-500 dark:border-gray-600 text-green-500 font-medium group">
                            @include('components.icons.admin-dasboard.stonks')
                            <div class="text-right">
                                <p class="text-2xl">{{ $users->count() }}</p>
                                <p>Completed tasks {{ \Carbon\Carbon::now()->format('M') }}</p>
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
            </div>
        </div>
    </div>
</div>
</x-app-layout>

