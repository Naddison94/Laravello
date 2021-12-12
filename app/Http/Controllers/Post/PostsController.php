<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }
}
