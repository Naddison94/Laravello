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

{{--                        <label for="category_id">Select a category for this post</label>--}}
{{--                        <select id="category_id" name="category_id">--}}
{{--                            @foreach($categories as $category)--}}
{{--                                <option value="<?= $category->id ?>"><?= $category->title ?></option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                        <hr>--}}

                        <label for="title">Post Title</label>
                        <input type="text" id="title" name="title"><br><br>
                        <label for="body">Post Body:</label>
                        <textarea id="body" name="body" cols="50" rows="8" >{{ old('body') }}</textarea><br><br>
                        <label for="image">Select image:</label>
                        <input type="file" id="image" name="image"><br><br>
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
