<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Post;
use App\Groupusers;
use App\Group;
use Illuminate\Support\Facades\Session;
use Spatie\PdfToImage\Pdf;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //    $data['posts'] = Post::with('user','reportPost')->get();
        // dd($data);
       // dd("this is the rescourse index!!!!");
       // return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     

    }

    /**
     * Store a newly created resource in storage.
     *xx
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
  
        $validator = Validator::make($request->all(), [
            'description'          => 'required',
        ]);
        
        $this->validate($request,[
            'body_text'=>'required',
            'ptype'=>'required',
            'major'=>'required',
            'image'=>'image|nullable|max:1999'
        ]);   
    
        if($request->hasFile('image'))
        {
            $filenameWithExt=$request->file('image')->getClientOriginalName();
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension=$request->file('image')->getClientOriginalExtension();
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            $path=$request->file('image')->storeAs('public/post_images',$fileNameToStore);
           // dd($path);
          
        }
        else 
        {
            $fileNameToStore=NULL;
        }
        $post =new Post;
        $post->user_id=auth::id();
        $post->subject_id=$request->major;
        $post->posttype_id=$request->ptype;
        $post->text=$request->body_text;
        if($fileNameToStore!=NULL)
        $post->image=$fileNameToStore;

        $post->save();
        return redirect('/home')->with('success','Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
