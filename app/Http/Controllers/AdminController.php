<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
// For encrypt password
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN') ){

            return redirect('dashboard');

            
        }
        else
        {
            return view ('login');
        }




       return view ('login');
    }

    

public function auth(Request $request)
    {
        // to get form data
        $email=$request->post('email');
        $password=$request->post('password');

        // checking data is available in database



        // $result=Admin::where(['email'=>$email,'password'=>$password])->get();

        $result=Admin::where(['email'=>$email])->first();
        if($result){

            if(Hash::check($request->post('password'),$result->password))
            {
                $request->session()->put('ADMIN_LOGIN',true);
                $request->session()->put('ADMIN_ID',$result->id);
    
                // admin login success now redirecting to dashboard
                return redirect('dashboard');
    
            }
            else{
                $request->session()->flash('message','Please enter correct password');

                // not login redirect to login page
                return redirect('admin');

            }

           
        }else{

            $request->session()->flash('message','Please enter valid login details');

            // not login redirect to login page
            return redirect('admin');
            
        }


    // if result exists
    // isset -> variable having data or not 
    //     if(isset($result['0']->id)){

    //         // storing into session variables for each time we visit on dashboard to check user is logged in or not
    //         $request->session()->put('ADMIN_LOGIN',true);
    //         $request->session()->put('ADMIN_ID',$result['0']->id);


    //         // admin login success now redirecting to dashboard
    //         return redirect('dashboard');

    //     }

    //     else

    //     {

    //         // session flash use for sending error or success message to view
    //         $request->session()->flash('message','Please enter valid login details');

    //         // not login redirect to login page
    //         return redirect('admin');
    //     }
        
     }

       public function dashboard()
    {
       return view ('dashboard');
    }

    //  public function updatepassword()
    // {
    //    $r=Admin::find(1);

    //    $r->password=Hash::make('jyoti');

      
    //    $r->save();

    //  }
    
}
