<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HTTP\Requests;
use DB;
//use Http/Request;
use Session;
use Cache;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    
    public function index(){

    	return view('admin.admin_login');
    }

    public function show_dashboard(){

    $this->AdminAuthCheck();

    $total_products=DB::table('tbl_product')->count();
    	

    return view('admin.dashboard')->with('total_products',$total_products);
    }
    public function dashboard(Request $request){

    	

    	$admin_email=$request->admin_email;
    	$admin_password=md5($request->admin_password);
    	$result=DB::table('tbl_admin')
    		->where('admin_email',$admin_email)
    		->where('admin_password',$admin_password)
    		->first();//comparing only one row
    		

    		if ($result) {
    			# code...
    			Session::put('admin_name',$result->admin_name);
    			Session::put('admin_id',$result->admin_id);  
    			return Redirect::to('/dashboard');
    		}
    		else
    		{
    			Session::put('message','Email or Password did not match');
    			return Redirect::to('/admin');

    		}

    //     // protected function admin_logout(){
        
    //     // Session::flush();
    //     // return Redirect::to('/admin');
    // }



    	//return view('admin.dashboard');
    }
}
