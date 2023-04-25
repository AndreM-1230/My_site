<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::paginate(15);

        return view('tasks.tasklist', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create_task');
    }

    /**
     * Store a newly created resource in storage.

     */
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required',
            'description' => 'required',
            'admin_id' => 'required',
            'rating' => 'required',
            'user_id' => 'required',
            'answer' => 'required',
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')->with('success','Post created successfully.');

    }

    /**
     * Display the specified resource.

     */
    public function show(Task $task)
    {
        return view('tasks.show',compact('task'));

    }

    /**
     * Show the form for editing the specified resource.

     */
    public function edit(Task $task)
    {
        return view('tasks.edit',compact('task'));
    }

    /**

     */
    public function update(TaskUpdateRequest $request, Task $task)
    {
        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success','Post updated successfully');

    }

    /**
     * Remove the specified resource from storage.

     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success','post deleted successfully');

    }
}
