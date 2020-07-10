<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\FC;
session_start();

class FootballClubController extends Controller
{
    public function checkLogin(){
        $admin_id = session::get('admin_id');
        if($admin_id){
            return redirect::to('/dashboard');
        }else{
            return redirect::to('/admin')->send();
        }
    }
    public function addFC(){
        $this->checkLogin();
        return view('admin.addFC');
    }

    public function listFC(){
        $this->checkLogin();
        $FC = new FC;
        return view('admin.ListFC')->with('data',$FC->orderby('FC_id','desc')->paginate(5));
    }

    public function save(Request $request){
        $this->checkLogin();
        $FC = new FC;
        $FC->FC_name = $request->input('FCName');
        $FC->FC_desc = $request->input('FCDescription');
        $FC->FC_status = $request->input('FCStatus');
        $FC->save();
        session::put('MsgAddSuc','Add succesful!');
        return Redirect::to('/add-FC');
    }

    public function active($FCID){
        $this->checkLogin();
        $FC = new FC;
        $FC->where('FC_id',$FCID)->update(['FC_status'=>1]);
        return Redirect::to('/list-FC');
    }

    public function unactive($FCID){
        $this->checkLogin();
        $FC = new FC;
        $FC->where('FC_id',$FCID)->update(['FC_status'=>0]);
        return Redirect::to('/list-FC');
    }

    public function edit($FCID){
        $this->checkLogin();
        $FC = new FC;
        return view('admin.EditFC')->with('data',$FC->where('FC_id',$FCID)->get());
        
    }

    public function delete($FCID){
        $this->checkLogin();
        $FC = new FC;
        $FC->where('FC_id',$FCID)->delete();
        return Redirect::to('/list-FC');
    }

    public function update(Request $request, $FCID){
        $this->checkLogin();
        $FC = new FC;
        $data=array();
        $data['FC_name'] = $request->FCName;
        $data['FC_desc'] = $request->FCDescription;
        $FC->where('FC_id',$FCID)->update($data);
        return Redirect::to('/list-FC');
    }
}
