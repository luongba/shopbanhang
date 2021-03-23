@extends('welcome')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
            	<?php
            		$content = Cart::content();
            	 ?>
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Hình ảnh</td>
                            <td class="description">Tên sản phẩm</td>
                            <td class="price">Giá</td>
                            <td class="quantity">Số lượng</td>
                            <td class="total">Tổng</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach($content as $v_content)
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="{{ asset('public/upload/product/'.$v_content->options->image) }}" style="width: 100px" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{$v_content->name}}</a></h4>
                                <p>{{$v_content->id}}</p>
                            </td>
                            <td class="cart_price">
                                <p>{{number_format($v_content->price).' '.'VND'}}</p>
                            </td>
                            <td class="cart_quantity">
                            	
                                <div class="cart_quantity_button">
                                	<form action="{{URL::to('/update-cart')}}" method="get">
                            		@csrf
                                    <input class="cart_quantity_input" type="number" min="1" name="quantity" value="{{$v_content->qty}}" autocomplete="off" size="2">

                                    <input type="text" value="{{$v_content->rowId}}" name="rowId" hidden="true">
                                    <input type="submit" value="Cập nhật">
                                    </form>
                                </div>
                                
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">{{number_format($v_content->price * $v_content->qty).' '.'VND'}}</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </section> <!--/#cart_items-->

    <div class="col-sm-9">
    	<section id="do_action">
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<div class="total_area">
						<ul>
							<li>Phí Vận Chuyển <span>Free</span></li>
							<li>Thành Tiền <span>{{Cart::subtotal().' '.'VND'}}</span></li>
						</ul>
							<a class="btn btn-default check_out" href="{{ route('check.login') }}">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
@endsection