<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post\Post;
use App\Models\Task\Task;
use App\Models\User;

class DashboardController
{
    Public function show()
    {
        $users = User::paginate(4);
        $posts = Post::all();
        $tasks = Task::all();
        return view('admin.dashboard', compact('users', 'posts', 'tasks'));
    }
}
