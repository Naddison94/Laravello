<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostCommentRating extends Model
{
    use HasFactory;

    public $table = 'post_comment_ratings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'comment_id',
        'user_id',
        'upvote',
        'downvote',
        'deleted_at',
    ];
}
