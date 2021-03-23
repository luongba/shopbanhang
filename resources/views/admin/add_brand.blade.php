@extends('admin_layout')
@section('admin_content')
	        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Thương Hiệu
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
                                <form role="form" method="post" action="{{ route('brand.store') }}">
                                	@csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu: </label>
                                    <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mô Tả thương hiệu: </label>
                                    <textarea class="form-control" name="brand_desc" id="exampleInputEmail1"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputselect">Ẩn/Hiện thương hiệu: </label>
                                    <select class="form-control" name="brand_status" id="exampleInputselect">
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