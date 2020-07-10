<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Social;
use Socialite;
use App\Login;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Rules\Captcha; 
use App\Category;
session_start();


class CategoryProductController extends Controller
{
    public function checkLogin(){
        $admin_id = session::get('admin_id');
        if($admin_id){
            return redirect::to('/dashboard');
        }else{
            return redirect::to('/admin')->send();
        }
    }
    public function addCategoryProduct(){
        $this->checkLogin();
    	return view('admin.addCategoryProduct');
    }

    public function listCategoryProduct(){
        $this->checkLogin();
        $category = new Category;
        return view('admin.ListcategoryProduct')->with('data',$category->orderby('category_id','DESC')->paginate(5));
    }

    public function save(Request $request){
        $this->checkLogin();
    	$category = new Category;
        $category->category_name = $request->input('CategoryName');
        $category->category_desc = $request->input('CategoryDescription');
        $category->category_status = $request->input('CategoryStatus');
        $category->save();
    	session::put('MsgAddSuc','Add succesful!');
    	return Redirect::to('/add-category');
    }

    public function active($categoryID){
        $this->checkLogin();
        $category = new Category;
        $category->where('category_id',$categoryID)->update(['category_status'=>1]);
        return Redirect::to('/list-category');
    }

    public function unactive($categoryID){
        $this->checkLogin();
        $category = new Category;
        $category->where('category_id',$categoryID)->update(['category_status'=>0]);
        return Redirect::to('/list-category');
    }

    public function edit($categoryID){
        $this->checkLogin();
        $category = new Category;
        return view('admin.EditCategoryProduct')->with('data',$category->where('category_id',$categoryID)->get());
        
    }

    public function delete($categoryID){
        $this->checkLogin();
        $category = new Category;
        $category->where('category_id',$categoryID)->delete();
        return Redirect::to('/list-category');
    }

    public function update(Request $request, $categoryID){
        $this->checkLogin();
        $category = new Category;
        $data=array();
        $data['category_name'] = $request->CategoryName;
        $data['category_desc'] = $request->CategoryDescription;
        $category->where('category_id',$categoryID)->update($data);
        return Redirect::to('/list-category');
    }
}
