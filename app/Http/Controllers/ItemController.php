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

class ItemController extends Controller
{
    public function index(){

        $this->AdminAuthCheck();

    	return view('admin.add_item');
    }

    public function all_item(){

        $this->AdminAuthCheck();

    	$data=DB::table('tbl_item')->join('tbl_category','tbl_item.category_id','=','tbl_category.category_id')->orderBy('item_id','desc')->get();
    	

    return view('admin.all_item')->with('data', $data);
    	
    }

    public function save_item(Request $request){

    	$data=array();
        $data['category_id']=$request->category_id;
    	$data['item_id']=$request->item_id;
    	$data['item_name']=$request->item_name;
    	$data['item_des']=$request->item_des;
        $data['activation_status']=$request->activation_status;
    	$data['created_at']=Carbon::now();

    	
    	DB::table('tbl_item')->insert($data);
    	Session::put('message','Item Added!');
    	return redirect('/all_item')->with('alert','Item Added Successfully');
    	

    	

    }

    public function inactive_item($item_id){
    	DB::table('tbl_item')
    	->where('item_id',$item_id)
    	->update(['activation_status'=>0]);
    	return Redirect('/all_item')->with('alert','Item Status Changed');
    }

    public function active_item($item_id){
    	DB::table('tbl_item')
    	->where('item_id',$item_id)
    	->update(['activation_status'=>1]);
    	return Redirect('/all_item')->with('alert','Item Status Changed');
    }

    public function edit_item($item_id){

    	$data=DB::table('tbl_item')
    	->where('item_id',$item_id)
    	->first();

    	$data=view('admin.edit_item')
    	->with('data',$data);

    	return view('admin.admin_layout')
    	->with('admin.edit_item',$data);
    	
    	
    }

    public function update_item(Request $request,$item_id){
    	$data=array();
    	//$data['category_id']=$request->category_id;
    	$data['item_name']=$request->item_name;
    	$data['item_des']=$request->item_des;
    	

    	
    	DB::table('tbl_item')->where('item_id',$item_id)->update($data);

    	Session::put('message','Item Updated!');
    	return redirect::to('/all_item')->with('alert','Item updated Successfully');
    }

    public function delete_item($item_id){

    	DB::table('tbl_item')
    	->where('item_id',$item_id)
    	->delete();
    	return Redirect('/all_item')->with('alert','Item Deleted');

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
