<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Customer;
session_start();

class CustomerController extends Controller
{
   
    public function addCustomer(Request $request){

    	$data = array(
    		'customer_name' => $request->newName,
    		'customer_email' => $request->newEmail,
    		'customer_password' => md5($request->newPassword),
    		'customer_phone' => $request->newPhone,
    	);
    	$new_cus = DB::table('tbl_customer')->insertGetId($data);
    	session::put('customer_id',$new_cus);
    	session::put('customer_name',$request->newName);
    	return redirect::to('/checkout');
    }

    public function login(Request $request){
        $email = $request->email_account;
        $password = md5($request->email_password);
        $result = Customer::where('customer_email',$email)->where('customer_password',$password)->first();
        if($result){
            Session::put('customer_id',$result->customer_id);
            Session::put('customer_name',$result->customer_name);
            return redirect::to('/checkout');
        }
        return redirect::to('/login-checkout');
    }   
}
