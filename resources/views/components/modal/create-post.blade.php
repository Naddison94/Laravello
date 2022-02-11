<!-- modal div -->
<div class="mt-6" x-data="{ open: false }">
    <!-- Button (blue), duh! -->
    <button class="px-4 py-2 text-white bg-blue-500 rounded select-none no-outline focus:shadow-outline" @click="open = true">Add a post - modal testing</button>
    <!-- Dialog (full screen) -->
    <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);" x-show="open"  >
        <!-- A basic modal dialog with title, body and one button to close -->
        <div class="h-auto p-4 mx-2 text-left bg-white rounded shadow-xl md:max-w-xl md:p-6 lg:p-8 md:mx-0" @click.away="open = false">
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
{{--                                    @foreach($categories as $category)--}}
{{--                                        <option value="{{ $category->id }}"--}}
{{--                                            {{ (collect(old('category_id'))->contains($category->id)) ? 'selected' : '' }}  />--}}
{{--                                        {{ $category->title }}--}}
{{--                                    @endforeach--}}
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
{{--<!-- modal div -->--}}
{{--<div class="mt-6" x-data="{ open: false }">--}}
{{--    <!-- Button (blue), duh! -->--}}
{{--    <button class="px-4 py-2 text-white bg-blue-500 rounded select-none no-outline focus:shadow-outline" @click="open = true">Open Modal</button>--}}
{{--    <!-- Dialog (full screen) -->--}}
{{--    <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);" x-show="open"  >--}}
{{--        <!-- A basic modal dialog with title, body and one button to close -->--}}
{{--        <div class="h-auto p-4 mx-2 text-left bg-white rounded shadow-xl md:max-w-xl md:p-6 lg:p-8 md:mx-0" @click.away="open = false">--}}
{{--            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">--}}
{{--                <h3 class="text-lg font-medium leading-6 text-gray-900">--}}
{{--                    Modal Title Here--}}
{{--                </h3>--}}

{{--                <div class="mt-2">--}}
{{--                    <p class="text-sm leading-5 text-gray-500">--}}
{{--                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod--}}
{{--                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,--}}
{{--                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo--}}
{{--                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse--}}
{{--                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non--}}
{{--                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- One big close button.  --->--}}
{{--            <div class="mt-5 sm:mt-6">--}}
{{--                <span class="flex w-full rounded-md shadow-sm">--}}
{{--                    <button @click="open = false" class="inline-flex justify-center w-full px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">--}}
{{--                    Close this modal!--}}
{{--                    </button>--}}
{{--                </span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
