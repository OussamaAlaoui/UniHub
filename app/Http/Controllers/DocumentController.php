<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Documents;
use App\post;
use App\Images;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home');
    }

    /**
     * Store a newly created resource in storage.
     *
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
           
        ]);   
       
        $post=Post::create([
            'user_id' => auth::id(),
            'subject_id'=>$request->major,
            'posttype_id' => $request->ptype,
            'description' =>$request->body_text,
        ]);
       
        $post->save();
        if($request->file('docs'))
        {
            $file=$request->file('docs');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->file('docs')->move('storage/'.$filename);
            $doc=new Documents;  
            $doc->post_id=$post->id;
            $doc->file=$filename;
            $doc->save();
        }
        else if($request->file('image'))
        {
            $this->validate($request,[
                'image'=>'image|nullable|max:1999'
            ]);   
            $filenameWithExt=$request->file('image')->getClientOriginalName();
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension=$request->file('image')->getClientOriginalExtension();
            $fileNameToStore=$filename.'_'.time().'.'.$extension; 
            $image=new images;
            $image->image=$fileNameToStore;
            $image->post_id=$post->id;
        }
      
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
