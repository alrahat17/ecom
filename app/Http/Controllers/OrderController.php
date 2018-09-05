<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Order_item;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all_order()
    {
        $this->AdminAuthCheck(); 
        $orders=DB::table('orders')
                    ->join('tbl_customer','orders.customer_id','=','tbl_customer.customer_id')->orderBy('id','desc')->get();
        //$orders=Order::all();

        return view('admin.all_order')->with('orders',$orders)->with('data','$data');
    }

    public function all_order_item()
    {   
         $this->AdminAuthCheck();
         $data=DB::table('tbl_product')
                ->join('tbl_category','tbl_product.category_id','=','tbl_category.category_id')
                ->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')
                ->join('tbl_item','tbl_product.item_id','=','tbl_item.item_id')->get();
        $order_items=DB::table('order_items')
            ->join('tbl_product','tbl_product.product_id','=','order_items.product_id')->orderBy('id','desc')->get();
        //$order_items= Order_item::all();
        return view('admin.all_order_item')->with('order_items',$order_items)->with('data','$data');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
