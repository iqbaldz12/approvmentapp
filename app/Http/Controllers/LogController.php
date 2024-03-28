<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Log; 
use App\Events\LogCreated; // Import event LogCreated

class LogController extends Controller
{
    public function log( $task_id)
    {
        
        $logs = Log::where('task_id', $id)->get();
        return view('tasks.log', compact('logs'));
        
    }
    

}