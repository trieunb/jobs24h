@extends('layouts.admin')
@section('title')Edit Resume @stop
@section('page-header')Chỉnh sửa hồ sơ @stop
@section('content')
	{{ Form::open(array('method'=>'PUT', 'action'=> array('admin.resumes.update', $resume->id), 'class'=>'form form-horizontal' ) ) }}
		@include('includes.notifications')
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Cho phép tìm kiếm:</label>
				<div class="col-sm-10">
					<div class="checkbox">
						<label>
							{{ Form::checkbox('is_publish', 1, $resume->is_public, array('class'=>'ace')) }}
							<span class="lbl">Cho phép nhà tuyển dụng tìm kiếm hồ sơ này</span>
						</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Ẩn nhà tuyển dụng:</label>
				<div class="col-sm-10">
					<div class="checkbox">
						<label>
							{{ Form::checkbox('is_visible', 1, $resume->is_visible, array('class'=>'ace')) }}
							<span class="lbl">Ẩn thông tin với danh sách nhà tuyển dụng bị chặn</span>
						</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Trạng thái:</label>
				<div class="col-sm-3">
					{{ Form::select('trangthai', array(1=>'KÍCH HOẠT', 2=>'CHƯA KÍCH HOẠT'), $resume->trangthai, array('class'=>'form-control') ) }}
				</div>
			</div>
		<div class="col-sm-12">
		<h2 class="alert alert-info">Thông Tin Chung</h2>
			<div class="form-group">
				<label for="inputEmail" class="col-sm-2 control-label">Email:</label>
				<div class="col-sm-8">
					{{ Form::email('email', $resume->ntv->email, array('autocomplete'=>'off', 'id'=>'email', 'required', 'class'=>'form-control', 'required', 'placeholder'=>'Nhập email người tìm việc') ) }}
					<div class="col-xs-6">
						<ul class="dropdown-menu email-result">
							
						</ul>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Tiêu đề Hồ sơ <abbr>*</abbr></label>
				<div class="col-sm-8">
					{{ Form::text('tieude', $resume->tieude_cv, array('class'=>'form-control', 'placeholder'=>'Ví dụ: CV Lập trình viên') ) }}
					<span class="error-message">{{$errors->first('tieude')}}</span>
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Số năm kinh nghiệm</label>
				<div class="col-sm-1">
					{{ Form::text('info_years_of_exp', $resume->namkinhnghiem, array('class'=>'form-control', 'placeholder'=>'Ví dụ: 1', 'id'=>'info_years_of_exp') ) }}
				</div>
				<div class="col-xs-3">
					<div class="checkbox">
						<label>
							{{ Form::checkbox('info_years_of_exp', $resume->namkinhnghiem, ($resume->namkinhnghiem>0)?0:1, array('class'=>'ace', 'id'=>'info_years_of_exp') ) }}
							<span class="lbl"> Chưa có kinh nghiệm</span>
						</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Bằng cấp cao nhất <abbr>*</abbr></label>
				<div class="col-sm-3">
					{{ Form::select('info_highest_degree', Education::lists('name', 'id'), $resume->bangcapcaonhat, array('class'=>'form-control') ) }}
					<span class="error-message">{{$errors->first('info_highest_degree')}}</span>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-12 row fr-lang lang block">
					<label class="col-sm-2 control-label">Ngoại ngữ <abbr>*</abbr></label>
					<div class="col-sm-2">
						{{ Form::select('foreign_languages_1', array(""=>"- Vui lòng chọn -")+Language::lists('lang_name', 'id'),$resume->cvlanguage[0]->lang_id, array('class'=>'foreign_languages_1 form-control', 'id' => 'ForeignLanguages') ) }}
					</div>
					<label class="col-sm-2 control-label">Trình độ</label>
					<div class="col-sm-2 row">
						{{ Form::select('level_languages_1', array(""=>"- Vui lòng chọn -")+LevelLang::lists('name', 'id'),$resume->cvlanguage[0]->level, array('class'=>'level_languages_1 form-control', 'id' => 'Level') ) }}
					</div>
					<span class="error-message">{{$errors->first('foreign_languages_1')}}</span>
				</div>
				<div class="col-sm-12 row fr-lang lang hidden-xs">
					<label class="col-sm-2 control-label"></label>
					<div class="col-sm-2">
						{{ Form::select('foreign_languages_2', array("0"=>"- Vui lòng chọn -")+Language::lists('lang_name', 'id'),$resume->cvlanguage[1]->lang_id, array('class'=>'foreign_languages_2 form-control', 'id' => 'ForeignLanguages') ) }}
					</div>
					<label class="col-sm-2 control-label">Trình độ</label>
					<div class="col-sm-2 row">
						{{ Form::select('level_languages_2', array("0"=>"- Vui lòng chọn -")+LevelLang::lists('name', 'id'),$resume->cvlanguage[1]->level, array('class'=>'level_languages_2 form-control', 'id' => 'Level') ) }}
					</div>
				</div>
				<div class="col-sm-12 row fr-lang lang hidden-xs">
					<label class="col-sm-2 control-label"></label>
					<div class="col-sm-2">
						{{ Form::select('foreign_languages_3', array("0"=>"- Vui lòng chọn -")+Language::lists('lang_name', 'id'),$resume->cvlanguage[2]->lang_id, array('class'=>'foreign_languages_3 form-control', 'id' => 'ForeignLanguages') ) }}
					</div>
					<label class="col-sm-2 control-label">Trình độ</label>
					<div class="col-sm-2 row">
						{{ Form::select('level_languages_3', array("0"=>"- Vui lòng chọn -")+LevelLang::lists('name', 'id'),$resume->cvlanguage[2]->level, array('class'=>'level_languages_3 form-control', 'id' => 'Level') ) }}
					</div>
				</div>
				
		  	</div>





			
			
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Công ty gần đây</label>
				<div class="col-sm-8">
					{{ Form::input('text', 'info_latest_company', $resume->ctyganday, array('class'=>'form-control', 'placeholder'=>'Ví dụ: Minh Phúc Telecom') ) }}
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Công việc gần đây</label>
				<div class="col-sm-8">
					{{ Form::input('text', 'info_latest_job', $resume->cvganday, array('class'=>'form-control', 'placeholder'=>'Ví dụ: Lập trình viên') ) }}
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Cấp bậc hiện tại <abbr>*</abbr></label>
				<div class="col-sm-3">
					{{ Form::select('info_current_level', Level::lists('name', 'id'), $resume->capbachientai, array('class'=>'form-control') ) }}
					<span class="error-message">{{$errors->first('info_current_level')}}</span>
				</div>
				<label for="input" class="col-sm-2 control-label">Cấp bậc mong muốn <abbr>*</abbr></label>
				<div class="col-sm-3">
					{{ Form::select('info_wish_level', Level::lists('name', 'id'), $resume->capbacmongmuon, array('class'=>'form-control') ) }}
					<span class="error-message">{{$errors->first('info_wish_level')}}</span>
				</div>
			</div>
			
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Nơi làm việc <abbr>*</abbr></label>
				<div class="col-sm-3">
					{{ Form::select('info_wish_place_work[]', Province::lists('province_name', 'id'), $resume->arrayLocation(), array('multiple'=>'multiple', 'class'=>'chosen-select form-control tag-input-style', 'data-placeholder'=>'Chọn nơi làm việc, tối đa 3 địa điểm') ) }}
					<span class="error-message">{{$errors->first('info_wish_level')}}</span>
				</div>
				<label for="input" class="col-sm-2 control-label">Ngành nghề <abbr>*</abbr></label>
				<div class="col-sm-3">
					{{ Form::select('info_category[]', Category::getList(), $resume->arrayCategory(), array('multiple'=>'multiple', 'class'=>'chosen-select form-control tag-input-style', 'data-placeholder'=>'Chọn ngành nghề, tối đa 3 ngành') ) }}
					<span class="error-message">{{$errors->first('info_category')}}</span>
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Mức lương mong muốn:</label>
				<div class="col-sm-2">
					{{ Form::text('specific_salary', $resume->mucluong ) }}
				</div>
				<div class="col-xs-1">
					<label>
					{{ Form::select('loaitien', array(1=>'VND'), $resume->loaitien, array('class'=>'form-control','id'=>'loaitien' ) ) }}
				</div>
				<div class="col-xs-3">
					<div class="checkbox">
						<label>
							{{ Form::checkbox('specific_salary_radio', 1, ($resume->mucluong>0)?0:1, array('class'=>'ace', 'id'=>'is_mucluong') ) }}
							<span class="lbl"> Thương lượng</span>
						</label>
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-12">
		<h2 class="alert alert-info">Định Hướng Nghề Nghiệp</h2>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Mục tiêu NN:</label>
			<div class="col-sm-8">
				{{ Form::textarea('introduct_yourself', $resume->dinhhuongnn, array('class'=>'form-control', 'rows'=>'5', 'placeholder'=>'Định hướng nghề nghiệp trong tương lai', 'maxlength'=>'5000') ) }}
				<em class="text-gray-light job_detail">5000 ký tự có thể nhập thêm</em>
				<span class="error-message">{{$errors->first('introduct_yourself')}}</span>
			</div>
		</div>
		</div>
		<div class="col-sm-12">
			<h2 class="alert alert-info">Kinh Nghiệm Làm Việc</h2>
			@if(count($resume->experience))
				<?php $n = 1;?>
				@foreach($resume->experience as $exp)
				<div class="items block" id="saveWorkExp_{{$n}}">
					<div class="form-horizontal" id="saveWorkExp">
					<div class="form-group">
						<label for="" class="col-sm-2 control-label">Chức danh <abbr>*</abbr></label>
						<div class="col-sm-8">
							{{Form::input('text','position', $exp->position, array('class'=>'position form-control'))}}
							<span class="error-message">{{$errors->first('position')}}</span>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-2 control-label">Công ty <abbr>*</abbr></label>
						<div class="col-sm-8">
							{{Form::input('text', 'company_name', $exp->company_name, array('class'=>'company_name form-control'))}}
							<span class="error-message">{{$errors->first('company_name')}}</span>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-2 control-label">Từ tháng <abbr>*</abbr></label>
								<div class="col-sm-2">
									<div class="input-group input-group-sm">
										{{Form::input('text','from_date', $exp->from_date, array('id'=>'datepicker','class'=>'hasDatepicker form-control', 'placeholder'=>'Ví dụ: 04/2012','data-date-format'=>'MM-YYYY'))}}
										<span class="input-group-addon">
											<i class="ace-icon fa fa-calendar"></i>
										</span>
									</div>
					                <span class="error-message">{{$errors->first('from_date')}}</span>
								</div>
								<label for="" class="col-sm-2 control-label">Đến tháng <abbr>*</abbr></label>
								<div class="col-sm-2">
									<div class="input-group input-group-sm">
										{{Form::input('text','to_date', $exp->to_date, array('id'=>'datepicker','class'=>'hasDatepicker form-control', 'placeholder'=>'Ví dụ: 04/2012','data-date-format'=>'MM-YYYY'))}}
										<span class="input-group-addon">
											<i class="ace-icon fa fa-calendar"></i>
										</span>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="checkbox">
										<label>
											{{Form::checkbox('is-current-job', null, null, array('class' => 'is_current_job'))}}
											Công việc hiện tại
										</label>
									</div>
								</div>
							</div>
							
				            <div class="form-group">
				            	<label class="col-sm-2 control-label">Mô tả <abbr>*</abbr></label>
				            	<div class="col-sm-8">
									{{Form::textarea( 'job_detail', $exp->job_detail, array('class'=>'job_detail form-control keyup', 'rows'=>'5', 'maxlength'=>'5000'))}}
									<em class="text-gray-light job_detail">5000 ký tự có thể nhập thêm</em>
									<span class="error-message">{{$errors->first('job_detail')}}</span>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-8">
									{{Form::button('Xóa', array('class'=>'btn btn-lg bg-gray-light delete-exp', 'data' => $exp->id))}}
									{{Form::input('hidden', 'id_exp', $exp->id, array('class'=>'id_exp form-control'))}}
								</div>
							</div>
							</div>
							</div>
							<?php $n+=1;?>
						@endforeach

						@else 
			
							<?php $n = 1;?>
							<div class="items block" id="saveWorkExp_{{$n}}">
								<div class="form-horizontal" id="saveWorkExp">
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Chức danh <abbr>*</abbr></label>
									<div class="col-sm-8">
										{{Form::input('text','position', null, array('class'=>'position form-control'))}}
										<span class="error-message">{{$errors->first('position')}}</span>
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Công ty <abbr>*</abbr></label>
									<div class="col-sm-8">
										{{Form::input('text', 'company_name', null, array('class'=>'company_name form-control'))}}
										<span class="error-message">{{$errors->first('company_name')}}</span>
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Từ tháng <abbr>*</abbr></label>
									<div class="col-sm-2">
										<div class="input-group input-group-sm">
											{{Form::input('text','from_date', $exp->from_date, array('id'=>'datepicker','class'=>'hasDatepicker form-control', 'placeholder'=>'Ví dụ: 04/2012','data-date-format'=>'MM-YYYY'))}}
											<span class="input-group-addon">
												<i class="ace-icon fa fa-calendar"></i>
											</span>
										</div>
						                <span class="error-message">{{$errors->first('from_date')}}</span>
									</div>
									<label for="" class="col-sm-2 control-label">Đến tháng <abbr>*</abbr></label>
									<div class="col-sm-2">
										<div class="input-group input-group-sm">
											{{Form::input('text','to_date', $exp->to_date, array('id'=>'datepicker','class'=>'hasDatepicker form-control', 'placeholder'=>'Ví dụ: 04/2012','data-date-format'=>'MM-YYYY'))}}
											<span class="input-group-addon">
												<i class="ace-icon fa fa-calendar"></i>
											</span>
										</div>
									</div>
									<div class="col-sm-2">
										<div class="checkbox">
											<label>
												{{Form::checkbox('is-current-job', null, null, array('class' => 'is_current_job'))}}
												Công việc hiện tại
											</label>
										</div>
									</div>
								</div>
					            <div class="form-group">
					            	<label class="col-sm-2 control-label">Mô tả <abbr>*</abbr></label>
					            	<div class="col-sm-8">
										{{Form::textarea( 'job_detail', null, array('class'=>'job_detail form-control keyup', 'rows'=>'5', 'maxlength'=>'5000'))}}
										<em class="text-gray-light job_detail">5000 ký tự có thể nhập thêm</em>
										<span class="error-message">{{$errors->first('job_detail')}}</span>
									</div>
								</div>
								</div>
							</div>
						@endif
					</div>
					<div class="col-sm-12">
					<h2 class="alert alert-info">Học Vấn Và Bằng Cấp</h2>
					@if(count($resume->education))
				
						<?php $n = 1;?>
						@foreach($resume->education as $education)
						<div class="items block" id="saveEducation_{{$n}}">	
							<div class="form-horizontal" id="saveEducation">
							<div class="form-group">
								<label class="col-sm-2 control-label">Chuyên ngành <abbr>*</abbr></label>
				            	<div class="col-sm-8">
				            		{{Form::input('text', 'specialized', $education->specialized, array('class'=>'specialized form-control', 'placeholder'=>'Ví dụ: Kinh doanh quốc tế'))}}
				            		<span class="error-message">{{$errors->first('specialized')}}</span>
				            	</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Trường <abbr>*</abbr></label>
				            	<div class="col-sm-4">
				            		{{Form::input('text', 'school', $education->school, array('class'=>'school form-control', 'placeholder'=>'Ví dụ: Đại học Kinh Tế Tp.Hồ Chí Minh'))}}
				            		<span class="error-message">{{$errors->first('school')}}</span>
				            	</div>
				            	<label class="col-sm-2 control-label">Bằng cấp <abbr>*</abbr></label>
				            	<div class="col-sm-2">
				            		{{ Form::select('level', array(''=>'- Vui lòng chọn -')+Education::lists('name', 'id'),$education->level, array('class'=>'level form-control', 'id' => 'Diploma') ) }}
				            		<span class="error-message">{{$errors->first('level')}}</span>
				            	</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Từ tháng</label>
				            	<div class="col-sm-2">
				            		<div class="input-group input-group-sm">
											{{Form::input('text','study_from', $education->study_from, array('id'=>'datepicker','class'=>'hasDatepicker form-control', 'placeholder'=>'Ví dụ: 04/2012','data-date-format'=>'MM-YYYY'))}}
											<span class="input-group-addon">
												<i class="ace-icon fa fa-calendar"></i>
											</span>
										</div>
				            	</div>
				            	<label class="col-sm-2 control-label">Đến tháng</label>
				            	<div class="col-sm-2">
				            		<div class="input-group input-group-sm">
											{{Form::input('text','study_to', $education->study_to, array('id'=>'datepicker','class'=>'hasDatepicker form-control', 'placeholder'=>'Ví dụ: 04/2012','data-date-format'=>'MM-YYYY'))}}
											<span class="input-group-addon">
												<i class="ace-icon fa fa-calendar"></i>
											</span>
										</div>
				            	</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Xếp loại <abbr>*</abbr></label>
				            	<div class="col-sm-3">
				            		{{ Form::select('average_grade_id', array(''=>'- Vui lòng chọn -')+AverageGrade::lists('name', 'id'),$education->average_grade_id, array('class'=>'average_grade_id form-control', 'id' => 'AverageGrade') ) }}
				            		<span class="error-message">{{$errors->first('average_grade_id')}}</span>
				            	</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Thành tựu</label>
								<div class="col-sm-8">
									{{Form::textarea( 'achievement', $education->achievement, array('class'=>'achievement form-control keyup', 'rows'=>'5', 'maxlength'=>'5000'))}}
									<em class="text-gray-light achievement">5000 ký tự có thể nhập thêm</em>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-8">
									{{Form::button('Xóa', array('class'=>'btn btn-lg bg-gray-light delete-education', 'data' => $education->id))}}
									{{Form::input('hidden', 'id_edu', $education->id, array('class'=>'id_edu form-control'))}}
								</div>
							</div>
							</div>
						</div>
						<?php $n+= 1;?>
						@endforeach
				@else
				
						<?php $n = 1;?>
						<div class="items block" id="saveEducation_{{$n}}">
						<div class="form-horizontal" id="saveEducation">
							<div class="form-group">
								<label class="col-sm-2 control-label">Chuyên ngành <abbr>*</abbr></label>
				            	<div class="col-sm-8">
				            		{{Form::input('text', 'specialized', null, array('class'=>'specialized form-control', 'placeholder'=>'Ví dụ: Kinh doanh quốc tế'))}}
				            		<span class="error-message">{{$errors->first('specialized')}}</span>
				            	</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Trường <abbr>*</abbr></label>
				            	<div class="col-sm-4">
				            		{{Form::input('text', 'school', null, array('class'=>'school form-control', 'placeholder'=>'Ví dụ: Đại học Kinh Tế Tp.Hồ Chí Minh'))}}
				            		<span class="error-message">{{$errors->first('school')}}</span>
				            	</div>
				            	<label class="col-sm-2 control-label">Bằng cấp<abbr>*</abbr></label>
				            	<div class="col-sm-2">
				            		{{ Form::select('level', array(''=>'- Vui lòng chọn -')+Education::lists('name', 'id'),null, array('class'=>'level form-control', 'id' => 'Diploma') ) }}
				            		<span class="error-message">{{$errors->first('level')}}</span>
				            	</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Từ tháng</label>
				            	<div class="col-sm-2">
				            		<div class="input-group input-group-sm">
											{{Form::input('text','study_from', $education->study_from, array('id'=>'datepicker','class'=>'hasDatepicker form-control', 'placeholder'=>'Ví dụ: 04/2012','data-date-format'=>'MM-YYYY'))}}
											<span class="input-group-addon">
												<i class="ace-icon fa fa-calendar"></i>
											</span>
										</div>
				            	</div>
				            	<label class="col-sm-2 control-label">Đến tháng</label>
				            	<div class="col-sm-2">
				            		<div class="input-group input-group-sm">
											{{Form::input('text','study_to', $education->study_to, array('id'=>'datepicker','class'=>'hasDatepicker form-control', 'placeholder'=>'Ví dụ: 04/2012','data-date-format'=>'MM-YYYY'))}}
											<span class="input-group-addon">
												<i class="ace-icon fa fa-calendar"></i>
											</span>
										</div>
				            	</div>
							</div>
							<div class="form-group">
				            	<label class="col-sm-2 control-label">Xếp loại<abbr>*</abbr></label>
				            	<div class="col-sm-3">
				            		{{ Form::select('average_grade_id', array(''=>'- Vui lòng chọn -')+AverageGrade::lists('name', 'id'),null, array('class'=>'average_grade_id form-control', 'id' => 'AverageGrade') ) }}
				            		<span class="error-message">{{$errors->first('average_grade_id')}}</span>
				            	</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Thành tựu</label>
								<div class="col-sm-8">
									{{Form::textarea( 'achievement', null, array('class'=>'achievement form-control keyup', 'rows'=>'5', 'maxlength'=>'5000'))}}
									<em class="text-gray-light achievement">5000 ký tự có thể nhập thêm</em>
								</div>
							</div>
						</div>
						</div>
					@endif	
				</div>
				<div class="col-sm-12">
					<?php
					$skills = json_decode($resume->kynang);
					?>
					<h2 class="alert alert-info">Kỹ Năng</h2>
					<a class="pull-right text-blue add-new-skill"><i class="fa fa-plus-circle"></i> Thêm mới</a>
					<div class="col-sm-offset-2 col-sm-6">
						<div class="col-sm-7"><h4 class="text-gray-light">Kỹ năng</h4></div>
						<div class="col-sm-5"><h4 class="text-gray-light">Mức độ thành thạo</h4></div>
						<div class="box">
							<div class="form-horizontal" id="saveSkills">
								@if(count($skills) > 0)
									@for ($i=0; $i < count($skills) ; $i++)
										<div class='form-group'>
										<div class='col-sm-7'>
											{{Form::input('text', 'skills[]', $skills[$i][0], array('class'=>'skill form-control'))}}
										</div>
										<div class='col-sm-5'>
											{{Form::select('level_skills[]', array(''=>'- Vui lòng chọn -','0'=>'Sơ cấp','1'=>'Trung cấp','2'=>'Cao cấp'), $skills[$i][1], array('class'=>'level_skill form-control', 'id'=>'LevelSkill'))}}
										</div>
										</div>
									@endfor
								@else
								<div class="form-group">
									<div class="col-sm-7">
										{{Form::input('text', 'skills[]', null, array('class'=>'skill form-control'))}}
									</div>
									<div class="col-sm-5">
										{{Form::select('level_skills[]', array(''=>'- Vui lòng chọn -','0'=>'Sơ cấp','1'=>'Trung cấp','2'=>'Cao cấp'),null, array('class'=>'level_skill form-control', 'id'=>'LevelSkill'))}}
									</div>
								</div>
								@endif
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
						
		<div class="form-group" style="border-top: 5px solid #D9EDF7; margin-top:20px; padding-top:35px;">
			<div class="col-sm-offset-5">
				<button type="submit" class="btn btn-primary">Lưu tất cả thay đổi</button>
			</div>
		</div>
	{{ Form::close() }}
