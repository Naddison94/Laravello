<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('category', 'priority')->get();
        $tasks->pending = Task::where('status_id', '=', 1)->paginate(12, ['*'] ,'pending');
        $tasks->in_progress = Task::where('status_id', '=', 2)->paginate(12, ['*'] ,'in_progress');
        $tasks->completed = Task::where('status_id', '=', 3)->paginate(12, ['*'] ,'completed');

        return view('admin.task.index', compact('tasks'));
    }

    public function show()
    {

    }

    public function create()
    {
        return view('admin.task.create');
    }

    public function store(Request $request)
    {
        dd($request);
    }
}
