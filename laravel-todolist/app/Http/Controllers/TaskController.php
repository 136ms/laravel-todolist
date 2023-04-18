<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $tasks = $user->tasks;

        return view('tasks.index')->with(['tasks' => $tasks]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $task = new Task();
        $task->user_id = Auth::user()->id;
        $task->name = $request->Name;
        $task->description = $request->Description;
        $task->priority = $request->Priority;
        $task->save();
        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }



    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }


    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }


    public function update(Request $request, Task $task)
    {
        $task->user_id = Auth::user()->id;
        $task->name = $request->Name;
        $task->description = $request->Description;
        $task->priority = $request->Priority;
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }


    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}
