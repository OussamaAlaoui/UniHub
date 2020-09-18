@extends('layouts.registerpage')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">   
            <form  action="/Modify_group" method="POST" >
            <div class="card-g">  
                <div class="cardh">
                   <div id='gnameins'>Group Name:</div>
                 
                    <select id="groups" name="groups" class="form-control">    <option disabled selected value> -- select an option -- </option>
                        @foreach($groups as $group)
                    
                        <option value={{$group->name}}>{{$group->name}}</option>
                        @endforeach
                      </select>
                    
                    
           
                </div>
              
                <div class="card-body-g">
                 
                @csrf
                         <div class="select_class">
                   <div class="addg">Add Users By Class</div>
                 
                   @foreach ($classes as $class)
                       <input id='class' name='class[]'type="checkbox" value="{{$class->level}}{{$class->major}}{{$class->c_id}}" >  {{$class->level}}{{$class->major}}{{$class->c_id}}<br>
                   @endforeach
                   </div>
                   <div class="select_others">
                    <div class="addg">Add Other Users</div>
                  
                    @foreach ($users as $user)
                        <input id='user' name='user[]'type="checkbox" value="{{$user->name}}" > {{$user->name}}<br>
                    @endforeach
                    
                <div class='addTA'>
<div id='valid'><b>{{$valide}}</b></div>
                <div id='error'><b>{{$error}}</b></div>
            <input type="submit" id='remove' class="btn btn-sm btn-danger " value="remove" name='remove'>  
            <input type="submit" id='add'class="btn btn-sm btn-primary " value="add" name='add'> 
                </div>
                    </div>
                
               
                 

         
            </form>
          
                </div>
        </div>
        </div>
    </div>
</div>
@endsection
