@extends('layouts.app')

@section('content')
<div class="containe">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="Connexion">
                <div class="title">{{ __('Login') }}</div>
               
                
             
                    <form method="POST" action="{{ route('login') }}" autocomplete="off">
                        @csrf

                        <span class="Adresse">E-mail Adress :</span>
                         

                            <div class="col-md-11" id="emaild">
                                <i class="fa fa-user"></i>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder={{__('Email-Address')}} name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                     
                            
                       

                
                            <span class="passtitle">Mot de passe:</span>

                            <div id="passed" class="col-md-11"> <i class="fa fa-lock"></i>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder={{__('Password')}} >
                               
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        

                        
                            
                                <div class="check">
                                    <input class="check" type="checkbox" name="remember" id="check" {{ old('remember') ? 'checked' : '' }} value="{{ __('Remember Me') }}">

                                    <label class="check" for="check">
                                        {{ __('Remember Me') }}
                                    </label>
                            
                         
                                @if (Route::has('password.request'))
                                <a class="link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                     
                         </div>
                       
                          <div class='ok'>
                                <input type="submit" value= "login">
                         
                          </div>

                            
                       
                    </form>
               
            </div>
        </div>
    </div>
</div>
@endsection
