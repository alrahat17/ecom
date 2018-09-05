<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\HTTP\Requests;
use DB;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;



class BlogController extends Controller
{
    public function index()
    {   
        $this->AdminAuthCheck();
        return view('admin.add_blog');
    }

    public function all_blog(){

    $this->AdminAuthCheck();

    $data=DB::table('tbl_blog')
                ->orderBy('blog_id','desc')
                ->limit(3)
                ->get();

    return view('admin.all_blog')->with('data', $data);
       
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save_blog(Request $request){

        $this->validate($request,[

            
            'title'=>'required|min:3',
            'body'=>'required|min:10',
            'blogger_name'=>'required|min:3',
            'blog_img'=>'required|image|mimes:jpeg,jpg,png|max:1000',
            



        ]);

        $created_at=Carbon::now();
        $blog_img=$request->file('blog_img');
        $img_name= str_random(10).'.'.$blog_img->getClientOriginalExtension();
        $upload_path='blog_image/';
        $image_fullname=$img_name;
        $blog_img->move($upload_path,$image_fullname);

       
        $data=array();
        $data['title']=$request->title;
        $data['body']=$request->body;
        $data['blog_img']=$image_fullname;
        $data['blogger_name']=$request->blogger_name;
        $data['activation_status']=$request->activation_status;
        $data['created_at']=Carbon::now();

        
        DB::table('tbl_blog')->insert($data);
        Session::put('message','blog Added!');
        return redirect('/all_blog')->with('alert','blog Added Successfully');
        

        

    }

    public function inactive_blog($blog_id){
        DB::table('tbl_blog')
        ->where('blog_id',$blog_id)
        ->update(['activation_status'=>0]);
        return Redirect('/all_blog')->with('alert','blog Status Changed');
    }

    public function active_blog($blog_id){
        DB::table('tbl_blog')
        ->where('blog_id',$blog_id)
        ->update(['activation_status'=>1]);
        return Redirect('/all_blog')->with('alert','blog Status Changed');
    }

    public function edit_blog($blog_id){

        $data=DB::table('tbl_blog')
        ->where('blog_id',$blog_id)
        ->first();

        $data=view('admin.edit_blog')
        ->with('data',$data);

        return view('admin.admin_layout')
        ->with('admin.edit_blog',$data);
        
        //echo $brand_id;
    }

    public function update_blog(Request $request,$blog_id){
        $data=array();
        
        $data['title']=$request->title;
        $data['body']=$request->body;
        

        
        DB::table('tbl_blog')->where('blog_id',$blog_id)->update($data);

        Session::put('message','blog Updated!');
        return redirect::to('/all_blog')->with('alert','blog updated Successfully');
    }

    public function delete_blog($blog_id){

        DB::table('tbl_blog')
        ->where('blog_id',$blog_id)
        ->delete();
        return Redirect('/all_blog')->with('alert','blog Deleted');

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

    public function show_blog_details($blog_id){

    $data=DB::table('tbl_blog')
    	->where('blog_id',$blog_id)->first();

    	return view('blog_details')->with('data', $data);
    }
}
