@extends('layouts.employer')
@section('title') Danh sách hồ sơ đã lưu @stop
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
					<form action="" name="form11" method="POST" role="form">
					<div class="clearfix"></div>
					@include('includes.notifications')
					<table class="table table-bordered table-blue-bordered white">
						<thead>
							<tr>
								<th>
									<div class="checkbox">
										<input type="checkbox" id="selectall" value="">
										<label>
											<span></span>
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
										<input type="checkbox" name="valid[]" class="check" value="{{ $ap->id }}">
										<label>
											<span></span>
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
									Trạng thái: <span id="a_{{ $ap->id }}">{{ Config::get('custom_apply.apply_status')[$ap->status] }}</span>
								</td>
								<td>
									<div class="dropdown">
									  <a id="dropdown{{ $ap->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									    Thao tác
									    <span class="fa fa-list"></span>
									  </a>
									  <ul class="dropdown-menu" aria-labelledby="dropdown{{ $ap->id }}">
									    <li><a id="s_{{$ap->cv_id}}" class="modalSaveFolder">Lưu thư mục</a></li>
									    <li><a id="st_{{$ap->id}}" class="modalSaveStatus">Cập nhật trạng thái</a></li>
									    <li><a id="lt_{{$ap->id}}" class="modalSendLetter">Gửi thông báo</a></li>
									    <li><a id="p_{{$ap->cv_id}}" href="{{ URL::route('employers.search.print_cv', $ap->cv_id) }}" target="_blank" class="printCV">In</a></li>
									  </ul>
									</div>
									
								</td>
								@else
								<td>
									<div class="checkbox">
										<input type="checkbox" name="valid[]" class="check" value="{{ $ap->id }}">
										<label>
											<span></span>
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
								<td>
									<div class="dropdown">
									  <a id="dropdown{{ $ap->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									    Thao tác
									    <span class="fa fa-list"></span>
									  </a>
									  <ul class="dropdown-menu" aria-labelledby="dropdown{{ $ap->id }}">
									    <li><a id="s_{{$ap->cv_id}}" class="modalSaveFolder">Lưu thư mục</a></li>
									    <li><a id="st_{{$ap->id}}" class="modalSaveStatus">Cập nhật trạng thái</a></li>
									    <li><a id="p_{{$ap->cv_id}}" href="{{ URL::route('employers.search.print_cv', $ap->cv_id) }}" target="_blank" class="printCV">In</a></li>
									  </ul>
									</div>
									
								</td>
								@endif
							</tr>
							@endforeach
							
						</tbody>
					</table>
					<button type="button" id="btn-danhgiaall" class="btn btn-lg bg-orange">Đánh giá hồ sơ</button>
					<button type="button" id="btn-xoaall" class="btn btn-lg bg-orange bg-green">Xóa hồ sơ</button>
					<button type="button" id="btn-luuall" class="btn btn-lg bg-orange bg-green">Lưu thư mục</button>
					<input type="hidden" name="act" id="act" value="">
					<input type="hidden" name="val" id="val" value="">
					<div id="pagination" class="pull-right">
						{{ $apply->links() }}
					</div>
					</form>
				</div>		
			</section>
