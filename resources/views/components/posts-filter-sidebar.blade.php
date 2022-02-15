<div class="flex-col">
    <div class="pb-4 flex items-center max-w-md mx-auto rounded-full">
        <div>
            <input type="text" name="search" class="w-full py-1 text-gray-900 rounded-full focus:outline-none" placeholder="Search post titles" value="{{ app('request')->input('search') }}">
        </div>
    </div>

    <span class="font-medium text-gray-900">Category Filter</span>
    <div class="space-y-6">
        @foreach($categories as $category)
            <div class="flex items-center">
                @php $checked = false @endphp
                @if(request('category'))
                    @foreach(request('category') as $key => $categoryId)
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