@stop

@section('style')
	<!-- page specific plugin styles -->
	{{ HTML::style('assets/css/jquery-ui.custom.min.css') }}
	{{ HTML::style('assets/css/chosen.min.css') }}
	{{ HTML::style('assets/css/datepicker.min.css') }}
	{{ HTML::style('assets/css/bootstrap-timepicker.min.css') }}
	{{ HTML::style('assets/css/daterangepicker.min.css') }}
	{{ HTML::style('assets/css/bootstrap-datetimepicker.min.css') }}
	{{ HTML::style('assets/css/colorpicker.min.css') }}
	{{ HTML::style('assets/css/bootstrap-switch.css') }}
	<style type="text/css">
	.chosen-container-multi .chosen-choices li.search-choice .search-choice-close {
		background: 0 0;
	}
	.tags {
		width: 100%;
	}
	</style>

@stop

@section('script')

	{{ HTML::script('assets/js/bootstrap-tag.min.js') }}
	{{ HTML::script('assets/js/jquery.ui.touch-punch.min.js') }}
	{{ HTML::script('assets/js/chosen.jquery.min.js') }}
	{{ HTML::script('assets/js/fuelux.spinner.min.js') }}
	{{ HTML::script('assets/js/bootstrap-datepicker.min.js') }}
	{{ HTML::script('assets/js/bootstrap-timepicker.min.js') }}
	{{ HTML::script('assets/js/moment.min.js') }}
	{{ HTML::script('assets/js/daterangepicker.min.js') }}
	{{ HTML::script('assets/js/bootstrap-datetimepicker.min.js') }}
	{{ HTML::script('assets/js/bootstrap-colorpicker.min.js') }}
	{{ HTML::script('assets/js/jquery.knob.min.js') }}
	{{ HTML::script('assets/js/jquery.autosize.min.js') }}
	{{ HTML::script('assets/js/jquery.inputlimiter.1.3.1.min.js') }}
	{{ HTML::script('assets/js/jquery.maskedinput.min.js') }}
	{{ HTML::script('assets/js/bootstrap-tag.min.js') }}
	{{ HTML::script('assets/js/bootstrap-switch.min.js') }}
	{{ HTML::script('assets/js/typeahead.jquery.min.js') }}
	{{ HTML::script('assets/js/jquery.cookie.js') }}
	{{ HTML::script('ace/assets/js/main.js') }}
