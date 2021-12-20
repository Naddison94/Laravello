<div class="md:col-span-2 xl:col-span-1">
    <div class="rounded bg-gray-200 p-3">
        <div class="flex justify-between py-1 text-black">
            <h3 class="text-sm font-semibold">Pending</h3>
            <svg class="h-4 fill-current text-gray-600 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5 10a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4z" /></svg>
        </div>

        <div class="text-sm text-black mt-2">
            <table class="table-fixed w-full">
                <thead>
                <tr class="text-xs font-semibold tracking-wide text-gray-500 uppercase border-b bg-gray-50">
                    <th style="width:50%" class="px-4 py-3">Title</th>
                    <th style="width:20%" class="px-4 py-3">Priority</th>
                    <th style="width:30%" class="px-4 py-3">Category</th>
                </tr>
                </thead>

                @forelse($tasks->pending as $task)
                    <tr class="bg-white hover:bg-gray-100 text-gray-700 border-b">
                        <td style="width:50%" class="text-center text-sm font-semibold tracking-wide">
                            {{ $task->title }}
                        </td>
                        <td style="width:20%" class="text-center text-xs font-semibold tracking-wide ">
                            {{ $task->priority->title }}
                        </td>
                        <td style="width:30%" class="text-center text-xs font-semibold tracking-wide">
                            {{ $task->category->title }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">
                            <div class="flex justify-center bg-white p-2 rounded mt-1 hover:bg-gray-50 border-b border-gray-100 cursor-pointer">
                                -
                            </div>
                        </td>
                    </tr>
                @endforelse
                <tr>
                    <td colspan="3">
                        @if($tasks->pending->count() > 8)
                            <div class="center w-full px-4 py-3 text-xs text-gray-500 border-t bg-gray-50">
                                {{ $tasks->pending->links() }}
                            </div>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
