<?php

namespace App\Http\Controllers\Post;;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Carbon\Carbon;
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

    public function delete($comment_id)
    {
        return view('comment.delete', compact('comment_id'));
    }

    public function destroy($comment_id)
    {
        $comment = Comment::find($comment_id);

        if (!isOwner($comment->user_id)) {
            session()->flash('error',  'You may only delete posts belonging to you.');
            return redirect(route('dashboard.show'));
        }

        $comment->deleted_at = Carbon::now();
        $comment->deleted_by = Auth::id();
        $comment->save();

        session()->flash('success',  'Comment deleted.');

        setUserActivity();

        return redirect(route('post.show', ['id' => $comment->post_id]));
    }

}
