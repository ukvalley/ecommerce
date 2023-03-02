@extends('layout')
@section('page_title','size')
@section('size_select','active')

@section('container')

@if(session()->has('message'))
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
    {{   session('message')}}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true"> × </span>
</button>
 </div>
 @endif

    <h1>Size</h1>
   
    
    <div class='test' style='float: right';>

        <a href="{{ url('size/manage_size') }}" >    
        <button  type="button" class="btn btn-success" >Add Size 
   
        </div>
    </button> 

    </a>

    
    <div class="row m-t-30">
        

 <!-- DATA TABLE-->


            <div class="table-responsive m-b-20">

            <table class="table table-borderless table-data3">

            <thead>
                
                            
                     
                        <tr>
                            <th>ID</th>
                            <th>Size</th>
                            <th>Action</th>
                            
                        </tr>
                     
             </thead>
                    <tbody>

                        @foreach ( $data as $list )
                          <tr>
                           <td> {{$list->id }} </td>

                            <td> {{$list->size}} </td>

                     

                            <td> 
                                {{-- <a href="{{ url('category/delete')}}/{{ $list->id }}"  ><button type="button" class="btn btn-danger">Delete</button>
                                 </a>  --}}


                                 <a href="{{ url('size/manage_size/')}}/{{ $list->id }}"  ><button type="button" class="btn btn-success">Edit</button>

                                 </a>

                      @if($list->status==1)

                             <a href="{{ url('size/status/0')}}/{{ $list->id }}"  ><button type="button" class="btn btn-primary">Active</button>

                                 </a>
                      @elseif ($list->status==0)

                      <a href="{{ url('size/status/1')}}/{{ $list->id }}"  ><button type="button" class="btn btn-warning">Deactive</button></a>




                         @endif

                                 <a href="{{ url('size/delete')}}/{{ $list->id }}"  ><button type="button" class="btn btn-danger">Delete</button>
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