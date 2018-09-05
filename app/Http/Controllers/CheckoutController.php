<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\HTTP\Requests;
use DB;
use Session;
use App\Order;
use App\Order_item;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Cart;

class CheckoutController extends Controller
{
    public function customer_login(){

    	return view('customerlogin');
    }

    public function customer_login_check(Request $request){
       
        $customer_email=$request->customer_email;
        $customer_password=md5($request->customer_password);
        $result=DB::table('tbl_customer')
                        ->where('customer_email',$customer_email)
                        ->where('customer_password',$customer_password)
                        ->first();

        if ($result) {
            
        Session::put('customer_id',$result->customer_id);

        if(Cart::count()!=0){

            return redirect('/customer_checkout');
        }
        else
        {
            return redirect ('/');
        }        
        }
        else
        {
            return Redirect::to('/customerlogin');
        }
    }

    public function customer_reg(Request $request){

    	$data=array();
    	$data['customer_name']= $request->customer_name;
    	$data['customer_email']= $request->customer_email;
    	$data['customer_phone']= $request->customer_phone;
    	$data['customer_address']= $request->customer_address;
    	$data['customer_password']= md5($request->customer_password);
        $data['created_at']=Carbon::now();

        $customer_id=DB::table('tbl_customer')->insertGetId($data);
        

    	//DB::table('tbl_customer')->insert($data);
        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);
    	
        if(Cart::count()!=0){

            return redirect('/customer_checkout');
        }
        else
        {
            return redirect ('/');
        }        
    	


    }

    public function customer_checkout(){

        if(Session::get("customer_id"))
            return view('checkout');
       else
            return view("/customerlogin");     
     
      	
    }

    public function show_cart(){

   
    $data=DB::table('tbl_product')
                ->join('tbl_category','tbl_product.category_id','=','tbl_category.category_id')
                ->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')
                ->join('tbl_item','tbl_product.item_id','=','tbl_item.item_id')
                ->first();

    
        

    return view('add_to_cart')->with('data', $data);

   }

   public function delete_cart_item($rowId){

    Cart::remove($rowId);
    return Redirect::to('/checkout');
   }

   public function inc_qty(Request $request){
    $qty=$request->qty;
    $rowId=$request->rowId;
   
    $qty=$qty+1;

    Cart::update($rowId,$qty);

    return Redirect::to('/checkout');

   }

   public function dec_qty(Request $request){
    $qty=$request->qty;
    $rowId=$request->rowId;
   
    $qty=$qty-1;

    Cart::update($rowId,$qty);

    return Redirect::to('/checkout');

   }

   public function save_order(Request $request){

    // $this->validate($request,[
    //         'customer_id'=>'required',
    //         'customer_name'=>'required',
    //         'activation_status'=>'required',
    //         'activation_status'=>'required',
    //         'activation_status'=>'required',
    //         'activation_status'=>'required',
    //         'activation_status'=>'required',



    //     ]);


    $order= new Order;
    $order->customer_id=Session::get('customer_id');
    $order->customer_name=$request->input('customer_name');
    $order->total_amount=Cart::total();
    $order->district=$request->input('district');
    $order->shipping_address=$request->input('shipping_address');
    $order->contact_no=$request->input('contact_no');
    $order->payment_method=$request->input('payment_method');
    $order->save();

    $contents= Cart::content();

    foreach ($contents as $content) {
    $order_item = new Order_item;
    $order_item->order_id=$order->id;
    $order_item->product_id=$content->id;
    $order_item->product_name=$content->name;
    $order_item->brand_name=$content->options->brand;
    $order_item->qty=$content->qty;
    $order_item->product_size=$content->options->size;
    $order_item->product_price=$content->total;
    $order_item->save();
    }
    
    Session::put('message','Your order confirmed!');

    return Redirect::to('/');




   
   }

   public function customer_logout(){

    Session::flush();
    return Redirect::to('/');
   }

   public function customer_payment(){

    return view('/customer_payment');
   }

   

}
