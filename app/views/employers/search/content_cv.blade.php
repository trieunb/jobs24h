 
@if($check_ok==1)
						<div class="row info-content">

							<div class="heading-title">
								<span>Thông tin cơ bản</span>
							</div>
							<div class="list-info">
								<div class="info-left">Họ và tên</div>
								<div class="info-right">{{ $resume->ntv->full_name() }}</div>
							</div>
							<div class="list-info">
								<div class="info-left">Email</div>
								<div class="info-right">{{ $resume->ntv->email }}</div>
							</div>
							<div class="list-info">
								<div class="info-left">Số điện thoại</div>
								<div class="info-right">{{ $resume->ntv->phone_number }}</div>
							</div>
							<div class="list-info">
								<div class="info-left">Ngày sinh</div>
								<div class="info-right">{{ $resume->ntv->date_of_birth }}</div>
							</div>

						</div>
						<!-- <div class="row info-content">					

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
										@if($lang->lang_id > 0)
										{{ $lang->lang->lang_name }} - {{ $lang->lvlang->name }}<br>
										@endif
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
								<div class="info-right">@if(@$resume->mucluong){{ $resume->mucluong() }} VND @else Thương lượng @endif</div>
							</div>
							<div class="list-info">
								<div class="info-left">Ngành nghề mong muốn</div>
								<div class="info-right">
									@if(count($resume->cvcategory))
									@foreach($resume->cvcategory as $cat)
										@if($cat->cat_id > 0)
										{{ $cat->category->cat_name }}<br>
										@endif
									@endforeach
									@endif
								</div>
							</div>
							<div class="list-info">
								<div class="info-left">Địa điểm làm việc</div>
								<div class="info-right">
									@if(count($resume->location))
									@foreach($resume->location as $loc)
										@if($loc->province_id > 0)
										{{ $loc->province->province_name }}<br>
										@endif
									@endforeach
									@endif
								</div>
							</div>
							<!-- <div class="list-info">
								<div class="info-left">Hình thức</div>
								<div class="info-right">{{ @$resume->worktype->name }}</div>
							</div>
							
						</div>    end.info-content -->

						<div class="row info-content">
							<div class="heading-title">
								<span>Định hướng nghề nghiệp</span>
							</div>
							@if(count($resume->dinhhuongnn ))
							 
							 
							<div class="list-info">
								<div class="info-full" style="    background: none">
									• {{nl2br($resume->dinhhuongnn)}}
								</div>
							 </div>
							@endif
						</div>
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
									@if(isset($edu->linhvuc->name))
									- Lĩnh vực nghiên cứu: {{ $edu->linhvuc->name }}
									@endif
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
									@if(isset($exp->fieldofwork->name))
									- Lĩnh vực: {{ $exp->fieldofwork->name }}<br>
									@endif
									@if(isset($exp->chuyennganh->name))
									- Chuyên ngành: {{ $exp->chuyennganh->name }}<br>
									@endif
									@if(isset($exp->capbac->name))
									- Cấp bậc: {{ $exp->capbac->name }}<br>
									@endif
									@if($exp->salary != '')- Lương: {{ $exp->salary() }}<br>@endif
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
									<div class="info-full">

									{{ $kn[0] }} ({{ Config::get('custom_kynang.kynang')[$kn[1]] }})
									</div>
								</div>
								@endforeach
							@endif
							

						</div><!-- end .info-content -->
@else
<div class="heading-title">
<div class="row buy-header">
	<div class="col-xs-9"><span>
		Để xem hồ sơ hoàn chỉnh của ứng viên, quý khách vui lòng sử dụng dịch vụ "tìm hồ sơ"</span>
	</div>
	<div class="col-xs-3 pull-right" style="margin-top: -4px;">
		<a href="{{ URL::route('employers.orders.add') }}" class="btn btn-nomal bg-orange pull-right">Mua dịch vụ</a>
	</div>
	 
</div>
 </div>

@endif
 