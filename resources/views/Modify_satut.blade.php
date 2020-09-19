@extends('layouts.registerpage')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">   
            <form  action="/modify_statut" method="POST" >
            <div class="card">  
                <div class="card-header">{{ __("Change a Student's Role") }}</div>
                <div class="card-body">
                @csrf
                        <div id='studinfo'> Enter student id:
                        <input id='student_id' name='student_id'type="text" value="" > <br>
                        </div>
                        <br>  
                  
    <div class="role">
        <input id='role' name='role'type="radio" value="Student" class=" @error('role') is-invalid @enderror"   > <label class="form-check-label" for="Student">Student</label>
        <input id='role' name='role'type="radio" value="Delegate" class="@error('role') is-invalid @enderror"  >   <label class="form-check-label" for="Delegate"> Delegate</label>
        @error('role')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
        </div><br>  
                        
                 
                   <div class="select_others">
                    
                 <div id='valid'>{{$valide}}</div>
                <div id='error'>{{$error}}</div> 
                <div class='addTAn'>


                </div>
                <input type="submit" class="btn pull-right btn-sm btn-primary" value="Modify" name='add'> 
                 
            
         
            </form>
          
                </div>
       
        </div>
    </div>
</div>
@endsection
