<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Student;
use App\User;
class ActivationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $students=array();
        $user_role = db::table('roles')
        ->join('roleusers','roleusers.role_id','=','roles.id')
        ->where('roleusers.user_id','=',auth::id())
        ->first();
        $students=Student::where('is_activated','=',0)
        ->join('users','users.id','=','user_id')
        ->get();
        if($user_role->name=='admin')
        {
        return view('activate_user')->with(compact('user_role','students'));
        }
        else return view("ERROR")->with(compact('user_role'));
    }
    public function activate(Request $request)
    {
        $user_role = db::table('roles')
        ->join('roleusers','roleusers.role_id','=','roles.id')
        ->where('roleusers.user_id','=',auth::id())
        ->first();
    
    
        if($request->input('delete'))
        {    
            $dstudents=Student::where('student_id','=',$request->input('delete'))
        ->join('users','users.id','=','user_id')
        ->first();
             student::where('student_id','=',$request->input('delete'))->delete();
            user::where('id','=',$dstudents->user_id)->delete();
          
        }
        else{
             $student_active=Student::where('student_id','=',$request->input('std_id'))->first();
        $student_active->is_activated=1;
        $student_active->save();
        
        }
         $students=Student::where('is_activated','=',0)
        ->join('users','users.id','=','user_id')
        ->get();
        return view('activate_user')->with(compact('user_role','students'));
    }
}
