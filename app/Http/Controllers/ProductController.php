<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Storage;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class ProductController extends Controller
{
        public function authLogin(){
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authLogin();
        $product = Product::with('category','brand')->orderBy('product_id','DESC')->get();
        return view('admin.all_product')->with(compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authLogin();
        $brand = Brand::all();
        $category = Category::all();
        return view('admin.add_product')->with(compact('brand','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authLogin();
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->product_desc = $request->product_desc;
        $product->product_content = $request->product_content;
        $product->product_price = $request->product_price;
        $product->product_status = $request->product_status;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $get_image = $request->file('product_image');
        if($get_image){
            $extension = $get_image->getClientOriginalExtension();
            $name = time().'_'.$get_image->getClientOriginalName();
            $get_image->move('public/upload/product',$name);
            $product->product_image = $name;
            $product->save();
            $request->session()->put('messege', 'Thêm sản phẩm thành công !!');
            return redirect()->back();
        }
        $product->product_image = '';
        $product->save();
        $request->session()->put('messege', 'Thêm sản phẩm thành công !!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authLogin();
        $brand = Brand::all();
        $category = Category::all();
        $product = Product::find($id);
        return view('admin.edit_product')->with(compact('product','brand','category'));
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
    public function update(Request $request, $id)
    {
        $this->authLogin();
        $product = Product::find($id);
        $product->product_name = $request->product_name;
        $product->product_desc = $request->product_desc;
        $product->product_content = $request->product_content;
        $product->product_price = $request->product_price;
        $product->product_status = $request->product_status;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $get_image = $request->file('product_image');
        if($get_image){
            $extension = $get_image->getClientOriginalExtension();
            $name = time().'_'.$get_image->getClientOriginalName();
            $get_image->move('public/upload/product',$name);
            $product->product_image = $name;
            $product->save();
            $request->session()->put('messege', 'Sửa sản phẩm thành công !!');
            return redirect()->back();
        }
        $product->product_image = '';
        $product->save();
        $request->session()->put('messege', 'Sửa sản phẩm thành công !!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authLogin();
        $product = Product::find($id);
        $product->delete();
        return redirect()->back();
    }
    public function detail($id){
        $category = Category::where('category_status',0)->get();
        $brand = Brand::where('brand_status',0)->get();
        $product = Product::with('category','brand')->where('product_id',$id)->first();
        $value_cate = $product->category_id;
        $value_brand = $product->brand_id;
        $category_type = Product::where('category_id',$value_cate)->where('product_id','!=',$product->product_id)->orderBy('product_id','desc')->take(3)->get();
        $brand_type = Product::where('brand_id',$value_brand)->where('product_id','!=',$product->product_id)->orderBy('product_id','desc')->take(3)->get();
        // dd($category_type);
        
        return view('pages.detail.detail')->with(compact('product','brand','category','category_type','brand_type'));
    }
}
