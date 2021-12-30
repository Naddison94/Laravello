<?php

namespace App\Http\Requests\Friend;

use App\Models\User\Friend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class DeleteFriendRequest
{
    private $owner_user_id;
    private $friend_user_id;
    private $friend;

    private function setOwnerUserId($owner_user_id)
    {
        $this->owner_user_id = $owner_user_id;
    }

    private function setFriendUserId($friend_user_id)
    {
        $this->friend_user_id = $friend_user_id;
    }

    public function getFriend()
    {
        return $this->friend;
    }

    private function setFriend($owner_user_id, $friend_user_id)
    {
        $this->friend = Friend::where('owner_user_id', '=', $this->owner_user_id)->where('friend_user_id', '=', $this->friend_user_id)->first();
    }

    public function validate($owner_user_id, $friend_user_id)
    {
        $this->setOwnerUserId($owner_user_id);
        $this->setFriendUserId($friend_user_id);
        $this->setFriend($owner_user_id, $friend_user_id);

        if ($this->friend->owner_user_id != Auth::id()) {
             $error = ValidationException::withMessages([
                'error' => ['You can not remove other users\' friends.'],
            ]);

            throw $error;
        }
    }
}
