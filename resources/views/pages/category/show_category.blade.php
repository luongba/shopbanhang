@extends('welcome')
@section('content')
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Sản Phẩm {{$cat->category_name}}</h2>
                        @foreach($product as $key => $cate)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('public/upload/product/'.$cate->product_image)}}" alt="" />
                                            <h2>{{number_format($cate->product_price).' '.'VNĐ'}}</h2>
                                            <p>{{$cate->product_name}}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>{{number_format($cate->product_price).' '.'VNĐ'}}</h2>
                                                <p>{{$cate->product_name}}</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                                            </div>
                                        </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Yêu Thích</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>So Sánh</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div><!--features_items-->
                    

@endsection