<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Team;
use Database\Seeders\TeamSeeder;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * view all tasks
     */
    public function index(Team $team)
    {
        $tasks = $team->tasks()->get();

        return view('tasks.index', ['tasks' => $tasks]);
    }

    /**
     * display create task form
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * create a new task
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255'
        ]);

        Task::create($data);

        return redirect()->route('tasks.show')
            ->with('success', 'Task created successfully');
    }

    /**
     * display edit task form
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', ['task' => $task]);
    }

    /**
     * update associated task
     */
    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'name' => 'required|max:255'
        ]);

        $task->update($data);

        return redirect()->route('tasks.show')
            ->with('success', 'Task updated successfully');
    }

    /**
     * delete associated task
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully');
    }


}
