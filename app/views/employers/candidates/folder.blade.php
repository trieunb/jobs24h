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
						<h2 class="text-orange">Danh sách hồ sơ đã lưu
						@if($folder_id != 'all')
							tại {{ EFolder::find($folder_id)->folder_name }}
						@endif
						</h2>
					</div>
					<div class="filter">
						<label>Chú ý: Hồ sơ sẽ bị xóa khỏi trang Quản Lý Tuyển Dụng sau 13 tháng
					</label>
					</div>
					<table class="table table-bordered table-blue-bordered white">
						<thead>
							<tr>
								<th>
									<div class="checkbox">
									 	<label>
									 		<input type="checkbox" value="">
									 	</label>
									 </div> 
								</th>
								<th>Tên hồ sơ</th>
								<th>&nbsp;</th>
								<th>Thao tác</th>
							</tr>
						</thead>
						<tbody>
							@foreach($apply as $ap)
							<tr>
								@if($ap->resume->ntv_id > 0)
								<td>
									<div class="checkbox">
										<label>
											<input type="checkbox" value="">
										</label>
									</div>
								</td>
								<td>
									<a href="{{ URL::route('employers.search.resumeinfo', $ap->cv_id) }}" class="text-blue decoration"><strong>{{ $ap->resume->ntv->full_name() }}</strong></a>
									
									<i class="fa fa-caret-square-o-right"></i>
									
									<br>
									Chức danh: {{ $ap->resume->cvganday }}<br>
									Địa Điểm: @if(count($ap->resume->location)) 
										@foreach($ap->resume->location as $l)
											{{ $l->province->province_name }},
										@endforeach
									@endif
									<br>
									Thư mục: {{ HTML::link(URL::route('employers.candidates.folder', $ap->folder->id), $ap->folder->folder_name) }}
								</td>
								<td>
									Ngày tạo: {{ date('Y-m-d', strtotime($ap->resume->created_at)) }}<br>
									Cập nhật: {{ $ap->resume->getUpdateAt() }}<br>
								</td>
								<td>
									<div class="dropdown">
									  <a id="dropdown{{ $ap->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									    Thao tác
									    <span class="fa fa-list"></span>
									  </a>
									  <ul class="dropdown-menu" aria-labelledby="dropdown{{ $ap->id }}">
									    <li><a href="#">Lưu thư mục</a></li>
									    <li><a href="#">Cập nhật trạng thái</a></li>
									    <li><a href="#">Gửi thông báo</a></li>
									    <li><a href="#">In</a></li>
									  </ul>
									</div>
									
								</td>
								@else
								<td>
									<div class="checkbox">
										<label>
											<input type="checkbox" value="">
										</label>
									</div>
								</td>
								<td>
									<a href="{{ URL::route('employers.search.resumeinfo', $ap->cv_id) }}" class="text-blue decoration"><strong>{{ $ap->resume->application->first()->full_name() }}</strong></a>
									<span class="fa fa-paperclip"></span>
									<br>
									Chức danh: {{ $ap->resume->application->first()->headline }}<br>
									Địa Điểm: {{ $ap->resume->application->first()->address }}
									<br>
									Thư mục: {{ HTML::link(URL::route('employers.candidates.folder', $ap->folder->id), $ap->folder->folder_name) }}
								</td>
								<td>
									Ngày tạo: {{ date('Y-m-d', strtotime($ap->resume->created_at)) }}<br>
									Cập nhật: {{ $ap->resume->getUpdateAt() }}<br>

								</td>
								@endif
							</tr>
							@endforeach
							
						</tbody>
					</table>
					<a type="button" class="btn btn-lg bg-orange">Đánh giá hồ sơ</a>
					<a type="button" class="btn btn-lg bg-orange bg-green">Xóa hồ sơ</a>
					<a type="button" class="btn btn-lg bg-orange bg-green">Lưu thư mục</a>
					<div id="pagination" class="pull-right">
						{{ $apply->links() }}
					</div>
				</div>		
			</section>
@stop