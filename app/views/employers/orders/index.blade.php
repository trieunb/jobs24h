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
						 
							<tr>
								<td>
									<a class="text-blue" href="{{ URL::route('employers.orders.detail', $order->ordersdetail->first()->id) }}">{{ $order->ordersdetail->first()->madonhang }}</a>
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
							<tr>
								@if(count($verify))
									<td>
									<a class="text-blue" href="{{ URL::route('employers.orders.detail') }}">{{$verify->ordersdetail->first()->madonhang}}</a>
								</td>
								<td>{{ $verify->epackage_name }}
								<div class="collapse vncollapse" id="collapse{{ $verify->id }}">
									<ul>
										<li>Xác thực nhà tuyển dụng</li>
									</ul>  
								</div>
								<p><a class="text-blue" data-toggle="collapse" data-target="#collapse{{ $verify->id }}" aria-expanded="false" aria-controls="collapse{{ $verify->id }}"><i class="fa fa-plus-square-o"></i>&nbsp; Xem chi tiết</a></p>
									
								</td>
								<td>{{ $verify->total_date }} ngày</td>
								<td>{{ round((strtotime(date('Y-m-d H:i:s',strtotime($verify->ended_date)))-strtotime(date('Y-m-d H:i:s')))/(60*60*24)) }} ngày</td>
								<td>{{ $verify->created_date }}</td>
								<td>{{ $verify->ended_date }}</td>
								<td>
									@if($verify->ended_date >= date('Y-m-d H:i:s') && $verify->created_date <= date('Y-m-d H:i:s'))
									<span class="label label-success">Đang kích hoạt</span>
									@else 
									<span class="label label-danger">Đã hết hạn</span>
									@endif
								</td>
								@endif
							</tr>
						 
						
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