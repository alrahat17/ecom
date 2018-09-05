<?php

namespace App\Http\Controllers;

use App\HTTP\Requests;
use DB;
//use Http/Request;
use Session;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    protected function admin_logout(){
    	
    	Session::flush();
    	return Redirect::to('/admin');
    }

    public function index(){

    	//echo "Welcome Admin";
    	$this->AdminAuthCheck();
    	return view('admin.dashboard');
    }

    public function AdminAuthCheck(){

    	$admin_id = Session::get('admin_id');
    	
    	if ($admin_id) {
    		return ;
    	}
    	else{
    		Session::flush();

    		return Redirect::to('/admin')->send(); // send for forcing to redirect
    	}
    }
}
