@extends('layouts.employer')
@section('title') Danh sách hồ sơ đã chọn @stop
@section('content')
<section class="boxed-content-wrapper clearfix">
		<div class="container">
			<aside id="sidebar" class="col-sm-3">
				@include('includes.employers.candidates_navbar')
			</aside>

			<section id="content" class="pull-right right">
				<div class="header-image">
					HỒ SƠ <span class="text-blue">ỨNG VIÊN</span>
				</div>
				<div class="boxed">
					<div class="heading-image">
						<h2 class="text-orange">Danh sách hồ sơ đã ứng tuyển
						
						</h2>
					</div>
					<div class="filter">
						<label>Chú ý: Hồ sơ sẽ bị xóa khỏi trang Quản Lý Tuyển Dụng sau 13 tháng
					</label>
					</div>
					<table class="table table-bordered table-blue-bordered white">
						<thead>
							<tr>
								<th>Tên ứng viên</th>
								<th>Chức danh</th>
								<th>Ngày nhận</th>
								<th>Tình trạng</th>
							</tr>
						</thead>
						<tbody>
							@foreach($apply as $ap)
							<tr>
								<td><a href="#" class="text-blue decoration"><strong>{{ $ap->full_name() }}</strong></a></td>
								<td>{{ $ap->headline }}</td>
								<td>{{ $ap->apply_date }}</td>
								<td>{{ Config::get('custom_apply.apply_status')[$ap->status] }}</td>
							</tr>
							@endforeach
							
						</tbody>
					</table>
					{{ $apply->links() }}
				</div>		
			</section>
@stop