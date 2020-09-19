@extends('layouts.registerpage')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">   
            <form  action="/create_group" method="POST" >
            <div class="card-g">  
                <div class="c">
                   <div id='gnameins'>Group Name:</div>
                    <input id="Gname" name='Gname' type="text" placeholder="Group name" >
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
                        <input id='others' name='others[]' type="checkbox" value="{{$user->name}}" > {{$user->name}}<br>
                    @endforeach
                    <div class='addTAj'> <div id='valid'>{{$valide}}</div>
                    <input type="submit" class="btn btn-primary btn-sm" >

                </div>
                    </div>
               
                
               
            </form>
                </div>
        </div>
        </div>
    </div>
</div>
@endsection
