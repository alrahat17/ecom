<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HTTP\Requests;
use DB;
//use Http/Request;
use Session;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index(){
        return view('home_content');
    }

   public function all_product(){

    //$this->AdminAuthCheck();

    $data=DB::table('tbl_product')
                ->join('tbl_category','tbl_product.category_id','=','tbl_category.category_id')
                ->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')
                ->join('tbl_item','tbl_product.item_id','=','tbl_item.item_id')
                ->where('tbl_product.activation_status',1)
                ->inRandomOrder()->limit(15)
                ->get();

                ///limit 

    
        

    return view('home_content')->with('data', $data);
        
    }


    public function show_product_by_brand($brand_id)
    {
       
        $data=DB::table('tbl_product')
                ->join('tbl_category','tbl_product.category_id','=','tbl_category.category_id')
                ->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')
                ->join('tbl_item','tbl_product.item_id','=','tbl_item.item_id')
                ->where('tbl_product.activation_status',1)
                ->where('tbl_brand.brand_id',$brand_id)
                ->get();

                return view('home_content')->with('data', $data);
    }

    public function show_product_by_item($item_id)
    {
        $data=DB::table('tbl_product')
                ->join('tbl_category','tbl_product.category_id','=','tbl_category.category_id')
                ->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')
                ->join('tbl_item','tbl_product.item_id','=','tbl_item.item_id')
                ->where('tbl_product.activation_status',1)
                ->where('tbl_item.item_id',$item_id)
                ->get();

                return view('home_content')->with('data', $data);
    }

    public function show_contact_page(){

        return view ("contact");
    }

    public function show_products_page(){

        $data=DB::table('tbl_product')
                ->join('tbl_category','tbl_product.category_id','=','tbl_category.category_id')
                ->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')
                ->join('tbl_item','tbl_product.item_id','=','tbl_item.item_id')
                ->where('tbl_product.activation_status',1)
                ->inRandomOrder()
                ->get();


            $users = DB::table('tbl_product')->paginate(5);

        return view ("products")->with('data',$data);
    }

    public function show_blog_page(){

        $data=DB::table('tbl_blog')
                ->where('activation_status',1)
                ->get();

        return view ("blog")->with('data',$data);
    }
}
