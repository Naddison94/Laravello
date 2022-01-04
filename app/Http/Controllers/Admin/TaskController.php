<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task\Category;
use App\Models\Task\Priority;
use App\Models\Task\Status;
use App\Models\Task\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('category', 'priority', 'status')->latest()->paginate(20);
        return view('admin.task.index', compact('tasks'));
    }

    public function show()
    {
        //
    }

    public function create()
    {
        $categories = Category::all();
        $statuses = Status::all();
        $priorities = Priority::all();
        return view('admin.task.create', compact('categories', 'statuses', 'priorities'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required:tasks|max:80',
            'body' => 'required:tasks|max:255'
        ]);

        $task = new Task();
        $task->title = $request->title;
        $task->body = $request->body;
        $task->user_id = Auth::id();
        $task->category_id = $request->category_id;
        $task->status_id = $request->status_id;
        $task->priority_id = $request->priority_id;
        $task->save();

        setUserActivity();

        // todo change this to show once show is implemented
        return redirect(route('admin.task.index'));
    }

    public function edit($task_id)
    {
        $task = Task::where('id', $task_id)->with('category', 'priority', 'status')->first();
        $categories = Category::all();
        $statuses = Status::all();
        $priorities = Priority::all();
        return view('admin.task.edit', compact('task', 'categories', 'statuses', 'priorities'));
    }

    public function update($task_id, Request $request)
    {
        $validated = $request->validate([
            'title' => 'required:tasks|max:80',
            'body' => 'required:tasks|max:255'
        ]);

        $task = Task::find($task_id);
        $task->title = $request->title;
        $task->body = $request->body;
        $task->category_id = $request->category_id;
        $task->status_id = $request->status_id;
        $task->priority_id = $request->priority_id;
        $task->save();

        setUserActivity();

        // todo change this to show once show is implemented
        return redirect(route('admin.task.index'));
    }

    public function delete($task_id)
    {
        return view('admin.task.delete', compact('task_id'));
    }

    public function destroy($task_id)
    {
        $task = Task::find($task_id);
        $task->deleted_at = Carbon::now();
        $task->deleted_by = Auth::id();
        $task->save();

        session()->flash('success', 'Task deleted.');

        setUserActivity();

        return redirect(route('admin.task.index'));
    }
}
