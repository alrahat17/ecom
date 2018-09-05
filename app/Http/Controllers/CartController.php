<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HTTP\Requests;
use DB;
//use Http/Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use Cart;

class CartController extends Controller
{
   public function add_to_cart(Request $request){

	$qty= $request->qty;
	$product_id=$request->product_id;
	$product_details=DB::table('tbl_product')
					->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')
					->where('product_id',$product_id)
					->first();

	$data['qty']=$qty;
	$data['id']=$product_details->product_id;
	$data['name']=$product_details->product_name;
  $data['options']['brand']=$product_details->brand_name;
	$data['options']['size']=$request->select_product_size;
	$data['price']=$product_details->product_price;
	$data['options']['image']=$product_details->product_img;

	Cart::add($data);
	return Redirect::to('/show_cart');

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
   	return Redirect::to('/show_cart');
   }

   public function inc_qty(Request $request){
   	$qty=$request->qty;
   	$rowId=$request->rowId;
   
   	$qty=$qty+1;

   	Cart::update($rowId,$qty);

   	return Redirect::to('/show_cart');

   }

   public function dec_qty(Request $request){
   	$qty=$request->qty;
   	$rowId=$request->rowId;
   
   	$qty=$qty-1;

   	Cart::update($rowId,$qty);

   	return Redirect::to('/show_cart');

   }


}
