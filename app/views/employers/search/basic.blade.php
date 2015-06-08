@extends('layouts.employer')
@section('title')Tìm kiếm nhanh @stop
@section('content')
	<section class="boxed-content-wrapper clearfix search-page">
		<div class="container">
			<aside id="sidebar" class="col-sm-3">
				@include('includes.employers.search_navbar')
			</aside>
			<section id="content" class="pull-right right">
				<div class="box">
					<div class="heading-image">
						<h2 class="text-blue">{{ HTML::image('assets/ntd/images/search-lg.png') }} Tìm nhanh</h2>
					</div>
					@if(!isset($input)) <?php $input = ['category'=>'all', 'level'=>'all', 'location'=>'all', 'keyword'=>'']  ?> @endif
					<form action="" method="POST" class="form" role="form">
						<div class="form-group">
							<label for="inputS" class="col-xs-12 control-label">Từ khóa:</label>
							<div class="col-sm-7">
								{{ Form::text('keyword', $input['keyword']) }}
							</div>
							<div class="col-xs-5">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="full_keyword" value="1">
										Tìm chính xác từ khóa
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-4">
								<label for="input" class="control-label">Ngành nghề:</label>
							</div>
							<div class="col-xs-3">
								<label for="input" class="control-label">Cấp bậc:</label>
							</div>
							<div class="col-xs-3">
								<label for="input" class="control-label">Địa điểm:</label>
							</div>
							<div class="col-xs-2"></div>
							
							<div class="col-xs-4">
								<div class="form-group">
									<?php $cats = Category::where('parent_id', 1)->lists('cat_name', 'id'); ?>
									{{ Form::select('category', ['all'=>'Bất kỳ'] + $cats, $input['category'] ) }}
									
								</div>
							</div>
							<div class="col-xs-3">
								<div class="form-group">
									<?php $levs = Level::lists('name', 'id'); ?>
									{{ Form::select('level', ['all'=>'Bất kỳ'] + $levs, $input['level'] ) }}
								</div>
							</div>
							<div class="col-xs-3">
								<div class="form-group">
									<?php $locas = Province::lists('province_name', 'id'); ?>
									{{ Form::select('location', ['all'=>'Bất kỳ'] + $locas, $input['location'] ) }}
								</div>
							</div>
							<div class="col-xs-2">
								<button type="submit" class="btn btn btn-lg bg-orange btn-search">Tìm Kiếm</button>
								
							</div>
						</div>
					</form>
					<div class="col-xs-7 col-xs-offset-5 advance-search">
							<a href="#">Tạo thông báo hồ sơ</a>
							<a href="#">Mở rộng tiêu chí tìm kiếm</a>
						</div>
					<div id="result" class="@if(isset($result)) visible @else invisible @endif">
						@if(isset($result))
						<div class="col-xs-12 search-info">
							<div class="title-image">
								{{ HTML::image('assets/ntd/images/search-list.png') }}
							</div>
							<div class="info-text">
								<span>Tìm thấy {{ $result->getTotal() }} hồ sơ theo yêu cầu tìm kiếm.</span>
							</div>
							<div class="info-text">
								<span>Ngành nghề <strong>@if($input['category'] == 'all') Bất Kỳ @else {{ $cats[$input['category']] }} @endif</strong> 
								| Địa điểm: <strong>@if($input['location'] == 'all') Bất Kỳ @else {{ $locas[$input['location']] }} @endif</strong></span>
							</div>
						</div>
						<div class="pull-right pagi">&nbsp;
							{{ $result->links() }}
						</div>
						<table class="table table-blue-bordered table-bordered table-result">
							<thead>
								<tr>
									<th class="col-sm-4">Ứng viên</th>
									<th class="col-sm-1">Kinh nghiệm</th>
									<th class="col-sm-1">Mức lương</th>
									<th class="col-sm-2">Nơi làm việc</th>
									<th class="col-sm-2">Cập nhật</th>
								</tr>
							</thead>
							<tbody>
								@if(count($result))
								@foreach($result as $resume)
								<tr>
									<td>
										<a href="#">{{ $resume->tieude_cv }}</a>
										<div class="js-info">
											<i class="fa fa-eye"></i> {{ $resume->views }}
											<i class="fa fa-download"></i> {{ $resume->downloaded }}
											<!--<i class="fa fa-bookmark"></i> 100%-->
										</div>
										@if($resume->file_name)
										<div class="js-download">
											<i class="fa fa-paperclip"></i>
											Hồ sơ này bao gồm 1 CV đính kèm
										</div>
										@endif
										<div class="js-level">
											Cấp bậc: <strong>{{ $levs[$resume->capbachientai] }}</strong>
										</div>
									</td>
									<td>
										{{ $resume->namkinhnghiem }} năm
									</td>
									<td>
										@if($resume->mucluong == 0)
										Thương lượng
										@else 
										${{ $resume->mucluong }}
										@endif
									</td>
									<td>
										@foreach($resume->location as $v)
										{{ $v->province->province_name }}<br>
										@endforeach
									</td>
									<td>
										{{ $resume->getUpdateAt() }}
									</td>
								</tr>	
								@endforeach
								@else
								<tr>
									<td colspan="5">Không tìm thấy hồ sơ nào với yêu cầu của bạn</td>
								</tr>
								@endif
							</tbody>
						</table>
						<div class="pull-right pagi">&nbsp;
							{{ $result->links() }}
						</div>

						@endif
					</div>
					
				</div>
					
				<div class="box" id="order-detail" style="display: none;">
					
				</div>
			</section>
		</div>
	</section>
	<div class="modal fade" id="modal-history">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
@stop
