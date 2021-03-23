<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['brand_name', 'brand_desc','brand_status'];
    protected $table = 'brands';
    public $timestamps = true;
    protected $primaryKey = 'brand_id';

    // public function product(){
    // 	return $this->hasMany('App\Models\Product', 'brand_id');
    // }
}
