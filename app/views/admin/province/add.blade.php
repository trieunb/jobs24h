@extends('layouts.admin')
@section('title')Thêm mới địa điểm @stop
@section('page-header')Thêm mới địa điểm @stop
@section('content')
	{{ Form::open( array('route'=>array('admin.province.add.post'), 'class'=>'form-horizontal', 'method'=>'POST') ) }}
		@include('includes.notifications')
		<div class="form-group">
			<label for="inputTitle" class="col-sm-2 control-label">Tiêu đề:</label>
			<div class="col-sm-6">
				<input type="text" name="name" class="form-control" value="">
			</div>
		</div>
		<div class="form-group">
			<label for="inputTitle" class="col-sm-2 control-label">Danh mục cha:</label>
			<div class="col-sm-6">
				{{ Form::select('parent', array('0'=>'None')+$country, null)}}
			</div>
		</div> 
		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				{{ Form::button('Thêm mới', array('type'=>'submit', 'class'=>'btn btn-primary')) }}
			</div>
		</div>
	{{ Form::close() }}
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