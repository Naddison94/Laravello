<div class="bg-white p-4 shadow-md rounded-2xl">
    <div class="pb-4 flex items-center max-w-md mx-auto rounded-full">
        <div>

            <div class="relative hidden sm:block flex-shrink flex-grow-0 w-full">
                <input type="text" name="search" class="bg-purple-white bg-gray-100 rounded-lg border-0 p-3 w-full" placeholder="search" value="{{ app('request')->input('search') }}">

                <div class="absolute top-0 right-0 p-4 pr-3 text-purple-lighter">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
{{--            <input type="text" name="search" class="w-full py-1 text-gray-900 rounded-full focus:outline-none" placeholder="search" value="{{ app('request')->input('search') }}">--}}
{{--            <input type="text" name="search" class="w-full py-1 text-gray-900 rounded-full focus:outline-none" placeholder="search" value="{{ app('request')->input('search') }}">--}}
        </div>
    </div>

    <span class="font-medium text-gray-900">Category Filter</span>

    <div class="space-y-2">
        @foreach($categories as $category)
            <div class="flex items-center">
                @php $checked = false @endphp
                @if(request('category'))
                    @foreach(request('category') as $categoryId)
                        @if($categoryId == $category->id) @php $checked = true @endphp @endif
                    @endforeach
                @endif

                @if($checked)
                    <input name="category[]" value="{{ $category->id }}" checked type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                @else
                    <input name="category[]" value="{{ $category->id }}" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                @endif
                <label class="ml-3 min-w-0 flex-1 text-gray-500">{{ $category->title }}</label>
            </div>
        @endforeach

        <x-button>
            {{ __('Search') }}
        </x-button>
    </div>
</div>
