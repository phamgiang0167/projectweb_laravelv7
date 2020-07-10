<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\FC;
use App\Category;
use App\product;
session_start();
class HomeController extends Controller
{
    public function index(){
    	$category = new Category;
    	$FC = new FC;
    	$product = new product;
    	$dataCate = $category->where('category_status',"1")->orderby('category_id','desc')->get();
    	$dataFC =$FC->where('FC_status',"1")->orderby('FC_id','desc')->get();
    	$all_product = $product->where('product_status',"1")->orderby('product_id','desc')->paginate(6);
    	return view('pages.home')->with('category',$dataCate)->with('FC',$dataFC)->with('product',$all_product);
    }

    public function showCate($CateID){
    	$category = new Category;
    	$FC = new FC;
    	$product = new product;
    	$dataCate = $category->where('category_status',"1")->orderby('category_id','desc')->get();
    	$dataFC =$FC->where('FC_status',"1")->orderby('FC_id','desc')->get();
    	$all_product = $product->where('category_id',$CateID)->paginate(6);
    	return view('pages.home')->with('category',$dataCate)->with('FC',$dataFC)->with('product',$all_product);
    }

    public function showFC($FCID){
    	$category = new Category;
    	$FC = new FC;
    	$product = new product;
    	$dataCate = $category->where('category_status',"1")->orderby('category_id','desc')->get();
    	$dataFC =$FC->where('FC_status',"1")->orderby('FC_id','desc')->get();
    	$all_product = $product->where('FC_id',$FCID)->paginate(6);
    	return view('pages.home')->with('category',$dataCate)->with('FC',$dataFC)->with('product',$all_product);
    }

    public function search(Request $request){
        $category = new Category;
        $FC = new FC;
        $product = new product;
        $dataCate = $category->where('category_status',"1")->orderby('category_id','desc')->get();
        $dataFC =$FC->where('FC_status',"1")->orderby('FC_id','desc')->get();
        $keyword = $request->search;
        $all_product = $product->where('product_name','like','%'.$keyword.'%')->orWhere('product_desc','like','%'.$keyword.'%')->orWhere('product_content',"1")->orderby('product_id','desc')->paginate(6);
        return view('pages.home')->with('category',$dataCate)->with('FC',$dataFC)->with('product',$all_product);
    }

}
