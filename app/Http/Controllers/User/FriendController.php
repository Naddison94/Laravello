<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Friend;

class FriendController extends Controller
{
    public function index($user_id)
    {
        $friends = Friend::where('owner_user_id', $user_id)->paginate(20);
        return view('user.friend.index', compact('friends'));
    }

    public function create($owner_user_id, $friend_user_id)
    {
        // check if you have already added them
        // check you are not trying to add yourself
        // check if you removed them in the past and bring back old record instead of making a new one
    }

    public function store($owner_user_id, $friend_user_id)
    {

    }

    public function delete($owner_user_id, $friend_user_id)
    {

    }

    public function destroy($owner_user_id, $friend_user_id)
    {

    }
}
