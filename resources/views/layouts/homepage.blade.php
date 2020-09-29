<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Hepta+Slab:wght@700&display=swap" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
    <!-- Styles -->
     <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
   <link href="{{ asset('css/home.css') }}" rel="stylesheet"> 
   <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
           
             
             <div class="container-r">   
              
               <a class="navbar-brand" id='uni' href="{{ url('/home') }}" style = "text-transform:capitalize;">  
                <img class="school_logo" src="/images/unihub.png" >    
                   {{ config('app.name', 'Laravel') }}
               </a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                   <span class="navbar-toggler-icon"></span>
               </button>

               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   <!-- Left Side Of Navbar -->
                   <ul class="navbar-nav mr-auto">

                   </ul>

                   <!-- Right Side Of Navbar -->
                   <ul class="navbar-nav ml-auto">
                       <!-- Authentication Links -->
                       @guest
                           <li class="nav-item">
                               <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                           </li>
                           @if (Route::has('register'))
                               <li class="nav-item">
                                   <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                               </li>
                           @endif
                       @else
                           <li class="nav-item dropdown">
                               <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                 <span class="caret" style = "text-transform:capitalize;">  {{ Auth::user()->first_name }}  {{ Auth::user()->last_name }}</span>
                               </a>

                               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   <a class="dropdown-item" href="{{ route('profile') }}">
                                       <i  class="fa fa-btn fa user"></i>Profile</a>
                                      
                                    @if($user_role->name=='admin' )
                                        <a class="dropdown-item"  href="{{ route('Groups_Setting') }}">
                                            
                                                 
                                                     {{ __('Group Settings') }}   
                                                 
                                       
                                         </a>
     @endif
     @if($user_role->name=='admin' ) 
     <a class="dropdown-item"  href="{{ route('active') }}">
      
     
                 {{ __('Activate User') }}   
             
                
     </a> @endif
                                         @if($user_role->name=='admin' )
                                         <a class="dropdown-item"  href="{{ route('addusers') }}">
                                         
                                                 
                                                     {{ __('Add Users') }}   
                                                 
                                       
                                         </a>   @endif
                                         @if($user_role->name=='admin' ) 
                                         <a class="dropdown-item"  href="{{ route('Process_Order') }}">
                                     
                                         
                                                    {{ __('View Orders') }}   
                                                
                                                 
                                        </a>     @endif
                                        @if($user_role->name=='admin' ) 
                                        <a class="dropdown-item"  href="/reports">
                                         
                                        
                                                    {{ __('Posts Reports') }}   
                                                
                                                   
                                        </a> @endif
                                         @if($user_role->name=='student' || $user_role->name=='delegate' ) 
                                        <a class="dropdown-item"  href="{{ route('order') }}">
                                         
                                        
                                                    {{ __('Order Documents') }}   
                                                
                                                   
                                        </a> @endif
                                      
                                        @if($user_role->name=='admin' ) 
                                        <a class="dropdown-item"  href="{{ route('modify_statut') }}">
                                         
                                        
                                                    {{ __('Modify Statut') }}   
                                                
                                                   
                                        </a> @endif
                                   <a class="dropdown-item" href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                       {{ __('Logout') }}
                                   </a>

                                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                       @csrf
                                   </form>
                               </div>
                           </li>
                       @endguest
                   </ul>
               </div>
           </div>
       </nav>

        <div class="cont"> 
      
            @yield('content')
   
    </div>
    <script src="https://js.pusher.com/6.0/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script  type="text/javascript">
        var receiver_id=''; var group_id='';
         var my_id="{{Auth::id()}}";
         $(document).ready(function(){


           
            $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
         
                Pusher.logToConsole = true;

            var pusher = new Pusher('4f0b8b172c4a471d1346', {
            cluster: 'eu'
            });
            
            var channel = pusher.subscribe('my-channel');
            
            channel.bind('my-event', function(data) {
          
            if(my_id==data.from)
            {
      
           $('#'+data.to).click();
               
            }
          
            else if(my_id==data.to )
            {
                if(receiver_id==data.from)
                {
                    $('#'+data.from).click();
                }
                else{
                    var pending=parseInt($('#'+data.from).find('.pending').html());
                   
                    if(pending)
                    {
                        $('#'+data.from).find('.pending').html(pending+1);
                    }
                    else
                    {
                        $('#'+data.from).append('<span class="pending">1</span>');
                    }
                }
            }
            });

            //---------------------------------------------
            channel.bind('my-event', function(data) {
            if(group_id==data.group_id)
            {
                $('#g'+data.group_id).click();
              
            }
            else if(my_id==data.group_id )
            {
                if(receiver_id==data.group_id )
                {
                    $('#'+data.group_id ).click();
                }
                else{
                    var pending=parseInt($('#'+data.group_id ).find('.pending').html());
                    if(pending)
                    {
                        $('#'+data.group_id ).find('.pending').html(pending+1);
                    }
                    else
                    {
                        $('#'+data.group_id ).append('<span class="pending">1</span>');
                    }
                }
            }
            });

           

       

            $('.friend_profile').click(function(){
          
             $('.friend_profile').removeClass('active');
                $(this).addClass('active');
                $(this).find('.pending').remove();
                receiver_id =$(this).attr('id');
              
                $.ajax({
                    type:"get",
                    url:"message/"+receiver_id,
                    data:"",
                    cache:false,
                    
                     success:function(data)
                    {  
                         $('#messages').html(data);   
                        // alert(data);
                        var chatHistory = document.getElementById("mssg_body");
                         chatHistory.scrollTop = chatHistory.scrollHeight;
                    }
                });
                 
            }); 
            //--------to_get_the_messege------ 
        $('.group').click(function(){
          
          $('.group').removeClass('active');
             $(this).addClass('active');
             $(this).find('.pending').remove();
             group_id =$(this).attr('jid');
           
             $.ajax({
                 type:"get",
                 url:"groupe/"+group_id,
                 data:"",
                 cache:false,
                 
                   success:function(data)
                 {  
                      $('#messages').html(data);   
                     var chatHistory = document.getElementById("mssg_body");
                      chatHistory.scrollTop = chatHistory.scrollHeight;
                 }
             });
              
         }); 
      
          
         $(document).on('click','.msg-input-group button',function()
             {  
              
                var message_g= document.getElementById("msg-control-group").value;
      
                if( message_g!="" && group_id!="")
                {
                   
                    document.getElementById("msg-control-group").value="";
                    var datagr="group_id="+group_id+"&message="+message_g;
               
                    $.ajax
                    ({
                        type:"POST",
                        url:"groupe",
                        data:datagr,
                        cache:false,
                        success:function(data)
                        { 
                            
                        },
                        error:function(jqXHR,status,err)
                        {

                        },
                        complete:function()
                        {

                        }
                    })
                }
        
            });
                $(document).on('click','.msg-input button',function()
             {  
              
                var message= document.getElementById("msg-control").value;
                if( message!="" && receiver_id!="")
                {
                    document.getElementById("msg-control").value="";
                    var datastr="receiver_id="+receiver_id+"&message="+message;
                   
                    $.ajax
                    ({
                        type:"post",
                        url:"message",
                        data:datastr,
                        cache:false,
                        success:function(data)
                        {
                            
                        },
                        error:function(jqXHR,status,err)
                        {

                        },
                        complete:function()
                        {

                        }
                    })
              }
        
            });
      
               
        });
        </script>
</body>

</html>
