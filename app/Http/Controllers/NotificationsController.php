<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    public function index()
    {
        //dd(Auth::user()->notifications()->paginate(2));
        return view('notifications', [
            'notifications' => Auth::user()->notifications()->latest()->paginate(2),
        ]);
    }
    public function update($id = null)
    {
        $user = Auth::user();
        $user->unreadNotification()->when($id, function ($query, $id) {
            $query->where('id', $id);
        })->markAsRead();
    }
    public function destroy($id = null)
    {
        $user = Auth::user();
        if ($id) {
            $user->notifications()->findOrFail($id)->delete();
        }
    }
}
