<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Role;
use App\roleuser;
class ModifyStuentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    { 
        
        $user_role = db::table('roles')
        ->join('roleusers','roleusers.role_id','=','roles.id')
        ->where('roleusers.user_id','=',auth::id())
        ->first();
       
        $users="";
        $error="";
        $valide="";    
     
        if($user_role->name=='admin')
        {
             $users=  db::table('users')
        ->join('roleusers','roleusers.user_id','=','users.id')
        ->where('roleusers.role_id','=',1)
        ->orwhere('roleusers.role_id','=',3)
        ->get(); 

     
        }
        else return view("ERROR")->with(compact('valide','users',"error",'user_role')); 
        return view('Modify_satut')->with(compact('valide','users',"error",'user_role'));
    }
    public function modify(Request $request)
    {
     //dd($request->input('role'));
        $user_role = db::table('roles')
        ->join('roleusers','roleusers.role_id','=','roles.id')
        ->where('roleusers.user_id','=',auth::id())
        ->first();
     
        $studentRole=Role::where('name','student')->first();
        $delegateRole=Role::where('name','delegate')->first();
        $users="";
        $error="";
        $valide="";    
        if($request->input('student_id')) 
        {
            if($user_role->name=='admin')
        {
             $users=  db::table('users')
        ->join('roleusers','roleusers.user_id','=','users.id')
        ->where('roleusers.role_id','=',1)
        ->orwhere('roleusers.role_id','=',3)
        ->get();
        $student=Student::where('student_id','=',$request->input('student_id'))
        ->join('users','users.id','=','students.user_id')
        ->first();

        $roleuser=roleuser::where('user_id','=',$student->user_id)->first() ;

    
        if($request->input('role')=="Delegate")
        {   
            //$user->roles()->attach($delegateRole);
           
           $roleuser->role_id=2;
            $roleuser->save();
        }
          else if($request->input('role')=="Student")
           {
           // $user->roles()->attach($studentRole);
            $roleuser->role_id=4;
            $roleuser->save();
           }
            

            
        $valide="Student's Role modifyed: success";   
        }
        else return view("ERROR")->with(compact('valide','groups','users',"error",'user_role')); 
        return view('Modify_satut')->with(compact('valide','users',"error",'user_role')); 
       }
        else 
        {
            $error="Please enter the student id!!";
        }
        return view('Modify_satut')->with(compact('valide','users',"error",'user_role')); 
       
    }
}
