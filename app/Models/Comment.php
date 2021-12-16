<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, Uuids, SoftDeletes;

    public $table = 'post_comments';

    public function author()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'reply_id')->whereNotNull('reply_id');
    }
}
