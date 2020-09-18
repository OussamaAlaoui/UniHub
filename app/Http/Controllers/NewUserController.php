<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Role;
use App\User;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class NewUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function newuser()
    { $user_role = db::table('roles')
        ->join('roleusers','roleusers.role_id','=','roles.id')
        ->where('roleusers.user_id','=',auth::id())
        ->first();
        $message="";
        if($user_role->name=='admin')
        {

              return view('addusers')->with(compact('message','user_role'));

        }
        else return view("ERROR")->with(compact('message','user_role')); 
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
  
   
}
