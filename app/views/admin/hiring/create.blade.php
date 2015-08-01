@extends('layouts.admin')
@section('title')Thêm bài đăng mới @stop
@section('page-header')Thêm bài đăng mới @stop
@section('content')
	{{ Form::open(array('method'=>'POST', 'action'=> array('admin.hiring.store'), 'class'=>'form form-horizontal' ) ) }}
		@include('includes.notifications')
		<div class="form-group">
			<label for="input1" class="col-sm-2 control-label">Tiêu đề:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'title', '', array('class'=>'form-control', 'id'=>'input1', 'required') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input2" class="col-sm-2 control-label">Đường dẫn:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'post_slug', '', array('class'=>'form-control', 'id'=>'input2', 'required') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input3" class="col-sm-2 control-label">Nội dung:</label>
			<div class="col-sm-10">
				{{ Form::textarea('content', '', array('class'=>'form-control', 'rows'=>10, 'required', 'id'=>'editor1') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input3" class="col-sm-2 control-label">Danh mục:</label>
			<div class="col-sm-4">
				{{ Form::select('cat_id', HiringCate::where('parent', 0)->lists('cat_name', 'id'), '' , ['id'=>'cat_id'] ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input3" class="col-sm-2 control-label">Danh mục con:</label>
			<div class="col-sm-4">
				{{ Form::select('sub_cat_id', [], '', ['id'=>'sub_cat_id']) }}
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				<button type="submit" class="btn btn-primary">Thêm mới</button>
			</div>
		</div>
	{{ Form::close() }}
@stop
@section('script')
	{{ HTML::script('packages/ckeditor/ckeditor/ckeditor.js') }}
	<script type="text/javascript">
	$('#input1').change(function(event) {
		var title = $(this).val();
		$.ajax({
			url: '{{ URL::route('admin.hiring.ajax') }}',
			data: {title: title},
			type: 'POST',
			success: function(html)
			{
				$('#input2').val(html);
			}
		});
	});
	var sub_cat = {{ (Session::get('sub_cat_id')?Session::get('sub_cat_id'):0) }};
	var loadSubCate = function()
	{
		var cat_id = $('#cat_id').val();
		$.ajax({
			url: '{{ URL::route('admin.hiring.ajax') }}',
			data: {cat_id: cat_id},
			type: 'POST',
			dataType: 'json',
			success: function(json)
			{
				html = '<option value="0"></option>';
				$.each(json, function(index, val) {
					if(index == sub_cat)
					{
						html += '<option value="'+index+'" selected>'+val+'</option>';
					} else {
						html += '<option value="'+index+'">'+val+'</option>';
					}
					
				});
				$('#sub_cat_id').html(html);
			}
		})
	}
	$('#cat_id').change(function(event) {
		loadSubCate();
	});
	loadSubCate();
	CKEDITOR.replace( 'editor1', {
		filebrowserUploadUrl: '{{ URL::route('admin.hiring.upload') }}',
		//extraPlugins: 'bbcode',
	});
	</script>
@stop