@extends('layout')
@section('page_title','category')
@section('category_select','active')

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

    <h1>Category</h1>
   
    <div class='test' style='float: right';>

    <a href="category/manage_category"> 
    
    <button type="button" class="btn btn-success">Add Category 
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
                  <th>Category Name</th>
                  <th>Category Slug</th>
                 <th>Action</th>
                            
                 </tr>
                     
                 </thead>
                <tbody>

                        @foreach ( $data as $list )
                          <tr>
                           <td> {{$list->id }} </td>

                            <td> {{$list->category_name }} </td>

                            <td> {{$list->category_slug }} </td>





                            <td> 
                                {{-- <a href="{{ url('category/delete')}}/{{ $list->id }}"  ><button type="button" class="btn btn-danger">Delete</button>
                                 </a>  --}}


                                 <a href="{{ url('category/manage_category/')}}/{{ $list->id }}"  ><button type="button" class="btn btn-success">Edit</button>

                                 </a>

                              @if($list->status==1)

                            <a href="{{ url('category/status/0')}}/{{ $list->id }}"  ><button type="button" class="btn btn-primary">Active</button>


                           </a>
                             @elseif ($list->status==0)
                             


                            <a href="{{ url('category/status/1')}}/{{ $list->id }}"  ><button type="button" class="btn btn-warning">Deactive</button></a>

                            {{-- <a href="{{ url('category/status/1')}}/{{ $list->id }}"  ><button type="button" class="btn btn-warning">Deactive</button></a> --}}




                              @endif

                             <a href="{{ url('category/delete')}}/{{ $list->id }}"  ><button type="button" class="btn btn-danger">Delete</button>
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