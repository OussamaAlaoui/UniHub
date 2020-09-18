<div class="mssg_header">  
    <div class='contact-name'><h5 style ="text-transform:capitalize;"><img src="{{asset('storage/uploads/'.$user->profilepic )}}" > {{$user->name}}</h5></div>
       
    </div> 
 
    <div class="mssg_body" id='mssg_body'>
     @foreach($messages as $message) 

        @if($message->from == Auth::id())
       <div class="outgoing-chats" >  
                                        <div class="outgoing-chats-img">
                                        </div>
                                        <div class="outgoing-msg">
                                            <div class="outgoing-msg-inbox">
                                                
                                                <p >{{$message->message}}</p>
                                                <span class='time'> {{ date('d M y,h:i a',strtotime($message->created_at))}}</span>
                                          
                                            </div>
                                        </div> 
                                 
                                </div>
                                @else
                              <div class="received-chats">
                                  
                                    <div class="received-chats-img">
                                            {{-- <img id="user_img{{$message->from}}" src="storage/uploads/{{$user->profilepic}}"> --}}
                                        </div>
                                        <div class="received-msg">
                                            <div class="received-msg-inbox">
                                               
                                                <p >  {{$message->message}}</p><br>
                                                <span class='time'> {{ date('d M y,h:i a',strtotime($message->created_at))}}</span> 
                                            </div>
                                        </div>
                                </div>
                             
     @endif
    @endforeach </div>
    
        @csrf
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
   
  

    