<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post\Post;
use App\Models\Task\Comment;
use App\Models\Task\Task;
use App\Models\User;
use Carbon\Carbon;

class DashboardController
{
    Public function show()
    {
        $users = User::paginate(4);
        $users->metrics = getMonthlyMetrics($users);

        $posts = Post::all();
        $posts->metrics = getMonthlyMetrics($posts);

        $comments = Comment::all();
        $comments->metrics = getMonthlyMetrics($comments);

        $tasks = Task::with('category')->get();
        $tasks->metrics = getMonthlyMetrics($tasks);

        return view('admin.dashboard', compact('users', 'posts', 'tasks', 'comments'));
    }
}
