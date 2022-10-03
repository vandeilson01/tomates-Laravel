<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Inscricao;
use App\Models\InscricaoEndereco;
use App\Models\RifaUser;
use Illuminate\Notifications\Notification;
use App\Notifications\InscricaoNotification;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        
    }


    

    public function notifications(Request $request)
    {
        $notifications = $request->user()->unreadNotifications;

        return response()->json(compact('notifications'));
    }


    public function markAsRead(Request $request)
    {
        $notification = $request->user()
                        ->notifications()
                        ->where('id', $request->id)
                        ->first();

        if ($notification)
            $notification->markAsRead();
    }


    public function markAllAsRead(Request $request)
    {
        $request->user()->unreadNotifications->markAsRead();
    }

    public function markNotification(Request $request){
            auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        return response()->noContent();
    }
}
