@extends('layouts.jobseeker')
@section('content')
	<div class="container">
		<div class="col-sm-8">
			@include('includes.jobseekers.breadcrumb')
		</div>
		<div class="user-menu col-sm-4 pull-right">
			<a href="#" class="text-blue">
				<img src="assets/images/ruibu.jpg" class="avatar">
				<strong><em>Hi, Anh Điệp</em></strong>
			</a>
			<nav class="ntv-menu navbar-right">
				@include('includes.jobseekers.menu-ntv')
			</nav>
		</div>
	</div>
	<section class="main-content container single-post">
		<div class="boxed">
			<div class="rows">
				<div class="title-page">
					<h2>Hồ Sơ Của Tôi</h2>
				</div>
				<p>Bạn đã có <strong class="text-orange"><span id="number_of_resumes">{{count($my_resume)}}</span> trong số 4</strong> hồ sơ. Hãy chọn một hồ sơ được "<strong>cho phép tìm kiếm</strong>" để nhà tuyển dụng có thể tìm thấy bạn.</p>
						<form action="" method="POST" role="form" class="form-horizontal">
						@if(count($my_resume) < 3)
							<p><button type="submit" class="btn btn-lg bg-orange">Tạo Hồ Sơ</button></p>
						@endif
							<table class="table table-striped table-hover table-bordered">
								<thead>
									<tr>
										<th>Tiêu đề</th>
										<th>Cho phép tìm kiếm</th>
										<th>Ngày cập nhật</th>
										<th>Số lần xem</th>
										<th>Thao tác</th>
									</tr>
								</thead>
								<tbody>
									@if(count($my_resume) > 0 )
									@foreach($my_resume as $mr)
									<tr>
										<td>
											<a href=""><strong><em class="text-blue">{{$mr->created_at}}</em> {{$user->first_name}} {{$user->last_name}}</strong><br></a>
											@if($mr->trangthai == 0 )
												<small class="legend text-orange">Chưa hoàn thiện</small> 
											@else
												<small class="legend text-green">Đã duyệt <i class="fa fa-check-square-o"></i></small>
											@endif
										</td>
										<td>
											{{Form::radio('is_publish', $mr->id, $mr->is_public, array('id'=>'is_publish'))}}
										</td>
										<td>{{$mr->updated_at}}</td>
										<td>0</td>
										<td>
											<a href=""><i class="glyphicon glyphicon-eye-open"></i> Xem</a> 
											<a href="{{URL::route('jobseekers.edit-cv', array($mr->id))}}"><i class="glyphicon glyphicon-refresh"></i> Cập nhật</a> 
											<a id="del_resume" data-rs="{{$mr->id}}"><i class="glyphicon glyphicon-trash"></i> Xóa</a>
										</td>
									</tr>
									@endforeach
									@else
									<tr><td colspan="5" class="text-align-center">Bạn chưa có hồ sơ nào</td></tr>
									@endif
								</tbody>
							</table>		
						</form>
						<div class="modal fade" id="popup_is_publish">
							<div class="modal-dialog modal-sm">
								<div class="modal-content">
									<div class="modal-body">
										<p>Tại một thời điểm chỉ có tối đa một hồ sơ được "cho phép tìm kiếm". Bạn có muốn cập nhật không?</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
										<button type="button" class="is_publish btn bg-orange">Cập nhật</button>
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
						<div class="modal fade" id="delete_modal">
							<div class="modal-dialog modal-sm">
								<div class="modal-content">
									<div class="modal-body">
										<p>Khi bị xóa, hồ sơ không thể phục hồi lại được. Bạn có thực sự muốn xóa hồ sơ "@if(count($my_resume)>0){{$mr->created_at}} {{$mr->first_name}} {{$mr->last_name}}@endif"?</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
										<button type="button" class="del-modal btn bg-orange">Cập nhật</button>
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
				</div>
			</div>
		</div>
		<div class="boxed">
			<div class="rows">
				@include('includes.jobseekers.block-job-suggest')
			</div>
		</div>
	</section>
@stop