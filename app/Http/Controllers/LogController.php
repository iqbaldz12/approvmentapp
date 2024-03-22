<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Log;

class LogController extends Controller
{

    public function log(Request $request, string $task_id)
    
    {
    $logs = Log::all();
    $approvement = approvement::where('task_id', $task_id)->latest()->first();
    $step = 1;

    if ($approvement) {
        $step = $approvement->step + 1;
    }

    approvement::create([
        'task_id' => $task_id,
        'approved_by_id' => Auth::user()->id,
        'step' => $step,
        'status' => $request->status,
        'notes' => $request->note??"-",
    ]);

    return redirect('tasks');
}
}
