<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//frontend

Route::get('/','HomeController@all_product');
Route::get('/contact','HomeController@show_contact_page');
Route::get('/blog','HomeController@show_blog_page');
Route::get('/products','HomeController@show_products_page');

//product by category

Route::get('/product_by_brand/{brand_id}','HomeController@show_product_by_brand');
Route::get('/product_by_item/{item_id}','HomeController@show_product_by_item');
//Route::post('/add_to_cart/{product_id}','CartController@add_to_cart');
Route::post('/add_to_cart','CartController@add_to_cart');
Route::get('/show_cart','CartController@show_cart');
Route::get('/delete_cart_item/{rowId}','CartController@delete_cart_item');
Route::get('/inc_qty/{rowId}/{qty}','CartController@inc_qty');
Route::get('/dec_qty/{rowId}/{qty}','CartController@dec_qty');
Route::get('/customerlogin','CheckoutController@customer_login');
Route::post('/customer_login_check','CheckoutController@customer_login_check');
Route::post('/customer_reg','CheckoutController@customer_reg');
Route::get('/customer_logout','CheckoutController@customer_logout');
Route::get('/customer_payment','CheckoutController@customer_payment');


//customer checkout

Route::get('/customer_checkout','CheckoutController@customer_checkout');

//Route::post('/save_shipping_info','CheckoutController@save_shipping_info');
Route::post('/save_order','CheckoutController@save_order');




//backend

Route::get('/admin','AdminController@index');
//Route::get('/dashboard','AdminController@show_dashboard');
Route::get('/dashboard','SuperAdminController@index');
Route::post('/admin_dashboard','AdminController@dashboard');
Route::get('/admin_logout','SuperAdminController@admin_logout');


//category

Route::get('/add_category','CategoryController@index');
Route::get('/all_category','CategoryController@all_category');
Route::post('/save_category','CategoryController@save_category');
Route::get('/inactive_category/{category_id}','CategoryController@inactive_category');
Route::get('/active_category/{category_id}','CategoryController@active_category');
Route::get('/edit_category/{category_id}','CategoryController@edit_category');
Route::post('/update_category/{category_id}','CategoryController@update_category');
Route::get('/delete_category/{category_id}','CategoryController@delete_category');


//item 

Route::get('/add_item','ItemController@index');
Route::get('/all_item','ItemController@all_item');
Route::post('/save_item','ItemController@save_item');
Route::get('/inactive_item/{item_id}','ItemController@inactive_item');
Route::get('/active_item/{item_id}','ItemController@active_item');
Route::get('/edit_item/{item_id}','ItemController@edit_item');
Route::post('/update_item/{item_id}','ItemController@update_item');
Route::get('/delete_item/{item_id}','ItemController@delete_item');

//Route::resource('brands','BrandController');

//Brand

Route::get('/add_brand','BrandController@index');
Route::get('/all_brand','BrandController@all_brand');
Route::post('/save_brand','BrandController@save_brand');
Route::get('/inactive_brand/{brand_id}','BrandController@inactive_brand');
Route::get('/active_brand/{brand_id}','BrandController@active_brand');
Route::get('/edit_brand/{brand_id}','BrandController@edit_brand');
Route::post('/update_brand/{brand_id}','BrandController@update_brand');
Route::get('/delete_brand/{brand_id}','BrandController@delete_brand');

//Product

Route::get('/add_product','ProductController@index');
Route::get('/all_product','ProductController@all_product');
Route::post('/save_product','ProductController@save_product');
Route::get('/inactive_product/{product_id}','ProductController@inactive_product');
Route::get('/active_product/{product_id}','ProductController@active_product');
Route::get('/edit_product/{product_id}','ProductController@edit_product');
Route::post('/update_product/{product_id}','ProductController@update_product');
Route::get('/delete_product/{product_id}','ProductController@delete_product');
Route::get('/product_details/{product_id}/{item_id}','ProductController@show_product_details');

//Slider

Route::get('/add_slider','SliderController@index');
Route::get('/all_slider','SliderController@all_slider');
Route::post('/save_slider','SliderController@save_slider');
Route::get('/inactive_slider/{slider_id}','SliderController@inactive_slider');
Route::get('/active_slider/{slider_id}','SliderController@active_slider');
Route::get('/edit_slider/{sliderslider_id}','SliderController@edit_slider');
Route::post('/update_slider/{slider_id}','SliderController@update_slider');
Route::get('/delete_slider/{slider_id}','SliderController@delete_slider');


//Order

//Route::get('/add_brand','BrandController@index');
Route::get('/all_order','OrderController@all_order');
// Route::post('/save_brand','BrandController@save_brand');
// Route::get('/inactive_brand/{brand_id}','BrandController@inactive_brand');
// Route::get('/active_brand/{brand_id}','BrandController@active_brand');
// Route::get('/edit_brand/{brand_id}','BrandController@edit_brand');
// Route::post('/update_brand/{brand_id}','BrandController@update_brand');
// Route::get('/delete_brand/{brand_id}','BrandController@delete_brand');


Route::get('/all_order_item','OrderController@all_order_item');


//Blog

Route::get('/add_blog','BlogController@index');
Route::get('/all_blog','BlogController@all_blog');
Route::post('/save_blog','BlogController@save_blog');
Route::get('/inactive_blog/{blog_id}','BlogController@inactive_blog');
Route::get('/active_blog/{blog_id}','BlogController@active_blog');
Route::get('/edit_blog/{blog_id}','BlogController@edit_blog');
Route::post('/update_blog/{blog_id}','BlogController@update_blog');
Route::get('/delete_blog/{blog_id}','BlogController@delete_blog');
Route::get('/blog_details/{blog_id}','BlogController@show_blog_details');









// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
