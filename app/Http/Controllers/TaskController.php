<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
{
    $query = Task::where('user_id', auth()->id());

    // Search by task name
    if ($request->filled('search')) {
        $query->where('task_name', 'like', '%' . $request->search . '%');
    }

    // Filter by priority
    if ($request->filled('priority')) {
        $query->where('priority', $request->priority);
    }

    // Filter by due date
    if ($request->filled('due_date')) {
        $query->whereDate('due_date', $request->due_date);
    }

    // Filter by status
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    $tasks = $query->latest()->get();

    $totalTasks = Task::where('user_id', auth()->id())->count();

    $completedTasks = Task::where('user_id', auth()->id())
        ->where('status', 'Completed')
        ->count();

    $pendingTasks = Task::where('user_id', auth()->id())
        ->where('status', 'Pending')
        ->count();

    return view('dashboard', compact(
        'tasks',
        'totalTasks',
        'completedTasks',
        'pendingTasks'
    ));
}

    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
            'priority' => 'required|in:Low,Medium,High',
        ]);

        Task::create([
            'user_id' => auth()->id(),
            'task_name' => $request->task_name,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'priority' => $request->priority,
            'status' => 'Pending',
        ]);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Task added successfully!');
    }
    public function updateStatus(Task $task)
{
    // Make sure the task belongs to the logged-in user
    if ($task->user_id !== auth()->id()) {
        abort(403);
    }

    if ($task->status === 'Pending') {
        $task->status = 'Completed';
    } else {
        $task->status = 'Pending';
    }

    $task->save();

    return redirect()
        ->route('dashboard')
        ->with('success', 'Task status updated successfully!');
}
    public function destroy(Task $task)
{
    // Make sure the task belongs to the logged-in user
    if ($task->user_id !== auth()->id()) {
        abort(403);
    }

    $task->delete();

    return redirect()
        ->route('dashboard')
        ->with('success', 'Task deleted successfully!');
}
}