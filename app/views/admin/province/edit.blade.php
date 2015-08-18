@extends('layouts.admin')
@section('title')Chỉnh sửa ngành nghề @stop
@section('page-header')Chỉnh sửa ngành nghề @stop
@section('content')
	@if(isset($province))
	{{ Form::open( array('route'=>array('admin.province.edit.post', $province->id, 'province'), 'class'=>'form-horizontal', 'method'=>'POST') ) }}
		@include('includes.notifications')

		<div class="form-group">
			<label for="inputTitle" class="col-sm-2 control-label">Tiêu đề:</label>
			<div class="col-sm-6">
				<input type="text" name="name" class="form-control" value="{{$province->province_name}}">
			</div>
		</div>

		<div class="form-group">
			<label for="inputTitle" class="col-sm-2 control-label">Danh mục cha:</label>
			<div class="col-sm-6">
				{{ Form::select('parent', array('0'=>'None')+$provinces, $province->country_id)}}
			</div>
		</div> 
		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				{{ Form::button('Lưu', array('type'=>'submit', 'class'=>'btn btn-primary')) }}
			</div>
		</div>
	{{ Form::close() }}
	@else
	{{ Form::open( array('route'=>array('admin.province.edit.post', $country->id, 'country'), 'class'=>'form-horizontal', 'method'=>'POST') ) }}
		@include('includes.notifications')

		<div class="form-group">
			<label for="inputTitle" class="col-sm-2 control-label">Tên:</label>
			<div class="col-sm-6">
				<input type="text" name="name" class="form-control" value="{{$country->country_name}}">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				{{ Form::button('Lưu', array('type'=>'submit', 'class'=>'btn btn-primary')) }}
			</div>
		</div>
	{{ Form::close() }}	
	@endif
@stop

@section('style')
	{{ HTML::style('assets/css/datepicker3.css') }}
@stop
@section('script')
	{{ HTML::script('assets/js/bootstrap-datepicker.js') }}
	{{ HTML::script('assets/js/bootstrap-datepicker.vi.js') }}
	<script type="text/javascript">
	
	</script>
@stop