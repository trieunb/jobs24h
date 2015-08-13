@extends('layouts.employer')
@section('title') Phản hồi của ứng viên - VnJobs @stop
@section('content')
	<section class="boxed-content-wrapper clearfix">
		<div class="boxed">
			<div class="heading-image">
				<h2 class="text-orange">Phản hồi của ứng viên</h2>
			</div>			
			<table class="table table-bordered table-blue-bordered white rs-table">
				<thead>
					<tr>
						<th>Tên ứng viên</th>
						<th>Link đến hồ sơ ứng viên</th>
						<th>Nội dung phản hồi</th>
						<th>Tiêu đề phản hồi</th>
						<th>Ngày phản hồi</th>
						<th>Hành động</th>
					</tr>
				</thead>
				<tbody>
					@if(count($responds))
					@foreach($responds as $v)
					<tr>
						<td id="td0_{{$v->ntv_id}}">{{ $v->ntv->first_name }} {{ $v->ntv->last_name }}</td>
						<td id="td1_{{$v->ntv_id}}">@if($v->ntv->resume->count() > 0){{ HTML::link(URL::route('employers.search.resumeinfo', $v->ntv->resume->first()->id), null, ['class'=>'text-blue'] ) }}@else @endif</td>
						<td>{{ $v->content }}</td>
						<td>{{ $v->title }}</td>
						<td>{{ $v->submited_date }}</td>
						<td>
							@if($v->user_submit == Auth::id())
							Bạn trả lời
							@else
							<button type="button" class="btn btn btn-lg bg-orange bg-green" onclick="showmodal({{ $v->ntv_id }});">Phản hồi</button>
							@endif
						</td>
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
		<!-- <div class="boxed">
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
		</div> -->
	</section>


	<div class="modal fade" id="modalRespond">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Gửi phản hồi lại ứng viên</h4>
				</div>
				<div class="modal-body">
					<form action="" method="POST" class="form-horizontal" role="form" onsubmit="return sendRespond();">
						<div id="result-send"></div>
						<div class="form-group">
							<label for="input" class="col-sm-2 control-label">Ứng viên:</label>
							<div class="col-sm-10">
								<a href="#" target="_blank" id="ung-vien-ten"></a>
							</div>
						</div>
						<div class="form-group">
							<label for="inputSubject" class="col-sm-2 control-label">Tiêu đề:</label>
							<div class="col-sm-10">
								<input type="text" name="subject" id="inputSubject" class="form-control" value="" required="required">
							</div>
						</div>
						<div class="form-group">
							<label for="textareaContent" class="col-sm-2 control-label">Nội dung:</label>
							<div class="col-sm-10">
								<textarea name="content" id="textareaContent" class="form-control" rows="5" required="required"></textarea>
							</div>
						</div>
						<input type="hidden" name="ntv_id" id="ntv_id" class="form-control" value="">
							<div class="form-group">
								<div class="col-sm-10 col-sm-offset-2">
									<button type="submit" class="btn btn-lg bg-orange bg-green">Gửi phản hồi</button>
									<button type="submit" class="btn btn-lg bg-orange" data-dismiss="modal">Đóng</button>
								</div>
							</div>
					</form>
				</div>
				
			</div>
		</div>
	</div>
@stop

@section('script')
	<script type="text/javascript">
	var sendRespond = function()
	{
		var subject = $('#inputSubject').val();
		var content = $('#textareaContent').val();
		var ntv_id = $('#ntv_id').val();
		$.ajax({
			url: '{{ URL::route('employers.report.sendrespond') }}',
			type: 'POST',
			data: {ntv_id: ntv_id, subject: subject, content: content},
			dataType: 'json',
			success: function(json)
			{
				if(json.has)
				{
					$('#result-send').html('<div class="alert alert-success">Gửi phản hồi thành công</div>');
					setTimeout(function(){ window.location.href = '{{ URL::route('employers.report.respond') }}'; }, 1000);
				} else {
					$('#result-send').html('<div class="alert alert-danger">Không thể gửi phản hồi tới ứng viên</div>');
					setTimeout(function(){ $('#result-send').html(''); }, 3000);
				}
			}
		})
		return false;
	}
	var showmodal = function(id)
	{
		var ten = $('#td0_'+id).text();
		var link = $('#td1_'+id).text().replace(' ', '');
		link = link.replace('	', '');
		$('#ntv_id').val(id);
		$('#ung-vien-ten').attr('href', link);
		$('#ung-vien-ten').text(ten);
		$('#modalRespond').modal('show');
	}
	</script>
@stop