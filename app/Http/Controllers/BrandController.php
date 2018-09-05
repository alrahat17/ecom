<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HTTP\Requests;
use DB;
//use Http/Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
session_start();

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $this->AdminAuthCheck();
        return view('admin.add_brand');
    }

    public function all_brand(){
        $this->AdminAuthCheck();
        $data=DB::table('tbl_brand')->orderBy('brand_id','desc')->get();
        //->orderBy('brand_name','desc') 

    return view('admin.all_brand')->with('data', $data);
        //return view('admin.all_brand');
    }

    public function save_brand(Request $request){

        $data=array();
        $data['brand_id']=$request->brand_id;
        $data['brand_name']=$request->brand_name;
        $data['brand_des']=$request->brand_des;
        $data['activation_status']=$request->activation_status;
        $data['created_at']=Carbon::now();

        
        DB::table('tbl_brand')->insert($data);
        Session::put('message','brand Added!');
        return redirect('/all_brand')->with('alert','brand Added Successfully');
        

        

    }

    public function inactive_brand($brand_id){
        DB::table('tbl_brand')
        ->where('brand_id',$brand_id)
        ->update(['activation_status'=>0]);
        return Redirect('/all_brand')->with('alert','brand Status Changed');
    }

    public function active_brand($brand_id){
        DB::table('tbl_brand')
        ->where('brand_id',$brand_id)
        ->update(['activation_status'=>1]);
        return Redirect('/all_brand')->with('alert','brand Status Changed');
    }

    public function edit_brand($brand_id){

        $data=DB::table('tbl_brand')
        ->where('brand_id',$brand_id)
        ->first();

        $data=view('admin.edit_brand')
        ->with('data',$data);

        return view('admin.admin_layout')
        ->with('admin.edit_brand',$data);
        
        //echo $brand_id;
    }

    public function update_brand(Request $request,$brand_id){
        $data=array();
        
        $data['brand_name']=$request->brand_name;
        $data['brand_des']=$request->brand_des;
        

        
        DB::table('tbl_brand')->where('brand_id',$brand_id)->update($data);

        Session::put('message','brand Updated!');
        return redirect::to('/all_brand')->with('alert','brand updated Successfully');
    }

    public function delete_brand($brand_id){

        DB::table('tbl_brand')
        ->where('brand_id',$brand_id)
        ->delete();
        return Redirect('/all_brand')->with('alert','brand Deleted');

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
