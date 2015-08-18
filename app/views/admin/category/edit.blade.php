@extends('layouts.admin')
@section('title')Chỉnh sửa ngành nghề @stop
@section('page-header')Chỉnh sửa ngành nghề @stop
@section('content')
	{{ Form::open( array('route'=>array('admin.category.edit.post', $cate->id), 'class'=>'form-horizontal', 'method'=>'POST') ) }}
		@include('includes.notifications')
		<div class="form-group">
			<label for="inputTitle" class="col-sm-2 control-label">Tiêu đề:</label>
			<div class="col-sm-6">
				<input type="text" name="name" class="form-control" value="{{$cate->cat_name}}">
			</div>
		</div>
		<div class="form-group">
			<label for="inputTitle" class="col-sm-2 control-label">Danh mục cha:</label>
			<div class="col-sm-6">
				{{ Form::select('parent', array('0'=>'None')+$categories, $cate->parent_id)}}
			</div>
		</div> 
		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				{{ Form::button('Lưu', array('type'=>'submit', 'class'=>'btn btn-primary')) }}
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