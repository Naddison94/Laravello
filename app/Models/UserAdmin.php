<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAdmin extends Model
{
    use HasFactory, softdeletes;

    public $table = 'user_admins';

    public function user()
    {
        $this->hasOne(User::class, 'id', 'user_id');
    }
}
