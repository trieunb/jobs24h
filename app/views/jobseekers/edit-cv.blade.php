@extends('layouts.jobseeker')
@section('title') Chỉnh sửa thông tin hồ sơ @stop
@section('content')

	<div class="container">
		@include('includes.jobseekers.breadcrumb')
	</div>
	<section class="main-content container single-post">
		<section id="content" class="col-sm-9">
				<div class="box form-horizontal">
					<div class="col-sm-2">
						<label class="control-label">Tiêu đề hồ sơ<abbr>*</abbr></label>	
					</div>
					<div class="col-sm-10 form-horizontal">
						{{Form::input('text', 'tieude', $my_resume->tieude_cv, array('class'=>'tieude form-control'))}}
						<small class="legend">Nhập vị trí hoặc chức danh. Ví dụ Kế toán trường, Web desginer</small>
					</div>
					<div class="clearfix"></div>
					<div class="col-sm-3 push-top">
						<div class="avatar">
							@if($user->avatar !=null)
								{{ HTML::image('uploads/jobseekers/avatar/'.$user->avatar.'') }}
							@else
								{{ HTML::image('assets/images/logo.png') }}
							@endif
						</div>
					</div>
					<div class="col-sm-9 push-top">
						<div class="profile">
							<h2>{{$user->first_name}} {{$user->last_name}}</h2>
							<p>Điện thoại: <span class="text-blue">{{$user->phone_number}}</span></p>
							<p>Email: <span class="text-blue">{{$user->email}}</span></p>
							<p>Hồ Sơ: <a href="{{URL::route('jobseekers.view-resume', array($my_resume->id))}}" class="text-blue" target="_blank">{{URL::route('jobseekers.view-resume', array($my_resume->id))}}</a></p>
						</div>
					</div>
					<div class="clearfix"></div>
						<div class="complete-profile col-sm-8">
							<div class="col-sm-7 ">
								{{Form::checkbox('is_publish', 1, 'checked', array('class'=>'is_publish'))}}
								Cho phép tìm kiếm hồ sơ này
							</div>
						</div>
						<div class="print-trash col-sm-4">
							<a id="print"><i class="glyphicon glyphicon-print"></i></a>	
							<a id="del_resume" data-rs="{{$id_cv}}"><i class="glyphicon glyphicon-trash"></i></a>
							<div class="trangthai">
							@if($my_resume->trangthai == 1)
								<p><h3 class="text-green">Hồ sơ đang hoạt động</h3></p>
							@elseif($my_resume->trangthai == 2)
								<p><h3 class="text-silver">Hồ sơ đang chờ phê duyệt</h3></p>
							@else
							{{Form::button('Đăng Hồ Sơ', array('class'=>'btn btn-lg bg-orange publish_resume', 'data-rs'=> $id_cv))}}
							@endif
							</div>
						</div>
						<div class="modal fade delete_rs" id="delete_rs_{{$id_cv}}">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-body">
											<p>Khi bị xóa, hồ sơ không thể phục hồi lại được. Bạn có thực sự muốn xóa hồ sơ "@if(count($my_resume)>0)@if($my_resume->tieude_cv != '') {{$my_resume->tieude_cv}} @else {{$my_resume->created_at}}_{{$my_resume->ntv->first_name}}{{$my_resume->ntv->last_name}} @endif @endif"?</p>
										</div>
										<div class="modal-footer">
											{{Form::button('Hủy', array('class'=>'btn btn-default', 'data-dismiss'=>'modal'))}}
											{{Form::button('Xóa', array('class'=>'del-rs btn bg-orange'))}}
										</div>
									</div><!-- /.modal-content -->
								</div><!-- /.modal-dialog -->
							</div><!-- /.modal -->
				</div><!-- Box -->
				<div class="boxed">
				<div class="rows">
					<div class="title-page">
						<h2>Thông tin cá nhân</h2> 
						<!--<a href="#" class=" pull-right"><i class="fa fa-edit"></i> Chỉnh sửa</a>-->
					</div>
						{{Form::open(array('class'=>'form-horizontal', 'id'=>'saveBasicInfo'))}}
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Ngày sinh<abbr>*</abbr></label>
								<div class="col-sm-3">
									<div class="input-group date" id="DOB">
					                  {{Form::input('text','date_of_birth', date('m-d-Y',strtotime($user->date_of_birth)), array('class'=>'date_of_birth form-control','placeholder'=>'DD-MM-YYYY','data-date-format'=>'DD-MM-YYYY'))}}
					                    <span class="input-group-addon have-img">
					                    	{{HTML::image('assets/images/calendar.png')}}
					                    </span>
					                </div>
								</div>
								<label for="" class="col-sm-3 control-label">Giới tính<abbr>*</abbr></label>
								<div class="col-sm-3">
									<div class="radio">
										<label>
											{{Form::radio('gender',0, $user->gender, array('checked'=>'checked', 'class'=>'gender'))}}
											Nam
										</label>
										<label>
											{{Form::radio('gender',1, $user->gender, array('class'=>'gender'))}}
											Nữ
										</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Tình trạng hôn nhân</label>
								<div class="col-sm-3">
									<div class="radio">
										<label>
											{{Form::radio('marital_status',0, $user->marital_status,array('checked'=>'checked', 'class'=>'marital_status'))}}
											Độc thân
										</label>
										<label>
											{{Form::radio('marital_status',1, $user->marital_status, array('class'=>'marital_status'))}}
											Đã kết hôn
										</label>
									</div>
								</div>
								<label for="" class="col-sm-3 control-label">Quốc tịch<abbr>*</abbr></label>
								<div class="col-sm-3">
									{{ Form::select('nationality_id', Country::lists('country_name', 'id'),$user->nationality_id, array('class'=>'nationality_id form-control', 'id' => 'Nationality') ) }}
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Địa chỉ</label>
								<div class="col-sm-9">
									{{Form::input('text', 'address', $user->address, array('class'=>'address form-control'))}}
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Quốc gia</label>
								<div class="col-sm-3">
									{{ Form::select('country_id', Country::lists('country_name', 'id'),$user->country_id, array('class'=>'country_id form-control', 'id' => 'Country') ) }}
								</div>
								<label for="" class="col-sm-3 control-label">Tỉnh/Thành phố<abbr>*</abbr></label>
								<div class="col-sm-3">
										{{ Form::select('province_id', array(''=>'Vui lòng chọn')+Province::lists('province_name', 'id'),$user->province_id, array('class'=>'province_id form-control', 'id' => 'Cities') ) }}
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Quận/Huyện</label>
								<div class="col-sm-3">
								@if($user->district_id != '')
									{{ Form::select('district_id', array(''=>'Vui lòng chọn')+ $districts ,$user->district_id, array('class'=>'district_id form-control', 'id' => 'District') ) }}
								@elseif($districts != null)
									{{ Form::select('district_id', $districts , null, array('class'=>'district_id form-control', 'id' => 'District') ) }}
								@else
									{{ Form::select('district_id',[], null, array('class'=>'district_id form-control', 'id' => 'District', 'disabled') ) }}									
								@endif
								</div>
								<label for="" class="col-sm-3 control-label">Điện thoại
								<abbr>*</abbr></label>
								<div class="col-sm-3">
									{{Form::input('text', 'phone_number', $user->phone_number, array('class'=>'phone_number form-control'))}}
								</div>
							</div>
							<div class="form-group">
									<div class="checkbox col-sm-offset-2 col-sm-10">
										<label>
											{{Form::checkbox('hide_info_with_ntd', 1, $user->is_publish, array('class'=>'hide_info_with_ntd'))}}
											Ẩn thông tin này với nhà tuyển dụng
										</label>
									</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-7">
									{{Form::submit('Lưu', array('class'=>'btn btn-lg bg-orange'))}}
									<span>(<span class="text-red">*</span>) Thông tin bắt buộc</span>
								</div>
							</div>
						{{Form::close()}}
				</div><!-- rows -->
				</div><!-- boxed -->
				<div class="boxed">
				<div class="rows">
					<div class="title-page">
						<h2>Thông tin chung</h2> 
						<!--<a href="#" class=" pull-right"><i class="fa fa-edit"></i> Chỉnh sửa</a>-->
					</div>
					{{Form::open(array('class'=>'form-horizontal','id'=>'saveGeneralInfo'))}}
						<?php 
							$location_arr = array();
							$categories = array();
				        	if(count($my_resume->location) > 0){
				        		foreach ($my_resume->location as $value) {
				        			$location_arr[] = $value->province_id;
				        		}
				        	}else{
				            	$location_arr[] = null;
				            }
				            if(count($my_resume->cvcategory) > 0){
				        		foreach ($my_resume->cvcategory as $value) {
				        			$categories[] = $value->cat_id;
				        		}
				        	}else{
				            	$categories[] = null;
				            }
				        ?>
						<div class="form-group">
			                <label class="col-sm-3 control-label">Số năm kinh nghiệm<abbr>*</abbr></label>
			                <div class="col-sm-3">
			                	<?php if ($my_resume->namkinhnghiem == 0){$namkinhnghiem = null;}else{$namkinhnghiem= $my_resume->namkinhnghiem;}?>
			                	{{Form::input('text', 'info_years_of_exp', $namkinhnghiem, array('class'=>'info_years_of_exp form-control', 'maxlength'=>'2', 'placeholder'=>'Ví dụ 2'))}} 
			                </div>
			                <div class="col-sm-6">
			                    <div class="checkbox">
			                    	<label>
			                    		{{Form::checkbox('info_years_of_exp', 0, null, array('class'=>'default_years_of_exp'))}}
			                    		  Tôi mới tốt nghiệp/chưa có kinh nghiệm làm việc
			                    	</label>
			                    </div>
			                </div>
			            </div>
			            <div class="form-group">
			            	<label class="col-sm-3 control-label">Bằng cấp cao nhất<abbr>*</abbr></label>
			            	<div class="col-sm-3">
			            		{{ Form::select('info_highest_degree',array(''=>'- Vui lòng chọn -')+Education::lists('name', 'id'),$my_resume->bangcapcaonhat, array('class'=>'info_highest_degree form-control', 'id' => 'HighestDegree') ) }}
			            	</div>
			            </div>
			            <div class="form-group">
			            	<div class="row fr-lang lang block">
				            	<label class="col-sm-3 control-label">Ngoại ngữ<abbr>*</abbr></label>
				            	<div class="col-sm-3">
				            		{{ Form::select('foreign_languages_1', array(""=>"- Vui lòng chọn -")+Language::lists('lang_name', 'id'),$my_resume->cvlanguage[0]->lang_id, array('class'=>'foreign_languages_1 form-control', 'id' => 'ForeignLanguages') ) }}
				            	</div>
				            	<label class="col-sm-3 control-label">Trình độ</label>
				            	<div class="col-sm-3 row">
				            		{{ Form::select('level_languages_1', array(""=>"- Vui lòng chọn -")+LevelLang::lists('name', 'id'),$my_resume->cvlanguage[0]->level, array('class'=>'level_languages_1 form-control', 'id' => 'Level') ) }}
				            	</div>
			            	</div>
			            	<div class="row fr-lang lang hidden-xs">
				            	<label class="col-sm-3 control-label"></label>
				            	<div class="col-sm-3">
				            		{{ Form::select('foreign_languages_2', array("0"=>"- Vui lòng chọn -")+Language::lists('lang_name', 'id'),$my_resume->cvlanguage[1]->lang_id, array('class'=>'foreign_languages_2 form-control', 'id' => 'ForeignLanguages') ) }}
				            	</div>
				            	<label class="col-sm-3 control-label">Trình độ</label>
				            	<div class="col-sm-3 row">
				            		{{ Form::select('level_languages_2', array("0"=>"- Vui lòng chọn -")+LevelLang::lists('name', 'id'),$my_resume->cvlanguage[1]->level, array('class'=>'level_languages_2 form-control', 'id' => 'Level') ) }}
				            	</div>
				            	<div class="col-sm-1">
		                            <div class="fa fa-remove text-red remove-fr-lang"></div>
		                        </div>
			            	</div>
			            	<div class="row fr-lang lang hidden-xs">
				            	<label class="col-sm-3 control-label"></label>
				            	<div class="col-sm-3">
				            		{{ Form::select('foreign_languages_3', array("0"=>"- Vui lòng chọn -")+Language::lists('lang_name', 'id'),$my_resume->cvlanguage[2]->lang_id, array('class'=>'foreign_languages_3 form-control', 'id' => 'ForeignLanguages') ) }}
				            	</div>
				            	<label class="col-sm-3 control-label">Trình độ</label>
				            	<div class="col-sm-3 row">
				            		{{ Form::select('level_languages_3', array("0"=>"- Vui lòng chọn -")+LevelLang::lists('name', 'id'),$my_resume->cvlanguage[2]->level, array('class'=>'level_languages_3 form-control', 'id' => 'Level') ) }}
				            	</div>
				            	<div class="col-sm-1">
		                            <div class="fa fa-remove text-red remove-fr-lang"></div>
		                        </div>
			            	</div>

			            	<!--<label class="col-sm-3 control-label">Chứng chỉ liên quan<abbr>*</abbr></label>
			            	<div class="col-sm-3">
			            		{{ Form::select('certificate', Country::lists('country_name', 'id'),null, array('class'=>'form-control', 'id' => 'Certificate') ) }}
			            	</div>-->
			            	
			            	<div class="col-sm-offset-3 col-sm-7 add-language-button-wrapper">
			            		<a class="text-blue add-new-fr-lang"><i class="fa fa-plus-circle"></i> Thêm mới</a>
			            	</div>
			            </div>
			            <div class="form-group">
			            	<label class="col-sm-3 control-label">Công ty gần đây nhất</label>
			            	<div class="col-sm-9">
			            		{{Form::input('text', 'info_latest_company', $my_resume->ctyganday, array('class'=>'info_latest_company form-control'))}}
			            	</div>
			            </div>
			            <div class="form-group">
			            	<label class="col-sm-3 control-label">Công việc gần đây nhất</label>
			            	<div class="col-sm-3">
			            		{{Form::input('text', 'info_latest_job', $my_resume->cvganday, array('class'=>'info_latest_job form-control'))}}
			            	</div>
			            	<label class="col-sm-3 control-label">Cấp bậc hiện tại<abbr>*</abbr></label>
			            	<div class="col-sm-3">
			            		{{ Form::select('info_current_level', array(""=>"- Vui lòng chọn -")+Level::lists('name', 'id'),$my_resume->capbachientai, array('class'=>'info_current_level form-control', 'id' => 'CurrentLevel') ) }}
			            	</div>
			            </div>
			            <div class="form-group">
			            	<label class="col-sm-3 control-label">Vị trí mong muốn<abbr>*</abbr></label>
			            	<div class="col-sm-3">
			            		{{Form::input('text', 'info_wish_position', $my_resume->vitrimongmuon, array('class'=>'info_wish_position form-control'))}}
			            	</div>
			            	<label class="col-sm-3 control-label">Cấp bậc mong muốn<abbr>*</abbr></label>
			            	<div class="col-sm-3">
			            		{{ Form::select('info_wish_level', array(""=>"- Vui lòng chọn -")+Level::lists('name', 'id'),$my_resume->capbacmongmuon, array('class'=>'info_wish_level form-control', 'id' => 'WishLevel') ) }}
			            	</div>
			            </div>
			            <div class="form-group">
				            <label class="col-sm-3 control-label">Nơi làm việc<abbr>*</abbr></label>
				            	<div class="col-sm-3">
				 
			            		{{Form::select('info_wish_place_work', Province::lists('province_name', 'id'), $location_arr, array('class'=>'info_wish_place_work form-control chosen-select', 'id' => 'WishPlaceWork', 'multiple'=>'true','data-placeholder'=>'VD: Hồ Chí Minh') )}}
				            		<small class="legend">(Tối đa 3 địa điểm mong muốn)</small>
			            		</div>
			            	<label class="col-sm-3 control-label">Ngành nghề<abbr>*</abbr></label>
			            	<div class="col-sm-3">
			            		{{Form::select('info_category', Category::getList(),$categories, array('class'=>'info_category form-control chosen-select categories', 'id'=>'categoryMainSearch', 'multiple'=>'true','data-placeholder'=>'VD: Kế toán','multiple'))}}
			            	</div>
			            </div>
			            <div class="form-group">
			                <label class="col-sm-3 control-label">Mức lương mong muốn<abbr>*</abbr></label>
							<div class="radio col-sm-4">
				                	<div for="specific-salary">
				                		<?php 
				                		if($my_resume->mucluong != 0)
				                		{$mucluong = number_format($my_resume->mucluong);$check='checked';}
				                		else{$mucluong=null;$checked='a';}
				                		?>
				                    	{{Form::radio('specific_salary_radio', $mucluong, '$mucluong', array('id'=>'specific-salary'))}}
				                        {{Form::input('text','specific_salary', $mucluong, array('class'=>'specific_salary form-control edit-control text-blue','id'=>'specific-salary-input', 'placeholder'=>'Ví dụ: 8.000.000', 'disabled'))}}
				                    	<span>VND / tháng</span>
				                    </div>
								</div>
				                <div class="radio col-sm-2">
				                    {{Form::radio('specific_salary_radio',0, '$mucluong', array('id'=>'specific-salary-0'))}}
				                    <span>Thương lượng </span>
				                </div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-7">
								{{Form::submit('Lưu', array('class'=>'btn btn-lg bg-orange'))}}
								<span>(<span class="text-red">*</span>) Thông tin bắt buộc</span>
							</div>
						</div>	
					{{Form::close()}}
				</div><!-- rows -->
				</div><!-- boxed -->
				<div class="boxed" id="box-dinhhuongnn">
				<div class="rows">
					<div class="title-page">
						<h2>Định hướng nghề nghiệp</h2>
					</div>
					<label><abbr>*</abbr> Giới Thiệu Bản Thân Và Miêu Tả Mục Tiêu Nghề Nghiệp Của Bạn</label>
					{{Form::open(array('id'=>'saveCareerGoal'))}}
						<div class="form-group">
							{{Form::textarea( 'introduct_yourself', $my_resume->dinhhuongnn, array('class'=>'form-control introduct_yourself', 'rows'=>'5'))}}
							<em class="text-gray-light"><span class="countdown">5000</span> ký tự có thể nhập thêm</em>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-7">
								@if($my_resume->dinhhuongnn != null)
								{{Form::button('Xóa', array('class'=>'btn btn-lg bg-gray-light delete-dhnn', 'data' => $my_resume->id))}}
								@else
								{{Form::button('Hủy', array('class'=>'btn btn-lg bg-gray-light cancel-dhnn'))}}
								@endif
								{{Form::submit('Lưu', array('class'=>'btn btn-lg bg-orange'))}}
								<span>(<span class="text-red">*</span>) Thông tin bắt buộc</span>
							</div>
						</div>
					{{Form::close()}}
				</div><!-- rows -->
				</div><!-- boxed -->
				@if(count($my_resume->experience))
				<div class="boxed" id="box-exp">
					<div class="rows">
						<div class="title-page">
							<h2>Kinh nghiệm làm việc</h2>
							<a class="add-new-work-exp pull-right italic text-blue"><i class="fa fa-plus"></i> Bổ sung</a>
						</div>
							<?php $n = 1;?>
							@foreach($my_resume->experience as $exp)
							<div class="items block" id="saveWorkExp_{{$n}}">
								<div class="view-edit">
									<h2>{{$exp->position}}</h2>
									<a class="edit-exp pull-right italic text-blue"><i class="fa fa-edit"></i> Chỉnh sửa</a>
									<h4>{{$exp->company_name}}</h4>
									<p><i>{{$exp->job_detail}}</i></p>	
								</div>

							{{Form::open(array('class'=>'form-horizontal hidden', 'id'=>'saveWorkExp'))}}
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Chức danh<abbr>*</abbr></label>
								<div class="col-sm-10">
									{{Form::input('text','position', $exp->position, array('class'=>'position form-control'))}}
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Công ty<abbr>*</abbr></label>
								<div class="col-sm-10">
									{{Form::input('text', 'company_name', $exp->company_name, array('class'=>'company_name form-control'))}}
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Từ tháng<abbr>*</abbr></label>
								<div class="col-sm-3">
									<div class="input-group date" id="From_date">
					                    {{Form::input('text','from_date', $exp->from_date, array('class'=>'from_date form-control', 'placeholder'=>'Ví dụ: 09/2008','data-date-format'=>'MM-YYYY'))}}
					                    <span class="input-group-addon have-img">
					                    	{{HTML::image('assets/images/calendar.png')}}
					                    </span>
					                </div>
								</div>
								<label for="" class="col-sm-2 control-label">Đến tháng<abbr>*</abbr></label>
								<div class="col-sm-3">
									<div class="input-group date" id="To_date">
					                    {{Form::input('text','to_date', $exp->to_date, array('class'=>'to_date form-control', 'placeholder'=>'Ví dụ: 04/2012','data-date-format'=>'MM-YYYY'))}}
					                    <span class="input-group-addon have-img">
					                    	{{HTML::image('assets/images/calendar.png')}}
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
				            	<label class="col-sm-2 control-label">Lĩnh vực</label>
				            	<div class="col-sm-4">
				            		{{ Form::select('field',array(''=>'- Vui lòng chọn -')+FieldsInWorkExp::lists('name', 'id'),$exp->field, array('class'=>'field form-control', 'id' => 'Fields') ) }}
				            	</div>
				            	<label class="col-sm-2 control-label">Chuyên ngành</label>
				            	<div class="col-sm-4">
				            		{{ Form::select('specialized', array(''=>'- Vui lòng chọn -')+Specialized::lists('name', 'id'),$exp->specialized, array('class'=>'specialized form-control', 'id' => 'Specialized') ) }}
				            	</div>
				            </div>
				            <div class="form-group">
				            	<label class="col-sm-2 control-label">Cấp bậc<abbr>*</abbr></label>
				            	<div class="col-sm-4">
				            		{{ Form::select('level', array(''=>'- Vui lòng chọn -')+Level::lists('name', 'id'),$exp->level, array('class'=>'level form-control', 'id' => 'LatestLevel') ) }}
				            	</div>
				            	<label class="col-sm-2 control-label">Mức lương</label>
				            	<div class="col-sm-4">
				            		<?php if($exp->salary != '') $exp->salary = number_format($exp->salary);?>
				            		{{Form::input('text', 'salary', $exp->salary, array('class'=>'salary form-control'))}}
				            	</div>
				            </div>
				            <div class="form-group">
				            	<label class="col-sm-2 control-label">Mô tả<abbr>*</abbr></label>
				            	<div class="col-sm-10">
									{{Form::textarea( 'job_detail', $exp->job_detail, array('class'=>'job_detail form-control', 'rows'=>'5'))}}
									<em class="text-gray-light"><span class="countdown">5000</span> ký tự có thể nhập thêm</em>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									{{Form::button('Hủy', array('class'=>'btn btn-lg bg-gray-light hidden-form-exp', 'data' => $exp->id))}}
									{{Form::button('Xóa', array('class'=>'btn btn-lg bg-gray-light delete-exp', 'data' => $exp->id))}}
									{{Form::submit('Lưu', array('class'=>'btn btn-lg bg-orange'))}}
									<span>(<span class="text-red">*</span>) Thông tin bắt buộc</span>
									{{Form::input('hidden', 'id_exp', $exp->id, array('class'=>'id_exp form-control'))}}
				            		{{ Form::select('field_list',array(''=>'- Vui lòng chọn -')+FieldsInWorkExp::lists('name', 'id'),null, array('class'=>'field_list form-control hidden-xs') ) }}
				            		{{ Form::select('specialized_list', array(''=>'- Vui lòng chọn -')+Specialized::lists('name', 'id'),null, array('class'=>'specialized_list form-control hidden-xs') ) }}
				            		{{ Form::select('level_list', array(''=>'- Vui lòng chọn -')+Level::lists('name', 'id'),null, array('class'=>'level_list form-control hidden-xs') ) }}
								</div>
							</div>
							{{Form::close()}}
							</div>
							<?php $n+=1;?>
						@endforeach
					</div><!-- rows -->
				</div><!-- boxed -->
				@else 
				<div class="boxed" id="box-exp">
					<div class="rows">
						<div class="title-page">
							<h2>Kinh nghiệm làm việc</h2>
							<a class="add-new-work-exp pull-right italic text-blue hidden"><i class="fa fa-plus"></i> Bổ sung</a>
						</div>
							<?php $n = 1;?>
							<div class="items block" id="saveWorkExp_{{$n}}">
							{{Form::open(array('class'=>'form-horizontal', 'id'=>'saveWorkExp'))}}
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Chức danh<abbr>*</abbr></label>
								<div class="col-sm-10">
									{{Form::input('text','position', null, array('class'=>'position form-control'))}}
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Công ty<abbr>*</abbr></label>
								<div class="col-sm-10">
									{{Form::input('text', 'company_name', null, array('class'=>'company_name form-control'))}}
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Từ tháng<abbr>*</abbr></label>
								<div class="col-sm-3">
									<div class="input-group date" id="From_date">
					                    {{Form::input('text','from_date', null, array('class'=>'from_date form-control', 'placeholder'=>'Ví dụ: 09/2008','data-date-format'=>'MM-YYYY'))}}
					                    <span class="input-group-addon have-img">
					                    	{{HTML::image('assets/images/calendar.png')}}
					                    </span>
					                </div>
								</div>
								<label for="" class="col-sm-2 control-label">Đến tháng<abbr>*</abbr></label>
								<div class="col-sm-3">
									<div class="input-group date" id="To_date">
					                    {{Form::input('text','to_date', null, array('class'=>'to_date form-control', 'placeholder'=>'Ví dụ: 04/2012','data-date-format'=>'MM-YYYY'))}}
					                    <span class="input-group-addon have-img">
					                    	{{HTML::image('assets/images/calendar.png')}}
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
				            	<label class="col-sm-2 control-label">Lĩnh vực</label>
				            	<div class="col-sm-4">
				            		{{ Form::select('field',array(''=>'- Vui lòng chọn -')+FieldsInWorkExp::lists('name', 'id'),null, array('class'=>'field form-control', 'id' => 'Fields') ) }}
				            	</div>
				            	<label class="col-sm-2 control-label">Chuyên ngành</label>
				            	<div class="col-sm-4">
				            		{{ Form::select('specialized', array(''=>'- Vui lòng chọn -')+Specialized::lists('name', 'id'),null, array('class'=>'specialized form-control', 'id' => 'Specialized') ) }}
				            	</div>
				            </div>
				            <div class="form-group">
				            	<label class="col-sm-2 control-label">Cấp bậc<abbr>*</abbr></label>
				            	<div class="col-sm-4">
				            		{{ Form::select('level', array(''=>'- Vui lòng chọn -')+Level::lists('name', 'id'),null, array('class'=>'level form-control', 'id' => 'LatestLevel') ) }}
				            	</div>
				            	<label class="col-sm-2 control-label">Mức lương</label>
				            	<div class="col-sm-4">
				            		{{Form::input('text', 'salary', null, array('class'=>'salary form-control'))}}
				            	</div>
				            </div>
				            <div class="form-group">
				            	<label class="col-sm-2 control-label">Mô tả<abbr>*</abbr></label>
				            	<div class="col-sm-10">
									{{Form::textarea( 'job_detail', null, array('class'=>'job_detail form-control', 'rows'=>'5'))}}
									<em class="text-gray-light"><span class="countdown">5000</span> ký tự có thể nhập thêm</em>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-7">
									{{Form::button('Hủy', array('class'=>'btn btn-lg bg-gray-light cancel-exp'))}}
									{{Form::submit('Lưu', array('class'=>'btn btn-lg bg-orange'))}}
									<span>(<span class="text-red">*</span>) Thông tin bắt buộc</span>
									{{ Form::select('field',array(''=>'- Vui lòng chọn -')+FieldsInWorkExp::lists('name', 'id'),null, array('class'=>'field_list form-control hidden-xs') ) }}
				            		{{ Form::select('specialized', array(''=>'- Vui lòng chọn -')+Specialized::lists('name', 'id'),null, array('class'=>'specialized_list form-control hidden-xs') ) }}
				            		{{ Form::select('level', array(''=>'- Vui lòng chọn -')+Level::lists('name', 'id'),null, array('class'=>'level_list form-control hidden-xs') ) }}
								</div>
							</div>
							{{Form::close()}}
							</div>
					</div><!-- rows -->
				</div><!-- boxed -->
				@endif
				@if(count($my_resume->education))
				<div class="boxed" id="box-education">
					<div class="rows">
						<div class="title-page">
							<h2>Học vấn và Bằng Cấp</h2>
							<a class="add-new-edu pull-right italic text-blue"><i class="fa fa-plus"></i> Bổ sung</a>
						</div>
						<?php $n = 1;?>
						@foreach($my_resume->education as $education)
						<div class="items block" id="saveEducation_{{$n}}">
							<div class="view-edit">
								<h2>{{$education->specialized}}</h2>
								<a class="edit-edu pull-right italic text-blue"><i class="fa fa-edit"></i> Chỉnh sửa</a>
								<h4>{{$education->school}}</h4>
								<p><i>{{$education->edu->name}}</i></p>
							</div>
							{{Form::open(array('class'=>'form-horizontal hidden','id'=>'saveEducation'))}}
							<div class="form-group">
								<label class="col-sm-3 control-label">Chuyên ngành<abbr>*</abbr></label>
				            	<div class="col-sm-9">
				            		{{Form::input('text', 'specialized', $education->specialized, array('class'=>'specialized form-control', 'placeholder'=>'Ví dụ: Kinh doanh quốc tế'))}}
				            	</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Trường<abbr>*</abbr></label>
				            	<div class="col-sm-4">
				            		{{Form::input('text', 'school', $education->school, array('class'=>'school form-control', 'placeholder'=>'Ví dụ: Đại học Kinh Tế Tp.Hồ Chí Minh'))}}
				            	</div>
				            	<label class="col-sm-2 control-label">Bằng cấp<abbr>*</abbr></label>
				            	<div class="col-sm-3">
				            		{{ Form::select('level', array(''=>'- Vui lòng chọn -')+Education::lists('name', 'id'),$education->level, array('class'=>'level form-control', 'id' => 'Diploma') ) }}
				            	</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Từ tháng</label>
				            	<div class="col-sm-4">
				            		<div class="input-group date" id="Study_from">
					                    {{Form::input('text','study_from', $education->study_from, array('class'=>'study_from form-control', 'placeholder'=>'Ví dụ: 09/2008','data-date-format'=>'MM-YYYY'))}}
					                    <span class="input-group-addon have-img">
					                    	{{HTML::image('assets/images/calendar.png')}}
					                    </span>
					                </div>
				            	</div>
				            	<label class="col-sm-2 control-label">Đến tháng</label>
				            	<div class="col-sm-3">
				            		<div class="input-group date" id="Study_to">
					                    {{Form::input('text','study_to', $education->study_to, array('class'=>'study_to form-control', 'placeholder'=>'Ví dụ: 04/2012','data-date-format'=>'MM-YYYY'))}}
					                    <span class="input-group-addon have-img">
					                    	{{HTML::image('assets/images/calendar.png')}}
					                    </span>
					                </div>
				            	</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Lĩnh vực nghiên cứu</label>
				            	<div class="col-sm-4">
				            		{{ Form::select('field_of_study', array(''=>'- Vui lòng chọn -')+FieldsInWorkExp::lists('name', 'id'),$education->field_of_study, array('class'=>'field_of_study form-control', 'id' => 'FieldOfStudy') ) }}
				            	</div>
				            	<label class="col-sm-2 control-label">Xếp loại<abbr>*</abbr></label>
				            	<div class="col-sm-3">
				            		{{ Form::select('average_grade_id', array(''=>'- Vui lòng chọn -')+AverageGrade::lists('name', 'id'),$education->average_grade_id, array('class'=>'average_grade_id form-control', 'id' => 'AverageGrade') ) }}
				            	</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Thành tựu</label>
								<div class="col-sm-9">
									{{Form::textarea( 'achievement', $education->achievement, array('class'=>'achievement form-control', 'rows'=>'5'))}}
									<em class="text-gray-light"><span class="countdown">5000</span> ký tự có thể nhập thêm</em>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									{{Form::button('Hủy', array('class'=>'btn btn-lg bg-gray-light hidden-form-edu', 'data' => $education->id))}}
									{{Form::button('Xóa', array('class'=>'btn btn-lg bg-gray-light delete-education', 'data' => $education->id))}}
									{{Form::submit('Lưu', array('class'=>'btn btn-lg bg-orange'))}}
									<span>(<span class="text-red">*</span>) Thông tin bắt buộc</span>
									{{Form::input('hidden', 'id_edu', $education->id, array('class'=>'id_edu form-control'))}}
									{{ Form::select('capbac_list', array(''=>'- Vui lòng chọn -')+Education::lists('name', 'id'),null, array('class'=>'hidden-xs capbac_list form-control') ) }}
									{{ Form::select('linhvuc_list', array(''=>'- Vui lòng chọn -')+FieldsInWorkExp::lists('name', 'id'),null, array('class'=>'hidden-xs linhvuc_list form-control') ) }}
									{{ Form::select('average_list', array(''=>'- Vui lòng chọn -')+AverageGrade::lists('name', 'id'),null, array('class'=>'hidden-xs average_list form-control') ) }}
								</div>
							</div>
						{{Form::close()}}
						</div>
						<?php $n+= 1;?>
						@endforeach
						
					</div><!-- rows -->
				</div><!-- boxed -->
				@else
				<div class="boxed" id="box-education">
					<div class="rows">
						<div class="title-page">
							<h2>Học vấn và Bằng Cấp</h2>
							<a class="add-new-edu pull-right italic text-blue hidden"><i class="fa fa-plus"></i> Bổ sung</a>
						</div>
						<?php $n = 1;?>
						<div class="items block" id="saveEducation_{{$n}}">
						{{Form::open(array('class'=>'form-horizontal','id'=>'saveEducation'))}}
							<div class="form-group">
								<label class="col-sm-3 control-label">Chuyên ngành<abbr>*</abbr></label>
				            	<div class="col-sm-9">
				            		{{Form::input('text', 'specialized', null, array('class'=>'specialized form-control', 'placeholder'=>'Ví dụ: Kinh doanh quốc tế'))}}
				            	</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Trường<abbr>*</abbr></label>
				            	<div class="col-sm-4">
				            		{{Form::input('text', 'school', null, array('class'=>'school form-control', 'placeholder'=>'Ví dụ: Đại học Kinh Tế Tp.Hồ Chí Minh'))}}
				            	</div>
				            	<label class="col-sm-2 control-label">Bằng cấp<abbr>*</abbr></label>
				            	<div class="col-sm-3">
				            		{{ Form::select('level', array(''=>'- Vui lòng chọn -')+Education::lists('name', 'id'),null, array('class'=>'level form-control', 'id' => 'Diploma') ) }}
				            	</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Từ tháng</label>
				            	<div class="col-sm-4">
				            		<div class="input-group date" id="Study_from">
					                    {{Form::input('text','study_from', null, array('class'=>'study_from form-control', 'placeholder'=>'Ví dụ: 09/2008','data-date-format'=>'MM-YYYY'))}}
					                    <span class="input-group-addon have-img">
					                    	{{HTML::image('assets/images/calendar.png')}}
					                    </span>
					                </div>
				            	</div>
				            	<label class="col-sm-2 control-label">Đến tháng</label>
				            	<div class="col-sm-3">
				            		<div class="input-group date" id="Study_to">
					                    {{Form::input('text','study_to', null, array('class'=>'study_to form-control', 'placeholder'=>'Ví dụ: 04/2012','data-date-format'=>'MM-YYYY'))}}
					                    <span class="input-group-addon have-img">
					                    	{{HTML::image('assets/images/calendar.png')}}
					                    </span>
					                </div>
				            	</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Lĩnh vực nghiên cứu</label>
				            	<div class="col-sm-4">
				            		{{ Form::select('field_of_study', array(''=>'- Vui lòng chọn -')+FieldsInWorkExp::lists('name', 'id'),null, array('class'=>'field_of_study form-control', 'id' => 'FieldOfStudy') ) }}
				            	</div>
				            	<label class="col-sm-2 control-label">Xếp loại<abbr>*</abbr></label>
				            	<div class="col-sm-3">
				            		{{ Form::select('average_grade_id', array(''=>'- Vui lòng chọn -')+AverageGrade::lists('name', 'id'),null, array('class'=>'average_grade_id form-control', 'id' => 'AverageGrade') ) }}
				            	</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Thành tựu</label>
								<div class="col-sm-9">
									{{Form::textarea( 'achievement', null, array('class'=>'achievement form-control', 'rows'=>'5'))}}
									<em class="text-gray-light"><span class="countdown">5000</span> ký tự có thể nhập thêm</em>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-7">
									{{Form::button('Hủy', array('class'=>'btn btn-lg bg-gray-light cancel-education'))}}
									{{Form::submit('Lưu', array('class'=>'btn btn-lg bg-orange'))}}
									<span>(<span class="text-red">*</span>) Thông tin bắt buộc</span>
									{{ Form::select('capbac_list', array(''=>'- Vui lòng chọn -')+Education::lists('name', 'id'),null, array('class'=>'hidden-xs capbac_list form-control') ) }}
									{{ Form::select('linhvuc_list', array(''=>'- Vui lòng chọn -')+FieldsInWorkExp::lists('name', 'id'),null, array('class'=>'hidden-xs linhvuc_list form-control') ) }}
									{{ Form::select('average_list', array(''=>'- Vui lòng chọn -')+AverageGrade::lists('name', 'id'),null, array('class'=>'hidden-xs average_list form-control') ) }}
								</div>
							</div>
						{{Form::close()}}
						</div>
					</div><!-- rows -->
				</div><!-- boxed -->
				@endif
				<?php
				$skills = json_decode($my_resume->kynang);
				?>
				<div class="boxed" id="box-skills">
					<div class="rows">
						<div class="title-page">
							<h2>Kỹ năng</h2>
							<a class="pull-right text-blue add-new-skill"><i class="fa fa-plus-circle"></i> Thêm mới</a>
						</div>
						<div class="col-sm-8"><h3 class="text-gray-light">Kỹ năng</h3></div>
						<div class="col-sm-4"><h3 class="text-gray-light">Mức độ thành thạo</h3></div>
						<div class="box">
							{{Form::open(array('class'=>'form-horizontal','id'=>'saveSkills'))}}
								@if(count($skills) > 0)
									@for ($i=0; $i < count($skills) ; $i++)
										<div class='form-group'>
										<div class='col-sm-8'>
											{{Form::input('text', 'skill-'.$i.'', $skills[$i][0], array('class'=>'skill form-control'))}}
										</div>
										<div class='col-sm-4'>
											{{Form::select('level_skill-'.$i.'', array(''=>'- Vui lòng chọn -','0'=>'Sơ cấp','1'=>'Trung cấp','2'=>'Cao cấp'), $skills[$i][1], array('class'=>'level_skill form-control', 'id'=>'LevelSkill'))}}
										</div>
										</div>
									@endfor
								@else
								<div class="form-group">
									<div class="col-sm-8">
										{{Form::input('text', 'skill-1', null, array('class'=>'skill form-control'))}}
									</div>
									<div class="col-sm-4">
										{{Form::select('level_skill-1', array(''=>'- Vui lòng chọn -','0'=>'Sơ cấp','1'=>'Trung cấp','2'=>'Cao cấp'),null, array('class'=>'level_skill form-control', 'id'=>'LevelSkill'))}}
									</div>
								</div>
								@endif
								<div class="form-submit">
									<div class="col-sm-offset-3 col-sm-7">
										{{Form::button('Hủy', array('class'=>'btn btn-lg bg-gray-light cancel-skill'))}}
										{{Form::submit('Lưu', array('class'=>'btn btn-lg bg-orange'))}}
									</div>
								</div>
							{{Form::close()}}
						</div>
					</div><!-- rows -->
				</div><!-- boxed -->
	</section>
	<aside id="sidebar" class="col-sm-3 pull-right">
		<div class="add-modules">
				<div class="col-sm-12 card-item alert-warning" id="link-box-dinhhuongnn">
					<div class="col-sm-1 col-xs-1">
	                	<div class="row">
	                        <a href="#" class="card-button bg-orange"><i class="glyphicon glyphicon-plus"></i></a>
	                    </div>
	                </div>
	                <div class="col-sm-2 col-xs-2 box-sm">
	                	<span class="fa-stack fa-lg">
	                		<i class="fa fa-circle fa-stack-2x text-orange"></i>
	                    	<i class="fa fa-user fa-stack-1x text-white"></i>
	                    </span>
	                </div>
	                <div class="col-sm-7 box-sm">
						<h4>Hồ Sơ/Mục Tiêu Nghề Nghiệp</h4>
	                </div>
	                <div class="col-sm-2 box-label warning"><strong>10%</strong></div>
	            </div> 
	            <div class="col-sm-12 card-item alert-info" id="link-box-exp">
					<div class="col-sm-1 col-xs-1">
	                	<div class="row">
	                        <a href="#" class="card-button bg-blue"><i class="glyphicon glyphicon-plus"></i></a>
	                    </div>
	                </div>
	                <div class="col-sm-2 col-xs-2 box-sm">
	                	<span class="fa-stack fa-lg">
	                		<i class="fa fa-circle fa-stack-2x text-blue"></i>
	                    	<i class="fa fa-bank fa-stack-1x text-white"></i>
	                    </span>
	                </div>
	                <div class="col-sm-7 box-sm">
						<h4>Kinh Nghiệm Làm Việc</h4>
	                </div>
	                <div class="col-sm-2 box-label primary"><strong>10%</strong></div>
	            </div> 
	            <div class="col-sm-12 card-item alert-success" id="link-box-education">
					<div class="col-sm-1 col-xs-1">
	                	<div class="row">
	                        <a href="#" class="card-button bg-green"><i class="glyphicon glyphicon-plus"></i></a>
	                    </div>
	                </div>
	                <div class="col-sm-2 col-xs-2 box-sm">
	                	<span class="fa-stack fa-lg">
	                		<i class="fa fa-circle fa-stack-2x text-green"></i>
	                    	<i class="fa fa-graduation-cap fa-stack-1x text-white"></i>
	                    </span>
	                </div>
	                <div class="col-sm-7 box-sm">
						<h4>Học Vấn Và Bằng Cấp</h4>
	                </div>
	                <div class="col-sm-2 box-label success"><strong>10%</strong></div>
	            </div> 
	            <div class="col-sm-12 card-item alert-danger" id="link-box-skills">
					<div class="col-sm-1 col-xs-1">
	                	<div class="row">
	                        <a href="#" class="card-button bg-red"><i class="glyphicon glyphicon-plus"></i></a>
	                    </div>
	                </div>
	                <div class="col-sm-2 col-xs-2 box-sm">
	                	<span class="fa-stack fa-lg">
	                		<i class="fa fa-circle fa-stack-2x text-red"></i>
	                    	<i class="fa fa-info fa-stack-1x text-white"></i>
	                    </span>
	                </div>
	                <div class="col-sm-7 box-sm">
						<h4>Kỹ Năng</h4>
	                </div>
	                <div class="col-sm-2 box-label danger"><strong>10%</strong></div>
	            </div> 
	            @if(count($camnang_ntv))
				<div class="widget row">
					<h3>Cẩm nang nghề nghiệp</h3>
					<ul>
						@foreach($camnang_ntv as $post)	
						<li>
							<div class="col-sm-3">{{$post->thumbnail}}</div>
							<div class="col-sm-9">
								<a href="#" class="text-blue">{{$post->title}}</a>
								<?php
									// strip tags to avoid breaking any html
									$string = $post->content;
									$string = strip_tags($string);

									if (strlen($string) > 50) {
									    // truncate string
									    $stringCut = substr($string, 0, 50);
									    // make sure it ends in a word so assassinate doesn't become ass...
									    $string = substr($stringCut, 0, strrpos($stringCut, ' ')); 
									}
									echo "<p>$string</p>";
								?>
							</div>
						</li>
						@endforeach
					</ul>
				</div>
				@endif
			</div>
		</aside>
		<div class="modal fade" id="modal-alert">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 class="modal-title text-align-center">Thông báo</h3>
					</div>
					<div class="modal-body">
						
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</section>

