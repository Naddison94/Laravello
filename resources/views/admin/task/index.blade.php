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
                    <a class="text-lg font-semibold no-underline hover:underline" href="{{ route('admin.task.index') }}">
                        Project Management
                    </a>
                    @include('components.admin.task.detailed-task-table')
                    <a href="{{ route('admin.task.create') }}">
                        <button>Create a task</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

