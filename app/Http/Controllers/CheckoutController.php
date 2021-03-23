<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Storage;
use DB;
use App\Models\Customer;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class CheckoutController extends Controller
{
    public function login(){
    	$category = Category::where('category_status',0)->get();
        $brand = Brand::where('brand_status',0)->get();
        return view('pages.login')->with(compact('category','brand'));
    }

    public function register(Request $request){
    	if (isset($request->name) && $request->email && $request->password && $request->phone) {
    		$customer = new Customer();
	    	$customer->customer_name = $request->name;
	    	$customer->customer_email = $request->email;
	    	$customer->customer_password = $request->password;
	    	$customer->customer_phone = $request->phone;
	    	$customer->save();
	    	$cus = Customer::orderBy('customer_id','DESC')->first();
	    	return Redirect::to('/checkout');
    	}else{
    		Session::put('alert','Vui Lòng nhập đầy đủ các trường !');
    	}

    }
    public function checkout(){
    }
}
