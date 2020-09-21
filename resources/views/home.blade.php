@extends('layouts.homepage')

@section('content')
<div class="containe">
 
        <div class="home_page">   
     
            <div class="Social"> 
                <div class="profile_grid">
                    <div class="pro_grid_pic">
                         <img class="prof_pic" src="{{asset('storage/uploads/'.Auth::user()->profilepic )}}" > 
                    </div>
                        <div class="profile_infos"> 
                            <hr>
                            <div  id="infof"style = "text-transform:capitalize;">{{Auth::user()->name}}</div>
                            <hr>
                            <div id="infof" style = "text-transform:capitalize;">{{$user_role->name}}</div>
                            <hr>
                            <div >{{Auth::user()->bio}} </div>
                            
                           
                        </div>
                </div>
                <div class='groups'  >
                 @foreach($groups as $gr)    
                    <div class="group" jid="{{ $gr->id }}">
                        <div   class='name' id= "g{{ $gr->id }}"> {{$gr->name}}  </div>  
                        @if($gr->unread)
                        
                        <span class="pending">{{$gr->unread}}</span>
                        @endif                
                    </div> 
                     @endforeach    
                </div>
                <div class="friends">
                        


            <div class="friend-info">
              
                @if($user_role->name=='delegate' || $user_role->name=='admin')  
                <div class='friends-title'><h2>Teachers & Students</h2></div>
                @foreach($admins as $admin)
          
                <div class ="friend_profile" id="{{ $admin->id }}"> 

                    @if($admin->unread)
                         <span class="pending">{{$admin->unread}}</span>
                    @endif
                
                <div class='profile-cover' ><img class="friend_profile_pic"  src="{{asset('storage/uploads/'.$admin->profilepic )}}" ></div>
                <div>
                <div class='name' style ="text-transform:capitalize;">{{$admin->name}}</div>                  
                <div class='email'>{{$admin->email}}</div>
                
                </div> 
                </div>
            
               @endforeach 
          
                @foreach($teachers as $teacher)
             
                <div class ="friend_profile" id="{{ $teacher->id }}"> 

                    @if($teacher->unread)
                        
                         <span class="pending">{{$teacher->unread}}</span>
                    @endif
                
                <div class='profile-cover' ><img class="friend_profile_pic"  src="{{asset('storage/uploads/'.$teacher->profilepic )}}" ></div>
                <div>
                <div class='name' style ="text-transform:capitalize;">{{$teacher->name}}</div>                  
                <div class='email'>{{$teacher->email}}</div>
                </div> 
                </div>
            
               @endforeach 
               @foreach($delegate as $delegat ) 
             
                    <div class ="friend_profile" id={{ $delegat->user_id }}> 
                       
                        @if($delegat->unread)
                             <span class="pending">{{$delegat->unread}}</span>
                        @endif
                    
                    <div class='profile-cover' ><img class="friend_profile_pic"  src="{{asset('storage/uploads/'.$delegat->profilepic )}}" ></div>
                    <div>
                    <div class='name' style ="text-transform:capitalize;">{{$delegat->name}}</div>                  
                    <div class='email'>{{$delegat->email}}</div>
                    </div> 
                    </div>
              
                   @endforeach 
              
                @endif
                {{-- //////////////////////////////////////////////////// --}}

                @if($user_role->name=='delegate' )
                
          
                @foreach($studentss as $student)
             
                <div class ="friend_profile" id="{{ $student->user_id }}"> 

                    @if($student->unread)
                        
                         <span class="pending">{{$student->unread}}</span>
                    @endif
                <div class='profile-cover' ><img class="friend_profile_pic"  src="{{asset('storage/uploads/'.$student->profilepic )}}" ></div>
                <div>
                <div class='name' style ="text-transform:capitalize;">{{$student->name}}</div>                  
                <div class='email'>{{$student->email}}</div>
                </div> 
                </div>
               @endforeach 
              @endif
              
 {{-- //////////////////////////////////////////////////// --}}


                @if($user_role->name=='student')
                <div class='friends-title'><h2>Delegate of your class</h2></div>
          
                @foreach($delegate as $delegat ) 
             
                <div class ="friend_profile" id={{ $delegat->user_id }}> 
                   
                    @if($delegat->unread)
                        
                         <span class="pending">{{$delegat->unread}}</span>
                    @endif
                
                <div class='profile-cover' ><img class="friend_profile_pic"  src="{{asset('storage/uploads/'.$delegat->profilepic )}}" ></div>
                <div>
                <div class='name' style ="text-transform:capitalize;">{{$delegat->name}}</div>                  
                <div class='email'>{{$delegat->email}}</div>
                </div> 
                </div>
          
               @endforeach 
          
            
                @endif
               

               {{-- -------------------------------------- --}}
          @if($user_role->name=='professor' )     
        
            <div class='friends-title'><h2>Admins</h2></div>
                @foreach($admins as $admin)
                <div class ="friend_profile" id="{{ $admin->id }}"> 

                    @if($admin->unread)
                        
                         <span class="pending">{{$admin->unread}}</span>
                    @endif
                
                <div class='profile-cover' ><img class="friend_profile_pic"  src="{{asset('storage/uploads/'.$admin->profilepic )}}" ></div>
                <div>
                <div class='name'style ="text-transform:capitalize;" >{{$admin->name}}</div>                  
                <div class='email'>{{$admin->email}}</div>
                </div> 
                </div>
             @endforeach 
             @foreach($delegate as $delegat ) 
             
                <div class ="friend_profile" id={{ $delegat->user_id }}> 
                   
                    @if($delegat->unread)
                        
                         <span class="pending">{{$delegat->unread}}</span>
                    @endif
                
                <div class='profile-cover' ><img class="friend_profile_pic"  src="{{asset('storage/uploads/'.$delegat->profilepic )}}" ></div>
                <div>
                <p class='name' style ="text-transform:capitalize;">{{$delegat->name}}</p>                  
                <p class='email'>{{$delegat->email}}</p>
                </div> 
                </div>
          
               @endforeach 
               @endif 
            </div>
            </div>
        </div>
       
       
        <div class="feed">
             @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif
                @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('success') }}
                </div>
                @elseif(session('danger'))
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('danger') }}
                </div>
                @endif
            <div class="post_smth">
                <form method="POST" action="/files" enctype="multipart/form-data" >
                    @csrf
                <div class="select">
                <div id="slect_ti">Please select what major is concerned by the post:</div>
                <input class="checkbox-major" type="radio" id="allm" name="major" value="0">
                    <label for="allm">All majors</label>
                @foreach($majors as $major)
                    <input class="checkbox-major" type="radio" id="{{$major->major_name}}" name="major" value="{{$major->id}}">
                    <label for="{{$major->major_name}}"> {{$major->major_name}}</label>
                @endforeach
                <div id="slect_ti">Please select the type of the post:</div>
                @foreach($posttypes as $posttype)
                    <input class="checkbox-type" type="radio" id="{{$posttype->type_name}}" name="ptype" value="{{$posttype->id}}">
                    <label for="{{$posttype->type_name}}"> {{$posttype->type_name}}</label>
                @endforeach
                </div>
             
                <div class="textarea-pub">
                <textarea  name="body_text" role="textbox" class="textarea" placeholder="What do you wanna post, {{Auth::user()->name}} "cols="86"rows="3"contenteditable></textarea>
                </div> 
                
                <div class='publish'>
                    <label for="file-upload" class="photo-upload">
                        Photo
                    </label>
                    <input id="file-upload" name="image" type="file"/>
                
                    <label for="docs-upload" class="photo-upload">
                        File Upload
                    </label>
                    <input id="docs-upload" name="docs" type="file"/>
                
                <input type="submit" class="pub" value="publier">
                </div>
            </form>
            </div>
               <div class="all-posts">
               @foreach ($posts as $p)
            <div class="post">
           
              <div class="post_head">
                    <div class="pic">
                        <img class="pro_pic" src="storage/uploads/{{$p->profilepic}}">
                    </div>
                    <div class="post-info">
                    <div class="user_name">{{$p->name}}</div>
                    <span class='time-pub'>{{$p->created_at}}</span>
                    <span class ='post-tag'>{{$p->type_name}}</span>
                </div>
                    <div class="action">
                       <button class="dow"><i class="fa fa-download"></i></button>
                      <button class="warn"><i class="fa fa-warning"></i></button>
                    </div>
                
                </div> 
                 <div class="post_body">
                  
                        <div class="text-pub">
                        <p class="text-p">
                            {{$p->description}}
                        </p>   </div>
                            <div >
                               
                                <img class="img-pub"src="storage/uploads/{{$p->image}}">
                            </div>
                      
                 
               
                </div> 
              
            </div> 
            @endforeach
            </div>  
        </div>
      
            {{-- --------------- -----------------------------------------------------------------------------------------------------------}}




    

          <div class="col-md-12" > 
             
            <div class="messages"id="messages">
               <div class="mssg_header"> 
                        <h1 >Group Conversations </h1>
                        </div> 
                    
                       
                        <div class="mssg_body" id='mssg_body'>
                        </div>
                           
                            
                            <div class="msg-input">
                                {{-- <div class="msg-icons">
                                    <button style="font-size:100%"><i id="add"class="fa fa-plus-circle"></i></button><br>
                                    <button style="font-size:100%"><i id="photo"class="fa fa-camera" ></i></button><br>
                                    <button style="font-size:100%"><i id="voice"class="fa fa-microphone"></i></button><br>
                                </div>    --}}
                           
                                <div class="input-group">
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <textarea role="textbox" id="msg-control" placeholder="write message..." contenteditable></textarea>
                                     
                             
                                 </div>                  <button class="input-group-plane"><i class="fa fa-paper-plane"></i></button>
                        
                            </div> 
                        </div>

               
          </div>
</div>
</div>

@endsection
