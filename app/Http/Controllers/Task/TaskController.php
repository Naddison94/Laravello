<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('category', 'priority', 'status')->latest()->paginate(20);

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
