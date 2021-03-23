<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class BrandController extends Controller
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
        $brand = Brand::all();
        return view('admin.all_brand')->with(compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authLogin();
       return view('admin.add_brand');

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
        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->brand_desc = $request->brand_desc;
        $brand->brand_status = $request->brand_status;
        $brand->save();
        $request->session()->put('messege', 'Thêm thương hiệu thành công !!');
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
        $brand = Brand::find($id);
        return view('admin.edit_brand')->with(compact('brand'));
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
        $brand = Brand::find($id);
        $brand->brand_name = $request->brand_name;
        $brand->brand_desc = $request->brand_desc;
        $brand->brand_status = $request->brand_status;
        $brand->save();
        $request->session()->put('messege', 'Sửa thương hiệu thành công !!');
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
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->back();

    }
    public function hienThiBrand($id)
    {
        $category = Category::where('category_status',0)->get();
        $brand = Brand::where('brand_status',0)->get();
        $bra = Brand::where('brand_status',0)->where('brand_id',$id)->first();
        $product = Product::all()->where('brand_id',$id);
        return view('pages.brand.show_brand')->with(compact('product','brand','category','bra'));
    }
}
