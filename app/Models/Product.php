<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['brand_id','category_id','product_name','product_desc','product_content','product_image','product_price','product_status'];
    protected $table = 'products';
    public $timestamps = true;
    protected $primaryKey = 'product_id';
    public function category(){
    	return $this->belongsTo('App\Models\Category', 'category_id');
    }
    public function brand(){
    	return $this->belongsTo('App\Models\Brand', 'brand_id');
    }
}
