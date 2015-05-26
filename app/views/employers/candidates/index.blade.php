@extends('layouts.employer')
@section('title') Quản lý hồ sơ @stop
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
						<h2 class="text-orange">Danh sách ứng viên nộp hồ sơ ứng tuyển</h2>
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
							<tr>
								<td><a href="#" class="text-blue decoration"><strong>Trần Anh Điệp</strong></a></td>
								<td>Nhân viên IT</td>
								<td>23-05-2015</td>
								<td>Đã chọn</td>
							</tr>
							<tr>
								<td><a href="#" class="text-blue decoration"><strong>Trần Anh Điệp</strong></a></td>
								<td>Nhân viên IT</td>
								<td>23-05-2015</td>
								<td>Đã chọn</td>
							</tr>
							<tr>
								<td><a href="#" class="text-blue decoration"><strong>Trần Anh Điệp</strong></a></td>
								<td>Nhân viên IT</td>
								<td>23-05-2015</td>
								<td>Đã chọn</td>
							</tr>
							<tr>
								<td><a href="#" class="text-blue decoration"><strong>Trần Anh Điệp</strong></a></td>
								<td>Nhân viên IT</td>
								<td>23-05-2015</td>
								<td>Đã chọn</td>
							</tr>
						</tbody>
					</table>
				</div>		
			</section>
		</div>
	</section>
@stop