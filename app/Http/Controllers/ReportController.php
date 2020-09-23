<?php

namespace App\Http\Controllers;
use App\post;
use App\report;
use Illuminate\Http\Request;

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
}
