<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        // Database data fetching
      $result['data']= Color::all();


        return view ('color', $result);
    }

   
    public function manage_color(Request $request, $id='')
    {
        if($id>0)
        {
            $arr=Color::where(['id'=>$id])->get();

            $result['color']=$arr['0']->color;

            $result['status']=$arr['0']->status;
            $result['id']=$arr['0']->id;


        }
        else{

            $result['color']='';
            
            $result['status']='';

            $result['id']='0';



        }

       

        return view ('manage_color',$result );

    }
// post data 

    public function manage_color_process(Request $request)


    {
        // return $request->post();

         $request-> validate ([

            // at What time ingore validation category_slug term

            'color'=>'required|unique:colors,color,' .
             $request->post('id'),
         ]);

        //  $model=new Category();

         if ($request->post('id')>0){

            $model= Color::find($request->post('id'));
            $msg="Color Updated";


         }else{
            $model= new Color();
            $msg="Color Inserted";


         }

         $model->color=$request->post('color');
         $model->status=1;

         $model->save();

        $request->session()->flash('message',$msg);
        return redirect('color');  


    } 

    

    //  Foe delete function 
    public function delete(Request $request,$id)
    {
       $model=Color::find($id);
        $model->delete();

        $request->session()->flash('message','Color ' );
        return redirect('color');  


    }

// Active Deactive code function
    public function status(Request $request,$status,$id)
    {
       $model=Color::find($id);
       $model->status=$status;
       $model->save();

         $request->session()->flash('message','Color status updated ' );
         return redirect('color');  





    }

}
