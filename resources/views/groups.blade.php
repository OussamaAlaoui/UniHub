@extends('layouts.registerpage')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10"> 
            <div class="card"> 
               
        <div class="card-header">  <h2 id="adsus">You can create or Modify a group:</h2><br></div> 
                    <div class="card-body-au">
                   
                    <form  action="{{route('groups')}}" method="get" >
                                <input id="adm" type="submit" class="btn btn-primary btn-lg" value="Create Group" name='add'> 
                            </form>
                            <form  action="{{route('mgroups')}}" method="get" >
                                <input  id="modify"type="submit" class="btn btn-secondary btn-lg" value="Modify Group" name='add'> 
                            </form>
                  
                </div>
        </div>
    </div>
</div>
@endsection
