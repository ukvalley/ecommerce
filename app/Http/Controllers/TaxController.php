<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    
    public function index()
    {
        $result['data']=Tax::all();
        return view('tax',$result);
    }


    
    public function manage_tax(Request $request,$id='')
    {
        if($id>0){
            
            $arr=Tax::where(['id'=>$id])->get(); 

            $result['tax_desc']=$arr['0']->tax_desc;
            $result['tax_value']=$arr['0']->tax_value;
            $result['status']=$arr['0']->status;
            $result['id']=$arr['0']->id;




        }else{


            $result['tax_desc']='';
            $result['tax_value']='';
            $result['status']='';
            $result['id']=0;
            
        }
        return view('manage_tax',$result);
    }

    public function manage_tax_process(Request $request)
    {
        //return $request->post();
        
        $request->validate([

            'tax_value'=>'required|unique:taxs,tax_value,'.$request->post('id'),   
        ]);

        if($request->post('id')>0){
            $model=Tax::find($request->post('id'));
            $msg="Tax updated";

        }else{


            $model=new Tax();
            $msg="Tax inserted";

        }

        $model->tax_desc=$request->post('tax_desc');
        $model->tax_value=$request->post('tax_value');
        $model->status=1;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('tax');

        
    }
    // for Delete

    public function delete(Request $request,$id){
        $model=Tax::find($id);
        $model->delete();
        $request->session()->flash('message','Tax deleted');
        return redirect('tax');
    }

// for Status Active Or inactive

    public function status(Request $request,$status,$id){
        $model=Tax::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Tax status updated');
        return redirect('tax');
    }
}
