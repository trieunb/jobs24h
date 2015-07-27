@extends('layouts.jobseeker')
@section('title') Quản lý hồ sơ của tôi @stop
@section('content')
	<div class="container">
			@include('includes.jobseekers.breadcrumb')
	</div>
	<section class="main-content container single-post">
		<div class="boxed">
			<div class="rows">
				<div class="title-page">
					<h2>Hồ Sơ Của Tôi</h2>
				</div>
				<p>Bạn đã có <strong class="text-orange"><span id="number_of_resumes">{{count($my_resume)}}</span> trong số 4</strong> hồ sơ. Hãy chọn một hồ sơ được "<strong>cho phép tìm kiếm</strong>" để nhà tuyển dụng có thể tìm thấy bạn.</p>
						@if(count($my_resume) < 4)
							{{Form::open(array('route'=> array('jobseekers.create-my-resume'), 'method'=>'POST'))}}
								<p><button type="submit" class="btn btn-lg bg-orange">Tạo Hồ Sơ</button></p>
							{{Form::close()}}
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
											@if($mr->file_name == '')
												<a href="{{URL::route('jobseekers.save-cv', array($mr->id))}}" class="text-blue"><strong>@if($mr->tieude_cv != '') <em>{{$mr->tieude_cv}}</em> @else <em>{{date('d-m-Y',strtotime($mr->created_at))}}</em>_{{$user->first_name}} {{$user->last_name}} @endif </strong><br></a>
											@else
												<a href="{{URL::route('jobseekers.get-update-upload-cv', array($mr->id))}}" class="text-blue"><strong>@if($mr->tieude_cv != '') <em>{{$mr->tieude_cv}}</em> @else <em>{{date('d-m-Y',strtotime($mr->created_at))}}</em>_{{$user->first_name}} {{$user->last_name}} @endif </strong><br></a>
											@endif
											@if($mr->trangthai == 0 )
												<small class="legend text-orange">Chưa hoàn thiện</small> 
											@elseif($mr->trangthai == 1 )
												<small class="legend text-green">Đã duyệt <i class="fa fa-check-square-o"></i></small>
											@else
												<small class="legend text-orange">Đang chờ duyệt</small>												
											@endif
										</td>
										<td>
											@if($mr->is_public == 1)
											{{Form::radio('is_publish', $mr->id, $mr->id, array('id'=>'is_publish'))}}
											@else
											{{Form::radio('is_publish', $mr->id, null, array('id'=>'is_publish'))}}
											@endif
										</td>
										<td>{{$mr->updated_at}}</td>
										<td>0</td>
										<td>
											
											<a href="{{URL::route('jobseekers.view-resume', array($mr->id))}}"><i class="glyphicon glyphicon-eye-open"></i> Xem</a> 
											@if($mr->file_name == '')
											<a href="{{URL::route('jobseekers.save-cv', array($mr->id))}}"><i class="glyphicon glyphicon-refresh"></i> Cập nhật</a> 
											@else
											<a href="{{URL::route('jobseekers.get-update-upload-cv', array($mr->id))}}"><i class="glyphicon glyphicon-refresh"></i> Cập nhật</a> 
											@endif
											<a id="del_resume" data-rs="{{$mr->id}}"><i class="glyphicon glyphicon-trash"></i> Xóa</a>
										</td>
										<div class="modal fade delete_rs" id="delete_rs_{{$mr->id}}">
											<div class="modal-dialog modal-sm">
												<div class="modal-content">
													<div class="modal-body">
														<p>Khi bị xóa, hồ sơ không thể phục hồi lại được. Bạn có thực sự muốn xóa hồ sơ "@if(count($my_resume))@if($mr->tieude_cv != '') <em>{{$mr->tieude_cv}}</em> @else <em>{{date('d-m-Y',strtotime($mr->created_at))}}</em>_{{$user->first_name}} {{$user->last_name}} @endif @endif"?</p>
													</div>
													<div class="modal-footer">
														{{Form::button('Hủy', array('class'=>'btn btn-default', 'data-dismiss'=>'modal'))}}
														{{Form::button('Xóa', array('class'=>'del-rs btn bg-orange'))}}
													</div>
												</div><!-- /.modal-content -->
											</div><!-- /.modal-dialog -->
										</div><!-- /.modal -->
										<div class="modal fade popup_is_publish" id="popup_is_publish_{{$mr->id}}">
										<div class="modal-dialog modal-sm">
											<div class="modal-content">
												<div class="modal-body">
													<p>Tại một thời điểm chỉ có tối đa một hồ sơ được "cho phép tìm kiếm". Bạn có muốn cập nhật không?</p>
												</div>
												<div class="modal-footer">
													{{Form::button('Hủy', array('class'=>'btn btn-default', 'data-dismiss'=>'modal'))}}
													{{Form::button('Cập nhật', array('class'=>'is_publish btn bg-orange'))}}
												</div>
											</div><!-- /.modal-content -->
										</div><!-- /.modal-dialog -->
									</div><!-- /.modal -->
									</tr>

									@endforeach
									@else
									<tr><td colspan="5" class="text-align-center">Bạn chưa có hồ sơ nào</td></tr>
									@endif
								</tbody>
							</table>		
				</div>
			</div>
		</div>
		<div class="boxed">
			<div class="rows">
				@include('includes.jobseekers.widget.suggested-jobs')
			</div>
		</div>
	</section>
@stop
@section('scripts')
	<script type="text/javascript">
		// Publish a resume in my-resume
	    $(document).on('change','#is_publish',function(){
	        var data = $(this).val();
	        var url = '{{URL::route("jobseekers.my-resume")}}'
	        $('#popup_is_publish_'+data).modal('show');
	        $('.is_publish').click(function(e){
	            e.preventDefault();
	            $.ajax({
	                type: "GET",
	                url: url, //Relative or absolute path to response.php file
	                data: {is_publish: data},
	                success : function(data){
	                    $('.popup_is_publish').modal('hide');
	                }
	            });    
	        });
	    });
	    // Del a resume in my-resume
	    $(document).on('click','#del_resume',function(){
	        var data = $(this).attr('data-rs');
	        var url = '{{URL::route("jobseekers.my-resume")}}';
	        $('#delete_rs_'+data).modal('show');
	        $('.del-rs').click(function(e){
	            e.preventDefault();
	            $.ajax({
	                type: "GET",
	                url: url, //Relative or absolute path to response.php file
	                data: {is_delete: data },
	                success : function(data){
	                   location.reload();
	                    $('.delete_rs').modal('hide');
	                }
	            });    
	        });
	    });
	</script>
@stop
