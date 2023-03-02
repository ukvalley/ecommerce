<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    
    public function index()
    {
        // Database data fetching
      $result['data']= Category::all();


        return view ('category', $result);
    }

   
    public function manage_category(Request $request, $id='')
    {
        if($id>0)
        {
            $arr=Category::where(['id'=>$id])->get();

            $result['category_name']=$arr['0']->category_name;

            $result['category_slug']=$arr['0']->category_slug;

            $result['parent_category_id']=$arr['0']->parent_category_id;


            $result['category_image']=$arr['0']->category_image;




            $result['is_home']=$arr['0']->is_home;

            $result['is_home_selected']="";


            if($arr['0']->is_home==1) {

             $result['is_home_selected']="checked";

       }
            
             





              $result['id']=$arr['0']->id;

             $result['category']=DB::table('categories')->where(['status'=>1])->where('id','!=',$id)->get();


        }
        else{

            $result['category_name']='';
            
            $result['category_slug']='';

            $result['parent_category_id']='';

            $result['category_image']='';

            $result['is_home']='';

            $result['is_home_selected']="";







            $result['id']='0';

            $result['category']=DB::table('categories')->where(['status'=>1])->get();



        }

              return view ('manage_category',$result );

    }
// post data 

         public function manage_category_process(Request $request)


    {
        // return $request->post();

           $request-> validate ([
            'category_name'=>'required',

            'category_slug'=>'required|unique:categories,category_slug,' . $request->post('id'),




            // at What time ingore validation category_slug term
            'category_image'=>'mimes:jpeg,jpg,png',

         ]);

         $model=new Category();
         if ($request->post('id')>0){

            $model= Category::find($request->post('id'));
            $msg="Category Updated";


         }else{
            $model= new Category();
            $msg="Category Inserted";


         }


         if($request->hasfile('category_image')){
            $image=$request->file('category_image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('/public/media/category',$image_name);
            $model->category_image=$image_name;
        }

        // if($request->hasfile('image')){
        //     $image=$request->file('image');
        //     $ext=$image->extension();
        //     $image_name=time().'.'.$ext;
        //     $image->storeAs('/public/media/model',$image_name);
        //     $model->image=$image_name;
        //  }





         $model->category_name=$request->post('category_name');
         $model->category_slug=$request->post('category_slug');
         $model->parent_category_id=$request->post('parent_category_id');
        //  $model->category_image=$request->post('category_image');



       // checking condition for checkbox 1 or 0
  

            $model->is_home=0;


            if($request->post('is_home')!== null ){
            $model->is_home=1;

        }


         $model->status=1;

         $model->save();

        $request->session()->flash('message',$msg);
        return redirect('category');  


    } 

    /**
     * Store a newly created resource in storage.manage_category_process
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     * 
     */

    //  Foe delete function 
    public function delete(Request $request,$id)
    {
       $model=Category::find($id);
        $model->delete();

        $request->session()->flash('message','Category ' );
        return redirect('category');  


    }

// Active Deactive code function
    public function status(Request $request,$status,$id)
    {
       $model=Category::find($id);
       $model->status=$status;
       $model->save();

        $request->session()->flash('message','Category status updated ' );
        return redirect('category');  





    }

    
}
