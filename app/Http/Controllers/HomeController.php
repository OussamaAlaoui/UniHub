<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Group;
use App\Groupusers;
use App\Subject;
use App\post;
use App\posttype;
use App\major;
use App\Student;
use App\Professor;
use App\Class_l;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   
    public function index()
    {

        $posts=post::orderBy('posts.created_at', 'desc')
        ->join('users','users.id','posts.user_id')
        ->join('posttypes','posttypes.id','posts.posttype_id')
        ->join('majors','majors.id','=','posts.subject_id')
        ->get();

        $groups=[];
        $i=0;
       $groupIds = Groupusers::where('user_id',auth::user()->id)->get();
  
    
    foreach($groupIds as $gi)
       {
       $groups[$i]= Group::where('id','=',$gi->group_id)->first();
        $i++;
       }  
      
      
       $students=student::where('students.user_id','=',auth::user()->id)->first();

        $teachers = Professor::join('users','users.id','=','professors.user_id')
        ->where('users.id','<>',auth::user()->id)
        ->get();
    
        $users = User::where('id', '<>', auth()->user()->id)->get();
        
        $user_role = db::table('roles')
        ->join('roleusers','roleusers.role_id','=','roles.id')
        ->where('roleusers.user_id','=',auth::user()->id)
        ->first(); 
        
       $admins=user::join('roleusers','roleusers.user_id','=','users.id')
       ->where('users.id','<>',auth::user()->id)
       ->where('roleusers.role_id','=',1)
       ->get();
       $delegate=user::where('users.id','<>',auth::user()->id)
       ->join('roleusers','roleusers.user_id','=','users.id')
       ->where('roleusers.role_id','=',2)
       ->get();
       $subjects =  Subject::all();
       $studentss=student::join('users','users.id','=','students.user_id')
       ->join('roleusers','roleusers.user_id','=','users.id')
       ->where('roleusers.role_id','=',4)
       ->get();
       $majors=major::all();
       $posttypes=posttype::all();
       $classes=class_l::all();
        if( $user_role->name =='student')
        {
          
           if($students->is_activated==1)
           return view('/home')->with(compact('posts','classes','users','majors','groups','subjects','posttypes','user_role','teachers','admins','delegate','studentss'));
             else 
             return view('activacc')->with(compact('posts','classes','majors','users','subjects','posttypes','groups','user_role','teachers','admins','delegate','studentss'));
        }
         else 
        return view('/home')->with(compact('posts','classes','majors','users','subjects','groups','posttypes','user_role','teachers','admins','delegate','studentss'));
     
    }
    
}
