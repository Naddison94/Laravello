<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Http\Requests\Friend\AddFriendRequest;
use App\Http\Requests\Friend\DeleteFriendRequest;
use App\Models\User\Friend;
use Carbon\Carbon;

class FriendController extends Controller
{
    public function index($user_id)
    {
        $friends = Friend::where('owner_user_id', $user_id)->paginate(20);
        return view('user.friend.index', compact('friends'));
    }

    public function create($owner_user_id, $friend_user_id, AddFriendRequest $request)
    {
        $request->validate($owner_user_id, $friend_user_id);
        $this->store($request->getOwnerUserId(), $request->getFriendUserId());

        return back()->with('success', 'Friend added.');
    }

    public function store($owner_user_id, $friend_user_id)
    {
        $friend = new Friend;
        $friend->owner_user_id = $owner_user_id;
        $friend->friend_user_id = $friend_user_id;
        $friend->save();
    }

    public function delete($owner_user_id, $friend_user_id, DeleteFriendRequest $request)
    {
        $request->validate($owner_user_id, $friend_user_id);
        $this->destroy($request->getFriend());

        return back()->with('success', 'Friend removed.');
    }

    public function destroy(Friend $friend)
    {
        $friend->delete();
    }
}
