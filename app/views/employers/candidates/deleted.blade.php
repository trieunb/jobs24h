@extends('layouts.employer')
@section('title') Quản lý đăng tuyển - VnJobs @stop
@section('content')
	<section class="boxed-content-wrapper clearfix">
		<div class="container">
			<aside id="sidebar" class="col-sm-3">
				@include('includes.employers.candidates_navbar')
			</aside>
			<section id="content" class="pull-right right">
				<div class="header-image">
					QUẢN LÝ <span class="text-blue">ỨNG VIÊN</span>
				</div>
				<div class="boxed">
					<div class="heading-image">
						<h2 class="text-orange">Hồ sơ đã xóa</h2>
					</div>
										<table class="table table-striped table-bordered">
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
													<th>Tên ứng viên</th>
													<th>Chức danh</th>
													<th>Ngày cập nhật</th>													
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
													<td>{{ $job->first_name }} {{ $job->last_name }}</td>
													<td>{{ $job->headline }}</td>
													<td>{{ $job->created_at }}</td>
													<td>
														<a href="#" class="btn btn-mini btn-action btn-info"><i class="glyphicon glyphicon-pencil"></i></a>
														<a href="#" class="btn btn-mini btn-action btn-danger" onclick="return confirm('Bạn có muốn xóa công việc này ?');"><i class="glyphicon glyphicon-trash"></i></a>
													</td>
												</tr>
												@endforeach
											@else
												<tr>
													<td colspan="5">Bạn chưa có hồ sơ nào trong thư mục này.</td>
												</tr>
											@endif
											</tbody>
										</table>
					</div>
					
			</section>
		</div>
	</section>
@stop

@section('style')
	{{ HTML::style('assets/css/chosen.min.css') }}
	{{ HTML::style('assets/css/datepicker.min.css') }}
	<style type="text/css">
		.center {
			text-align: center;
			vertical-align: middle;
		}
		.btn-action {
			padding: 5px 10px;
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