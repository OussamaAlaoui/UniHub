@extends('layouts.registerpage')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"> 
            <div class="card"> 
                <div class="card-header">{{ __('Add New Professor') }}</div>
                    <div class="tab-content">
                        <form  action="{{route('create_t')}}" method="POST" >
                            <div class="card-body">
                            @csrf
                            <div class="form-group row">
                                <label for="professor_id" class="col-md-4 col-form-label text-md-right">{{ __('Professor id') }}</label>
            
                                <div class="col-md-6">
                                    <input id="professor_id" type="text" class="form-control @error('professor_id') is-invalid @enderror" name="professor_id" value="{{ old('Professor_id') }}" required autocomplete="professor_id" autofocus>
            
                                    @error('professor_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
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
            
                           
                            <div class="form-group row">
                                <label for="class" id='class_r'class="col-md-4 col-form-label text-md-right">{{ __('Class') }}</label>
    
                                <div class="col-md-6">
                            <select id="lev" name="class" class="form-control @error('level') is-invalid @enderror" name="level" value="{{ old('level') }}" required autocomplete="level">
    <option disabled selected value> -- select an option -- </option>                             @foreach($classes as $class)
                               
                                <option value={{$class->level}}>{{$class->level}}{{$class->major}}{{$class->c_id}}</option>
                                @endforeach
                              </select>
                            
                            
                              @error('class')
                              <span class="invalid-feedback" role="alert">

                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
              

      <div class="form-group row">
        <label for="Subject" id='class_r'class="col-md-4 col-form-label text-md-right">{{ __('Subject') }}</label>

        <div class="col-md-6">
    <select id="subject" class="form-control @error('Subject') is-invalid @enderror" name="subject" value="{{ old('Subject') }}" required autocomplete="Subject">
            <option disabled selected value> -- select an option -- </option>
    @foreach($subjects as $subject)
        <option value={{$subject->subject_name}}>{{$subject->subject_name}}</option>
        @endforeach
      </select>
    
    
      @error('Subject')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
</div>
</div>
<div class="val">{{$validate}}</div>
                       <br>
                            <div id='sm'></div><br>
                            <input type="submit" class="btn pull-right btn-sm btn-primary" >
                            </div>
                        </form>
                      
   
        </div>
    </div>
</div>
@endsection
