<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post\Post;
use App\Models\Post\Comment;
use App\Models\Task\Task;
use App\Models\User;

class DashboardController
{
    Public function show()
    {
        $users = User::paginate(4, ['*'] ,'users');
        $users->metrics = getMonthlyMetrics($users);

        $posts = Post::all();
        $posts->metrics = getMonthlyMetrics($posts);

        $comments = Comment::all();
        $comments->metrics = getMonthlyMetrics($comments);

        $tasks = Task::with('category', 'priority')->get();
        $tasks->metrics = getMonthlyMetrics($tasks);
        $tasks->pending = Task::where('status_id', '=', 1)->paginate(8, ['*'] ,'pending');
        $tasks->in_progress = Task::where('status_id', '=', 2)->paginate(8, ['*'] ,'in_progress');
        $tasks->completed = Task::where('status_id', '=', 3)->paginate(8, ['*'] ,'completed');

        return view('admin.dashboard', compact('users', 'posts', 'tasks', 'comments'));
    }
}
