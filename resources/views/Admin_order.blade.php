@extends('layouts.registerpage')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Document Orders') }}</div>
                
                <div class="card-body">
                        <form method="POST" action="{{ route('Process_Order') }}">
                            @csrf
                     @foreach($orders as $order)
                       <div class="order"> The student <b>{{($order->name)}} </b>from class <b>{{($order->class)}}</b> has ordered <b>{{($order->amount)}} {{($order->doc_type)}}</b> documents for <b>"{{($order->reason)}}" </b>on <b>{{($order->created_at)}} </b>
                             <button type="submit" name="Ord_ID" id="{{($order->order_id)}}"  class="btn pull-right btn-sm btn-primary"  value="{{($order->order_id)}}" >✓</button>  </div>
                        <br>    
                    
                         @endforeach
                        </form>
                     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection