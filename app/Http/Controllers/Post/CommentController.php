<?php

namespace App\Http\Controllers\Post;;

use App\Http\Controllers\Controller;
use App\Models\Post\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class CommentController extends controller
{
    public function store($post_id, Request $request)
    {
        $validated = $request->validate([
            'comment' => 'required:comments|max:255'
        ]);

        Comment::create([
            'post_id' => $post_id,
            'user_id' => Auth::id(),
            'comment' => $request->comment
        ]);

        setUserActivity();

        return redirect(route('post.show', ['id' => $post_id]))->with('success', 'Comment added.');
    }

    public function reply($comment_id, Request $request)
    {
        $rules = [
            'reply' => 'required:reply|max:255'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            session()->flash('comment_id', $comment_id);
            $request->flash();
            return back()->with('error', 'The reply must not be greater than 255 characters');
        }

        $post_id = Comment::find($comment_id)->value('post_id');

        Comment::create([
            'post_id' => $post_id,
            'user_id' => Auth::id(),
            'reply_id' => $comment_id,
            'comment' => $request->reply
        ]);

        setUserActivity();

        return redirect(route('post.show', ['id' => $post_id]))->with('success', 'Reply added.');
    }

    public function delete($comment_id)
    {
        return view('post.comment.delete', compact('comment_id'));
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
