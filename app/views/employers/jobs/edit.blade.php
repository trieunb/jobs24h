@extends('layouts.employer')
@section('title') Chỉnh sửa tin tuyển dụng - VnJobs @stop
@section('content')
	<section class="boxed-content-wrapper clearfix">
		<div class="container">
			<aside id="sidebar" class="col-sm-3">
				@include('includes.employers.jobs_navbar')
			</aside>
			
			<section id="content" class="pull-right right">
							{{ Form::open(array('route'=>array('employers.jobs.update', $job->id), 'method'=>'POST', 'class'=>'form-horizontal', 'files'=>true)) }}
							<div class="boxed">
					<div class="heading-image">
						<h2 class="text-blue">{{ HTML::image('assets/ntd/images/doc.png') }} Thông tin đăng tuyển</h2>
					</div>
											@include('includes.notifications')
											<div class="form-group">
												<label for="vitri" class="col-sm-2 control-label">Vị trí tuyển dụng:</label>
												<div class="col-sm-10">
													{{ Form::text('vitri', $job->vitri, array('class'=>'form-control', 'required', 'placeholder'=>'Ví dụ: Nhân viên lập trình Web PHP') ) }}
												</div>
											</div>
											<div class="form-group">
												<label for="chucvu" class="col-sm-2 control-label">Chức vụ:</label>
												<div class="col-sm-4">
													{{ Form::select('chucvu', Level::lists('name', 'id'), $job->chucvu) }}
													
												</div>
												<label for="namkinhnghiem" class="col-sm-2 control-label">Số năm kinh nghiệm:</label>
												<div class="col-sm-4">
													{{ Form::number('namkinhnghiem', $job->namkinhnghiem, array('class'=>'form-control', 'required', 'min'=>0, 'placeholder'=>'Ví dụ: 1') ) }}
												</div>
											</div>
											<div class="form-group">
												<label for="input" class="col-sm-2 control-label">Ngành nghề:</label>
												<div class="col-sm-10">
													{{ Form::select('ntd_nganhnghe[]', Category::getList(), $job->arrayCategory(), array('class'=>'form-control chosen-select', 'multiple') ) }}
												</div>
											</div>
											<div class="form-group">
												
												<label for="bangcap" class="col-sm-2 control-label">Yêu cầu bằng cấp:</label>
												<div class="col-sm-4">
													{{ Form::select('bangcap', Education::lists('name', 'id'), $job->bangcap, array('class'=>'form-control') ) }}
												</div>
												<label for="sltuyen" class="col-sm-2 control-label">Số lượng cần tuyển:</label>
												<div class="col-sm-4">
													{{ Form::text('sltuyen', $job->sltuyen, array('class'=>'form-control', 'placeholder'=>'Ví dụ: 10', 'required') ) }}
												</div>
											</div>
											<div class="form-group">
												<label for="hinhthuc" class="col-sm-2 control-label">Hình thức làm việc:</label>
												<div class="col-sm-4">
													{{ Form::select('hinhthuc', WorkType::lists('name', 'id'), $job->hinhthuc, array('class'=>'form-control') ) }}
												</div>
												<label for="gioitinh" class="col-sm-2 control-label">Yêu cầu giới tính:</label>
												<div class="col-sm-4">
													{{ Form::select('gioitinh',array(0=>'Không yêu cầu', 1=>'Nam', 2=>'Nữ'), $job->gioitinh, array('class'=>'form-control') ) }}
												</div>
											</div>
											<div class="form-group">
												<label for="input" class="col-sm-2 control-label">Địa điểm làm việc:</label>
												<div class="col-sm-10">
													{{ Form::select('ntd_diadiem[]', Province::lists('province_name', 'id'), $job->arrayLocation(), array('class'=>'form-control chosen-select', 'multiple') ) }}
												</div>
												
											</div>
											<div class="form-group">
												<label for="dotuoi" class="col-sm-2 control-label">Yêu cầu độ tuổi:</label>
												<div class="col-sm-6">
													<div class="row">
														<div class="col-sm-4">
															{{ Form::text('dotuoi_min', $job->dotuoi_min, array('class'=>'form-control','required') ) }}
														</div>
														<div class="col-xs-2 middle-align">đến</div>
														<div class="col-sm-4">
															{{ Form::text('dotuoi_max', $job->dotuoi_max, array('class'=>'form-control','required') ) }}
														</div>
														<div class="col-xs-2 middle-align">tuổi</div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="input" class="col-sm-2 control-label">Mức lương:</label>
												<div class="col-sm-6">
													<div class="row">
														<div class="col-sm-4">
															{{ Form::text('mucluong_min', $job->mucluong_min, array('class'=>'form-control', 'id'=>'mucluong_min') ) }} 
														</div>
														<div class="col-xs-2 middle-align">đến</div>
														<div class="col-sm-4">
															{{ Form::text('mucluong_max', $job->mucluong_max, array('class'=>'form-control', 'id'=>'mucluong_max') ) }}
														</div>
														<div class="col-xs-2 middle-align">VND</div>
													</div>
												</div>
												<div class="col-xs-2">
													<div class="checkbox">
														<label>
															{{ Form::checkbox('thuongluong', 1, ($job->mucluong_max==0)?1:0, ['id'=>'thuongluong']) }}
															Thương lượng
														</label>
													</div>
												</div>
												
											</div>
											<div class="form-group">
												<label for="mota" class="col-sm-2 control-label">Mô tả công việc:</label>
												<div class="col-sm-10">
													{{ Form::textarea('mota', $job->mota, array('class'=>'form-control', 'rows'=>5,'required') ) }}
													<div class="clearfix"></div>
													<div class="left-control-info">
														<span>Bạn có thể nhập thêm (14500 ký tự)</span>
													</div>
													<div class="right-control-info"><a href="#">Xem mẫu mô tả công việc</a></div>
												</div>
												
											</div>
											<div class="form-group">
												<label for="input" class="col-sm-2 control-label">Quyền lợi:</label>
												<div class="col-sm-10">
													{{ Form::textarea('quyenloi', $job->quyenloi, array('class'=>'form-control', 'rows'=>5) ) }}
													<div class="clearfix"></div>
													<div class="left-control-info">
														<span>Bạn có thể nhập thêm (14500 ký tự)</span>
													</div>
													<div class="right-control-info"><a href="#">Xem mẫu mô tả công việc</a></div>
												</div>
												
											</div>
											<div class="form-group">
												<label for="input" class="col-sm-2 control-label">Yêu cầu khác:</label>
												<div class="col-sm-10">
													{{ Form::textarea('yeucaukhac', $job->yeucaukhac, array('class'=>'form-control', 'rows'=>3) ) }}
												</div>
												
											</div>
											<div class="form-group">
												<label for="hosogom" class="col-sm-2 control-label">Hồ sơ bao gồm:</label>
												<div class="col-sm-10">
													{{ Form::textarea('hosogom', $job->hosogom, array('class'=>'form-control', 'rows'=>2) ) }}
												</div>
												
											</div>
											<div class="form-group">
												<label for="hannop" class="col-sm-2 control-label">Hạn nộp hồ sơ:</label>
												<div class="col-sm-4">
													{{ Form::text('hannop', $job->hannop, array('class'=>'form-control datepicker') ) }}
												</div>
												<label for="hinhthucnop" class="col-sm-2 control-label">Hình thức nộp:</label>
												<div class="col-sm-4">
													{{ Form::select('hinhthucnop', Config::get('custom_hinhthucnop.hinh_thuc'), $job->hinhthucnop, array('class'=>'form-control') ) }}
												</div>
											</div>
											<div class="tags-box bg-little-blue push-padding-30-full border-blue">
												<h4><strong>Gia tăng chất lượng hồ sơ ứng tuyển</strong> bằng cách xác định <strong>3 thẻ từ khóa.</strong>
		Điều này sẽ giúp các ứng viên nhanh chóng xác định rõ yêu cầu chính của công việc.</h4>
												<div class="form-group">
													<label for="keyword_tags" class="col-sm-4 control-label">Thẻ từ khóa 1:</label>
													<div class="col-sm-8">
														{{ Form::text('keyword_tags[1]', $job->keyword_tags[1], array('class'=>'form-control', 'placeholder'=>'Ví dụ: Kỹ năng thuyết trình') ) }}
													</div>
												</div>
												<div class="form-group">
													<label for="keyword_tags" class="col-sm-4 control-label">Thẻ từ khóa 2:</label>
													<div class="col-sm-8">
														{{ Form::text('keyword_tags[2]', $job->keyword_tags[2], array('class'=>'form-control', 'placeholder'=>'Ví dụ: Javascript') ) }}
													</div>
												</div>
												<div class="form-group">
													<label for="keyword_tags" class="col-sm-4 control-label">Thẻ từ khóa 3:</label>
													<div class="col-sm-8">
														{{ Form::text('keyword_tags[3]', $job->keyword_tags[3], array('class'=>'form-control', 'placeholder'=>'Ví dụ: Tiếng Nhật') ) }}
													</div>
												</div>
												
											</div>
											<div class="form-group">
												<label for="input" class="col-sm-2 control-label"></label>
												<div class="col-sm-10">
													<div class="checkbox">
														<label>
															<input type="checkbox" name="show_auto_reply" value="1" id="show-auto-reply">
															Thiết lập thư trả lời tự động khi có ứng viên nộp đơn ứng tuyển
														</label>
													</div>
												</div>
											</div>
											<div id="auto-reply" class="collapse ">
												<div class="form-group">
													<label for="input" class="col-sm-2 control-label">Chọn thư:</label>
													<div class="col-sm-10">
														{{ Form::select('letter_auto', ['none'=>'Vui lòng chọn'] + RespondAuto::where('ntd_id', Auth::id())->lists('subject', 'id'), null, ['id'=>'select-auto'] ) }}
													</div>
												</div>
												<div class="form-group">
													<label for="inputSubject" class="col-sm-2 control-label">Tiêu đề:</label>
													<div class="col-sm-10">
														<input type="text" name="subject" id="inputSubject" class="form-control" value="" disabled="disabled">
													</div>
												</div>
												<div class="form-group">
													<label for="inputSubject" class="col-sm-2 control-label">Nội dung thư:</label>
													<div class="col-sm-10">
														<textarea name="content" id="inputContent" class="form-control" rows="10" disabled="disabled"></textarea>
													</div>
												</div>
											</div>
										</div>
										<div class="boxed">
											<div class="heading-image">
												<h2 class="text-blue">{{ HTML::image('assets/ntd/images/thong-tin-ung-tuyen.png') }} Thông tin ứng tuyển</h2>
											</div>
											<div class="form-group">
												<label for="nguoilienhe" class="col-sm-2 control-label">Tên người liên hệ:</label>
												<div class="col-sm-10">
													{{ Form::text('nguoilienhe', $job->nguoilienhe, array('class'=>'form-control') ) }}
													<div class="checkbox">
														<input type="checkbox" id="ttct" name="is_display" value="">
														<label for="ttct">
															<span></span>
															Hiển thị trong thông tin công ty
														</label>
													</div>
												</div>
												<div class="clearfix"></div>
												
											</div>
											<div class="form-group">
												<label for="dclienhe" class="col-sm-2 control-label">Địa chỉ liên hệ:</label>
												<div class="col-sm-10">
													{{ Form::text('dclienhe', $job->dclienhe, array('class'=>'form-control') ) }}
												</div>
												
											</div>
											<div class="form-group">
												<label for="dienthoailienhe" class="col-sm-2 control-label">Điện thoại:</label>
												<div class="col-sm-4">
													{{ Form::text('dienthoailienhe', $job->dienthoailienhe, array('class'=>'form-control') ) }}
												</div>
												<label for="emaillienhe" class="col-sm-2 control-label">Email:</label>
												<div class="col-sm-4">
													{{ Form::text('emaillienhe', $job->emaillienhe, array('class'=>'form-control') ) }}
												</div>
											</div>
											<div class="form-group">
												<label for="yeucaulienhe" class="col-sm-2 control-label">Yêu cầu:</label>
												<div class="col-sm-10">
													{{ Form::textarea('yeucaulienhe', $job->yeucaulienhe, array('class'=>'form-control', 'rows'=>'3')) }}
												</div>
											</div>
											<div class="form-group">
												<label for="input" class="col-sm-2 control-label">Trạng thái tin:</label>
												<div class="col-sm-4">
													{{ Form::select('is_display', array(0=>'Chờ đăng', 1=>'Đăng ngay'), $job->is_display, array('class'=>'form-control') ) }}
												</div>
											</div>
										</div>


										<div class="boxed">
											<div class="heading-image">
												<h2 class="text-blue">{{ HTML::image('assets/ntd/images/thong-tin-ung-tuyen.png') }} Dịch vụ kèm theo</h2>
											</div>

											<div class="form-group">
												<label for="input" class="col-sm-12 control-label">Các dịch vụ đi kèm với tin đăng:</label>
												<div class="clearfix"></div>
												<table class="table table-blue-bordered table-bordered">
													<thead>
														<tr>
															<th class="col-sm-1">Số đơn hàng</th>
															<th class="col-sm-3">Gói dịch vụ</th>
															<th class="col-sm-1">Số lượng</th>
															<th class="col-sm-1">Còn lại</th>
															<th class="col-sm-2">Ngày bắt đầu kích hoạt</th>
															<th class="col-sm-2">Ngày kết thúc kích hoạt</th>
															<th class="col-sm-2">Tình trạng</th>
														</tr>
													</thead>
													<tbody>
													@if(count($order))
													 @foreach($order as $value)
														 
														<tr>
															 
																<td>
																<a class="text-blue" href="{{ URL::route('employers.orders.detail', $value->id) }}">1234</a>
															</td>
															<td>{{ $value->epackage_name }}
															<div class="collapse vncollapse" id="collapse{{ $value->id }}">
																<ul>
																	<li>Gói dịch vụ cho tin đăng</li>
																</ul>  
															</div>
															<p><a class="text-blue" data-toggle="collapse" data-target="#collapse{{ $value->id }}" aria-expanded="false" aria-controls="collapse{{ $value->id }}"><i class="fa fa-plus-square-o"></i>&nbsp; Xem chi tiết</a></p>
																
															</td>
															<td>{{ $value->total_date }} ngày</td>
															<td>{{ round((strtotime(date('Y-m-d H:i:s',strtotime($value->ended_date)))-strtotime(date('Y-m-d H:i:s')))/(60*60*24)) }} ngày</td>
															<td>{{ $value->created_date }}</td>
															<td>{{ $value->ended_date }}</td>
															<td>
																@if($value->ended_date >= date('Y-m-d H:i:s') && $value->created_date <= date('Y-m-d H:i:s'))
																<span class="label label-success">Đang kích hoạt</span>
																@else 
																<span class="label label-danger">Đã hết hạn</span>
																@endif
															</td>
															 
														</tr>
													 
													@endforeach
													@else 
														<tr>
															<td colspan="7">Bạn không có đơn hàng nào.</td>
														</tr>
													@endif

													</tbody>
												</table>


												 
												 

											</div>

										</div>


									</div>		
									<div class="center">
									{{ Form::button('Lưu lại', array('type'=>'submit', 'class'=>'btn btn-lg bg-orange')) }}
									<a href="{{ URL::route('employers.jobs.index') }}" class="btn btn-lg bg-orange">Hủy</a>
								</div>
							</div> <!-- primary -->
							{{ Form::close() }}
						</div>
