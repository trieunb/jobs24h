@extends('layouts.employer')
@section('title') Quản lý đăng tuyển - VnJobs @stop
@section('content')
	<section class="boxed-content-wrapper clearfix">
		<div class="boxed">
			<div class="heading-image">
				<h2 class="text-orange">Phản hồi của ứng viên</h2>
			</div>			
			<table class="table table-bordered table-blue-bordered white">
				<thead>
					<tr>
						<th>Tên ứng viên</th>
						<th>Link đến hồ sơ ứng viên</th>
						<th>Nội dung phản hồi</th>
						<th>Tiêu đề phản hồi</th>
						<th>Ngày phản hồi</th>
					</tr>
				</thead>
				<tbody>
					@if(count($responds))
					@foreach($responds as $v)
					<tr>
						<td>{{ $v->ntv->first_name }} {{ $v->ntv->last_name }}</td>
						<td>
							@if($v->ntv->resume->count() > 0)
								{{ HTML::link(URL::route('employers.search.resumeinfo', $v->ntv->resume->first()->id), null, ['class'=>'text-blue'] ) }}
							@else
				
							@endif
						</td>
						<td>{{ Str::limit($v->content, 100) }}</td>
						<td>{{ $v->title }}</td>
						<td>{{ $v->submited_date }}</td>
					</tr>
					@endforeach
					@else
					<tr>
						<td colspan="5">Không có phản hồi nào</td>
					</tr>
					@endif
					
				</tbody>
			</table>
		</div>
		<div class="boxed">
			<div class="heading-image">
				<h2 class="text-orange">Email mẫu</h2>
			</div>	
			<label class="h3"><strong>Bạn có <span class="text-orange">1 Email mẫu</span></strong></label>
			<table class="table table-bordered table-blue-bordered white">
				<thead>
					<tr>
						<th>Email mẫu</th>
						<th>Loại</th>
						<th>Ngày cập nhật</th>
						<th>Thao tác</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td colspan="4">
							Tạo email mẫu 1 lần để dùng nhiều lần và tiết kiệm thời gian liên lạc với ứng viên!<br>
							"Để hỗ trợ quý khách tốt nhất, chúng tôi đã tạo 4 mẫu thư phản hồi mặc định. Nhấn vào tạo email mẫu để tạo email mẫu phù hợp với nhu cầu cụ thể của quý công ty."
						</td>
					</tr>
				</tbody>
			</table>
			<button type="button" class="btn btn-lg bg-orange">Tạo email mẫu mới</button>
		</div>
	</section>
@stop