@stop

@section('custom-script')
	<script type="text/javascript">
			jQuery(function($) {
				if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true, max_selected_options: 3}); 
					//resize the chosen on window resize
			
			
					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-1').addClass('tag-input-style');
						 else $('#form-field-select-1').removeClass('tag-input-style');
					});
				}
				$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				$('#spinner1').ace_spinner({value:{{ $resume->mucluong }},min:0,max:10000,step:50, touch_spinner: true, icon_up:'ace-icon fa fa-caret-up bigger-110', icon_down:'ace-icon fa fa-caret-down bigger-110',btn_up_class:'btn-info' , btn_down_class:'btn-info'});


				var tag_input = $('#form-field-tags');
				try{
					tag_input.tag(
					  {
						placeholder:tag_input.attr('placeholder')
					  }
					)
					var $tag_obj = $('#form-field-tags').data('tag');
					
				}
				catch(e) {
				
				}
				$("#switch-status").bootstrapSwitch({
					onText: 'Activated',
					offText: 'Unactivated',
					offColor: 'danger'
				});
				
				$('#email').keyup(function() {
					var query = $('#email').val();
					if(query != '')
					{
						$('#email').trigger('focus');
						$.ajax({
							url: '{{ URL::route('resumes.search') }}',
							data: {query: query},
							type: 'POST',
							dataType: 'json',
							success:function(json)
							{
								$('.email-result').html('');
								if(json.length > 0) {
									$.each(json, function(index, val) {
										newVal = val.replace(query, '<b>'+query+'</b>');
										$('.email-result').append('<li><a href="#" class="set_email" onclick="return false;">'+newVal+'</a></li>');
									});
								} else {
									$('.email-result').append('<li><a href="#" class="">Không có kết quả !</a></li>');
								}
								
								
							}
						});
					}
					
				});
				$(document).on('click', 'a.set_email', function(event) {
					var email = $(this).text();
					$('#email').val(email);
					
						$('#email').trigger('blur');
					
				});
				function setEmail(email)
				{
					alert('a');
					$('#email').val(email);
					
				}
				$('#email').blur(function() {
					setTimeout(function function_name (argument) {
						$('.email-result').css({'display': 'none'});
					}, 200);
				});
				
				$('#email').focus(function() {
					if($('#email').val() == '') return;
					$('.email-result').css({'display': 'block'});
				});
				
				var is_mucluong = {{ ($resume->mucluong)?0:1 }};
				if(is_mucluong)
				{
					$('#spinner1').prop({disabled: 'disabled'});
					$('#loaitien').prop({disabled: 'disabled'});
					$('.spinbox-up').addClass('disabled');
					$('.spinbox-down').addClass('disabled');
				}

				$('#is_mucluong').click(function(event) {
					if($(this).is(':checked'))
					{
						$('#spinner1').prop({disabled: 'disabled'});
						$('#loaitien').prop({disabled: 'disabled'});
						$('.spinbox-up').addClass('disabled');
						$('.spinbox-down').addClass('disabled');
					} else {
						$('#spinner1').prop({disabled: ''});
						$('#loaitien').prop({disabled: ''});
						$('.spinbox-up').removeClass('disabled');
						$('.spinbox-down').removeClass('disabled');
					}
				});

				var is_namkn = {{ ($resume->namkinhnghiem)?0:1 }};
				if(is_namkn)
				{
					$('#namkinhnghiem').prop({disabled: 'disabled'});
				}
				$('#is_namkn').click(function(event) {
					if($(this).is(':checked'))
					{
						$('#namkinhnghiem').prop({disabled: 'disabled'});
						$('#namkinhnghiem').val('0');
					} else {
						$('#namkinhnghiem').prop({disabled: ''});
					}
				});
			});
		</script>

@stop