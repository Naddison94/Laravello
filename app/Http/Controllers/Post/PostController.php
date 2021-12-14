<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->with('author')->paginate(8);
        return view('post.index', compact('posts'));
    }

    public function show()
    {
        $posts = Post::latest()->with('author')->paginate(2);
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required:posts|max:80'
        ]);

        $fileName = null;

        if ($request->file('image')) {
            $fileName = $request->file('image')->getClientOriginalName();
        }

        $uuid = Str::uuid()->toString();

        $post = new Post;
        $post->id = $uuid;
        $post->user_id = Auth::id();
        $post->category_id = $request->category_id ?: null;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->img = $fileName;

        if ($post->save() && $fileName != false) {
            $request->image->move(public_path('/user/' . $post->author->id . '/post/' . $uuid . '/'), $fileName);
        }

        return redirect(route('post.index'))->with('success', 'Post added.');
    }

    public function edit()
    {

    }

    public function update()
    {

    }
}
