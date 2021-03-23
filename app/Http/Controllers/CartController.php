<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;
use Session;
use Cart;
session_start();

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::where('category_status',0)->get();
        $brand = Brand::where('brand_status',0)->get();
        return view('cart.cart')->with(compact('category','brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $qty = $request->qty;
        $product_id = $request->product_id;
        $cart = Product::where('product_id',$product_id)->first();
        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        $data['id'] = $product_id;
        $data['qty'] = $qty;
        $data['price'] = $cart->product_price;
        $data['name'] = $cart->product_name;
        $data['weight'] = 50;
        $data['options']['image'] = $cart->product_image;
        Cart::add($data);
        return Redirect::to('/show-cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_cart(Request $request)
    {
        $qty = $request->quantity;
        $rowID = $request->rowId;
        Cart::update($rowID,$qty);
        return Redirect::to('/show-cart');
    }
    // public function update(Request $request, $id)
    // {
    //     $qty = $request->quantity;
    //     $rowID = $request->rowId;
    //     Cart::update($id,$qty);
    //     return Redirect::to('/show-cart');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::update($id,0);
        return Redirect::to('/show-cart');
    }
}


