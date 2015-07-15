@extends('layouts.employer')
@section('title')Tìm kiếm nâng cao @stop
@section('content')
	<section class="boxed-content-wrapper clearfix search-page">
		<div class="container">
			<section id="content-alone" class="right">
				<div class="box">
					<div class="heading-image">
						<h2 class="text-blue">{{ HTML::image('assets/ntd/images/search-lg.png') }} Tìm kiếm nâng cao</h2>
					</div>
					@if(!isset($input)) <?php $input = ['category'=>'all', 'level'=>'all', 'location'=>'all', 'keyword'=>'']  ?> @endif
					<form action="{{ URL::route('employers.search.advance') }}" method="GET" class="form-horizontal" role="form" id="search-fo">
						<div class="form-group">
							<label for="inputKeyword" class="col-sm-4 control-label">Từ khóa:</label>
							<div class="col-sm-8">
								{{ Form::text('keyword') }}
								<div class="checkbox">
									<label>
										{{ Form::checkbox('full_keyword', 1, 1) }}
										Tìm chính xác từ khóa
									</label>
								</div>
							</div>

						</div>
						<div class="form-group">
							<label for="inputCategory" class="col-sm-4 control-label">Ngành nghề mong muốn:</label>
							<div class="col-sm-8">
								<?php $cats = Category::where('parent_id', '<>', 0)->lists('cat_name', 'id'); ?>
									{{ Form::select('category', ['all'=>'Bất kỳ'] + $cats ) }}
							</div>
						</div>
						<div class="form-group">
							<label for="inputLocation" class="col-sm-4 control-label">Nơi làm việc mong muốn:</label>
							<div class="col-sm-8">
								<?php $locas = Province::lists('province_name', 'id'); ?>
								{{ Form::select('location', ['all'=>'Bất kỳ'] + $locas ) }}
							</div>
						</div>
						<div class="form-group">
							<label for="inputLevel" class="col-sm-4 control-label">Cấp bậc mong muốn:</label>
							<div class="col-sm-8">
								<?php $levs = Level::lists('name', 'id'); ?>
								{{ Form::select('level', ['all'=>'Bất kỳ'] + $levs ) }}
							</div>
						</div>
						<div class="form-group">
							<label for="namkinhnghiem" class="col-sm-4 control-label">Năm Kinh Nghiệm:</label>
							<div class="col-sm-4">
								{{ Form::number('namkinhnghiem', '', ['id'=>'namkinhnghiem']) }}

							</div>
							<div class="col-sm-4">
								<div class="checkbox">
									<label>
										{{ Form::checkbox('khongyeucau', 1, 0, ['id'=>'khongyeucau']) }} Không yêu cầu
										
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="language" class="col-sm-4 control-label">Trình độ ngoại ngữ:</label>
							<div class="col-sm-8">
								<?php $langs = Language::lists('lang_name', 'id'); ?>
								{{ Form::select('language', ['all'=>'Bất kỳ'] + $langs ) }}
							</div>
						</div>
						<div class="form-group">
							<label for="updated_at" class="col-sm-4 control-label">Cập nhật cách đây:</label>
							<div class="col-sm-8">
								<?php $updated_ats = [1=>'Hôm nay', 2=>'Hôm qua', 3=>'Tuần này', 4=>'Tháng này', 5=>'Năm này']; ?>
								{{ Form::select('updated_at', ['all'=>'Bất kỳ'] + $updated_ats ) }}
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-8 col-sm-offset-4 advance-search">
								<a class="" data-toggle="collapse" href="#explan" aria-expanded="false" aria-controls="explan">
									- Rút gọn chỉ tiêu tìm kiếm
								</a>
							</div>
						</div>
						<div class="collapse in" id="explan">
							<div class="form-group">
								<label for="input" class="col-sm-4 control-label">Quốc tịch:</label>
								<div class="col-sm-8">
									{{ Form::select('country', ['all'=>'Bất kỳ'] + Country::lists('country_name', 'id') ) }}
								</div>
							</div>
							<div class="form-group">
								<label for="input" class="col-sm-4 control-label">Bằng cấp thấp nhất:</label>
								<div class="col-sm-8">
									{{ Form::select('education',['all'=>'Bất kỳ'] + Education::lists('name', 'id') ) }}
								</div>
							</div>
							<!-- <div class="form-group">
								<label for="input" class="col-sm-4 control-label">Trường:</label>
								<div class="col-sm-8">
									{{ Form::text('school_name') }}
								</div>
							</div> -->
							<div class="form-group">
								<label for="input" class="col-sm-4 control-label">Giới tính:</label>
								<div class="col-sm-8">
									{{ Form::select('gender', ['all'=>'Bất kỳ', 1=>'Nam', 2=>'Nữ', 3=>'Không tiết lộ']) }}
								</div>
							</div>
							<div class="form-group">
								<label for="input" class="col-sm-4 control-label">Mức lương:</label>
								<div class="col-sm-8">
									<div class="col-xs-1 align-center">từ</div>
									<div class="col-xs-3">
										{{ Form::text('luong_from') }}
									</div>
									<div class="col-xs-1 align-center">đến</div>
									<div class="col-xs-3">
										{{ Form::text('luong_to') }}
									</div>
									<div class="col-xs-2 align-center">(VND/tháng)</div>
								</div>
							</div>
							<div class="form-group">
								<label for="input" class="col-sm-4 control-label">Độ tuổi:</label>
								<div class="col-sm-8">
									<div class="col-xs-1 align-center">từ</div>
									<div class="col-xs-3">
										{{ Form::text('tuoi_from') }}
									</div>
									<div class="col-xs-1 align-center">đến</div>
									<div class="col-xs-3">
										{{ Form::text('tuoi_to') }}
									</div>
								</div>
							</div>
						</div>

						<div class="form-group">
							
							<div class="center">
								<button type="submit" name="submit" class="btn btn btn-lg bg-orange btn-search">Tìm Kiếm</button>
								
							</div>
						</div>
					</form>
					
					@include('employers.search.all_result')
			</section>
		</div>
	</section>

	<div class="modal fade" id="modal-history">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="float-left">
				@include('includes.employers.search_navbar1')
			</div>
			<section id="modal-content" class="pull-right right">
				<div class="box">
					<div class="heading-image">
						<div class="thoat"><a href="#" data-dismiss="modal">Thoát <i class="fa fa-close"></i></a></div>
						<h2 class="text-blue">{{ HTML::image('assets/ntd/images/icon-history.png') }} Lịch sử tìm kiếm</h2>
						
					</div>
					<p>
						Mục "Lịch sử tìm kiếm" sẽ tự động lưu trữ 100 kết quả tìm kiếm mới nhất của bạn trong 7 ngày. Để xem lại các kết quả trước đây, nhấn vào tên kết quả tìm kiếm trong lịch sử tìm kiếm của bạn
					</p>
					<div id="table-search-info">
						
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
@stop

@section('style')
	<style type="text/css">
	.checkbox input[type=checkbox] {
		margin-left: -20px;	
	}
	</style>
@stop

@section('script')
	<script type="text/javascript">
	$('#khongyeucau').click(function(event) {
		formHandle();
	});
	var formHandle = function()
	{
		if($('#khongyeucau').is(':checked'))
		{
			$('#namkinhnghiem').attr('disabled', 'disabled');;
		} else {
			$('#namkinhnghiem').removeAttr('disabled');
		}
	}
	var iskn = {{ (Input::get('khongyeucau')?1:0) }};
	if(iskn == 1) {
		$('#khongyeucau').trigger('click');
	}
	</script>
@stop