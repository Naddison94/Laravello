<?php

namespace App\Http\Controllers\Post;;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class CommentController extends controller
{
    public function store($post_id, Request $request)
    {
        $validated = $request->validate([
            'comment' => 'required:comments|max:255'
        ]);

        $comment = new Comment;
        $comment->id = Str::uuid()->toString();
        $comment->user_id = Auth::id();
        $comment->post_id = $post_id;
        $comment->comment = $request->comment;

        if ($comment->save() ) {
            setUserActivity();

            return redirect(route('post.show', ['id' => $post_id]))->with('success', 'Comment added.');
        }
    }
}
