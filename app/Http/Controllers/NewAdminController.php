<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class NewAdminController extends Controller
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
        $message="";
        if($user_role->name=='admin')
        {
         
      return view('Mod_Adm')->with(compact('message','user_role'));
        }
        else return view("ERROR")->with(compact('message','user_role')); 
       
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {
        $user_role = db::table('roles')
        ->join('roleusers','roleusers.role_id','=','roles.id')
        ->where('roleusers.user_id','=',auth::id())
        ->first();
        $message="";
   $this->validate($request, [
    'name' => ['required', 'string', 'max:255'],
    'username'=>['required', 'string', 'max:255'],
    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    'password' => ['required', 'string', 'min:3', 'confirmed'],
    'role'=>['required'],
     


]);
        $adminRole=Role::where('name','admin')->first();
        $moderatorRole=Role::where('name','moderator')->first();

       $user=user::create([
            'name' => $request->input('name'),
            'username'=>$request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
       if($request->input('role')!='Admin')
     
     $user->roles()->attach($moderatorRole);
    else 
     $user->roles()->attach($adminRole);
    $message="User creation : success";
     // return $user;
      return view('Mod_Adm')->with(compact('message','user_role'));
    }
}
