<?php

namespace App\Http\Controllers;
use App\post;
use App\report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
   
    public function report($id)
    {
        $post=post::where("post_id","=",$id)->first();
        $report=new report;
        $report->user_id=$post->user_id;
        $report->post_id=$id;
        $report->save();
        return redirect()->route("home");
    } 
    public function list_reports()
    {
        $reports=report::all();
        $user_role = db::table('roles')
        ->join('roleusers','roleusers.role_id','=','roles.id')
        ->where('roleusers.user_id','=',auth::user()->id)
        ->first(); 

        return view('reports',compact('reports','user_role'));
    }
    public function verify_reports(request $request ,$id)
    {
      
         if($request->input("dlt_post"))
         {
            
                    post::where("post_id","=",$request->input("dlt_post"))->delete();
                    report::where("id","=",$id)->delete() ; 

         }
  
         else
         {
            report::where("id","=",$id)->delete() ; 
          
         }
         
         return redirect()->route("reports");
    }
}