@stop

@section('scripts')
	
	<script type="text/javascript">
	$('#saveBasicInfo').submit(function(e){
        e.preventDefault();
        $('.loading-icon').show();
        url = '{{ URL::route("jobseekers.save-cv", array("basic", $id_cv )) }}';
        $.ajax({
            type: "POST",
            url: url,
          	dataType: 'json',
            data: {
            	date_of_birth: $('.date_of_birth').val(),
		        gender:$('.gender:checked').val(),
		        marital_status: $('.marital_status:checked').val(),
		        nationality_id: $('.nationality_id').val(),
		        address: $('.address').val(),
		        country_id: $('.country_id').val(),
		        province_id: $('.province_id').val(),
		        district_id: $('.district_id').val(),
		        phone_number: $('.phone_number').val(),
		        hide_info_with_ntd: $('.hide_info_with_ntd').val()
            },
            success : function(json){
            	if(! json.has)
            	{	
            		$('#saveBasicInfo').find(".alert-message").addClass('alert-ok').removeAttr('title').html('<i class="fa fa-check"></i>');
            		var j = $.parseJSON(json.message);
            		$.each(j, function(index, val) {
            			$('.'+index).closest('div[class^="col-sm"]').find(".alert-message").remove();
            			if($('.'+index).closest('div[class^="col-sm"]').find(".alert-message").length < 1){
		           			$('.'+index).closest('div[class^="col-sm"]').append('<abbr class="alert-message" title="'+val+'"><i class="fa fa-exclamation"></i></abbr>')
		            	}     		
            		});
            	}else{
            		$('#saveBasicInfo').find('.alert-message').remove();
            		$('#saveBasicInfo .date_of_birth').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#saveBasicInfo .gender:checked').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#saveBasicInfo .marital_status:checked').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#saveBasicInfo .nationality_id').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#saveBasicInfo .address').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#saveBasicInfo .country_id').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#saveBasicInfo .province_id').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#saveBasicInfo .district_id').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#saveBasicInfo .phone_number').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#saveBasicInfo .hide_info_with_ntd').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#modal-alert .modal-body').html('<p>Cập nhật <b>Thông Tin Cơ Bản</b> thành công</p><button type="button" class="btn btn-default" data-dismiss="modal">OK</button>');
					$('#modal-alert').modal('show');
            	}
            	$('.loading-icon').hide();
            }
        });    
    });

	$('#saveCareerGoal').submit(function(e){
        e.preventDefault();
        $('.loading-icon').show();
        url = '{{ URL::route("jobseekers.save-cv", array("career-goal", $id_cv )) }}';
        $.ajax({
            type: "POST",
            url: url,//Relative or absolute path to response.php file
          	dataType: 'json',
            data: { introduct_yourself: $('.introduct_yourself').val()},
            success : function(json){
            	if(! json.has)
            	{
            		$('#saveCareerGoal').find(".alert-message").addClass('alert-ok').removeAttr('title').html('<i class="fa fa-check"></i>');
            		var j = $.parseJSON(json.message);
            		$.each(j, function(index, val) {
	            		$('.'+index).closest('.form-group').find(".alert-message").remove();
            			if($('.'+index).closest('.form-group').find(".alert-message").length < 1){
		           			$('.'+index).closest('.form-group').append('<abbr class="alert-message" title="'+val+'"><i class="fa fa-exclamation"></i></abbr>')
		            	}      		
            		});
            	}else{
            		$('#saveCareerGoal').find(".alert-message").remove();
            		$('#saveCareerGoal .introduct_yourself').closest('.form-group').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#modal-alert .modal-body').html('<p>Cập nhật <b>Định Hướng Nghề Nghiệp</b> thành công</p><button type="button" class="btn btn-default" data-dismiss="modal">OK</button>');
					$('#modal-alert').modal('show');
            	}
            	$('.loading-icon').hide();
            }
        });    
    });

	
	$(document).on('click', '#saveWorkExp input[type="submit"]', function(e) {
		e.preventDefault();
		$('.loading-icon').show();
        var url = '{{ URL::route("jobseekers.save-cv", array("work-exp", $id_cv )) }}';
        var parent_name = $(this).closest('div[id^="saveWorkExp"]').attr('id');
        var salary = $('#'+parent_name).find('.salary').val();
        salary = salary.replace(/[,]/g, "");
		$.ajax({
			url: url,
			type: 'POST',
			dataType: 'json',
			data: {
				id_exp : $('#'+parent_name).find('.id_exp').val(),
				position: $('#'+parent_name).find('.position').val(),
				company_name: $('#'+parent_name).find('.company_name').val(),
				from_date: $('#'+parent_name).find('.from_date').val(),
				to_date: $('#'+parent_name).find('.to_date').val(),
				job_detail: $('#'+parent_name).find('.job_detail').val(),
				field: $('#'+parent_name).find('.field').val(),
				specialized: $('#'+parent_name).find('.specialized').val(),
				level: $('#'+parent_name).find('.level').val(),
				salary: salary
			},
			success : function(json) {
				if(! json.has)
	            {	
	            	$('#'+parent_name).find(".alert-message").addClass('alert-ok').removeAttr('title').html('<i class="fa fa-check"></i>');
	            	var j = $.parseJSON(json.message);
	            	$.each(j, function(index, val) {
      					$('#'+parent_name+' .'+index).closest('div[class^="col-sm"]').find(".alert-message").remove();
            			if($('#'+parent_name+' .'+index).closest('div[class^="col-sm"]').find(".alert-message").length < 1){
		           			$('#'+parent_name+' .'+index).closest('div[class^="col-sm"]').append('<abbr class="alert-message" title="'+val+'"><i class="fa fa-exclamation"></i></abbr>')
		            	}     
	           		});
	            }else{
	            	$('#'+parent_name).find(".alert-message").remove();
					$('#'+parent_name+' .position').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#'+parent_name+' .company_name').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#'+parent_name+' .from_date').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#'+parent_name+' .to_date').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#'+parent_name+' .job_detail').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#'+parent_name+' .field').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#'+parent_name+' .specialized').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#'+parent_name+' .level').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#'+parent_name+' .salary').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#modal-alert .modal-body').html('<p>Cập nhật <b>Kinh Nghiệm Làm Việc</b> thành công</p><button type="button" class="btn btn-default reload-page" data-dismiss="modal">OK</button>');
					$('#modal-alert').modal('show');
					$('#'+parent_name+' #saveWorkExp').addClass('hidden');
					$('#'+parent_name).append('<div class="view-edit"><h2>'+$("#"+parent_name+" .position").val()+'</h2><a class="edit-exp pull-right italic text-blue"><i class="fa fa-edit"></i> Chỉnh sửa</a><h4>'+$("#"+parent_name+" .company_name").val()+'</h4><p><i>'+$("#"+parent_name+" .job_detail").val()+'</i></p></div>');
					$('#box-exp .add-new-work-exp, .edit-exp').removeClass('hidden');
					$(document).on('click', '.reload-page', function(event) {
						event.preventDefault();
						location.reload();
					});
	           	}
	           	$('.loading-icon').hide();
	        }
		});		
	});

	$(document).on('submit', '#saveEducation', function(e) {
		e.preventDefault();
		$('.loading-icon').show();
        url = '{{ URL::route("jobseekers.save-cv", array("education-history", $id_cv )) }}';
        var parent_name = $(this).closest('div[id^="saveEducation"]').attr('id');
		$.ajax({
			url: url,
			type: 'POST',
			dataType: 'json',
			data: {
				id_edu: $(this).find('.id_edu').val(),
				school: $(this).find('.school').val(),
				field_of_study: $(this).find('.field_of_study').val(),
				level: $(this).find('.level').val(),
				study_from: $(this).find('.study_from').val(),
				study_to: $(this).find('.study_to').val(),
				achievement: $(this).find('.achievement').val(),
				specialized: $(this).find('.specialized').val(),
				average_grade_id: $(this).find('.average_grade_id').val()
			},
			success : function(json) {
				if(! json.has)
	            {	
	            	$('#'+parent_name).find(".alert-message").addClass('alert-ok').removeAttr('title').html('<i class="fa fa-check"></i>');
	            	var j = $.parseJSON(json.message);
	            	$.each(j, function(index, val) {
      					$('#'+parent_name+' .'+index).closest('div[class^="col-sm"]').find(".alert-message").remove();
            			if($('#'+parent_name+' .'+index).closest('div[class^="col-sm"]').find(".alert-message").length < 1){
		           			$('#'+parent_name+' .'+index).closest('div[class^="col-sm"]').append('<abbr class="alert-message" title="'+val+'"><i class="fa fa-exclamation"></i></abbr>')
		            	}     
	           		});
	            }else{
	           		$('#'+parent_name).find(".alert-message").remove();
					$('#'+parent_name+' .school').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#'+parent_name+' .field_of_study').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#'+parent_name+' .level').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#'+parent_name+' .study_from').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#'+parent_name+' .study_to').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#'+parent_name+' .achievement').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#'+parent_name+' .specialized').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#'+parent_name+' .average_grade_id').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');

					$('#modal-alert .modal-body').html('<p>Cập nhật <b>Học vấn bằng cấp</b> thành công</p><button type="button" class="btn btn-default reload-page" data-dismiss="modal">OK</button>');
					$('#modal-alert').modal('show');
					$('#'+parent_name+' #saveEducation').addClass('hidden');
					$('#'+parent_name).append('<div class="view-edit"><h2>'+$("#"+parent_name+" .specialized").val()+'</h2><a class="edit-edu pull-right italic text-blue"><i class="fa fa-edit"></i> Chỉnh sửa</a><h4>'+$("#"+parent_name+" .school").val()+'</h4><p><i>'+$("#"+parent_name+" .level option:selected").text()+'</i></p></div>');
					$('#box-exp .add-new-edu, .edit-edu').removeClass('hidden');
					$(document).on('click', '.reload-page', function(event) {
						event.preventDefault();
						location.reload();
					});
	           	}
	           	$('.loading-icon').hide();
	        }
		});		
	});
	
	$('#saveSkills').submit(function(e) {
		e.preventDefault();
		$('.loading-icon').show();
        url = '{{ URL::route("jobseekers.save-cv", array("skills", $id_cv )) }}';
      	var arr = [];
        $('#saveSkills .form-group').each(function() {
        	var skill =  $(this).find('.skill').val();
        	var level_skill =  $(this).find('.level_skill').val();
        		var row = [];
	        	row.push(skill);
			    row.push(level_skill);
			    arr.push(row);
        });

 		$.ajax({
 			url: url,
 			type: 'POST',
 			data: {skills: arr},
 			success : function(data){
 				$('.loading-icon').hide();
 				$('#modal-alert .modal-body').html('<p>Cập nhật <b>Kỹ Năng</b> thành công</p><button type="button" class="btn btn-default" data-dismiss="modal">OK</button>');
					$('#modal-alert').modal('show');
 			}
 		})
	});
	
	$('#saveGeneralInfo').submit(function(e) {
		e.preventDefault();
		$('.loading-icon').show();
		var a = $('.select2-selection__choice').html();
        url = '{{ URL::route("jobseekers.save-cv", array("general", $id_cv )) }}';
        var salary = $('#saveGeneralInfo .specific_salary').val();
        salary = salary.replace(/[,]/g, "");
		$.ajax({
			url: url,
			type: 'POST',
			dataType: 'json',
			data: {
				tieude: 				$('.tieude').val(),
				info_years_of_exp: 		$('#saveGeneralInfo .info_years_of_exp').val(),
				info_highest_degree: 	$('#saveGeneralInfo .info_highest_degree').val(),
				info_current_level: 	$('#saveGeneralInfo .info_current_level').val(),
				info_wish_position: 	$('#saveGeneralInfo .info_wish_position').val(),
				info_wish_level: 		$('#saveGeneralInfo .info_wish_level').val(),
				info_wish_place: 		$('#saveGeneralInfo .info_wish_place').val(),
				is_publish: 			$('.is_publish').val(),
				specific_salary: 		salary,
				info_latest_company: 	$('#saveGeneralInfo .info_latest_company').val(),
				info_latest_job: 		$('#saveGeneralInfo .info_latest_job').val(),
				info_category: 			$('#saveGeneralInfo .info_category').val(),
				info_wish_place_work: 	$('#saveGeneralInfo .info_wish_place_work').val(),
				foreign_languages_1: 	$('#saveGeneralInfo .fr-lang.block .foreign_languages_1').val(),
				foreign_languages_2: 	$('#saveGeneralInfo .fr-lang.block .foreign_languages_2').val(),
				foreign_languages_3: 	$('#saveGeneralInfo .fr-lang.block .foreign_languages_3').val(),
				level_languages_1: 		$('#saveGeneralInfo .fr-lang.block .level_languages_1').val(),
				level_languages_2: 		$('#saveGeneralInfo .fr-lang.block .level_languages_2').val(),
				level_languages_3: 		$('#saveGeneralInfo .fr-lang.block .level_languages_3').val(),

			},
			success : function(json) {
				if(! json.has)
	            {	
	            	var j = $.parseJSON(json.message);
	            	$.each(j, function(index, val) {
	            		$('.'+index).closest('div[class^="col-sm"]').find(".alert-message").remove();
		            	if($('.'+index).closest('div[class^="col-sm"]').find(".alert-message").length < 1){
		           			$('.'+index).closest('div[class^="col-sm"]').append('<abbr class="alert-message" title="'+val+'"><i class="fa fa-exclamation"></i></abbr>')
		            	}
		           		$('.loading-icon').hide();           		
	           		});
	            }else{
	            	$('#saveGeneralInfo').find(".alert-message").remove();
	           		$('.tieude').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#saveGeneralInfo .info_years_of_exp').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#saveGeneralInfo .info_highest_degree').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#saveGeneralInfo .info_current_level').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#saveGeneralInfo .info_wish_position').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#saveGeneralInfo .info_wish_level').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#saveGeneralInfo .info_wish_place').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#saveGeneralInfo #specific-salary-0').parents('.col-sm-2').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#saveGeneralInfo .info_latest_company').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#saveGeneralInfo .info_latest_job').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#saveGeneralInfo .info_category').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#saveGeneralInfo .info_wish_place_work').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#saveGeneralInfo .fr-lang.block .foreign_languages_1').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#saveGeneralInfo .fr-lang.block .foreign_languages_2').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#saveGeneralInfo .fr-lang.block .foreign_languages_3').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#saveGeneralInfo .fr-lang.block .level_languages_1').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#saveGeneralInfo .fr-lang.block .level_languages_2').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#saveGeneralInfo .fr-lang.block .level_languages_3').closest('div[class^="col-sm"]').append('<span class="alert-message alert-ok"><i class="fa fa-check"></i></span>');
					$('#modal-alert .modal-body').html('<p>Cập nhật <b>Thông Tin Chung</b> thành công</p><button type="button" class="btn btn-default" data-dismiss="modal">OK</button>');
					$('#modal-alert').modal('show');
					$('.publish_resume').removeAttr('disabled');
	           	}
	           	$('.loading-icon').hide();
	        }
		});		
	});
	// Del a resume in my-resume
	$(document).on('click','#del_resume',function(){
	        var data = $(this).attr('data-rs');
	        var url = '{{URL::route("jobseekers.my-resume")}}';
	        var result= '{{URL::route("jobseekers.my-resume")}}';
	        $('#delete_rs_'+data).modal('show');
	        $('.del-rs').click(function(e){
	            e.preventDefault();
	            $.ajax({
	                type: "GET",
	                url: url, //Relative or absolute path to response.php file
	                data: {is_delete: data },
	                success : function(data){
	                   window.location.replace(result);
	                }
	            });    
	        });
	    });

	$('#print').click(function(event) {
		event.preventDefault();
		//window.print();
	});

	$('.publish_resume').click(function(event) {
		event.preventDefault();
		var data = $(this).attr('data-rs');
		var url = '{{URL::route("jobseekers.my-resume")}}';
		if($('#saveGeneralInfo .info_highest_degree').val() != '' && $('#saveGeneralInfo .info_current_level').val() != '' && $('#saveGeneralInfo .info_wish_position').val() != '' && $('#saveGeneralInfo .info_wish_level').val() != '' && $('#saveGeneralInfo .info_category').val() != '' && $('#saveGeneralInfo .info_wish_place_work').val() != '' && $('#saveGeneralInfo .fr-lang.block .foreign_languages_1').val() != '' && $('.date_of_birth').val() != '' && $('.province_id').val() != '' && $('.phone_number').val() != ''){
			$.ajax({
		        type: "GET",
		        url: url, //Relative or absolute path to response.php file
		        data: {danghoso: data },
		        success : function(data){
		        	$('.trangthai').html('<p><h3>Hồ sơ đang chờ phê duyệt</h3></p>');
		        	window.location.replace('{{URL::route('jobseekers.view-resume', array($my_resume->id))}}');
		    	}
		    });  
		}else{
			$('#modal-alert .modal-body').html('<p>Vui lòng cập nhật đầy đủ thông tin</p><button type="button" class="btn btn-default reload-page" data-dismiss="modal">OK</button>');
			$('#modal-alert').modal('show');
		}
		
	});
	
	//scroll to div in edit cv
    function goToByScroll(id){
          // Scroll
        $('html,body').animate({
            scrollTop: $("#"+id).offset().top},
            'slow');
    }
	 $('.add-new-work-exp').click(function(event) {
        event.preventDefault();
        var linhvuc = $('.field_list').html();
        var chuyennganh = $('.specialized_list').html();
        var capbac = $('.level_list').html();
        var n = $('.field').length;
        n = n+1;
	 	$.ajax({
	 		url : '{{ URL::route("jobseekers.edit-cv", $id_cv) }}',
	 		type: 'GET',
	 		data: '',	
	 		success : function(data){
	 			$('#box-exp .rows').append('<div class="items block" id="saveWorkExp_'+n+'"><form class="form-horizontal" id="saveWorkExp"><div class="form-group"><label for="" class="col-sm-2 control-label">Chức danh<abbr>*</abbr></label><div class="col-sm-10"><input class="position form-control" name="position" type="text"></div></div><div class="form-group"><label for="" class="col-sm-2 control-label">Công ty<abbr>*</abbr></label><div class="col-sm-10"><input class="company_name form-control" name="company_name" type="text"></div></div><div class="form-group"><label for="" class="col-sm-2 control-label">Từ tháng<abbr>*</abbr></label><div class="col-sm-3"><div class="input-group date" id="From_date"><input class="from_date form-control" placeholder="Ví dụ: 09/2008" data-date-format="MM-YYYY" name="from_date" type="text"><span class="input-group-addon have-img"><img src="/assets/images/calendar.png"></span></div></div><label for="" class="col-sm-2 control-label">Đến tháng<abbr>*</abbr></label><div class="col-sm-3"><div class="input-group date" id="To_date"><input class="to_date form-control" placeholder="Ví dụ: 04/2012" data-date-format="MM-YYYY" name="to_date" type="text"><span class="input-group-addon have-img"><img src="/assets/images/calendar.png"></span></div></div><div class="col-sm-2"><div class="checkbox"><label><input name="is-current-job" type="checkbox" class="is_current_job">Công việc hiện tại</label></div></div></div><div class="form-group"><label class="col-sm-2 control-label">Lĩnh vực</label><div class="col-sm-4"><select name="field" id="field_'+n+'" class="field form-control" required="required">'+linhvuc+'</select></div><label class="col-sm-2 control-label">Chuyên ngành</label><div class="col-sm-4"><select name="specialized" id="specialized_'+n+'" class="specialized form-control" required="required">'+chuyennganh+'</select></div></div><div class="form-group"><label class="col-sm-2 control-label">Cấp bậc<abbr>*</abbr></label><div class="col-sm-4"><select name="level" id="level_'+n+'" class="level form-control" required="required">'+capbac+'</select></div><label class="col-sm-2 control-label">Mức lương</label><div class="col-sm-4"><input class="salary form-control" name="salary" type="text"></div></div><div class="form-group"><label class="col-sm-2 control-label">Mô tả<abbr>*</abbr></label><div class="col-sm-10"><textarea class="job_detail form-control" rows="5" name="job_detail" cols="50"></textarea><em class="text-gray-light"><span class="countdown">5000</span> ký tự có thể nhập thêm</em></div></div><div class="form-group"><div class="col-sm-offset-3 col-sm-7"><button class="btn btn-lg bg-gray-light cancel-exp" type="button">Hủy</button><input style="margin:0 3px;" class="btn btn-lg bg-orange" type="submit" value="Lưu"><span>(<span class="text-red">*</span>) Thông tin bắt buộc</span></div></div></form></div>');
	 			$('#field_'+n).select2({
        			minimumResultsForSearch: Infinity
    			});
    			$('#specialized_'+n).select2({
        			minimumResultsForSearch: Infinity
    			});
    			$('#level_'+n).select2({
        			minimumResultsForSearch: Infinity
    			});
    			$("#From_date,#To_date").datetimepicker({
			        pickTime: false,
			        locale: 'ru'
			    });
		     	goToByScroll('saveWorkExp_'+n); 
	 		}
	 	});
		$(this).addClass('hidden');
	 	$('.edit-exp').addClass('hidden');
	});
	 $('.add-new-edu').click(function(event) {
        event.preventDefault();
        $(this).addClass('hidden');
        $('.view-edit').removeClass('hidden');
	 	$('#saveEducation').addClass('hidden');
	 	$('.edit-edu').addClass('hidden');
        var linhvuc = $('.linhvuc_list').html();
        var diem = $('.average_list').html();
        var capbac = $('.capbac_list').html();
        var n = $('.linhvuc_list').length;
        n = n+1;
	 	$.ajax({
	 		url : '{{ URL::route("jobseekers.edit-cv", $id_cv) }}',
	 		type: 'GET',
	 		data: '',	
	 		success : function(data){
	 			$('#box-education .rows').append('<div class="items block" id="saveEducation_'+n+'"><form class="form-horizontal" id="saveEducation"><div class="form-group"><label class="col-sm-3 control-label">Chuyên ngành<abbr>*</abbr></label><div class="col-sm-9"><input class="specialized form-control" placeholder="Ví dụ: Kinh doanh quốc tế" name="specialized" type="text"></div></div><div class="form-group"><label class="col-sm-3 control-label">Trường<abbr>*</abbr></label><div class="col-sm-4"><input class="school form-control" placeholder="Ví dụ: Đại học Kinh Tế Tp.Hồ Chí Minh" name="school" type="text"></div><label class="col-sm-2 control-label">Bằng cấp<abbr>*</abbr></label><div class="col-sm-3"><select class="level form-control" id="level_'+n+'" name="level">'+capbac+'</select></div></div><div class="form-group"><label class="col-sm-3 control-label">Từ tháng</label><div class="col-sm-4"><div class="input-group date" id="Study_from"><input class="study_from form-control" placeholder="Ví dụ: 09/2008" data-date-format="MM-YYYY" name="study_from" type="text"><span class="input-group-addon have-img"><img src="/assets/images/calendar.png"></span></div></div><label class="col-sm-2 control-label">Đến tháng</label><div class="col-sm-3"><div class="input-group date" id="Study_to"><input class="study_to form-control" placeholder="Ví dụ: 04/2012" data-date-format="MM-YYYY" name="study_to" type="text"><span class="input-group-addon have-img"><img src="/assets/images/calendar.png"></span></div></div></div><div class="form-group"><label class="col-sm-3 control-label">Lĩnh vực nghiên cứu</label><div class="col-sm-4"><select class="field_of_study form-control" id="field_'+n+'" name="field_of_study">'+linhvuc+'</select></div><label class="col-sm-2 control-label">Xếp loại<abbr>*</abbr></label><div class="col-sm-3"><select class="average_grade_id form-control" id="average_'+n+'" name="average_grade_id">'+diem+'</select></div></div><div class="form-group"><label class="col-sm-3 control-label">Thành tựu</label><div class="col-sm-9"><textarea class="achievement form-control" rows="5" name="achievement" cols="50"></textarea><em class="text-gray-light"><span class="countdown">5000</span> ký tự có thể nhập thêm</em></div></div><div class="form-group"><div class="col-sm-offset-3 col-sm-7"><button class="btn btn-lg bg-gray-light cancel-education" type="button">Hủy</button><input class="btn btn-lg bg-orange" style="margin:0 3px;" type="submit" value="Lưu"><span>(<span class="text-red">*</span>) Thông tin bắt buộc</span></div></div></form></div>');
	 			$('#field_'+n).select2({
        			minimumResultsForSearch: Infinity
    			});
    			$('#average_'+n).select2({
        			minimumResultsForSearch: Infinity
    			});
    			$('#level_'+n).select2({
        			minimumResultsForSearch: Infinity
    			});
    			$("#Study_from,#Study_to").datetimepicker({
			        pickTime: false,
			        locale: 'ru'
			    });
		     	goToByScroll('saveEducation_'+n); 
	 		}
	 	});
	});

	
	$('.delete-dhnn').click(function(event) {
		event.preventDefault();
		var url = '{{ URL::route("jobseekers.save-cv", array("del-dhnn", $id_cv )) }}';
		$.ajax({
			url: url,
			type: 'POST',
			success : function(data){
				location.reload();
			}
		})
	});

	$('.cancel-dhnn').click(function(event) {
		event.preventDefault();
		$('#box-dinhhuongnn').slideUp();
	});

	$('.delete-exp').click(function(event) {
		event.preventDefault();
		var id = $(this).attr('data');
		var url = '{{ URL::route("jobseekers.save-cv", array("del-exp", $id_cv )) }}';
		$.ajax({
			url: url,
			type: 'POST',
			data: {id_exp: id},
			success : function(data){
				location.reload();
			}
		})
	});

	$(document).on('click', '.cancel-exp', function(event) {
		event.preventDefault();
		$('.edit-exp, .add-new-work-exp').removeClass('hidden');
		var count = $('#box-exp .items.block').length;
		if(count == 1){
			$('#box-exp').slideUp('fast');
		}else{
			parent_name = $(this).closest('div[id^="saveWorkExp_"]').attr('id');
			$('#'+parent_name).slideUp('fast').removeClass('block');
			$('#'+parent_name).slideUp('fast').addClass('hidden-xs');
		}
	});

	$('.delete-education').click(function(event) {
		event.preventDefault();
		var id = $(this).attr('data');
		var url = '{{ URL::route("jobseekers.save-cv", array("del-edu", $id_cv )) }}';
		$.ajax({
			url: url,
			type: 'POST',
			data: {id_edu: id},
			success : function(data){
				location.reload();
			}
		})
	});

	$(document).on('click', '.cancel-education', function(event) {
		event.preventDefault();
		$('.edit-edu, .add-new-edu').removeClass('hidden');
		var count = $('#box-education .items.block').length;
		if(count == 1){
			$('#box-education').slideUp('fast');
		}else{
			parent_name = $(this).closest('div[id^="saveEducation_"]').attr('id');
			$('#'+parent_name).slideUp('fast').removeClass('block');
			$('#'+parent_name).slideUp('fast').addClass('hidden-xs');
		}
	});
	$(function(){
		if($('#saveGeneralInfo .info_highest_degree').val() != '' && $('#saveGeneralInfo .info_current_level').val() != '' && $('#saveGeneralInfo .info_wish_position').val() != '' && $('#saveGeneralInfo .info_wish_level').val() != '' && $('#saveGeneralInfo .info_category').val() != '' && $('#saveGeneralInfo .info_wish_place_work').val() != '' && $('#saveGeneralInfo .fr-lang.block .foreign_languages_1').val() != '' && $('.date_of_birth').val() != '' && $('.province_id').val() != '' && $('.phone_number').val() != ''){
			$('.publish_resume').removeAttr('disabled');
		}else{
			$('.publish_resume').attr('disabled','disabled');
		}
		$('#modal-alert').modal('hide');
	});


	$(document).on('change', '.is_current_job', function(event) {
		event.preventDefault();
		if (this.checked) {
			$('#To_date .to_date').val('');
			$('#To_date .to_date').attr('disabled', 'disabled');
		}else{
			$('#To_date .to_date').removeAttr('disabled');
		}
	});
	$(document).on('click', '.edit-exp', function(event) {
		event.preventDefault();
		$('.edit-exp').addClass('hidden');
		var parent_name = $(this).closest('div[id^="saveWorkExp"]').attr('id');
		$('#'+parent_name+' .view-edit').addClass('hidden');
		$('#'+parent_name+' #saveWorkExp').removeClass('hidden');
	});
	$('.hidden-form-exp').click(function(event) {
		event.preventDefault();
		$('.edit-exp').removeClass('hidden');
		var parent_name = $(this).closest('div[id^="saveEducation"]').attr('id');
		$('#'+parent_name+' .view-edit').removeClass('hidden');
		$('#'+parent_name+' #saveEducation').addClass('hidden');
	});
	$(document).on('click', '.edit-edu', function(event) {
		event.preventDefault();
		$('.edit-edu').addClass('hidden');
		var parent_name = $(this).closest('div[id^="saveEducation"]').attr('id');
		$('#'+parent_name+' .view-edit').addClass('hidden');
		$('#'+parent_name+' #saveEducation').removeClass('hidden');
	});
	$('.hidden-form-edu').click(function(event) {
		event.preventDefault();
		$('.edit-edu').removeClass('hidden');
		var parent_name = $(this).closest('div[id^="saveEducation"]').attr('id');
		$('#'+parent_name+' .view-edit').removeClass('hidden');
		$('#'+parent_name+' #saveEducation').addClass('hidden');
	});


	$(document).on('change', '#Cities', function(event) {
		event.preventDefault();
		var id = $(this).val();
		url = '{{ URL::route("jobseekers.save-cv", array("get_district", $id_cv )) }}';
		var html = '';
		$.ajax({
			url: url,
			type: 'POST',
			dataType: 'json',
			data: {province_id: id},
			success : function(json){
				$('#District').removeAttr('disabled', 'disabled');
	            $.each(json, function(index, val) {
	            	html += '<option value="'+index+'">'+val+'</option>';
	           	});
	           	$('#District').html(html);
	           	if(json == ''){
	           		$('#District').text('');
	           		$('#District').change();
	           		$('#District').attr('disabled', 'disabled');
	           	}
			}
		})
	});
	</script>
@stop
