<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    public $table = 'user_friends';

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'friend_user_id');
    }
}
