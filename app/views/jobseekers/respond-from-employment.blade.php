@extends('layouts.jobseeker')
@section('title') Phản hồi từ Nhà tuyển dụng - VnJobs @stop
@section('content')
	<div class="container">
			@include('includes.jobseekers.breadcrumb')
	</div>
	<section class="main-content container single-post">
		<div class="boxed">
			{{Form::open(array('action'=>array('JobSeeker@delRepondFromEmployment'), 'method'=>'POST'))}}
			<div class="rows">
				<div class="title-page">
					<h2>Phản hồi của nhà tuyển dụng</h2>
				</div>
					<p>
						<a id="a_selectall" class="text-blue decoration" >Chọn tất cả</a> | 
						<a id="a_deselectall" class="text-orange decoration">Bỏ chọn tất cả</a>
					</p>
					<p><strong>Với phản hồi được chọn:</strong></p>
					<p class="clearfix">
						{{Form::submit('Xóa', array('class'=>'btn-delete btn bg-orange btn-lg'))}}
					</p>
					<table class="table table-striped table-hover table-bordered">
								<thead>
									<tr>
										<th>{{Form::checkbox('', null,null, array('id'=>'selectall'))}}</th>
										<th class="col-sm-3">Chủ đề</th>
										<th class="col-sm-3">Công ty</th>
										<th class="col-sm-4">Nội dung</th>
										<th class="col-sm-2">Ngày nhận</th>
									</tr>
								</thead>
								<tbody>
									@if(count($reponds))
									@foreach($reponds as $rsp)
									<tr>
										<td>{{Form::checkbox('check[]', $rsp->id, null, array('class'=>'checkbox'))}}</td>
										<td><strong><em>{{$rsp->title}}</em></strong></td>
										<td>{{$rsp->ntd->company->company_name}}</td>
										<td>{{$rsp->content}}</td>
										<td>{{$rsp->updated_at}}</td>
									</tr>
									@endforeach
									@else
									<tr>
										<td colspan="5" class="text-align-center">Không có phản hồi nào từ Nhà tuyển dụng</td>
									</tr>
									@endif
								</tbody>
							</table>
							@if($reponds !=null)
							<nav class="navbar-right pagination-sm">
								{{$reponds->links()}}
							</nav>
							@endif
					<p>
						<a id="a_selectall" class="text-blue decoration" >Chọn tất cả</a> | 
						<a id="a_deselectall" class="text-orange decoration">Bỏ chọn tất cả</a>
					</p>
					<p><strong>Với phản hồi được chọn:</strong></p>
					<p class="clearfix">
						{{Form::submit('Xóa', array('class'=>'btn-delete btn bg-orange btn-lg'))}}
					</p>
					
			</div>
			{{Form::close()}}
		</div>
		<div class="boxed">
			<div class="rows">
				@include('includes.jobseekers.widget.suggested-jobs')
			</div>
		</div>
	</section>
@stop

