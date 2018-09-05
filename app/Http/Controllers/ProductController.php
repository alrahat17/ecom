<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HTTP\Requests;
use DB;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $this->AdminAuthCheck();
        return view('admin.add_product');
    }

    public function all_product(){

    $this->AdminAuthCheck();

    $data=DB::table('tbl_product')
                ->join('tbl_category','tbl_product.category_id','=','tbl_category.category_id')
                ->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')
                ->join('tbl_item','tbl_product.item_id','=','tbl_item.item_id')->orderBy('product_id','desc')
                ->get();

    

    
        

    return view('admin.all_product')->with('data', $data);
       
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save_product(Request $request){

        $this->validate($request,[

            'category_id'=>'required',
            'brand_id'=>'required',
            'item_id'=>'required',
            'product_name'=>'required|min:3',
            'product_des'=>'required|min:3',
            'product_img'=>'required|image|mimes:jpeg,jpg,png|max:1000',
            'product_price'=>'required',
           



        ]);

        $created_at=Carbon::now();
        $product_img=$request->file('product_img');
        $img_name= str_random(10).'.'.$product_img->getClientOriginalExtension();
        $upload_path='image/';
        $image_fullname=$img_name;
        $product_img->move($upload_path,$image_fullname);

       
        $data=array();
        $data['product_id']=$request->product_id;
        $data['category_id']=$request->category_id;
        $data['item_id']=$request->item_id;
        $data['brand_id']=$request->brand_id;
        $data['product_name']=$request->product_name;
        $data['product_des']=$request->product_des;
        $data['product_img']=$image_fullname;
        $data['product_price']=$request->product_price;
        $data['product_size']=$request->product_size;
        $data['product_size2']=$request->product_size2;
        $data['product_size3']=$request->product_size3;
        $data['product_size4']=$request->product_size4;
        $data['activation_status']=$request->activation_status;
        $data['created_at']=Carbon::now();

        
        DB::table('tbl_product')->insert($data);
        Session::put('message','product Added!');
        return redirect('/all_product')->with('alert','product Added Successfully');
        

        

    }

    public function inactive_product($product_id){
        DB::table('tbl_product')
        ->where('product_id',$product_id)
        ->update(['activation_status'=>0]);
        return Redirect('/all_product')->with('alert','product Status Changed');
    }

    public function active_product($product_id){
        DB::table('tbl_product')
        ->where('product_id',$product_id)
        ->update(['activation_status'=>1]);
        return Redirect('/all_product')->with('alert','product Status Changed');
    }

    public function edit_product($product_id){

        $data=DB::table('tbl_product')
        ->where('product_id',$product_id)
        ->first();

        $data=view('admin.edit_product')
        ->with('data',$data);

        return view('admin.admin_layout')
        ->with('admin.edit_product',$data);
        
        
    }

    public function update_product(Request $request,$product_id){

        $this->validate($request,[

            
            'product_name'=>'required|min:3',
            'product_des'=>'required|min:3',
            'product_price'=>'required',
           



        ]);

        
        
        $data=array();
        
        $data['product_name']=$request->product_name;
        $data['product_des']=$request->product_des;
        $data['product_price']=$request->product_price;
        $data['product_size']=$request->product_size;
        $data['product_size2']=$request->product_size2;
        $data['product_size3']=$request->product_size3;
        $data['product_size4']=$request->product_size4;

        

        
        DB::table('tbl_product')->where('product_id',$product_id)->update($data);

        Session::put('message','product Updated!');
        return redirect::to('/all_product')->with('alert','product updated Successfully');
    }

    public function delete_product($product_id){

        DB::table('tbl_product')
        ->where('product_id',$product_id)
        ->delete();
        return Redirect('/all_product')->with('alert','product Deleted');

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

    public function show_product_details($product_id,$item_id){

    //$this->AdminAuthCheck();

    $data=DB::table('tbl_product')
                ->join('tbl_category','tbl_product.category_id','=','tbl_category.category_id')
                ->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')
                ->join('tbl_item','tbl_product.item_id','=','tbl_item.item_id')
                ->where('product_id',$product_id)->first();

    $recom=DB::table('tbl_product')
                ->join('tbl_category','tbl_product.category_id','=','tbl_category.category_id')
                ->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')
                ->join('tbl_item','tbl_product.item_id','=','tbl_item.item_id')
                ->where('tbl_product.activation_status',1)
                ->where('tbl_item.item_id',$item_id)
                ->limit(3)->get();



    
        

    return view('product_details')->with('data', $data)->with('recom',$recom);

    }

    
}