<div class="modal fade" id="modalSaveFolder">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">THÊM HỒ SƠ VÀO THƯ MỤC</h4>
			</div>
			<div class="modal-body">
				<form action="" method="POST" class="form-horizontal" role="form" name="form1" onsubmit="saveFolder();return false;">
					<div id="result"></div>
					<div class="form-group">
						<label for="input" class="col-sm-4 control-label">
							<div class="radio">
								<label class="float-left">
									<input type="radio" name="where_cv" id="inputAdd" value="1" checked="checked">
									Thêm vào thư mục
								</label>
							</div>
						</label>
						<div class="col-sm-8">
							{{ Form::select('cv_folder', EFolder::where('ntd_id', Auth::id())->orderBy('id', 'desc')->lists('folder_name', 'id'), null, ['id'=>'cv_folder'] ) }}
							
						</div>
					</div>
					<div class="form-group">
						<label for="input" class="col-sm-4 control-label">
							<div class="radio">
								<label class="float-left">
									<input type="radio" name="where_cv" id="inputCreate" value="2">
									Tạo thư mục mới
								</label>
							</div>
						</label>
						<div class="col-sm-8">
							<input type="text" name="folder_name" required="required" id="inputFolder_name" disabled="disabled" class="form-control">
						</div>
					</div>
					<input type="hidden" name="cv_id" id="inputCv_id" class="form-control" value="">
						<div class="form-group">
							<div class="col-sm-8 col-sm-offset-4">
								<button type="submit" id="save-cv" class="btn btn-lg bg-orange">Lưu</button>
							</div>
						</div>
				</form>
			</div>
			
		</div>
	</div>
</div>
<div class="modal fade" id="modalSaveStatus">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">CẬP NHẬT TRẠNG THÁI</h4>
			</div>
			<div class="modal-body">
				<form action="" method="POST" onsubmit="saveStatus(); return false;" class="form-horizontal" role="form">
					<h4>Cập nhật trạng thái cho hồ sơ: </h4>
					<div id="result_s"></div>
					<div class="form-group">
						<label for="inputStatus" class="col-sm-2 control-label">Trạng thái:</label>
						<div class="col-sm-4">
							{{ Form::select('status', Config::get('custom_apply.apply_status'), null, ['id'=>'inputStatus'] ) }}
						</div>
					</div>
					<input type="hidden" name="ap_id" id="inputAp_id" class="form-control" value="">
						<div class="form-group">
							<div class="col-sm-10 col-sm-offset-2">
								<button type="submit" class="btn btn-lg bg-orange">Lưu thay đổi</button>
							</div>
						</div>
				</form>
			</div>
			
		</div>
	</div>
</div> <!-- end modal save status -->
<div class="modal fade" id="modalSendLetter">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">GỬI THÔNG BÁO TỚI ỨNG VIÊN</h4>
			</div>
			<div class="modal-body">
				<form action="" onsubmit="sendLetter(); return false;" method="POST" class="form-horizontal" role="form">
					<h4>Gửi thông báo tới ứng viên</h4>
					<div id="result_l"></div>
					<div class="form-group">
						<label for="inputLetter" class="col-sm-2 control-label">Chọn thư:</label>
						<div class="col-sm-10">
							{{ Form::select('letter', ['none'=>'Vui lòng chọn'] + RespondLetter::where('ntd_id', Auth::id())->lists('subject', 'id'), null, ['id'=>'inputLetter'] ) }}
						</div>
					</div>
					<div class="form-group">
						<label for="inputSubject" class="col-sm-2 control-label">Tiêu đề:</label>
						<div class="col-sm-10">
							<input type="text" name="subject" disabled="disabled" id="inputSubject" class="form-control" value="" required="required" pattern="" title="">
						</div>
					</div>
					<div class="form-group">
						<label for="textareaContent" class="col-sm-2 control-label">Nội dung:</label>
						<div class="col-sm-10">
							<textarea name="content" id="inputContent" disabled="disabled" class="form-control" rows="10" required="required"></textarea>
						</div>
					</div>
					<input type="hidden" name="lt_id" id="inputLt_id" class="form-control" value="">
						<div class="form-group">
							<div class="col-sm-10 col-sm-offset-2">
								<button type="submit" class="btn btn-lg bg-orange">Gửi</button>
								<a href="{{ URL::route('employers.account.create_letter') }}" target="_blank" class="btn btn-lg bg-orange bg-green">Thêm mới thư</a>
							</div>
						</div>
				</form>
			</div>
			
		</div>
	</div>
