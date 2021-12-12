<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->with('author')->paginate(2);
        return view('posts.index', compact('posts'));
    }

    public function show()
    {
        $posts = Post::latest()->with('author')->paginate(2);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }
}
