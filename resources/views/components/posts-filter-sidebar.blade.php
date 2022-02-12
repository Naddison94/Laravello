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
                <input name="category_id[]" checked value="{{ $category->id }}" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                <label class="ml-3 min-w-0 flex-1 text-gray-500">{{ $category->title }}</label>
            </div>
        @endforeach
        <x-button>
            {{ __('Update') }}
        </x-button>
    </div>
</div>
