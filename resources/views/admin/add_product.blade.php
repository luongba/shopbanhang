@extends('admin_layout')
@section('admin_content')
	        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Sản Phẩm
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
                                <form role="form" method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                                	@csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Sản Phẩm: </label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá Sản Phẩm: </label>
                                    <input type="text" name="product_price" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh Sản Phẩm: </label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mô Tả sản phẩm: </label>
                                    <textarea class="form-control" name="product_desc" id="exampleInputEmail1"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nội dung sản phẩm: </label>
                                    <textarea class="form-control" name="product_content" id="exampleInputEmail1"></textarea>
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
                                        @foreach($category as $value => $key)
                                        <option value="{{$key->category_id}}">{{$key->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputselect">Thương Hiệu sản phẩm: </label>
                                    <select class="form-control" name="brand_id" id="exampleInputselect">
                                        @foreach($brand as $brands => $br)
                                        <option value="{{$br->brand_id}}">{{$br->brand_name}}</option>
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