</div>
<div class="modal fade" id="modalSaveStatusAll">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">CẬP NHẬT TRẠNG THÁI</h4>
			</div>
			<div class="modal-body">
				<form action="" method="POST" onsubmit="saveStatus(); return false;" class="form-horizontal" role="form">
					<h4>Cập nhật trạng thái cho hồ sơ đã chọn: </h4>
					<div id="result_s"></div>
					<div class="form-group">
						<label for="inputStatus" class="col-sm-2 control-label">Trạng thái:</label>
						<div class="col-sm-4">
							{{ Form::select('status', Config::get('custom_apply.apply_status'), null, ['id'=>'inputStatus1'] ) }}
						</div>
					</div>
						<div class="form-group">
							<div class="col-sm-10 col-sm-offset-2">
								<button type="button" class="saveAll btn btn-lg bg-orange">Lưu thay đổi</button>
							</div>
						</div>
				</form>
			</div>
			
		</div>
	</div>
</div>
<div class="modal fade" id="modalSaveFolderAll">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">THÊM HỒ SƠ ĐÃ CHỌN VÀO THƯ MỤC</h4>
			</div>
			<div class="modal-body">
				<form action="" method="POST" class="form-horizontal" role="form" name="form1" onsubmit="saveFolder();return false;">
					<div id="result"></div>
					<div class="form-group">
						<label for="input" class="col-sm-4 control-label">
							<div class="radio">
								<label class="float-left">
									<input type="radio" name="where_cv" id="inputAdd1" value="1" checked="checked">
									Thêm vào thư mục
								</label>
							</div>
						</label>
						<div class="col-sm-8">
							{{ Form::select('cv_folder', EFolder::where('ntd_id', Auth::id())->orderBy('id', 'desc')->lists('folder_name', 'id'), null, ['id'=>'cv_folder1'] ) }}
							
						</div>
					</div>
					<!-- <div class="form-group">
						<label for="input" class="col-sm-4 control-label">
							<div class="radio">
								<label class="float-left">
									<input type="radio" name="where_cv" id="inputCreate1" value="2">
									Tạo thư mục mới
								</label>
							</div>
						</label>
						<div class="col-sm-8">
							<input type="text" name="folder_name" required="required" id="inputFolder_name1" disabled="disabled" class="form-control">
						</div>
					</div> -->
						<div class="form-group">
							<div class="col-sm-8 col-sm-offset-4">
								<button type="button" class="saveAll btn btn-lg bg-orange">Lưu</button>
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
	$('#inputAdd').click(function(event) { 
		$('#inputFolder_name').prop({
			disabled: 'disabled'
		});
		$('#cv_folder').removeAttr('disabled');	
	});
	$('#inputCreate').click(function(event) {
		$('#cv_folder').attr('disabled', 'disabled');
		$('#inputFolder_name').removeProp('disabled');
	});
	$('.modalSaveFolder').on('click', function () {
		var thisId = this.id;
		var id = thisId.split('_');
		id = id[1];
		//khi save thì id đây là id của cv, ko phải id của apply
		$('#inputCv_id').val(id);
		$('#modalSaveFolder').modal('show');
	});
	var saveFolder = function()
	{
		var where_cv = ($('#inputCreate').is(':checked'))?1:0;
		var cv_id = $('#inputCv_id').val();
		if(where_cv == 0)
		{
			var action = 'saveToFolder';
			var param = $('#cv_folder').val();
		} else {
			var action = 'createFolder';
			var param = $('#inputFolder_name').val();
		}
		$.ajax({
			url: '{{ URL::route('employers.search.ajax') }}',
			data: {action: action, param: param, cvid: cv_id},
			type: 'POST',
			dataType: 'json',
			success: function(json)
			{
				if(json.has)
				{
					$('#result').html('<div class="alert alert-success">Hoàn thành.</div>');
				} else {
					$('#result').html('<div class="alert alert-danger">Có lỗi khi thực hiện.</div>');
				}
				setTimeout(function(){ $('#result').html(''); }, 1500);
				setTimeout(function(){ $('#modalSaveFolder').modal('hide');  }, 1500);
			}
		});

	}//

	$('.modalSaveStatus').on('click', function () {
		var thisId = this.id;
		var id = thisId.split('_');
		id = id[1];
		//khi save status thì id đây là id của apply
		$('#inputAp_id').val(id);
		$('#modalSaveStatus').modal('show');
	});
	var saveStatus = function()
	{
		var ap_id = $('#inputAp_id').val();
		var status = $('#inputStatus').val();
		var action = 'saveStatusFolder';
		$.ajax({
			url: '{{ URL::route('employers.search.ajax') }}',
			data: {action: action, status: status, apid: ap_id},
			type: 'POST',
			dataType: 'json',
			success: function(json)
			{
				if(json.has)
				{
					$('#result_s').html('<div class="alert alert-success">Hoàn thành.</div>');
				} else {
					$('#result_s').html('<div class="alert alert-danger">Có lỗi khi thực hiện.</div>');
				}
				$('#a_'+ap_id).html($('#inputStatus').find(":selected").text());
				setTimeout(function(){ $('#result_s').html(''); }, 1500);
				setTimeout(function(){ $('#modalSaveStatus').modal('hide');  }, 1500);
			}
		});

	}//

	$('.modalSendLetter').on('click', function () {
		var thisId = this.id;
		var id = thisId.split('_');
		id = id[1];
		//khi save status thì id đây là id của apply
		$('#inputLt_id').val(id);
		$('#modalSendLetter').modal('show');
	});
	$('#inputLetter').change(function(event) {
		var letterId = $('#inputLetter').val();
		if( isNaN(letterId))
		{
			$('#inputSubject').val('');
			$('#inputContent').val('');
			//$('#inputSubject').removeAttr('disabled');
			//$('#inputContent').removeAttr('disabled');
		} else {
			$.ajax({
				url: '{{ URL::route('employers.jobs.ajax') }}',
				data: {action: 'getRespond', letterId: letterId},
				type: 'POST',
				dataType: 'json',
				success: function(json)
				{
					if(json.has) {
						$('#inputSubject').val(json.subject);
						$('#inputContent').val(json.content);
						//$('#inputSubject').attr('disabled', 'disabled');
						//$('#inputContent').attr('disabled', 'disabled');
						
					} else {
						alert(json.message);
					}
					
				}
			});
		}
	});
	var sendLetter = function()
	{
		var ap_id = $('#inputLt_id').val();
		var letter = $('#inputLetter').val();
		var action = 'sendLetter';
		$.ajax({
			url: '{{ URL::route('employers.search.ajax') }}',
			data: {action: action, letter: letter, apid: ap_id},
			type: 'POST',
			dataType: 'json',
			success: function(json)
			{
				if(json.has)
				{
					$('#result_l').html('<div class="alert alert-success">Hoàn thành.</div>');
				} else {
					$('#result_l').html('<div class="alert alert-danger">Có lỗi khi thực hiện.</div>');
				}
				$('#a_'+ap_id).html($('#inputStatus').find(":selected").text());
				setTimeout(function(){ $('#result_l').html(''); }, 1500);
				setTimeout(function(){ $('#modalSendLetter').modal('hide');  }, 1500);
			}
		});

	}//
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
	$('#btn-danhgiaall').click(function(event) {
		$('#act').val('danhgiaall');
		$('#modalSaveStatusAll').modal();
	});
	$('#btn-xoaall').click(function(event) {
		$('#act').val('xoaall');
		if(confirm('Bạn có muốn xóa các hồ sơ đã chọn ?'))
		{
			$('form[name=form11]').submit();
		}
	});
	$('#btn-luuall').click(function(event) {
		$('#act').val('luu');
		$('#modalSaveFolderAll').modal();
	});
	$('.saveAll').click(function(event) {
		if($('#act').val() == 'danhgiaall')
		{
			$('#val').val($('#inputStatus1').val());
		} else {
			$('#val').val($('#cv_folder1').val());
		}
		$('form[name=form11]').submit();
	});
	</script>
@stop