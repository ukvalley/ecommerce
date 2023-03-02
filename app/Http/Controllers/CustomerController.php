<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
   
    public function index()
    {
        // Database data fetching
        $result['data']= Customer::all();


        return view ('customer', $result);
    }

   
    public function show(Request $request,$id='')
    {
        $arr=Customer::where(['id'=>$id])->get(); 


        $result['customer_list']=$arr['0'];


        return view('show_customer',$result);
    }
// post data 

   
    

  

// Active Deactive code function
    public function status(Request $request,$status,$id)
    {
       $model=Customer::find($id);
       $model->status=$status;
       $model->save();

         $request->session()->flash('message','Customer status updated ' );
         return redirect('customer');  





    }



}
