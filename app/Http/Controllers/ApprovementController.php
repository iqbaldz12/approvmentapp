<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Approvement;
use App\Models\Notification;
use App\Models\Log;



class ApprovementController extends Controller
{
    public function approvement(Request $request, string $task_id)
    {
    
        $approvement = Approvement::where('task_id', $task_id)->latest()->first();
        $step = 1;
    
        if ($approvement) {
            $step = $approvement->step + 1;
        }
        
        $approvement=Approvement::updateOrCreate(
            ['task_id' => $task_id,
                'approved_by_id' => Auth::user()->id,
                'step' => $step,
                'status' => $request->status,
                'notes' => $request->note ?? "-",
                
            ]
            
        );

         Log::create(

        ['task_id' => $task_id,
            'approvement_id'=>$approvement->id,
            'approved_by_id' => $approvement->approved_by_id,
            'step' => $approvement->step,
            'status' => $approvement->status,
            'notes' => $approvement->note ?? "-",
  
        ]
);
  
        return redirect('tasks');
    }

}
