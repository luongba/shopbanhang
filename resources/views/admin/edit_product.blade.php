@extends('admin_layout')
@section('admin_content')
	        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Sửa Sản Phẩm
                        </header>

                        <div class="panel-body">
                        	<?php
                        	$messege = Session::get('messege');
                        	if($messege){

                        		echo '<span style="color:green; width:100%">'.$messege.'</span>';
                        		Session::put('messege',null);
                        	}
                        ?>
                            <div class="position-center">
                                <form role="form" method="post" action="{{ route('product.update',[$product->product_id]) }}" enctype="multipart/form-data">
                                	@csrf
                                    @method('PUT')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Sản Phẩm: </label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" value="{{$product->product_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá Sản Phẩm: </label>
                                    <input type="text" name="product_price" class="form-control" id="exampleInputEmail1"  value="{{$product->product_price}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh Sản Phẩm: </label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1"  value="{{$product->product_image}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mô Tả sản phẩm: </label>
                                    <textarea class="form-control" name="product_desc" id="exampleInputEmail1">{{$product->product_desc}}"</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nội dung sản phẩm: </label>
                                    <textarea class="form-control" name="product_content" id="exampleInputEmail1">{{$product->product_content}}"</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputselect">Ẩn/Hiện sản phẩm: </label>
                                    <select class="form-control" name="product_status" id="exampleInputselect">
                                    	<option value="0">Hiển thị</option>
                                    	<option value="1">Ẩn</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputselect">Danh Mục sản phẩm: </label>
                                    <select class="form-control" name="category_id" id="exampleInputselect">
                                        @foreach($category as $value =>$key)
                                        <option value="{{$key->category_id}}">{{$key->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputselect">Thương Hiệu sản phẩm: </label>
                                    <select class="form-control" name="brand_id" id="exampleInputselect">
                                        @foreach($brand as $brands =>$keys)
                                        <option value="{{$keys->brand_id}}">{{$keys->brand_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-info">Lưu</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
@endsection