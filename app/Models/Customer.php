<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['customer_name', 'customer_email','customer_password','customer_phone'];
    protected $table = 'customers';
    public $timestamps = true;
    protected $primaryKey = 'customer_id';
}
