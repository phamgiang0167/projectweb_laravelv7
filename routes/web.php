<?php

use Illuminate\Support\Facades\Route;

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
//home
Route::get('/', 'HomeController@index');
Route::get('/trang-chu', 'HomeController@index');
Route::get('/category/{CateID}','HomeController@showCate');
Route::get('/FC/{FCID}','HomeController@showFC');
Route::post('/search','HomeController@search');

//product
Route::get('/detail/{proID}','ProductController@detail');

//admin
Route::get('/admin','AdminController@index');
Route::post('/admin-dashboard','AdminController@dashboard');
Route::get('/dashboard','AdminController@show_dashboard');
Route::get('/logout','AdminController@logout');


//category
Route::get('/add-category','CategoryProductController@addCategoryProduct');
Route::post('/save-category','CategoryProductController@save');

Route::get('/list-category','CategoryProductController@listCategoryProduct');
Route::get('/active/{categoryID}','CategoryProductController@active');
Route::get('/unactive/{categoryID}','CategoryProductController@unactive');

Route::get('/edit-category/{categoryID}','CategoryProductController@edit');
Route::post('/update-category/{categoryID}','CategoryProductController@update');
Route::get('/delete-category/{categoryID}','CategoryProductController@delete');


//Football club
Route::get('/add-FC','FootballClubController@addFC');
Route::post('/save-FC','FootballClubController@save');

Route::get('/list-FC','FootballClubController@listFC');
Route::get('/FC-active/{FCID}','FootballClubController@active');
Route::get('/FC-unactive/{FCID}','FootballClubController@unactive');

Route::get('/edit-FC/{FCID}','FootballClubController@edit');
Route::post('/update-FC/{FCID}','FootballClubController@update');
Route::get('/delete-FC/{FCID}','FootballClubController@delete');


//product
Route::get('/add-product','ProductController@addProduct');
Route::post('/save-product','ProductController@save');

Route::get('/list-product','ProductController@listProduct');
Route::get('/product-active/{pID}','ProductController@active');
Route::get('/product-unactive/{pID}','ProductController@unactive');

Route::get('/edit-product/{pID}','ProductController@edit');
Route::post('/update-product/{pID}','ProductController@update');
Route::get('/delete-product/{pID}','ProductController@delete');

//cart
Route::post('/to-cart','CartController@toCart');
Route::post('/add-cart','CartController@addCart');
Route::get('/cart','CartController@cart'); 
route::post('/update-cart','CartController@update');
Route::get('/delete-cart/{sesID}','CartController@delete'); 
Route::get('/add-request/{sesID}','CartController@addRequest');
Route::post('/save-request/{sesID}','CartController@saveRequest');

//coupon
Route::post('/confirm-coupon','CouponController@coupon');

Route::get('/add-coupon','CouponController@addCoupon');
Route::post('/save-coupon','CouponController@saveCoupon');

Route::get('/list-coupon','CouponController@listCoupon');

Route::get('/delete-coupon/{CID}','CouponController@deletedCoupon');


//chekout
Route::post('/confirm','CheckoutController@confirm');
Route::get('/confirm','CheckoutController@confirm');
Route::get('/login-checkout','CheckoutController@loginCheckout');
Route::get('/checkout','CheckoutController@checkout');
Route::get('/logout-checkout','CheckoutController@logoutCheckout');
Route::post('/order','CheckoutController@order');

//customer
Route::post('/create-account','CustomerController@addCustomer');
Route::post('/login','CustomerController@login');

//order
Route::get('/manage-order','OrderController@manageOrder');
Route::get('/view-order/{OID}','OrderController@viewOrder');
Route::get('/confirm-deliver/{OID}','OrderController@confirmOrder');
Route::get('/delete-order/{OID}','OrderController@deleteOrder');



