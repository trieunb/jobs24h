@extends('layouts.employer')
@section('title') Quản lý đơn hàng - VnJobs @stop
@section('content')
<section class="boxed-content-wrapper clearfix">
		<div class="container">
			<aside id="sidebar" class="col-sm-3">
				@include('includes.employers.order_navbar')
			</aside>
			
			<section id="content" class="pull-right right">
				<div class="header-image">
					QUẢN LÝ <span class="text-blue">ĐƠN HÀNG</span>
				</div>
				<div class="box">
					<div class="heading-image">
						<h2 class="text-blue">{{ HTML::image('assets/ntd/images/folder-lg-2.png') }}Chi tiết đơn hàng</h2>
					</div>
					<table class="table table-blue-bordered table-bordered">
						<thead>
							<tr>
								<th class="col-sm-1">Số đơn hàng</th>
								<th class="col-sm-3">Gói dịch vụ</th>
								<th class="col-sm-2">Ngày đặt hàng</th>
								<th class="col-sm-2">Giá</th>
							</tr>
						</thead>
						<tbody>
						@if(count($order_detail))
						 	@foreach($order_detail as $value)
							<tr>
								<td>
									{{ $value->madonhang }}
								</td>
								<td> {{$value->name_package}}</td>
								<td>{{ $value->created_at}}</td>
								<td>{{ $value->price }}</td>
							</tr>
							 
						 	@endforeach
						
						@else 
							<tr>
								<td colspan="7">Bạn không có đơn hàng nào.</td>
							</tr>
						@endif

						</tbody>
					</table>
					

				</div>
			</section>
		</div>
	</section>
@stop

@section('style')
	<style type="text/css">
		div.vncollapse ul {
			margin-bottom: 0;
			  margin-top: 5px;
			  padding-left: 10px;
		}
		div.vncollapse ul li {
			list-style: square; 
		}
		div.vncollapse ul li {
			  color: #ff5b00;
		}
	</style>
@stop