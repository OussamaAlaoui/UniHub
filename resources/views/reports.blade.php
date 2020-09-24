@extends('layouts.homepage')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Posts Reports') }}</div>
                
                <div class="card-body"> 
                    @foreach($reports as $report)
                        <form method="POST" action="/verify_report/{{$report->id}}">
                            @csrf
                    
                       <div class="order"> user id <b>{{($report->user_id)}} </b> reported the post with the id: <b>{{($report->post_id)}}</b>
                              <button type="submit" name="dlt_post"  class="btn pull-right btn-sm btn-danger" value="{{$report->post_id}} ">Delete Post</button>  
                              <button type="submit" name="keep_post"  class="btn pull-right btn-sm btn-primary" value="{{$report->id}} " >Keep Post</button> 
                           
                            </div>
                        <br>    
                    
                         @endforeach
                        </form>
                     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
