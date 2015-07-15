@extends('layouts.employer')
@section('title') Quản lý thư mục @stop
@section('content')
<section class="boxed-content-wrapper clearfix">
		<div class="container">
			<aside id="sidebar" class="col-sm-3">
				@include('includes.employers.candidates_navbar')
			</aside>
			
			<section id="content" class="pull-right right">
				<div class="header-image">
					QUẢN LÝ <span class="text-blue">ỨNG VIÊN</span>
				</div>
				<div class="boxed">
					<div class="heading-image">
						<h2 class="text-orange">Cập nhật thư mục - hồ sơ ứng tuyển</h2>
					</div>
					<div class="filter">
						<p>Chú ý: Quý khách chỉ xóa được các thư mục không chứa hồ sơ</p>
					</div>
					<div class="clearfix"></div>
					@include('includes.notifications')
					
					<table class="table table-bordered table-blue-bordered white">
						<thead>
							<tr>
								<th>Ngày tạo</th>
								<th>Tên thư mục</th>
								<th>Tổng số</th>
								<th>Thao tác</th>
							</tr>
						</thead>
						<tbody>
							@if(count($fds))
								@foreach($fds as $folder)
								<tr>
									<td>{{ $folder->created_at }}</td>
									<td id="fn_{{ $folder->id }}">{{ $folder->folder_name }}</td>
									<td>{{ $folder->rsfolder->count() }}</td>
									<td>
										<button type="button" id="f_{{ $folder->id }}" class="btn btn-info btn-xs btn-edit"><i class="fa fa-edit"></i> Sửa</button>
										@if($folder->rsfolder->count() == 0)
										<a href="{{ URL::route('employers.candidates.deleteFolder', $folder->id) }}" class="btn btn-xs btn-danger" onclick="return confirm('Bạn có muốn xóa folder này ?')"><i class="fa fa-trash"></i> Xóa</button>
										@endif
									</td>
								</tr>
								@endforeach
							@else 
								<tr>
									<td colspan="4">Không có thư mục</td>
								</tr>
							@endif
							
						</tbody>
					</table>
					<button type="button" class="btn btn-lg bg-orange" data-toggle="modal" data-target="#modalCreate">Tạo thư mục mới</button>
				</div>		
			</section>
		</div>
	</section>


	<div class="modal fade" id="modalCreate">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Tạo thư mục</h4>
				</div>
				<div class="modal-body">
					<form name="formCreate" action="{{ URL::route("employers.candidates.createFolder") }}" method="POST" class="form-horizontal formCreate" role="form">
						<div class="form-group">
							<label for="inputFolderName" class="col-sm-2 control-label">Tên thư mục:</label>
							<div class="col-sm-10">
								<input type="text" name="folderName" id="inputFolderName" class="form-control" value="" required="required" maxlength="20">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-10 col-sm-offset-2">
								<button type="submit" id="submit-create" class="btn btn-lg bg-orange">Tạo ngay</button>
							</div>
						</div>
					</form>
				</div>
				
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	
	<div class="modal fade" id="modalEdit">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Đổi tên thư mục</h4>
				</div>
				<div class="modal-body">
					<form name="formEdit" action="" method="POST" class="form-horizontal formCreate" role="form">
						<div class="form-group">
							<input type="hidden" name="folder_id" id="inputFolder_id" class="form-control" value="">
							<label for="inputEditFolderName" class="col-sm-2 control-label">Tên mới:</label>
							<div class="col-sm-10">
								<input type="text" name="folderName" id="inputEditFolderName" class="form-control" value="" required="required" maxlength="20">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-10 col-sm-offset-2">
								<button type="button" id="submit-edit" class="btn btn-warning">Lưu thay đổi</button>
							</div>
						</div>
					</form>
				</div>
				
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
@stop

@section('style')
	<style type="text/css">
	.btn-xs {
		padding: 1px 5px !important;
	}
	</style>
@stop

@section('script')
	<script type="text/javascript">
		$('.btn-edit').on('click', function () {
			var thisId = this.id;
			var folder_id = thisId.split('_');
			folder_id = folder_id[1];
		  	var folder_name = $('#fn_' + folder_id).html();
		  	$('#inputEditFolderName').val(folder_name);
		  	$('#inputFolder_id').val(folder_id);
		  	$('#modalEdit').modal('show');
		});
		$('#submit-edit').click(function(event) {
			var folder_id = $('#inputFolder_id').val();
			var folder_name = $('#inputEditFolderName').val();
			$.ajax({
				url: '{{ URL::route('employers.candidates.updateFolder') }}',
				data: {folder_id: folder_id, folder_name: folder_name},
				type: 'POST',
				dataType: 'json',
				success: function(json)
				{
					$('#fn_' + folder_id).html(folder_name);
					$('#modalEdit').modal('hide');
				},
				error: function(json) 
				{
					console.log(json);
					$('#modalEdit').modal('hide');
				}
			})
		});
	</script>
@stop