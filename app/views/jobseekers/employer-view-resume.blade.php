@extends('layouts.jobseeker')
@section('title') Nhà tuyển dụng xem hồ sơ - VnJobs @stop
@section('content')

	<div class="container">
		@include('includes.jobseekers.breadcrumb')
	</div>
	<section class="main-content container single-post">
		<div class="boxed">
			<div class="rows">
				<div class="title-page">
					<h2>Nhà Tuyển Dụng Xem Hồ Sơ</h2>
				</div>
				<form action="" method="POST" role="form" class="form-horizontal">
					<table class="table table-striped table-hover table-bordered">
								<thead>
									<tr>
										<th class="col-sm-4">Công ty</th>
										<th class="col-sm-1">Lần xem</th>
										<th class="col-sm-2">Ngày xem mới nhất</th>
										<th class="col-sm-2">Đã lưu</th>
										<th class="col-sm-2">Thao tác</th>
									</tr>
								</thead>
								<tbody>
									@if(count($view_resume))
									@foreach($view_resume as $view)
									<tr>
										<td>{{$view->ntd->company->company_name}}</td>
										<td>{{$view->counter}}</td>
										<td>{{date('d-m-Y',strtotime($view->updated_at))}}</td>
										<td>{{date('d-m-Y',strtotime($view->created_at))}}</td>
										<td></td>
									</tr>
									@endforeach
									@else
										<tr>
										<td colspan="5" class="text-align-center">Nhà tuyển dụng chưa xem hồ sơ của bạn.</td>
										</tr>
									@endif
								</tbody>
							</table>
				</form>
				<p><small class="legend">*Lưu ý: Thông tin về nhà tuyển dụng và lưu hồ sơ của bạn được thể hiện trong vòng 1 năm</small></p>
				<label>Tạo hồ sơ mới hoặc cập nhật hồ sơ hiện có với những thông tin về kinh nghiệm, bằng cấp và các kĩ năng mới nhất của bạn.</label>
				<p class="clearfix">
					{{Form::open(array('route'=> array('jobseekers.create-my-resume'), 'method'=>'POST'))}}
						<p><button type="submit" class="btn btn-lg bg-orange">Tạo Hồ Sơ Mới</button></p>
					{{Form::close()}}
				</p>
				<p class="clearfix">
					<a href="#" class="text-blue decoration"><i class="fa fa-chevron-circle-left"></i><em>Trở lại trang Quản Lý Nghề nghiệp</em></a>	
				</p>
			</div>
		</div>
		<div class="boxed">
			<div class="rows">
				@include('includes.jobseekers.widget.suggested-jobs')
			</div>
		</div>
	</section>
@stop

