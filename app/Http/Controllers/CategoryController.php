<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class CategoryController extends Controller
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
        $category = Category::all();
        return view('admin.all_category')->with(compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authLogin();
        return view('admin.add_category');
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
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_desc = $request->category_desc;
        $category->category_status = $request->category_status;
        $category->save();
        $request->session()->put('messege', 'Thêm danh mục thành công !!');
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
        $category = Category::find($id);
        return view('admin.edit_category')->with(compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->category_desc = $request->category_desc;
        $category->category_status = $request->category_status;
        $category->save();
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
        $category = Category::find($id);
        $category->delete();
        return redirect()->back();

    }

    public function hienThiCategory($id)
    {
        $category = Category::where('category_status',0)->get();
        $cat = Category::where('category_status',0)->where('category_id',$id)->first();
        $brand = Brand::where('brand_status',0)->get();
        $product = Product::all()->where('category_id',$id);
        return view('pages.category.show_category')->with(compact('product','brand','category','cat'));
    }
}
