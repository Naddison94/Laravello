<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="bg-gray-50 shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
                            <div class="-mx-3 md:flex">
                                <div class="md:w-full px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="title">
                                        Title
                                    </label>
                                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="title" name="title" type="text" value="{{ old('title') }}" placeholder="Title">
                                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="description">
                                        Description
                                    </label>
                                    <textarea rows="9" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" name="body" id="body" placeholder="Description">{{ old('body') }}</textarea>
                                </div>

                                <div class="w-full">
                                    <div class="px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="category">
                                            Category
                                        </label>
                                        <select class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" name="category_id" id="category">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ (collect(old('category_id'))->contains($category->id)) ? 'selected' : '' }}  />
                                                {{ $category->title }}
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="pl-2">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="category">
                                            Image
                                        </label>
                                        @include('components.upload-image')
                                    </div>
                                </div>
                            </div>

                            @if(Route::is('post.create'))
                                <input type="hidden" id="public" name="public" checked>
                            @endif

                            @if(Route::is('groups.post.create'))
                                <div class="w-1/2 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="category">
                                        Post to
                                    </label>
                                    <select class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" name="group_id" id="group">
                                        @foreach(Auth::user()->groups()->get() as $group)
                                            <option value="{{ $group->id }}"
                                                {{ (collect(old('group_id'))->contains($group->id)) ? 'selected' : '' }}  />
                                            {{ $group->name }}
                                        @endforeach
                                    </select>
                                </div>

                                <div class="md:w-full px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="public">
                                        Public
                                    </label>

                                    <input type="checkbox" id="public" name="public"  {{ old('public') == 'on' ? 'checked' : '' }}>
                                </div>
                            @endif

                        </div>
                        <div class="flex items-center justify-center mt-4">
                            <x-button class="ml-4">
                                {{ __('Create') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
