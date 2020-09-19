<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Class_l;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class RegisterController extends Controller
{
    public function register()
    { $user_role = db::table('roles')
        ->join('roleusers','roleusers.role_id','=','roles.id')
        ->where('roleusers.user_id','=',auth::id())
        ->first();
         $classes=Class_l::all();
         return view('auth.register')->with(compact('classes','user_role'));
    }
}
