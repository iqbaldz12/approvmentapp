<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
use App\Models\Log;
=======
use App\Models\Log; 
>>>>>>> 5a59e6c4d843fc0ba5b4d569831e8e3ed33330a1
use App\Events\LogCreated; // Import event LogCreated

class LogController extends Controller
{
<<<<<<< HEAD
    public function log($task_id)
    {
        $logs = Log::where('task_id', $task_id)->get();
        return view('tasks.log', compact('logs'));
    }
}
=======
    public function log( $task_id)
    {
        
        $logs = Log::where('task_id', $id)->get();
        return view('tasks.log', compact('logs'));
        
    }
    

}
>>>>>>> 5a59e6c4d843fc0ba5b4d569831e8e3ed33330a1
