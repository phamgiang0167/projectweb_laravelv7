<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\admin;
session_start();

class AdminController extends Controller
{
    public function checkLogin(){
        $admin_id = session::get('admin_id');
        if($admin_id){
            return redirect::to('/dashboard');
        }else{
            return redirect::to('/admin')->send();
        }
    }
    public function index(){
    	return view('admin-login');
    }

    public function show_dashboard(){
        $this->checkLogin();
    	return view('admin.dashboard');
    }

    public function dashboard(Request $request){

    	$admin_email = $request->input('admin_email');
    	$admin_password = md5($request->input('admin_password'));
    	$result = admin::checkLogin($admin_email,$admin_password);
    	if($result){
    		Session::put('admin_id',$result->admin_id);
    		Session::put('admin_name',$result->admin_name);
 			return Redirect::to('/dashboard');
    	}else{
    		Session::put('msg','log in failed');
    		return Redirect::to('/admin');
    	}
    }
    public function logout(){
    	Session::put('admin_id',null);
    	Session::put('admin_name',null);
    	return Redirect::to('/admin');
    }
}
