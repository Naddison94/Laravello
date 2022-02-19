<?php

namespace App\Models\Post;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public $table = 'post_comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id',
        'user_id',
        'reply_id',
        'comment'
    ];

    public function author()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'reply_id')->whereNotNull('reply_id');
    }

    public function reply()
    {
        return $this->hasOne(Comment::class, 'id', 'reply_id');
    }

    public function post()
    {
        return $this->hasOne(Post::class, 'id', 'post_id');
    }

    public function upvotes()
    {
        return $this->hasMany(PostCommentRating::class)->where('upvote', '=', 1);
    }

    public function downvotes()
    {
        return $this->hasMany(PostCommentRating::class)->where('downvote', '=', 1);
    }
}
