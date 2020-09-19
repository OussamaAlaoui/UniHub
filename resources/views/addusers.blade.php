@extends('layouts.registerpage')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10"> 
            <div class="card"> 
               
         <div class="card-header"><h2 id="adsus">Which type of users you want to add:</h2><br></div>
                    <div class="card-body-au">
                   
                    <form  action="{{route('addadmin')}}" method="get" >
                                <input id="adm" type="submit" class="btn btn-primary btn-lg" value="Moderator/Admin" name='add'> 
                            </form>
                            <form  action="{{route('create_t')}}" method="get" >
                                <input  id="prof"type="submit" class="btn btn-secondary btn-lg" value="Professor" name='add'> 
                            </form>
                  
                </div>
        </div>
    </div>
</div>
@endsection
