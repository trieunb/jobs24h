@extends('layouts.employer')
@section('title') Thư phản hồi ứng viên @stop
@section('content')
	<section class="boxed-content-wrapper clearfix">
		<div class="container">
			<aside id="sidebar" class="col-sm-3">
				@include('includes.employers.accounttask_navbar')
			</aside>

			<section id="content" class="pull-right right">
				<div class="boxed">
					<div class="heading-image">
						<h2 class="text-blue">{{ HTML::image('assets/ntd/images/icon-logs-lg.png') }} Danh sách thư thông báo đã tạo</h2>
					</div>
					<div class="filter">
						<label>Quý khách tạo và sử dụng email mẫu để tiết kiệm thời gian liên lạc với ứng viên!
						</label>
					</div>
					<div class="clearfix"></div>
					@include('includes.notifications')
					{{ Form::open(['route'=>'employers.account.delete_letter']) }}
					<table class="table table-bordered table-blue-bordered white">
						<thead>
							<tr>
								<th>
									<div class="checkbox">
										<label>
											<input type="checkbox" value="" id="checkall">
											
										</label>
									</div>
								</th>
								<th>Ngày tạo thư</th>
								<th>Tiêu đề thư</th>
								<th>Loại</th>
								<th>Trạng thái</th>
								<th>Người tạo</th>
								<th>Thao tác</th>
							</tr>
						</thead>
						<tbody>
							@if(count($letters))
							@foreach($letters as $letter)
							<tr>
								<td>
									<div class="checkbox">
										<label>
											<input type="checkbox" value="{{ $letter->id }}" name="cbletter[]" class="check">
										</label>
									</div>
								</td>
								<td>{{ $letter->created_date }}</td>
								<td>{{ $letter->subject }}</td>
								<td>
									@if($letter->type == 1)
									Cá nhân
									@else
									Dùng chung
									@endif
								</td>
								<td class="text-center">
									@if($letter->status == 2)
									{{ HTML::image('assets/ntd/images/icon-active.png', '', ['title'=>'Đã gửi cho ứng viên']) }}
									@else
									{{ HTML::image('assets/ntd/images/icon-inactive.png', '', ['title'=>'Chưa gửi cho ứng viên']) }}
									@endif
								</td>
								<td>
									{{ $letter->ntd->full_name }}
								</td>
								<td>
									<a href="{{ URL::route('employers.account.copy_letter', $letter->id) }}">{{ HTML::image('assets/ntd/images/icon-view.png') }}</a>
									<a href="{{ URL::route('employers.account.edit_letter', $letter->id) }}">{{ HTML::image('assets/ntd/images/icon-edit.png') }}</a>
									
								</td>
							</tr>
							@endforeach
							@else
							<tr>
								<td colspan="7">Không có thư nào</td>
							</tr>
							@endif
						</tbody>
					</table>
					<a href="{{ URL::route('employers.account.create_letter') }}" class="btn btn-lg bg-orange">Tạo thư mới</a>
					<button type="submit" class="btn btn-lg bg-orange bg-green"onclick="return confirm('Bạn có muốn xóa các thư đã chọn ?')">Xóa thư</button>
					{{ Form::close() }}
					<div class="pull-right">&nbsp;
						{{ $letters->links() }}
					</div>
				</div>		
			</section>
@stop

@section('style')
	<style type="text/css">
	.checkbox input[type=checkbox] {
		margin-left: -20px !important;
	}
	</style>
@stop

@section('script')
	<script>
		$('#checkall').click(function(event) {  //on click 
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
	</script>
@stop