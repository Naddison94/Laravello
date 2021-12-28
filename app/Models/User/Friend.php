<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Friend extends Model
{
    use SoftDeletes;

    public $table = 'user_friends';

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'friend_user_id');
    }
}
