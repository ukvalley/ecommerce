<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        // Database data fetching
      $result['data']= Size::all();


        return view ('size', $result);
    }

   
    public function manage_size(Request $request, $id='')
    {
        if($id>0)
        {
            $arr=Size::where(['id'=>$id])->get();

            $result['size']=$arr['0']->size;

            $result['status']=$arr['0']->status;
            $result['id']=$arr['0']->id;


        }
        else{

            $result['size']='';
            
            $result['status']='';

            $result['id']='0';



        }

       

        return view ('manage_size',$result );

    }
// post data 

    public function manage_size_process(Request $request)


    {
        // return $request->post();

         $request-> validate ([

            // at What time ingore validation category_slug term

            'size'=>'required|unique:sizes,size,' .
             $request->post('id'),
         ]);

        //  $model=new Category();

         if ($request->post('id')>0){

            $model= Size::find($request->post('id'));
            $msg="Size Updated";


         }else{
            $model= new Size();
            $msg="Size Inserted";


         }

         $model->size=$request->post('size');
         $model->status=1;

         $model->save();

        $request->session()->flash('message',$msg);
        return redirect('size');  


    } 

    

    //  Foe delete function 
    public function delete(Request $request,$id)
    {
       $model=Size::find($id);
        $model->delete();

        $request->session()->flash('message','Size ' );
        return redirect('size');  


    }

// Active Deactive code function
    public function status(Request $request,$status,$id)
    {
       $model=Size::find($id);
       $model->status=$status;
       $model->save();

         $request->session()->flash('message','Size status updated ' );
         return redirect('size');  





    }




}
