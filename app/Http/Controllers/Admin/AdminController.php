<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use App\Models\Site;
use App\Models\User;
use App\Models\Company;
use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard.index',[
            'companies' => Company::count(),
            'jobs' => Job::count(),
            'users' => User::count()
        ]);
    }

    public function chatSupport()
    {
        $users = User::where('id', '!=', Auth::user()->id)->get();
        return view('chat.index',[
            'users' => $users
        ]);
    }

    public function getMessages(Request $request)
    {
        $userId = $request->user_id; 
        $loggedInUserId = auth()->id();

        $messages = Message::where(function ($query) use ($userId, $loggedInUserId) {
                $query->where('sender_id', $loggedInUserId)->where('receiver_id', $userId);
            })
            ->orWhere(function ($query) use ($userId, $loggedInUserId)
            {
                $query->where('sender_id', $userId)->where('receiver_id', $loggedInUserId);
            })
            ->with(['receiver', 'sender'])
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json([
            'status' => true,
            'messages' => $messages
        ]);
    }

    public function sendMessage(Request $request)
    {
        Message::create([
            'sender_id' => Auth::user()->id,
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
            'read' => false
        ]);

        return redirect()->back()->with('success', 'The Message has been sent.');
    }
}
