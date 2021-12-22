<div class="flex bg-gray-100">
    <div class="w-full mx-auto">
        <div class="px-4 mx-auto">
            <div class="min-w-full my-4 overflow-x-auto border rounded-md shadow-sm">
                <table class="min-w-full bg-white rounded whitespace-nowrap">
                    <thead class="border-b bg-gray-50">
                    <tr class="">
                        <th class="px-3 py-3 text-xs font-normal text-gray-500 uppercase align-middle">Title</th>
                        <th class="px-3 py-3 text-xs font-normal text-gray-500 uppercase align-middle">Body</th>
                        <th class="px-3 py-3 text-xs font-normal text-gray-500 uppercase align-middle">Category</th>
                        <th class="px-3 py-3 text-xs font-normal text-gray-500 uppercase align-middle">Status</th>
                        <th class="px-3 py-3 text-xs font-normal text-gray-500 uppercase align-middle">Created_at</th>
                        <th class="px-3 py-3 text-xs font-normal text-gray-500 uppercase align-middle">Actions</th>
                    </tr>
                    </thead>
                    @foreach($tasks as $task)
                        <tbody class="text-sm bg-white divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50">
                            <td class="px-3 py-4 text-gray-500 text-center">{{ $task->title }}</td>
                            <td class="px-3 py-4 text-gray-500 text-center">{{ $task->body }}</td>
                            <td class="px-3 py-4 text-gray-500 text-center">{{ $task->category->title }}</td>
                            <td class="px-3 py-4 text-center">
                            @switch($task->status_id)
                                @case($task->status_id === 1)
                                    <span class="px-4 py-1 text-sm text-yellow-500 rounded-full bg-yellow-50">Pending</span>
                                    @break
                                @case($task->status_id === 2)
                                    <span class="px-4 py-1 text-sm text-blue-500 rounded-full bg-blue-50">In progress</span>
                                    @break
                                @case($task->status_id === 3)
                                    <span class="px-4 py-1 text-sm text-green-500 rounded-full bg-green-50">Completed</span>
                                    @break
                            @endswitch
                            </td>
                            <td class="px-3 py-4 text-center text-gray-500 ">{{ $task->created_at->diffForHumans() }}</td>
                            <td class="w-20 px-3 py-2 text-center text-gray-500 ">
                                <div class="flex place-content-center">
                                    <a href="#">
                                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    @endforeach

                    <tr>
                        <td colspan="6">
                            <div class="center w-full px-4 py-3 text-xs text-gray-500 border-t bg-gray-50">
                                {{ $tasks->links() }}
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
