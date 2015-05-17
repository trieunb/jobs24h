@extends('layouts.jobseeker')
@section('content')

	<div class="container">
		<div class="col-sm-8">
			@include('includes.jobseekers.breadcrumb')
		</div>
		<div class="user-menu col-sm-4 pull-right">
			<a href="#" class="text-blue">
				{{HTML::image('assets/images/ruibu.jpg', null, array('class'=>'avatar'))}}
				<strong><em>Hi, Anh Điệp</em></strong>
			</a>
			<nav class="ntv-menu navbar-right">
				@include('includes.jobseekers.menu-ntv')
			</nav>
		</div>
	</div>
	<section class="main-content container single-post">
		<section id="content" class="col-sm-9">
				<div class="box">
					<div class="col-sm-3">
						<div class="avatar">
							{{ HTML::image('assets/images/ruibu.jpg') }}
						</div>
					</div>
					<div class="col-sm-9">
						<div class="profile">
							<h2>{{$user->first_name}} {{$user->last_name}}</h2>
							<p>Điện thoại: <span class="text-blue">{{$user->phone_number}}</span></p>
							<p>Email: <span class="text-blue">{{$user->email}}</span></p>
							<p>Hồ Sơ: <a href="#" class="text-blue" target="_blank">http://www.vnjobs.com/myjobs/tran.diep.4</a></p>
						</div>
					</div>
					<div class="clearfix"></div>
						<div class="complete-profile col-sm-8">
							<div class="col-sm-5">
								<div class="progress-radial progress-70">
			  						<div class="overlay">25%</div>
								</div>
								<span class="text-orange">Hồ sơ chưa hoàn tất</span>
							</div>
							<div class="col-sm-7 ">
								<a href="#"><i class="glyphicon glyphicon-search"></i>Cho phép tìm kiếm hồ sơ này</a>
							</div>
						</div>
						<div class="print-trash col-sm-4">
							<a href="#"><i class="glyphicon glyphicon-print"></i></a>	
							<a href="#"><i class="glyphicon glyphicon-trash"></i></a>	
							{{Form::button('Đăng Hồ Sơ', array('class'=>'btn btn-lg bg-orange'))}}
						</div>
				</div><!-- Box -->
				<div class="boxed">
				<div class="rows">
					<div class="title-page">
						<h2>Thông tin cá nhân</h2> 
						<a href="#" class=" pull-right"><i class="fa fa-edit"></i> Chỉnh sửa</a>
					</div>
						{{Form::open(array('route'=> array('jobseekers.edit-basic'),'class'=>'form-horizontal', 'id'=>'saveBasicInfo'))}}
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Ngày sinh<abbr>*</abbr></label>
								<div class="col-sm-3">
									<div class="input-group date" id="DOB">
					                    {{Form::input('text','date_of_birth', $user->date_of_birth, array('class'=>'date_of_birth form-control', 'placeholder'=>'YYYY-MM-DD','data-date-format'=>'YYYY-MM-DD'))}}
					                    <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span>
					                    </span>
					                </div>
					                <span class="error-message">{{$errors->first('date_of_birth')}}</span>
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
									<span class="error-message">{{$errors->first('nationality_id')}}</span>
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
										{{ Form::select('province_id', Province::lists('province_name', 'id'),$user->province_id, array('class'=>'province_id form-control', 'id' => 'Cities') ) }}
										<span class="error-message">{{$errors->first('province_id')}}</span>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Quận huyện</label>
								<div class="col-sm-3">
									{{ Form::select('district_id', Country::lists('country_name', 'id'),$user->district_id, array('class'=>'district_id form-control', 'id' => 'District') ) }}
								</div>
								<label for="" class="col-sm-3 control-label">Điện thoại
								<abbr>*</abbr></label>
								<div class="col-sm-3">
									{{Form::input('text', 'phone_number', $user->phone_number, array('class'=>'phone_number form-control'))}}
									<span class="error-message">{{$errors->first('phone_number')}}</span>
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
									{{Form::button('Hủy', array('class'=>'btn btn-lg bg-gray-light'))}}
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
						<a href="#" class=" pull-right"><i class="fa fa-edit"></i> Chỉnh sửa</a>
					</div>
					{{Form::open(array('route'=> array('jobseekers.edit-general-info', $id_cv), 'class'=>'form-horizontal', 'method'=>'POST'))}}
						<div class="form-group">
			                <label class="col-sm-3 control-label">Số năm kinh nghiệm<abbr>*</abbr></label>
			                <div class="col-sm-3">
			                	{{Form::input('text', 'years-of-experience', null, array('class'=>'form-control', 'maxlength'=>'2', 'placeholder'=>'Ví dụ 2'))}}
			                </div>
			                <div class="col-sm-6">
			                    <div class="checkbox">
			                    	<label>
			                    		{{Form::checkbox('years-of-experience', 0)}}
			                    		  Tôi mới tốt nghiệp/chưa có kinh nghiệm làm việc
			                    	</label>
			                    </div>
			                    <span class="error-message">{{$errors->first('years-of-experience')}}</span>
			                </div>
			            </div>
			            <div class="form-group">
			            	<label class="col-sm-3 control-label">Bằng cấp cao nhất<abbr>*</abbr></label>
			            	<div class="col-sm-3">
			            		{{ Form::select('highest-degree', Country::lists('country_name', 'id'),null, array('class'=>'form-control', 'id' => 'HighestDegree') ) }}
			            		 <span class="error-message">{{$errors->first('highest-degree')}}</span>
			            	</div>
			            </div>
			            <div class="form-group">
			            	@for($i=0; $i < count($mt_lang); $i++)
			            	<div class="row fr-lang lang{{$i}} block">
				            	<label class="col-sm-3 control-label">Ngoại ngữ<abbr>*</abbr></label>
				            	<div class="col-sm-3 ">
				            		{{ Form::select('foreign-languages-'.$i.'', array(""=>"- Vui lòng chọn -")+Language::lists('lang_name', 'id'),$mt_lang[$i]->lang_id, array('class'=>'form-control', 'id' => 'ForeignLanguages') ) }}
				            	</div>
				            	<label class="col-sm-3 control-label">Trình độ</label>
				            	<div class="col-sm-3 row">
				            		{{ Form::select('level-languages-'.$i.'', array(""=>"- Vui lòng chọn -")+LevelLang::lists('name', 'id'),$mt_lang[$i]->level, array('class'=>'form-control', 'id' => 'Level') ) }}
				            	</div>
			            	</div>
			            	@endfor
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
			            		{{Form::input('text', 'latest-company', null, array('class'=>'form-control'))}}
			            	</div>
			            </div>
			            <div class="form-group">
			            	<label class="col-sm-3 control-label">Công việc gần đây nhất</label>
			            	<div class="col-sm-3">
			            		{{Form::input('text', 'latest-job', null, array('class'=>'form-control'))}}
			            	</div>
			            	<label class="col-sm-3 control-label">Cấp bậc hiện tại<abbr>*</abbr></label>
			            	<div class="col-sm-3">
			            		{{ Form::select('current-level', array(""=>"- Vui lòng chọn -")+Country::lists('country_name', 'id'),null, array('class'=>'form-control', 'id' => 'CurrentLevel') ) }}
			            		 <span class="error-message">{{$errors->first('current-level')}}</span>
			            	</div>
			            </div>
			            <div class="form-group">
			            	<label class="col-sm-3 control-label">Vị trí mong muốn<abbr>*</abbr></label>
			            	<div class="col-sm-3">
			            		{{Form::input('text', 'wish-position', null, array('class'=>'form-control'))}}
			            		<span class="error-message">{{$errors->first('wish-position')}}</span>
			            	</div>
			            	<label class="col-sm-3 control-label">Cấp bậc mong muốn<abbr>*</abbr></label>
			            	<div class="col-sm-3">
			            		{{ Form::select('wish-level', array(""=>"- Vui lòng chọn -")+Country::lists('country_name', 'id'),null, array('class'=>'form-control', 'id' => 'WishLevel') ) }}
			            		<span class="error-message">{{$errors->first('wish-level')}}</span>
			            	</div>
			            </div>
			            <div class="form-group">
				            <label class="col-sm-3 control-label">Nơi làm việc<abbr>*</abbr></label>
				            	<div class="col-sm-3">
				 
			            		{{Form::select('wish-place-work', Province::lists('province_name', 'id'), null, array('class'=>'form-control chosen-select', 'id' => 'WishPlaceWork', 'multiple'=>'true','data-placeholder'=>'VD: Hồ Chí Minh') )}}
				            		<small class="legend">(Tối đa 3 địa điểm mong muốn)</small>
				            		<span class="error-message">{{$errors->first('wish-place-work')}}</span>
			            		</div>
			            	<label class="col-sm-3 control-label">Ngành nghề<abbr>*</abbr></label>
			            	<div class="col-sm-3">
			            		{{Form::select('category', Category::lists('cat_name', 'id'), null, array('class'=>'form-control chosen-select', 'id' => 'categoryMainSearch', 'multiple'=>'true','data-placeholder'=>'VD: Kế toán') )}}
			            		
			            		<span class="error-message">{{$errors->first('category')}}</span>
			            	</div>
			            </div>
			            <div class="form-group">
			                <label class="col-sm-3 control-label">Mức lương mong muốn<abbr>*</abbr></label>
							<div class="radio col-sm-4">
				                	<div for="specific-salary">
				                    	{{Form::radio('specific-salary', 1, null, array('id'=>'specific-salary'))}}
				                        {{Form::input('number','salary', null, array('class'=>'form-control edit-control text-blue','id'=>'specific-salary-input', 'placeholder'=>'Ví dụ: 8.000.000', 'disabled'))}}
				                    	<span>VND / tháng</span>
				                    </div>
								</div>
				                <div class="radio col-sm-4">
				                    {{Form::radio('specific-salary', 0, null, array('id'=>'specific-salary-0', 'checked'=>'checked'))}}
				                    <span>Thương lượng </span>
				                </div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-7">
								{{Form::submit('Hủy', array('class'=>'btn btn-lg bg-gray-light'))}}
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
						<h2>Hồ sơ / Mục tiêu nghề nghiệp</h2>
					</div>
					<label><abbr>*</abbr> Giới Thiệu Bản Thân Và Miêu Tả Mục Tiêu Nghề Nghiệp Của Bạn</label>
					<form action="" method="POST" role="form">
						<div class="form-group">
							{{Form::textarea( 'introduct-yourself', null, array('class'=>'form-control', 'rows'=>'5'))}}
							<em class="text-gray-light"><span class="countdown">5000</span> ký tự có thể nhập thêm</em>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-7">
								{{Form::submit('Hủy', array('class'=>'btn btn-lg bg-gray-light'))}}
								{{Form::submit('Lưu', array('class'=>'btn btn-lg bg-orange'))}}
								<span>(<span class="text-red">*</span>) Thông tin bắt buộc</span>
							</div>
						</div>
					</form>
				</div><!-- rows -->
				</div><!-- boxed -->
				<div class="boxed">
					<div class="rows">
						<div class="title-page">
							<h2>Kinh nghiệm làm việc</h2>
							<a href="#" class=" pull-right"><i class="fa fa-edit"></i> Chỉnh sửa</a>
						</div>
						<form action="" method="POST" role="form" class="form-horizontal">
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Chức danh<abbr>*</abbr></label>
								<div class="col-sm-9">
									{{Form::input('text','title-for-position', null, array('class'=>'form-control'))}}
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Công ty<abbr>*</abbr></label>
								<div class="col-sm-9">
									{{Form::input('text', 'your-company', null, array('class'=>'form-control'))}}
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Từ tháng<abbr>*</abbr></label>
								<div class="col-sm-2">
									{{Form::input('text', 'job-from', null, array('class'=>'form-control', 'placeholder'=>'VD: 09/2009'))}}
								</div>
								<label for="" class="col-sm-2 control-label">Đến tháng<abbr>*</abbr></label>
								<div class="col-sm-2">
									{{Form::input('text', 'job-to', null, array('class'=>'form-control', 'placeholder'=>'VD: 04/2013'))}}
								</div>
								<div class="col-sm-3">
									<div class="checkbox">
										<label>
											{{Form::checkbox('is-current-job', null)}}
											Công việc hiện tại
										</label>
									</div>
								</div>
							</div>
							<div class="form-group">
				            	<label class="col-sm-3 control-label">Lĩnh vực<abbr>*</abbr></label>
				            	<div class="col-sm-3">
				            		{{ Form::select('scope', Country::lists('country_name', 'id'),null, array('class'=>'form-control', 'id' => 'Scope') ) }}
				            	</div>
				            	<label class="col-sm-3 control-label">Chuyên ngành<abbr>*</abbr></label>
				            	<div class="col-sm-3">
				            		{{ Form::select('specialized', Country::lists('country_name', 'id'),null, array('class'=>'form-control', 'id' => 'Specialized') ) }}
				            	</div>
				            </div>
				            <div class="form-group">
				            	<label class="col-sm-3 control-label">Cấp bậc<abbr>*</abbr></label>
				            	<div class="col-sm-3">
				            		{{ Form::select('latest-level', Country::lists('country_name', 'id'),null, array('class'=>'form-control', 'id' => 'LatestLevel') ) }}
				            	</div>
				            	<label class="col-sm-3 control-label">Mức lương</label>
				            	<div class="col-sm-3">
				            		{{Form::input('text', 'latest-salary', null, array('class'=>'form-control'))}}
				            	</div>
				            </div>
				            <div class="form-group">
				            	<label class="col-sm-3 control-label">Mô tả</label>
				            	<div class="col-sm-9">
									{{Form::textarea( 'summary', null, array('class'=>'form-control', 'rows'=>'5'))}}
									<em class="text-gray-light"><span class="countdown">5000</span> ký tự có thể nhập thêm</em>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-7">
									{{Form::submit('Hủy', array('class'=>'btn btn-lg bg-gray-light'))}}
									{{Form::submit('Lưu', array('class'=>'btn btn-lg bg-orange'))}}
									<span>(<span class="text-red">*</span>) Thông tin bắt buộc</span>
								</div>
							</div>
						</form>
					</div><!-- rows -->
				</div><!-- boxed -->
				<div class="boxed">
					<div class="rows">
						<div class="title-page">
							<h2>Học vấn và Bằng Cấp</h2>
						</div>
						<form action="" method="POST" role="form" class="form-horizontal">
							<div class="form-group">
								<label class="col-sm-3 control-label">Chuyên ngành<abbr>*</abbr></label>
				            	<div class="col-sm-9">
				            		{{Form::input('text', 'majors', null, array('class'=>'form-control', 'placeholder'=>'Ví dụ: Kinh doanh quốc tế'))}}
				            	</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Trường<abbr>*</abbr></label>
				            	<div class="col-sm-3">
				            		{{Form::input('text', 'school', null, array('class'=>'form-control', 'placeholder'=>'Ví dụ: Đại học Kinh Tế Tp.Hồ Chí Minh'))}}
				            	</div>
				            	<label class="col-sm-3 control-label">Bằng cấp<abbr>*</abbr></label>
				            	<div class="col-sm-3">
				            		{{ Form::select('diploma', Country::lists('country_name', 'id'),null, array('class'=>'form-control', 'id' => 'Diploma') ) }}
				            	</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Từ tháng</label>
				            	<div class="col-sm-3">
				            		{{Form::input('text', 'study-from', null, array('class'=>'form-control', 'placeholder'=>'VD: 09/2009'))}}
				            	</div>
				            	<label class="col-sm-3 control-label">Đến tháng</label>
				            	<div class="col-sm-3">
				            		{{Form::input('text', 'study-from', null, array('class'=>'form-control', 'placeholder'=>'VD: 04/2013'))}}
				            	</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Lĩnh vực nghiên cứu<abbr>*</abbr></label>
				            	<div class="col-sm-3">
				            		{{ Form::select('field-of-study', Country::lists('country_name', 'id'),null, array('class'=>'form-control', 'id' => 'FieldOfStudy') ) }}
				            	</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Thành tựu</label>
								<div class="col-sm-9">
									{{Form::textarea( 'achievement', null, array('class'=>'form-control', 'rows'=>'5'))}}
									<em class="text-gray-light"><span class="countdown">5000</span> ký tự có thể nhập thêm</em>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-7">
									{{Form::submit('Hủy', array('class'=>'btn btn-lg bg-gray-light'))}}
									{{Form::submit('Lưu', array('class'=>'btn btn-lg bg-orange'))}}
									<span>(<span class="text-red">*</span>) Thông tin bắt buộc</span>
								</div>
							</div>
						</form>
					</div><!-- rows -->
				</div><!-- boxed -->
				<div class="boxed">
					<div class="rows">
						<div class="title-page">
							<h2>Kỹ năng</h2>
						</div>
						<label>Thêm kỹ năng nghề nghiệp đề nhận được những đề nghị công việc phù hợp hơn</label>
						<div class="box">
							<div id="tags-edit">
								<span class="tag-xs" title="Developer">
	                                <span class="tag-name">Developer</span>
	                                	<a class="ic-close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
	                                <input class="input-tag-name" type="hidden" name="" data-tag-name="Developer">
                                </span>
                                <span class="tag-xs" title="Developer">
	                                <span class="tag-name">Developer</span>
	                                	<a class="ic-close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
	                                <input class="input-tag-name" type="hidden" name="" data-tag-name="Developer">
                                </span>
                                <span class="tag-xs" title="Developer">
	                                <span class="tag-name">Developer</span>
	                                	<a class="ic-close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
	                                <input class="input-tag-name" type="hidden" name="" data-tag-name="Developer">
                                </span>
                                <span class="tag-xs" title="Developer">
	                                <span class="tag-name">Developer</span>
	                                	<a class="ic-close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
	                                <input class="input-tag-name" type="hidden" name="" data-tag-name="Developer">
                                </span>
                                <span class="tag-xs" title="Developer">
	                                <span class="tag-name">Developer</span>
	                                	<a class="ic-close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
	                                <input class="input-tag-name" type="hidden" name="" data-tag-name="Developer">
                                </span>
							</div>
						</div>
						<div class="add-new-tag">
							<div class="row">
								<div class="col-sm-10">
									{{Form::input('text', 'study-from', null, array('class'=>'form-control input-sm', 'id'=>'key-skills', 'placeholder'=>'Hãy điền thông tin về lĩnh vực chuyên môn của bạn'))}}
								</div>
									{{Form::submit('Thêm', array('class'=>'btn btn-default col-sm-2 btn-sm'))}}
							</div>
							<div class="clearfix push-top-sm">
								<a class="text-blue pull-left what-is-this-skill-section clickable" data-toggle="popover"  data-content="<p>Ngay bây giờ bạn có thể làm giàu hồ sơ của mình bằng cách <strong>thêm các kỹ năng nghề nghiệp</strong>.</p> Kỹ năng sẽ giúp chúng tôi rất nhiều trong việc <strong>đề xuất việc làm phù hợp nhất với bạn</strong> (dựa vào giải thuật về <strong>Điểm số phù hợp</strong> sẽ được cập nhật trong thời gian tới).">Thêm kỹ năng là gì?</a>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-7">
								{{Form::submit('Hủy', array('class'=>'btn btn-lg bg-gray-light'))}}
									{{Form::submit('Lưu', array('class'=>'btn btn-lg bg-orange'))}}
								<span>(<span class="text-red">*</span>) Thông tin bắt buộc</span>
							</div>
						</div>
					</div><!-- rows -->
				</div><!-- boxed -->
	</section>
	<aside id="sidebar" class="col-sm-3 pull-right">
				<div class="col-sm-12 card-item alert-warning">
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
	                <div class="col-sm-7 col-xs-9 box-sm">
						<h4>Hồ Sơ/Mục Tiêu Nghề Nghiệp</h4>
	                </div>
	                <div class="col-sm-2 box-label warning"><strong>10%</strong></div>
	            </div> 
	            <div class="col-sm-12 card-item alert-info">
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
	                <div class="col-sm-7 col-xs-9 box-sm">
						<h4>Kinh Nghiệm Làm Việc</h4>
	                </div>
	                <div class="col-sm-2 box-label primary"><strong>10%</strong></div>
	            </div> 
	            <div class="col-sm-12 card-item alert-success">
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
	                <div class="col-sm-7 col-xs-9 box-sm">
						<h4>Học Vấn Và Bằng Cấp</h4>
	                </div>
	                <div class="col-sm-2 box-label success"><strong>10%</strong></div>
	            </div> 
	            <div class="col-sm-12 card-item alert-danger">
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
	                <div class="col-sm-7 col-xs-9 box-sm">
						<h4>Thông Tin Tham Khảo</h4>
	                </div>
	                <div class="col-sm-2 box-label danger"><strong>10%</strong></div>
	            </div> 
				<div class="widget row">
					<h3>Cẩm nang nghề nghiệp</h3>
					<ul>
						<li>
							<div class="col-sm-3">{{HTML::image('assets/images/example.png')}}</div>
							<div class="col-sm-9">
								<a href="#" class="text-blue">Làm sếp khó hay dễ?</a>
								<p>Bạn đang mong chờ môt "cú hích", một sự thay đổi</p>
							</div>
						</li>
						<li>
							<div class="col-sm-3">{{HTML::image('assets/images/example.png')}}</div>
							<div class="col-sm-9">
								<a href="#" class="text-blue">Làm sếp khó hay dễ?</a>
								<p>Bạn đang mong chờ môt "cú hích", một sự thay đổi</p>
							</div>
						</li>
						<li>
							<div class="col-sm-3">{{HTML::image('assets/images/example.png')}}</div>
							<div class="col-sm-9">
								<a href="#" class="text-blue">Làm sếp khó hay dễ?</a>
								<p>Bạn đang mong chờ môt "cú hích", một sự thay đổi</p>
							</div>
						</li>
						<li>
							<div class="col-sm-3">{{HTML::image('assets/images/example.png')}}</div>
							<div class="col-sm-9">
								<a href="#" class="text-blue">Làm sếp khó hay dễ?</a>
								<p>Bạn đang mong chờ môt "cú hích", một sự thay đổi</p>
							</div>
						</li>
						<li>
							<div class="col-sm-3">{{HTML::image('assets/images/example.png')}}</div>
							<div class="col-sm-9">
								<a href="#" class="text-blue">Làm sếp khó hay dễ?</a>
								<p>Bạn đang mong chờ môt "cú hích", một sự thay đổi</p>
							</div>
						</li>
						<li>
							<div class="col-sm-3">{{HTML::image('assets/images/example.png')}}</div>
							<div class="col-sm-9">
								<a href="#" class="text-blue">Làm sếp khó hay dễ?</a>
								<p>Bạn đang mong chờ môt "cú hích", một sự thay đổi</p>
							</div>
						</li>
						<li>
							<div class="col-sm-3">{{HTML::image('assets/images/example.png')}}</div>
							<div class="col-sm-9">
								<a href="#" class="text-blue">Làm sếp khó hay dễ?</a>
								<p>Bạn đang mong chờ môt "cú hích", một sự thay đổi</p>
							</div>
						</li>
						<li>
							<div class="col-sm-3">{{HTML::image('assets/images/example.png')}}</div>
							<div class="col-sm-9">
								<a href="#" class="text-blue">Làm sếp khó hay dễ?</a>
								<p>Bạn đang mong chờ môt "cú hích", một sự thay đổi</p>
							</div>
						</li>
						<li>
							<div class="col-sm-3">{{HTML::image('assets/images/example.png')}}</div>
							<div class="col-sm-9">
								<a href="#" class="text-blue">Làm sếp khó hay dễ?</a>
								<p>Bạn đang mong chờ môt "cú hích", một sự thay đổi</p>
							</div>
						</li>
					</ul>
				</div>
		</aside>
	</section>
@stop