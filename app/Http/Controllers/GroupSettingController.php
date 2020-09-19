<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class GroupSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    { $user_role = db::table('roles')
        ->join('roleusers','roleusers.role_id','=','roles.id')
        ->where('roleusers.user_id','=',auth::id())
        ->first();
        if($user_role->name=='admin')
        {
              return view('groups')->with(compact('user_role'));
        }
        else return view("ERROR")->with(compact('user_role'));
     
    }
}
