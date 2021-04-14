<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request)
    {
        $notifications = Notification::where('by', $request->user()->id)->get();
        // foreach ($notifications as $notification) {
        //     dd($notification->user->username);
        // }

        return view('content.notifications', [
            'notifications' => $notifications
        ]);
    }
}
