<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Shipping;
use App\Order;
use App\order_detail;
session_start();

class OrderController extends Controller
{
    public function checkLogin(){
        $admin_id = session::get('admin_id');
        if($admin_id){
            return redirect::to('/dashboard');
        }else{
            return redirect::to('/admin')->send();
        }
    }
    public function manageOrder(){
        $this->checkLogin();
    	$order = Order::orderby('created_at','DESC')->paginate(10);
    	return view('admin.ManageOrder')->with(compact('order'));
    }

    public function viewOrder($OID){
        $this->checkLogin();
    	$shipping = DB::table('tbl_order')
    	->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
    	->where('tbl_order.order_id',$OID)
    	->get();

    	$product = DB::table('tbl_order')
    	->join('tbl_order_detail','tbl_order_detail.order_id','=','tbl_order.order_id')
    	->join('tbl_product','tbl_product.product_id','=','tbl_order_detail.product_id')
    	->where('tbl_order.order_id',$OID)
    	->select('tbl_product.product_image','tbl_product.product_name','tbl_order_detail.product_price','tbl_order_detail.product_quanlity','tbl_order.order_total','tbl_order_detail.order_detail_number','tbl_order_detail.order_detail_name','tbl_order_detail.product_size','tbl_order_detail.order_detail_image')
    	->get();

    	return view('admin.ViewOrder')->with('shipping',$shipping)->with('product',$product);
    }

    public function confirmOrder($OID){
        $this->checkLogin();
        Order::where('order_id',$OID)->update(['order_status'=>2]);
        return Redirect::to('/manage-order');
    }

    public function deleteOrder($OID){
        $this->checkLogin();
        Order::where('order_id',$OID)->delete();
         return Redirect::to('/manage-order');
    }
}
