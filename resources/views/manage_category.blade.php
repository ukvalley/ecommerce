@extends('layout')

@section('page_title','Manage category')
@section('category_select','active')



@section('container')


{{-- @if($id>0)
{{$category_image_required=""}}
@else
{{$category_image_required=""}}
@endif --}}

    <h1>Manage Category</h1>
    
   
    <a href="{{ url('category')}}" 
    
    <button type="button" class="btn btn-success">Back</button>
  
    </a>
    
<div class="row m-t-30">
    <div class="col-md-12">
    
    <div class="row">

        <div class="col-lg-12" >
       
            <div class="card">
                
                <div class="card-body">
                    
                  <form action="{{ route('category.manage_category_process') }}" method="post" enctype="multipart/form-data">

                    @csrf
                        {{-- <div class="form-group">
                            <label for="category" class="control-label mb-1">Category</label>

                            <input id="category" name="category" type="text" class="form-control" aria-required="true" aria-invalid="false"required >
                        </div> --}}

                        <div class="row">

                     <div class="col-md-4">
                            <div class="form-group">
                            <label for="category_name" class="control-label mb-1" >Category name</label>
                            <input type="text" class="form-control" value="{{ $category_name }}" name="category_name" id="category_name" required>


                         {{-- error message --}}
                        
                        </div>
                      </div>



                      <div class="col-md-4">
                        <div class="form-group">
                       
                        <label for="parent_category_id" class="control-label mb-1"> Parent Category</label>
                              <select id="parent_category_id" name="parent_category_id" class="form-control" required>
                                 <option value="0"> Select Parent Categories</option>
                                 @foreach($category as $list)
                                 @if($parent_category_id==$list->id)
                                 <option selected value="{{$list->id}}">
                                    @else
                                 <option value="{{$list->id}}">
                                    @endif
                                    {{$list->category_name}}
                                 </option>
                                  @endforeach
                                </select>
                             </div>


                          {{-- error message --}}
                    
                           </div>
                 

                       <div class="col-md-4">

                        <div class="form-group">
                            <label for="category_slug" class="control-label mb-1">Category Slug</label>
                            <input type="text" class="form-control" value="{{ $category_slug }}" name="category_slug" id="category_slug" required>
                            @error('category_slug')
                        

                           <div class="alert alert-danger" role="alert">
                            {{ $message }}

                        </div>
                         @enderror
                        </div>
                        </div>

                    </div>
                

                       <div class="row">

                        <div class="col-lg-6" >



                            <div class="form-group">
                                <label for="image" class="control-label mb-1"> Image</label>
                                <input id="category_image" name="category_image" type="file" class="form-control" aria-required="true" aria-invalid="false">
                                @error('category_image')
                                <div class="alert alert-danger" role="alert">
                                {{$message}}		
                                </div>
                                @enderror

                                @if($category_image!='')
                                        <a href="{{asset('storage/media/category/'.$category_image)}}" target="_blank"><img width="100px" src="{{asset('storage/media/category/'.$category_image)}}"/></a>
                                    @endif
                            </div>
                        </div>
                    </div>




                    <div class="row">

                        <div class="col-lg-6" >



                            <div class="form-group">
                                <label for="image" class="control-label mb-1"> Show in Home Page</label>
                                <input id="is_home" name="is_home" type="checkbox" {{$is_home_selected}}>
                            </div>
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
                </div>
            </div>
        </div>
                                               
                                      




    

@endsection