<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->with('author')->paginate(2);
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

    public function store()
    {
        dd('123');
    }

    public function edit()
    {

    }

    public function update()
    {

    }
}
