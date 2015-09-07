@extends('layouts.employer')
@section('title') Đăng tin tuyển dụng - VnJobs @stop
@section('content')
	<section class="boxed-content-wrapper clearfix">
		<div class="container">
			<aside id="sidebar" class="col-sm-3">
				@include('includes.employers.jobs_navbar')
			</aside>
			
			<section id="content" class="pull-right right">
							{{ Form::open(array('route'=>'employers.job.add', 'method'=>'POST', 'class'=>'form-horizontal', 'files'=>true)) }}
							<div class="boxed">
					<div class="heading-image">
						<h2 class="text-blue">{{ HTML::image('assets/ntd/images/doc.png') }} Thông tin đăng tuyển</h2>
					</div>
											@include('includes.notifications')
											<div class="form-group">
												<label for="vitri" class="col-sm-2 control-label">Vị trí tuyển dụng:</label>
												<div class="col-sm-10">
													{{ Form::text('vitri', null, array('class'=>'form-control', 'required', 'placeholder'=>'Ví dụ: Nhân viên lập trình Web PHP') ) }}
												</div>
											</div>
											<div class="form-group">
												<label for="chucvu" class="col-sm-2 control-label">Chức vụ:</label>
												<div class="col-sm-4">
													{{ Form::select('chucvu', Level::lists('name', 'id') ) }}
												</div>
												<label for="namkinhnghiem" class="col-sm-2 control-label">Số năm kinh nghiệm:</label>
												<div class="col-sm-4">
													{{ Form::number('namkinhnghiem', null, array('class'=>'form-control', 'required', 'min'=>0, 'placeholder'=>'Ví dụ: 1') ) }}
												</div>
											</div>
											<div class="form-group">
												<label for="input" class="col-sm-2 control-label">Ngành nghề:</label>
												<div class="col-sm-10">
													{{ Form::select('ntd_nganhnghe[]', Category::getList(), null, array('class'=>'form-control chosen-select', 'multiple') ) }}
												</div>
											</div>
											<div class="form-group">
												
												<label for="bangcap" class="col-sm-2 control-label">Yêu cầu bằng cấp:</label>
												<div class="col-sm-4">
													{{ Form::select('bangcap', Education::lists('name', 'id'), null, array('class'=>'form-control') ) }}
												</div>
												<label for="sltuyen" class="col-sm-2 control-label">Số lượng cần tuyển:</label>
												<div class="col-sm-4">
													{{ Form::text('sltuyen', null, array('class'=>'form-control', 'placeholder'=>'Ví dụ: 10', 'required') ) }}
												</div>
											</div>
											<div class="form-group">
												<label for="hinhthuc" class="col-sm-2 control-label">Hình thức làm việc:</label>
												<div class="col-sm-4">
													{{ Form::select('hinhthuc', WorkType::lists('name', 'id'), null, array('class'=>'form-control') ) }}
												</div>
												<label for="gioitinh" class="col-sm-2 control-label">Yêu cầu giới tính:</label>
												<div class="col-sm-4">
													{{ Form::select('gioitinh',array(0=>'Không yêu cầu', 1=>'Nam', 2=>'Nữ'), null, array('class'=>'form-control') ) }}
												</div>
											</div>
											<div class="form-group">
												<label for="input" class="col-sm-2 control-label">Địa điểm làm việc:</label>
												<div class="col-sm-10">
													{{ Form::select('ntd_diadiem[]', Province::lists('province_name', 'id'), null, array('class'=>'form-control chosen-select', 'multiple') ) }}
												</div>
												
											</div>
											<div class="form-group">
												<label for="dotuoi" class="col-sm-2 control-label">Yêu cầu độ tuổi:</label>
												<div class="col-sm-6">
													<div class="row">
														<div class="col-sm-4">
															{{ Form::text('dotuoi_min', null, array('class'=>'form-control','required') ) }}
														</div>
														<div class="col-xs-2 middle-align">đến</div>
														<div class="col-sm-4">
															{{ Form::text('dotuoi_max', null, array('class'=>'form-control','required') ) }}
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
															{{ Form::text('mucluong_min', null, array('class'=>'form-control', 'id'=>'mucluong_min') ) }} 
														</div>
														<div class="col-xs-2 middle-align">đến</div>
														<div class="col-sm-4">
															{{ Form::text('mucluong_max', null, array('class'=>'form-control', 'id'=>'mucluong_max') ) }}
														</div>
														<div class="col-xs-2 middle-align">VND</div>
													</div>
												</div>
												<div class="col-xs-2">
													<div class="checkbox">
														<label>
															{{ Form::checkbox('thuongluong', 1, '', ['id'=>'thuongluong']) }}
															Thương lượng
														</label>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="mota" class="col-sm-2 control-label">Mô tả công việc:</label>
												<div class="col-sm-10">
													{{ Form::textarea('mota', null, array('class'=>'form-control', 'rows'=>5,'required') ) }}
													<!-- <span class="italic text-gray-light">(Bạn có thể nhập thêm 14.500 ký tự)</span> -->
													<!--<span class="pull-right"><a class="text-blue decoration">Xem mẫu mô tả công việc</a></span>-->
												</div>
												
											</div>
											<div class="form-group">
												<label for="input" class="col-sm-2 control-label">Quyền lợi:</label>
												<div class="col-sm-10">
													{{ Form::textarea('quyenloi', null, array('class'=>'form-control', 'rows'=>5) ) }}
													<!-- <span class="italic text-gray-light">(Bạn có thể nhập thêm 14.500 ký tự)</span> -->
													<!--<span class="pull-right"><a class="text-blue decoration">Xem mẫu Quyền lợi</a></span>-->
												</div>
												
											</div>
											<div class="form-group">
												<label for="input" class="col-sm-2 control-label">Yêu cầu khác:</label>
												<div class="col-sm-10">
													{{ Form::textarea('yeucaukhac', null, array('class'=>'form-control', 'rows'=>3) ) }}
												</div>
												
											</div>
											<div class="form-group">
												<label for="hosogom" class="col-sm-2 control-label">Hồ sơ bao gồm:</label>
												<div class="col-sm-10">
													{{ Form::textarea('hosogom', null, array('class'=>'form-control', 'rows'=>2) ) }}
												</div>
												
											</div>
											<div class="form-group">
												<label for="hannop" class="col-sm-2 control-label">Hạn nộp hồ sơ:</label>
												<div class="col-sm-4">
													{{ Form::text('hannop', null, array('class'=>'form-control datepicker') ) }}
												</div>
												<label for="hinhthucnop" class="col-sm-2 control-label">Hình thức nộp:</label>
												<div class="col-sm-4">
													{{ Form::select('hinhthucnop', Config::get('custom_hinhthucnop.hinh_thuc'), null, array('class'=>'form-control') ) }}
												</div>
											</div>
											<div class="tags-box bg-little-blue push-padding-30-full border-blue">
												<p><strong>Gia tăng chất lượng hồ sơ ứng tuyển</strong> bằng cách xác định <strong>3 thẻ từ khóa</strong>.<br>Điều này sẽ giúp các ứng viên nhanh chóng xác định rõ yêu cầu chính của công việc.</p>
												<div class="form-group">
													<label for="keyword_tags" class="col-sm-4 control-label">Thẻ từ khóa 1:</label>
													<div class="col-sm-8">
														{{ Form::text('keyword_tags[1]', null, array('class'=>'form-control', 'placeholder'=>'Ví dụ: Kỹ năng thuyết trình') ) }}
													</div>
												</div>
												<div class="form-group">
													<label for="keyword_tags" class="col-sm-4 control-label">Thẻ từ khóa 2:</label>
													<div class="col-sm-8">
														{{ Form::text('keyword_tags[2]', null, array('class'=>'form-control', 'placeholder'=>'Ví dụ: Javascript') ) }}
													</div>
												</div>
												<div class="form-group">
													<label for="keyword_tags" class="col-sm-4 control-label">Thẻ từ khóa 3:</label>
													<div class="col-sm-8">
														{{ Form::text('keyword_tags[3]', null, array('class'=>'form-control', 'placeholder'=>'Ví dụ: Tiếng Nhật') ) }}
													</div>
												</div>
												<div class="form-group">
												<label for="input" class="col-sm-2 control-label"></label>
												<div class="col-sm-10">
													<div class="checkbox">
														<label>
															{{ Form::checkbox('show_auto_reply', 1, 0, ['id'=>'show-auto-reply']) }}
															Thiết lập thư trả lời tự động khi có ứng viên nộp đơn ứng tuyển
														</label>
													</div>
												</div>
											</div>
											<div id="auto-reply" class="collapse ">
												<div class="form-group">
													<label for="input" class="col-sm-2 control-label">Chọn thư:</label>
													<div class="col-sm-10">
														{{ Form::select('letter_auto', ['none'=>'Thêm mới'] + RespondAuto::where('ntd_id', Auth::id())->lists('subject', 'id'), null, ['id'=>'select-auto'] ) }}
													</div>
												</div>
												<div class="form-group">
													<label for="inputSubject" class="col-sm-2 control-label">Tiêu đề:</label>
													<div class="col-sm-10">
														{{ Form::text('subject', null, ['id'=>'inputSubject']) }}
													</div>
												</div>
												<div class="form-group">
													<label for="inputContent" class="col-sm-2 control-label">Nội dung thư:</label>
													<div class="col-sm-10">
														{{ Form::textarea('content', null, ['rows'=>10, 'id'=>'inputContent']) }}
													</div>
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
														{{ Form::text('nguoilienhe', null, array('class'=>'form-control') ) }}
														<div class="clearfix"></div>
														<div class="checkbox">
															<input type="checkbox" id="ttct" name="is_display" value="">
															<label for="ttct">
																<span></span>
																Hiển thị trong thông tin công ty
															</label>
														</div>
													</div>
													
												</div>
												<div class="form-group">
													<label for="dclienhe" class="col-sm-2 control-label">Địa chỉ liên hệ:</label>
													<div class="col-sm-10">
														{{ Form::text('dclienhe', null, array('class'=>'form-control') ) }}
													</div>
													
												</div>
												<div class="form-group">
													<label for="dienthoailienhe" class="col-sm-2 control-label">Điện thoại:</label>
													<div class="col-sm-4">
														{{ Form::text('dienthoailienhe', null, array('class'=>'form-control') ) }}
													</div>
													<label for="emaillienhe" class="col-sm-2 control-label">Email:</label>
													<div class="col-sm-4">
														{{ Form::text('emaillienhe', null, array('class'=>'form-control') ) }}
													</div>
												</div>
												<div class="form-group">
													<label for="yeucaulienhe" class="col-sm-2 control-label">Yêu cầu:</label>
													<div class="col-sm-10">
														{{ Form::textarea('yeucaulienhe', null, array('class'=>'form-control', 'rows'=>'3')) }}
													</div>
												</div>
												<div class="form-group">
													<label for="input" class="col-sm-2 control-label">Trạng thái tin:</label>
													<div class="col-sm-4">
														{{ Form::select('is_display', array(0=>'Chờ đăng', 1=>'Đăng ngay'), 1, array('class'=>'form-control') ) }}
													</div>
												</div>
										</div>
								
									<div class="boxed">
										<div class="heading-image">
											<h2 class="text-blue">{{ HTML::image('assets/ntd/images/photo.png') }} Hình ảnh và Video</h2>
										</div>
										<div class="form-group">
											<span class="col-sm-3 col-sm-offset-1"><strong>Link video Youtube:</strong><br><small class="legend">(Không bắt buộc)</small></span>
										</div>

										<div class="form-group">
											<div class="col-sm-offset-1 col-sm-6">
												{{ Form::text('video', Company::where('ntd_id', Auth::id())->first()->video_link, array('class'=>'form-control')) }}
											</div>
										</div>
										<div class="form-group">
											<span class="col-sm-3 col-sm-offset-1"><strong>Hình ảnh:</strong><br><small class="legend">(Không bắt buộc)</small></span>
										</div>
										<div class="form-group">
											<div class="col-sm-offset-1 col-sm-12 push-bottom">
												<div class="fileUpload btn bg-little-blue border-blue col-sm-2">
												    Chọn hình
												    {{ Form::file('hinhanh1', array('class'=>'upload')) }}
												</div>
												<div class="col-sm-7">
													<input class="uploadFile" placeholder=".jpg .png .gif, dung lượng <1MB, chiều cao >200px" disabled="disabled" class="form-control">
												</div>
											</div>
											<div class="col-sm-offset-1 col-sm-12 push-bottom">
												<div class="fileUpload btn bg-little-blue border-blue col-sm-2">
												    Chọn hình
												    {{ Form::file('hinhanh2', array('class'=>'upload')) }}
												</div>
												<div class="col-sm-7">
													<input class="uploadFile" placeholder=".jpg .png .gif, dung lượng <1MB, chiều cao >200px" disabled="disabled" class="form-control">
												</div>
											</div>
											<div class="col-sm-offset-1 col-sm-12 push-bottom">
												<div class="fileUpload btn bg-little-blue border-blue col-sm-2">
												    Chọn hình
												    {{ Form::file('hinhanh3', array('class'=>'upload')) }}
												</div>
												<div class="col-sm-7">
													<input class="uploadFile" placeholder=".jpg .png .gif, dung lượng <1MB, chiều cao >200px" disabled="disabled" class="form-control">
												</div>
											</div>
											<p class="col-sm-offset-1 col-sm-12"><strong>Lưu ý:</strong> Hình ảnh sẽ áp dụng cho tất cả việc làm đăng tuyển của Quý khách.</p>
										
										</div>
										</div>
										<div class="boxed">
											<div class="heading-image">
												<h2 class="text-blue">{{ HTML::image('assets/ntd/images/thong-tin-ung-tuyen.png') }} Cài đặt các dịch vụ</h2>
											</div>

											<div class="form-group">
												<label for="input" class="col-sm-12 control-label">Lựa chọn các hiệu ứng cho tin đăng:</label>
												<div class="clearfix"></div>
												@foreach($order as $value)
												<div class="col-sm-2"></div>
												<div class="col-sm-10">
													<div class="checkbox">
														<input type="checkbox" id="hieuung{{$value['id']}}" name="hieuung[]" value="{{$value['id']}}">
														<label for="hieuung{{$value['id']}}">
															<span></span>
															{{$value['epackage_name']}}
														</label>
													</div>

												</div>
												@endforeach
											</div>

										</div>
										
								<div class="center">
									{{ Form::button('Đăng tuyển', array('type'=>'submit', 'class'=>'btn btn-lg bg-orange')) }}
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
		#show-auto-reply {
			margin-left: -20px !important;
		}
	</style>
@stop

@section('script')
	{{ HTML::script('assets/js/chosen.jquery.min.js') }}
	{{ HTML::script('assets/js/bootstrap-datepicker.min.js') }}
	{{ HTML::script('assets/ntd/js/main.js') }}
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
		var show_auto_reply = '{{ Input::get('show_auto_reply') }}';
		
		if(show_auto_reply != 0) {
			$('#show-auto-reply').trigger('click');
			$('#select-auto').val(show_auto_reply);
			fillToTextbox();
		}
		if($('#show-auto-reply').is(':checked'))
		{
			$('#show-auto-reply').trigger('click');
			$('#show-auto-reply').trigger('click');
		}
		if($('#thuongluong').is(':checked')) {
			$('#thuongluong').trigger('click');
			$('#thuongluong').trigger('click');
		}
	</script>
@stop