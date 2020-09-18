<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Class_l;
use App\Groupusers;
use App\student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function groups()

    { $valide="";
        $classes=Class_l::all();
        $users="";
        $user_role = db::table('roles')
        ->join('roleusers','roleusers.role_id','=','roles.id')
        ->where('roleusers.user_id','=',auth::id())
        ->first(); 
        if($user_role->name=='admin')
        {
       
        $users=  db::table('users')
        ->join('roleusers','roleusers.user_id','=','users.id')
        ->where('roleusers.role_id','=',1)
        ->orwhere('roleusers.role_id','=',3)
        ->get();
        }
        else return view("ERROR")->with(compact('valide','user_role','classes','users','user_role'));
        return view('create_g')->with(compact('valide','classes','users','user_role'));
    }
    public function create_groups(Request $request)
    { 
        $user_role = db::table('roles')
        ->join('roleusers','roleusers.role_id','=','roles.id')
        ->where('roleusers.user_id','=',auth::id())
        ->first();
        $class="";
        $valide="";
        $Gnames=$request->input("class");
        if($request->has('Gname')&&$request->input('Gname'))
        {
           $group=Group::create([
                'name'=>$request->input('Gname')
                    ]);  
           }

   if($request->has('class')&&$request->input('class'))
            {  
               
        foreach($Gnames as $Gname)
        {

               // $class= $request->input('class');
                $class=$Gname;
                $class_std=student::where('class',  $class)->get(); 
              
              
              
                    $valide="Group creation : success ";
 
            foreach ($class_std as $cs)
             {
                groupusers::create([
                    'group_id'=>$group->id,
                    'user_id'=>$cs->user_id,
                ]);
             } 
        }
      

        if($request->has('others')&&$request->input('others'))
        {
             $others=$request->input('others');
       
        // dd( $request->input('others'));
         foreach($others as $other)
    
             {
        if($others!=null)
        {
          $user=user::where('name','=',$other)->first();
          
       $groupusers=groupusers::create([
            'group_id'=>$group->id,
            'user_id'=>$user->id,
            ]); 
        }
     
        }  
        }
     
   
       

        }
                $classes=Class_l::all();
        $users=  db::table('users')
        ->join('roleusers','roleusers.user_id','=','users.id')
        ->where('roleusers.role_id','=',1)
        ->orwhere('roleusers.role_id','=',3)
        ->get();
       
        return view('create_g')->with(compact('valide','classes','users','user_role'));
    }

   
}
