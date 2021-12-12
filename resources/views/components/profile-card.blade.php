<div class="w-48 h-76 rounded-xl bg-gray-200 flex flex-col shadow">
    @if(Auth::id() == $user->id)
        <a href="{{ route ('profile.edit', ['id' => $user->id]) }}">
            <img class="w-auto rounded-t-xl" src="{{  $user->avatar ? '/user/' . $user->id . '/avatar/' . $user->avatar : 'https://picsum.photos/32/32/?random' }}" alt="avatar" />
        </a>
    @else
        <img class="w-auto rounded-t-xl" src="{{  $user->avatar ? '/user/' . $user->id . '/avatar/' . $user->avatar : 'https://picsum.photos/32/32/?random' }}" alt="avatar" />
    @endif
    <div class="text-center flex flex-col p-2">
        <span class="text-base font-bold"> {{ $user->name }}</span>
        <span class="text-xs italic"> Last active: {{ \Carbon\Carbon::parse($user->last_active)->diffForHumans() }}</span>
    </div>
</div>