@stop

@section('style')
	{{ HTML::style('assets/css/chosen.min.css') }}
	{{ HTML::style('assets/css/datepicker.min.css') }}
	<style type="text/css">
		.no-padding {
			padding: 0;
		}
		.middle-align {
			vertical-align: middle;
			padding-top: 6px;
		}
	</style>
@stop

@section('script')
	{{ HTML::script('assets/js/chosen.jquery.min.js') }}
	{{ HTML::script('assets/js/bootstrap-datepicker.min.js') }}
	<script type="text/javascript">
		$('.chosen-select').chosen({allow_single_deselect:true, max_selected_options: 3}); 
		$('input.datepicker').datepicker({
			format: "yyyy-mm-dd",
			startDate: "today",
			clearBtn: true,
			language: "vi",
			autoclose: true
		});
		$('#show-auto-reply').click(function(event) {
			if($(this).is(':checked'))
			{
				$('#auto-reply').collapse('show');
			} else {
				$('#auto-reply').collapse('hide');
			}
		});
		function fillToTextbox()
		{
			var letterId = $('#select-auto').val();
			if( isNaN(letterId))
			{
				$('#inputSubject').val('');
				$('#inputContent').val('');
			} else {
				$.ajax({
					url: '{{ URL::route('employers.jobs.ajax') }}',
					data: {action: 'getLetter', letterId: letterId},
					type: 'POST',
					dataType: 'json',
					success: function(json)
					{
						if(json.has) {
							$('#inputSubject').val(json.subject);
							$('#inputContent').val(json.content);
						} else {
							alert(json.message);
						}
						
					}
				});
			}
		}
		$('#select-auto').change(function(event) {
			fillToTextbox();
		});

		$('#thuongluong').click(function(event) {
			if($(this).is(':checked'))
			{
				$('#mucluong_min').val(0);
				$('#mucluong_max').val(0);
				$('#mucluong_min').attr('readonly', 'readonly');
				$('#mucluong_max').attr('readonly', 'readonly');
			} else {
				$('#mucluong_min').removeAttr('readonly');
				$('#mucluong_max').removeAttr('readonly');
			}
		});
		if($('#thuongluong').is(':checked')) {
			$('#thuongluong').trigger('click');
			$('#thuongluong').trigger('click');
		}

		var show_auto_reply = '{{ $job->letter_auto_id }}';
		if(show_auto_reply != 0) {
			$('#show-auto-reply').trigger('click');
			$('#select-auto').val(show_auto_reply);
			fillToTextbox();
		}
		
	</script>
@stop