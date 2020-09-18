<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Class_l;
use App\Groupusers;
use App\student;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Auth;

class MgroupsController extends Controller
{    public function __construct()
    {
        $this->middleware('auth');
    }
    public function mgroups()
    { 
        
        $user_role = db::table('roles')
        ->join('roleusers','roleusers.role_id','=','roles.id')
        ->where('roleusers.user_id','=',auth::id())
        ->first();
        $classes=Class_l::all();
        $users="";
        $error="";
        $valide="";   $groups = Group::all();   
        if($user_role->name=='admin')
        {
             $users=  db::table('users')
        ->join('roleusers','roleusers.user_id','=','users.id')
        ->where('roleusers.role_id','=',1)
        ->orwhere('roleusers.role_id','=',3)
        ->get(); 
     
        }
        else return view("ERROR")->with(compact('valide','groups','classes','users',"error",'user_role')); 
        return view('modify_g')->with(compact('valide','groups','classes','users',"error",'user_role'));
    }





    public function modify_groups(Request $request)
    { 
        
        $user_role = db::table('roles')
        ->join('roleusers','roleusers.role_id','=','roles.id')
        ->where('roleusers.user_id','=',auth::id())
        ->first();
         $groupusers="";
        $allgrusers='';
        $class="";
        $valide="";
        $conf=0;
        $error='';
        $allgrusers=groupusers::all();
          
        $class= $request->input('class');
      
    
      
       
    
     
        $gr=  $request->input('groups');
        $gr_id=group::where('name','=',$gr)->first();
      $classes=Class_l::all(); 
      if($request->has('groups'))
        { 
            if($request->input('add')) 
            {
//-----------------------add-------------------------------
 //---------------------test_user_exist----------------------- 
 if($request->has('user')&&$request->input('user'))
 {
    $others=$request->input('user');  
    foreach($others as $other)
    {
        $ouser=user::where('name','=',$other)->first();
               if( $ouser)
               {
                    foreach($allgrusers as $agu)
               {
                   if($agu->user_id==$ouser->id && $agu->group_id==$gr_id->id)
                   {
                      
                       $conf=1;
                   }
                   
               }
               if($ouser)
    {
        if($conf==0)
        {
   
        $groupusers=groupusers::create([
        'group_id'=>$gr_id->id,
        'user_id'=>$ouser->id
        ]);
        $valide="Group Modification : success ";
}
else $error='This user is already a member of this group!!';
}
               }  
    }
      
    
    
 }
    
  
           
//---------------------test_class-----------------------

if($request->has('class')&&$request->input('class'))
{
  foreach($allgrusers as $agu)
           {
               foreach($class as $clas)
               { 
                   $class_std=student::where('class',  $clas)->get(); 
                    foreach ($class_std as $cs)
                    {
                    if($agu->user_id==$cs->user_id && $agu->group_id==$gr_id->id)
                
                        
                        $conf=1;
                    
                    }

               }
           
           }

        if($conf==0)
           { 
               foreach($class as $clas)
            { 
                $class_std=student::where('class',  $clas)->get();
                 foreach ($class_std as $cs)
                {
                        
                    $groupusers=groupusers::create([
                        'group_id'=>$gr_id->id,
                        'user_id'=>$cs->user_id,
                    ]);
                   
                } 
            }$valide="Group Modification : success ";
           } else $error='The users in this class are already a member of this group!!';
}
         
         
       
     
      }
      //--------------------------------delete------------------------
      else
      {
        
        $allgrusers=groupusers::all();
      
       // $class= $request->input('class');
      
       
        $others=$request->input('user');
        //$class_std=student::where('class',  $class)->get(); 
        $gr=  $request->input('groups');
        $gr_id=group::where('name','=',$gr)->first();
        //---------------------test_user_exist----------------------- 
        if($request->has('user')&&$request->input('user'))
        {
        foreach($others as $other)
        {  
             $ouser=user::where('name','=',$other)->first();
        if( $ouser)
        {
             foreach($allgrusers as $agu)
        {
            if($agu->user_id==$ouser->id && $agu->group_id==$gr_id->id)
            {
               
                $conf=1;
            }
            
        }
        }
        if($ouser)
        {
   if($conf==1)
   {
    $groupusers=groupusers::where('group_id','=',$gr_id->id)
    ->where('user_id','=',$ouser->id)->delete();
            
            $valide="user removed : success ";
   }
   else $error='This user is not a member of this group!!';
        }
        }
        
    }
       
       //---------------------test_class-----------------------
       if($request->has('class')&&$request->input('class'))
       {
        foreach($allgrusers as $agu)
        {
            foreach($class as $clas)
            { 
                $class_std=student::where('class',  $clas)->get(); 
                 foreach ($class_std as $cs)
                 {
                 if($agu->user_id==$cs->user_id && $agu->group_id==$gr_id->id)
             
                     
                     $conf=1;
                 
                 }

            }
        
        }
       if($conf==1)
       {
           foreach($class as $clas)
        { 
            $class_std=student::where('class',  $clas)->get(); 
             foreach ($class_std as $cs)
            {
                    
                $groupusers=groupusers::where('group_id','=',$gr_id->id)
                ->where('user_id','=',$cs->user_id)->delete();
               
               
            }
        }
        $valide="user removed  : success ";
       } 
       else $error='The users in this class are not a member of this group!!';
   
       }
  
    
      }
       
        
           
     }  
  
       
             
        $groups = Group::all(); 
     
        $users=  db::table('users')
        ->join('roleusers','roleusers.user_id','=','users.id')
        ->where('roleusers.role_id','=',1)
        ->orwhere('roleusers.role_id','=',3)
        ->get();
        return view('modify_g')->with(compact('valide','groupusers','classes','users','groups','error','user_role'));
    }
    
}
