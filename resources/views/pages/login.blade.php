@extends('welcome')
@section('content')
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đăng nhập với tài khoản</h2>
						<form action="#">
							<input type="text" name="name" placeholder="Tài khoản" />
							<input type="password" name="password" placeholder="Mật khẩu" />
							<button type="submit" class="btn btn-default">Đăng nhập</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">Hoặc</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Đăng kí tài khoản mới!</h2>
						<form action="{{ route('check.register') }}" method="post">
							@csrf
							<input type="text" name="name" placeholder="Nhập tài khoản"/>
							<input type="email" name="email" placeholder="Nhập email"/>
							<input type="password" name="password" placeholder="Nhập mật khẩu"/>
							<input type="text" name="phone" placeholder="Nhập số điện thoại"/>
							<button type="submit" class="btn btn-default">Đăng Kí</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	@endsection