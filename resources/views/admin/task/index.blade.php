<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 ">
                    <a class="no-underline hover:underline" href="{{ route('admin.task.index') }}"><h3 class="text-lg font-semibold">Project Management</h3></a>
                        @include('components.admin.task.detailed-task-table')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

