<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Approvement;

class ApprovementController extends Controller
{
    public function approvement(Request $request, string $task_id )
    {

          $validator = Validator::make($request->all(), [
            'step' => 'required|integer',
            'status' => 'required|string',
            'notes' => 'required|string',
        ]);


        if ($validator->fails()) {
            return redirect('tasks/approvement');

        }

        $approvement = Approvement::updateOrCreate(
            ['task_id' => $task_id],
            [
                'approved_by_id' => Auth::user()->role,
                'step' => $request->step,
                'status' => $request->status,
                'notes' => $request->notes,
            ]
        );


        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diudapte!',
            'data'    => $approvement
        ]);
    }
}
