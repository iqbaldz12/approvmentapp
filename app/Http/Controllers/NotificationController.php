<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification; // Import Notification model

class NotificationController extends Controller
{
    public function notification(Request $request, string $id)
    {

        // Create a new notification
        Notification::create([
            'from_id' => $request->from_id,
            'to_id' => $request->to_id,
            'title' => $request->title,
            'message' => $request->message,
        ]
    );

    return response('tasks');
}
 }
