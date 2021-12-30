<?php

namespace App\Http\Requests\Friend;

use App\Models\User\Friend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AddFriendRequest
{
    private $owner_user_id;
    private $friend_user_id;
    private $friend;

    public function getOwnerUserId()
    {
        return $this->owner_user_id;
    }

    private function setOwnerUserId($owner_user_id)
    {
        $this->owner_user_id = $owner_user_id;
    }

    public function getFriendUserId()
    {
        return $this->friend_user_id;
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

        if ($this->friend_user_id == Auth::id()) {
            $error = ValidationException::withMessages([
                'error' => ['You cannot add yourself.'],
            ]);

            throw $error;
        }

        if ($this->friend) {
             $error = ValidationException::withMessages([
                'error' => ['You are already friends with this user.'],
            ]);

            throw $error;
        }
    }
}
