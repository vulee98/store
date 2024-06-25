@extends('frontend.master')
@section('title','Chi tiết sản phẩm')
@section('main')
@php
use Illuminate\Support\Facades\Storage;
@endphp


	<link rel="stylesheet" href="css/search.css">

					<div id="wrap-inner" class="col-md-9" >
						<div class="products">
							<h3>Tìm kiếm với từ khóa: <span>{{$keyword}}</span></h3>
							<div class="product-list row">
							@foreach($items as $item)
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
								<a href="#"><img  src="{{ Storage::url('avatar/' . $item->prod_img) }}" class="img-thumbnail"></a>
								<p><a href="#">{{ $item->prod_name }}</a></p>
								<span>{{ number_format($item->prod_price, 0, ',', '.') }}</span>
									<div class="marsk">
									<a href="{{ url('details/'.$item->prod_id.'/'.$item->prod_slug.'.html') }}">Xem chi tiết</a>
									</div>                                    
								</div>		
								@endforeach			
							</div>                	                	
						</div>

						<div id="pagination">
							<ul class="pagination pagination-lg justify-content-center">
							<ul class="pagination justify-content-center">
								{{ $items->links('pagination::bootstrap-4') }}
							</ul>
							</ul>
						</div>
					</div>
@stop
					
			