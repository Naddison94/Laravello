<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.task.store') }}" method="POST">
                        @csrf
                        <div class="bg-gray-50 shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
                            <div class="-mx-3 md:flex">
                                <div class="md:w-full px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="title">
                                        Title
                                    </label>
                                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="title" type="text" placeholder="Title">
                                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="description">
                                        Description
                                    </label>
                                    <textarea rows="5" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="body" placeholder="Description"></textarea>
                                </div>

                                <div class="w-full">
                                    <div class="px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="category">
                                            Category
                                        </label>
                                        <select class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="category">
                                            @foreach($categories as $category)
                                                <option value="<?= $category->id ?>"><?= $category->title ?></option>
                                            @endforeach
                                        </select>
    {{--                                        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="title" type="text" placeholder="Category">--}}
                                    </div>

                                    <div class="px-3 mb-6 pt-1 md:mb-0">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="status">
                                            Status
                                        </label>
                                        <select class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="status">
                                            @foreach($statuses as $status)
                                                <option value="<?= $status->id ?>"><?= $status->title ?></option>
                                            @endforeach
                                        </select>
                                        </div>

                                <div class="px-3 mb-6 pt-1 md:mb-0">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="priority">
                                            Priority
                                        </label>
                                        <select class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="priority">
                                            @foreach($priorities as $priority)
                                                <option value="<?= $priority->id ?>"><?= $priority->title ?></option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <input class="hover:bg-blue-50 w-1/12" type="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
