<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        // Database data fetching
      $result['data']= Brand::all();


        return view ('brand', $result);
    }

   
    public function manage_brand(Request $request, $id='')
    {
        if($id>0)
        {
            $arr=Brand::where(['id'=>$id])->get();

            $result['image']=$arr['0']->image;


             $result['name']=$arr['0']->name;

            $result['status']=$arr['0']->status;


            $result['is_home']=$arr['0']->is_home;

            $result['is_home_selected']="";


            if($arr['0']->is_home==1) {

             $result['is_home_selected']="checked";

       }


            $result['id']=$arr['0']->id;







        }
        else{

            $result['name']='';

            $result['image']='';


            $result['is_home']='';

            $result['is_home_selected']="";



            
            $result['status']='';





            $result['id']='0';



        }

       

        return view ('manage_brand',$result );

    }
          // post data 

    public function manage_brand_process(Request $request)


    {
        // return $request->post();

        


           $request-> validate ([


            'name'=>'required|unique:brands,name,' .
             $request->post('id'),

            'image'=>'mimes:jpeg,jpg,png'

         ]);

        //  $model=new Brand();

         if ($request->post('id')>0){

            $model= Brand::find($request->post('id'));
            $msg="Brand Updated";


         }else{
            $model= new Brand();
            $msg="Brand Inserted";


         }



           if($request->hasfile('image')){
            $image=$request->file('image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('/public/media/model',$image_name);
            $model->image=$image_name;
         }
         

         $model->name=$request->post('name');


         
         $model->is_home=0;


         if($request->post('is_home')!== null ){
         $model->is_home=1;

     }
         $model->status=1;
            $model->save();

        $request->session()->flash('message',$msg);
        return redirect('brand');  


    } 

    

    //  For delete function 
    public function delete(Request $request,$id)
    {
       $model=Brand::find($id);
        $model->delete();

        $request->session()->flash('message','Brand deleted ' );
        return redirect('brand');  


    }

     // Active Deactive code function
    public function status(Request $request,$status,$id)
    {
       $model=Brand::find($id);
       $model->status=$status;
       $model->save();

         $request->session()->flash('message','Brand status updated ' );
         return redirect('brand');  





    }
}
