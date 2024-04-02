<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Approvement;
use App\Models\Notification;
<<<<<<< HEAD
=======
use App\Models\Log;


>>>>>>> 8c8decbd13737634609000997c3c5fddf960d7c8

class ApprovementController extends Controller
{
    public function approvement(Request $request, string $task_id)
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD

        $approvement = Approvement::where('task_id', $task_id)->latest()->first();
        $step = 1;

        if ($approvement) {
            $step = $approvement->step + 1;
        }

=======
>>>>>>> 8c8decbd13737634609000997c3c5fddf960d7c8
    
        $approvement = Approvement::where('task_id', $task_id)->latest()->first();
        $step = 1;
    
        if ($approvement) {
            $step = $approvement->step + 1;
        }
<<<<<<< HEAD
    
        Approvement::updateOrCreate(
            ['task_id' => $task_id],
            [
=======
        
>>>>>>> 5a59e6c4d843fc0ba5b4d569831e8e3ed33330a1
        $approvement=Approvement::updateOrCreate(
            ['task_id' => $task_id,
>>>>>>> 8c8decbd13737634609000997c3c5fddf960d7c8
                'approved_by_id' => Auth::user()->id,
                'step' => $step,
                'status' => $request->status,
                'notes' => $request->note ?? "-",
<<<<<<< HEAD
            ]
        );
    
        return redirect('tasks');
    }
    
=======
<<<<<<< HEAD

            ]

=======
                
            ]
            
>>>>>>> 5a59e6c4d843fc0ba5b4d569831e8e3ed33330a1
        );

         Log::create(

        ['task_id' => $task_id,
            'approvement_id'=>$approvement->id,
            'approved_by_id' => $approvement->approved_by_id,
            'step' => $approvement->step,
            'status' => $approvement->status,
            'notes' => $approvement->note ?? "-",
<<<<<<< HEAD

        ]
);

=======
  
        ]
);
  
>>>>>>> 5a59e6c4d843fc0ba5b4d569831e8e3ed33330a1
        return redirect('tasks');
    }

>>>>>>> 8c8decbd13737634609000997c3c5fddf960d7c8
}
