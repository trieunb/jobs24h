@extends('layouts.employer')
@section('title') Chỉnh sửa tin tuyển dụng - VnJobs @stop
@section('content')
	<div class="col-xs-12 main-content">
							<div class="col-xs-3 sidebar">
								<h3 class="sidebar-title">Đăng tuyển dụng</h3>
								<div class="sidebar-info">
									<h4 class="info-title">1. Thông tin đăng tuyển</h4>
									<span class="info-des">
										Thông tin chi tiết về việc đăng tuyển sẽ giúp quý khách thu hút nhiều ứng viên và tìm được hồ sơ nhiều nhất.
									</span>
								</div>
								<div class="sidebar-info">
									<h4 class="info-title">2. Xem lại và hoàn tất</h4>
									<span class="info-des">
										Xem lại và hoàn tất thông tin đăng tuyển.
									</span>
								</div>
							</div>
							{{ Form::open(array('route'=>array('employers.jobs.update', $job->id), 'method'=>'POST', 'class'=>'form-horizontal')) }}
							<div class="col-xs-9 primary">
								<div class="panel panel-default sub-panel">
									<div class="panel-heading">
										<h2>Thông tin đăng tuyển</h2>
									</div>
									<div class="panel-body">
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
													{{ Form::text('chucvu', $job->chucvu, array('class'=>'form-control', 'required', 'placeholder'=>'Ví dụ: Teamleader') ) }}
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
															{{ Form::text('mucluong_min', $job->mucluong_min, array('class'=>'form-control') ) }} 
														</div>
														<div class="col-xs-2 middle-align">đến</div>
														<div class="col-sm-4">
															{{ Form::text('mucluong_max', $job->mucluong_max, array('class'=>'form-control') ) }}
														</div>
														<div class="col-xs-2 middle-align">USD</div>
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
											<div class="tags-box">
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
												<label for="nguoilienhe" class="col-sm-2 control-label">Tên người liên hệ:</label>
												<div class="col-sm-10">
													{{ Form::text('nguoilienhe', $job->nguoilienhe, array('class'=>'form-control') ) }}
												</div>
												<div class="clearfix"></div>
												<div class="checkbox">
													<input type="checkbox" id="ttct" name="is_display" value="">
													<label for="ttct">
														<span></span>
														Hiển thị trong thông tin công ty
													</label>
												</div>
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
													{{ Form::select('status', array(1=>'Chờ đăng', 2=>'Đăng ngay'), $job->status, array('class'=>'form-control') ) }}
												</div>
											</div>
											
										</form>
									</div>
								</div> <!-- panel -->
								
								
								<div class="center">
									{{ Form::button('Tiếp tục', array('type'=>'submit', 'class'=>'btn btn-warning')) }}
									<button type="button" class="btn btn-warning">Hủy</button>
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
	</script>
@stop