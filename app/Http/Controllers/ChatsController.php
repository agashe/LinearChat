<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Chat;
use Validator;
use Pusher;

class ChatsController extends Controller
{
    public function sendMessage(Request $request)
    {
        $this->validate($request, [
            'message' => 'required'
        ]);

        $newChat = new Chat;
        $newChat->user_id = Auth::user()->id;
        $newChat->message = nl2br($request->message);
        $newChat->save();
        
        $options = array(
            'cluster' => 'eu',
            'useTLS' => false
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
    
        $data['message'] = "New Message";
        $pusher->trigger('join-chat-channel', 'join-chat-event', json_encode($data));

        return response()->json(["message" => "Success"]);
    }

    public function getMessages($limit)
    {
        $response = [];
        $messages = Chat::latest()->limit($limit)->get();
 
        foreach ($messages->reverse() as $message) {
            $user = User::find($message->user_id);
            
            $messageData['user_id']       = $user->id;
            $messageData['username'] = $user->name;
            $messageData['avatar']   = $user->image;
            $messageData['sent_at']  = $message->created_at;
            $messageData['content']  = $message->message;

            $response[] = $messageData;
        }

        return response()->json(["messages" => $response, "user_id" => Auth::user()->id]);
    }
}
