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

        foreach ($recentActivity as $activity) {
            if ($activity instanceof User) {
                $recent[] = ['message' => 'A user named ' . $activity->name . ' has joined the site' . ' ' .  $activity->created_at->diffForHumans() . '.', 'img_class' => 'user'];
            }

            if ($activity instanceof Post) {
                $recent[] = ['message' => $activity->author->name . ' created the post: ' . $activity->title . ' ' . $activity->created_at->diffForHumans() . '.', 'img_class' => 'post'];
            }

            if ($activity instanceof Comment) {
                $recent[] = ['message' => $activity->author->name . ' has commented: ' . $activity->comment . ' ' . $activity->created_at->diffForHumans() . '.', 'img_class' => 'comment'];
            }
        }

        return view('admin.dashboard', compact('users', 'posts', 'tasks', 'comments', 'recent'));
    }
}
