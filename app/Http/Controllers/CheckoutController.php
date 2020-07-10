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
class CheckoutController extends Controller
{	

	public function checkLogin(){
    	if(Session::get('customer_id') && Session::get('shipping_id')){
    		return view('checkout.payment');
    	}elseif(Session::get('customer_id') && !Session::get('shipping_id')){
    		return view('checkout.checkout');
    	}elseif(!Session::get('customer_id') && Session::get('shipping_id')){
    		return redirect::to('/login-checkout');
    	}else{
    		return redirect::to('/');
    	}
    }
    public function loginCheckout(){
    	return view('checkout.LoginCheck');
    }

    public function logoutCheckout(){
    	session::flush();
    	return Redirect::to('/login-checkout');
    }

    public function confirm(Request $request){
        if(!Session::get('customer_id')){
            return redirect::to('login-checkout');
        }

        $data = $request->all();
        if(!$request->shipping_name ||!$request->shipping_email ||!$request->shipping_phone ||!$request->shipping_address ||!$request->newPaymentMethod){
            Session::put('msg','Something have not been filled');
            return redirect::to('/checkout');
        }
        if(Session::get('cart')){
         $shipping = new Shipping;
         $shipping->shipping_name = $data['shipping_name'];
         $shipping->shipping_email = $data['shipping_email'];
         $shipping->shipping_phone = $data['shipping_phone'];
         $shipping->shipping_address = $data['shipping_address'];
         $shipping->shipping_method = $data['newPaymentMethod'];
         $shipping->customer_id = Session::get('customer_id');
         $shipping->save();
         $shipping_id = $shipping->shipping_id;

         $order = new Order;
         $order->customer_id = Session::get('customer_id');
         $order->shipping_id = $shipping_id;
         $order->order_status = 1;
        $order->order_total = Session::get('last_total');
       
         $order->save();
        $order_id = $order->order_id;
         if(Session::get('cart')==true){
            foreach(Session::get('cart') as $key => $cart){
                $order_detail = new order_detail;
                $order_detail->product_id = $cart['product_id'];
                $order_detail->product_quanlity = $cart['product_qty'];
                $order_detail->product_price = $cart['product_price']*$cart['product_qty'];
                $order_detail->product_size = $cart['product_size'];
                $order_detail->order_detail_number = $cart['order_detail_number'];
                $order_detail->order_detail_name = $cart['order_detail_name'];
                $order_detail->order_detail_image = $cart['order_detail_image'];
                $order_detail->order_id = $order_id;
                $order_detail->save();
            }
         }
         Session::put('notice','suc');
         Session::forget('coupon');
         Session::forget('cart');
         Session::forget('last_total');
         return redirect::to('/checkout');
     }else{
        Session::put('notice','no');
        return redirect::to('/checkout');
     }
    }


    public function checkout(){
    	if(Session::get('customer_id')){
    		return view('checkout.checkout');
    	}else{
    		return redirect::to('/login-checkout');
    	}
    }

    

}
