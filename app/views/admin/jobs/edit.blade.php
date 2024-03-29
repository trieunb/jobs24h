@extends('layouts.admin')
@section('title')Edit Job #{{ $job->id }} @stop
@section('page-header')Sửa tin tuyển dụng @stop
@section('content')
{{ HTML::script(URL::to('packages/ckeditor/ckeditor/ckeditor.js')) }}



	{{ Form::open(array('url'=>URL::route('admin.jobs.update',$job->id).'?page='.Input::get('page').'&web='.Input::get('web').'' ,'class'=>'form form-horizontal', 'method'=>'PUT' ) ) }}


	<!-- {{ Form::open(array('method'=>'POST', 'action'=> array('admin.jobs.update1'), 'class'=>'form form-horizontal' ) ) }} -->
		@include('includes.notifications')
		
		<div class="form-group">
			<label for="inputEmail" class="col-sm-2 control-label">Vị trí:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'vitri', $job->vitri, array('class'=>'form-control', 'required') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="chucvu" class="col-sm-2 control-label">Chức vụ:</label>
			<div class="col-sm-2">
				{{ Form::select('chucvu', Level::lists('name', 'id'), $job->chucvu) }}
				
			</div>
			<label for="namkinhnghiem" class="col-sm-2 control-label">Số năm kinh nghiệm:</label>
			<div class="col-sm-2">
				{{ Form::number('namkinhnghiem', $job->namkinhnghiem, array('class'=>'form-control', 'required', 'min'=>0, 'placeholder'=>'Ví dụ: 1') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Ngành nghề:</label>
			<div class="col-sm-6">
				{{ Form::select('ntd_nganhnghe[]', Category::getList(), $job->arrayCategory(), array('class'=>'form-control chosen-select', 'multiple') ) }}
			</div>
		</div>
		<div class="form-group">
												
			<label for="bangcap" class="col-sm-2 control-label">Yêu cầu bằng cấp:</label>
			<div class="col-sm-2">
				{{ Form::select('bangcap', Education::lists('name', 'id'), $job->bangcap, array('class'=>'form-control') ) }}
			</div>
			<label for="sltuyen" class="col-sm-2 control-label">Số lượng cần tuyển:</label>
			<div class="col-sm-2">
				{{ Form::text('sltuyen', $job->sltuyen, array('class'=>'form-control', 'placeholder'=>'Ví dụ: 10', 'required') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="hinhthuc" class="col-sm-2 control-label">Hình thức làm việc:</label>
			<div class="col-sm-2">
				{{ Form::select('hinhthuc', WorkType::lists('name', 'id'), $job->hinhthuc, array('class'=>'form-control') ) }}
			</div>
			<label for="gioitinh" class="col-sm-2 control-label">Yêu cầu giới tính:</label>
			<div class="col-sm-2">
				{{ Form::select('gioitinh',array(0=>'Không yêu cầu', 1=>'Nam', 2=>'Nữ'), $job->gioitinh, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Địa điểm làm việc:</label>
			<div class="col-sm-6">
				{{ Form::select('ntd_diadiem[]', Province::lists('province_name', 'id'), $job->arrayLocation(), array('class'=>'form-control chosen-select', 'multiple') ) }}
			</div>
			
		</div>
		<div class="form-group">
			<label for="dotuoi" class="col-sm-2 control-label">Yêu cầu độ tuổi:</label>
			<div class="col-sm-6">
				<div class="row">
					<div class="col-sm-4">
						{{ Form::text('dotuoi_min', $job->dotuoi_min, array('class'=>'form-control','required') ) }}
					</div>
					<div class="col-xs-2 middle-align">đến</div>
					<div class="col-sm-4">
						{{ Form::text('dotuoi_max', $job->dotuoi_max, array('class'=>'form-control','required') ) }}
					</div>
					<div class="col-xs-2 middle-align">tuổi</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Mức lương:</label>
			<div class="col-sm-6">
				<div class="row">
					<div class="col-sm-4">
						{{ Form::text('mucluong_min', $job->mucluong_min, array('class'=>'form-control', 'id'=>'mucluong_min') ) }} 
					</div>
					<div class="col-xs-2 middle-align">đến</div>
					<div class="col-sm-4">
						{{ Form::text('mucluong_max', $job->mucluong_max, array('class'=>'form-control', 'id'=>'mucluong_max') ) }}
					</div>
					<div class="col-xs-2 middle-align">VND</div>
				</div>
			</div>
			<div class="col-xs-2">
				<div class="checkbox">
					<label>
						{{ Form::checkbox('thuongluong', 1, ($job->mucluong_max==0)?1:0, ['id'=>'thuongluong']) }}
						Thương lượng
					</label>
				</div>
			</div>
			
		</div>
		<div class="form-group">
			<label for="mota" class="col-sm-2 control-label">Mô tả công việc:</label>
			<div class="col-sm-8">
				{{ Form::textarea('mota', $job->mota, array('class'=>'form-control', 'rows'=>10,'required') ) }}
				<div class="clearfix"></div>
				
			</div>
			
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Quyền lợi:</label>
			<div class="col-sm-8">
				{{ Form::textarea('quyenloi', $job->quyenloi, array('class'=>'form-control', 'rows'=>5) ) }}
				<div class="clearfix"></div>
				
			</div>
			
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Yêu cầu khác:</label>
			<div class="col-sm-8">
				{{ Form::textarea('yeucaukhac', $job->yeucaukhac, array('class'=>'form-control', 'rows'=>3) ) }}
			</div>
			
		</div>
		<div class="form-group">
			<label for="hosogom" class="col-sm-2 control-label">Hồ sơ bao gồm:</label>
			<div class="col-sm-8">
				{{ Form::textarea('hosogom', $job->hosogom, array('class'=>'form-control', 'rows'=>2) ) }}
			</div>
			
		</div>
		<div class="form-group">
			<label for="hannop" class="col-sm-2 control-label">Hạn nộp hồ sơ:</label>
			<div class="col-sm-2">
				{{ Form::text('hannop', $job->hannop, array('class'=>'form-control datepicker') ) }}
			</div>
			<label for="hinhthucnop" class="col-sm-2 control-label">Hình thức nộp:</label>
			<div class="col-sm-2">
				{{ Form::select('hinhthucnop', Config::get('custom_hinhthucnop.hinh_thuc'), $job->hinhthucnop, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="tags-box bg-little-blue push-padding-30-full border-blue col-xs-10" style="    margin-bottom: 10px;">
			<div class="form-group">
				<label for="keyword_tags" class="col-sm-2 control-label">Thẻ từ khóa 1:</label>
				<div class="col-sm-6">
					{{ Form::text('keyword_tags[1]', $job->keyword_tags[1], array('class'=>'form-control', 'placeholder'=>'Ví dụ: Kỹ năng thuyết trình') ) }}
				</div>
			</div>
			<div class="form-group">
				<label for="keyword_tags" class="col-sm-2 control-label">Thẻ từ khóa 2:</label>
				<div class="col-sm-6">
					{{ Form::text('keyword_tags[2]', $job->keyword_tags[2], array('class'=>'form-control', 'placeholder'=>'Ví dụ: Javascript') ) }}
				</div>
			</div>
			<div class="form-group">
				<label for="keyword_tags" class="col-sm-2 control-label">Thẻ từ khóa 3:</label>
				<div class="col-sm-6">
					{{ Form::text('keyword_tags[3]', $job->keyword_tags[3], array('class'=>'form-control', 'placeholder'=>'Ví dụ: Tiếng Nhật') ) }}
				</div>
			</div>
			
		</div>
		<div class="clearfix"></div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Trạng thái:</label>
			<div class="col-sm-2">
				{{ Form::select('status', [0=>'Không kích hoạt', 1=>'Duyệt'], $job->status, array('class'=>'form-control') ) }}
			</div>
		</div>


		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Người duyệt:</label>
			<div class="col-sm-6">
				@if($job->status==1)
					@if(isset($user_admin->username))
					{{ Form::text('duyet', $user_admin->username, array('class'=>'form-control', 'placeholder'=>'','disabled') ) }}
					@else
					{{ Form::text('duyet', null, array('class'=>'form-control', 'placeholder'=>'','disabled') ) }}
					@endif
				@else
					{{ Form::text('duyet', null, array('class'=>'form-control', 'placeholder'=>'','disabled') ) }}
				@endif
			
			</div>
		</div>

		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Người gửi mail:</label>
			<div class="col-sm-6">
				@if($job->user_approved==1)
					@if(isset($user_admin->email))
					{{ Form::text('sendemail', $user_admin->email, array('class'=>'form-control', 'placeholder'=>'','disabled') ) }}
					@else
					{{ Form::text('sendemail', null, array('class'=>'form-control', 'placeholder'=>'','disabled') ) }}
					@endif
				@else
					{{ Form::text('sendemail', null, array('class'=>'form-control', 'placeholder'=>'','disabled') ) }}
				@endif
			
			</div>
		</div>

		<div class="tags-box bg-little-blue push-padding-30-full border-blue col-xs-10" style="    margin-bottom: 10px;">
			<div class="form-group">
				<label for="keyword_tags" class="col-sm-2 control-label">SEO TITLE:</label>
				<div class="col-sm-6">
				@if(isset($job->seo["title"]))
					{{ Form::text('seo[title]',  $job->seo["title"], array('class'=>'form-control', 'placeholder'=>'Ví dụ: tiêu đề') ) }}
				@else
					{{ Form::text('seo[title]',  null, array('class'=>'form-control', 'placeholder'=>'Ví dụ: tiêu đề') ) }}
				@endif
				</div>
			</div>
			<div class="form-group">
				<label for="keyword_tags" class="col-sm-2 control-label">SEO DESCRIPTION:</label>
				<div class="col-sm-6">
				@if(isset($job->seo["description"]))
					{{ Form::text('seo[description]', $job->seo["description"], array('class'=>'form-control', 'placeholder'=>'Ví dụ: Mô tả') ) }}
				@else
					{{ Form::text('seo[description]', null, array('class'=>'form-control', 'placeholder'=>'Ví dụ: Mô tả') ) }}
				@endif
				</div>
			</div>
			<div class="form-group">
				<label for="keyword_tags" class="col-sm-2 control-label">META KEYWORDS:</label>
				<div class="col-sm-6">
				@if(isset($job->seo["keyword"]))
					{{ Form::text('seo[keyword]',  $job->seo["keyword"], array('class'=>'form-control', 'placeholder'=>'Ví dụ: keyword') ) }}
				@else
					{{ Form::text('seo[keyword]',null, array('class'=>'form-control', 'placeholder'=>'Ví dụ: keyword') ) }}
				@endif
				</div>
			</div>
			
		</div>
		<div class="clearfix"></div>

		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				{{ Form::button('Lưu thay đổi', array('type'=>'submit', 'class'=>'btn btn-primary')) }}
				<a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModal">Gửi mail</a>
				<a class="btn btn-info" href="{{URL::route('admin.jobs.cvapp')}}?id={{$job->id}}">Hồ sơ ứng tuyển</a>
				<a onclick="return confirm('Bạn có chắc muốn xóa ?');" href="{{URL::route('admin.jobs.delete',$job->id)}}" class="btn btn-danger">Xóa</a>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				<a class="btn btn-warning" href="{{URL::route('admin.order.package')}}/{{$job->id}}">Đăng ký dịch vụ cho tin này</a>
			</div>
		</div>
	{{ Form::close() }}

	<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 1000px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Gửi email phản hồi tin tuyển dụng</h4>
      </div>
      {{ Form::open(array('method'=>'POST', 'action'=> array('admin.jobs.sendmail'), 'class'=>'form form-horizontal' ) ) }} 
      <div class="modal-body">
      
      	<div class="col-sm-12">
	         
				<label for="inputEmail" class="col-sm-3 control-label">To:</label>
				<div class="col-sm-9">
					{{ Form::input('email', 'email1', AdminAuth::getUser()->email, array('class'=>'form-control', 'required','readonly') ) }}
				</div>
			 
		  </div>
	      <div class="col-sm-12">
	         
				<label for="inputEmail" class="col-sm-3 control-label">From:</label>
				<div class="col-sm-9">
					{{ Form::input('email', 'email', $job->ntd->email, array('class'=>'form-control', 'required','readonly') ) }}
				</div>
			 
		  </div>

		  <div class="col-sm-12">
	         
				<label for="inputEmail" class="col-sm-3 control-label">Công ty:</label>
				<div class="col-sm-9">
					{{ Form::input('text', 'company', $job->ntd->company->company_name, array('class'=>'form-control', 'required','readonly') ) }}
				</div>
			 
		  </div>

		   <div class="col-sm-12">
	         
				<label for="inputEmail" class="col-sm-3 control-label">Tin tuyển dụng:</label>
				<div class="col-sm-9">
					{{ Form::input('text', 'post', $job->vitri, array('class'=>'form-control', 'required','readonly') ) }}
				</div>
			 
		  </div>


		  <div class="clearfix"></div>
		  <div class="col-sm-12">
			 
				<label for="inputEmail" class="col-sm-3 control-label">Tiêu đề:</label>
				<div class="col-sm-9">
					{{ Form::input('text', 'title', null, array('class'=>'form-control', 'required','placeholder'=>"Ví dụ :Tin tuyển dụng $job->vitri đã được duyệt ") ) }}
				</div>
			 
		  </div>
		  <div class="clearfix"></div>
		  <div class="col-sm-12">
			 
				<label for="inputEmail" class="col-sm-3 control-label">Nội dung:</label>
				<div class="col-sm-9">
					{{ Form::textarea('content', 'Ví dụ : tin tuyển dụng của bạn đã được duyệt tại vnjobs.vn',  ['size' => '50x9','placeholder'=>'ví dụ : Tin tuyển dụng của bạn đã được duyệt']) }}

				<script>
				CKEDITOR.replace( 'content', {
                
                });
                </script>
				</div>
			 
		  </div>
		  <div class="clearfix"></div>



      </div>
     
      <div class="modal-footer">

      	<button class="btn btn-success" type="submit">Gửi</button>
      	
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
 	{{Form::close()}}
  </div>
</div>


@stop

@section('style')
	{{ HTML::style('assets/css/chosen.min.css') }}
	{{ HTML::style('assets/css/datepicker.min.css') }}
	<style type="text/css">
		.no-padding {
			padding: 0;
		}
		.middle-align {
			vertical-align: middle;
			padding-top: 6px;
		}
		.bg-little-blue {background: #e4f5ff;}
		.push-padding-30-full {padding: 30px;}
		.border-blue {border: 1px solid #00b9f2;}
	</style>
@stop

@section('script')
	{{ HTML::script('assets/js/chosen.jquery.min.js') }}
	{{ HTML::script('assets/js/bootstrap-datepicker.min.js') }}
	<script type="text/javascript">
		$('.chosen-select').chosen({allow_single_deselect:true, max_selected_options: 3}); 
		$('input.datepicker').datepicker({
			format: "yyyy-mm-dd",
			startDate: "today",
			clearBtn: true,
			language: "vi",
			autoclose: true
		});
		$('#show-auto-reply').click(function(event) {
			if($(this).is(':checked'))
			{
				$('#auto-reply').collapse('show');
			} else {
				$('#auto-reply').collapse('hide');
			}
		});
		function fillToTextbox()
		{
			var letterId = $('#select-auto').val();
			if( isNaN(letterId))
			{
				$('#inputSubject').val('');
				$('#inputContent').val('');
			} else {
				$.ajax({
					url: '{{ URL::route('employers.jobs.ajax') }}',
					data: {action: 'getLetter', letterId: letterId},
					type: 'POST',
					dataType: 'json',
					success: function(json)
					{
						if(json.has) {
							$('#inputSubject').val(json.subject);
							$('#inputContent').val(json.content);
						} else {
							alert(json.message);
						}
						
					}
				});
			}
		}
		$('#select-auto').change(function(event) {
			fillToTextbox();
		});

		$('#thuongluong').click(function(event) {
			if($(this).is(':checked'))
			{
				$('#mucluong_min').val(0);
				$('#mucluong_max').val(0);
				$('#mucluong_min').attr('readonly', 'readonly');
				$('#mucluong_max').attr('readonly', 'readonly');
			} else {
				$('#mucluong_min').removeAttr('readonly');
				$('#mucluong_max').removeAttr('readonly');
			}
		});
		if($('#thuongluong').is(':checked')) {
			$('#thuongluong').trigger('click');
			$('#thuongluong').trigger('click');
		}

		var show_auto_reply = '{{ $job->letter_auto_id }}';
		if(show_auto_reply != 0) {
			$('#show-auto-reply').trigger('click');
			$('#select-auto').val(show_auto_reply);
			fillToTextbox();
		}
		
	</script>
@stop