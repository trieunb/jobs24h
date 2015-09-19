@extends('layouts.jobseeker')
@section('title') Quản lý hồ sơ đã tải @stop
@section('content')
	<div class="container">
		@include('includes.jobseekers.breadcrumb')
	</div>
	<section class="main-content container single-post">
		<div class="boxed">
			<div class="rows">
				<div class="title-page">
					<h2>Hồ Sơ Tải Từ Máy Tính</h2>
				</div>
				<div class="upload-profile-from-com">
					@include('includes.notifications')
					@if($count_resume < 4)
			
					{{Form::open(array('route'=>array('jobseekers.post-my-resume-by-upload') ,'class'=>'form-horizontal', 'id'=>'CreatedNewCVFromPC','method'=>'POST', 'files'=>'true'))}}
						<div class="form-group">
							<label class="control-label col-sm-3">Tiêu đề hồ sơ<abbr>*</abbr></label>
							<div class="col-sm-6">
								{{Form::input('text', 'tieude', null, array('class'=>'tieude form-control'))}}
								<span class="error-message">{{$errors->first('tieude')}}</span>
							</div>
						</div>
						<h3>Hồ sơ đính kèm</h3>
						<div class="form-group">
							<div class="col-sm-12">
								<div class="fileUpload btn bg-orange col-sm-offset-3 col-sm-3 ">
									<i class="fa fa-folder-open"></i>&nbsp;&nbsp;&nbsp;
									Chọn tệp tin từ máy tính
									{{ Form::file('upload',array('class'=>'upload', 'id' =>'uploadBtn')) }}
								</div>
								<p id='progress'></p>
								<div class="col-sm-3">{{Form::input('text', 'file_name', null, array('class'=>'file_name form-control', 'id'=>'uploadFile', 'disabled', 'placeholder'=>'không có tệp nào được chọn'))}}</div>
								<span class="col-sm-offset-3 col-sm-3  error-message">{{$errors->first('upload')}}</span>
							</div>
							<small class="legend col-sm-offset-3">Chỉ hỗ trợ định dạng <strong>*.doc, *.docx, *.pdf</strong> và dung lượng <strong><512 Kb</strong></small>
						</div>
						<h3>Thông tin cá nhân</h3>
						<div class="col-sm-9">
						<div class="form-group">
							<label class="control-label col-sm-4">Họ và Tên<abbr>*</abbr></label>
							<div class="col-sm-3">
								{{Form::input('text', 'first_name', $user->first_name, array('class'=>'first_name form-control'))}}
								<span class="error-message">{{$errors->first('first_name')}}</span>
							</div>
							<div class="col-sm-3">
								{{Form::input('text', 'last_name', $user->last_name, array('class'=>'last_name form-control'))}}
								<span class="error-message">{{$errors->first('last_name')}}</span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4">Email<abbr>*</abbr></label>
							<div class="col-sm-3">
								{{Form::input('text', 'email', $user->email, array('class'=>'email form-control'))}}
								<span class="error-message">{{$errors->first('email')}}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-4 control-label">Giới tính<abbr>*</abbr></label>
							<div class="col-sm-4">
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
								<span class="error-message">{{$errors->first('gender')}}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-4 control-label">Ngày sinh<abbr>*</abbr></label>
							<div class="col-sm-4">
								<div class="input-group date" id="DOB">
					                {{Form::input('text','date_of_birth', date('m-d-Y',strtotime($user->date_of_birth)), array('class'=>'date_of_birth form-control','placeholder'=>'DD-MM-YYYY','data-date-format'=>'DD-MM-YYYY'))}}
					                <span class="input-group-addon have-img">
					               	{{HTML::image('assets/images/calendar.png')}}
					                </span>
					            </div>
					            <span class="error-message">{{$errors->first('date_of_birth')}}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-4 control-label">Điện thoại<abbr>*</abbr></label>
							<div class="col-sm-3">
								{{Form::input('text', 'phone_number', $user->phone_number, array('class'=>'phone_number form-control'))}}
								<span class="error-message">{{$errors->first('phone_number')}}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-4 control-label">Quốc tịch</label>
							<div class="col-sm-3">
								{{ Form::select('nationality_id', Country::lists('country_name', 'id'),$user->nationality_id, array('class'=>'nationality_id form-control', 'id' => 'Nationality') ) }}
							</div>	
						</div>
						<div class="form-group">
							<label for="" class="col-sm-4 control-label">Tình trạng hôn nhân</label>
							<div class="col-sm-3">
								{{ Form::select('marital_status', array('0'=>'Độc thân', '1'=>'Đã kết hôn'),$user->marital_status, array('class'=>'marital_status form-control', 'id' => 'Nationality') ) }}
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-4 control-label">Địa chỉ</label>
							<div class="col-sm-5">
								{{Form::input('text', 'address', $user->address, array('class'=>'address form-control'))}}
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-4 control-label">Quốc gia</label>
							<div class="col-sm-3">
								{{ Form::select('country_id', Country::lists('country_name', 'id'),$user->country_id, array('class'=>'country_id form-control', 'id' => 'Country') ) }}
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-4 control-label">Tỉnh/Thành phố</label>
							<div class="col-sm-3">
									{{ Form::select('province_id', Province::lists('province_name', 'id'),$user->province_id, array('class'=>'province_id form-control', 'id' => 'Cities') ) }}
							</div>
						</div>
						</div>
						<div class="col-sm-3">
							<div class="avatar">
								@if($user->avatar !=null)
									{{ HTML::image('uploads/jobseekers/avatar/'.$user->avatar.'') }}
								@else
									{{ HTML::image('assets/images/logo.png') }}
								@endif
							</div>
							<div class="fileUpload btn bg-orange col-sm-12">
								Chọn tệp tin
								{{ Form::file('avatar_user',array('class'=>'upload Avatar', 'id' =>'uploadBtn', 'accept'=>'image/*')) }}
							</div>
							<small class="legend">Chú ý: Ảnh tải lên không vượt quá 2MB</small>

						</div>
						<div class="clearfix"></div>
						<h3>Thông tin chung</h3>
						<div class="form-group">
			                <label class="col-sm-3 control-label">Bằng cấp cao nhất<abbr>*</abbr></label>
			            	<div class="col-sm-3">
			            		{{ Form::select('info_highest_degree',array(''=>'- Vui lòng chọn -')+Education::lists('name', 'id'),null, array('class'=>'info_highest_degree form-control', 'id' => 'HighestDegree') ) }}
			            		<span class="error-message">{{$errors->first('info_highest_degree')}}</span>
			            	</div>
			            </div>
			            <div class="form-group">
			            	<label class="col-sm-3 control-label">Cấp bậc mong muốn<abbr>*</abbr></label>
			            	<div class="col-sm-3">
			            		{{ Form::select('info_wish_level', array(""=>"- Vui lòng chọn -")+Level::lists('name', 'id'),null, array('class'=>'info_wish_level form-control', 'id' => 'WishLevel') ) }}
			            		<span class="error-message">{{$errors->first('info_wish_level')}}</span>
			            	</div>
			            </div>
			            <div class="form-group">
			                <label class="col-sm-3 control-label">Số năm kinh nghiệm</label>
			                <div class="col-sm-3">
			                	{{Form::input('text','info_years_of_exp', null, array('class'=>'info_years_of_exp form-control edit-control text-blue','id'=>'info_years_of_exp', 'maxlength'=>'2', 'placeholder' => 'Ví dụ 2'))}}
			                </div>
			                <div class="col-sm-6">
			                    <div class="checkbox">
			                    	<label>
			                    		<input class="default_years_of_exp" name="info_years_of_exp" type="checkbox" value="0">
			                    		  Tôi mới tốt nghiệp/chưa có kinh nghiệm làm việc
			                    	</label>
			                    </div>
			                </div>
			            </div>
			            <div class="form-group">
			                <label class="col-sm-3 control-label">Mức lương mong muốn<abbr>*</abbr></label>
							<div class="radio col-sm-3">
				                <div for="specific-salary">
				                   	{{Form::radio('specific_salary_radio', null, null, array('id'=>'specific-salary'))}}
				                    {{Form::input('text','specific_salary', null, array('class'=>'specific_salary form-control edit-control text-blue','id'=>'specific-salary-input', 'placeholder'=>'Ví dụ: 8.000.000', 'disabled'))}}
				                   	<span>VND / tháng</span>
				                </div>
							</div>
				            <div class="radio col-sm-2">
				                {{Form::radio('specific_salary_radio',0, 'checked', array('id'=>'specific-salary-0'))}}
				                <span>Thương lượng </span>
				            </div>
				            <span class="error-message">{{$errors->first('specific_salary')}}</span>
						</div>
						<div class="form-group">
			            	<label class="col-sm-3 control-label">Ngành nghề<abbr>*</abbr></label>
			            	<div class="col-sm-3">
			            		{{Form::select('info_category[]', Category::getList(),null, array('class'=>'info_category form-control chosen-select categories', 'id'=>'categoryMainSearch', 'multiple'=>'true','data-placeholder'=>'VD: Kế toán','multiple'))}}
			            		<span class="error-message">{{$errors->first('info_category')}}</span>
			            	</div>
			            </div>
			            <div class="form-group">
			            	<label class="col-sm-3 control-label">Nơi làm việc<abbr>*</abbr></label>
				            <div class="col-sm-3">
			            		{{Form::select('info_wish_place_work[]', Province::lists('province_name', 'id'), null, array('class'=>'info_wish_place_work form-control chosen-select', 'id' => 'WishPlaceWork', 'multiple'=>'true','data-placeholder'=>'VD: Hồ Chí Minh') )}}
			            		<span class="error-message">{{$errors->first('info_wish_place_work')}}</span>
				            	<small class="legend">(Tối đa 3 địa điểm mong muốn)</small>
			            	</div>
			            </div>
			            <div class="form-group">
			            	<label class="col-sm-3 control-label">Cấp bậc hiện tại</label>
			            	<div class="col-sm-3">
			            		{{ Form::select('info_current_level', array(""=>"- Vui lòng chọn -")+Level::lists('name', 'id'),null, array('class'=>'info_current_level form-control', 'id' => 'CurrentLevel') ) }}
			            	</div>
			            </div>
			            <div class="form-group">
			            	<div class="col-sm-offset-3 col-sm-7">
								{{Form::submit('Lưu Và Hoàn Tất Hồ Sơ', array('class'=>'btn btn-lg bg-orange'))}}
								<span>(<span class="text-red">*</span>) Thông tin bắt buộc</span>
							</div>
			            </div>
					{{Form::close()}}
					@else
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						Bạn đã tạo tối đa 4 Hồ sơ, Đến trang <a href="{{URL::route('jobseekers.my-resume')}}" class="decoration">Quản lý hồ sơ</a>
					</div>
					@endif
				</div>
			</div>
		</div>
		<div class="boxed">
			<div class="rows">
				@include('includes.jobseekers.widget.suggested-jobs')
			</div>
		</div>
	</section>
@stop
@section('scripts')
	
	<script type="text/javascript">
	$('#btn_UploadNewCV').change(function(event) {
		$('.file_name_new_upload').val($(this).val());
		$('.loading-icon').html('<span class="h2">Đang tải ...</span>').show();
		setTimeout(function(){
		  $('#UploadNewCV').submit();
		}, 2000);
		
	});

	jQuery(document).ready(function($) {
		 $('.Avatar').on('change', function(event) {
		 var image = this.files[0]; 	 
		 $('.avatar').html(''); //we set the innerHTML of the div to null
		 var reader = new FileReader(); // the jQuery FileReader class
		 reader.onload = function(e){ // whatever we want FileReader to do, wee need to do that when it loads
			 $('<img src="' + e.target.result + '" class="thumbnail img-responsive" width="100%" alt="Loading..">').appendTo($('.avatar'));
		 }
		 reader.readAsDataURL(image); // this gives our file to the FileReader() and uses the onload function to do our bidding.
		 });
	});
	</script>
@stop
