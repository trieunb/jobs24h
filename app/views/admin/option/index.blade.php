@extends('layouts.admin')
@section('title')Chỉnh sửa tin tức @stop
@section('page-header')Chỉnh sửa bài viết @stop
@section('style')

 
{{ HTML::script(URL::to('packages/ckeditor/ckeditor/ckeditor.js')) }}
@stop
@section('content')

@include('includes.notifications')
	 
<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
  @foreach($data as $value)
    <li role="presentation" class=""><a href="#{{$value["id"]}}" aria-controls="home" role="tab" data-toggle="tab">{{$value['name']}}</a></li>
   @endforeach
    
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
  <div role="tabpanel" class="tab-pane active alert alert-success" id="">Chọn tab bạn muốn thay đổi</div>
   @foreach($data as $key=>$value)
    @if($value['name']=='logo' || $value['name']=='background' || $value['name']=='favicon')
		<div role="tabpanel" class="tab-pane" id="{{$value["id"]}}">
			<form action="{{URL::route('admin.option.ajax')}}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
				<div class="col-md-3">
				<img style="width:50%" id="{{$value['name']}}1" src="{{URL::to('assets/images/'.$value['value'].'')}}" alt="your image" />

				</div>
				<div class="col-md-5">
					<input type="hidden" name="action" value="{{$value['name']}}">
					{{Form::file($value['name'],array('id'=>$value['name']))}}
				</div>
				<div class="col-md-2">
					<button class="btn btn-primary" type="submit" value="{{$value['name']}}" id="{{$value['name']}}btn">Save</button>
				</div>
				
			</form>
			<div class="clearfix"></div>
		</div>
		
   	@else
   	
    	<div role="tabpanel" class="tab-pane" id="{{$value["id"]}}">
    	<form action="{{URL::route('admin.option.ajax')}}" method="POST" class="form-horizontal" role="form">
    	<div class="col-md-8">
    		<input type="hidden" name="action" value="{{$value['name']}}">
    		{{Form::text($value["name"], $value['value'])}}
    	</div>
    		
    	<div class="col-md-2">
    		<button class="btn btn-primary" id="{{$value["name"]}}">Save</button>
    	</div>
    	<div class="clearfix"></div>
    	</form>
    	</div>
    
    @endif
   @endforeach
     
  </div>

</div>
	 
@stop

@section('style')
	{{ HTML::style('assets/css/datepicker3.css') }}
@stop
@section('script')
	{{ HTML::script('assets/js/bootstrap-datepicker.js') }}
	{{ HTML::script('assets/js/bootstrap-datepicker.vi.js') }}
	<script type="text/javascript">
	$('input.datepicker').datepicker({
			format: "yyyy-mm-dd",
			language: "vi",
			autoclose: true,
			todayHighlight: true,
			endDate: new Date(),
		});
	</script>
	<script>
    function readURL_logo(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#logo1').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURL_background(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#background1').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURL_favicon(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#favicon1').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    


    $("#logo").change(function(){
        readURL_logo(this);
    });
    $("#background").change(function(){
        readURL_background(this);
    });
    $("#favicon").change(function(){
        readURL_favicon(this);
    });
</script>
@stop