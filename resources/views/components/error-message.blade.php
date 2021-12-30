@if (session()->has('error'))
    <div x-data="{ show: true }"
         x-init="setTimeout(()=> show = false, 6000)"
         x-show="show"
         class="fixed bg-red-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-lg">
        <p>{{ session('error') }}</p>
    </div>
@endif

@if ($errors->any())
    <div x-data="{ show: true }"
         x-init="setTimeout(()=> show = false, 6000)"
         x-show="show"
         class="fixed bg-red-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-lg">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
