@extends('admin_layout')
@section('admin_content')
	        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Danh Mục Sản Phẩm
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
                                <form role="form" method="post" action="{{ route('category.store') }}">
                                	@csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Danh Mục: </label>
                                    <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mô Tả Danh Mục: </label>
                                    <textarea class="form-control" name="category_desc" id="exampleInputEmail1" placeholder="Enter email"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputselect">Ẩn/Hiện Danh mục: </label>
                                    <select class="form-control" name="category_status" id="exampleInputselect">
                                    	<option value="0">Hiển thị</option>
                                    	<option value="1">Ẩn</option>
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