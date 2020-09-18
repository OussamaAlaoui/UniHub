@extends('layouts.registerpage')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('User Activation Page') }}</div>
               
                <div class="card-body-ac">      @foreach($students as $student)
                                                 <div id='info'> <b>Student id: </b>{{($student->student_id)}} <b> Name: </b>{{($student->name)}}  <b> from class</b> {{($student->class)}} </div>

                         <form method="POST" action="{{ route('active') }}">
                            @csrf
                 
                         <div class="student"> 
                             <button type="submit" name="std_id" id="activate"  class="btn pull-right btn-sm btn-primary"  value="{{($student->student_id)}}" > activate </button>
                             <button type="submit" name="delete" id="removes"  class="btn pull-right btn-danger  btn-sm"  value="{{($student->student_id)}}" > Remove </button>
                            </div>

                      
                    
                        
                        </form> 
                       @endforeach 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection