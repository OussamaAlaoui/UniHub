<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  App\Order;
use App\user;
use Illuminate\Support\Facades\DB;
use App\Student;
class OrderController extends Controller
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
      
        $reject=0;
        $students=Student::where('user_id','=',auth::user()->id)->first();
        $validation="";
        $error="";
        if( $user_role->name =='student')
        {
           
            if($students->is_activated==1)
            return view("order")->with(compact("validation",'user_role','error'));
            else 
            return view('activacc')->with(compact("validation",'user_role','error'));
        }
         else 
     
        return view("order")->with(compact("validation",'user_role','error'));

    }
    public function order(request $request )
    {
        $error="";
        $reject=0;
        $validation="";
        $user_role = db::table('roles')
        ->join('roleusers','roleusers.role_id','=','roles.id')
        ->where('roleusers.user_id','=',auth::id())
        ->first();
        $check= DB::table('orders')
            ->where('user_id','=',Auth::user()->id  )
            ->count();
            
       
     if($request -> input("amount")&&$request -> input ('Justification')  && $request -> input ('document_type') && $check < 3  )
     {
        

         order::create([
             "user_id"=>Auth::user()->id,
             "doc_type"=>$request->input ("document_type") ,
             "amount"=>$request->input ("amount") ,
             "reason"=>$request->input ("Justification") 
         ]);
     $validation="Your documents have been ordered!";
     }
        else
        {

           if($check < 3 )
            {
            if(!$request -> input("amount")) 
            $reject++;
            if(!$request -> input("Justification")) 
            $reject++;
            if(!$request -> input("document_type")) 
            $reject++;

            if (!$request -> input("amount")&&$request -> input ('Justification')  && $request -> input ('document_type') )
            $validation="Please fill in the amount you want to order!";
            if ($request -> input("amount")&& !$request -> input ('Justification')  && $request -> input ('document_type') )
            $validation="Please fill in the justification for your order!";
            if ($request -> input("amount")&&$request -> input ('Justification')  && !$request -> input ('document_type') )
            $validation="Please select in the a document type to order!";
            if ($reject>1 )
            $error="Please fill in all the inputs to order!";
           }
              else
                $error="You have reached the limit of orders. If you still need more documents or think this message is an error, please contact the administration.";
        }
    
    

    
   
        return view('order')->with(compact("validation",'user_role','error'));
    }
}
