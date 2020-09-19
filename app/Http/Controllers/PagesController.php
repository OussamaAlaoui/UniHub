<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Message;
use App\User;
use Pusher\Pusher;
class PagesController extends Controller
{
    public function welcome() {
        return view('welcome');
    }
    public function getMessage($user_id)
    {
       $my_id = Auth::id();
         
       
       // Make read all unread message

       Message::where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);

       // Get all message from selected user
       $messages = Message::where(function ($query) use ($user_id, $my_id) {
           $query->where('from', $user_id)->where('to', $my_id);
       })->oRwhere(function ($query) use ($user_id, $my_id) {
           $query->where('from', $my_id)->where('to', $user_id);
       })->get();
       $user=User::where('id',$user_id)
       ->select('name','profilepic')->first();
  
     
         return view('message')->with('user',$user)->with('messages',$messages);
    }
   
    public function sendMessage(Request $request)
    {   
        $from=auth::id();
        $to=$request->receiver_id;
        $message=$request->message;

        $data=new Message();
        $data->from=$from;
        $data->to=$to;
        $data->message=$message;
        $data->is_read=0;
        $data->save();

        // pusher
        $options = array(
            'cluster' => 'eu',
            'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data = ['from' => $from, 'to' => $to]; 
        $pusher->trigger('my-channel', 'my-event', $data);
    }

}
