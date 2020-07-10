<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\product;
use App\Category;
use App\FC;
session_start();

class CartController extends Controller
{
    public function toCart(Request $request){
        $product_id = $request->product_id;
        $quantity = $request->quantity;
        $product = new product;
        $cartItem = $product->where('product_id',$product_id)->get();
        
        return view('pages.Cart')->with('cartItem',$cartItem);

    }

    public function addCart(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart==true){
            $is_avaiable = 0;
            foreach($cart as $key => $val){
                if($val['product_id']==$data['cartID']){
                    $is_avaiable++;
                }
            }
            if($is_avaiable == 0){
                $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cartName'],
                'product_id' => $data['cartID'],
                'product_image' => $data['cartImage'],
                'product_qty' => $data['cartQuantity'],
                'product_price' => $data['cartPrice'],
                'product_size' => null,
                'order_detail_number' =>null,
                'order_detail_name' =>null,
                'order_detail_image' =>null,
                );
                Session::put('cart',$cart);
            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cartName'],
                'product_id' => $data['cartID'],
                'product_image' => $data['cartImage'],
                'product_qty' => $data['cartQuantity'],
                'product_price' => $data['cartPrice'],
                'product_size' => null,
                'order_detail_number' =>null,
                'order_detail_name' =>null,
                'order_detail_image' =>null,

                );
            Session::put('cart',$cart);
        }
       
        Session::save();


    }  

    public function delete($sesID){
        $cart = session::get('cart');
        if($cart){
            foreach($cart as $key=>$value){
                if($value['session_id'] == $sesID){
                    unset($cart[$key]);
                    session::put('deleteSuc','ITEM WAS DELETED');

                }
            }
        }
        session::put('cart',$cart);
        return Redirect()->back();
    }
    public function update(Request $request){
        $data = $request->all();
        $cart = session::get('cart');
        if($cart){
            foreach($data['quantity'] as $key1=>$value){
                foreach($cart as $key2 => $quantity){
                    if($quantity['session_id'] == $key1){
                        $cart[$key2]['product_qty'] = $value;
                    }
                }
            }
            session::put('cart',$cart);
            session::put('update','UPDATED!');
            return Redirect()->back();
        }else{
            session::put('update','NOTHING TO UPDATE');
            return Redirect()->back();
        }

    }
    public function cart(Request $request){
        $url_canonical = $request->url();
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get(); 
        $FC = DB::table('tbl_FC')->where('FC_status','1')->orderby('FC_id','desc')->get(); 
        return view('pages.Cart')->with('category',$cate_product)->with('FC',$FC);
    }

    public function addRequest($sesID){
        if(Session::get('cart')){
            foreach(Session::get('cart')as $key => $cart){
                if($cart['session_id']==$sesID){
                    $data = Session::get('cart')[$key];
                }
            }
        }
        return view('pages.Request')->with('data',$data);
       
    }

    public function saveRequest($sesID,Request $request){
        $cart = Session::get('cart');
        foreach($cart as $key => $value){
            if($value['session_id'] == $sesID){
                $cart[$key]['product_size'] = $request->size;
                $cart[$key]['order_detail_number'] = $request->number;
                $cart[$key]['order_detail_name'] = $request->name;
                $image = $request->file('image');
                if($image){
                    $get_full_name = $image->getClientOriginalName();
                    $get_name = current(explode('.',$get_full_name));
                    $new_image = $get_name.rand(0,99).'.'.$image->getClientOriginalExtension();
                    $image->move('public/upload/detail',$new_image);
                    $cart[$key]['order_detail_image'] = $new_image;
                }
            }
        }
        session::put('cart',$cart);
        return Redirect::to('/cart');
    }



}
