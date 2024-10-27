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
        $chats = User::where('id', 1)->get();
        return view('chat.index',[
            'chats' => $chats
        ]);
    }

    public function getMessages(Request $request)
    {
        $messages = Message::with('user')->where('conversation_id', $request->conversation_id)->get();

        return response()->json([
            'status' => true,
            'messages' => $messages
        ]);
    }

    public function sendMessage(Request $request)
    {
        Message::create([
            'user_id' => Auth::user()->id,
            'conversation_id' => $request->sent_to,
            'message' => $request->message,
            'read' => false
        ]);

        return redirect()->back()->with('success', 'The Message has been sent.');
    }
}
