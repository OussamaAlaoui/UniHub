@extends('layouts.registerpage')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Welcome to the Document Ordering Page') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('order') }}">
                      @csrf
                
                      <div class="page">
                      
                        <div class="form-body"> 
                        <div class="radio">
                            <div><label for="document"> Document:</label>
                            <br>
                        <input type="radio" id="Doc1" name ="document_type" value="scholarship"> 
                        <label for="Doc1">Scholarship</label><br>
                        <input type="radio" id="Doc2" name ="document_type" value="grades"> 
                        <label for="Doc2">Grades</label><br>
                        <input type="radio" id="Doc3" name ="document_type" value="abscence"> 
                        <label for="Doc3">Abscence</label><br>
                            </div> 

                            <div> 
                            <label for="number">Number:</label>
                            <br>
                            <input type="number" id="amount" name="amount" min="1" max="5" value="1"><br>
                                </div>
                        </div>
                        <label for="justification">Justification: </label>
                        <br>

                            <textarea id="justification" name="Justification"  rows="4" cols="50"> </textarea><br>
                            <div class="ord_val_msg" > <b>{{$validation}}</b></div>
                            <div class="ord_err_msg" > <b>{{$error}}</b></div>
                            <div class ="input">
                                
                            <input type="submit" value="Order" class="btn btn-primary btn-lg btn-block">
                            </div>
                                
                        
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection






{{-- 


@extends('layouts.registerpage')

@section('contect')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">  </div>
           
                <div class="card-body">
                    <h1> regpsfoihjsqsdoifq </h1>
                    <form method="POST" action="">
                        @csrf
                       
                  
                        
                        {{--     <div class="page">
                            <div class = headbar >HeadBar <hr></div>
                            <div class="form-body">
                                
                            <form >
                            
                            <div class="radio">
                                <div><label for="document"> Document:</label>
                                <br>
                                     <label for="number">Number:</label>
                            <input type="number" id="quantity" name="quantity" min="1" max="5" value="1"><br>
                                </div>
                                
                            <div> 
                            <input type="radio" id="Doc1" name ="document_type" value="doc1"> 
                            <label for="Doc1">Doc1</label><br>
                            <input type="radio" id="Doc2" name ="document_type" value="doc2"> 
                            <label for="Doc2">Doc2</label><br>
                            <input type="radio" id="Doc3" name ="document_type" value="doc3"> 
                            <label for="Doc3">Doc3</label><br>
                                </div> </div>
                            <label for="justification">Justification:</label>
                                <textarea id="justification" name="Justification"  rows="4" cols="50"> </textarea><<br>
                                <div class ="input">
                                    
                                <input type="submit" value="Order">
                                </div>
                                    </form>
                            
                            </div>
                            </div>
                            
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- }
    
             .form-body
                                {
                                    align-items: center;
                                    border: 1px solid black;
                                    
                                    width: 200;
                                    text-align: left;
                                }
                                
                            .radio
                                {
                                    display:grid;
                                    grid-template-columns: auto auto;
                                    text-align: left;
                                }
                                .input
                                {
                                    margin: 10px;
                                    text-align: center;
                                }
                                
                                .page
                                {
                                    display: grid;
                                    grid-template-rows: 10% 90% ;
                                    padding:none;
                                    
                                }
                                .headbar
                                {
                                    background-color: white;
                                }
                          



@endsection 

--}}