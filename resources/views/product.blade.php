@extends('layout')
@section('page_title','product')
@section('product_select','active')

@section('container')



{{-- For message  --}}
@if(session()->has('message'))
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
    {{   session('message')}}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true"> × </span>
</button>
 </div>
 @endif

    <h1>Product</h1>
   
    <div class='test' style='float: right';>

    <a href="product/manage_product"> 
    
    <button type="button" class="btn btn-success">Add Product
    </button> 
    </div>
</a>
    
    <div class="row m-t-30">
        

 <!-- DATA TABLE-->


            <div class="table-responsive m-b-20">

            <table class="table table-borderless table-data3">

            <thead>
                
                            
                     
                        <tr>
                            <th>ID</th>
                            <th> Name</th>
                            <th> Slug</th>
                            <th> Image</th>

                            <th>Action</th>
                            
                        </tr>
                     
             </thead>
                    <tbody>

                        @foreach ( $data as $list )
                          <tr>
                           <td> {{$list->id }} </td>

                            <td> {{$list->name }} </td>

                            <td> {{$list->slug  }} </td>

                            <td>
                                
                                <img  width="50px" height="30px" src="{{ asset('storage/media/'.$list->image) }}">
                            
                            </td>


                            <td> 
                                {{-- <a href="{{ url('category/delete')}}/{{ $list->id }}"  ><button type="button" class="btn btn-danger">Delete</button>
                                 </a>  --}}


                                 <a href="{{ url('product/manage_product/')}}/{{ $list->id }}"  ><button type="button" class="btn btn-success">Edit</button>

                                 </a>

                      @if($list->status==1)

                             <a href="{{ url('product/status/0')}}/{{ $list->id }}"  ><button type="button" class="btn btn-primary">Active</button>

                                 </a>
                      @elseif ($list->status==0)

                      <a href="{{ url('product/status/1')}}/{{ $list->id }}"  ><button type="button" class="btn btn-warning">Deactive</button></a>




                         @endif

                         <a href="{{ url('product/delete')}}/{{ $list->id }}"  ><button type="button" class="btn btn-danger">Delete</button>
                                 </a>

                         </td>

                                      

                            </tr>

                        @endforeach
                        
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>
    

 </div>

@endsection