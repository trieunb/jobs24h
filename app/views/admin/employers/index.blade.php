@extends('layouts.admin')
@section('title')Jobseeker Manager @stop
@section('content')
	@include('includes.notifications')
	<div class="clearfix"></div>
	<table class="table table-hover table-bordered table-striped" id="jobseekers">
		<thead>
			<tr>
				<th class="center">
					<label class="pos-rel">
						<input type="checkbox" class="ace" />
						<span class="lbl"></span>
					</label>
				</th>
				<th>ID</th>
				<th>Email</th>
				<th>Họ tên</th>
				<th>Ngày đăng ký</th>
				<th>Trạng thái</th>
				<th>#</th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>
@stop

@section('style')
	{{ HTML::style('assets/css/dataTables.bootstrap.css') }}
@stop

@section('script')
	{{ HTML::script('assets/js/jquery.dataTables.min.js') }}
	{{ HTML::script('assets/js/jquery.dataTables.bootstrap.min.js') }}
	<script type="text/javascript">
		$('#jobseekers').dataTable( {
				"bProcessing": true,
				"bServerSide": true,
				"sAjaxSource": "{{ URL::route('jobseekers.datatables') }}",
				bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false, "sClass": "center" },
					  null, null,null, null, null,
					  { "bSortable": false }
					],
					"aaSorting": [[ 1, "desc" ]],
			});

		var active_class = 'success';
		$('#jobseekers > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});

		$('#jobseekers').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});

		
	</script>
	<script type="text/javascript">
		$('#jobs').dataTable( {
				"bProcessing": true,
				"bServerSide": true,
				"sAjaxSource": "{{ URL::route('jobs.datatables') }}",
				"aoColumnDefs": [
					{ 'bSortable': false, 'aTargets': [ 0 ] }
				],
				"fnDrawCallback": function (oSettings) {
					//if(oSettings.bSorted || oSettings.bFiltered) {
						var current = $('ul.pagination li.active a').text();
						var crshow = $('#resumes_length select option:selected').val();
						//alert(crshow);
						for (var i = 0, iLen = oSettings.aiDisplay.length; i < iLen; i++) {
							$('td:eq(0)', oSettings.aoData[ oSettings.aiDisplay[i]].nTr).html(i+1+(crshow*current-crshow));	
							
						}

					//}
				}
			});
		$('input[type="search"]').on( 'keyup', function () {
			//$(this).val(locdau($(this).val()));
		} );

		function locdau(str){
			str= str.toLowerCase();
			str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
			str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
			str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
			str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
			str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
			str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
			str= str.replace(/đ/g,"d");
			str= str.replace(/!|\$|%|\^|\*|\(|\)|\=|\<|\>|\?|\/|,|\:|\'|\"|\&|\#|\[|\]|~/g,"-");
			//str= str.replace(/-+-/g,"-");
			//str= str.replace(/^\-|\-$/g,"");
			return str;
		}

	</script>
@stop