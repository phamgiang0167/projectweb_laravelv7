<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\product;
use App\FC;
use App\Category;
session_start();

class ProductController extends Controller
{
    public function checkLogin(){
        $admin_id = session::get('admin_id');
        if($admin_id){
            return redirect::to('/dashboard');
        }else{
            return redirect::to('/admin')->send();
        }
    }
    public function addProduct(){
        $this->checkLogin();
    	$category = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
    	$FC = DB::table('tbl_FC')->orderby('FC_id','desc')->get();
    	return view('admin.AddProduct')->with('category',$category)->with('FC',$FC);
    }

    public function listProduct(){
        $this->checkLogin();
        $data = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_FC','tbl_FC.FC_id','=','tbl_product.FC_id')
        ->orderby('product_id','desc')
        ->paginate(5);
    	return view('admin.ListProduct')->with('data',$data);
    }

    public function save(Request $request){
        $this->checkLogin();
        $product = new product;
    	$data= array();
    	$data['product_name'] = $request->ProductName;
        $data['category_id'] = $request->CategoryID;
        $data['FC_id'] = $request->FCID;
    	$data['product_desc'] = $request->ProductDescription;
    	$data['product_content'] = $request->ProductContent;
    	$data['product_price'] = $request->ProductPrice;
    	$data['product_material'] = $request->ProductMaterial;
    	$data['product_color'] = $request->ProductColor;
    	$data['product_status'] = $request->ProductStatus;

        $image = $request->file('ProductImage');
        if($image){
            $get_full_name = $image->getClientOriginalName();
            $get_name = current(explode('.',$get_full_name));
            $new_image = $get_name.rand(0,99).'.'.$image->getClientOriginalExtension();
            $image->move('public/upload/product',$new_image);
            $data['product_image'] = $new_image;
                $product->insert($data);
                session::put('MsgAddSuc','Add succesful!');
                return Redirect::to('/add-product');
        }
        $data['product_image'] = '';
        $product->insert($data);
        session::put('MsgAddSuc','Add succesful!');
        return Redirect::to('/add-product');

    }

    public function active($ProductID){
        $this->checkLogin();
        $product = new product;
        $product->where('product_id',$ProductID)->update(['product_status'=>1]);
        return Redirect::to('/list-product');
    }

    public function unactive($ProductID){
        $this->checkLogin();
        $product = new product;
        $product->where('product_id',$ProductID)->update(['product_status'=>0]);
        return Redirect::to('/list-product');
    }

    public function edit($ProductID){
        $this->checkLogin();
        $category = new Category;
        $FC = new FC;
        $product=DB::table('tbl_product')->where('product_id',$ProductID)->get();
        return view('admin.EditProduct')->with('product',$product)->with('category',$category->all())->with('FC',$FC->all());
    }

    public function delete($ProductID){
        $this->checkLogin();
        DB::table('tbl_product')->where('product_id',$ProductID)->delete();
        return Redirect::to('/list-product');
    }

    public function update(Request $request, $ProductID){
        $this->checkLogin();
        $product = new product;
        $data= array();
        $data['product_name'] = $request->ProductName;
        $data['category_id'] = $request->CategoryID;
        $data['FC_id'] = $request->FCID;
        $data['product_desc'] = $request->ProductDescription;
        $data['product_content'] = $request->ProductContent;
        $data['product_price'] = $request->ProductPrice;
        $data['product_material'] = $request->ProductMaterial;
        $data['product_color'] = $request->ProductColor;
        $image = $request->file('ProductImage');
        if($image){
            $get_full_name = $image->getClientOriginalName();
            $get_name = current(explode('.',$get_full_name));
            $new_image = $get_name.rand(0,99).'.'.$image->getClientOriginalExtension();
            $image->move('public/upload/product',$new_image);
            $data['product_image'] = $new_image;
            $product->where('product_id',$ProductID)->update($data);
            session::put('MsgAddSuc','update succesful!');
            return Redirect::to('/list-product');
        }
        DB::table('tbl_Product')->where('product_id',$ProductID)->update($data);
        session::put('MsgAddSuc','update succesful!');
        return Redirect::to('/list-product');
    }
    //end admin
    
    //product
    public function detail($proID){
        $category = new Category;
        $FC = new FC;
        $product = new product;
        $dataCate = $category->where('category_status',"1")->orderby('category_id','desc')->get();
        $dataFC =$FC->where('FC_status',"1")->orderby('FC_id','desc')->get();
        $product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_FC','tbl_FC.FC_id','=','tbl_product.FC_id')
        ->where('product_id',$proID)->get();
        foreach($product as $key=>$pro){
            $rec_item = $pro->category_id;
        }
       
        $rec_items = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_FC','tbl_FC.FC_id','=','tbl_product.FC_id')
        ->where('tbl_category_product.category_id',$rec_item)->whereNotIn('tbl_product.product_id',[$proID])->get();
        return view('pages.ProductDetail')->with('category',$dataCate)->with('FC',$dataFC)->with('product',$product)->with('recommend',$rec_items);
    }

    

}
