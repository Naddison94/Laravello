<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Friends extends Model
{
    use SoftDeletes;

    public $table = 'user_friends';

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'owner_user_id');
    }
}
