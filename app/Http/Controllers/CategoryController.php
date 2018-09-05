<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\HTTP\Requests;
use DB;
//use Http/Request;
use Session;
use Carbon\Carbon;
session_start();
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function index(){

        $this->AdminAuthCheck();

    	return view('admin.add_category');
    }

    public function all_category(){

        $this->AdminAuthCheck();

    	$data=DB::table('tbl_category')->orderBy('category_id','desc')->get();
    	//->orderBy('category_name','desc') 

    return view('admin.all_category')->with('data', $data);
    	//return view('admin.all_category');
    }

    public function save_category(Request $request){

    	
        $data=array();

    	$data['category_id']=$request->category_id;
    	$data['category_name']=$request->category_name;
    	$data['category_des']=$request->category_des;
    	$data['activation_status']=$request->activation_status;
        $data['created_at']=Carbon::now();
   
        

    	
    	DB::table('tbl_category')->insert($data);
    	Session::put('message','Category Added!');
    	return redirect('/all_category')->with('alert','Category Added Successfully');
    	

    	

    }

    public function inactive_category($category_id){
    	DB::table('tbl_category')
    	->where('category_id',$category_id)
    	->update(['activation_status'=>0]);
    	return Redirect('/all_category')->with('alert','Category Status Changed');
    }

    public function active_category($category_id){
    	DB::table('tbl_category')
    	->where('category_id',$category_id)
    	->update(['activation_status'=>1]);
    	return Redirect('/all_category')->with('alert','Category Status Changed');
    }

    public function edit_category($category_id){

    	$data=DB::table('tbl_category')
    	->where('category_id',$category_id)
    	->first();

    	$data=view('admin.edit_category')
    	->with('data',$data);

    	return view('admin.admin_layout')
    	->with('admin.edit_category',$data);
    	
    	//echo $category_id;
    }

    public function update_category(Request $request,$category_id){
    	$data=array();
    	
    	$data['category_name']=$request->category_name;
    	$data['category_des']=$request->category_des;
    	

    	
    	DB::table('tbl_category')->where('category_id',$category_id)->update($data);

    	Session::put('message','Category Updated!');
    	return redirect::to('/all_category')->with('alert','Category updated Successfully');
    }

    public function delete_category($category_id){

    	DB::table('tbl_category')
    	->where('category_id',$category_id)
    	->delete();
    	return Redirect('/all_category')->with('alert','Category Deleted');

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
