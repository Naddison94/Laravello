<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post\Post;
use App\Models\Post\Comment;
use App\Models\Task\Task;
use App\Models\User;
use Illuminate\Support\Collection;

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

        $recentActivity = new Collection;
        $recentActivity = $recentActivity->merge(User::latest()->limit(4)->get());
        $recentActivity = $recentActivity->merge(Post::latest()->with('author')->limit(4)->get());
        $recentActivity = $recentActivity->merge(Comment::latest()->with('author')->limit(4)->get());

        // sort the data by created_at
        $recentActivitySorted = $recentActivity->sortBy(function($created_at) {
            return $created_at;
        })->values()->sortBy('created_at')->all();

        // remove older data from the array to prevent stale data hanging around
        //        $recentActivitySpliced = array_splice($recentActivitySorted, 0);

        // reverse the array to show desc in view
        $recentActivity = array_reverse($recentActivitySorted);

        return view('admin.dashboard', compact('users', 'posts', 'tasks', 'comments', 'recentActivity'));
    }
}
