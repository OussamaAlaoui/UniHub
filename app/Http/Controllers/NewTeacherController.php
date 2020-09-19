<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Class_l;
use App\Subject;
use App\Role;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Professor;
use App\Teache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Profiler\Profiler;

class NewTeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function teacher()
    {
        $user_role = db::table('roles')
        ->join('roleusers','roleusers.role_id','=','roles.id')
        ->where('roleusers.user_id','=',auth::id())
        ->first();
        $validate="";
        $classes=Class_l::all();
        $subjects=Subject::all();
        if($user_role->name=='admin')
        {
                 return view('create_t')->with(compact('classes','subjects','validate','user_role'));

      
        }
        else return view("ERROR")->with(compact('classes','subjects','validate','user_role')); 
    }
    public function create_t(request $request)
    { $user_role = db::table('roles')
        ->join('roleusers','roleusers.role_id','=','roles.id')
        ->where('roleusers.user_id','=',auth::id())
        ->first();
            $validate="";
        $classes=Class_l::all();
        $subjects=Subject::all();
    $message="";
    $this->validate($request, [
        'professor_id'=>['required'],
     'name' => ['required', 'string', 'max:255'],
     'username'=>['required', 'string', 'max:255'],
     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
     'password' => ['required', 'string', 'min:3', 'confirmed'],
     'class'=>['required'],
     'subject'=>['required'],
 ]);
         $professorRole=Role::where('name','professor')->first();
       
 
        $user=user::create([
             'name' => $request->input('name'),
             'username'=>$request->input('username'),
             'email' => $request->input('email'),
             'password' => Hash::make($request->input('password')),
         ]);
         $subject=Subject::where('subject_name','=',$request->input('subject'))->first();
         $class=class_l::where('level','=',$request->input('class'))->first();
   
    $prof=Professor::create([
      'user_id'=>$user->id,
        'professor_id'=>$request->input('professor_id'),
    ]);

    Teache::create([
        'prof_id'=>$request->input('professor_id'),
        'class_id'=>$class->id,
        'subject_id'=>$subject->id,
      
        
        ]);
      
    $user->roles()->attach($professorRole);
  
$validate="New professor created:success.";
         
    return view('create_t')->with(compact('classes','subjects','validate','user_role'));
        }
}
