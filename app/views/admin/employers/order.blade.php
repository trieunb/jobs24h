@extends('layouts.admin')
@section('title')Employers Manager @stop
@section('content')
	@include('includes.notifications')
	
	<div class="alert alert-block alert-default">
		 
		 
	<div class="row">
		{{ Form::open(array('method'=>'POST', 'class'=>'form form-horizontal' ) ) }}
		<div class="alert alert-block alert-warning">
		Quản lý Dịch vụ Tin Tuyển Dụng: {{$job->vitri}}<br>
		Thuộc nhà tuyển dụng có email : {{$job->ntd->email}}
		<input type="hidden" name="ntd_id" value="{{$job->ntd->id}}">
		<br>
		Tên Công Ty: {{$job->ntd->company->company_name}}<br>
		
	</div>
		<div class="col-md-12">
			<p style="font-size: 12px;">- Các gói dịch vụ đã checked là những gói mà nhà tuyển dụng đã mua trước đó. 
			<br>- Nếu muốn cập nhật hoặc đăng ký gói dịch vụ nào thì bấm nút Save tương ứng với gói đó.
			<br>- Nếu muốn cập nhật hoặc đăng ký cho tất cả các gói đã được check thì chọn Lưu tất cả mục đã chọn</p>
		</div>
		<div class="clearfix"></div>
		<div class="col-md-12">
		<table class="table table-hover table-bordered table-striped dataTable" id="table">
			<thead>
				<tr>
					<th class="center">
						<label class="pos-rel">
							<input type="checkbox" class="ace" />
							<span class="lbl"></span>
						</label>
					</th>
					
					<th>Loại dịch vụ</th>
					<th>Số ngày còn lại</th>
					<th>Ngày tạo</th>
					<th>Ngày hết hạn</th> 
					<th>Thuộc dịch vụ</th>
					<th>#</th>
				</tr>
			</thead>
			<tbody>
					<?php $now=date('d-m-Y H:i:s'); ?>
					@foreach($epackage as $value)
						<tr>
							<td style="text-align:center">
								<label class="pos-rel">
								{{ Form::checkbox('ck[]', $value['id'],in_array( $value['id'],$job->orderpostrec->lists('epackage_id')),array('class'=>'ace') ) }}
									
									<span class="lbl"></span>
								</label>
							</td>
							
							<td>{{$value['package_name']}}</td>

							<?php $remain='<span style="color:#C6C6C6">Chưa kích hoạt</span>'; 
								  $created_date='<span style="color:#C6C6C6">Chưa kích hoạt</span>';
								  $ended_date ='<span style="color:#C6C6C6">Chưa kích hoạt</span>';
							?>
							@foreach($job->orderpostrec as $value1)

								@if($value1['epackage_id']==$value['id'])
									
										@if($value1['remain_date']>0)
										<?php $remain=$value1['remain_date'].' ngày'; ?>
										 
										@else
											<?php $remain = 'Hết Hạn';?>
										@endif
										<?php $created_date=date("d-m-Y H:i:s", strtotime($value1['created_date'])) ?>
										
										<?php 
										if((strtotime(date('Y-m-d H:i:s',strtotime($value1['ended_date'])))-strtotime($now))/(60*60*24)< 7 && (strtotime(date('Y-m-d H:i:s',strtotime($value1['ended_date'])))-strtotime($now))/(60*60*24)>0 )
										$ended_date ='	<p style="color:orange ">'.date('d-m-Y H:i:s',strtotime($value1['ended_date'])).'</p>';
										elseif((strtotime(date('Y-m-d H:i:s',strtotime($value1['ended_date'])))-strtotime($now))/(60*60*24)<= 0)
											$ended_date='<p style="color:red ">'.date("d-m-Y H:i:s",strtotime($value1["ended_date"])).'</p>';
										else
											$ended_date='<p>'.date("d-m-Y H:i:s",strtotime($value1["ended_date"])).' </p>';
								
										//$ended_date=date("d-m-Y H:i:s", strtotime($value1['ended_date']))

										 ?> 
								
								@endif
							@endforeach
								<td>{{$remain}}</td>
								<td>{{$created_date}}</td>
								<td>{{$ended_date}}</td>
							<td>{{$value['eservice']['service_name']}}</td>
							<td>
								<a class="btn btn-xs btn-primary" title="Đăng ký/ cập nhật" href="{{URL::route('admin.order.update',array($job->id,$job->ntd->id,$value['id']))}}" id=""><i class="fa fa-save"></i></a>
								<a class="btn btn-xs btn-danger" onclick='return confirm("Bạn có chắc muốn xóa dịch vụ này hay không ?");' title="Hủy dịch vụ" href="{{URL::route('admin.order.delete',array($job->ntd->id,$value['id']))}}" id=""><i class="fa fa-trash"></i></a>
							</td>

						</tr>
					@endforeach	
			</tbody>
			

		</table>

		</div>
		 <div class="col-md-12"><button style="margin-top: 22px;" class="btn btn-xs btn-primary" type="submit">Lưu đăng tin tuyển dụng (tất cả mục đã chọn)</button></div>
		{{Form::close() }}
	</div>
	</div>




@stop

@section('style')
	{{ HTML::style('assets/css/dataTables.bootstrap.css') }}
@stop

@section('script')
	 <script>
	 $(document).ready(function() {
	    
		 
	  var active_class = 'success';
		$('#table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});

		$('#table').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});
		 

		});
	 

	 	$('#save_search').click(function(event) {
	 		var ntd_id	=	{{$job->ntd->id}};
	 		var id = $('select[name=search_service]').val();
	 		$.ajax({
	 			url: '{{URL::route("admin.order.saveSearchService")}}',
	 			type: 'POST',
	 			dataType: 'json',
	 			data: {ntd_id:ntd_id,id: id},
	 			success: function(json)
				{
					if(json.has)
					{
						alert("Đã lưu"); 
						 location.reload();
					} else {
						alert("Không thể lưu"); 
					}
					 
				}

	 		});
	 		 
	 		
	 	});


		</script>
	
@stop