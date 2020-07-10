<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = "tbl_product";
    protected $primaryKey = 'product_id';
}
