<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HTTP\Requests;
use DB;
use Carbon\Carbon;
//use Http/Request;
use Session;
use Illuminate\Support\Facades\Redirect;

class SliderController extends Controller
{
    public function index()
    {   
        $this->AdminAuthCheck();
        return view('admin.add_slider');
    }

    public function all_slider(){

    $this->AdminAuthCheck();

    $data=DB::table('tbl_slider')->get();
                
    
        

    return view('admin.all_slider')->with('data', $data);
        //return view('admin.all_brand');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save_slider(Request $request){

        $this->validate($request,[

            
            'slider_image'=>'required|image|mimes:jpeg,jpg,png|max:1000',
            'activation_status'=>'required',
           
            



        ]);

        
        $slider_image=$request->file('slider_image');
        $img_name= str_random(5).'.'.$slider_image->getClientOriginalExtension();
        //$slider_img->move(public_path("image"),$img_name);
        
        //$img_name=str_random(10);
        //$ext=strtolower($slider_img->getClientOriginalExtension());
        $upload_path='slider/';
        $image_fullname=$img_name;
        $slider_image->move($upload_path,$image_fullname);

       
        $data=array();
        
        $data['slider_image']=$slider_image;
        $data['activation_status']=$request->activation_status;
        $data['created_at']=Carbon::now();

        
        DB::table('tbl_slider')->insert($data);
        Session::put('message','slider Added!');
        return redirect('/all_slider')->with('alert','slider Added Successfully');
        

        

    }

    public function inactive_slider($slider_id){
        DB::table('tbl_slider')
        ->where('slider_id',$slider_id)
        ->update(['activation_status'=>0]);
        return Redirect('/all_slider')->with('alert','slider Status Changed');
    }

    public function active_slider($slider_id){
        DB::table('tbl_slider')
        ->where('slider_id',$slider_id)
        ->update(['activation_status'=>1]);
        return Redirect('/all_slider')->with('alert','slider Status Changed');
    }

    public function edit_slider($slider_id){

        $data=DB::table('tbl_slider')
        ->where('slider_id',$slider_id)
        ->first();

        $data=view('admin.edit_slider')
        ->with('data',$data);

        return view('admin.admin_layout')
        ->with('admin.edit_slider',$data);
        
        //echo $brand_id;
    }

    public function update_slider(Request $request,$slider_id){
        $data=array();
        
        $data['slider_name']=$request->brand_name;
        $data['slider_des']=$request->brand_des;
        

        
        DB::table('tbl_slider')->where('slider_id',$slider_id)->update($data);

        Session::put('message','slider Updated!');
        return redirect::to('/all_slider')->with('alert','slider updated Successfully');
    }

    public function delete_slider($slider_id){

        DB::table('tbl_slider')
        ->where('slider_id',$slider_id)
        ->delete();
        return Redirect('/all_slider')->with('alert','slider Deleted');

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
