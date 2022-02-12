<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post\Category;
use App\Models\Post\Comment;
use App\Models\Post\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->with('author')->withCount('comments')->filter()->paginate(8);
        $categories = Category::all();
        return view('post.index', compact('posts', 'categories'));
    }

    public function show($post_id)
    {
        $post = Post::where('id', $post_id)->withCount('comments')->first();
        $comments = Comment::where('post_id', $post_id)->whereNull('reply_id')->with('author', 'replies.author')->paginate(8);
        return view('post.show', compact('post', 'comments'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('post.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required:posts|max:80'
        ]);

        $fileName = false;
        if ($request->file('image')) {
            $fileName = $request->file('image')->getClientOriginalName();
        }

        $post = new Post;
        $post->id = Str::uuid()->toString();
        $post->user_id = Auth::id();
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->img = $fileName;

        if ($post->save() && $fileName != false) {
            $request->image->move(public_path('/user/' . $post->author->id . '/post/' . $post->id . DIRECTORY_SEPARATOR), $fileName);
        }

        setUserActivity();

        return redirect(route('post.show', ['id' => $post->id]));
    }

    public function edit($post_id)
    {
        $post = Post::find($post_id);

        if (!isOwner($post->user_id)) {
            session()->flash('error',  'You may only edit posts belonging to you.');
            return redirect(route('dashboard.show'));
        }

        return view('post.edit', compact('post'));
    }

    public function update($post_id, Request $request)
    {
        $fileName = false;

        if ($request->file('image')) {
            $fileName = $request->file('image')->getClientOriginalName();
        }

        $post = Post::find($post_id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->img = $fileName ?: $post->img;

        if ($post->save() && $fileName != false) {
            $request->image->move(public_path('/user/' . $post->author->id . '/post/' . $post->id . DIRECTORY_SEPARATOR), $fileName);
        }

        setUserActivity();

        return redirect(route('post.show', ['id' => $post->id]));
    }

    public function delete($post_id)
    {
        return view('post.delete', compact('post_id'));
    }

    public function destroy($post_id)
    {
        $post = Post::find($post_id);

        if (!isOwner($post->user_id)) {
            session()->flash('error',  'You may only delete posts belonging to you.');
            return redirect(route('dashboard.show'));
        }

        $post->deleted_at = Carbon::now();
        $post->deleted_by = Auth::id();
        $post->save();

        session()->flash('success', 'Post deleted.');

        setUserActivity();

        return redirect(route('dashboard.show'));
    }
}
