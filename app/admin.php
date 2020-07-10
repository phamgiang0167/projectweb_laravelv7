<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
	
	protected $primaryKey = 'admin_id';
	protected $table = 'tbl_admin';
	public static function checkLogin($admin_email,$admin_password){
		return $result = admin::where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
	}
	
    
}
