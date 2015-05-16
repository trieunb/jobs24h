@extends('layouts.jobseeker')
@section('content')
	<div class="container">
		@include('includes.jobseekers.breadcrumb')
	</div>
	<section class="main-content container">
		<div class="boxed">
			<nav class="ntv-menu">
				@include('includes.jobseekers.menu-ntv')
				@include('includes.jobseekers.menu-right')
			</nav>
			<div class="rows">
				<div class="title-page">
					<h2>Mục tiêu nghề nghiệp</h2> 
				</div>
				<div class="box">
					{{Form::open(array('route'=>'jobseekers.edit-career-objectives', null, 'class'=>'form-horizontal'))}}
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Vị trí mong muốn</label>
								<div class="col-sm-6">
									{{Form::input('text', 'position', null, array('class'=>'form-control', 'required'))}}
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Cấp bậc mong muốn</label>
								<div class="col-sm-3">
									{{ Form::select('level', Level::lists('name', 'id'), null, array('class'=>'form-control','required', 'id'=>'Level') ) }}
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Nơi làm việc</label>
								<div class="col-sm-3">
									{{ Form::select('province', Province::lists('province_name', 'id'), null, array('class'=>'form-control','required', 'id'=>'Province') ) }}
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Ngành nghề</label>
								<div class="col-sm-3">
									{{ Form::select('category', Category::lists('cat_name', 'id'), null, array('class'=>'form-control','required', 'id'=>'Category') ) }}
								</div>
							</div>
							<div class="form-group">
				                <label class="col-sm-2 control-label">Mức lương mong muốn</label>
								<div class="radio col-sm-3">
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
								<label for="" class="col-sm-2 control-label">Định hướng nghề nghiệp</label>
								<div class="col-sm-6">
									{{Form::textarea('dhnn',null, array('class'=>'form-control', 'rows'=>'5')) }}
									<small class="legend">(Mong muốn của bạn về công việc tương lai, bao gồm mục tiêu ngắn hạn và mục tiêu dài hạn.)</small>
								</div>
							</div>
							<div class="form-group">
							    <div class="col-sm-offset-2 col-sm-10">
								    {{Form::submit('Lưu', array('class'=>'btn btn-lg bg-orange'))}}
								    <a href="#" class="text-blue">Hủy bỏ và quay trở lại trang trước</a>
							    </div>
							</div>
						{{Form::close()}}
				</div>
			</div>
		</div>
	</section>
@stop