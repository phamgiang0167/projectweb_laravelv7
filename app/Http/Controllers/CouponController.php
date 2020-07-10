<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Coupon;
session_start();
class CouponController extends Controller
{
	public function checkLogin(){
        $admin_id = session::get('admin_id');
        if($admin_id){
            return redirect::to('/dashboard');
        }else{
            return redirect::to('/admin')->send();
        }
    }
    public function coupon(Request $request){
        $this->checkLogin();
        $data = $request->all();
        $coupon = new Coupon;
        $check = $coupon->where('coupon_code',$data['coupon'])->first();
        if($check){
            $count  = $check->count();
            if($count>0){
                $coupon_session = Session::get('coupon');
                $cou[] = array(
                    'coupon_code'=> $check->coupon_code,
                    'coupon_purpose'=> $check->coupon_purpose,
                    'coupon_decrease'=> $check->coupon_decrease,
                    'coupon_minimum'=> $check->coupon_minimum,
                );
                session::put('coupon',$cou);
                session::save();
                return redirect::back()->with('msg','suc');
            } 
        }else{
            Session::put('coupon',null);
            return redirect::back()->with('msg','no');
        }
    }

    public function addCoupon(){
        $this->checkLogin();
    	return view('admin.AddCoupon');
    }

    public function saveCoupon(Request $request){
    	$this->checkLogin();
    	$data = $request->all();
    	$coupon = new Coupon;
    	$coupon->coupon_name = $data['CouponName'];
    	$coupon->coupon_code = $data['CouponCode'];
    	$coupon->coupon_quanlity = $data['CouponQuanlity'];
    	$coupon->coupon_purpose = $data['CouponPurpose'];
    	$coupon->coupon_decrease = $data['CouponDecrease'];
        $coupon->coupon_minimum = $data['CouponMinimum'];
    	$coupon->save();
    	session::put('MsgAddSuc','Add succesful!');
    	return Redirect::to('/list-coupon');
    }

    public function listCoupon(){
    	$this->checkLogin();
        $coupon = new Coupon;
        return view('admin.ListCoupon')->with('coupon',$coupon->paginate(5));
    }

    public function deletedCoupon($CID){
        $this->checkLogin();
        $coupon = new Coupon;
        $coupon->where('coupon_id',$CID)->delete();
        return Redirect::to('/list-coupon');
    }
}
