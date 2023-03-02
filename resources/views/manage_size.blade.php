@extends('layout')

@section('page_title','Manage size')
@section('size_select','active')



@section('container')

    <h1>Manage Size</h1>

    
   
    <a href="{{ url('size')}}" 
    
    <button type="button" class="btn btn-success">Back</button>
  
    </a>
<div class="row m-t-30">
    <div class="col-md-12">
    
    <div class="row">

        <div class="col-lg-12" >
       
            <div class="card">
                
                <div class="card-body">
                    
                  <form action="{{ route('size.manage_size_process') }}" method="post">

                    @csrf
                        {{-- <div class="form-group">
                            <label for="category" class="control-label mb-1">Category</label>

                            <input id="category" name="category" type="text" class="form-control" aria-required="true" aria-invalid="false"required >
                        </div> --}}

                        <div class="form-group">
                            <label for="size" class="control-label mb-1" >Size</label>
                            <input type="text" class="form-control" value="{{ $size }}" name="size" id="size" required>


{{-- error message --}}
                  @error('size')
                        

                    <div class="alert alert-danger" role="alert">

                       {{ $message }}

                    </div>

                      @enderror


                    </div>

                     

                             
                     <div>
                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                            Submit
                        </button>
  
  
  
                    </div>
                         
  

                        {{-- <div class="form-group">
                            <label for="category_slug" class="control-label mb-1">Category-Slug</label>

                            <input id="category_slug" name="category_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required >
                        </div

                        <div>
                            <button id="payment-button" type="button" class="btn btn-lg btn-info btn-block">Submit</button>
                           
                                
                        </div> --}}

                   <input type="hidden" name="id" value="{{ $id }}"/>
                    </form>



                   
            </div>
        </div>
    </div>
                </div>
            </div>
        </div>
                                               
                                      




    

@endsection