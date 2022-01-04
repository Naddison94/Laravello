<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post\Comment;
use App\Models\Post\Post;
use App\Models\User\Friend;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ProfileController extends Controller
{
    public function show($user_id)
    {
        $user = User::where('id', $user_id)->withCount('posts', 'comments', 'friends')->first();

        $recentActivity = new Collection;
        $recentActivity = $recentActivity->merge(Friend::latest()->where('owner_user_id', $user_id)->limit(4)->get());
        $recentActivity = $recentActivity->merge(Post::latest()->where('user_id', $user_id)->with('author')->limit(4)->get());
        $recentActivity = $recentActivity->merge(Comment::latest()->where('user_id', $user_id)->with('author')->limit(4)->get());

        // sort the data by created_at
        $recentActivitySorted = $recentActivity->sortBy(function($created_at) {
            return $created_at;
        })->values()->sortBy('created_at')->all();

        // reverse the array to show desc in view
        $recentActivity = array_reverse($recentActivitySorted);

        return view('user.profile.show', compact('user', 'recentActivity'));
    }

    public function edit($user_id)
    {
        $user = User::find($user_id);
        return view('user.profile.edit', compact('user'));
    }

    public function update($user_id, Request $request)
    {
        $fileName = null;

        if ($request->file('image')) {
            $fileName = $request->file('image')->getClientOriginalName();
        }

        $user = User::find($user_id);
        $user->avatar = $fileName;

        if ($user->save() && $fileName != false) {
            $request->image->move(public_path("/user/$user->id/avatar/"), $fileName);
        }

        session()->flash('success',  'Profile successfully updated.');

        setUserActivity();

        return redirect()->route('user.profile.show', ['id' => $user_id]);
    }

    public function posts($user_id)
    {
        $posts = Post::latest()->where('user_id', $user_id)->paginate(8);
        return view('user.profile.post.index', compact('posts'));
    }

    public function comments($user_id)
    {
        $comments = Comment::latest()->where('user_id', $user_id)->with('author')->paginate(8);
        return view('user.profile.comment.index', compact('comments'));
    }

    public function friends($user_id)
    {
        $friends = Friend::where('owner_user_id', $user_id)->paginate(20);
        return view('user.profile.friend.index', compact('friends'));
    }
}
