<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Task;
<<<<<<< HEAD
use App\Models\Approvement;

=======
<<<<<<< HEAD
use App\Models\Approvement;
use App\Models\Log;
=======
use App\Models\Log;
use App\Models\Approvement;

>>>>>>> 5a59e6c4d843fc0ba5b4d569831e8e3ed33330a1
>>>>>>> 8c8decbd13737634609000997c3c5fddf960d7c8

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
            'file'      => 'required|file|mimes:pdf',
        ]);

        //upload file
        $file = $request->file('file');
        $file->storeAs('public/tasks', $file->hashName());

        //create tasks
        Task::create([
            'tasks_name'     => $request->tasks_name,
            'description'    => $request->description,
            'file'          => $file->hashName(),
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
            'status'        => $request->status,
>>>>>>> 5a59e6c4d843fc0ba5b4d569831e8e3ed33330a1
>>>>>>> 8c8decbd13737634609000997c3c5fddf960d7c8
            'user_id'       => Auth::user()->id
        ]);

        //redirect to index
        return redirect()->route('tasks.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 8c8decbd13737634609000997c3c5fddf960d7c8
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $task = Task::findOrFail($id);
<<<<<<< HEAD
        $approvement = Approvement::where('task_id', $id)->latest()->first();
        
        return view('tasks.show', compact('task', 'approvement'));
    }
=======
        $logs = Log::where('task_id', $id)->get();
        $approvement = Approvement::where('task_id', $id)->latest()->first();

        return view('tasks.show', compact('task', 'approvement', 'logs'));
    }
=======

    public function show(string $id)
    {
        $task = Task::findOrFail($id);
        $logs = Log::where('task_id', $id)->get();
        $approvement = Approvement::where('task_id', $id)->latest()->first();
        
        return view('tasks.show', compact('task', 'approvement', 'logs'));
    }
    
>>>>>>> 5a59e6c4d843fc0ba5b4d569831e8e3ed33330a1
>>>>>>> 8c8decbd13737634609000997c3c5fddf960d7c8

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'tasks_name'     => 'required|string',
            'description'     => 'required|string',
            'file'     => 'nullable|file|mimes:pdf'
        ]);

        $task = Task::findOrFail($id);

        if ($request->hasFile('file')) {

            //upload new image
            $file = $request->file('file');
            $file->storeAs('public/tasks', $file->hashName());

            //delete old image
            Storage::delete('public/tasks/' . $task->file);

            $task->update([
                'tasks_name'     => $request->tasks_name,
                'description'    => $request->description,
                'file'          => $file->hashName(),
                'user_id'       => Auth::user()->id
            ]);
        } else {

            $task->update([
                'tasks_name'     => $request->tasks_name,
                'description'   => $request->description,
                'user_id'       => Auth::user()->id
            ]);
        }

        //redirect to index
        return redirect()->route('tasks.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);

        //delete image
        Storage::delete('public/tasks/' . $task->file);

        //delete post
        $task->delete();

        //redirect to index
        return redirect()->route('tasks.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
