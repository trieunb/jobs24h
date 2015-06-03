@extends('layouts.employer')
@section('title') Quản lý đăng tuyển - VnJobs @stop
@section('content')
	<section class="boxed-content-wrapper clearfix">
		<div class="container">
			<aside id="sidebar" class="col-sm-3">
				@include('includes.employers.candidatereport_navbar')
			</aside>
			<section id="content" class="pull-right right">
				<div class="box">
					<div class="heading-image">
						<h2 class="text-blue">{{ HTML::image('assets/ntd/images/list.png') }} {{ $btitle }}</h2>
					</div>
					<div class="filter">
						<span>Hiển thi <span class="text-orange">{{ $orders->getFrom() }}</span> - <span class="text-orange">{{ $orders->getTo() }}</span> của <span class="text-orange">{{ $orders->getTotal() }}</span> đơn hàng.</span>
					</div>
					<table class="table table-blue-bordered table-bordered">
						<thead>
							<tr>
								<th class="col-sm-4">Gói dịch vụ</th>
								<th class="col-sm-1">Số lượng</th>
								<th class="col-sm-1">Còn lại</th>
								<th class="col-sm-2">Ngày bắt đầu kích hoạt</th>
								<th class="col-sm-2">Ngày kết thúc kích hoạt</th>
								<th class="col-sm-2">Tình trạng</th>
							</tr>
						</thead>
						<tbody>
							@if(count($orders))
							@foreach($orders as $order)
							<tr>
								<td>{{ $order->package_name }}</td>
								<td>{{ $order->total }}</td>
								<td>{{ $order->remain }}</td>
								<td>{{ $order->created_date }}</td>
								<td>{{ $order->ended_date }}</td>
								<td><a href="{{ URL::route('employers.report.viewcandidate', $order->id) }}" onclick="return false;" class="view-order text-blue">Xem báo cáo</td>
							</tr>
							@endforeach
							@else
							<tr>
								<td colspan="6">Bạn không có đơn hàng nào</td>
							</tr>
							@endif
							
						</tbody>
					</table>
					<div class="pull-right">
						{{ $orders->links() }}
					</div>
					
				</div>
					
				<div class="box" id="order-detail" style="display: none;">
					
				</div>
			</section>
		</div>
	</section>
@stop

@section('script')
	<script type="text/javascript">
	$('.view-order').click(function(event) {
		href = $(this).attr('href');
		$.ajax({
			url: href,
			type: 'GET',
			success: function(html)
			{
				$('#order-detail').html(html);
				$('#order-detail').attr({
					style: 'display: block'
				});
				 $('html, body').animate({
			        scrollTop: $('#order-detail').offset().top
			    }, 400);

			}
		})
	});
	</script>
@stop