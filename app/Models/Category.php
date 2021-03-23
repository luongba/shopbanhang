<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name', 'category_desc','category_status'];
    protected $table = 'tbl_category';
    public $timestamps = true;
     protected $primaryKey = 'category_id';
     public function product(){
    	return $this->hasMany('App\Models\Product','product_id','category_id');//('Đường dẫn', 'Khóa ngoại')
    }
}
