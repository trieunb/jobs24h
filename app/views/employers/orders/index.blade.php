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
								<th class="col-sm-1">Số lượng</th>
								<th class="col-sm-1">Còn lại</th>
								<th class="col-sm-2">Ngày bắt đầu kích hoạt</th>
								<th class="col-sm-2">Ngày kết thúc kích hoạt</th>
								<th class="col-sm-2">Tình trạng</th>
							</tr>
						</thead>
						<tbody>
						@if(count($order))
						 	@if($order->package_id!=0)
							<tr>

								<td>
									<a class="text-blue" href="{{ URL::route('employers.orders.detail')}}">Xem tất cả</a>
								</td>
								<td>{{ $order->package_name }}
								<div class="collapse vncollapse" id="collapse{{ $order->id }}">
									<ul>
										<li>Tìm kiếm hồ sơ</li>
									</ul>  
								</div>
								<p><a class="text-blue" data-toggle="collapse" data-target="#collapse{{ $order->id }}" aria-expanded="false" aria-controls="collapse{{ $order->id }}"><i class="fa fa-plus-square-o"></i>&nbsp; Xem chi tiết</a></p>
									
								</td>
								<td>{{ $order->total }} CV</td>
								<td>{{ $order->remain }} CV</td>
								<td>{{ $order->created_date }}</td>
								<td>{{ $order->ended_date }}</td>
								<td>
									@if($order->ended_date >= date('Y-m-d H:i:s') && $order->created_date <= date('Y-m-d H:i:s'))
									<span class="label label-success">Đang kích hoạt</span>
									@else 
									<span class="label label-danger">Đã hết hạn</span>
									@endif
								</td>
							</tr>
							@endif
							@if($order->is_xacthuc!=0)
							<tr>
								
								<td>
									<a class="text-blue" href="{{ URL::route('employers.orders.detail') }}">Xem tất cả</a>
								</td>
								<td>Xác thực 
								<div class="collapse vncollapse" id="collapse1">
									<ul>
										<li>Xác thực nhà tuyển dụng</li>
									</ul>  
								</div>
								<p><a class="text-blue" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1"><i class="fa fa-plus-square-o"></i>&nbsp; Xem chi tiết</a></p>
									
								</td>
								<td>30 ngày</td>
								<td>{{ round((strtotime(date('Y-m-d H:i:s',strtotime($order->end_date_xacthuc)))-strtotime(date('Y-m-d H:i:s')))/(60*60*24)) }} ngày</td>
								<td>{{ $order->start_date_xacthuc }}</td>
								<td>{{ $order->end_date_xacthuc }}</td>
								<td>
									@if($order->end_date_xacthuc >= date('Y-m-d H:i:s') && $order->start_date_xacthuc <= date('Y-m-d H:i:s'))
									<span class="label label-success">Đang kích hoạt</span>
									@else 
									<span class="label label-danger">Đã hết hạn</span>
									@endif
								</td>
								
							</tr>
						 	@endif
						
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