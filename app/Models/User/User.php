<?php

namespace App\Models\User;

use App\Models\Group\Group;
use App\Models\Group\GroupUser;
use App\Models\Post\Comment;
use App\Models\Post\Post;
use App\Traits\Uuids;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Uuids, softdeletes;

    public $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'last_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->hasOne(Admin::class, 'user_id', 'id');
    }

    public function isFriend($friend_user_id) {
        return $this->friends()->where('friend_user_id', $friend_user_id)->first();
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    // return the groups that the current user belongs to
    public function groups()
    {
        return $this->hasManyThrough(Group::class, GroupUser::class, 'user_id', 'id', 'id', 'group_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }

    public function friends()
    {
        return $this->hasMany(Friend::class, 'owner_user_id', 'id');
    }
}
