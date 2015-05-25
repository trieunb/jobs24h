@extends('layouts.employer')
@section('title') Quản lý đăng tuyển - VnJobs @stop
@section('content')
	<div class="col-xs-12 main-content">
							<div class="col-xs-3 sidebar">
								@include('includes.employers.navbar')
							</div>
							<div class="col-xs-9 primary">
								<div class="panel panel-default sub-panel">
									<div class="panel-heading">
										<h2>{{ $title }}</h2>
									</div>
									<div class="panel-body">
									{{ Form::open(array('method'=>'POST', 'route'=>'employers.jobs.action')) }}
										@include('includes.notifications')
										<table class="table table-hover table-striped table-bordered">
											<thead>
												<tr class="center">
													<th>
														<div class="checkbox">
															<input type="checkbox" id="selectall" value="">
															<label>
																<span></span>
															</label>
														</div>
													</th>
													<th>Chức danh</th>
													<th>Mã số</th>
													<th>Ngành</th>
													<th>Nơi làm việc</th>
													<th>#</th>
												</tr>
											</thead>
											<tbody>
											@if(count($jobs))
												@foreach ($jobs as $job)
												<tr>
													<td class="center">
														<div class="checkbox">
															<input name="job[]" type="checkbox" class="check" value="{{ $job->id }}">
															<label>
																<span></span>
															</label>
														</div>
													</td>
													<td>{{ $job->vitri }}</td>
													<td>{{ $job->matin }}</td>
													<td>
													@foreach($job->category as $cate)
														{{ $cate->category->cat_name }}<br>
													@endforeach
													</td>
													<td>
													@foreach($job->province as $pv)
														{{ $pv->province->province_name }}<br>
													@endforeach
													</td>
													<td>
														<a href="{{ URL::route('employers.jobs.edit', $job->id) }}" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-pencil"></i> Sửa</a>
														<a href="{{ URL::route('employers.jobs.delete', $job->id) }}" class="btn btn-xs btn-danger" onclick="return confirm('Bạn có muốn xóa công việc này ?');"><i class="glyphicon glyphicon-trash"></i> Xóa</a>
													</td>
												</tr>
												@endforeach
											@else
												<tr>
													<td>&nbsp;</td>
													<td colspan="5">Không có tin hiển thị</td>
												</tr>
											@endif
											</tbody>
										</table>
										{{ Form::button('Đăng tuyển', array('type'=>'submit', 'name'=>'submit', 'value'=>'active', 'class'=>'btn btn-default')) }}
										{{ Form::button('Ngừng đăng', array('type'=>'submit', 'name'=>'submit', 'value'=>'inactive', 'class'=>'btn btn-default')) }}
										{{ Form::button('Ngưng nhận HS', array('type'=>'submit', 'name'=>'submit', 'value'=>'unapply', 'class'=>'btn btn-default')) }}
										{{ Form::button('Mở nhận HS', array('type'=>'submit', 'name'=>'submit', 'value'=>'apply', 'class'=>'btn btn-default')) }}
										{{ Form::button('Xóa', array('type'=>'submit', 'name'=>'submit', 'value'=>'delete', 'class'=>'btn btn-default', 'onclick'=>"return confirm('Bạn có muốn xóa công việc đã chọn ?');")) }}
										<div class="clearfix"></div>
										<div id="pagination" class="pull-right">
											{{ $jobs->links() }}
										</div>
										{{ Form::close() }}
									</div>
								</div>
								
								<div class="panel panel-default sub-panel">
									<div class="panel-heading">
										<h2>Tìm tuyển dụng của tôi</h2>
									</div>
									<?php if( ! isset($input) ) $input = ['keyword'=>'','nganhnghe'=>[],'noilamviec'=>'','ngaydang1'=>'','ngaydang2'=>'','ngayhethan1'=>'','ngayhethan2'=>'']; ?>
									<?php if( ! isset($input['nganhnghe']) ) $input['nganhnghe'] = []; ?>
									<div class="panel-body">
										<form action="{{ URL::route('employers.jobs.search') }}" method="GET" class="form-horizontal" role="form">
											<div class="form-group">
												<label for="inputKeyword" class="col-sm-2 control-label">Từ khóa:</label>
												<div class="col-sm-10">
													{{ Form::text('keyword', $input['keyword'] ) }}
												</div>
											</div>
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Ngành nghề:</label>
												<div class="col-sm-10">
													{{ Form::select('nganhnghe[]', Category::getList(), $input['nganhnghe'], array('class'=>'form-control chosen-select', 'multiple') ) }}
												</div>
											</div>
											<div class="form-group">
												<label for="inputNoilamviec" class="col-sm-2 control-label">Nơi làm việc:</label>
												<div class="col-sm-10">
													{{ Form::select('noilamviec', array('all'=>'Tất cả') + Province::lists('province_name', 'id'), $input['noilamviec'] ) }}
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-1">
													<div class="checkbox">
														<input type="checkbox" id="s1" value="">
														<label for="s1">
															<span></span>
								
														</label>
													</div>
												</div>
												<label for="input" class="col-sm-3 control-label">Ngày đăng:</label>
												<div class="col-sm-3">
													{{ Form::text('ngaydang1', $input['ngaydang1'], ['class'=>'datepicker form-control'] ) }}
												</div>
												<div class="col-sm-1">
													<i class="glyphicon glyphicon-calendar"></i>
												</div>
												<div class="col-sm-3">
													{{ Form::text('ngaydang2', $input['ngaydang2'], ['class'=>'datepicker form-control'] ) }}
												</div>
												<div class="col-sm-1">
													<i class="glyphicon glyphicon-calendar"></i>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-1">
													<div class="checkbox">
														<input type="checkbox" id="s2" value="">
														<label for="s2">
															<span></span>
								
														</label>
													</div>
												</div>
												<label for="input" class="col-sm-3 control-label">Ngày hết hạn:</label>
												<div class="col-sm-3">
													{{ Form::text('ngayhethan1', $input['ngayhethan1'], ['class'=>'datepicker form-control'] ) }}
												</div>
												<div class="col-sm-1">
													<i class="glyphicon glyphicon-calendar"></i>
												</div>
												<div class="col-sm-3">
													{{ Form::text('ngayhethan2', $input['ngayhethan2'], ['class'=>'datepicker form-control'] ) }}
												</div>
												<div class="col-sm-1">
													<i class="glyphicon glyphicon-calendar"></i>
												</div>
											</div>
												<div class="form-group">
													<div class="col-sm-10 col-sm-offset-2">
														<button type="submit" class="btn btn-primary">Tìm</button>
													</div>
												</div>
										</form>
									</div>
								</div>

							</div> <!-- primary -->
						</div> <!-- main-content -->
@stop

@section('style')
	{{ HTML::style('assets/css/chosen.min.css') }}
	{{ HTML::style('assets/css/datepicker.min.css') }}
	<style type="text/css">
		.center {
			text-align: center;
			vertical-align: middle;
		}
	</style>
@stop

@section('script')
	{{ HTML::script('assets/js/chosen.jquery.min.js') }}
	{{ HTML::script('assets/js/bootstrap-datepicker.min.js') }}
	<script type="text/javascript">
	$(document).ready(function() {
	    $('#selectall').click(function(event) {  //on click 
	        if(this.checked) { // check select status
	            $('.check').each(function() { //loop through each checkbox
	                this.checked = true;  //select all checkboxes with class "checkbox1"               
	            });
	        }else{
	            $('.check').each(function() { //loop through each checkbox
	                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
	            });         
	        }
	    });
	    $('.chosen-select').chosen({allow_single_deselect:true, max_selected_options: 3}); 
		$('input.datepicker').datepicker({
			format: "yyyy-mm-dd",
			clearBtn: true,
			language: "vi",
			autoclose: true
		});
	    
	});
	</script>
@stop