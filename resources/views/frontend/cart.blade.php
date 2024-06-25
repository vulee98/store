@extends('frontend.master')
@section('title','giỏ hàng')
@section('main')
@php
use Illuminate\Support\Facades\Storage;
@endphp

	<link rel="stylesheet" href="css/cart.css">
	<script type="text/javascript">
    function updateCart(qty, rowId){
        $.get(
            '{{ route('cart.update') }}',
            { qty: qty, rowId: rowId },
            function(data) {
                if (data.status === 'success') {
                    location.reload();
	}});
    }
</script>
				<div id="main" class="col-md-9">
					<!-- main -->
					<!-- phan slide la cac hieu ung chuyen dong su dung jquey -->
					<div id="slider">
						<div id="demo" class="carousel slide" data-ride="carousel">

							<!-- Indicators -->
							<ul class="carousel-indicators">
								<li data-target="#demo" data-slide-to="0" class="active"></li>
								<li data-target="#demo" data-slide-to="1"></li>
								<li data-target="#demo" data-slide-to="2"></li>
							</ul>

							<!-- The slideshow -->
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="img/home/slide-1.png" alt="Los Angeles" >
								</div>
								<div class="carousel-item">
									<img src="img/home/slide-2.png" alt="Chicago">
								</div>
								<div class="carousel-item">
									<img src="img/home/slide-3.png" alt="New York" >
								</div>
							</div>

							<!-- Left and right controls -->
							<a class="carousel-control-prev" href="#demo" data-slide="prev">
								<span class="carousel-control-prev-icon"></span>
							</a>
							<a class="carousel-control-next" href="#demo" data-slide="next">
								<span class="carousel-control-next-icon"></span>
							</a>
						</div>
					</div>

					<div id="banner-t" class="text-center">
						<div class="row">
							<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
								<a href="#"><img src="img/home/banner-t-1.png" alt="" class="img-thumbnail"></a>
							</div>
							<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
								<a href="#"><img src="img/home/banner-t-1.png" alt="" class="img-thumbnail"></a>
							</div>
						</div>					
					</div>

					<div id="wrap-inner">
						<div id="list-cart">
							<h3>Giỏ hàng :</h3>
							@if(Cart::count()>=1)
							<form>
								<table class="table table-bordered .table-responsive text-center">
									<tr class="active">
										<td width="11.111%">Ảnh mô tả</td>
										<td width="22.222%">Tên sản phẩm</td>
										<td width="22.222%">Số lượng</td>
										<td width="16.6665%">Đơn giá</td>
										<td width="16.6665%">Thành tiền</td>
										<td width="11.112%">Xóa</td>
									</tr>
									
									@foreach( $items as $item)
									<tr>
										<td><img class="img-responsive" src="{{ Storage::url('avatar/' . $item->options->img)}}" width="80px"></td>
										<td>{{$item->name}}</td>
										<td>
											<div class="form-group">
												<input class="form-control qty-input" type="number" value="{{ $item->qty }}" data-rowid="{{ $item->rowId }}" onchange="updateCart(this.value, '{{ $item->rowId }}')">
											</div>
										</td>
										<td><span class="price">{{ number_format($item->price, 0, ',', '.')}}đ</span></td>
										<td><span class="price">{{ number_format($item->price*$item->qty, 0, ',', '.')}}đ</span></td>
										<td><a href="{{asset('cart/delete/'.$item->rowId)}}">Xóa</a></td>
									</tr>
									@endforeach
								</table>
								<div class="row" id="total-price">
									<div class="col-md-6 col-sm-12 col-xs-12">										
											Tổng thanh toán: <span class="total-price">{{$total}}đ</span>
																													
									</div>
									<div class="col-md-6 col-sm-12 col-xs-12">
										<a href="{{asset('home')}}" class="my-btn btn">Mua tiếp</a>
										<a href="{{asset('cart')}}" class="my-btn btn">Cập nhật</a>
										<a href="{{asset('cart/delete/all')}}" class="my-btn btn">Xóa giỏ hàng</a>
									</div>
								</div>
							</form>             	                	
						</div>

						<div id="xac-nhan">
							<h3>Xác nhận mua hàng</h3>
							<form  method="POST">
								<div class="form-group">
									<label for="email">Email address:</label>
									<input required type="email" class="form-control" id="email" name="email">
								</div>
								<div class="form-group">
									<label for="name">Họ và tên:</label>
									<input required type="text" class="form-control" id="name" name="name">
								</div>
								<div class="form-group">
									<label for="phone">Số điện thoại:</label>
									<input required type="number" class="form-control" id="phone" name="phone">
								</div>
								<div class="form-group">
									<label for="add">Địa chỉ:</label>
									<input required type="text" class="form-control" id="add" name="add">
								</div>
								<div class="form-group text-right">
									<button type="submit" class="btn btn-default">Thực hiện đơn hàng</button>
								</div>
								@csrf
							</form>
							@else
							<h2 style="text-align:center">Giỏ hàng trống</h2>
							@endif
						</div>
					</div>

					
					<!-- end main -->
				</div>

@stop
			