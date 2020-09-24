<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  App\Admin_order;
use App\user;
use Illuminate\Support\Facades\DB;

class Admin_Order_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
         $orders=array();
         $user_role = db::table('roles')
        ->join('roleusers','roleusers.role_id','=','roles.id')
        ->where('roleusers.user_id','=',auth::id())
        ->first();
        if($user_role->name=='admin')
        {
        $orders= DB::table('orders')
        ->join('users','users.id','=','orders.user_id')
        ->join('students','students.user_id','=','orders.user_id')
        ->get();
        }
        else return view("ERROR")->with(compact("orders",'user_role'));
       
        return view("Admin_order")->with(compact("orders",'user_role'));

    }

    public function Process_Order(Request $request)
    {
        //$validadtion="";
        $user_role = db::table('roles')
        ->join('roleusers','roleusers.role_id','=','roles.id')
        ->where('roleusers.user_id','=',auth::id())
        ->first();
      
             $processed=DB::table('orders')
        ->where('order_id','=',$request->input('Ord_ID' ))
        ->delete();

        $orders= DB::table('orders')
        ->join('users','users.id','=','orders.user_id')
        ->join('students','students.user_id','=','orders.user_id')
        ->get();
      
       
        
        return view("Admin_order")->with(compact("orders","processed","user_role"));
}
}
