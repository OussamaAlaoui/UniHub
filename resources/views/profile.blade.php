@extends('layouts.registerpage')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
              <div class="card-header">
                <div class="pro_grid_pic">
                <img src="{{asset('storage/uploads/'.Auth::user()->profilepic )}}"  ></div> <div> <h2 id='user_name'style = "text-transform:capitalize;">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h2></div>
           </div>     
           <div class="card-body">
            
              <form  action="/profile" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-prof-body">
               <div class="prof-input"> <input type="file" name="profile"  data-buttonText="edit"><br></div>
               <div class="pro">   <textarea role="textbox" id="bio" name='bio' placeholder="your bio.." contenteditable></textarea><br></div>
                <input type="submit" class="btn btn-sm btn-primary" ></div>
              </form>
                </div>
        </div>
    </div>
</div>
@endsection
