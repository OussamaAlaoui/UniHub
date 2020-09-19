<div class="mssg_header"> 
    <h3 class='chat'>Conversation de group <span class='group_name' style ="text-transform:capitalize;"> {{$group->name}}</span> </h3>
    </div> 
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="mssg_body" id='mssg_body'>
      @foreach($Conversations as $Conversation) 
        @if($Conversation->user_id == Auth::id())
       <div class="outgoing-chats" >  
                                        <div class="outgoing-chats-img">
                                        </div>
                                        <div class="outgoing-msg">
                                            <div class="outgoing-msg-inbox">
                                                <img src="">
                                                <span class="sender-name">You</span><br>

                                                <p >  {{$Conversation->message}}</p>
                                          
                                           <span class='time'> {{ date('d M y,h:i a',strtotime($Conversation->created_at))}}</span>
                                           
                                            </div>
                                        </div> 
                                 
                                </div>
                                @else
                              <div class="received-chats">
                                  
                                    <div class="received-chats-img">
                                        </div>
                                        <div class="received-msg">
                                            <div class="received-msg-inbox-group">
                                                <p>
                                               <span class="sender-name">{{$Conversation->name}}</span><br>
                                               <span>  {{$Conversation->message}}</span></p><br>
                                                <span class='time'> {{ date('d M y,h:i a',strtotime($Conversation->created_at))}}</span> 
                                            </div>
                                        </div>
                                </div>
                             
     @endif
    @endforeach

</div> 

        @csrf
    <div class="msg-input-group">
        <div class="msg-icons">
            <button style="font-size:100%"><i id="add"class="fa fa-plus-circle"></i></button><br>
            <button style="font-size:100%"><i id="photo"class="fa fa-camera" ></i></button><br>
            <button style="font-size:100%"><i id="voice"class="fa fa-microphone"></i></button><br>
        </div>   
   
        <div class="input-group">
            <textarea role="textbox" id="msg-control-group" placeholder="write message..." contenteditable></textarea>
         </div>                  <button class="input-group-plane"><i class="fa fa-paper-plane"></i></button>

    </div> 
   
  

    