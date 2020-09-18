@extends('layouts.registerpage')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"> 
            <div class="card"> 
                <div class="card-header">{{ __('Add New Admin/Moderator') }}</div>
                    <div class="tab-content">
                     

<form  action="{{route('addadmin')}}" method="POST" >
    <div class="card-body">
    @csrf
    
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

        <div class="col-md-6">
            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('name') }}" required autocomplete="username" autofocus>

            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
    </div>

    <div class="role">
    <input id='Admin' name='role'type="radio" value="Admin" class=" @error('role') is-invalid @enderror" name="role"  > <label class="form-check-label" for="Admin">Admin</label>
    <input id='Moderator' name='role'type="radio" value="Moderator" class="@error('role') is-invalid @enderror" name="role" >   <label class="form-check-label" for="Moderator"> Moderator</label>
    @error('role')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
    </div>
<br>

    <div id='sm'>{{$message}}</div><br>
    <input type="submit" class="btn pull-right btn-sm btn-primary" >
    </div>
    
     
       
</form>   
</div>
</div>
</div>
</div>
@endsection
