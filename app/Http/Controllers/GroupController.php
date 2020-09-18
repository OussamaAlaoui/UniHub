<?php

namespace App\Http\Controllers;

use App\Conversation;
use Illuminate\Http\Request;
use App\Group;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Message;
use App\Events\GroupCreated;
use Pusher\Pusher;
use Illuminate\Support\Facades\DB;
class GroupController extends Controller
{
    public function index($group_id)
    {
      
        $group=array();
        $Conversations="";
        $user_role = db::table('roles')
        ->join('roleusers','roleusers.role_id','=','roles.id')
        ->where('roleusers.user_id','=',auth::id())
        ->first();
        Conversation::where(['group_id' => $group_id, 'user_id' => auth::id()])->update(['is_read' => 1]);
       
            $Conversations=Conversation::where('group_id',$group_id)
            ->join('users','users.id','=','conversations.user_id')
            //  ->join('users','users.id')
            ->select('conversations.*','users.name')
            ->get();
            $group=group::where('id','=',$group_id)
            ->select('name')
            ->first();
       
 
        return view('/groupe')->with(compact('user_role','group','Conversations'));

    }
    public function sendMessageGroupe(Request $request)
    {   
       

        
         $user_id=auth()->user()->id;
        $group_id=$request->group_id;
        $message=$request->message;
        
      
  
        Conversation::create([
            'message'=>$message,
            'user_id'=>$user_id,
            'group_id'=>$group_id,
            'is_read'=>0,
        ]);
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
        
        $d = ['group_id' => $group_id, 'user_id' => $user_id,'message'=>$message]; 
        $pusher->trigger('my-channel', 'my-event', $d);
    }
}
