@extends('layouts.employer')
@section('title')Xem thông tin hồ sơ {{ $resume->tieude_cv }} @stop
@section('content')
	<section class="boxed-content-wrapper clearfix resume-info">
		<div class="container">
			
			<section id="" class="right">
				<div class="box box-resume-info">
					<div class="row box-header">
						<div class="col-xs-12 info-action">
							<div class="pull-right">
								<ul>
									<li><a href="#modalSaveFolder" data-toggle="modal" data-target="#modalSaveFolder">{{ HTML::image('assets/ntd/images/icon-save-cv.png') }} Lưu thư mục</a></li>
									<li><a href="{{ URL::to($locale.'/employers/search/basic?' . implode('&', ['keyword=', 'category=all', 'level='.$resume->capbachientai, 'location=all'])) }}" target="_blank">{{ HTML::image('assets/ntd/images/icon-view-cv.png') }} Xem hồ sơ tương tự</a></li>
									<li><a href="#">{{ HTML::image('assets/ntd/images/icon-send-cv.png') }} Gửi hồ sơ</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="row resume-content">
						<div class="col-xs-12">
							<div class="row">
								<div class="col-xs-5">
									<h4 class="resume-title">Chức danh/vị trí: <span class="cl-orange">{{ $resume->level->name }}</span></h4>
									<div class="clearfix"></div>
									<div class="col-xs-4">
										{{ HTML::image('assets/ntd/images/no-avatar.jpg') }}
									</div>
									<div class="col-xs-8">
										<div class="row td-info">
											<div class="col-xs-5">
												Ứng viên
											</div>
											<div class="col-xs-7">
												{{ $resume->ntv->first_name }} {{ $resume->ntv->last_name }}
											</div>
										</div>
										<div class="row td-info">
											<div class="col-xs-5">
												Ngày sinh
											</div>
											<div class="col-xs-7">
												{{ $resume->ntv->date_of_birth }}
											</div>
										</div>
										<div class="row td-info">
											<div class="col-xs-5">
												Quốc tịch
											</div>
											<div class="col-xs-7">
												Việt Nam
											</div>
										</div>
										<div class="row td-info">
											<div class="col-xs-5">
												Giới tính
											</div>
											<div class="col-xs-7">
												@if($resume->ntv->gender == 1)
												Nam
												@elseif($resume->ntv->gender == 2)
												Nữ
												@else 
												Không công khai
												@endif
												 - 
												@if($resume->ntv->marital_status == 1)
												Độc thân
												@else
												Đã lập gia đình
												@endif
											</div>
										</div>
									</div>
								</div><!-- end .info left -->
								<div class="col-xs-7">
									<div class="buy-service">
										<div class="row buy-header">
											<div class="col-xs-9">
												Để xem hồ sơ hoàn chỉnh của ứng viên, quý khách vui lòng sử dụng dịch vụ "tìm hồ sơ"
											</div>
											<div class="col-xs-3 pull-right">
												<a href="{{ URL::route('employers.orders.add') }}" class="btn btn-nomal bg-orange pull-right">Mua dịch vụ</a>
											</div>
										</div>
										<div class="row buy-information">
											<div class="col-xs-6">
												<h5 class="information-title">
													Miền Nam: 
												</h5>
												<div class="row">
													<div class="col-xs-4">Địa chỉ:</div>
													<div class="col-xs-8">06 Trần Phú - Đà Nẵng - Việt Nam</div>
													<div class="col-xs-4">Điện thoại:</div>
													<div class="col-xs-8">(084.8) 3828 6060</div>
													<div class="col-xs-4">Fax:</div>
													<div class="col-xs-8">(084.8) 3824 1866</div>
												</div>
												
											</div>
											<div class="col-xs-6">
												<h5 class="information-title">
													Miền Bắc: 
												</h5>
												<div class="row">
													<div class="col-xs-4">Địa chỉ:</div>
													<div class="col-xs-8">06 Trần Phú - Đà Nẵng - Việt Nam</div>
													<div class="col-xs-4">Điện thoại:</div>
													<div class="col-xs-8">(084.8) 3828 6060</div>
													<div class="col-xs-4">Fax:</div>
													<div class="col-xs-8">(084.8) 3824 1866</div>
												</div>
											</div>
										</div>
									</div>
								</div><!-- end .package right -->
							</div> <!-- end .row top -->
						</div>
					</div> <!-- end .row info -->
					<div class="row info-content">
						<div class="heading-title">
							<span>Thông tin nghề nghiệp</span>
						</div>
						<div class="list-info">
							<div class="info-left">Năm kinh nghiệm</div>
							<div class="info-right">@if($resume->namkinhnghiem == 0) Chưa có kinh nghiệm @else {{ $resume->namkinhnghiem }} Năm @endif</div>
						</div>
						<div class="list-info">
							<div class="info-left">Cấp bậc hiện tại</div>
							<div class="info-right">{{ $resume->level->name }}</div>
						</div>
						<div class="list-info">
							<div class="info-left">Bằng cấp cao nhất</div>
							<div class="info-right">{{ $resume->bangcap->name }}</div>
						</div>
						<div class="list-info">
							<div class="info-left">Ngoại ngữ</div>
							<div class="info-right">
								@if(count($resume->cvlanguage))
								@foreach($resume->cvlanguage as $lang)
									{{ $lang->lang->lang_name }} - {{ $lang->lvlang->name }}<br>
								@endforeach
								@endif
							</div>
						</div>
						<div class="list-info">
							<div class="info-left">Cấp bậc mong muốn</div>
							<div class="info-right">{{ $resume->capbac->name }}</div>
						</div>
						<div class="list-info">
							<div class="info-left">Mức lương mong muốn</div>
							<div class="info-right">{{ $resume->mucluong }} USD</div>
						</div>
						<div class="list-info">
							<div class="info-left">Ngành nghề mong muốn</div>
							<div class="info-right">
								@if(count($resume->cvcategory))
								@foreach($resume->cvcategory as $cat)
									{{ $cat->category->cat_name }}<br>
								@endforeach
								@endif
							</div>
						</div>
						<div class="list-info">
							<div class="info-left">Địa điểm làm việc</div>
							<div class="info-right">
								@if(count($resume->location))
								@foreach($resume->location as $loc)
									{{ $loc->province->province_name }}<br>
								@endforeach
								@endif
							</div>
						</div>
						<div class="list-info">
							<div class="info-left">Hình thức</div>
							<div class="info-right">{{ $resume->worktype->name }}</div>
						</div>
						
					</div> <!-- end.info-content -->
					<div class="row info-content">
						<div class="heading-title">
							<span>Quá trình học vấn và bằng cấp</span>
						</div>
						@if(count($resume->education))
						@foreach($resume->education as $edu)
						<div class="list-info">
							<div class="info-left">{{ $edu->study_from }} - {{ $edu->study_to }}</div>
							<div class="info-right">
								<span class="info-school-name">{{ $edu->school }}</span><br>
								{{ $edu->edu->name }}<br>
								{{ nl2br($edu->achievement) }}<br>
								- Điểm: {{ $edu->diem->name }}<br>
								- Lĩnh vực nghiên cứu: {{ $edu->linhvuc->name }}
							</div>
						</div>
						@endforeach
						@endif
						

					</div><!-- end .info-content -->
					<div class="row info-content">
						<div class="heading-title">
							<span>Kinh nghiệm làm việc</span>
						</div>
						@if(count($resume->experience))
						@foreach($resume->experience as $exp)
						<div class="list-info">
							<div class="info-left">{{ $exp->from_date }}- {{ ($exp->to_date=='')?'Hiện nay':$exp->to_date }}</div>
							<div class="info-right">
								<span class="info-school-name">{{ $exp->company_name }}</span><br>
								{{ $exp->position }}<br>
								{{ nl2br($exp->job_detail) }}<br>
								- Lĩnh vực: {{ $exp->fieldofwork->name }}<br>
								- Chuyên ngành: {{ $exp->chuyennganh->name }}<br>
								- Cấp bậc: {{ $exp->capbac->name }}<br>
								@if($exp->salary != '')- Lương: {{ $exp->salary }}<br>@endif
							</div>
						</div>
						@endforeach
						@endif
						

					</div><!-- end .info-content -->
					<div class="row info-content">
						<div class="heading-title">
							<span>Kỹ năng</span>
						</div>
						@if(count($resume->kynang() ))
						@foreach($resume->kynang() as $kn)
						<div class="list-info">
							<div class="info-full">{{ $kn[0] }} ({{ Config::get('custom_kynang.kynang')[$kn[1]] }})</div>
						</div>
						@endforeach
						@endif
						

					</div><!-- end .info-content -->
					<div class="row box-footer">
						<div class="col-xs-12 info-action">
							<div class="pull-right">
								<ul>
									<li><a href="#">{{ HTML::image('assets/ntd/images/icon-save-cv.png') }} Lưu thư mục</a></li>
									<li><a href="#">{{ HTML::image('assets/ntd/images/icon-view-cv.png') }} Xem hồ sơ tương tự</a></li>
									<li><a href="#">{{ HTML::image('assets/ntd/images/icon-send-cv.png') }} Gửi hồ sơ</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</section>

	
</div>
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
	var saveFolder = function()
	{
		var where_cv = ($('#inputCreate').is(':checked'))?1:0;
		var cv_id = {{ $resume->id }};
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
		})
	}
	
	</script>
@stop