<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use App\Student;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function profile(){
        $user_role = db::table('roles')
        ->join('roleusers','roleusers.role_id','=','roles.id')
        ->where('roleusers.user_id','=',auth::id())
        ->first();
        $students=Student::where('user_id','=',auth::user()->id)->first();
        if( $user_role->name =='student')
        {
           
            if( $students->is_activated==1)
            return view('/profile',array('user'=>auth::user()))->with(compact('user_role'));
            else 
            return view('activacc')->with(compact('user_role'));
        }
         else 
        return view('/profile',array('user'=>auth::user()))->with(compact('user_role'));
       
     }
     public function update_photo(Request $request)
     {
        $user_role = db::table('roles')
        ->join('roleusers','roleusers.role_id','=','roles.id')
        ->where('roleusers.user_id','=',auth::id())
        ->first();
            $user=auth::user();
         if($request->hasFile('profile'))
         {
             $filename=$request->profile->getClientoriginalname(); 
             $request->profile->storeas('uploads',$filename,'public');
            
         //    $user->profilepic->update(['profilepic'=>$filename]);
           
                    
        
        
       
             $user->profilepic=$filename;
                $user->save();
            
           
         }

      //   dd($request->has('bio'));
        if($request->has('bio')&&$request->input('bio'))
         {
              $bio=$request->input('bio');
            
              $user->bio=$bio;
              $user->save();
         
         }
         

        
         return view('/profile',array('user'=>auth::user()))->with(compact('user_role'));
     } 
  
}
