@extends('layout')

@section('page_title','Manage Coupon')
@section('coupon_select','active')



@section('container')

    <h1>Manage Coupon</h1>
   
    <a href="{{ url('coupon')}}" 
    
    <button type="button" class="btn btn-success">Back</button>
  
    </a>
<div class="row m-t-30">
    <div class="col-md-12">
    
    <div class="row">

        <div class="col-lg-12" >
       
            <div class="card">
                
                <div class="card-body">
                    
                  <form action="{{ route('coupon.manage_coupon_process') }}" method="post">

                    @csrf
                        {{-- <div class="form-group">
                            <label for="category" class="control-label mb-1">Category</label>

                            <input id="category" name="category" type="text" class="form-control" aria-required="true" aria-invalid="false"required >
                        </div> --}}

                        <div class="form-group">
                            <div class="row">
                               <div class="col-md-6">

                                <label for="title" class="control-label mb-1" >Title</label>
                                <input type="text" class="form-control" value="{{ $title}}" name="title" id="title" required>
    
    
                              {{-- error message --}}
                      
                                
                                  
                              </div>
    
                               <div class="col-md-6">
                                <label for="code" class="control-label mb-1">Code</label>
                                <input type="text" class="form-control" value="{{ $code }}" name="code" id="code" required>
                                @error('code')
                            
    
                               <div class="alert alert-danger" role="alert">
                                {{ $message }}
    
                             </div>
                              @enderror
                              
                               </div>

                              </div>

                             </div>




                               {{-- 2rd row --}}


                           <div class="form-group">
                            <div class="row">


                               <div class="col-md-6">

                                <label for="value" class="control-label mb-1">Value</label>
                                <input type="text" class="form-control" value="{{ $value }}" name="value" id="value" required>
                               
                             </div>
    
                               <div class="col-md-6">
                                <label for="value" class="control-label mb-1">Type</label>

                                <select id="type"  name="type"  class="form-control" aria-required="true" aria-invalid="false" required>

                                    {{-- 1 & 0 slected --}}

                                    @if ($type=='value')
                                    <option value="value" selected>Value</option>
                                   <option value="per"> per </option>
                                

                                   @elseif ($type=='per')
                                    <option value="value" selected>Value</option>
                                   <option value="per" selected>per </option>
                                
                                 
                                    @else
                                   <option value="value" >Value </option>
                                    <option value="per">Per </option>
                                   @endif

                                  </select>

                                 </div>


                            </div>
                        </div>


                             {{-- 3rd row --}}
                          
                        <div class="form-group">

                            <div class="row">

                                
                               <div class="col-md-6">

                                <label for="value" class="control-label mb-1">Min Order Amt</label>
                                <input type="text" class="form-control" value="{{ $min_order_amt }}" name="min_order_amt" id="min_order_amt" required>
                               
                             </div>

    
                               <div class="col-md-6">
                                <label for="min_order_amt" class="control-label mb-1">Is One Time</label>

                                <select id="is_one_time"  name="is_one_time"  class="form-control" aria-required="true" aria-invalid="false" required>

                                    {{-- 1 & 0 slected --}}

                                    @if ($is_one_time=='1')
                                    <option value="1" selected>Yes </option>
                                   <option value="0">No </option>
                                
                                 
                                    @else
                                   <option value="1" >Yes </option>
                                    <option value="0" selected >No </option>
                                   @endif

                                  </select>

                                 </div>


                            </div>
                        </div>

                          <div>
                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                            Submit
                        </button>
  
  
  
                    </div>
                         
                   <input type="hidden" name="id" value="{{ $id }}"/>
                    </form>



                   
            </div>
        </div>
    </div>
                                               
                                      




    

@endsection