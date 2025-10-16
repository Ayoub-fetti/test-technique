<?php

namespace App\Http\Controllers;
use App\Models\Task;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);

    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable'
        ]);

        $task = Task::create($request->all());
                return response()->json([
            'message' => 'task created successfully',
            'data' => $task
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'sometimes|string'
        ]);
        $task = Task::find($id);
        $task->update($request->all());
        return response()->json([
            'message' => 'task updated successfully',
            'data' => $task
        ]);
    }
    public function changeStatus(Request $request, String $id) {
        $request->validate([
            'status' => 'required|in:open,in_progress,done',
        ]);
        $task = Task::findOrfail($id);
        $task->status = $request->status;
        $task->save();
        return response()->json([
            'message' => 'Status updated successfully',
            'data' => $task
        ]);
    }


    public function destroy(string $id)
    {
        $task = Task::find($id);
        $task->delete();
    }
}
