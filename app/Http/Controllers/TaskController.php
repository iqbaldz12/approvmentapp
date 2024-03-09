<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::latest()->paginate(5);
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'tasks_name'     => 'required|string',
            'description'     => 'required|string',
            'file'     => 'required|file|mimes:pdf',
        ]);

        //upload file
        $file = $request->file('file');
        $file->storeAs('public/tasks', $file->hashName());

        //create tasks
        Task::create([
            'tasks_name'     => $request->tasks_name,
            'description'    => $request->description,
            'file'          => $file->hashName(),
            'user_id'       => Auth::user()->id
        ]);

        //redirect to index
        return redirect()->route('tasks.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
