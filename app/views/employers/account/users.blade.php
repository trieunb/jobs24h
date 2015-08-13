@extends('layouts.employer')
@section('title') Quản lý user @stop
@section('content')
	<section class="boxed-content-wrapper clearfix">
		<div class="container">
			<aside id="sidebar" class="col-sm-3">
				@include('includes.employers.accounttask_navbar')
			</aside>

			<section id="content" class="pull-right right">
				<div class="boxed">
					<div class="heading-image">
						<h2 class="text-blue">{{ HTML::image('assets/ntd/images/icon-header-user.png') }} Quản lý người dùng</h2>
					</div>
					
					<table class="table table-bordered table-blue-bordered white rs-table">
						<thead>
							<tr>
								<th>Ngày</th>
								<th>Email đăng nhập</th>
								<th>Họ tên</th>
								<th>Tác vụ</th>
								<th>Trạng thái</th>
								<th>Loại user</th>
							</tr>
						</thead>
						<tbody>
							@if(@count($users))
							@foreach($users as $val)
								<tr>
									<td>{{ $val->created_at->format('Y-m-d') }}</td>
									<td>{{ $val->taskName() }}</td>
									<td>{{ $val->target }}</td>
									<td>{{ $val->ntd->full_name }}</td>
								</tr>
							@endforeach
							@endif
							
						</tbody>
					</table>
					<div id="pagination" class="pull-right pagination-sm pagination-blue push-top">
						
					</div>
					
				</div>		
			</section>
@stop