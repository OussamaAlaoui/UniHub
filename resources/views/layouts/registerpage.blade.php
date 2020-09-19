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
   
    <!-- Styles -->
     <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
   <link href="{{ asset('css/home.css') }}" rel="stylesheet"> 
   <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
           
                      
              <div class="container-r"> 
                <a class="navbar-brand" id='uni' href="{{ url('/home') }}"style = "text-transform:capitalize;"> 
                    <img class="school_logo" src="/images/unihub.png">  
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
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
                                  <span class="caret" style = "text-transform:capitalize;">  {{ Auth::user()->name }} </span>
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>   
     
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script  type="text/javascript">
    const tabs = document.querySelectorAll('[data-tab-target]')
const tabContents = document.querySelectorAll('[data-tab-content]')
$.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

tabs.forEach(tab => {
  tab.addEventListener('click', () => {    aler('not working');
    const target = document.querySelector(tab.dataset.tabTarget)
    tabContents.forEach(tabContent => {
      tabContent.classList.remove('active')
    })
    tabs.forEach(tab => {
      tab.classList.remove('active')
    })
    tab.classList.add('active')
    target.classList.add('active')
  })
})
</script>